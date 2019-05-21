<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\seoelements;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\models\MetaBundle;

use Craft;
use craft\base\ElementInterface;
use craft\base\Model;
use craft\elements\db\ElementQueryInterface;
use craft\elements\Entry;
use craft\events\SectionEvent;
use craft\models\EntryDraft;
use craft\models\EntryVersion;
use craft\models\Section;
use craft\models\Site;
use craft\services\Sections;

use yii\base\Event;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoEntry implements SeoElementInterface
{
    // Constants
    // =========================================================================

    const META_BUNDLE_TYPE = 'section';
    const ELEMENT_CLASSES = [
        Entry::class,
        EntryDraft::class,
        EntryVersion::class,
    ];
    const REQUIRED_PLUGIN_HANDLE = null;
    const CONFIG_FILE_PATH = 'entrymeta/Bundle';

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
        return Entry::refHandle();
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

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // Handler: Sections::EVENT_AFTER_SAVE_SECTION
            Event::on(
                Sections::class,
                Sections::EVENT_AFTER_SAVE_SECTION,
                function (SectionEvent $event) {
                    Craft::debug(
                        'Sections::EVENT_AFTER_SAVE_SECTION',
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
            // Handler: Sections::EVENT_AFTER_DELETE_SECTION
            Event::on(
                Sections::class,
                Sections::EVENT_AFTER_DELETE_SECTION,
                function (SectionEvent $event) {
                    Craft::debug(
                        'Sections::EVENT_AFTER_DELETE_SECTION',
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

        // Install only for non-console Control Panel requests
        if ($request->getIsCpRequest() && !$request->getIsConsoleRequest()) {
            // Entries sidebar
            Seomatic::$view->hook('cp.entries.edit.details', function (&$context) {
                $html = '';
                Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
                /** @var  $entry Entry */
                $entry = $context['entry'];
                if ($entry !== null && $entry->uri !== null) {
                    Seomatic::$plugin->metaContainers->previewMetaContainers($entry->uri, $entry->siteId, true);
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

                return $html;
            });
        }
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
            ->enabledForSite(true)
            ->limit($metaBundle->metaSitemapVars->sitemapLimit);
        if ($metaBundle->sourceType === 'structure'
            && !empty($metaBundle->metaSitemapVars->structureDepth)) {
            $query->level($metaBundle->metaSitemapVars->structureDepth.'<=');
        }

        return $query;
    }

    /**
     * Return an ElementInterface for the sitemap alt element for the given MetaBundle
     * and Element ID
     *
     * @param MetaBundle $metaBundle
     * @param int        $elementId
     * @param int        $siteId
     *
     * @return null|ElementInterface
     */
    public static function sitemapAltElement(
        MetaBundle $metaBundle,
        int $elementId,
        int $siteId
    ) {
        return Entry::find()
            ->section($metaBundle->sourceHandle)
            ->id($elementId)
            ->siteId($siteId)
            ->enabledForSite(true)
            ->limit(1)
            ->one();
    }

    /**
     * Return a preview URI for a given $sourceHandle and $siteId
     * This just returns the first element
     *
     * @param string    $sourceHandle
     * @param int|null  $siteId
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
        $section = Craft::$app->getSections()->getSectionByHandle($sourceHandle);
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
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return Section|null
     */
    public static function sourceModelFromId(int $sourceId)
    {
        return Craft::$app->getSections()->getSectionById($sourceId);
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
        return Craft::$app->getSections()->getSectionByHandle($sourceHandle);
    }

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param Model $sourceModel
     * @param int   $sourceSiteId
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
                'sourceName' => $sourceModel->name,
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
        /** @var Entry $element */
        return $element->sectionId;
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
            $sourceHandle = $element->getSection()->handle;
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
            /** @var SeoElementInterface $seoElement */
            Seomatic::$plugin->metaBundles->createMetaBundleFromSeoElement($seoElement, $sourceModel, $site->id);
        }
    }

    /**
     * Create all the MetaBundles in the db for this Seo Element
     */
    public static function createAllContentMetaBundles()
    {
        // Get all of the sections with URLs
        $sections = Craft::$app->getSections()->getAllSections();
        foreach ($sections as $section) {
            self::createContentMetaBundle($section);
        }
    }
}
