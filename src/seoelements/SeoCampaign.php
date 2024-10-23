<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\seoelements;

use Craft;
use craft\base\ElementInterface;
use craft\base\Model;
use craft\elements\db\ElementQueryInterface;
use craft\events\DefineHtmlEvent;
use craft\models\Site;
use Exception;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\integrations\campaign\behaviors\CampaignBehavior;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use putyourlightson\campaign\Campaign;
use putyourlightson\campaign\elements\CampaignElement;
use putyourlightson\campaign\events\CampaignTypeEvent;
use putyourlightson\campaign\models\CampaignTypeModel;
use putyourlightson\campaign\services\CampaignTypesService;
use yii\base\Event;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoCampaign implements SeoElementInterface
{
    // Constants
    // =========================================================================

    public const META_BUNDLE_TYPE = 'campaign';
    public const ELEMENT_CLASSES = [
        CampaignElement::class,
    ];
    public const REQUIRED_PLUGIN_HANDLE = 'campaign';
    public const CONFIG_FILE_PATH = 'campaignmeta/Bundle';

    // Public Static Methods
    // =========================================================================

    /**
     * Return the sourceBundleType for that this SeoElement handles
     *
     * @return string
     */
    public static function getMetaBundleType(): string
    {
        return self::META_BUNDLE_TYPE;
    }

    /**
     * Returns an array of the element classes that are handled by this SeoElement
     *
     * @return array
     */
    public static function getElementClasses(): array
    {
        return self::ELEMENT_CLASSES;
    }

    /**
     * Return the refHandle (e.g.: `entry` or `category`) for the SeoElement
     *
     * @return string
     */
    public static function getElementRefHandle(): string
    {
        return CampaignElement::refHandle() ?? 'campaign';
    }

    /**
     * Return the handle to a required plugin for this SeoElement type
     *
     * @return null|string
     */
    public static function getRequiredPluginHandle()
    {
        return self::REQUIRED_PLUGIN_HANDLE;
    }

    /**
     * Install any event handlers for this SeoElement type
     */
    public static function installEventHandlers()
    {
        $request = Craft::$app->getRequest();

        // Install for all requests
        Event::on(
            CampaignTypesService::class,
            CampaignTypesService::EVENT_AFTER_SAVE_CAMPAIGN_TYPE,
            function(CampaignTypeEvent $event) {
                Craft::debug(
                    'CampaignTypesService::EVENT_AFTER_SAVE_CAMPAIGN_TYPE',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );
        Event::on(
            CampaignTypesService::class,
            CampaignTypesService::EVENT_AFTER_DELETE_CAMPAIGN_TYPE,
            function(CampaignTypeEvent $event) {
                Craft::debug(
                    'CampaignTypesService::EVENT_AFTER_DELETE_CAMPAIGN_TYPE',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // Handler: CampaignTypesService::EVENT_AFTER_SAVE_CAMPAIGN_TYPE
            Event::on(
                CampaignTypesService::class,
                CampaignTypesService::EVENT_AFTER_SAVE_CAMPAIGN_TYPE,
                function(CampaignTypeEvent $event) {
                    Craft::debug(
                        'CampaignTypesService::EVENT_AFTER_SAVE_CAMPAIGN_TYPE',
                        __METHOD__
                    );
                    if ($event->campaignType !== null && $event->campaignType->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoCampaign::getMetaBundleType(),
                            $event->campaignType->id,
                            $event->isNew
                        );
                        // Create the meta bundles for this campaign type if it's new
                        if ($event->isNew) {
                            SeoCampaign::createContentMetaBundle($event->campaignType);
                            Seomatic::$plugin->sitemaps->submitSitemapIndex();
                        }
                    }
                }
            );
            // Handler: CampaignTypesService::EVENT_AFTER_DELETE_CAMPAIGN_TYPE
            Event::on(
                CampaignTypesService::class,
                CampaignTypesService::EVENT_AFTER_DELETE_CAMPAIGN_TYPE,
                function(CampaignTypeEvent $event) {
                    Craft::debug(
                        'CampaignTypesService::EVENT_AFTER_DELETE_CAMPAIGN_TYPE',
                        __METHOD__
                    );
                    if ($event->campaignType !== null && $event->campaignType->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoCampaign::getMetaBundleType(),
                            $event->campaignType->id,
                            false
                        );
                        // Delete the meta bundles for this campaign type
                        Seomatic::$plugin->metaBundles->deleteMetaBundleBySourceId(
                            SeoCampaign::getMetaBundleType(),
                            $event->campaignType->id
                        );
                    }
                }
            );
        }

        // Install only for non-console site requests
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
        }

        // Handler: Entry::EVENT_DEFINE_SIDEBAR_HTML
        Event::on(
            CampaignElement::class,
            CampaignElement::EVENT_DEFINE_SIDEBAR_HTML,
            static function(DefineHtmlEvent $event) {
                Craft::debug(
                    'CampaignElement::EVENT_DEFINE_SIDEBAR_HTML',
                    __METHOD__
                );
                $html = '';
                Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
                /** @var CampaignElement $campaign */
                $campaign = $event->sender ?? null;
                if ($campaign !== null && $campaign->uri !== null) {
                    Seomatic::$plugin->metaContainers->previewMetaContainers($campaign->uri, $campaign->siteId, true);
                    // Render our preview sidebar template
                    if (Seomatic::$settings->displayPreviewSidebar && Seomatic::$matchedElement) {
                        $html .= PluginTemplate::renderPluginTemplate('_sidebars/campaign-preview.twig');
                    }
                    // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (Seomatic::$settings->displayAnalysisSidebar && Seomatic::$matchedElement) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/campaign-analysis.twig');
//                }
                }
                $event->html .= $html;
            }
        );
    }

    /**
     * Return an ElementQuery for the sitemap elements for the given MetaBundle
     *
     * @param MetaBundle $metaBundle
     *
     * @return ElementQueryInterface
     */
    public static function sitemapElementsQuery(MetaBundle $metaBundle): ElementQueryInterface
    {
        $query = CampaignElement::find()
            ->campaignType($metaBundle->sourceHandle)
            ->siteId($metaBundle->sourceSiteId)
            ->limit($metaBundle->metaSitemapVars->sitemapLimit);

        return $query;
    }

    /**
     * Return an ElementInterface for the sitemap alt element for the given MetaBundle
     * and Element ID
     *
     * @param MetaBundle $metaBundle
     * @param int $elementId
     * @param int $siteId
     *
     * @return null|ElementInterface
     */
    public static function sitemapAltElement(
        MetaBundle $metaBundle,
        int        $elementId,
        int        $siteId,
    ) {
        return CampaignElement::find()
            ->campaignType($metaBundle->sourceHandle)
            ->id($elementId)
            ->siteId($siteId)
            ->limit(1)
            ->one();
    }

    /**
     * Return a preview URI for a given $sourceHandle and $siteId
     * This just returns the first element
     *
     * @param string $sourceHandle
     * @param int|null $siteId
     *
     * @return string|null
     */
    public static function previewUri(string $sourceHandle, $siteId)
    {
        $uri = null;
        $element = CampaignElement::find()
            ->campaignType($sourceHandle)
            ->siteId($siteId)
            ->one();
        if ($element) {
            $uri = $element->uri;
        }

        return $uri;
    }

    /**
     * Return an array of FieldLayouts from the $sourceHandle
     *
     * @param string $sourceHandle
     *
     * @return array
     */
    public static function fieldLayouts(string $sourceHandle): array
    {
        $layouts = [];
        try {
            $campaignType = Campaign::$plugin->campaignTypes->getCampaignTypeByHandle($sourceHandle);
            if ($campaignType) {
                $layouts[] = $campaignType->getFieldLayout();
            }
        } catch (Exception $e) {
        }

        return $layouts;
    }

    /**
     * Return the (entry) type menu as a $id => $name associative array
     *
     * @param string $sourceHandle
     *
     * @return array
     */
    public static function typeMenuFromHandle(string $sourceHandle): array
    {
        return [];
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return CampaignTypeModel|null
     */
    public static function sourceModelFromId(int $sourceId)
    {
        // Attach a behavior to implement ::getSiteSettings() which the CampaignTypeModel lacks
        $sourceModel = Campaign::$plugin->campaignTypes->getCampaignTypeById($sourceId);
        if ($sourceModel) {
            $sourceModel->attachBehavior('SEOmaticCampaignBehavior', CampaignBehavior::class);
        }

        return $sourceModel;
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param string $sourceHandle
     *
     * @return CampaignTypeModel|null
     */
    public static function sourceModelFromHandle(string $sourceHandle)
    {
        // Attach a behavior to implement ::getSiteSettings() which the CampaignTypeModel lacks
        $sourceModel = Campaign::$plugin->campaignTypes->getCampaignTypeByHandle($sourceHandle);
        if ($sourceModel) {
            $sourceModel->attachBehavior('SEOmaticCampaignBehavior', CampaignBehavior::class);
        }

        return $sourceModel;
    }

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param Model $sourceModel
     * @param int $sourceSiteId
     *
     * @return null|ElementInterface
     */
    public static function mostRecentElement(Model $sourceModel, int $sourceSiteId)
    {
        /** @var CampaignTypeModel $sourceModel */
        return CampaignElement::find()
            ->campaignType($sourceModel->handle)
            ->siteId($sourceSiteId)
            ->limit(1)
            ->orderBy(['elements.dateUpdated' => SORT_DESC])
            ->one();
    }

    /**
     * Return the path to the config file directory
     *
     * @return string
     */
    public static function configFilePath(): string
    {
        return self::CONFIG_FILE_PATH;
    }

    /**
     * Return a meta bundle config array for the given $sourceModel
     *
     * @param Model $sourceModel
     *
     * @return array
     */
    public static function metaBundleConfig(Model $sourceModel): array
    {
        /** @var CampaignTypeModel $sourceModel */
        return ArrayHelper::merge(
            ConfigHelper::getConfigFromFile(self::configFilePath()),
            [
                'sourceId' => $sourceModel->id,
                'sourceName' => (string)$sourceModel->name,
                'sourceHandle' => $sourceModel->handle,
            ]
        );
    }

    /**
     * Return the source id from the $element
     *
     * @param ElementInterface $element
     *
     * @return int|null
     */
    public static function sourceIdFromElement(ElementInterface $element)
    {
        /** @var CampaignElement $element */
        return $element->campaignTypeId;
    }

    /**
     * Return the (entry) type id from the $element
     *
     * @param ElementInterface $element
     *
     * @return int|null
     */
    public static function typeIdFromElement(ElementInterface $element)
    {
        return null;
    }

    /**
     * Return the source handle from the $element
     *
     * @param ElementInterface $element
     *
     * @return string|null
     */
    public static function sourceHandleFromElement(ElementInterface $element)
    {
        $sourceHandle = '';
        /** @var CampaignElement $element */
        try {
            $sourceHandle = $element->getCampaignType()->handle;
        } catch (InvalidConfigException $e) {
        }

        return $sourceHandle;
    }

    /**
     * Create a MetaBundle in the db for each site, from the passed in $sourceModel
     *
     * @param Model $sourceModel
     */
    public static function createContentMetaBundle(Model $sourceModel)
    {
        /** @var CampaignTypeModel $sourceModel */
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var Site $site */
        foreach ($sites as $site) {
            $seoElement = self::class;
            Seomatic::$plugin->metaBundles->createMetaBundleFromSeoElement($seoElement, $sourceModel, $site->id, null, true);
        }
    }

    /**
     * Create all the MetaBundles in the db for this Seo Element
     */
    public static function createAllContentMetaBundles()
    {
        // Get all of the campaign types with URLs
        $campaignTypes = Campaign::$plugin->campaignTypes->getAllCampaignTypes();
        foreach ($campaignTypes as $campaignType) {
            self::createContentMetaBundle($campaignType);
        }
    }
}
