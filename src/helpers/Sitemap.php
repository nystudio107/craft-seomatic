<?php

namespace nystudio107\seomatic\helpers;

use benf\neo\elements\Block as NeoBlock;
use Craft;
use craft\base\Element;
use craft\base\Event;
use craft\console\Application as ConsoleApplication;
use craft\db\Paginator;
use craft\elements\Asset;
use craft\elements\Entry;
use craft\errors\SiteNotFoundException;
use craft\fields\Assets as AssetsField;
use DateTime;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\events\IncludeSitemapEntryEvent;
use nystudio107\seomatic\events\ModifySitemapQueryEvent;
use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\helpers\EagerLoad as EagerLoadHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\Seomatic;
use Throwable;
use yii\base\Exception;
use yii\helpers\Html;
use function array_intersect_key;
use function count;
use function in_array;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.18
 */
class Sitemap
{
    /**
     * @event IncludeSitemapEntryEvent The event that is triggered when an entry is
     * about to be included in a sitemap
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\IncludeSitemapEntryEvent;
     * use nystudio107\seomatic\helpers\Sitemap;
     * use yii\base\Event;
     * Event::on(Sitemap::class, Sitemap::EVENT_INCLUDE_SITEMAP_ENTRY, function(IncludeSitemapEntryEvent $e) {
     *     $e->include = false;
     * });
     * ```
     */
    public const EVENT_INCLUDE_SITEMAP_ENTRY = 'includeSitemapEntry';

    /**
     * @event ModifySitemapQueryEvent Allows the modification of the element query used to generate a sitemap
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\ModifySitemapQueryEvent;
     * use nystudio107\seomatic\helpers\Sitemap;
     * use yii\base\Event;
     * Event::on(Sitemap::class, Sitemap::EVENT_MODIFY_SITEMAP_QUERY, function(ModifySitemapQueryEvent $e) {
     *     $e->query->limit(10);
     * });
     * ```
     */
    public const EVENT_MODIFY_SITEMAP_QUERY = 'modifySitemapQuery';

    /**
     * @const The number of assets to return in a single paginated query
     */
    public const SITEMAP_QUERY_PAGE_SIZE = 100;

    /**
     * Generate a sitemap with the passed in $params
     *
     * @param array $params
     * @return string
     * @throws SiteNotFoundException
     */
    public static function generateSitemap(array $params): ?string
    {
        $groupId = $params['groupId'];
        $type = $params['type'];
        $handle = $params['handle'];
        $siteId = $params['siteId'];
        $page = $params['page'];

        // Get an array of site ids for this site group
        $groupSiteIds = [];

        if (Seomatic::$settings->siteGroupsSeparate) {
            if (empty($groupId)) {
                try {
                    $thisSite = Craft::$app->getSites()->getSiteById($siteId);
                    if ($thisSite !== null) {
                        $group = $thisSite->getGroup();
                        $groupId = $group->id;
                    }
                } catch (Throwable $e) {
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
            return null;
        }
        $multiSite = count($metaBundle->sourceAltSiteSettings) > 1;
        $totalElements = null;
        $urlsetLine = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        if ($metaBundle->metaSitemapVars->sitemapAssets) {
            $urlsetLine .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
            $urlsetLine .= ' xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"';
        }
        if ($multiSite) {
            $urlsetLine .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
        }
        if ((bool)$metaBundle->metaSitemapVars->newsSitemap) {
            $urlsetLine .= ' xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"';
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
            $totalElements = self::getTotalElementsInSitemap($seoElement, $metaBundle);
        }

        // If no elements exist, just exit
        if (!$totalElements) {
            return null;
        }

        // Stash the sitemap attributes so they can be modified on a per-entry basis
        $stashedSitemapAttrs = $metaBundle->metaSitemapVars->getAttributes();
        $stashedGlobalVarsAttrs = $metaBundle->metaGlobalVars->getAttributes();
        // Use craft\db\Paginator to paginate the results so we don't exceed any memory limits
        // See batch() and each() discussion here: https://github.com/yiisoft/yii2/issues/8420
        // and here: https://github.com/craftcms/cms/issues/7338

        // Allow listeners to modify the query before we use it
        $elementQuery = $seoElement::sitemapElementsQuery($metaBundle);
        $event = new ModifySitemapQueryEvent([
            'query' => $elementQuery,
            'metaBundle' => $metaBundle,
        ]);
        Event::trigger(self::class, self::EVENT_MODIFY_SITEMAP_QUERY, $event);

        $sitemapPageSize = $metaBundle->metaSitemapVars->sitemapPageSize;
        $elementQuery->limit($metaBundle->metaSitemapVars->sitemapLimit ?? null);

        // Eager load assets & relations
        if ($metaBundle->metaSitemapVars->sitemapAssets || $metaBundle->metaSitemapVars->sitemapFiles) {
            $woof = EagerLoadHelper::sitemapEagerLoadMap($metaBundle);
            //$elementQuery->with(EagerLoadHelper::sitemapEagerLoadMap($metaBundle));
        }

        // If this is not a paged sitemap, go through full results
        if (empty($sitemapPageSize)) {
            $pagedSitemap = false;
            $paginator = new Paginator($elementQuery, [
                'pageSize' => self::SITEMAP_QUERY_PAGE_SIZE,
            ]);
            $elements = $paginator->getPageResults();
        } else {
            $sitemapPage = empty($page) ? 1 : $page;
            $pagedSitemap = true;
            $elementQuery->limit($sitemapPageSize);
            $elementQuery->offset(($sitemapPage - 1) * $sitemapPageSize);
            $elements = $elementQuery->all();
            $totalElements = $sitemapPageSize;
            $paginator = new Paginator($elementQuery, [
                'pageSize' => $sitemapPageSize,
            ]);
        }

        $currentElement = 1;

        do {
            if (Craft::$app instanceof ConsoleApplication) {
                if ($pagedSitemap) {
                    $message = sprintf('Query %d elements', $sitemapPageSize);
                } else {
                    $message = sprintf('Query %d / %d - elements: %d',
                        $paginator->getCurrentPage(),
                        $paginator->getTotalPages(),
                        $paginator->getTotalResults());
                }
                echo $message . PHP_EOL;
            }
            /** @var Element $element */
            foreach ($elements as $element) {
                // Output some info if this is a console app
                if (Craft::$app instanceof ConsoleApplication) {
                    echo "Processing element {$currentElement}/{$totalElements} - {$element->title}" . PHP_EOL;
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
                $enabled = $element->getEnabledForSite($metaBundle->sourceSiteId);
                $enabled = $enabled && $path !== null && $metaBundle->metaSitemapVars->sitemapUrls && $robotsEnabled;
                $event = new IncludeSitemapEntryEvent([
                    'include' => $enabled,
                    'element' => $element,
                    'metaBundle' => $metaBundle,
                ]);
                Event::trigger(self::class, self::EVENT_INCLUDE_SITEMAP_ENTRY, $event);
                // Only add in a sitemap entry if it meets our criteria
                if ($event->include) {
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
                    $dateUpdated = $element->dateUpdated ?? $element->dateCreated ?? new DateTime();
                    $lines[] = '<url>';
                    // Standard sitemap key/values
                    $lines[] = '<loc>';
                    $lines[] = self::encodeSitemapEntity($url);
                    $lines[] = '</loc>';
                    $lines[] = '<lastmod>';
                    $lines[] = $dateUpdated->format(DateTime::W3C);
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
                        foreach ($metaBundle->sourceAltSiteSettings as $altSiteSettings) {
                            if (in_array($altSiteSettings['siteId'], $groupSiteIds, false) && SiteHelper::siteEnabledWithUrls($altSiteSettings['siteId'])) {
                                $altElement = null;
                                if ($seoElement !== null) {
                                    /** @var Element $altElement */
                                    $altElement = $seoElement::sitemapAltElement(
                                        $metaBundle,
                                        $element->id,
                                        $altSiteSettings['siteId']
                                    );
                                }
                                // Make sure to only include the `hreflang` if the element exists,
                                // and sitemaps are on for it
                                if (Seomatic::$settings->addHrefLang && $altElement && $altElement->url) {
                                    list($altSourceId, $altSourceBundleType, $altSourceHandle, $altSourceSiteId, $altTypeId)
                                        = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($altElement);
                                    $altMetaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                                        $altSourceBundleType,
                                        $altSourceId,
                                        $altSourceSiteId
                                    );
                                    if ($altMetaBundle) {
                                        $altEnabled = $altElement->getEnabledForSite($altMetaBundle->sourceSiteId);
                                        // Make sure this entry isn't disabled
                                        self::combineFieldSettings($altElement, $altMetaBundle);
                                        if ($altEnabled && $altMetaBundle->metaSitemapVars->sitemapUrls) {
                                            try {
                                                $altUrl = UrlHelper::siteUrl($altElement->url, null, null, $altSourceId);
                                            } catch (Exception $e) {
                                                $altUrl = $altElement->url;
                                            }
                                            $altUrl = UrlHelper::absoluteUrlWithProtocol($altUrl);
                                            // If this is the primary site, add it as x-default, too
                                            if ($primarySiteId === $altSourceSiteId && Seomatic::$settings->addXDefaultHrefLang) {
                                                $lines[] = '<xhtml:link rel="alternate"'
                                                    . ' hreflang="x-default"'
                                                    . ' href="' . self::encodeSitemapEntity($altUrl) . '"'
                                                    . ' />';
                                            }
                                            $lines[] = '<xhtml:link rel="alternate"'
                                                . ' hreflang="' . $altSiteSettings['language'] . '"'
                                                . ' href="' . self::encodeSitemapEntity($altUrl) . '"'
                                                . ' />';
                                        }
                                    }
                                }
                            }
                        }
                    }
                    // Handle news sitemaps https://developers.google.com/search/docs/crawling-indexing/sitemaps/news-sitemap
                    if ((bool)$metaBundle->metaSitemapVars->newsSitemap) {
                        $now = new DateTime();
                        $interval = $now->diff($dateUpdated);
                        if ($interval->days <= 2) {
                            $language = strtolower($element->getLanguage());
                            if (!str_starts_with($language, 'zh')) {
                                $language = substr($language, 0, 2);
                            }
                            $lines[] = '<news:news>';
                            $lines[] = '<news:publication>';
                            $lines[] = '<news:name>' . self::encodeSitemapEntity($metaBundle->metaSitemapVars->newsPublicationName) . '</news:name>';
                            $lines[] = '<news:language>' . $language . '</news:language>';
                            $lines[] = '</news:publication>';
                            $lines[] = '<news:publication_date>' . $dateUpdated->format(DateTime::W3C) . '</news:publication_date>';
                            $lines[] = '<news:title>' . self::encodeSitemapEntity($element->title) . '</news:title>';
                            $lines[] = '</news:news>';
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
                            $resolvedField = self::resolveNestedField($element, $assetField);
                            if ($resolvedField !== null) {
                                $assets = $resolvedField->all();
                                /** @var Asset[] $assets */
                                foreach ($assets as $asset) {
                                    self::assetSitemapItem($asset, $metaBundle, $lines);
                                }
                            }
                        }
                        // Assets embeded in Block fields
                        $blockFields = FieldHelper::fieldsOfTypeFromElement(
                            $element,
                            FieldHelper::BLOCK_FIELD_CLASS_KEY,
                            true
                        );
                        foreach ($blockFields as $blockField) {
                            $resolvedField = self::resolveNestedField($element, $blockField);
                            if ($resolvedField !== null) {
                                $blocks = $resolvedField->all();
                                /** @var Entry[]|NeoBlock[]|object[] $blocks */
                                foreach ($blocks as $block) {
                                    $assetFields = [];
                                    if ($block instanceof Entry) {
                                        $assetFields = FieldHelper::matrixFieldsOfType($block, AssetsField::class);
                                    }
                                    if ($block instanceof NeoBlock) {
                                        $assetFields = FieldHelper::neoFieldsOfType($block, AssetsField::class);
                                    }
                                    foreach ($assetFields as $assetField) {
                                        foreach ($block[$assetField]->all() as $asset) {
                                            self::assetSitemapItem($asset, $metaBundle, $lines);
                                        }
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
                        $resolvedField = self::resolveNestedField($element, $assetField);
                        if ($resolvedField !== null) {
                            $assets = $resolvedField->all();
                            foreach ($assets as $asset) {
                                self::assetFilesSitemapLink($asset, $metaBundle, $lines);
                            }
                        }
                    }
                    // Assets embeded in Block fields
                    $blockFields = FieldHelper::fieldsOfTypeFromElement(
                        $element,
                        FieldHelper::BLOCK_FIELD_CLASS_KEY,
                        true
                    );
                    foreach ($blockFields as $blockField) {
                        $resolvedField = self::resolveNestedField($element, $blockField);
                        if ($resolvedField !== null) {
                            $blocks = $resolvedField->all();
                            /** @var Entry[]|NeoBlock[]|object[] $blocks */
                            foreach ($blocks as $block) {
                                $assetFields = [];
                                if ($block instanceof Entry) {
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
                $currentElement++;
            }

            if ($pagedSitemap) {
                break;
            }

            if ($paginator->getCurrentPage() == $paginator->getTotalPages()) {
                break;
            }

            $paginator->currentPage++;
            $elements = $paginator->getPageResults();
        } while (!empty($elements));

        // Sitemap closing tag
        $lines[] = '</urlset>';

        return implode('', $lines);
    }

    /**
     * Fields coming back from FieldHelper:: are delimited by a . if they are nested fields like
     * ContentBlock or Matrix fields, so we need to drill down to find the actual field in question
     *
     * @param Element $element
     * @param $name
     * @return Element|mixed
     */
    public static function resolveNestedField(Element $element, $name)
    {
        $result = array_reduce(explode('.', $name), function($o, $p) {
            return $o === null ? $o : $o->$p;
        }, $element);

        return $result;
    }

    /**
     * Encode sitemap entities to make sure they follow the RFC-3986 standard for URIs, the RFC-3987 standard for IRIs
     * and the XML standard.
     * ref: https://sitemaps.org/protocol.html#escaping
     *
     * @param string $text
     * @return string
     */
    public static function encodeSitemapEntity(string $text): string
    {
        return Html::encode(UrlHelper::encodeUrl($text));
    }

    /**
     * Return the total number of elements in a sitemap, respecting metabundle settings.
     *
     * @param class-string<SeoElementInterface> $seoElement
     * @param MetaBundle $metaBundle
     * @return int|null
     */
    public static function getTotalElementsInSitemap(string $seoElement, MetaBundle $metaBundle): ?int
    {
        // Allow listeners to modify the query before we use it
        $query = $seoElement::sitemapElementsQuery($metaBundle);
        $event = new ModifySitemapQueryEvent([
            'query' => $query,
            'metaBundle' => $metaBundle,
        ]);
        Event::trigger(self::class, self::EVENT_MODIFY_SITEMAP_QUERY, $event);
        $totalElements = $query->count();

        if ($metaBundle->metaSitemapVars->sitemapLimit && ($totalElements > $metaBundle->metaSitemapVars->sitemapLimit)) {
            $totalElements = $metaBundle->metaSitemapVars->sitemapLimit;
        }

        return $totalElements;
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
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId, $typeId)
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
     * @param Element $element
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
                if ($seoSettingsField !== null) {
                    if ($seoSettingsField->sitemapTabEnabled) {
                        Seomatic::$plugin->metaBundles->pruneFieldMetaBundleSettings($fieldMetaBundle, $fieldHandle);
                        // Combine the meta sitemap vars
                        $attributes = $fieldMetaBundle->metaSitemapVars->getAttributes();

                        // Get the explicitly inherited attributes
                        $inherited = array_keys(ArrayHelper::remove($attributes, 'inherited', []));

                        $attributes = array_intersect_key(
                            $attributes,
                            array_flip((array)$seoSettingsField->sitemapEnabledFields)
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
     * @param Asset $asset
     * @param MetaBundle $metaBundle
     * @param array $lines
     */
    protected static function assetSitemapItem(Asset $asset, MetaBundle $metaBundle, array &$lines)
    {
        if ((bool)$asset->enabledForSite && $asset->getUrl() !== null) {
            switch ($asset->kind) {
                case 'image':
                    $transform = Craft::$app->getImageTransforms()->getTransformByHandle($metaBundle->metaSitemapVars->sitemapAssetTransform ?? '');
                    $lines[] = '<image:image>';
                    $lines[] = '<image:loc>';
                    $lines[] = self::encodeSitemapEntity(UrlHelper::absoluteUrlWithProtocol($asset->getUrl($transform, true)));
                    $lines[] = '</image:loc>';
                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->sitemapImageFieldMap as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';
                        if (!empty($fieldName) && !empty($asset[$fieldName]) && !empty($propName)) {
                            $lines[] = '<image:' . $propName . '>';
                            $lines[] = self::encodeSitemapEntity($asset[$fieldName]);
                            $lines[] = '</image:' . $propName . '>';
                        }
                    }
                    $lines[] = '</image:image>';
                    break;

                case 'video':
                    $lines[] = '<video:video>';
                    $lines[] = '<video:content_loc>';
                    $lines[] = self::encodeSitemapEntity(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                    $lines[] = '</video:content_loc>';
                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->sitemapVideoFieldMap as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';
                        if (!empty($fieldName) && !empty($asset[$fieldName]) && !empty($propName)) {
                            $lines[] = '<video:' . $propName . '>';
                            $lines[] = self::encodeSitemapEntity($asset[$fieldName]);
                            $lines[] = '</video:' . $propName . '>';
                        }
                    }
                    $lines[] = '</video:video>';
                    break;
            }
        }
    }

    /**
     * @param Asset $asset
     * @param MetaBundle $metaBundle
     * @param array $lines
     */
    protected static function assetFilesSitemapLink(Asset $asset, MetaBundle $metaBundle, array &$lines)
    {
        if ((bool)$asset->enabledForSite && $asset->getUrl() !== null) {
            if (in_array($asset->kind, SitemapTemplate::FILE_TYPES, false)) {
                $dateUpdated = $asset->dateUpdated ?? $asset->dateCreated ?? new DateTime();
                $lines[] = '<url>';
                $lines[] = '<loc>';
                $lines[] = self::encodeSitemapEntity(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));
                $lines[] = '</loc>';
                $lines[] = '<lastmod>';
                $lines[] = $dateUpdated->format(DateTime::W3C);
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
