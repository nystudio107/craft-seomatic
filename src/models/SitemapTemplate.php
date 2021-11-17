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

use benf\neo\elements\Block as NeoBlock;
use Craft;
use craft\base\Element;
use craft\elements\Asset;
use craft\elements\db\ElementQueryInterface;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\helpers\Html;
use craft\queue\QueueInterface;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\InheritableSettingsModel;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\Queue as QueueHelper;
use nystudio107\seomatic\helpers\Sitemap;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\jobs\GenerateSitemap;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Sitemaps;
use verbb\supertable\elements\SuperTableBlockElement as SuperTableBlock;
use yii\caching\TagDependency;
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

    const QUEUE_JOB_CACHE_KEY = 'seomatic_sitemap_queue_job_';

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

    protected static $defaultConfig = [
        'path' => 'sitemaps-<groupId:\d+>-<type:[\w\.*]+>-<handle:[\w\.*]+>-<siteId:\d+>-sitemap.xml',
        'template' => '',
        'controller' => 'sitemap',
        'action' => 'sitemap',
    ];

    const SITEMAP_JOB_CLASS = GenerateSitemap::class;

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|SitemapTemplate
     */
    public static function create(array $config = [])
    {
        $config = array_merge($config, static::$defaultConfig);

        return new static($config);
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
        $groupId = $params['groupId'];
        $type = $params['type'];
        $handle = $params['handle'];
        $siteId = $params['siteId'];
        $throwException = $params['throwException'] ?? true;
        $request = Craft::$app->getRequest();
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle($type, $handle, $siteId);
        // If it doesn't exist, throw a 404
        if ($metaBundle === null ) {
            if ($request->isCpRequest || $request->isConsoleRequest) {
                return '';
            }
            if ($throwException) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
            }
            return '';
        }
        // Check to see if robots is `none` or `no index`
        $robotsEnabled = true;
        if (!empty($metaBundle->metaGlobalVars->robots)) {
            $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                $metaBundle->metaGlobalVars->robots !== 'noindex';
        }
        $sitemapEnabled = static::getIsSitemapEnabled($metaBundle);
        if (static::getForceCreatingSitemap($metaBundle)) {
            $robotsEnabled = true;
            $sitemapEnabled = true;
        }
        // If it's disabled, just throw a 404
        if (!$sitemapEnabled || !$robotsEnabled) {
            if ($request->isCpRequest || $request->isConsoleRequest) {
                return '';
            }
            if ($throwException) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
            }
        }

        $cache = Craft::$app->getCache();
        $uniqueKey = $groupId.$type.$handle.$siteId;
        $cacheKey = static::CACHE_KEY.$uniqueKey;
        $queueJobCacheKey = static::QUEUE_JOB_CACHE_KEY.$uniqueKey;
        $result = $cache->get($cacheKey);
        // If the sitemap isn't cached, start a job to create it
        if ($result === false) {
            $queue = Craft::$app->getQueue();
            // If there's an existing queue job, release it so queue jobs don't stack
            $existingJobId = $cache->get($queueJobCacheKey);
            // Make sure the queue uses the Craft web interface
            if ($existingJobId && $queue instanceof QueueInterface) {
                $queue = Craft::$app->getQueue();
                $queue->release($existingJobId);
                $cache->delete($queueJobCacheKey);
            }

            if (!empty($params['immediately'])) {
                Sitemap::generateSitemap(compact('groupId', 'type', 'handle', 'siteId', 'queueJobCacheKey'), static::class);
            } else {
                // Push a new queue job
                $className = static::SITEMAP_JOB_CLASS;
                $jobId = $queue->push(new $className(compact('groupId', 'type', 'handle', 'siteId', 'queueJobCacheKey')));

                // Stash the queue job id in the cache for future reference
                $cacheDuration = 3600;
                $dependency = new TagDependency([
                    'tags' => [
                        static::GLOBAL_SITEMAP_CACHE_TAG,
                        static::CACHE_KEY.$uniqueKey,
                    ],
                ]);
                $cache->set($queueJobCacheKey, $jobId, $cacheDuration, $dependency);
                Craft::debug(
                    Craft::t(
                        'seomatic',
                        'Started GenerateSitemap queue job id: {jobId} with cache key {cacheKey}',
                        [
                            'jobId' => $jobId,
                            'cacheKey' => $cacheKey,
                        ]
                    ),
                    __METHOD__
                );
                // Try to run the queue immediately
                if ($throwException) {
                    // If $throwException === false it means we're trying to regenerate the sitemap due to an invalidation
                    // rather than a request for the actual sitemap, so don't try to run the queue immediately
                    QueueHelper::run();
                }
            }

            // Try it again now
            $result = $cache->get($cacheKey);
            if ($result !== false) {
                return $result;
            }
            // Return a 503 Service Unavailable an a Retry-After so bots will try back later
            $lines = [];
            $response = Craft::$app->getResponse();
            if (!$request->isConsoleRequest && $throwException) {
                $response->setStatusCode(503);
                $response->headers->add('Retry-After', 60);
                $response->headers->add('Cache-Control', 'no-cache, no-store');
                // Return an empty XML document
                $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
                $lines[] = '<?xml-stylesheet type="text/xsl" href="sitemap-empty.xsl"?>';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'This sitemap has not been generated yet.') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'If you are seeing this in local dev or an') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'environment with `devMode` on, caches only') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'last for 30 seconds in local dev, so it is') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'normal for the sitemap to not be cached.') . ' -->';
                $lines[] = '<urlset>';
                $lines[] = '</urlset>';
            }
            $lines = implode("\r\n", $lines);

            return $lines;
        }

        return $result;
    }

    /**
     * Invalidate a sitemap cache
     *
     * @param string $handle
     * @param int    $siteId
     */
    public static function invalidateCache(string $handle, int $siteId)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, static::SITEMAP_CACHE_TAG.$handle.$siteId);
        Craft::info(
            'Sitemap cache cleared: '.$handle,
            __METHOD__
        );
    }

    /**
     * Get the XML namespaces applicable to this sitemap.
     *
     * @param MetaBundle $metaBundle
     * @param bool $multiSite
     * @return string
     */
    public static function getXmlNs(MetaBundle $metaBundle, bool $multiSite): string
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

    /**
     * Wrap the sitemap in the appropriate tags.
     *
     * @param string $sitemap
     * @param string $xmlNs
     * @return string
     */
    public static function wrapSitemap(string $sitemap, string $xmlNs): string
    {
        return <<<SITEMAP
<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>
        <urlset $xmlNs>$sitemap
</urlset>
SITEMAP;
    }

    /**
     * Generate a sitemap entry.
     *
     * @param string $url
     * @param string $lastMod
     * @param string $changeFreq
     * @param string $priority
     * @param string $altLinks
     * @param string $additionalData
     * @return string
     */
    public static function generateSitemapEntry(string $url, string $lastMod, string $changeFreq, string $priority, string $altLinks = '', string $additionalData = ''): string
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
     * Get total elements, as truncated by the limit setting.
     *
     * @param MetaBundle $metaBundle
     * @param string $seoElement
     * @return int|null
     */
    public static function getTotalElements(MetaBundle $metaBundle, string $seoElement)
    {
        // Ensure `null` so that the resulting element query is correct
        $sitemapVars = static::getSiteMapVars($metaBundle);

        if (empty($sitemapVars->sitemapLimit)) {
            $sitemapVars->sitemapLimit = null;
        }

        $totalElements = static::getSitemapElementsQuery($seoElement, $metaBundle)->count();

        if ($sitemapVars->sitemapLimit && ($totalElements > $sitemapVars->sitemapLimit)) {
            $totalElements = $sitemapVars->sitemapLimit;
        }
        return $totalElements;
    }

    /**
     * Return true if the sitemap is enabled, according to the settings.
     *
     * @param MetaBundle $metaBundle
     * @return bool
     */
    public static function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaSitemapVars->sitemapUrls;
    }

    /**
     * Return the appropriate sitemap variable container.
     *
     * @param MetaBundle $metaBundle
     * @return MetaSitemapVars
     */
    public static function getSiteMapVars(MetaBundle $metaBundle): InheritableSettingsModel
    {
        return $metaBundle->metaSitemapVars;
    }

    /**
     * Return additional data that should be present in the sitemap entry for an element.
     *
     * @param MetaBundle $metaBundle
     * @param Element $element
     * @return string
     */
    public static function getAdditionalDataForElement(MetaBundle $metaBundle, Element $element): string
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
                    $additionalData .= static::mediaSitemapItem($asset, $metaBundle);
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
                            $additionalData .= static::mediaSitemapItem($asset, $metaBundle);
                        }
                    }
                }
            }
        }

        return $additionalData;
    }

    /**
     * Combine any per-entry type field settings from $element with the passed in $metaBundle
     *
     * @param SeoElementInterface|string $seoElement
     * @param Element $element
     * @param MetaBundle $metaBundle
     */
    public static function combineEntryTypeSettings($seoElement, Element $element, MetaBundle $metaBundle)
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
                $attributes = static::getSiteMapVars($entryTypeBundle)->getAttributes();
                $attributes = array_filter(
                    $attributes,
                    [ArrayHelper::class, 'preserveBools']
                );
                static::getSiteMapVars($metaBundle)->setAttributes($attributes, false);

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
     * Combine any SEO Settings field settings from $element with the passed in $metaBundle
     *
     * @param Element $element
     * @param MetaBundle $metaBundle
     */
    public static function combineFieldSettings(Element $element, MetaBundle $metaBundle)
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
                        $attributes = static::getSiteMapVars($fieldMetaBundle)->getAttributes();

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

                        static::getSiteMapVars($metaBundle)->setAttributes($attributes, false);
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
     * Generate a sitemap item for a media file.
     * s
     * @param Asset $asset
     * @param MetaBundle $metaBundle
     */
    public static function mediaSitemapItem(Asset $asset, MetaBundle $metaBundle): string
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

    /**
     * Generate any additional entries for this element for this sitemap.
     *
     * @param MetaBundle $metaBundle
     * @param Element $element
     * @return string
     */
    public static function generateAdditionalEntriesForElement(MetaBundle $metaBundle, Element $element): string
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
                    $additionalEntries .= static::assetFilesSitemapLink($asset, $metaBundle);
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
                            $additionalEntries .= static::assetFilesSitemapLink($asset, $metaBundle);
                        }
                    }
                }
            }
        }

        return $additionalEntries;
    }

    /**
     * Return a sitemap entry for a file linked within an assets field.
     *
     * @param Asset $asset
     * @param MetaBundle $metaBundle
     * @param array $lines
     */
    public static function assetFilesSitemapLink(Asset $asset, MetaBundle $metaBundle): string
    {
        if (!$asset->enabledForSite || $asset->getUrl() === null || !\in_array($asset->kind, static::FILE_TYPES, false)) {
            return '';
        }

        $dateUpdated = $asset->dateUpdated ?? $asset->dateCreated ?? new \DateTime;

        return static::generateSitemapEntry(
            Html::encode(UrlHelper::absoluteUrlWithProtocol($asset->getUrl())),
            $dateUpdated->format(\DateTime::W3C),
            $metaBundle->metaSitemapVars->sitemapChangeFreq,
            $metaBundle->metaSitemapVars->sitemapPriority
        );
    }

    /**
     * @param string $seoElement
     * @param MetaBundle $metaBundle
     * @return ElementQueryInterface
     */
    public static function getSitemapElementsQuery(string $seoElement, MetaBundle $metaBundle): ElementQueryInterface
    {
        return $seoElement::sitemapElementsQuery($metaBundle);
    }


    /**
     * @inheritdoc
     */
    public static function getForceCreatingSitemap(MetaBundle $metaBundle): bool
    {
        return Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle, Sitemaps::SITEMAP_TYPE_REGULAR);
    }
}
