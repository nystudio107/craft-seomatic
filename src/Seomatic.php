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

use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\MetaValue;
use nystudio107\seomatic\models\Settings;
use nystudio107\seomatic\services\FrontendTemplates as FrontendTemplatesService;
use nystudio107\seomatic\services\MetaBundles as MetaBundlesService;
use nystudio107\seomatic\services\MetaContainers as MetaContainersService;
use nystudio107\seomatic\services\Redirects as RedirectsService;
use nystudio107\seomatic\services\Sitemaps as SitemapsService;
use nystudio107\seomatic\twigextensions\SeomaticTwigExtension;
use nystudio107\seomatic\variables\SeomaticVariable;
use nystudio107\seomatic\web\ErrorHandler as SeomaticErrorHandler;


use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\base\Plugin;
use craft\elements\Entry;
use craft\elements\Category;
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
use craft\web\View;

use yii\base\Event;

/**
 * Class Seomatic
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 *
 * @property  FrontendTemplatesService frontendTemplates
 * @property  MetaBundlesService       metaBundles
 * @property  MetaContainersService    metaContainers
 * @property  RedirectsService         redirects
 * @property  SitemapsService          sitemaps
 */
class Seomatic extends Plugin
{
    // Constants
    // =========================================================================

    const SEOMATIC_HANDLE = 'Seomatic';

    // Static Properties
    // =========================================================================

    /**
     * @var Seomatic
     */
    public static $plugin;

    /**
     * @var Settings
     */
    public static $settings;

    /**
     * @var ElementInterface
     */
    public static $matchedElement;

    /**
     * @var bool
     */
    public static $devMode;

    /**
     * @var View
     */
    public static $view;

    /**
     * @var
     */
    public static $language;

    // Static Methods
    // =========================================================================

    /**
     * Set the matched element
     *
     * @param $element null|ElementInterface
     */
    public static function setMatchedElement($element)
    {
        self::$matchedElement = $element;
        /** @var  $element Element */
        if ($element) {
            self::$language = MetaValue::getSiteLanguage($element->siteId);
        } else {
            self::$language = MetaValue::getSiteLanguage(0);
        }
        MetaValueHelper::cache();
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        // Initialize properties
        self::$settings = Seomatic::$plugin->getSettings();
        self::$devMode = Craft::$app->getConfig()->getGeneral()->devMode;
        self::$view = Craft::$app->getView();
        MetaValue::cache();
        $this->name = Seomatic::$settings->pluginName;
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
        $this->installGlobalEventListeners();
        // Add in our Twig extensions
        Seomatic::$view->twig->addExtension(new SeomaticTwigExtension);
        // Only respond to non-console site requests
        $request = Craft::$app->getRequest();
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
            $this->handleSiteRequest();
        }
        // AdminCP magic
        if ($request->getIsCpRequest() && !$request->getIsConsoleRequest()) {
            $this->handleAdminCpRequest();
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Install global event listeners
     */
    protected function installGlobalEventListeners()
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
                // Frontend template caches
                $event->options[] = [
                    'key' => 'seomatic-frontendtemplate-caches',
                    'label' => Craft::t('seomatic', 'SEOmatic frontend template caches'),
                    'action' => function () {
                        Seomatic::$plugin->frontendTemplates->invalidateCaches();
                    },
                ];
                // Meta bundle caches
                $event->options[] = [
                    'key' => 'seomatic-metabundle-caches',
                    'label' => Craft::t('seomatic', 'SEOmatic metadata caches'),
                    'action' => function () {
                        Seomatic::$plugin->metaContainers->invalidateCaches();
                    },
                ];
                // Sitemap caches
                $event->options[] = [
                    'key' => 'seomatic-sitemap-caches',
                    'label' => Craft::t('seomatic', 'SEOmatic sitemap caches'),
                    'action' => function () {
                        Seomatic::$plugin->sitemaps->invalidateCaches();
                    },
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
                Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                    MetaBundlesService::SECTION_META_BUNDLE,
                    $event->section->id,
                    $event->isNew
                );
                // Create the meta bundles for this section if it's new
                if ($event->isNew) {
                    Seomatic::$plugin->metaBundles->createContentMetaBundleForSection($event->section);
                }
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
                Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                    MetaBundlesService::SECTION_META_BUNDLE,
                    $event->section->id,
                    false
                );
                // Delete the meta bundles for this section
                Seomatic::$plugin->metaBundles->deleteMetaBundleBySourceId(
                    MetaBundlesService::SECTION_META_BUNDLE,
                    $event->section->id
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
                Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                    MetaBundlesService::CATEGORYGROUP_META_BUNDLE,
                    $event->categoryGroup->id,
                    $event->isNew,
                    false
                );
                // Create the meta bundles for this category if it's new
                if ($event->isNew) {
                    Seomatic::$plugin->metaBundles->createContentMetaBundleForCategoryGroup($event->categoryGroup);
                }
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
                Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                    MetaBundlesService::CATEGORYGROUP_META_BUNDLE,
                    $event->categoryGroup->id,
                    false
                );
                // Delete the meta bundles for this category
                Seomatic::$plugin->metaBundles->deleteMetaBundleBySourceId(
                    MetaBundlesService::CATEGORYGROUP_META_BUNDLE,
                    $event->categoryGroup->id
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
                Seomatic::$plugin->metaBundles->invalidateMetaBundleByElement(
                    $element,
                    $event->isNew
                );
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
                Seomatic::$plugin->metaBundles->invalidateMetaBundleByElement(
                    $element,
                    false
                );
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
                if ($event->plugin === $this) {
                }
            }
        );
    }

    /**
     * Handle site requests
     */
    protected function handleSiteRequest()
    {
        // Load the sitemap containers
        Seomatic::$plugin->sitemaps->loadSitemapContainers();
        // Load the frontend template containers
        Seomatic::$plugin->frontendTemplates->loadFrontendTemplateContainers();
        // Register our error handler
        $handler = new SeomaticErrorHandler;
        Craft::$app->set('errorHandler', $handler);
        $handler->register();
        // Handler: View::EVENT_END_PAGE
        Event::on(
            View::className(),
            View::EVENT_END_PAGE,
            function (Event $event) {
                Craft::trace(
                    'View::EVENT_END_PAGE',
                    'seomatic'
                );
                // The page is done rendering, include our meta containers
                Seomatic::$plugin->metaContainers->includeMetaContainers();
            }
        );
    }

    /**
     * Handle AdminCP requests
     */
    protected function handleAdminCpRequest()
    {
        Craft::$app->getView()->hook('cp.entries.edit.right-pane', function (&$context) {
            $html = '';
            self::$view->registerAssetBundle(SeomaticAsset::class);
            /** @var  $entry Entry */
            $entry = $context['entry'];
            if (!empty($entry) && !empty($entry->uri)) {
                Seomatic::$plugin->metaContainers->loadMetaContainers($entry->uri, $entry->siteId);
                // Render our sidebar template
                $html = Craft::$app->view->renderTemplate(
                    'seomatic/_sidebar',
                    [
                        'seomatic' => Seomatic::$plugin->metaContainers->metaGlobalVars,
                        'settings' => $this->getSettings(),
                    ]
                );
            }

            return $html;
        });
        Craft::$app->getView()->hook('cp.categories.edit.right-pane', function (&$context) {
            $html = '';
            self::$view->registerAssetBundle(SeomaticAsset::class);
            /** @var  $category Category */
            $category = $context['category'];
            if (!empty($category) && !empty($category->uri)) {
                Seomatic::$plugin->metaContainers->loadMetaContainers($category->uri, $category->siteId);

                // Render our sidebar template
                $html = Craft::$app->view->renderTemplate(
                    'seomatic/_sidebar',
                    [
                        'seomatic' => Seomatic::$plugin->metaContainers->metaGlobalVars,
                        'settings' => $this->getSettings(),
                    ]
                );
            }

            return $html;
        });
    }

    /**
     * @inheritdoc
     */
    public function defineTemplateComponent()
    {
        return SeomaticVariable::class;
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        // Render our settings template
        return Craft::$app->view->renderTemplate(
            'seomatic/settings',
            [
                'settings' => $this->getSettings(),
            ]
        );
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
