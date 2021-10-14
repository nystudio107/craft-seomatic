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

use Craft;
use craft\models\SiteGroup;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\events\RegisterSitemapsEvent;
use nystudio107\seomatic\events\RegisterSitemapUrlsEvent;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;
use yii\caching\TagDependency;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

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

    protected static $defaultConfig = [
        'path' => 'sitemaps-<groupId:\d+>-sitemap.xml',
        'template' => '',
        'controller' => 'sitemap',
        'action' => 'sitemap-index',
    ];

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|SitemapIndexTemplate
     */
    public static function create(array $config = [])
    {
        $config = array_merge($config, static::$defaultConfig);

        return new static($config);
    }

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
                self::GLOBAL_SITEMAP_CACHE_TAG,
                self::SITEMAP_INDEX_CACHE_TAG,
            ],
        ]);

        return $cache->getOrSet(static::CACHE_KEY.$groupId.'.'.$siteId, function () use ($groupSiteIds, $siteId) {
            return $this->generateSitemapIndex($groupSiteIds, $siteId);
        }, Seomatic::$cacheDuration, $dependency);
    }

    // Protected Methods
    // =========================================================================

    /**
     * Wrap a collection of sitemaps in a sitemap index tag and return it.
     *
     * @param string $sitemap
     * @return string
     */
    protected function wrapSitemapIndex(string $sitemap): string
    {
        return <<<SITEMAPINDEX
<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">$sitemap
</sitemapindex>
SITEMAPINDEX;
    }

    /**
     * Generate a sitemap entry based on the passed data.
     *
     * @param string $sitemap
     * @return string
     */
    protected function generateSitemapEntry(string $sitemapUrl, string $lastMod = ''): string
    {
        $lastModTag = !empty($lastMod) ? "<lastmod>$lastMod</lastmod>" : '';
        return <<<SITEMAP

    <sitemap>
        <loc>$sitemapUrl</loc>
        $lastModTag
    </sitemap>
SITEMAP;
    }

    /**
     * Generate the sitemap index.
     *
     * @param array $groupSiteIds
     * @param int|null $siteId
     * @return string
     * @throws \Exception
     */
    protected function generateSitemapIndex(array $groupSiteIds, int $siteId = null): string {
        Craft::info(
            'Sitemap index cache miss',
            __METHOD__
        );

        $sitemapData = '';

        // Sitemap index XML header and opening tag
        // One sitemap entry for each MeteBundle
        $metaBundles = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
        Seomatic::$plugin->metaBundles->pruneVestigialMetaBundles($metaBundles);
        /** @var  $metaBundle MetaBundle */
        foreach ($metaBundles as $metaBundle) {
            $sitemapEnabled = $this->getIsSitemapEnabled($metaBundle);

            // Check to see if robots is `none` or `no index`
            $robotsEnabled = true;
            if (!empty($metaBundle->metaGlobalVars->robots)) {
                $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                    $metaBundle->metaGlobalVars->robots !== 'noindex';
            }
            if ($this->getForceCreatingSitemap($metaBundle)) {
                $robotsEnabled = true;
                $sitemapEnabled = true;
            }

            // Only add in a sitemap entry if it meets our criteria
            if (\in_array($metaBundle->sourceSiteId, $groupSiteIds, false)
                && $sitemapEnabled
                && $robotsEnabled) {

                $sitemapUrl = $this->getSitemapUrlForBundle($metaBundle);

                // Get all of the elements for this meta bundle type
                $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);

                if ($seoElement !== null) {
                    // Ensure `null` so that the resulting element query is correct
                    if (empty($metaBundle->metaSitemapVars->sitemapLimit)) {
                        $metaBundle->metaSitemapVars->sitemapLimit = null;
                    }

                    $totalElements = $seoElement::sitemapElementsQuery($metaBundle)->count();

                    if ($metaBundle->metaSitemapVars->sitemapLimit && ($totalElements > $metaBundle->metaSitemapVars->sitemapLimit)) {
                        $totalElements = $metaBundle->metaSitemapVars->sitemapLimit;
                    }
                }
                // Only add a sitemap to the sitemap index if there's at least 1 element in the resulting sitemap
                if ($totalElements > 0) {
                    $lastMod = $metaBundle->sourceDateUpdated !== null ?  $metaBundle->sourceDateUpdated->format(\DateTime::W3C) : '';
                    $sitemapData .= $this->generateSitemapEntry(Html::encode($sitemapUrl), $lastMod);
                }
            }
        }

        // Custom sitemap entries
        $sitemapData .= $this->getAdditionalSitemapData($siteId);

        return $this->wrapSitemapIndex($sitemapData);
    }

    /**
     * Add additional sitemaps to the sitemap index, coming from the global
     * meta bundle metaSiteVars->additionalSitemaps
     *
     * @param MetaBundle $metaBundle
     * @param int        $groupSiteId
     * @param array      $lines
     * @return string Additional sitemap XML.
     *
     * @throws \Exception
     */
    protected function additionalSitemaps(MetaBundle $metaBundle, int $groupSiteId): string
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

        $sitemapXml = '';

        // Output the sitemap index
        if (!empty($additionalSitemaps)) {
            foreach ($additionalSitemaps as $additionalSitemap) {
                if (!empty($additionalSitemap['loc'])) {
                    $loc = MetaValueHelper::parseString($additionalSitemap['loc']);
                    $dateUpdated = !empty($additionalSitemap['lastmod']) ? $additionalSitemap['lastmod'] : new \DateTime;
                    $lastMod = $dateUpdated->format(\DateTime::W3C);
                    $sitemapXml .= $this->generateSitemapEntry( Html::encode($loc), $lastMod);
                }
            }
        }

        return $sitemapXml;
    }

    /**
     * Add additional "custom" sitemaps to the sitemap index, with URLs coming from
     * the global meta bundle metaSiteVars->additionalSitemapUrls
     *
     * @param MetaBundle $metaBundle
     * @param int        $groupSiteId
     * @param array      $lines
     * @return string Additional sitemap XML.
     * @throws \Exception
     */
    protected function additionalSitemapUrls(MetaBundle $metaBundle, int $groupSiteId): string
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

        $sitemapXml = '';

        // Output the sitemap index
        if (!empty($additionalSitemapUrls)) {
            $sitemapUrl = Seomatic::$plugin->sitemaps->sitemapCustomUrlForSiteId($groupSiteId);

            // Find the most recent date
            $dateUpdated = $metaBundle->metaSiteVars->additionalSitemapUrlsDateUpdated ?? new \DateTime;
            foreach ($additionalSitemapUrls as $additionalSitemapUrl) {
                if (!empty($additionalSitemapUrl['lastmod'])) {
                    if ($additionalSitemapUrl['lastmod'] > $dateUpdated) {
                        $dateUpdated = $additionalSitemapUrl['lastmod'];
                    }
                }
            }
            $lastMod = $dateUpdated->format(\DateTime::W3C);

            $sitemapXml .= $this->generateSitemapEntry(Html::encode($sitemapUrl), $lastMod);
        }

        return $sitemapXml;
    }

    /**
     * Get additional sitemap data.
     *
     * @param int|null $siteId
     * @return string
     * @throws \Exception
     */
    protected function getAdditionalSitemapData(int $siteId): string
    {
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId, false);

        $sitemapData = '';
        if ($metaBundle !== null) {
            $sitemapData .= $this->additionalSitemapUrls($metaBundle, $siteId);
            $sitemapData .= $this->additionalSitemaps($metaBundle, $siteId);
        }

        return $sitemapData;
    }

    /**
     * Get the sitemap URL for the bundle
     *
     * @param MetaBundle $metaBundle
     * @return string
     */
    protected function getSitemapUrlForBundle(MetaBundle $metaBundle): string
    {
        return Seomatic::$plugin->sitemaps->sitemapUrlForBundle(
            $metaBundle->sourceBundleType,
            $metaBundle->sourceHandle,
            $metaBundle->sourceSiteId
        );
    }

    /**
     * Return true whether the sitemap is enabled at all.
     *
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaSitemapVars->sitemapUrls;
    }

    /**
     * Return true whether sitemap should definitely be created for this section.
     *
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getForceCreatingSitemap(MetaBundle $metaBundle): bool
    {
        return Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle);
    }
}
