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

namespace nystudio107\seomatic\jobs;

use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\services\MetaBundles;

use nystudio107\fastcgicachebust\FastcgiCacheBust;

use Craft;
use craft\base\Element;
use craft\console\Application as ConsoleApplication;
use craft\elements\Asset;
use craft\elements\Entry;
use craft\elements\Category;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\models\SiteGroup;
use craft\queue\BaseJob;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;

use yii\base\Exception;
use yii\caching\TagDependency;
use yii\helpers\Html;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class GenerateSitemap extends BaseJob
{
    // Properties
    // =========================================================================

    public $groupId;

    public $type;

    public $handle;

    public $siteId;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        if (Seomatic::$settings->siteGroupsSeparate) {
            /** @var SiteGroup $siteGroup */
            $siteGroup = Craft::$app->getSites()->getGroupById($this->groupId);
            $groupSiteIds = $siteGroup->getSiteIds();
        } else {
            $groupSiteIds = Craft::$app->getSites()->allSiteIds;
        }

        // Output some info if this is a console app
        if (Craft::$app instanceof ConsoleApplication) {
            echo $this->description.PHP_EOL;
        }

        $lines = [];
        // Sitemap index XML header and opening tag
        $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
        // One sitemap entry for each element
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $this->type,
            $this->handle,
            $this->siteId
        );
        // If it's disabled, just exit
        if ($metaBundle === null || !$metaBundle->metaSitemapVars->sitemapUrls) {
            return;
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
                    $query = Entry::find()
                        ->section($metaBundle->sourceHandle)
                        ->siteId($metaBundle->sourceSiteId)
                        ->enabledForSite(true)
                        ->limit($metaBundle->metaSitemapVars->sitemapLimit);
                    if ($metaBundle->sourceType === 'structure'
                        && !empty($metaBundle->metaSitemapVars->structureDepth)) {
                        $query->level($metaBundle->metaSitemapVars->structureDepth.'<=');
                    }
                    $elements = $query->all();
                    break;
                case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                    $query = Category::find()
                        ->group($metaBundle->sourceHandle)
                        ->siteId($metaBundle->sourceSiteId)
                        ->limit($metaBundle->metaSitemapVars->sitemapLimit)
                        ->enabledForSite(true);
                    if (!empty($metaBundle->metaSitemapVars->structureDepth)) {
                        $query->level($metaBundle->metaSitemapVars->structureDepth.'<=');
                    }
                    $elements = $query->all();
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
            // If no elements exist, just exit
            if ($elements === null) {
                return;
            }
            // Stash the sitemap attributes so they can be modified on a per-entry basis
            $stashedSitemapAttrs = $metaBundle->metaSitemapVars->getAttributes();
            $currentElement = 0;
            $totalElements = \count($elements);
            // Output the sitemap entry
            /** @var  $element Entry */
            foreach ($elements as $element) {
                $this->setProgress($queue, $currentElement++ / $totalElements);
                // Output some info if this is a console app
                if (Craft::$app instanceof ConsoleApplication) {
                    echo "Processing element {$currentElement}/{$totalElements} - {$element->title}".PHP_EOL;
                }
                $metaBundle->metaSitemapVars->setAttributes($stashedSitemapAttrs, false);
                // Make sure this entry isn't disabled
                $this->combineFieldSettings($element, $metaBundle);
                // Special case for the __home__ URI
                $path = ($element->uri === '__home__') ? '' : $element->uri;
                if ($path !== null && $metaBundle->metaSitemapVars->sitemapUrls) {
                    try {
                        $url = UrlHelper::siteUrl($path, null, null, $metaBundle->sourceSiteId);
                    } catch (Exception $e) {
                        $url = '';
                    }
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

        $cache = Craft::$app->getCache();
        $cacheKey = SitemapTemplate::CACHE_KEY.$this->groupId.$this->type.$this->handle.$this->siteId;
        $dependency = new TagDependency([
            'tags' => [
                SitemapTemplate::GLOBAL_SITEMAP_CACHE_TAG,
                SitemapTemplate::SITEMAP_CACHE_TAG.$this->handle.$this->siteId,
            ],
        ]);
        $lines = implode("\r\n", $lines);
        // Cache sitemap cache; we use this instead of Seomatic::$cacheDuration because for
        // Control Panel requests, we set Seomatic::$cacheDuration = 1 so that they are never
        // cached
        $cacheDuration = Seomatic::$devMode
            ? Seomatic::DEVMODE_CACHE_DURATION
            : null;
        $result = $cache->set($cacheKey, $lines, $cacheDuration, $dependency);
        Craft::debug('Sitemap cache result: '.print_r($result, true).' for cache key: '.$cacheKey, __METHOD__);
        // If the FastCGI Cache Bust plugin is installed, clear its caches too
        $plugin = Craft::$app->getPlugins()->getPlugin('fastcgi-cache-bust');
        if ($plugin !== null) {
            FastcgiCacheBust::$plugin->cache->clearAll();
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('app', 'Generating {handle} sitemap', [
            'handle' => $this->handle,
        ]);
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
                /** @var SeoSettings $seoSettingsField */
                $seoSettingsField = Craft::$app->getFields()->getFieldByHandle($fieldHandle);
                /** @var MetaBundle $metaBundle */
                $fieldMetaBundle = $element->$fieldHandle;
                if ($fieldMetaBundle !== null && $seoSettingsField !== null && $seoSettingsField->sitemapTabEnabled) {
                    // Combine the meta sitemap vars
                    $attributes = $fieldMetaBundle->metaSitemapVars->getAttributes();
                    Craft::error(print_r($attributes, true), 'seomatic');
                    Craft::error(print_r($seoSettingsField->sitemapEnabledFields, true), 'seomatic');
                    $attributes = \array_intersect_key(
                        $attributes,
                        array_flip($seoSettingsField->sitemapEnabledFields)
                    );
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
        if ($asset->enabledForSite && $asset->getUrl() !== null) {
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
        if ($asset->enabledForSite && $asset->getUrl() !== null) {
            if (\in_array($asset->kind, SitemapTemplate::FILE_TYPES, false)) {
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
