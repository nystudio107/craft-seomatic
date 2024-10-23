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
use nystudio107\seomatic\base\GqlSeoElementInterface;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use Solspace\Calendar\Bundles\GraphQL\Interfaces\EventInterface;
use Solspace\Calendar\Calendar as CalendarPlugin;
use Solspace\Calendar\Elements\Db\EventQuery;
use Solspace\Calendar\Elements\Event;
use Solspace\Calendar\Events\DeleteModelEvent;
use Solspace\Calendar\Events\SaveModelEvent;
use Solspace\Calendar\Models\CalendarModel;
use Solspace\Calendar\Services\CalendarsService;
use yii\base\Event as BaseEvent;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoEvent implements SeoElementInterface, GqlSeoElementInterface
{
    // Constants
    // =========================================================================

    public const META_BUNDLE_TYPE = 'event';
    public const ELEMENT_CLASSES = [
        Event::class,
    ];
    public const REQUIRED_PLUGIN_HANDLE = 'calendar';
    public const CONFIG_FILE_PATH = 'eventmeta/Bundle';

    // Public Static Methods
    // =========================================================================

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
        BaseEvent::on(
            CalendarsService::class,
            CalendarsService::EVENT_AFTER_SAVE,
            function(SaveModelEvent $event) {
                Craft::debug(
                    'CalendarsService::EVENT_AFTER_DELETE',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );
        BaseEvent::on(
            CalendarsService::class,
            CalendarsService::EVENT_AFTER_DELETE,
            function(DeleteModelEvent $event) {
                Craft::debug(
                    'CalendarsService::EVENT_AFTER_DELETE',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // Handler: CalendarsService::EVENT_AFTER_SAVE
            BaseEvent::on(
                CalendarsService::class,
                CalendarsService::EVENT_AFTER_SAVE,
                function(SaveModelEvent $event) {
                    Craft::debug(
                        'CalendarsService::EVENT_AFTER_SAVE',
                        __METHOD__
                    );
                    /** @var CalendarModel $calendarModel */
                    $calendarModel = $event->getModel();
                    if ($calendarModel !== null && $calendarModel->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoEvent::getMetaBundleType(),
                            $calendarModel->id,
                            $event->isNew()
                        );
                        // Create the meta bundles for this Event if it's new
                        if ($event->isNew()) {
                            SeoEvent::createContentMetaBundle($calendarModel);
                            Seomatic::$plugin->sitemaps->submitSitemapIndex();
                        }
                    }
                }
            );
            // Handler: CalendarsService::EVENT_AFTER_DELETE
            BaseEvent::on(
                CalendarsService::class,
                CalendarsService::EVENT_AFTER_DELETE,
                function(DeleteModelEvent $event) {
                    Craft::debug(
                        'CalendarsService::EVENT_AFTER_DELETE',
                        __METHOD__
                    );
                    /** @var CalendarModel $calendarModel */
                    $calendarModel = $event->getModel();
                    if ($calendarModel !== null && $calendarModel->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoEvent::getMetaBundleType(),
                            $calendarModel->id,
                            false
                        );
                        // Delete the meta bundles for this Event
                        Seomatic::$plugin->metaBundles->deleteMetaBundleBySourceId(
                            SeoEvent::getMetaBundleType(),
                            $calendarModel->id
                        );
                    }
                }
            );
        }

        // Install only for non-console site requests
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
        }

        // Handler: Entry::EVENT_DEFINE_SIDEBAR_HTML
        BaseEvent::on(
            Event::class,
            Event::EVENT_DEFINE_SIDEBAR_HTML,
            static function(DefineHtmlEvent $event) {
                Craft::debug(
                    'Entry::EVENT_DEFINE_SIDEBAR_HTML',
                    __METHOD__
                );
                $html = '';
                Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
                /** @var Event $eventElement */
                $eventElement = $event->sender ?? null;
                if ($eventElement !== null && $eventElement->uri !== null) {
                    Seomatic::$plugin->metaContainers->previewMetaContainers($eventElement->uri, $eventElement->siteId, true);
                    // Render our preview sidebar template
                    if (Seomatic::$settings->displayPreviewSidebar) {
                        $html .= PluginTemplate::renderPluginTemplate('_sidebars/event-preview.twig');
                    }
                    // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (Seomatic::$settings->displayAnalysisSidebar) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/event-analysis.twig');
//                }
                }
                $event->html .= $html;
            }
        );
    }

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
     * Create a MetaBundle in the db for each site, from the passed in $sourceModel
     *
     * @param Model $sourceModel
     */
    public static function createContentMetaBundle(Model $sourceModel)
    {
        /** @var CalendarModel $sourceModel */
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var Site $site */
        foreach ($sites as $site) {
            $seoElement = self::class;
            Seomatic::$plugin->metaBundles->createMetaBundleFromSeoElement($seoElement, $sourceModel, $site->id, null, true);
        }
    }

    /**
     * Return the refHandle (e.g.: `entry` or `category`) for the SeoElement
     *
     * @return string
     */
    public static function getElementRefHandle(): string
    {
        return Event::refHandle();
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
        /** @var EventQuery $query */
        $query = Event::find();
        $query
            ->setCalendar($metaBundle->sourceHandle)
            ->setLoadOccurrences(false)
            ->siteId((int)$metaBundle->sourceSiteId)
            ->limit((int)$metaBundle->metaSitemapVars->sitemapLimit);

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
        return Event::find()
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
        /** @var EventQuery $query */
        $query = Event::find();
        $element = $query
            ->setCalendar($sourceHandle)
            ->siteId($siteId)
            ->one();
        if ($element) {
            /** @var ElementInterface $element */
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
        $calendar = CalendarPlugin::getInstance();
        if ($calendar !== null) {
            $layoutId = null;
            try {
                $calendarModel = $calendar->calendars->getCalendarByHandle($sourceHandle);
                if ($calendarModel) {
                    $layoutId = $calendarModel->fieldLayoutId;
                }
            } catch (Exception $e) {
                $layoutId = null;
            }
            if ($layoutId) {
                $layouts[] = Craft::$app->getFields()->getLayoutById($layoutId);
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
        return [];
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return CalendarModel|null
     */
    public static function sourceModelFromId(int $sourceId)
    {
        $calendarModel = null;
        $calendar = CalendarPlugin::getInstance();
        if ($calendar !== null) {
            $calendarModel = $calendar->calendars->getCalendarById($sourceId);
        }

        return $calendarModel;
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param string $sourceHandle
     *
     * @return CalendarModel|null
     */
    public static function sourceModelFromHandle(string $sourceHandle)
    {
        $calendarModel = null;
        $calendar = CalendarPlugin::getInstance();
        if ($calendar !== null) {
            $calendarModel = $calendar->calendars->getCalendarByHandle($sourceHandle);
        }

        return $calendarModel;
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
        /** @var CalendarModel $sourceModel */
        /** @phpstan-ignore-next-line */
        return Event::find()
            ->setCalendar($sourceModel->handle)
            ->siteId($sourceSiteId)
            ->limit(1)
            ->orderBy(['elements.dateUpdated' => SORT_DESC])
            ->one();
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
        /** @var CalendarModel $sourceModel */
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
     * Return the path to the config file directory
     *
     * @return string
     */
    public static function configFilePath(): string
    {
        return self::CONFIG_FILE_PATH;
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
        /** @var Event $element */
        return $element->calendarId;
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
        /** @var Event $element */
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
        /** @var Event $element */
        try {
            $sourceHandle = $element->getCalendar()->handle;
        } catch (Exception $e) {
        }

        return $sourceHandle;
    }

    /**
     * Create all the MetaBundles in the db for this Seo Element
     */
    public static function createAllContentMetaBundles()
    {
        $calendar = CalendarPlugin::getInstance();
        if ($calendar !== null) {
            // Get all of the calendars with URLs
            $calendarModels = $calendar->calendars->getAllCalendars();
            foreach ($calendarModels as $calendarModel) {
                self::createContentMetaBundle($calendarModel);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public static function getGqlInterfaceTypeName()
    {
        return EventInterface::getName();
    }
}
