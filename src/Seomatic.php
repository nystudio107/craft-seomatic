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
use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;
use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\Settings;
use nystudio107\seomatic\services\FrontendTemplates as FrontendTemplatesService;
use nystudio107\seomatic\services\Helper as HelperService;
use nystudio107\seomatic\services\JsonLd as JsonLdService;
use nystudio107\seomatic\services\Link as LinkService;
use nystudio107\seomatic\services\MetaBundles as MetaBundlesService;
use nystudio107\seomatic\services\MetaContainers as MetaContainersService;
use nystudio107\seomatic\services\Script as ScriptService;
use nystudio107\seomatic\services\Sitemaps as SitemapsService;
use nystudio107\seomatic\services\Tag as TagService;
use nystudio107\seomatic\services\Title as TitleService;
use nystudio107\seomatic\twigextensions\SeomaticTwigExtension;
use nystudio107\seomatic\variables\SeomaticVariable;

use nystudio107\fastcgicachebust\FastcgiCacheBust;

use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\base\Plugin;
use craft\elements\Entry;
use craft\elements\Category;
use craft\elements\User;
use craft\errors\SiteNotFoundException;
use craft\events\CategoryGroupEvent;
use craft\events\ElementEvent;
use craft\events\DeleteTemplateCachesEvent;
use craft\events\PluginEvent;
use craft\events\RegisterCacheOptionsEvent;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\events\RegisterUserPermissionsEvent;
use craft\events\SectionEvent;
use craft\helpers\StringHelper;
use craft\services\Categories;
use craft\services\Elements;
use craft\services\Fields;
use craft\services\Plugins;
use craft\services\Sections;
use craft\services\TemplateCaches;
use craft\services\UserPermissions;
use craft\helpers\UrlHelper;
use craft\utilities\ClearCaches;
use craft\web\UrlManager;
use craft\web\View;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;

use yii\base\Event;

/**
 * Class Seomatic
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 *
 * @property  FrontendTemplatesService frontendTemplates
 * @property  HelperService            helper
 * @property  JsonLdService            jsonLd
 * @property  LinkService              link
 * @property  MetaBundlesService       metaBundles
 * @property  MetaContainersService    metaContainers
 * @property  ScriptService            script
 * @property  SitemapsService          sitemaps
 * @property  TagService               tag
 * @property  TitleService             title
 */
class Seomatic extends Plugin
{
    // Constants
    // =========================================================================

    const SEOMATIC_HANDLE = 'Seomatic';

    const DEVMODE_CACHE_DURATION = 30;

    // Static Properties
    // =========================================================================

    /**
     * @var Seomatic
     */
    public static $plugin;

    /**
     * @var SeomaticVariable
     */
    public static $seomaticVariable;

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

    /**
     * @var int
     */
    public static $cacheDuration;

    /**
     * @var bool
     */
    public static $commerceInstalled = false;

    /**
     * @var bool
     */
    public static $previewingMetaContainers = false;

    /**
     * @var bool
     */
    public static $loadingContainers = false;

    /**
     * @var bool
     */
    public static $savingSettings = false;

    /**
     * @var bool
     */
    public static $craft31 = false;

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
            self::$language = MetaValueHelper::getSiteLanguage($element->siteId);
        } else {
            self::$language = MetaValueHelper::getSiteLanguage(null);
        }
        MetaValueHelper::cache();
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '3.0.6';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        // Handle any console commands
        $request = Craft::$app->getRequest();
        if ($request->getIsConsoleRequest()) {
            $this->controllerNamespace = 'nystudio107\seomatic\console\controllers';
        }
        // Initialize properties
        self::$settings = Seomatic::$plugin->getSettings();
        self::$devMode = Craft::$app->getConfig()->getGeneral()->devMode;
        self::$view = Craft::$app->getView();
        self::$cacheDuration = Seomatic::$devMode
            ? $this::DEVMODE_CACHE_DURATION
            : null;
        MetaValueHelper::cache();
        // If devMode is on, always force the environment to be 'local'
        if (self::$devMode) {
            self::$settings->environment = 'local';
        }
        self::$craft31 = version_compare(Craft::$app->getVersion(), '3.1', '>=');
        $this->name = Seomatic::$settings->pluginName;
        // Determine whether Craft Commerce exists
        self::$commerceInstalled = class_exists(CommercePlugin::class);
        // Install our event listeners
        $this->installEventListeners();
        // We're loaded
        Craft::info(
            Craft::t(
                'seomatic',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    /**
     * @inheritdoc
     */
    public function getSettings()
    {
        // For all the emojis
        $settingsModel = parent::getSettings();
        if ($settingsModel !== null && !Seomatic::$savingSettings) {
            $attributes = $settingsModel->attributes();
            if ($attributes !== null) {
                foreach ($attributes as $attribute) {
                    if (\is_string($settingsModel->$attribute)) {
                        $settingsModel->$attribute = html_entity_decode($settingsModel->$attribute, ENT_NOQUOTES, 'UTF-8');
                    }
                }
            }
            Seomatic::$savingSettings = false;
        }

        return $settingsModel;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsResponse()
    {
        // Just redirect to the plugin settings page
        Craft::$app->getResponse()->redirect(UrlHelper::cpUrl('seomatic/plugin'));
    }

    /**
     * @inheritdoc
     */
    public function getCpNavItem()
    {
        $subNavs = [];
        $navItem = parent::getCpNavItem();
        /** @var User $currentUser */
        $currentUser = Craft::$app->getUser()->getIdentity();
        // Only show sub-navs the user has permission to view
        if ($currentUser->can('seomatic:dashboard')) {
            $subNavs['dashboard'] = [
                'label' => 'Dashboard',
                'url' => 'seomatic/dashboard',
            ];
        }
        if ($currentUser->can('seomatic:global-meta')) {
            $subNavs['global'] = [
                'label' => 'Global SEO',
                'url' => 'seomatic/global',
            ];
        }
        if ($currentUser->can('seomatic:content-meta')) {
            $subNavs['content'] = [
                'label' => 'Content SEO',
                'url' => 'seomatic/content',
            ];
        }
        if ($currentUser->can('seomatic:site-settings')) {
            $subNavs['site'] = [
                'label' => 'Site Settings',
                'url' => 'seomatic/site',
            ];
        }
        if ($currentUser->can('seomatic:tracking-scripts')) {
            $subNavs['tracking'] = [
                'label' => 'Tracking Scripts',
                'url' => 'seomatic/tracking',
            ];
        }
        if ($currentUser->can('seomatic:plugin-settings')) {
            $subNavs['plugin'] = [
                'label' => 'Plugin Settings',
                'url' => 'seomatic/plugin',
            ];
        }
        $navItem = array_merge($navItem, [
            'subnav' => $subNavs,
        ]);

        return $navItem;
    }

    /**
     * Clear all the caches!
     */
    public function clearAllCaches()
    {
        // Clear all of SEOmatic's caches
        Seomatic::$plugin->frontendTemplates->invalidateCaches();
        Seomatic::$plugin->metaContainers->invalidateCaches();
        Seomatic::$plugin->sitemaps->invalidateCaches();
        // If the FastCGI Cache Bust plugin is installed, clear its caches too
        $plugin = Craft::$app->getPlugins()->getPlugin('fastcgi-cache-bust');
        if ($plugin !== null) {
            FastcgiCacheBust::$plugin->cache->clearAll();
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Determine whether our table schema exists or not; this is needed because
     * migrations such as the install migration and base_install migration may
     * not have been run by the time our init() method has been called
     *
     * @return bool
     */
    protected function tableSchemaExists(): bool
    {
        return (Craft::$app->db->schema->getTableSchema('{{%seomatic_metabundles}}') !== null);
    }

    /**
     * Install our event listeners.
     */
    protected function installEventListeners()
    {
        // Install our event listeners only if our table schema exists
        if ($this->tableSchemaExists()) {
            // Add in our Twig extensions
            Seomatic::$view->registerTwigExtension(new SeomaticTwigExtension);
            $request = Craft::$app->getRequest();
            // Add in our event listeners that are needed for every request
            $this->installGlobalEventListeners();
            // Install only for non-console site requests
            if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
                $this->installSiteEventListeners();
            }
            // Install only for non-console Control Panel requests
            if ($request->getIsCpRequest() && !$request->getIsConsoleRequest()) {
                $this->installCpEventListeners();
            }
        }
        // Handler: EVENT_AFTER_INSTALL_PLUGIN
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                    // Invalidate our caches after we've been installed
                    $this->clearAllCaches();
                    // Send them to our welcome screen
                    $request = Craft::$app->getRequest();
                    if ($request->isCpRequest) {
                        Craft::$app->getResponse()->redirect(UrlHelper::cpUrl(
                            'seomatic/dashboard',
                            [
                                'showWelcome' => true,
                            ]
                        ))->send();
                    }
                }
            }
        );
        // Handler: ClearCaches::EVENT_REGISTER_CACHE_OPTIONS
        Event::on(
            ClearCaches::class,
            ClearCaches::EVENT_REGISTER_CACHE_OPTIONS,
            function (RegisterCacheOptionsEvent $event) {
                Craft::debug(
                    'ClearCaches::EVENT_REGISTER_CACHE_OPTIONS',
                    __METHOD__
                );
                // Register our Control Panel routes
                $event->options = array_merge(
                    $event->options,
                    $this->customAdminCpCacheOptions()
                );
            }
        );
        // Handler: EVENT_BEFORE_SAVE_PLUGIN_SETTINGS
        Event::on(
            Plugins::class,
            Plugins::EVENT_BEFORE_SAVE_PLUGIN_SETTINGS,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                    // For all the emojis
                    if (!Craft::$app->getDb()->getSupportsMb4()) {
                        $settingsModel = $this->getSettings();
                        Seomatic::$savingSettings = true;
                        if ($settingsModel !== null) {
                            $attributes = $settingsModel->attributes();
                            if ($attributes !== null) {
                                foreach ($attributes as $attribute) {
                                    if (\is_string($settingsModel->$attribute)) {
                                        $settingsModel->$attribute = StringHelper::encodeMb4($settingsModel->$attribute);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        );
    }

    /**
     * Install global event listeners for all request types
     */
    protected function installGlobalEventListeners()
    {
        // Handler: Plugins::EVENT_AFTER_LOAD_PLUGINS
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_LOAD_PLUGINS,
            function () {
                // Install these only after all other plugins have loaded
                $request = Craft::$app->getRequest();
                // Only respond to non-console site requests
                if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
                    $this->handleSiteRequest();
                }
                // Respond to Control Panel requests
                if ($request->getIsCpRequest() && !$request->getIsConsoleRequest()) {
                    $this->handleAdminCpRequest();
                }
            }
        );
        // Handler: Fields::EVENT_REGISTER_FIELD_TYPES
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = SeoSettingsField::class;
                $event->types[] = Seomatic_MetaField::class;
            }
        );
        // Handler: TemplateCaches::EVENT_AFTER_DELETE_CACHES
        Event::on(
            TemplateCaches::class,
            TemplateCaches::EVENT_AFTER_DELETE_CACHES,
            function (DeleteTemplateCachesEvent $event) {
                Seomatic::$plugin->metaContainers->invalidateCaches();
            }
        );
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
                        MetaBundlesService::SECTION_META_BUNDLE,
                        $event->section->id,
                        $event->isNew
                    );
                    // Create the meta bundles for this section if it's new
                    if ($event->isNew) {
                        Seomatic::$plugin->metaBundles->createContentMetaBundleForSection($event->section);
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
            }
        );
        // Handler: Categories::EVENT_AFTER_SAVE_GROUP
        Event::on(
            Categories::class,
            Categories::EVENT_AFTER_SAVE_GROUP,
            function (CategoryGroupEvent $event) {
                Craft::debug(
                    'Categories::EVENT_AFTER_SAVE_GROUP',
                    __METHOD__
                );
                if ($event->categoryGroup !== null && $event->categoryGroup->id !== null) {
                    Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                        MetaBundlesService::CATEGORYGROUP_META_BUNDLE,
                        $event->categoryGroup->id,
                        $event->isNew
                    );
                    // Create the meta bundles for this category if it's new
                    if ($event->isNew) {
                        Seomatic::$plugin->metaBundles->createContentMetaBundleForCategoryGroup($event->categoryGroup);
                        Seomatic::$plugin->sitemaps->submitSitemapIndex();
                    }
                }
            }
        );
        // Handler: Categories::EVENT_AFTER_DELETE_GROUP
        Event::on(
            Categories::class,
            Categories::EVENT_AFTER_DELETE_GROUP,
            function (CategoryGroupEvent $event) {
                Craft::debug(
                    'Categories::EVENT_AFTER_DELETE_GROUP',
                    __METHOD__
                );
                if ($event->categoryGroup !== null && $event->categoryGroup->id !== null) {
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
            }
        );
        // Handler: Elements::EVENT_AFTER_SAVE_ELEMENT
        Event::on(
            Elements::class,
            Elements::EVENT_AFTER_SAVE_ELEMENT,
            function (ElementEvent $event) {
                Craft::debug(
                    'Elements::EVENT_AFTER_SAVE_ELEMENT',
                    __METHOD__
                );
                /** @var  $element Element */
                $element = $event->element;
                Seomatic::$plugin->metaBundles->invalidateMetaBundleByElement(
                    $element,
                    $event->isNew
                );
                if ($event->isNew) {
                    Seomatic::$plugin->sitemaps->submitSitemapForElement($element);
                }
            }
        );
        // Handler: Elements::EVENT_AFTER_DELETE_ELEMENT
        Event::on(
            Elements::class,
            Elements::EVENT_AFTER_DELETE_ELEMENT,
            function (ElementEvent $event) {
                Craft::debug(
                    'Elements::EVENT_AFTER_DELETE_ELEMENT',
                    __METHOD__
                );
                /** @var  $element Element */
                $element = $event->element;
                Seomatic::$plugin->metaBundles->invalidateMetaBundleByElement(
                    $element,
                    false
                );
            }
        );
    }

    /**
     * Install site event listeners for site requests only
     */
    protected function installSiteEventListeners()
    {
        // Load the sitemap containers
        Seomatic::$plugin->sitemaps->loadSitemapContainers();
        // Load the frontend template containers
        Seomatic::$plugin->frontendTemplates->loadFrontendTemplateContainers();
        // Handler: UrlManager::EVENT_REGISTER_SITE_URL_RULES
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                Craft::debug(
                    'UrlManager::EVENT_REGISTER_SITE_URL_RULES',
                    __METHOD__
                );
                $path = 'seomatic/seo-file-link/<url:[^\/]+>/<robots:[^\/]+>/<canonical:[^\/]+>/<inline:\d+>/<fileName:[-\w\.*]+>';
                $route = Seomatic::$plugin->handle.'/file/seo-file-link';
                $event->rules[$path] = ['route' => $route];
            }
        );
    }

    /**
     * Install site event listeners for Control Panel requests only
     */
    protected function installCpEventListeners()
    {
        // Handler: UrlManager::EVENT_REGISTER_CP_URL_RULES
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                Craft::debug(
                    'UrlManager::EVENT_REGISTER_CP_URL_RULES',
                    __METHOD__
                );
                // Register our Control Panel routes
                $event->rules = array_merge(
                    $event->rules,
                    $this->customAdminCpRoutes()
                );
            }
        );
        // Handler: UserPermissions::EVENT_REGISTER_PERMISSIONS
        Event::on(
            UserPermissions::class,
            UserPermissions::EVENT_REGISTER_PERMISSIONS,
            function (RegisterUserPermissionsEvent $event) {
                Craft::debug(
                    'UserPermissions::EVENT_REGISTER_PERMISSIONS',
                    __METHOD__
                );
                // Register our custom permissions
                $event->permissions[Craft::t('seomatic', 'SEOmatic')] = $this->customAdminCpPermissions();
            }
        );
    }

    /**
     * Handle site requests.  We do it only after we receive the event
     * EVENT_AFTER_LOAD_PLUGINS so that any pending db migrations can be run
     * before our event listeners kick in
     */
    protected function handleSiteRequest()
    {
        // Handler: View::EVENT_BEGIN_BODY
        Event::on(
            View::class,
            View::EVENT_BEGIN_BODY,
            function () {
                Craft::debug(
                    'View::EVENT_BEGIN_BODY',
                    __METHOD__
                );
                // The <body> placeholder tag has just rendered, include any script HTML
                if (Seomatic::$settings->renderEnabled && Seomatic::$seomaticVariable) {
                    Seomatic::$plugin->metaContainers->includeScriptBodyHtml(View::POS_BEGIN);
                }
            }
        );
        // Handler: View::EVENT_END_BODY
        Event::on(
            View::class,
            View::EVENT_END_BODY,
            function () {
                Craft::debug(
                    'View::EVENT_END_BODY',
                    __METHOD__
                );
                // The </body> placeholder tag is about to be rendered, include any script HTML
                if (Seomatic::$settings->renderEnabled && Seomatic::$seomaticVariable) {
                    Seomatic::$plugin->metaContainers->includeScriptBodyHtml(View::POS_END);
                }
            }
        );
        // Handler: View::EVENT_END_PAGE
        Event::on(
            View::class,
            View::EVENT_END_PAGE,
            function () {
                Craft::debug(
                    'View::EVENT_END_PAGE',
                    __METHOD__
                );
                // The page is done rendering, include our meta containers
                if (Seomatic::$settings->renderEnabled && Seomatic::$seomaticVariable) {
                    Seomatic::$plugin->metaContainers->includeMetaContainers();
                }
            }
        );
    }

    /**
     * Handle Control Panel requests. We do it only after we receive the event
     * EVENT_AFTER_LOAD_PLUGINS so that any pending db migrations can be run
     * before our event listeners kick in
     */
    protected function handleAdminCpRequest()
    {
        // Don't cache Control Panel requests
        self::$cacheDuration = 1;
        // Prefix the Control Panel title
        self::$view->hook('cp.layouts.base', function (&$context) {
            if (self::$devMode) {
                $context['docTitle'] = self::$settings->devModeCpTitlePrefix.$context['docTitle'];
            } else {
                $context['docTitle'] = self::$settings->cpTitlePrefix.$context['docTitle'];
            }
        });
        // Entries sidebar
        self::$view->hook('cp.entries.edit.details', function (&$context) {
            $html = '';
            self::$view->registerAssetBundle(SeomaticAsset::class);
            /** @var  $entry Entry */
            $entry = $context['entry'];
            if ($entry !== null && $entry->uri !== null) {
                Seomatic::$plugin->metaContainers->previewMetaContainers($entry->uri, $entry->siteId, true);
                // Render our preview sidebar template
                if (self::$settings->displayPreviewSidebar && self::$matchedElement) {
                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/entry-preview.twig');
                }
                // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (self::$settings->displayAnalysisSidebar && self::$matchedElement) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/entry-analysis.twig');
//                }
            }

            return $html;
        });
        // Category Groups sidebar
        self::$view->hook('cp.categories.edit.details', function (&$context) {
            $html = '';
            self::$view->registerAssetBundle(SeomaticAsset::class);
            /** @var  $category Category */
            $category = $context['category'];
            if ($category !== null && $category->uri !== null) {
                Seomatic::$plugin->metaContainers->previewMetaContainers($category->uri, $category->siteId, true);
                // Render our preview sidebar template
                if (self::$settings->displayPreviewSidebar) {
                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/category-preview.twig');
                }
                // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (self::$settings->displayAnalysisSidebar) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/category-analysis.twig');
//                }
            }

            return $html;
        });
        // Commerce Product Types sidebar
        if (Seomatic::$commerceInstalled) {
            $commerce = CommercePlugin::getInstance();
            if ($commerce !== null) {
                self::$view->hook('cp.commerce.product.edit.details', function (&$context) {
                    $html = '';
                    self::$view->registerAssetBundle(SeomaticAsset::class);
                    /** @var  $product Product */
                    $product = $context['product'];
                    if ($product !== null && $product->uri !== null) {
                        Seomatic::$plugin->metaContainers->previewMetaContainers($product->uri, $product->siteId, true);
                        // Render our preview sidebar template
                        if (self::$settings->displayPreviewSidebar) {
                            $html .= PluginTemplate::renderPluginTemplate('_sidebars/product-preview.twig');
                        }
                        // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (self::$settings->displayAnalysisSidebar) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/product-analysis.twig');
//                }
                    }

                    return $html;
                });
            }
        }
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * Return the custom Control Panel routes
     *
     * @return array
     */
    protected function customAdminCpRoutes(): array
    {
        return [
            'seomatic' =>
                'seomatic/settings/dashboard',
            'seomatic/dashboard' =>
                'seomatic/settings/dashboard',
            'seomatic/dashboard/<siteHandle:{handle}>' =>
                'seomatic/settings/dashboard',

            'seomatic/global' => [
                'route' => 'seomatic/settings/global',
                'defaults' => ['subSection' => 'general'],
            ],
            'seomatic/global/<subSection:{handle}>' =>
                'seomatic/settings/global',
            'seomatic/global/<subSection:{handle}>/<siteHandle:{handle}>' =>
                'seomatic/settings/global',

            'seomatic/content' =>
                'seomatic/settings/content',
            'seomatic/content/<siteHandle:{handle}>' =>
                'seomatic/settings/content',

            'seomatic/edit-content/<subSection:{handle}>/<sourceBundleType:{handle}>/<sourceHandle:{handle}>' =>
                'seomatic/settings/edit-content',
            'seomatic/edit-content/<subSection:{handle}>/<sourceBundleType:{handle}>/<sourceHandle:{handle}>/<siteHandle:{handle}>' =>
                'seomatic/settings/edit-content',

            'seomatic/site' => [
                'route' => 'seomatic/settings/site',
                'defaults' => ['subSection' => 'identity'],
            ],
            'seomatic/site/<subSection:{handle}>' =>
                'seomatic/settings/site',
            'seomatic/site/<subSection:{handle}>/<siteHandle:{handle}>' =>
                'seomatic/settings/site',

            'seomatic/tracking' => [
                'route' => 'seomatic/settings/tracking',
                'defaults' => ['subSection' => 'googleAnalytics'],
            ],
            'seomatic/tracking/<subSection:{handle}>' =>
                'seomatic/settings/tracking',
            'seomatic/tracking/<subSection:{handle}>/<siteHandle:{handle}>' =>
                'seomatic/settings/tracking',

            'seomatic/plugin' =>
                'seomatic/settings/plugin',
        ];
    }

    /**
     * Returns the custom Control Panel cache options.
     *
     * @return array
     */
    protected function customAdminCpCacheOptions(): array
    {
        return [
            // Frontend template caches
            [
                'key' => 'seomatic-frontendtemplate-caches',
                'label' => Craft::t('seomatic', 'SEOmatic frontend template caches'),
                'action' => [Seomatic::$plugin->frontendTemplates, 'invalidateCaches'],
            ],
            // Meta bundle caches
            [
                'key' => 'seomatic-metabundle-caches',
                'label' => Craft::t('seomatic', 'SEOmatic metadata caches'),
                'action' => [Seomatic::$plugin->metaContainers, 'invalidateCaches'],
            ],
            // Sitemap caches
            [
                'key' => 'seomatic-sitemap-caches',
                'label' => Craft::t('seomatic', 'SEOmatic sitemap caches'),
                'action' => [Seomatic::$plugin->sitemaps, 'invalidateCaches'],
            ],
        ];
    }

    /**
     * Returns the custom Control Panel user permissions.
     *
     * @return array
     */
    protected function customAdminCpPermissions(): array
    {
        // The script meta containers for the global meta bundle
        try {
            $currentSiteId = Craft::$app->getSites()->getCurrentSite()->id ?? 1;
        } catch (SiteNotFoundException $e) {
            $currentSiteId = 1;
        }
        // Dynamic permissions for the scripts
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($currentSiteId);
        $scriptsPerms = [];
        if ($metaBundle !== null) {
            $scripts = Seomatic::$plugin->metaBundles->getContainerDataFromBundle(
                $metaBundle,
                MetaScriptContainer::CONTAINER_TYPE
            );
            foreach ($scripts as $scriptHandle => $scriptData) {
                $scriptsPerms["seomatic:tracking-scripts:${scriptHandle}"] = [
                    'label' => Craft::t('seomatic', $scriptData->name),
                ];
            }
        }

        return [
            'seomatic:dashboard' => [
                'label' => Craft::t('seomatic', 'Dashboard'),
            ],
            'seomatic:global-meta' => [
                'label' => Craft::t('seomatic', 'Edit Global Meta'),
                'nested' => [
                    'seomatic:global-meta:general' => [
                        'label' => Craft::t('seomatic', 'General'),
                    ],
                    'seomatic:global-meta:twitter' => [
                        'label' => Craft::t('seomatic', 'Twitter'),
                    ],
                    'seomatic:global-meta:facebook' => [
                        'label' => Craft::t('seomatic', 'Facebook'),
                    ],
                    'seomatic:global-meta:robots' => [
                        'label' => Craft::t('seomatic', 'Robots'),
                    ],
                    'seomatic:global-meta:humans' => [
                        'label' => Craft::t('seomatic', 'Humans'),
                    ],
                    'seomatic:global-meta:ads' => [
                        'label' => Craft::t('seomatic', 'Ads'),
                    ],
                ],
            ],
            'seomatic:content-meta' => [
                'label' => Craft::t('seomatic', 'Edit Content SEO'),
                'nested' => [
                    'seomatic:content-meta:general' => [
                        'label' => Craft::t('seomatic', 'General'),
                    ],
                    'seomatic:content-meta:twitter' => [
                        'label' => Craft::t('seomatic', 'Twitter'),
                    ],
                    'seomatic:content-meta:facebook' => [
                        'label' => Craft::t('seomatic', 'Facebook'),
                    ],
                    'seomatic:content-meta:sitemap' => [
                        'label' => Craft::t('seomatic', 'Sitemap'),
                    ],
                ],
            ],
            'seomatic:site-settings' => [
                'label' => Craft::t('seomatic', 'Edit Site Settings'),
                'nested' => [
                    'seomatic:site-settings:identity' => [
                        'label' => Craft::t('seomatic', 'Identity'),
                    ],
                    'seomatic:site-settings:creator' => [
                        'label' => Craft::t('seomatic', 'Creator'),
                    ],
                    'seomatic:site-settings:social' => [
                        'label' => Craft::t('seomatic', 'Social Media'),
                    ],
                    'seomatic:site-settings:sitemap' => [
                        'label' => Craft::t('seomatic', 'Sitemap'),
                    ],
                    'seomatic:site-settings:miscellaneous' => [
                        'label' => Craft::t('seomatic', 'Miscellaneous'),
                    ],
                ],
            ],
            'seomatic:tracking-scripts' => [
                'label' => Craft::t('seomatic', 'Edit Tracking Scripts'),
                'nested' => $scriptsPerms,
            ],
            'seomatic:plugin-settings' => [
                'label' => Craft::t('seomatic', 'Edit Plugin Settings'),
            ],
        ];
    }
}
