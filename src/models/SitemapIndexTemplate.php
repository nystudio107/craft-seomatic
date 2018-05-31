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

use Craft;
use craft\models\SiteGroup;

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
            'path'       => 'sitemaps/<groupId:\d+>/sitemap.xml',
            'template'   => '',
            'controller' => 'sitemap',
            'action'     => 'sitemap-index',
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
        /** @var SiteGroup $siteGroup */
        $siteGroup = Craft::$app->getSites()->getGroupById($groupId);
        $groupSiteIds = $siteGroup->getSiteIds();
        if ($siteGroup === null) {
            throw new NotFoundHttpException(Craft::t('seomatic', 'Sitemap.xml not found for groupId {groupId}', [
                'groupId' => $groupId,
            ]));
        }
        $dependency = new TagDependency([
            'tags' => [
                $this::GLOBAL_SITEMAP_CACHE_TAG,
                $this::SITEMAP_INDEX_CACHE_TAG,
            ],
        ]);

        return $cache->getOrSet($this::CACHE_KEY.$groupId, function () use ($groupSiteIds) {
            Craft::info(
                'Sitemap index cache miss',
                __METHOD__
            );
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            $lines[] = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            // One sitemap entry for each MeteBundle
            $metaBundles = Seomatic::$plugin->metaBundles->getContentMetaBundles(true);
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
}
