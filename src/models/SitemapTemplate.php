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

use craft\models\Section;
use craft\models\Section_SiteSettings;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\helpers\Field as FieldHelper;

use Craft;
use craft\elements\Entry;
use craft\elements\Asset;
use craft\fields\Assets as AssetsField;
use craft\fields\Matrix as MatrixField;
use craft\models\Site;
use craft\helpers\UrlHelper;
use craft\services\Sites;

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
            'path' => 'sitemaps/<handle:[-\w\.*]+>/<siteId:\d+>/<file:[-\w\.*]+>',
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
        $siteId = $params['siteId'];
        $duration = Craft::$app->getConfig()->getGeneral()->devMode ? 1 : null;
        $dependency = new TagDependency(['tags' => $this::CACHE_TAGS . $handle]);

        return $cache->getOrSet($this::CACHE_KEY . $handle, function () use ($handle, $siteId) {
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            // One sitemap entry for each element
            $metaBundle = Seomatic::$plugin->helper->metaBundleByHandle($handle, $siteId);
            $multiSite = count($metaBundle->sourceAltSiteSettings) > 1;
            $elements = null;
            if ($metaBundle && $metaBundle->sitemapUrls) {
                $urlsetLine = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
                if ($metaBundle->sitemapAssets) {
                    $urlsetLine .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
                    $urlsetLine .= ' xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"';
                }
                if ($multiSite) {
                    $urlsetLine .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
                }
                $urlsetLine .= '>';
                $lines[] = $urlsetLine;
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
                    // Standard sitemap key/values
                    $lines[] = '    <loc>';
                    $lines[] = '      ' . $url;
                    $lines[] = '    </loc>';
                    $lines[] = '    <changefreq>';
                    $lines[] = '      ' . $metaBundle->sitemapChangeFreq;
                    $lines[] = '    </changefreq>';
                    $lines[] = '    <priority>';
                    $lines[] = '      ' . $metaBundle->sitemapPriority;
                    $lines[] = '    </priority>';
                    // Handle alternate URLs if this is multi-site
                    if ($multiSite && $metaBundle->sitemapAltLinks) {
                        /** @var  $altSiteSettings */
                        foreach ($metaBundle->sourceAltSiteSettings as $altSiteSettings) {
                            $altElement = null;
                            // Handle each element type separately
                            switch ($metaBundle->sourceElementType) {
                                case Entry::class:
                                    $altElement = Entry::find()
                                        ->section($metaBundle->sourceHandle)
                                        ->id($element->id)
                                        ->siteId($altSiteSettings['siteId'])
                                        ->limit(1)
                                        ->one();
                                    break;
                            }
                            if ($altElement) {
                                $lines[] = '    <xhtml:link rel="alternate"'
                                    . ' hreflang="' . $altSiteSettings['language'] . '"'
                                    . ' href="' . $altElement->url . '"'
                                    . ' />';
                            }
                        }
                    }
                    // Handle any images
                    if ($metaBundle->sitemapImages) {
                        // Regular Assets fields
                        $assetFields = FieldHelper::fieldsOfType($element, AssetsField::className());
                        foreach ($assetFields as $assetField) {
                            foreach ($element[$assetField] as $asset) {
                                $this->assetSitemapItem($asset, $lines);
                            }
                        }
                        // Assets embeded in Matrix fields
                        $matrixFields = FieldHelper::fieldsOfType($element, MatrixField::className());
                        foreach ($matrixFields as $matrixField) {
                            foreach ($element[$matrixField] as $matrixBlock) {
                                $assetFields = FieldHelper::matrixFieldsOfType($matrixBlock, AssetsField::className());
                                foreach ($assetFields as $assetField) {
                                    foreach ($matrixBlock[$assetField] as $asset) {
                                        $this->assetSitemapItem($asset, $lines);
                                    }
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

    protected function assetSitemapItem(Asset $asset, array &$lines)
    {
        switch ($asset->kind) {
            case 'image':
                $lines[] = '    <image:image>';
                $lines[] = '      <image:loc>';
                $lines[] = '        ' . $asset->url;
                $lines[] = '      </image:loc>';
                $lines[] = '      <image:title>';
                $lines[] = '        ' . $asset->title;
                $lines[] = '      </image:title>';
                $lines[] = '    </image:image>';
                break;

            case 'video':
                $lines[] = '    <video:video>';
                $lines[] = '      <video:content_loc>';
                $lines[] = '        ' . $asset->url;
                $lines[] = '      </video:content_loc>';
                $lines[] = '      <video:title>';
                $lines[] = '        ' . $asset->title;
                $lines[] = '      </video:title>';
                $lines[] = '      <video:thumbnail_loc>';
                $lines[] = '        ' . $asset->getThumbUrl(320);
                $lines[] = '      </video:thumbnail_loc>';
                $lines[] = '    </video:video>';
                break;
        }
    }
}
