<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use Craft;
use craft\models\SiteGroup;
use DateTime;
use Exception;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\events\RegisterSitemapsEvent;
use nystudio107\seomatic\events\RegisterSitemapUrlsEvent;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\Sitemap;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;
use yii\caching\TagDependency;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use function in_array;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapIndexTemplate extends FrontendTemplate implements SitemapInterface
{
    // Constants
    // =========================================================================

    /**
     * @event RegisterSitemapsEvent The event that is triggered when registering
     * additional sitemaps for the sitemap index.
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\RegisterSitemapsEvent;
     * use nystudio107\seomatic\models\SitemapIndexTemplate;
     * use yii\base\Event;
     * Event::on(SitemapIndexTemplate::class, SitemapIndexTemplate::EVENT_REGISTER_SITEMAPS, function(RegisterSitemapsEvent $e) {
     *     $e->sitemaps[] = [
     *         'loc' => $url,
     *         'lastmod' => $lastMod,
     *     ];
     * });
     * ```
     */
    public const EVENT_REGISTER_SITEMAPS = 'registerSitemaps';

    public const TEMPLATE_TYPE = 'SitemapIndexTemplate';

    public const CACHE_KEY = 'seomatic_sitemap_index';

    public const SITEMAP_INDEX_CACHE_TAG = 'seomatic_sitemap_index';

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|SitemapIndexTemplate
     */
    public static function create(array $config = [])
    {
        $defaults = [
            'path' => 'sitemaps-<groupId:\d+>-sitemap.xml',
            'template' => '',
            'controller' => 'sitemap',
            'action' => 'sitemap-index',
        ];
        $config = array_merge($config, $defaults);

        return new SitemapIndexTemplate($config);
    }

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        return parent::fields();
    }

    /**
     * Get the filename of the sitemap index.
     *
     * @param int $groupId
     * @return string
     */
    public function getFilename(int $groupId): string
    {
        return 'sitemaps-' . $groupId . '-sitemap.xml';
    }

    /**
     * @inheritdoc
     *
     * @throws NotFoundHttpException if the sitemap.xml doesn't exist
     */
    public function render(array $params = []): string
    {
        $cache = Craft::$app->getCache();
        $groupId = $params['groupId'];
        $siteId = $params['siteId'];
        if (Seomatic::$settings->siteGroupsSeparate) {
            /** @var SiteGroup|null $siteGroup */
            $siteGroup = Craft::$app->getSites()->getGroupById($groupId);
            if ($siteGroup === null) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Sitemap.xml not found for groupId {groupId}', [
                    'groupId' => $groupId,
                ]));
            }
            $groupSiteIds = $siteGroup->getSiteIds();
        } else {
            $groupSiteIds = Craft::$app->getSites()->allSiteIds;
        }

        $dependency = new TagDependency([
            'tags' => [
                self::GLOBAL_SITEMAP_CACHE_TAG,
                self::SITEMAP_INDEX_CACHE_TAG,
            ],
        ]);

        return $cache->getOrSet(self::CACHE_KEY . $groupId . '.' . $siteId, function() use ($groupSiteIds, $siteId) {
            Craft::info(
                'Sitemap index cache miss',
                __METHOD__
            );
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            $lines[] = '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>';
            $lines[] = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            // One sitemap entry for each MeteBundle
            $metaBundles = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
            Seomatic::$plugin->metaBundles->pruneVestigialMetaBundles($metaBundles);
            /** @var MetaBundle $metaBundle */
            foreach ($metaBundles as $metaBundle) {
                $sitemapUrls = $metaBundle->metaSitemapVars->sitemapUrls;
                // Check to see if robots is `none` or `no index`
                $robotsEnabled = true;
                if (!empty($metaBundle->metaGlobalVars->robots)) {
                    $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                        $metaBundle->metaGlobalVars->robots !== 'noindex';
                }
                if (Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle)) {
                    $robotsEnabled = true;
                    $sitemapUrls = true;
                }
                // Only add in a sitemap entry if it meets our criteria
                if (in_array($metaBundle->sourceSiteId, $groupSiteIds, false)
                    && $sitemapUrls
                    && $robotsEnabled) {
                    // Get all of the elements for this meta bundle type
                    $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
                    $totalElements = 0;
                    $pageCount = 0;

                    if ($seoElement !== null) {
                        // Ensure `null` so that the resulting element query is correct
                        if (empty($metaBundle->metaSitemapVars->sitemapLimit)) {
                            $metaBundle->metaSitemapVars->sitemapLimit = null;
                        }

                        $totalElements = Sitemap::getTotalElementsInSitemap($seoElement, $metaBundle);

                        $pageSize = $metaBundle->metaSitemapVars->sitemapPageSize;
                        $pageCount = (!empty($pageSize) && $pageSize > 0) ? ceil($totalElements / $pageSize) : 1;
                    }

                    // Only add a sitemap to the sitemap index if there's at least 1 element in the resulting sitemap
                    if ($totalElements > 0 && $pageCount > 0) {
                        for ($page = 1; $page <= $pageCount; $page++) {
                            $sitemapUrl = Seomatic::$plugin->sitemaps->sitemapUrlForBundle(
                                $metaBundle->sourceBundleType,
                                $metaBundle->sourceHandle,
                                $metaBundle->sourceSiteId,
                                $pageCount > 1 ? $page : 0 // No paging, if only one page
                            );

                            $lines[] = '<sitemap>';
                            $lines[] = '<loc>';
                            $lines[] = Html::encode($sitemapUrl);
                            $lines[] = '</loc>';

                            if ($metaBundle->sourceDateUpdated !== null) {
                                $lines[] = '<lastmod>';
                                $lines[] = $metaBundle->sourceDateUpdated->format(DateTime::W3C);
                                $lines[] = '</lastmod>';
                            }

                            $lines[] = '</sitemap>';
                        }
                    }
                }
            }
            // Custom sitemap entries
            $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId, false);
            if ($metaBundle !== null) {
                $this->addAdditionalSitemapUrls($metaBundle, $siteId, $lines);
                $this->addAdditionalSitemaps($metaBundle, $siteId, $lines);
            }
            // Sitemap index closing tag
            $lines[] = '</sitemapindex>';

            return implode('', $lines);
        }, Seomatic::$cacheDuration, $dependency);
    }

    /**
     * Invalidate the sitemap index cache
     */
    public function invalidateCache()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::SITEMAP_INDEX_CACHE_TAG);
        Craft::info(
            'Sitemap index cache cleared',
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Add an additional sitemap to the sitemap index, coming from the global
     * meta bundle metaSiteVars->additionalSitemaps
     *
     * @param MetaBundle $metaBundle
     * @param int $groupSiteId
     * @param array $lines
     *
     * @throws Exception
     */
    protected function addAdditionalSitemaps(MetaBundle $metaBundle, int $groupSiteId, array &$lines)
    {
        $additionalSitemaps = $metaBundle->metaSiteVars->additionalSitemaps;
        $additionalSitemaps = empty($additionalSitemaps) ? [] : $additionalSitemaps;
        // Allow plugins/modules to add custom URLs
        $event = new RegisterSitemapsEvent([
            'sitemaps' => $additionalSitemaps,
            'siteId' => $groupSiteId,
        ]);
        Event::trigger(SitemapIndexTemplate::class, SitemapIndexTemplate::EVENT_REGISTER_SITEMAPS, $event);
        $additionalSitemaps = array_filter($event->sitemaps);
        // Output the sitemap index
        if (!empty($additionalSitemaps)) {
            foreach ($additionalSitemaps as $additionalSitemap) {
                if (!empty($additionalSitemap['loc'])) {
                    $loc = MetaValueHelper::parseString($additionalSitemap['loc']);
                    $lines[] = '<sitemap>';
                    $lines[] = '<loc>';
                    $lines[] = Html::encode($loc);
                    $lines[] = '</loc>';
                    // Find the most recent date
                    $dateUpdated = !empty($additionalSitemap['lastmod'])
                        ? $additionalSitemap['lastmod']
                        : new DateTime();
                    $lines[] = '<lastmod>';
                    $lines[] = $dateUpdated->format(DateTime::W3C);
                    $lines[] = '</lastmod>';
                    $lines[] = '</sitemap>';
                }
            }
        }
    }

    /**
     * Add an additional "custom" sitemap to the sitemap index, with URLs coming from
     * the global meta bundle metaSiteVars->additionalSitemapUrls
     *
     * @param MetaBundle $metaBundle
     * @param int $groupSiteId
     * @param array $lines
     *
     * @throws Exception
     */
    protected function addAdditionalSitemapUrls(MetaBundle $metaBundle, int $groupSiteId, array &$lines)
    {
        $additionalSitemapUrls = $metaBundle->metaSiteVars->additionalSitemapUrls;
        $additionalSitemapUrls = empty($additionalSitemapUrls) ? [] : $additionalSitemapUrls;
        // Allow plugins/modules to add custom URLs
        $event = new RegisterSitemapUrlsEvent([
            'sitemaps' => $additionalSitemapUrls,
            'siteId' => $groupSiteId,
        ]);
        Event::trigger(SitemapCustomTemplate::class, SitemapCustomTemplate::EVENT_REGISTER_SITEMAP_URLS, $event);
        $additionalSitemapUrls = array_filter($event->sitemaps);
        // Output the sitemap index
        if (!empty($additionalSitemapUrls)) {
            $sitemapUrl = Seomatic::$plugin->sitemaps->sitemapCustomUrlForSiteId(
                $groupSiteId
            );
            $lines[] = '<sitemap>';
            $lines[] = '<loc>';
            $lines[] = Html::encode($sitemapUrl);
            $lines[] = '</loc>';
            // Find the most recent date
            $dateUpdated = $metaBundle->metaSiteVars->additionalSitemapUrlsDateUpdated
                ?? new DateTime();
            foreach ($additionalSitemapUrls as $additionalSitemapUrl) {
                if (!empty($additionalSitemapUrl['lastmod'])) {
                    if ($additionalSitemapUrl['lastmod'] > $dateUpdated) {
                        $dateUpdated = $additionalSitemapUrl['lastmod'];
                    }
                }
            }
            if ($dateUpdated !== null) {
                $lines[] = '<lastmod>';
                $lines[] = $dateUpdated->format(DateTime::W3C);
                $lines[] = '</lastmod>';
            }
            $lines[] = '</sitemap>';
        }
    }
}
