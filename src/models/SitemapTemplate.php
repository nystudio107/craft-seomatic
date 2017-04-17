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
use nystudio107\seomatic\helpers\Field as FieldHelper;

use Craft;
use craft\helpers\UrlHelper;
use craft\elements\Entry;

use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapTemplate extends FrontendTemplate
{
    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'SitemapTemplate';

    const CACHE_KEY = 'seomatic_sitemap_';

    const CACHE_TAGS = 'seomatic_sitemap_';

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
            'path' => 'sitemaps/<handle:[-\w\.*]+>/<file:[-\w\.*]+>',
            'controller' => 'sitemap',
            'action' => 'sitemap',
        ];
        $config = array_merge($config, $defaults);
        $model = new SitemapTemplate($config);

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
        $handle = $params['handle'];
        $duration = Craft::$app->getConfig()->getGeneral()->devMode ? 1 : null;
        $dependency = new TagDependency(['tags' => $this::CACHE_TAGS . $handle]);

        return $cache->getOrSet($this::CACHE_KEY . $handle, function () use ($handle) {
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            // One sitemap entry for each element
            $metaBundle = Seomatic::$plugin->helper->metaBundleByHandle($handle);
            $elements = null;
            if ($metaBundle && $metaBundle->sitemapUrls) {
                if ($metaBundle->sitemapImages) {
                    $lines[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
                    $lines[] = '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
                } else {
                    $lines[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
                }
                // Handle each element type separately
                switch ($metaBundle->sourceElementType) {
                    case Entry::class:
                        $elements = Entry::find()
                            ->section($metaBundle->sourceHandle)
                            ->siteId($metaBundle->sourceSiteId)
                            ->limit(null);
                        break;
                }
                // Output the sitemap entry
                foreach ($elements as $element) {
                    $path = ($element->uri === '__home__') ? '' : $element->uri;
                    $url = UrlHelper::siteUrl($path);
                    $lines[] = '  <url>';
                    $lines[] = '    <loc>';
                    $lines[] = '      ' . $url;
                    $lines[] = '    </loc>';
                    $lines[] = '    <changefreq>';
                    $lines[] = '      ' . $metaBundle->sitemapChangeFreq;
                    $lines[] = '    </changefreq>';
                    // Handle any images
                    if ($metaBundle->sitemapImages) {
                        $assetFields = FieldHelper::assetFields($element);
                        foreach ($assetFields as $assetField) {
                            foreach ($element[$assetField] as $asset) {
                                if ($asset->kind === 'image') {
                                    $lines[] = '    <image:image>';
                                    $lines[] = '      <image:loc>';
                                    $lines[] = '        ' . $asset->url;
                                    $lines[] = '      </image:loc>';
                                    $lines[] = '      <image:title>';
                                    $lines[] = '        ' . $asset->title;
                                    $lines[] = '      </image:title>';
                                    $lines[] = '    </image:image>';
                                }
                            }
                        }
                    }
                    $lines[] = '  </url>';
                }
                // Sitemap index closing tag
                $lines[] = '</urlset>';
            }

            return implode("\r\n", $lines);
        }, $duration, $dependency);
    }
}
