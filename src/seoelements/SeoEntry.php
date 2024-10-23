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
use craft\elements\Entry;
use craft\events\DefineHtmlEvent;
use craft\events\SectionEvent;
use craft\gql\interfaces\elements\Entry as EntryInterface;
use craft\helpers\ElementHelper;
use craft\models\Section;
use craft\models\Site;
use craft\services\Entries;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\base\GqlSeoElementInterface;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoEntry implements SeoElementInterface, GqlSeoElementInterface
{
    // Constants
    // =========================================================================

    public const META_BUNDLE_TYPE = 'section';
    public const ELEMENT_CLASSES = [
        Entry::class,
    ];
    public const REQUIRED_PLUGIN_HANDLE = null;
    public const CONFIG_FILE_PATH = 'entrymeta/Bundle';

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
        return Entry::refHandle() ?? 'entry';
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
            Entries::class,
            Entries::EVENT_AFTER_SAVE_SECTION,
            function(SectionEvent $event) {
                Craft::debug(
                    'Entries::EVENT_AFTER_SAVE_SECTION',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );
        Event::on(
            Entries::class,
            Entries::EVENT_AFTER_DELETE_SECTION,
            function(SectionEvent $event) {
                Craft::debug(
                    'Entries::EVENT_AFTER_DELETE_SECTION',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // Handler: Entries::EVENT_AFTER_SAVE_SECTION
            Event::on(
                Entries::class,
                Entries::EVENT_AFTER_SAVE_SECTION,
                function(SectionEvent $event) {
                    Craft::debug(
                        'Entries::EVENT_AFTER_SAVE_SECTION',
                        __METHOD__
                    );
                    if ($event->section !== null && $event->section->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoEntry::getMetaBundleType(),
                            $event->section->id,
                            $event->isNew
                        );
                        // Create the meta bundles for this section if it's new
                        if ($event->isNew) {
                            SeoEntry::createContentMetaBundle($event->section);
                            Seomatic::$plugin->sitemaps->submitSitemapIndex();
                        }
                    }
                }
            );
            // Handler: Entries::EVENT_AFTER_DELETE_SECTION
            Event::on(
                Entries::class,
                Entries::EVENT_AFTER_DELETE_SECTION,
                function(SectionEvent $event) {
                    Craft::debug(
                        'Entries::EVENT_AFTER_DELETE_SECTION',
                        __METHOD__
                    );
                    if ($event->section !== null && $event->section->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoEntry::getMetaBundleType(),
                            $event->section->id,
                            false
                        );
                        // Delete the meta bundles for this section
                        Seomatic::$plugin->metaBundles->deleteMetaBundleBySourceId(
                            SeoEntry::getMetaBundleType(),
                            $event->section->id
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
            Entry::class,
            Entry::EVENT_DEFINE_SIDEBAR_HTML,
            static function(DefineHtmlEvent $event) {
                Craft::debug(
                    'Entry::EVENT_DEFINE_SIDEBAR_HTML',
                    __METHOD__
                );
                $html = '';
                Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
                /** @var Entry $entry */
                $entry = $event->sender ?? null;
                if ($entry !== null && $entry->uri !== null) {
                    Seomatic::$plugin->metaContainers->previewMetaContainers($entry->uri, $entry->siteId, true, true, $entry);
                    // Render our preview sidebar template
                    if (Seomatic::$settings->displayPreviewSidebar && Seomatic::$matchedElement) {
                        $html .= PluginTemplate::renderPluginTemplate('_sidebars/entry-preview.twig');
                    }
                    // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (Seomatic::$settings->displayAnalysisSidebar && Seomatic::$matchedElement) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/entry-analysis.twig');
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
        $query = Entry::find()
            ->section($metaBundle->sourceHandle)
            ->siteId($metaBundle->sourceSiteId)
            ->limit($metaBundle->metaSitemapVars->sitemapLimit);
        if ($metaBundle->sourceType === 'structure'
            && !empty($metaBundle->metaSitemapVars->structureDepth)) {
            $query->level('<=' . $metaBundle->metaSitemapVars->structureDepth);
        }

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
        return Entry::find()
            ->section($metaBundle->sourceHandle)
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
        $element = Entry::find()
            ->section($sourceHandle)
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
        $section = Craft::$app->getEntries()->getSectionByHandle($sourceHandle);
        if ($section) {
            $entryTypes = $section->getEntryTypes();
            foreach ($entryTypes as $entryType) {
                if ($entryType->fieldLayoutId) {
                    $layouts[] = Craft::$app->getFields()->getLayoutById($entryType->fieldLayoutId);
                }
            }
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
        $typeMenu = [];

        $section = self::sourceModelFromHandle($sourceHandle);
        if ($section !== null) {
            $entryTypes = $section->getEntryTypes();
            // Only create a menu if there's more than 1 entry type
            if (count($entryTypes) > 1) {
                foreach ($entryTypes as $entryType) {
                    $typeMenu[$entryType->id] = $entryType->name;
                }
            }
        }

        return $typeMenu;
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return Section|null
     */
    public static function sourceModelFromId(int $sourceId)
    {
        return Craft::$app->getEntries()->getSectionById($sourceId);
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param string $sourceHandle
     *
     * @return Section|null
     */
    public static function sourceModelFromHandle(string $sourceHandle)
    {
        return Craft::$app->getEntries()->getSectionByHandle($sourceHandle);
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
        /** @var Section $sourceModel */
        return Entry::find()
            ->section($sourceModel->handle)
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
        /** @var Section $sourceModel */
        return ArrayHelper::merge(
            ConfigHelper::getConfigFromFile(self::configFilePath()),
            [
                'sourceId' => $sourceModel->id,
                'sourceName' => (string)$sourceModel->name,
                'sourceHandle' => $sourceModel->handle,
                'sourceType' => $sourceModel->type,
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
        // Get the root element so we handle nested matrix entries
        $rootElement = ElementHelper::rootElement($element);
        if ($rootElement instanceof Entry) {
            return $rootElement->sectionId;
        }
        // If the root element isn't an entry, handle that case too
        $sourceBundleType = Seomatic::$plugin->seoElements->getMetaBundleTypeFromElement($rootElement);
        if ($sourceBundleType !== null) {
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
            if ($seoElement !== null) {
                return $seoElement::sourceIdFromElement($rootElement);
            }
        }

        return null;
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
        /** @var Entry $element */
        return $element->typeId;
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
        /** @var Entry $element */
        try {
            $sourceHandle = $element->getSection()?->handle;
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
        /** @var Section $sourceModel */
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
        // Get all of the sections with URLs
        $sections = Craft::$app->getEntries()->getAllSections();
        foreach ($sections as $section) {
            self::createContentMetaBundle($section);
        }
    }

    /**
     * @inheritdoc
     */
    public static function getGqlInterfaceTypeName()
    {
        return EntryInterface::getName();
    }
}
