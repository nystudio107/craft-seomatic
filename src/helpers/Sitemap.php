<?php
namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\events\RegisterSitemapsEvent;
use nystudio107\seomatic\events\SitemapGeneratedEvent;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\Seomatic;
use nystudio107\fastcgicachebust\FastcgiCacheBust;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\jobs\GenerateSitemap;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\SitemapTemplate;

use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\console\Application as ConsoleApplication;
use craft\db\Paginator;
use craft\elements\Asset;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\models\SiteGroup;

use yii\base\Event;
use yii\base\Exception;
use yii\caching\TagDependency;
use yii\helpers\Html;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.18
 */
class Sitemap
{
    // Constants
    // =========================================================================

    const EVENT_SITEMAP_GENERATED = 'sitemapGenerated';

    // Static Methods
    // =========================================================================

    public static function generateSitemap(array $params)
    {
        /** @var \craft\queue\Queue $queue */
        $queue = $params['queue'] ?? null;
        /** @var GenerateSitemap $job */
        $job = $params['job'] ?? null;

        if (!$job) {
            $groupId = $params['groupId'];
            $siteId = $params['siteId'];
            $handle = $params['handle'];
            $type = $params['type'];
            $queueJobCacheKey = $params['queueJobCacheKey'];
        } else {
            $groupId = $job->groupId;
            $siteId = $job->siteId;
            $handle = $job->handle;
            $type = $job->type;
            $queueJobCacheKey = $job->queueJobCacheKey;
        }

        // Get an array of site ids for this site group
        $groupSiteIds = [];

        if (Seomatic::$settings->siteGroupsSeparate) {
            /** @var SiteGroup $siteGroup */
            if (empty($groupId)) {
                try {
                    $thisSite = Craft::$app->getSites()->getSiteById($siteId);
                    if ($thisSite !== null) {
                        $group = $thisSite->getGroup();
                        $groupId = $group->id;
                    }
                } catch (\Throwable $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            $siteGroup = Craft::$app->getSites()->getGroupById($groupId);
            if ($siteGroup !== null) {
                $groupSiteIds = $siteGroup->getSiteIds();
            }
        }

        if (empty($groupSiteIds)) {
            $groupSiteIds = Craft::$app->getSites()->allSiteIds;
        }

        // Output some info if this is a console app
        if ($job && Craft::$app instanceof ConsoleApplication) {
            echo $job->description.PHP_EOL;
        }

        $lines = [];
        // Sitemap index XML header and opening tag
        $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $lines[] = '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>';
        // One sitemap entry for each element
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $type,
            $handle,
            $siteId
        );
        // If it doesn't exist, exit
        if ($metaBundle === null) {
            return;
        }
        $multiSite = \count($metaBundle->sourceAltSiteSettings) > 1;
        $totalElements = null;
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
            // Get all of the elements for this meta bundle type
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
            if ($seoElement !== null) {
                // Ensure `null` so that the resulting element query is correct
                if (empty($metaBundle->metaSitemapVars->sitemapLimit)) {
                    $metaBundle->metaSitemapVars->sitemapLimit = null;
                }
                $totalElements = $seoElement::sitemapElementsQuery($metaBundle)->count();
                if  ($metaBundle->metaSitemapVars->sitemapLimit && ($totalElements > $metaBundle->metaSitemapVars->sitemapLimit)) {
                    $totalElements = $metaBundle->metaSitemapVars->sitemapLimit;
                }
            }
            // If no elements exist, just exit
            if (!$totalElements) {
                return;
            }
            // Stash the sitemap attributes so they can be modified on a per-entry basis
            $stashedSitemapAttrs = $metaBundle->metaSitemapVars->getAttributes();
            $stashedGlobalVarsAttrs = $metaBundle->metaGlobalVars->getAttributes();
            // Use craft\db\Paginator to paginate the results so we don't exceed any memory limits
            // See batch() and each() discussion here: https://github.com/yiisoft/yii2/issues/8420
            // and here: https://github.com/craftcms/cms/issues/7338
            $paginator = new Paginator($seoElement::sitemapElementsQuery($metaBundle), [
                'pageSize' => GenerateSitemap::SITEMAP_QUERY_PAGE_SIZE,
            ]);
            $currentElement = 0;
            // Iterate through the paginated results
            while ($currentElement < $totalElements) {
                $elements = $paginator->getPageResults();
                if (Craft::$app instanceof ConsoleApplication) {
                    echo 'Query ' . $paginator->getCurrentPage() . '/' . $paginator->getTotalPages()
                        . ' - elements: ' . $paginator->getTotalResults()
                        . PHP_EOL;
                }
                /** @var ElementInterface $element */
                foreach ($elements as $element) {
                    if ($job) {
                        $job->updateProgress($currentElement++ / $totalElements);
                    } else {
                        $currentElement++;
                    }
                    // Output some info if this is a console app
                    if (Craft::$app instanceof ConsoleApplication) {
                        echo "Processing element {$currentElement}/{$totalElements} - {$element->title}".PHP_EOL;
                    }

                    $metaBundle->metaSitemapVars->setAttributes($stashedSitemapAttrs, false);
                    $metaBundle->metaGlobalVars->setAttributes($stashedGlobalVarsAttrs, false);
                    // Combine in any per-entry type settings
                    self::combineEntryTypeSettings($seoElement, $element, $metaBundle);
                    // Make sure this entry isn't disabled
                    self::combineFieldSettings($element, $metaBundle);
                    // Special case for the __home__ URI
                    $path = ($element->uri === '__home__') ? '' : $element->uri;
                    // Check to see if robots is `none` or `no index`
                    $robotsEnabled = true;
                    if (!empty($metaBundle->metaGlobalVars->robots)) {
                        $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                            $metaBundle->metaGlobalVars->robots !== 'noindex';
                    }
                    // Only add in a sitemap entry if it meets our criteria
                    if ($path !== null && $metaBundle->metaSitemapVars->sitemapUrls && $robotsEnabled) {
                        // Get the url and canonicalUrl
                        try {
                            $url = UrlHelper::siteUrl($path, null, null, $metaBundle->sourceSiteId);
                        } catch (Exception $e) {
                            $url = '';
                        }
                        $url = UrlHelper::absoluteUrlWithProtocol($url);
                        if (Seomatic::$settings->excludeNonCanonicalUrls) {
                            Seomatic::$matchedElement = $element;
                            MetaValue::cache();
                            $path = $metaBundle->metaGlobalVars->parsedValue('canonicalUrl');
                            try {
                                $canonicalUrl = UrlHelper::siteUrl($path, null, null, $metaBundle->sourceSiteId);
                            } catch (Exception $e) {
                                $canonicalUrl = '';
                            }
                            $canonicalUrl = UrlHelper::absoluteUrlWithProtocol($canonicalUrl);
                            if ($url !== $canonicalUrl) {
                                Craft::info("Excluding URL: {$url} from the sitemap because it does not match the Canonical URL: {$canonicalUrl} - " . $metaBundle->metaGlobalVars->canonicalUrl . " - " . $element->uri);
                                continue;
                            }
                        }
                        $dateUpdated = $element->dateUpdated ?? $element->dateCreated ?? new \DateTime;
                        $lines[] = '<url>';
                        // Standard sitemap key/values
                        $lines[] = '<loc>';
                        $lines[] = Html::encode($url);
                        $lines[] = '</loc>';
                        $lines[] = '<lastmod>';
                        $lines[] = $dateUpdated->format(\DateTime::W3C);
                        $lines[] = '</lastmod>';
                        $lines[] = '<changefreq>';
                        $lines[] = $metaBundle->metaSitemapVars->sitemapChangeFreq;
                        $lines[] = '</changefreq>';
                        $lines[] = '<priority>';
                        $lines[] = $metaBundle->metaSitemapVars->sitemapPriority;
                        $lines[] = '</priority>';
                        // Handle alternate URLs if this is multi-site
                        if ($multiSite && $metaBundle->metaSitemapVars->sitemapAltLinks) {
                            $primarySiteId = Craft::$app->getSites()->getPrimarySite()->id;
                            /** @var  $altSiteSettings */
                            foreach ($metaBundle->sourceAltSiteSettings as $altSiteSettings) {
                                if (\in_array($altSiteSettings['siteId'], $groupSiteIds, false) && SiteHelper::siteEnabledWithUrls($altSiteSettings['siteId'])) {
                                    $altElement = null;
                                    if ($seoElement !== null) {
                                        $altElement = $seoElement::sitemapAltElement(
                                            $metaBundle,
                                            $element->id,
                                            $altSiteSettings['siteId']
                                        );
                                    }
                                    // Make sure to only include the `hreflang` if the element exists,
                                    // and sitemaps are on for it
                                    if ($altElement && $altElement->url) {
                                        [$altSourceId, $altSourceBundleType, $altSourceHandle, $altSourceSiteId, $altTypeId]
                                            = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($altElement);
                                        $altMetaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                                            $altSourceBundleType,
                                            $altSourceId,
                                            $altSourceSiteId
                                        );
                                        if ($altMetaBundle) {
                                            // Make sure this entry isn't disabled
                                            self::combineFieldSettings($altElement, $altMetaBundle);
                                            $altUrl = UrlHelper::absoluteUrlWithProtocol($altElement->url);
                                            if ($altMetaBundle->metaSitemapVars->sitemapUrls) {
                                                // If this is the primary site, add it as x-default, too
                                                if ($primarySiteId === $altSourceSiteId && Seomatic::$settings->addXDefaultHrefLang) {
                                                    $lines[] = '<xhtml:link rel="alternate"'
                                                        .' hreflang="x-default"'
                                                        .' href="'.Html::encode($altUrl).'"'
                                                        .' />';
                                                }
                                                $lines[] = '<xhtml:link rel="alternate"'
                                                    .' hreflang="'.$altSiteSettings['language'].'"'
                                                    .' href="'.Html::encode($altUrl).'"'
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
                                    self::assetSitemapItem($asset, $metaBundle, $lines);
                                }
                            }
                            // Assets embeded in Block fields
                            $blockFields = FieldHelper::fieldsOfTypeFromElement(
                                $element,
                                FieldHelper::BLOCK_FIELD_CLASS_KEY,
                                true
                            );
                            foreach ($blockFields as $blockField) {
                                $blocks = $element[$blockField]->all();
                                /** @var MatrixBlock[]|NeoBlock[]|SuperTableBlock[] $blocks */
                                foreach ($blocks as $block) {
                                    $assetFields = [];
                                    if ($block instanceof MatrixBlock) {
                                        $assetFields = FieldHelper::matrixFieldsOfType($block, AssetsField::class);
                                    }
                                    if ($block instanceof NeoBlock) {
                                        $assetFields = FieldHelper::neoFieldsOfType($block, AssetsField::class);
                                    }
                                    if ($block instanceof SuperTableBlock) {
                                        $assetFields = FieldHelper::superTableFieldsOfType($block, AssetsField::class);
                                    }
                                    foreach ($assetFields as $assetField) {
                                        foreach ($block[$assetField]->all() as $asset) {
                                            self::assetSitemapItem($asset, $metaBundle, $lines);
                                        }
                                    }
                                }
                            }
                        }
                        $lines[] = '</url>';
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
                                self::assetFilesSitemapLink($asset, $metaBundle, $lines);
                            }
                        }
                        // Assets embeded in Block fields
                        $blockFields = FieldHelper::fieldsOfTypeFromElement(
                            $element,
                            FieldHelper::BLOCK_FIELD_CLASS_KEY,
                            true
                        );
                        foreach ($blockFields as $blockField) {
                            $blocks = $element[$blockField]->all();
                            /** @var MatrixBlock $block */
                            foreach ($blocks as $block) {
                                $assetFields = [];
                                if ($block instanceof MatrixBlock) {
                                    $assetFields = FieldHelper::matrixFieldsOfType($block, AssetsField::class);
                                }
                                if ($block instanceof NeoBlock) {
                                    $assetFields = FieldHelper::neoFieldsOfType($block, AssetsField::class);
                                }
                                foreach ($assetFields as $assetField) {
                                    foreach ($block[$assetField]->all() as $asset) {
                                        self::assetFilesSitemapLink($asset, $metaBundle, $lines);
                                    }
                                }
                            }
                        }
                    }
                }
                $paginator->currentPage++;
            }
            // Sitemap closing tag
            $lines[] = '</urlset>';
        }

        $cache = Craft::$app->getCache();
        $cacheKey = SitemapTemplate::CACHE_KEY.$groupId.$type.$handle.$siteId;
        $dependency = new TagDependency([
            'tags' => [
                SitemapTemplate::GLOBAL_SITEMAP_CACHE_TAG,
                SitemapTemplate::SITEMAP_CACHE_TAG.$handle.$siteId,
            ],
        ]);
        $lines = implode('', $lines);

        // Cache sitemap cache; we use this instead of Seomatic::$cacheDuration because for
        // Control Panel requests, we set Seomatic::$cacheDuration = 1 so that they are never
        // cached
        $cacheDuration = Seomatic::$devMode
            ? Seomatic::DEVMODE_CACHE_DURATION
            : null;
        $result = $cache->set($cacheKey, $lines, $cacheDuration, $dependency);
        // Remove the queue job id from the cache too
        $cache->delete($queueJobCacheKey);
        Craft::debug('Sitemap cache result: '.print_r($result, true).' for cache key: '.$cacheKey, __METHOD__);
        // Output some info if this is a console app
        if (Craft::$app instanceof ConsoleApplication) {
            echo 'Sitemap cache result: '.print_r($result, true).' for cache key: '.$cacheKey.PHP_EOL;
        }
        // If the FastCGI Cache Bust plugin is installed, clear its caches too
        $plugin = Craft::$app->getPlugins()->getPlugin('fastcgi-cache-bust');
        if ($plugin !== null) {
            FastcgiCacheBust::$plugin->cache->clearAll();
        }

        // Fire event
        $event = new SitemapGeneratedEvent([
          'siteId' => $siteId,
          'groupId' => $groupId,
          'handle' => $handle,
          'type' => $type,
          'cacheKey' => $cacheKey,
          'cacheDependency' => $dependency,
        ]);
        Event::trigger(Sitemap::class, Sitemap::EVENT_SITEMAP_GENERATED, $event);
    }

    /**
     * Combine any per-entry type field settings from $element with the passed in
     * $metaBundle
     *
     * @param SeoElementInterface|string $seoElement
     * @param Element $element
     * @param MetaBundle $metaBundle
     */
    protected static function combineEntryTypeSettings($seoElement, Element $element, MetaBundle $metaBundle)
    {
        if (!empty($seoElement::typeMenuFromHandle($metaBundle->sourceHandle))) {
            [$sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId, $typeId]
                = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
            $entryTypeBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                $sourceBundleType,
                $sourceId,
                $sourceSiteId,
                $typeId
            );
            // Combine in any settings for this entry type
            if ($entryTypeBundle) {
                // Combine the meta sitemap vars
                $attributes = $entryTypeBundle->metaSitemapVars->getAttributes();
                $attributes = array_filter(
                    $attributes,
                    [ArrayHelper::class, 'preserveBools']
                );
                $metaBundle->metaSitemapVars->setAttributes($attributes, false);

                // Combine the meta global vars
                $attributes = $entryTypeBundle->metaGlobalVars->getAttributes();
                $attributes = array_filter(
                    $attributes,
                    [ArrayHelper::class, 'preserveBools']
                );
                $metaBundle->metaGlobalVars->setAttributes($attributes, false);
            }
        }
    }

    /**
     * Combine any SEO Settings field settings from $element with the passed in
     * $metaBundle
     *
     * @param Element    $element
     * @param MetaBundle $metaBundle
     */
    protected static function combineFieldSettings(Element $element, MetaBundle $metaBundle)
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
                if ($fieldMetaBundle !== null && $seoSettingsField !== null) {
                    if ($seoSettingsField->sitemapTabEnabled) {
                        // Combine the meta sitemap vars
                        $attributes = $fieldMetaBundle->metaSitemapVars->getAttributes();

                        // Get the explicitly inherited attributes
                        $inherited = array_keys(ArrayHelper::remove($attributes, 'inherited', []));

                        $attributes = \array_intersect_key(
                            $attributes,
                            array_flip($seoSettingsField->sitemapEnabledFields)
                        );
                        $attributes = array_filter(
                            $attributes,
                            [ArrayHelper::class, 'preserveBools']
                        );

                        foreach ($inherited as $inheritedAttribute) {
                            unset($attributes[$inheritedAttribute]);
                        }

                        $metaBundle->metaSitemapVars->setAttributes($attributes, false);
                    }
                    // Combine the meta global vars
                    $attributes = $fieldMetaBundle->metaGlobalVars->getAttributes();
                    $attributes = array_filter(
                        $attributes,
                        [ArrayHelper::class, 'preserveBools']
                    );
                    $metaBundle->metaGlobalVars->setAttributes($attributes, false);
                }
            }
        }
    }

    /**
     * @param Asset      $asset
     * @param MetaBundle $metaBundle
     * @param array      $lines
     */
    protected static function assetSitemapItem(Asset $asset, MetaBundle $metaBundle, array &$lines)
    {
        if ((bool)$asset->enabledForSite && $asset->getUrl() !== null) {
            switch ($asset->kind) {
                case 'image':
                    $lines[] = '<image:image>';
                    $lines[] = '<image:loc>';
                    $lines[] = Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                    $lines[] = '</image:loc>';
                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->sitemapImageFieldMap as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';
                        if (!empty($asset[$fieldName]) && !empty($propName)) {
                            $lines[] = '<image:'.$propName.'>';
                            $lines[] = Html::encode($asset[$fieldName]);
                            $lines[] = '</image:'.$propName.'>';
                        }
                    }
                    $lines[] = '</image:image>';
                    break;

                case 'video':
                    $lines[] = '<video:video>';
                    $lines[] = '<video:content_loc>';
                    $lines[] = Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                    $lines[] = '</video:content_loc>';
                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->sitemapVideoFieldMap as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';
                        if (!empty($asset[$fieldName]) && !empty($propName)) {
                            $lines[] = '<video:'.$propName.'>';
                            $lines[] = Html::encode($asset[$fieldName]);
                            $lines[] = '</video:'.$propName.'>';
                        }
                    }
                    $lines[] = '</video:video>';
                    break;
            }
        }
    }

    /**
     * @param Asset      $asset
     * @param MetaBundle $metaBundle
     * @param array      $lines
     */
    protected static function assetFilesSitemapLink(Asset $asset, MetaBundle $metaBundle, array &$lines)
    {
        if ((bool)$asset->enabledForSite && $asset->getUrl() !== null) {
            if (\in_array($asset->kind, SitemapTemplate::FILE_TYPES, false)) {
                $dateUpdated = $asset->dateUpdated ?? $asset->dateCreated ?? new \DateTime;
                $lines[] = '<url>';
                $lines[] = '<loc>';
                $lines[] = Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                $lines[] = '</loc>';
                $lines[] = '<lastmod>';
                $lines[] = $dateUpdated->format(\DateTime::W3C);
                $lines[] = '</lastmod>';
                $lines[] = '<changefreq>';
                $lines[] = $metaBundle->metaSitemapVars->sitemapChangeFreq;
                $lines[] = '</changefreq>';
                $lines[] = '<priority>';
                $lines[] = $metaBundle->metaSitemapVars->sitemapPriority;
                $lines[] = '</priority>';
                $lines[] = '</url>';
            }
        }
    }
}
