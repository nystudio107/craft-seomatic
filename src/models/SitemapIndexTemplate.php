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
use craft\helpers\UrlHelper;
use craft\models\SiteGroup;

use yii\caching\TagDependency;
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
        $model = new SitemapIndexTemplate($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        if ($this->scenario === 'default') {
        }

        return $fields;
    }

    /**
     * @inheritdoc
     *
     * @throws NotFoundHttpException if the sitemap.xml doesn't exist
     */
    public function render($params = []): string
    {
        $cache = Craft::$app->getCache();
        $groupId = $params['groupId'];
        /** @var SiteGroup $siteGroup */
        $siteGroup = Craft::$app->getSites()->getGroupById($groupId);
        $groupSiteIds = $siteGroup->getSiteIds();
        if ($siteGroup) {
            $duration = Seomatic::$devMode ? $this::DEVMODE_SITEMAP_CACHE_DURATION : $this::SITEMAP_CACHE_DURATION;
            $dependency = new TagDependency([
                'tags' => [
                    $this::GLOBAL_SITEMAP_CACHE_TAG,
                    $this::SITEMAP_INDEX_CACHE_TAG,
                ],
            ]);

            return $cache->getOrSet($this::CACHE_KEY.$groupId, function () use ($groupId, $groupSiteIds) {
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
                /** @var  $metaBundle MetaBundle */
                foreach ($metaBundles as $metaBundle) {
                    if (in_array($metaBundle->sourceSiteId, $groupSiteIds)) {
                        $sitemapUrl = UrlHelper::siteUrl(
                            '/sitemaps/'
                            .$groupId
                            .'/'
                            .$metaBundle->sourceBundleType
                            .'/'
                            .$metaBundle->sourceHandle
                            .'/'
                            .$metaBundle->sourceSiteId
                            .'/sitemap.xml',
                            null,
                            null,
                            $metaBundle->sourceSiteId
                        );
                        $lines[] = '  <sitemap>';
                        $lines[] = '    <loc>';
                        $lines[] = '      '.$sitemapUrl;
                        $lines[] = '    </loc>';
                        if (!empty($metaBundle->sourceDateUpdated)) {
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
            }, $duration, $dependency);
        } else {
            throw new NotFoundHttpException(Craft::t('seomatic', 'Sitemap.xml not found for groupId {groupId}', [
                'groupId' => "{$groupId}",
            ]));
        }
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
