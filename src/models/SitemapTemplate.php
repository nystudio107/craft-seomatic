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
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\services\MetaBundles;

use Craft;
use craft\base\Element;
use craft\elements\Asset;
use craft\elements\Entry;
use craft\elements\Category;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\models\SiteGroup;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;

use yii\caching\TagDependency;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapTemplate extends FrontendTemplate implements SitemapInterface
{
    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'SitemapTemplate';

    const CACHE_KEY = 'seomatic_sitemap_';

    const SITEMAP_CACHE_TAG = 'seomatic_sitemap_';

    const FILE_TYPES = [
        'excel',
        'pdf',
        'illustrator',
        'powerpoint',
        'text',
        'word',
        'xml',
    ];

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|SitemapTemplate
     */
    public static function create(array $config = [])
    {
        $defaults = [
            'path' => 'sitemaps/<groupId:\d+>/<type:[-\w\.*]+>/<handle:[-\w\.*]+>/<siteId:\d+>/<file:[-\w\.*]+>',
            'template' => '',
            'controller' => 'sitemap',
            'action' => 'sitemap',
        ];
        $config = array_merge($config, $defaults);

        return new SitemapTemplate($config);
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
     */
    public function render(array $params = []): string
    {
        $cache = Craft::$app->getCache();
        $groupId = $params['groupId'];
        if (Seomatic::$settings->siteGroupsSeparate) {
            /** @var SiteGroup $siteGroup */
            $siteGroup = Craft::$app->getSites()->getGroupById($groupId);
            $groupSiteIds = $siteGroup->getSiteIds();
        } else {
            $groupSiteIds = Craft::$app->getSites()->allSiteIds;
        }
        $type = $params['type'];
        $handle = $params['handle'];
        $siteId = $params['siteId'];
        $dependency = new TagDependency([
            'tags' => [
                $this::GLOBAL_SITEMAP_CACHE_TAG,
                $this::SITEMAP_CACHE_TAG.$handle.$siteId,
            ],
        ]);

        return $cache->getOrSet($this::CACHE_KEY.$groupId.$type.$handle.$siteId, function () use (
            $type,
            $handle,
            $siteId,
            $groupSiteIds
        ) {
            Craft::info(
                'Sitemap cache miss: '.$handle.'/'.$siteId,
                __METHOD__
            );
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            // One sitemap entry for each element
            $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle($type, $handle, $siteId);
            // If it's disabled, just throw a 404
            if ($metaBundle === null || !$metaBundle->metaSitemapVars->sitemapUrls) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
            }
            $multiSite = \count($metaBundle->sourceAltSiteSettings) > 1;
            $elements = null;
            if ($metaBundle) {
                $urlsetLine = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
                if ($metaBundle->metaSitemapVars->sitemapAssets) {
                    $urlsetLine .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
                    $urlsetLine .= ' xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"';
                }
                if ($multiSite) {
                    $urlsetLine .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
                }
                $urlsetLine .= '>';
                $lines[] = $urlsetLine;
                // Handle each element type separately
                switch ($metaBundle->sourceBundleType) {
                    case MetaBundles::SECTION_META_BUNDLE:
                        $elements = Entry::find()
                            ->section($metaBundle->sourceHandle)
                            ->siteId($metaBundle->sourceSiteId)
                            ->enabledForSite(true)
                            ->limit($metaBundle->metaSitemapVars->sitemapLimit)
                            ->all();
                        break;
                    case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                        $elements = Category::find()
                            ->group($metaBundle->sourceHandle)
                            ->siteId($metaBundle->sourceSiteId)
                            ->limit($metaBundle->metaSitemapVars->sitemapLimit)
                            ->enabledForSite(true)
                            ->all();
                        break;
                    case MetaBundles::PRODUCT_META_BUNDLE:
                        if (Seomatic::$commerceInstalled) {
                            $commerce = CommercePlugin::getInstance();
                            if ($commerce !== null) {
                                $elements = Product::find()
                                    ->type($metaBundle->sourceHandle)
                                    ->siteId($metaBundle->sourceSiteId)
                                    ->limit($metaBundle->metaSitemapVars->sitemapLimit)
                                    ->enabledForSite(true)
                                    ->all();
                            }
                        }
                        break;
                }
                // If no elements exist, just throw a 404
                if ($elements === null) {
                    throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
                }
                // Stash the meta bundle so the object can be modified on a per-entry basis
                $stashedMetaBundle = $metaBundle;
                // Output the sitemap entry
                /** @var  $element Entry */
                foreach ($elements as $element) {
                    $metaBundle = clone $stashedMetaBundle;
                    // Make sure this entry isn't disabled
                    $this->combineFieldSettings($element, $metaBundle);
                    // Special case for the __home__ URI
                    $path = ($element->uri === '__home__') ? '' : $element->uri;
                    if ($path !== null && $metaBundle->metaSitemapVars->sitemapUrls) {
                        $url = UrlHelper::siteUrl($path, null, null, $metaBundle->sourceSiteId);
                        $dateUpdated = $element->dateUpdated ?? $element->dateCreated ?? new \DateTime;
                        $lines[] = '  <url>';
                        // Standard sitemap key/values
                        $lines[] = '    <loc>';
                        $lines[] = '      '.Html::encode($url);
                        $lines[] = '    </loc>';
                        $lines[] = '    <lastmod>';
                        $lines[] = '      '.$dateUpdated->format(\DateTime::W3C);
                        $lines[] = '    </lastmod>';
                        $lines[] = '    <changefreq>';
                        $lines[] = '      '.$metaBundle->metaSitemapVars->sitemapChangeFreq;
                        $lines[] = '    </changefreq>';
                        $lines[] = '    <priority>';
                        $lines[] = '      '.$metaBundle->metaSitemapVars->sitemapPriority;
                        $lines[] = '    </priority>';
                        // Handle alternate URLs if this is multi-site
                        if ($multiSite && $metaBundle->metaSitemapVars->sitemapAltLinks) {
                            /** @var  $altSiteSettings */
                            foreach ($metaBundle->sourceAltSiteSettings as $altSiteSettings) {
                                if (\in_array($altSiteSettings['siteId'], $groupSiteIds, false)) {
                                    $altElement = null;
                                    // Handle each element type separately
                                    switch ($metaBundle->sourceBundleType) {
                                        case MetaBundles::SECTION_META_BUNDLE:
                                            $altElement = Entry::find()
                                                ->section($metaBundle->sourceHandle)
                                                ->id($element->id)
                                                ->siteId($altSiteSettings['siteId'])
                                                ->enabledForSite(true)
                                                ->limit(1)
                                                ->one();
                                            break;

                                        case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                                            $altElement = Category::find()
                                                ->id($element->id)
                                                ->siteId($altSiteSettings['siteId'])
                                                ->limit(1)
                                                ->enabledForSite(true)
                                                ->one();
                                            break;
                                        case MetaBundles::PRODUCT_META_BUNDLE:
                                            if (Seomatic::$commerceInstalled) {
                                                $commerce = CommercePlugin::getInstance();
                                                if ($commerce !== null) {
                                                    $altElement = Product::find()
                                                        ->id($element->id)
                                                        ->siteId($altSiteSettings['siteId'])
                                                        ->limit(1)
                                                        ->enabledForSite(true)
                                                        ->one();
                                                }
                                            }
                                            break;
                                    }
                                    // Make sure to only include the `hreflang` if the element exists,
                                    // and sitemaps are on for it
                                    if ($altElement) {
                                        list($altSourceId, $altSourceBundleType, $altSourceHandle, $altSourceSiteId)
                                            = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($altElement);
                                        $altMetaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                                            $altSourceBundleType,
                                            $altSourceId,
                                            $altSourceSiteId
                                        );
                                        if ($altMetaBundle) {
                                            // Make sure this entry isn't disabled
                                            $this->combineFieldSettings($altElement, $altMetaBundle);
                                            if ($altMetaBundle->metaSitemapVars->sitemapUrls) {
                                                $lines[] = '    <xhtml:link rel="alternate"'
                                                    .' hreflang="'.$altSiteSettings['language'].'"'
                                                    .' href="'.Html::encode($altElement->url).'"'
                                                    .' />';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        // Handle any Assets
                        if ($metaBundle->metaSitemapVars->sitemapAssets) {
                            // Regular Assets fields
                            $assetFields = FieldHelper::fieldsOfTypeFromElement(
                                $element,
                                FieldHelper::ASSET_FIELD_CLASS_KEY,
                                true
                            );
                            foreach ($assetFields as $assetField) {
                                $assets = $element[$assetField]->all();
                                /** @var Asset[] $assets */
                                foreach ($assets as $asset) {
                                    $this->assetSitemapItem($asset, $metaBundle, $lines);
                                }
                            }
                            // Assets embeded in Matrix fields
                            $matrixFields = FieldHelper::fieldsOfTypeFromElement(
                                $element,
                                FieldHelper::BLOCK_FIELD_CLASS_KEY,
                                true
                            );
                            foreach ($matrixFields as $matrixField) {
                                $matrixBlocks = $element[$matrixField]->all();
                                /** @var MatrixBlock[] $matrixBlocks */
                                foreach ($matrixBlocks as $matrixBlock) {
                                    $assetFields = FieldHelper::matrixFieldsOfType($matrixBlock, AssetsField::class);
                                    foreach ($assetFields as $assetField) {
                                        foreach ($matrixBlock[$assetField]->all() as $asset) {
                                            $this->assetSitemapItem($asset, $metaBundle, $lines);
                                        }
                                    }
                                }
                            }
                        }
                        $lines[] = '  </url>';
                    }
                    // Include links to any known file types in the assets fields
                    if ($metaBundle->metaSitemapVars->sitemapFiles) {
                        // Regular Assets fields
                        $assetFields = FieldHelper::fieldsOfTypeFromElement(
                            $element,
                            FieldHelper::ASSET_FIELD_CLASS_KEY,
                            true
                        );
                        foreach ($assetFields as $assetField) {
                            $assets = $element[$assetField]->all();
                            foreach ($assets as $asset) {
                                $this->assetFilesSitemapLink($asset, $metaBundle, $lines);
                            }
                        }
                        // Assets embeded in Matrix fields
                        $matrixFields = FieldHelper::fieldsOfTypeFromElement(
                            $element,
                            FieldHelper::BLOCK_FIELD_CLASS_KEY,
                            true
                        );
                        foreach ($matrixFields as $matrixField) {
                            $matrixBlocks = $element[$matrixField]->all();
                            /** @var MatrixBlock $matrixBlock */
                            foreach ($matrixBlocks as $matrixBlock) {
                                $assetFields = FieldHelper::matrixFieldsOfType($matrixBlock, AssetsField::class);
                                foreach ($assetFields as $assetField) {
                                    foreach ($matrixBlock[$assetField]->all() as $asset) {
                                        $this->assetFilesSitemapLink($asset, $metaBundle, $lines);
                                    }
                                }
                            }
                        }
                    }
                }
                // Sitemap index closing tag
                $lines[] = '</urlset>';
            }

            return implode("\r\n", $lines);
        }, Seomatic::$cacheDuration, $dependency);
    }

    /**
     * Invalidate a sitemap cache
     *
     * @param string $handle
     * @param int    $siteId
     */
    public function invalidateCache(string $handle, int $siteId)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::SITEMAP_CACHE_TAG.$handle.$siteId);
        Craft::info(
            'Sitemap cache cleared: '.$handle,
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Combine any SEO Settings field settings from $element with the passed in
     * $metaBundle
     *
     * @param Element    $element
     * @param MetaBundle $metaBundle
     */
    protected function combineFieldSettings(Element $element, MetaBundle $metaBundle)
    {
        $fieldHandles = FieldHelper::fieldsOfTypeFromElement(
            $element,
            FieldHelper::SEO_SETTINGS_CLASS_KEY,
            true
        );
        foreach ($fieldHandles as $fieldHandle) {
            if (!empty($element->$fieldHandle)) {
                /** @var MetaBundle $metaBundle */
                $fieldMetaBundle = $element->$fieldHandle;
                if ($fieldMetaBundle !== null) {
                    // Combine the meta sitemap vars
                    $attributes = $fieldMetaBundle->metaSitemapVars->getAttributes();
                    $attributes = array_filter(
                        $attributes,
                        [ArrayHelper::class, 'preserveBools']
                    );
                    $metaBundle->metaSitemapVars->setAttributes($attributes, false);
                }
            }
        }
    }

    /**
     * @param Asset      $asset
     * @param MetaBundle $metaBundle
     * @param array      $lines
     */
    protected function assetSitemapItem(Asset $asset, MetaBundle $metaBundle, array &$lines)
    {
        if ($asset->enabledForSite) {
            switch ($asset->kind) {
                case 'image':
                    $lines[] = '    <image:image>';
                    $lines[] = '      <image:loc>';
                    $lines[] = '        '.Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                    $lines[] = '      </image:loc>';
                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->sitemapImageFieldMap as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';
                        if (!empty($asset[$fieldName]) && !empty($propName)) {
                            $lines[] = '      <image:'.$propName.'>';
                            $lines[] = '        '.Html::encode($asset[$fieldName]);
                            $lines[] = '      </image:'.$propName.'>';
                        }
                    }
                    $lines[] = '    </image:image>';
                    break;

                case 'video':
                    $lines[] = '    <video:video>';
                    $lines[] = '      <video:content_loc>';
                    $lines[] = '        '.Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                    $lines[] = '      </video:content_loc>';
                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->sitemapVideoFieldMap as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';
                        if (!empty($asset[$fieldName]) && !empty($propName)) {
                            $lines[] = '      <video:'.$propName.'>';
                            $lines[] = '        '.Html::encode($asset[$fieldName]);
                            $lines[] = '      </video:'.$propName.'>';
                        }
                    }
                    $lines[] = '    </video:video>';
                    break;
            }
        }
    }

    /**
     * @param Asset      $asset
     * @param MetaBundle $metaBundle
     * @param array      $lines
     */
    protected function assetFilesSitemapLink(Asset $asset, MetaBundle $metaBundle, array &$lines)
    {
        if ($asset->enabledForSite) {
            if (\in_array($asset->kind, $this::FILE_TYPES, false)) {
                $dateUpdated = $asset->dateUpdated ?? $asset->dateCreated ?? new \DateTime;
                $lines[] = '  <url>';
                $lines[] = '    <loc>';
                $lines[] = '      '.Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                $lines[] = '    </loc>';
                $lines[] = '    <lastmod>';
                $lines[] = '      '.$dateUpdated->format(\DateTime::W3C);
                $lines[] = '    </lastmod>';
                $lines[] = '    <changefreq>';
                $lines[] = '      '.$metaBundle->metaSitemapVars->sitemapChangeFreq;
                $lines[] = '    </changefreq>';
                $lines[] = '    <priority>';
                $lines[] = '      '.$metaBundle->metaSitemapVars->sitemapPriority;
                $lines[] = '    </priority>';
                $lines[] = '  </url>';
            }
        }
    }
}
