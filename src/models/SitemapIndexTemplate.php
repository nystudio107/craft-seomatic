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
use nystudio107\seomatic\models\MetaBundle;

use Craft;
use craft\helpers\UrlHelper;

use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapIndexTemplate extends FrontendTemplate
{
    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'SitemapIndexTemplate';

    const CACHE_KEY = 'seomatic_sitemap_index';

    const GLOBAL_SITEMAP_CACHE_TAG = 'seomatic_sitemap';

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
            'path'       => 'sitemap.xml',
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
     */
    public function render($params = []): string
    {
        $cache = Craft::$app->getCache();
        $duration = Craft::$app->getConfig()->getGeneral()->devMode ? 1 : null;
        $dependency = new TagDependency(
            [
                'tags' =>
                    [
                        $this::GLOBAL_SITEMAP_CACHE_TAG,
                        $this::SITEMAP_INDEX_CACHE_TAG,
                    ],
            ]
        );

        return $cache->getOrSet($this::CACHE_KEY, function () {
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            $lines[] = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            // One sitemap entry for each MeteBundle
            $metaBundles = Seomatic::$plugin->helper->metaBundles();
            /** @var  $metaBundle MetaBundle */
            foreach ($metaBundles as $metaBundle) {
                $sitemapUrl = UrlHelper::siteUrl(
                    '/sitemaps/'
                    . $metaBundle->sourceHandle
                    . '/'
                    . $metaBundle->sourceSiteId
                    . '/sitemap.xml'
                );
                $lines[] = '  <sitemap>';
                $lines[] = '    <loc>';
                $lines[] = '      ' . $sitemapUrl;
                $lines[] = '    </loc>';
                $lines[] = '  </sitemap>';
            }
            // Sitemap index closing tag
            $lines[] = '</sitemapindex>';

            return implode("\r\n", $lines);
        }, $duration, $dependency);
    }
}
