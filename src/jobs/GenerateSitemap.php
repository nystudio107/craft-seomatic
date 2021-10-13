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

use benf\neo\elements\Block as NeoBlock;
use Craft;
use craft\base\Element;
use craft\console\Application as ConsoleApplication;
use craft\db\Paginator;
use craft\elements\Asset;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\models\SiteGroup;
use craft\queue\BaseJob;
use nystudio107\fastcgicachebust\FastcgiCacheBust;
use nystudio107\seomatic\base\InheritableSettingsModel;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\MetaValue;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\Seomatic;
use verbb\supertable\elements\SuperTableBlockElement as SuperTableBlock;
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
    /**
     * @const The number of assets to return in a single paginated query
     */
    const SITEMAP_QUERY_PAGE_SIZE = 100;

    // Properties
    // =========================================================================

    public $groupId;

    public $type;

    public $handle;

    public $siteId;

    public $queueJobCacheKey;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        // Get an array of site ids for this site group
        $groupSiteIds = [];
        if (Seomatic::$settings->siteGroupsSeparate) {
            /** @var SiteGroup $siteGroup */
            if (empty($this->groupId)) {
                try {
                    $thisSite = Craft::$app->getSites()->getSiteById($this->siteId);
                    if ($thisSite !== null) {
                        $group = $thisSite->getGroup();
                        $this->groupId = $group->id;
                    }
                } catch (\Throwable $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            $siteGroup = Craft::$app->getSites()->getGroupById($this->groupId);
            if ($siteGroup !== null) {
                $groupSiteIds = $siteGroup->getSiteIds();
            }
        }
        if (empty($groupSiteIds)) {
            $groupSiteIds = Craft::$app->getSites()->allSiteIds;
        }
        // Output some info if this is a console app
        if (Craft::$app instanceof ConsoleApplication) {
            echo $this->description . PHP_EOL;
        }

        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $this->type,
            $this->handle,
            $this->siteId
        );

        // If it doesn't exist, exit
        if ($metaBundle === null) {
            return;
        }

        $sitemapData = '';


        // One sitemap entry for each element
        $multiSite = \count($metaBundle->sourceAltSiteSettings) > 1;
        $totalElements = null;

        $xmlNs = $this->getXmlNs($metaBundle, $multiSite);

        // Get all the elements for this meta bundle type
        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
        if ($seoElement !== null) {
            $totalElements = $this->getTotalElements($metaBundle, $seoElement);
        }

        // If no elements exist, just exit
        if (!$totalElements) {
            return;
        }

        // Stash the sitemap attributes, so they can be modified on a per-entry basis
        $stashedSitemapAttrs = $this->getSiteMapVars($metaBundle)->getAttributes();
        $stashedGlobalVarsAttrs = $metaBundle->metaGlobalVars->getAttributes();

        // Use craft\db\Paginator to paginate the results so we don't exceed any memory limits
        // See batch() and each() discussion here: https://github.com/yiisoft/yii2/issues/8420
        // and here: https://github.com/craftcms/cms/issues/7338
        $paginator = new Paginator($seoElement::sitemapElementsQuery($metaBundle), [
            'pageSize' => self::SITEMAP_QUERY_PAGE_SIZE,
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

            /** @var Element $element */
            foreach ($elements as $element) {
                $this->setProgress($queue, $currentElement++ / $totalElements);
                // Output some info if this is a console app
                if (Craft::$app instanceof ConsoleApplication) {
                    echo "Processing element {$currentElement}/{$totalElements} - {$element->title}" . PHP_EOL;
                }

                $this->getSiteMapVars($metaBundle)->setAttributes($stashedSitemapAttrs, false);
                $metaBundle->metaGlobalVars->setAttributes($stashedGlobalVarsAttrs, false);

                // Combine in any per-entry type settings
                $this->combineEntryTypeSettings($seoElement, $element, $metaBundle);

                // Make sure this entry isn't disabled
                $this->combineFieldSettings($element, $metaBundle);

                // Special case for the __home__ URI
                $path = ($element->uri === '__home__') ? '' : $element->uri;

                // Check to see if robots is `none` or `no index`
                $robotsEnabled = true;

                if (!empty($metaBundle->metaGlobalVars->robots)) {
                    $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                        $metaBundle->metaGlobalVars->robots !== 'noindex';
                }

                // Only add in a sitemap entry if it meets our criteria
                if ($path !== null && $this->getIsSitemapEnabled($metaBundle) && $robotsEnabled) {
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

                    $altLinks = '';

                    // Handle alternate URLs if this is multi-site
                    if ($multiSite && $this->getSiteMapVars($metaBundle)->sitemapAltLinks) {
                        $primarySiteId = Craft::$app->getSites()->getPrimarySite()->id;
                        /** @var  $altSiteSettings */
                        foreach ($metaBundle->sourceAltSiteSettings as $altSiteSettings) {
                            if (\in_array($altSiteSettings['siteId'], $groupSiteIds, false)) {
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
                                    list($altSourceId, $altSourceBundleType, $altSourceHandle, $altSourceSiteId, $altTypeId)
                                        = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($altElement);
                                    $altMetaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                                        $altSourceBundleType,
                                        $altSourceId,
                                        $altSourceSiteId
                                    );
                                    if ($altMetaBundle) {
                                        // Make sure this entry isn't disabled
                                        $this->combineFieldSettings($altElement, $altMetaBundle);
                                        $altUrl = UrlHelper::absoluteUrlWithProtocol($altElement->url);
                                        if ($this->getIsSitemapEnabled($altMetaBundle)) {
                                            // If this is the primary site, add it as x-default, too
                                            if ($primarySiteId === $altSourceSiteId && Seomatic::$settings->addXDefaultHrefLang) {
                                                $altLinks .= '<xhtml:link rel="alternate"'
                                                    . ' hreflang="x-default"'
                                                    . ' href="' . Html::encode($altUrl) . '"'
                                                    . ' />';
                                            }
                                            $altLinks .= '<xhtml:link rel="alternate"'
                                                . ' hreflang="' . $altSiteSettings['language'] . '"'
                                                . ' href="' . Html::encode($altUrl) . '"'
                                                . ' />';
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $additionalData = $this->getAdditionalDataForElement($metaBundle, $element);

                    $sitemapData .= $this->generateSitemapEntry(
                        Html::encode($url),
                        $dateUpdated->format(\DateTime::W3C),
                        $this->getSiteMapVars($metaBundle)->sitemapChangeFreq,
                        $this->getSiteMapVars($metaBundle)->sitemapPriority,
                        $altLinks,
                        $additionalData
                    );
                }

                $sitemapData .= $this->generateAdditionalEntriesForElement($metaBundle, $element);
            }
            $paginator->currentPage++;
        }

        $sitemap = $this->wrapSitemap($sitemapData, $xmlNs);

        // Cache sitemap cache; we use this instead of Seomatic::$cacheDuration because for
        // Control Panel requests, we set Seomatic::$cacheDuration = 1 so that they are never
        // cached
        $cacheDuration = Seomatic::$devMode
            ? Seomatic::DEVMODE_CACHE_DURATION
            : null;
        $cache = Craft::$app->getCache();
        $cacheKey = $this->getCacheKey();
        $dependency = new TagDependency([
            'tags' => [
                SitemapTemplate::GLOBAL_SITEMAP_CACHE_TAG,
                SitemapTemplate::SITEMAP_CACHE_TAG . $this->handle . $this->siteId,
            ],
        ]);

        $result = $cache->set($cacheKey, $sitemap, $cacheDuration, $dependency);
        // Remove the queue job id from the cache too
        $cache->delete($this->queueJobCacheKey);
        Craft::debug('Sitemap cache result: ' . print_r($result, true) . ' for cache key: ' . $cacheKey, __METHOD__);
        // Output some info if this is a console app
        if (Craft::$app instanceof ConsoleApplication) {
            echo 'Sitemap cache result: ' . print_r($result, true) . ' for cache key: ' . $cacheKey . PHP_EOL;
        }


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

    protected function getXmlNs(MetaBundle $metaBundle, bool $multiSite): string
    {
        $xmlNs = 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        if ($metaBundle->metaSitemapVars->sitemapAssets) {
            $xmlNs .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
            $xmlNs .= ' xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"';
        }
        if ($multiSite) {
            $xmlNs .= ' xmlns:xhtml="http://www.w3.org/1999/xhtml"';
        }

        return $xmlNs;
    }

    protected function wrapSitemap(string $sitemap, string $xmlNs): string
    {
        return <<<SITEMAP
<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>
        <urlset $xmlNs>$sitemap
</urlset>
SITEMAP;
    }

    protected function generateSitemapEntry(string $url, string $lastMod, string $changeFreq, string $priority, string $altLinks = '', string $additionalData = ''): string
    {
        return <<<ITEM
<url>
    <loc>$url</loc>
    <lastmod>$lastMod</lastmod>
    <changefreq>$changeFreq</changefreq>
    <priority>$priority</priority>
    $altLinks
    $additionalData
</url>
ITEM;
    }

    /**
     * @param MetaBundle $metaBundle
     * @param $seoElement
     * @return int|null
     */
    protected function getTotalElements(MetaBundle $metaBundle, $seoElement)
    {
        // Ensure `null` so that the resulting element query is correct
        if (empty($metaBundle->metaSitemapVars->sitemapLimit)) {
            $metaBundle->metaSitemapVars->sitemapLimit = null;
        }
        $totalElements = $seoElement::sitemapElementsQuery($metaBundle)->count();
        if ($metaBundle->metaSitemapVars->sitemapLimit && ($totalElements > $metaBundle->metaSitemapVars->sitemapLimit)) {
            $totalElements = $metaBundle->metaSitemapVars->sitemapLimit;
        }
        return $totalElements;
    }

    /**
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaSitemapVars->sitemapUrls;
    }

    /**
     * @param MetaBundle $metaBundle
     * @return MetaSitemapVars
     */
    protected function getSiteMapVars(MetaBundle $metaBundle): InheritableSettingsModel
    {
        return $metaBundle->metaSitemapVars;
    }

    protected function getAdditionalDataForElement(MetaBundle $metaBundle, Element $element): string
    {
        $additionalData = '';

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
                    $additionalData .= $this->mediaSitemapItem($asset, $metaBundle);
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
                            $additionalData .= $this->mediaSitemapItem($asset, $metaBundle);
                        }
                    }
                }
            }
        }

        return $additionalData;
    }

    /**
     * Combine any per-entry type field settings from $element with the passed in
     * $metaBundle
     *
     * @param SeoElementInterface|string $seoElement
     * @param Element $element
     * @param MetaBundle $metaBundle
     */
    protected function combineEntryTypeSettings($seoElement, Element $element, MetaBundle $metaBundle)
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
                $attributes = $this->getSiteMapVars($entryTypeBundle)->getAttributes();
                $attributes = array_filter(
                    $attributes,
                    [ArrayHelper::class, 'preserveBools']
                );
                $this->getSiteMapVars($metaBundle)->setAttributes($attributes, false);

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
                if ($fieldMetaBundle !== null && $seoSettingsField !== null) {
                    if ($seoSettingsField->sitemapTabEnabled) {
                        // Combine the meta sitemap vars
                        $attributes = $this->getSiteMapVars($fieldMetaBundle)->getAttributes();

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

                        $this->getSiteMapVars($metaBundle)->setAttributes($attributes, false);
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
     */
    protected function mediaSitemapItem(Asset $asset, MetaBundle $metaBundle): string
    {
        $sitemapItem = '';

        $mappings = [
            'image' => [
                'fieldMappings' => 'sitemapImageFieldMap',
                'prefix' => 'image',
                'container' => '
                    <image:image>
                        <image:loc>{url}</image:loc>
                        {dynamic}
                    </image:image>',
                ],
            'video' =>  [
                'fieldMappings' => 'sitemapVideoFieldMap',
                'prefix' => 'video',
                'container' => '
                    <video:video>
                        <video:content_loc>{url}</video:content_loc>
                        {dynamic}
                    </video:video>',
            ],
        ];

        if ((bool)$asset->enabledForSite && $asset->getUrl() !== null) {
            $url = Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl()));

            switch ($asset->kind) {
                case 'image':
                case 'video':
                    $config = $mappings[$asset->kind];
                    $dynamicFields = '';
                    $prefix = $config['prefix'];

                    // Handle the dynamic field => property mappings
                    foreach ($metaBundle->metaSitemapVars->{$config['fieldMappings']} as $row) {
                        $fieldName = $row['field'] ?? '';
                        $propName = $row['property'] ?? '';

                        if (!empty($asset[$fieldName]) && !empty($propName)) {
                            $dynamicFields.= "<$prefix:$propName>" . Html::encode($asset[$fieldName]) . "</$prefix:$propName>";
                        }
                    }
                    $sitemapItem .= str_replace(['{url}', '{dynamic}'], [$url, $dynamicFields], $config['container']);
                    break;
            }
        }

        return $sitemapItem;
    }

    protected function generateAdditionalEntriesForElement(MetaBundle $metaBundle, Element $element): string
    {
        $additionalEntries = '';

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
                    $additionalEntries .= $this->assetFilesSitemapLink($asset, $metaBundle);
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
                            $additionalEntries .= $this->assetFilesSitemapLink($asset, $metaBundle);
                        }
                    }
                }
            }
        }

        return $additionalEntries;
    }

    /**
     * @param Asset $asset
     * @param MetaBundle $metaBundle
     * @param array $lines
     */
    protected function assetFilesSitemapLink(Asset $asset, MetaBundle $metaBundle): string
    {
        if (!$asset->enabledForSite || $asset->getUrl() === null || !\in_array($asset->kind, SitemapTemplate::FILE_TYPES, false)) {
            return '';
        }

        $dateUpdated = $asset->dateUpdated ?? $asset->dateCreated ?? new \DateTime;

        return $this->generateSitemapEntry(
            Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl())),
            $dateUpdated->format(\DateTime::W3C),
            $metaBundle->metaSitemapVars->sitemapChangeFreq,
            $metaBundle->metaSitemapVars->sitemapPriority
        );
    }

    /**
     * @return string
     */
    protected function getCacheKey(): string
    {
        return SitemapTemplate::CACHE_KEY . $this->groupId . $this->type . $this->handle . $this->siteId;
    }
}
