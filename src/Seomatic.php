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

namespace nystudio107\seomatic;

use nystudio107\seomatic\web\ErrorHandler as SeomaticErrorHandler;
use nystudio107\seomatic\services\MetaBundles as MetaBundlesService;
use nystudio107\seomatic\services\MetaContainers as MetaContainersService;
use nystudio107\seomatic\services\Sitemaps as SitemapsService;
use nystudio107\seomatic\twigextensions\SeomaticTwigExtension;
use nystudio107\seomatic\variables\SeomaticVariable;

use Craft;
use craft\base\Element;
use craft\base\Plugin;
use craft\elements\Category;
use craft\elements\Entry;
use craft\events\CategoryGroupEvent;
use craft\events\ElementEvent;
use craft\events\PluginEvent;
use craft\events\RegisterCacheOptionsEvent;
use craft\events\SectionEvent;
use craft\services\Categories;
use craft\services\Elements;
use craft\services\Plugins;
use craft\services\Sections;
use craft\utilities\ClearCaches;

use yii\base\Event;

/**
 * Class Seomatic
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 *
 * @property  MetaBundlesService    metaBundles
 * @property  MetaContainersService metaContainers
 * @property  SitemapsService       sitemaps
 */
class Seomatic extends Plugin
{
    /**
     * @var Seomatic
     */
    public static $plugin;

    /**
     * @var bool
     */
    public static $devMode;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        self::$devMode = Craft::$app->getConfig()->getGeneral()->devMode;
        $this->name = $this->getName();
        // We're loaded
        Craft::info(
            Craft::t(
                'seomatic',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
        // Add in our event listeners that are needed for every request
        $this->installEventListeners();
        // Only respond to non-console site requests
        $request = Craft::$app->getRequest();
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
            // Add in our Twig extensions
            Craft::$app->view->twig->addExtension(new SeomaticTwigExtension);
            // Load the sitemap containers
            Seomatic::$plugin->sitemaps->loadSitemapContainers();
            // Register our error handler
            $handler = new SeomaticErrorHandler;
            Craft::$app->set('errorHandler', $handler);
            $handler->register();
        }
    }

    /**
     * @inheritdoc
     */
    public function defineTemplateComponent()
    {
        return SeomaticVariable::class;
    }

    /**
     * Returns the user-facing name of the plugin, which can override the name
     * in composer.json
     *
     * @return mixed
     */
    public function getName(): string
    {
        return Craft::t('seomatic', 'SEOmatic');
    }

    /**
     * Install global event listeners
     */
    protected function installEventListeners()
    {
        // Handler: ClearCaches::EVENT_REGISTER_CACHE_OPTIONS
        Event::on(
            ClearCaches::className(),
            ClearCaches::EVENT_REGISTER_CACHE_OPTIONS,
            function (RegisterCacheOptionsEvent $event) {
                Craft::trace(
                    'ClearCaches::EVENT_REGISTER_CACHE_OPTIONS',
                    'seomatic'
                );
                // Sitemap caches
                $event->options[] = [
                    'key' => 'seomatic-sitemap-caches',
                    'label' => Craft::t('seomatic', 'SEOmatic sitemap caches'),
                    'action' => function () {
                        Seomatic::$plugin->sitemaps->invalidateCaches();
                    }
                ];
            }
        );
        // Handler: Sections::EVENT_AFTER_SAVE_SECTION
        Event::on(
            Sections::class,
            Sections::EVENT_AFTER_SAVE_SECTION,
            function (SectionEvent $event) {
                Craft::trace(
                    'Sections::EVENT_AFTER_SAVE_SECTION',
                    'seomatic'
                );
                Seomatic::$plugin->metaBundles->invalidateMetaBundle(
                    $event->section->id,
                    $event->isNew
                );
            }
        );
        // Handler: Sections::EVENT_AFTER_DELETE_SECTION
        Event::on(
            Sections::class,
            Sections::EVENT_AFTER_DELETE_SECTION,
            function (SectionEvent $event) {
                Craft::trace(
                    'Sections::EVENT_AFTER_DELETE_SECTION',
                    'seomatic'
                );
                Seomatic::$plugin->metaBundles->invalidateMetaBundle(
                    $event->section->id,
                    false
                );
            }
        );
        // Handler: Categories::EVENT_AFTER_SAVE_GROUP
        Event::on(
            Categories::class,
            Categories::EVENT_AFTER_SAVE_GROUP,
            function (CategoryGroupEvent $event) {
                Craft::trace(
                    'Categories::EVENT_AFTER_SAVE_GROUP',
                    'seomatic'
                );
                Seomatic::$plugin->metaBundles->invalidateMetaBundle(
                    $event->categoryGroup->id,
                    $event->isNew
                );
            }
        );
        // Handler: Categories::EVENT_AFTER_DELETE_GROUP
        Event::on(
            Categories::class,
            Categories::EVENT_AFTER_DELETE_GROUP,
            function (CategoryGroupEvent $event) {
                Craft::trace(
                    'Categories::EVENT_AFTER_DELETE_GROUP',
                    'seomatic'
                );
                Seomatic::$plugin->metaBundles->invalidateMetaBundle(
                    $event->categoryGroup->id,
                    false
                );
            }
        );
        // Handler: Elements::EVENT_AFTER_SAVE_ELEMENT
        Event::on(
            Elements::class,
            Elements::EVENT_AFTER_SAVE_ELEMENT,
            function (ElementEvent $event) {
                Craft::trace(
                    'Elements::EVENT_AFTER_SAVE_ELEMENT',
                    'seomatic'
                );
                /** @var  $element Element */
                $element = $event->element;
                // See if this is a section we are tracking
                $id = $this->getMetaSourceIdFromElement($element);
                if ($id) {
                    Seomatic::$plugin->metaBundles->invalidateMetaBundle(
                        $id,
                        $event->isNew
                    );
                }
            }
        );
        // Handler: Elements::EVENT_AFTER_DELETE_ELEMENT
        Event::on(
            Elements::class,
            Elements::EVENT_AFTER_DELETE_ELEMENT,
            function (ElementEvent $event) {
                Craft::trace(
                    'Elements::EVENT_AFTER_DELETE_ELEMENT',
                    'seomatic'
                );
                /** @var  $element Element */
                $element = $event->element;
                // See if this is a section we are tracking
                $id = $this->getMetaSourceIdFromElement($element);
                if ($id) {
                    Seomatic::$plugin->metaBundles->invalidateMetaBundle(
                        $id,
                        false
                    );
                }
            }
        );
        // Handler: Plugins::EVENT_AFTER_INSTALL_PLUGIN
        Event::on(
            Plugins::className(),
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                Craft::trace(
                    'Plugins::EVENT_AFTER_INSTALL_PLUGIN',
                    'seomatic'
                );
                // Create our default data
                if ($event->plugin === $this) {
                    Seomatic::$plugin->metaBundles->createGlobalMetaBundles();
                    Seomatic::$plugin->metaBundles->createContentMetaBundles();
                }
            }
        );
    }

    /**
     * @param Element $element
     *
     * @return int
     */
    protected function getMetaSourceIdFromElement(Element $element): int
    {
        $sourceId = 0;
        // See if this is a section we are tracking
        switch ($element::className()) {
            case Entry::class:
                /** @var  $element Entry */
                $sourceId = $element->sectionId;
                break;

            case Category::class:
                /** @var  $element Category */
                $sourceId = $element->groupId;
                break;
        }

        return $sourceId;
    }
}

/*
        $someSchema = JsonLd::create("Article");
        $someSchema->name = "Andrew";
        $someSchema->url = "https://nystudio107.com";
        $someSchema->description = "This is some description thing";

        $someOtherSchema = JsonLd::create("Person", [
            "name" => "Polly",
            "description" => "wife",
            "url" => "https://nystudio107.com",
            ]);

        $someMoreSchema = JsonLd::create("Person");
        $someMoreSchema->attributes = [
            "name" => "Kumba",
            "description" => "dog",
            "url" => "http://woof.com",
            ];

        $someSchema->author = [$someOtherSchema, $someOtherSchema];
        $someSchema->publisher = $someMoreSchema;
        $someJson = $someSchema->render();
        if ($someSchema->validate())
        {
        }
        else
        {
        //    Craft::dd($someSchema->errors);
        }
        $stuff = (string)$someSchema;
        Craft::dump($stuff);
        Craft::dump($someSchema->getSchemaTypeDescription());
        Craft::dd($someJson);
        */
