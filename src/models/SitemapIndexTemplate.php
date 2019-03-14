<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\events\RegisterSitemapUrlsEvent;
use nystudio107\seomatic\events\RegisterSitemapsEvent;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use Craft;
use craft\models\SiteGroup;

use yii\caching\TagDependency;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\base\Event;

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
    const EVENT_REGISTER_SITEMAPS = 'registerSitemaps';

    const TEMPLATE_TYPE = 'SitemapIndexTemplate';

    const CACHE_KEY = 'seomatic_sitemap_index';

    const SITEMAP_INDEX_CACHE_TAG = 'seomatic_sitemap_index';

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
            /** @var SiteGroup $siteGroup */
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
                $this::GLOBAL_SITEMAP_CACHE_TAG,
                $this::SITEMAP_INDEX_CACHE_TAG,
            ],
        ]);

        return $cache->getOrSet($this::CACHE_KEY.$groupId.'.'.$siteId, function () use ($groupSiteIds, $siteId) {
            Craft::info(
                'Sitemap index cache miss',
                __METHOD__
            );
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            $lines[] = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            // One sitemap entry for each MeteBundle
            $metaBundles = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
            Seomatic::$plugin->metaBundles->pruneVestigialMetaBundles($metaBundles);
            /** @var  $metaBundle MetaBundle */
            foreach ($metaBundles as $metaBundle) {
                if (\in_array($metaBundle->sourceSiteId, $groupSiteIds, false)
                    && $metaBundle->metaSitemapVars->sitemapUrls) {
                    $sitemapUrl = Seomatic::$plugin->sitemaps->sitemapUrlForBundle(
                        $metaBundle->sourceBundleType,
                        $metaBundle->sourceHandle,
                        $metaBundle->sourceSiteId
                    );
                    $lines[] = '  <sitemap>';
                    $lines[] = '    <loc>';
                    $lines[] = '      '.Html::encode($sitemapUrl);
                    $lines[] = '    </loc>';
                    if ($metaBundle->sourceDateUpdated !== null) {
                        $lines[] = '    <lastmod>';
                        $lines[] = '      '.$metaBundle->sourceDateUpdated->format(\DateTime::W3C);
                        $lines[] = '    </lastmod>';
                    }
                    $lines[] = '  </sitemap>';
                }
            }
            // Custom sitemap entries
            foreach ($groupSiteIds as $groupSiteId) {
                $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($groupSiteId, false);
                if ($metaBundle !== null) {
                    $this->addAdditionalSitemapUrls($metaBundle, $groupSiteId, $lines);
                    $this->addAdditionalSitemaps($metaBundle, $groupSiteId, $lines);
                }
            }
            // Sitemap index closing tag
            $lines[] = '</sitemapindex>';

            return implode("\r\n", $lines);
        }, Seomatic::$cacheDuration, $dependency);
    }

    /**
     * Invalidate the sitemap index cache
     */
    public function invalidateCache()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::SITEMAP_INDEX_CACHE_TAG);
        Craft::info(
            'Sitemap index cache cleared',
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Add an additional sitemaps to the sitemap index, coming from the global
     * meta bundle metaSiteVars->additionalSitemaps
     *
     * @param MetaBundle $metaBundle
     * @param int        $groupSiteId
     * @param array      $lines
     *
     * @throws \Exception
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
        Event::trigger(SitemapCustomTemplate::class, SitemapCustomTemplate::EVENT_REGISTER_SITEMAP_URLS, $event);
        $additionalSitemaps = array_filter($event->sitemaps);
        // Output the sitemap index
        if (!empty($additionalSitemaps)) {
            foreach ($additionalSitemaps as $additionalSitemap) {
                $loc = MetaValueHelper::parseString($additionalSitemap['loc']);
                if (!empty($additionalSitemap['loc'])) {
                    $lines[] = '  <sitemap>';
                    $lines[] = '    <loc>';
                    $lines[] = '      '.Html::encode($loc);
                    $lines[] = '    </loc>';
                    // Find the most recent date
                    $dateUpdated = !empty($additionalSitemap['lastmod'])
                        ? $additionalSitemap['lastmod']
                        : new \DateTime;
                    $lines[] = '    <lastmod>';
                    $lines[] = '      '.$dateUpdated->format(\DateTime::W3C);
                    $lines[] = '    </lastmod>';
                    $lines[] = '  </sitemap>';
                }
            }
        }
    }

    /**
     * Add an additional "custom" sitemap to the sitemap index, with URLs coming from
     * the global meta bundle metaSiteVars->additionalSitemapUrls
     *
     * @param MetaBundle $metaBundle
     * @param int        $groupSiteId
     * @param array      $lines
     *
     * @throws \Exception
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
            $lines[] = '  <sitemap>';
            $lines[] = '    <loc>';
            $lines[] = '      '.Html::encode($sitemapUrl);
            $lines[] = '    </loc>';
            // Find the most recent date
            $dateUpdated = $metaBundle->metaSiteVars->additionalSitemapUrlsDateUpdated
                ?? new \DateTime;
            foreach ($additionalSitemapUrls as $additionalSitemapUrl) {
                if (!empty($additionalSitemapUrl['lastmod'])) {
                    if ($additionalSitemapUrl['lastmod'] > $dateUpdated) {
                        $dateUpdated = $additionalSitemapUrl['lastmod'];
                    }
                }
            }
            if ($dateUpdated !== null) {
                $lines[] = '    <lastmod>';
                $lines[] = '      '.$dateUpdated->format(\DateTime::W3C);
                $lines[] = '    </lastmod>';
            }
            $lines[] = '  </sitemap>';
        }
    }
}
