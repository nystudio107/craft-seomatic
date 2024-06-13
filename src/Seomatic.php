<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic;

use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\base\Model;
use craft\base\Plugin;
use craft\elements\Entry;
use craft\errors\SiteNotFoundException;
use craft\events\DefineGqlTypeFieldsEvent;
use craft\events\ElementEvent;
use craft\events\ModelEvent;
use craft\events\PluginEvent;
use craft\events\RegisterCacheOptionsEvent;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterGqlQueriesEvent;
use craft\events\RegisterGqlSchemaComponentsEvent;
use craft\events\RegisterGqlTypesEvent;
use craft\events\RegisterPreviewTargetsEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\events\RegisterUserPermissionsEvent;
use craft\feedme\events\RegisterFeedMeFieldsEvent;
use craft\feedme\Plugin as FeedMe;
use craft\feedme\services\Fields as FeedMeFields;
use craft\gql\TypeManager;
use craft\helpers\StringHelper;
use craft\services\Elements;
use craft\services\Fields;
use craft\services\Gql;
use craft\services\Plugins;
use craft\services\Sites as SitesService;
use craft\services\UserPermissions;
use craft\utilities\ClearCaches;
use craft\web\Application;
use craft\web\UrlManager;
use craft\web\View;
use nystudio107\codeeditor\autocompletes\EnvironmentVariableAutocomplete;
use nystudio107\codeeditor\events\RegisterCodeEditorAutocompletesEvent;
use nystudio107\codeeditor\events\RegisterTwigValidatorVariablesEvent;
use nystudio107\codeeditor\services\AutocompleteService;
use nystudio107\codeeditor\validators\TwigTemplateValidator;
use nystudio107\fastcgicachebust\FastcgiCacheBust;
use nystudio107\seomatic\autocompletes\TrackingVarsAutocomplete;
use nystudio107\seomatic\debug\panels\SeomaticPanel;
use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;
use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;
use nystudio107\seomatic\gql\arguments\SeomaticArguments;
use nystudio107\seomatic\gql\interfaces\SeomaticInterface;
use nystudio107\seomatic\gql\queries\SeomaticQuery;
use nystudio107\seomatic\gql\resolvers\SeomaticResolver;
use nystudio107\seomatic\gql\types\SeomaticEnvironmentType;
use nystudio107\seomatic\helpers\Environment as EnvironmentHelper;
use nystudio107\seomatic\helpers\Gql as GqlHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\Schema as SchemaHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\integrations\feedme\SeoSettings as SeoSettingsFeedMe;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\Settings;
use nystudio107\seomatic\services\ServicesTrait;
use nystudio107\seomatic\twigextensions\SeomaticTwigExtension;
use nystudio107\seomatic\variables\SeomaticVariable;
use yii\base\Application as BaseApplication;
use yii\base\Event;
use yii\base\View as BaseView;
use yii\debug\Module;

/** @noinspection MissingPropertyAnnotationsInspection */

/**
 * Class Seomatic
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Seomatic extends Plugin
{
    // Traits
    // =========================================================================

    use ServicesTrait;

    // Constants
    // =========================================================================

    public const SEOMATIC_HANDLE = 'Seomatic';

    public const DEVMODE_CACHE_DURATION = 30;

    public const SEOMATIC_PREVIEW_AUTHORIZATION_KEY = 'seomaticPreviewAuthorizationKey';

    protected const FRONTEND_SEO_FILE_LINK = 'seomatic/seo-file-link/<url:[^\/]+>/<robots:[^\/]+>/<canonical:[^\/]+>/<inline:\d+>/<fileName:[-\w\.*]+>';

    protected const FRONTEND_PREVIEW_PATH = 'seomatic/preview-social-media';

    public const SEOMATIC_EXPRESSION_FIELD_TYPE = 'SeomaticExpressionField';
    public const SEOMATIC_TRACKING_FIELD_TYPE = 'SeomaticTrackingField';

    // Static Properties
    // =========================================================================

    /**
     * @var ?Seomatic
     */
    public static ?Seomatic $plugin;

    /**
     * @var null|SeomaticVariable
     */
    public static ?SeomaticVariable $seomaticVariable = null;

    /**
     * @var null|Settings
     */
    public static ?Settings $settings = null;

    /**
     * @var null|ElementInterface
     */
    public static ?ElementInterface $matchedElement = null;

    /**
     * @var bool
     */
    public static bool $devMode;

    /**
     * @var null|View
     */
    public static ?View $view = null;

    /**
     * @var string
     */
    public static string $language = '';

    /**
     * @var string
     */
    public static string $environment = '';

    /**
     * @var int
     */
    public static int $cacheDuration = 0;

    /**
     * @var bool
     */
    public static bool $previewingMetaContainers = false;

    /**
     * @var bool
     */
    public static bool $loadingMetaContainers = false;

    /**
     * @var bool
     */
    public static bool $savingSettings = false;

    /**
     * @var bool
     */
    public static bool $headlessRequest = false;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '3.0.12';

    /**
     * @var bool
     */
    public bool $hasCpSection = true;

    /**
     * @var bool
     */
    public bool $hasCpSettings = true;

    /**
     * Set the matched element
     *
     * @param $element null|ElementInterface
     */
    public static function setMatchedElement(?ElementInterface $element): void
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

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;
        // Handle any console commands
        $request = Craft::$app->getRequest();
        if ($request->getIsConsoleRequest()) {
            $this->controllerNamespace = 'nystudio107\seomatic\console\controllers';
        }
        // Initialize properties
        /** @var Settings $settings */
        $settings = self::$plugin->getSettings();
        self::$settings = $settings;
        self::$devMode = Craft::$app->getConfig()->getGeneral()->devMode;
        self::$view = Craft::$app->getView();
        self::$cacheDuration = self::$devMode
            ? self::DEVMODE_CACHE_DURATION
            : self::$settings->metaCacheDuration ?? 0;
        self::$environment = EnvironmentHelper::determineEnvironment();
        MetaValueHelper::cache();
        $this->name = self::$settings->pluginName;
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
    public function getSettings(): ?Model
    {
        // For all the emojis
        /* @var Settings $settingsModel */
        $settingsModel = parent::getSettings();
        if ($settingsModel !== null && !self::$savingSettings) {
            $attributes = $settingsModel->attributes();
            if ($attributes !== null) {
                foreach ($attributes as $attribute) {
                    if (is_string($settingsModel->$attribute)) {
                        $settingsModel->$attribute = html_entity_decode(
                            $settingsModel->$attribute,
                            ENT_NOQUOTES,
                            'UTF-8'
                        );
                    }
                }
            }
            self::$savingSettings = false;
        }

        return $settingsModel;
    }

    /**
     * Determine whether our table schema exists or not; this is needed because
     * migrations such as the install migration and base_install migration may
     * not have been run by the time our init() method has been called
     *
     * @return bool
     */
    public function migrationsAndSchemaReady(): bool
    {
        $pluginsService = Craft::$app->getPlugins();
        if ($pluginsService->isPluginUpdatePending(self::$plugin)) {
            return false;
        }
        if (Craft::$app->db->schema->getTableSchema('{{%seomatic_metabundles}}') === null) {
            return false;
        }

        return true;
    }

    /**
     * Clear all the caches!
     */
    public function clearAllCaches(): void
    {
        // Clear all of SEOmatic's caches
        self::$plugin->frontendTemplates->invalidateCaches();
        self::$plugin->metaContainers->invalidateCaches();
        self::$plugin->sitemaps->invalidateCaches();
        SchemaHelper::invalidateCaches();
        // Clear the GraphQL caches too
        $gql = Craft::$app->getGql();
        if (method_exists($gql, 'invalidateCaches')) {
            $gql->invalidateCaches();
        }
        // If the FastCGI Cache Bust plugin is installed, clear its caches too
        /** @var ?FastcgiCacheBust $plugin */
        $plugin = Craft::$app->getPlugins()->getPlugin('fastcgi-cache-bust');
        if ($plugin !== null) {
            $plugin->cache->clearAll();
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getSettingsResponse(): mixed
    {
        // Just redirect to the plugin settings page
        return Craft::$app->getResponse()->redirect(UrlHelper::cpUrl('seomatic/plugin'));
    }

    /**
     * @inheritdoc
     */
    public function getCpNavItem(): ?array
    {
        $subNavs = [];
        $navItem = parent::getCpNavItem();
        $request = Craft::$app->getRequest();
        $siteSuffix = '';
        if ($request->getSegment(1) === 'seomatic') {
            $segments = $request->getSegments();
            $lastSegment = end($segments);
            $site = Craft::$app->getSites()->getSiteByHandle($lastSegment);
            if ($site !== null) {
                $siteSuffix = '/' . $lastSegment;
            }
        }
        $currentUser = Craft::$app->getUser()->getIdentity();
        // Only show sub-navs the user has permission to view
        if ($currentUser->can('seomatic:dashboard')) {
            $subNavs['dashboard'] = [
                'label' => Craft::t('seomatic', 'Dashboard'),
                'url' => 'seomatic/dashboard' . $siteSuffix,
            ];
        }
        if ($currentUser->can('seomatic:global-meta')) {
            $subNavs['global'] = [
                'label' => Craft::t('seomatic', 'Global SEO'),
                'url' => 'seomatic/global/general' . $siteSuffix,
            ];
        }
        if ($currentUser->can('seomatic:content-meta')) {
            $subNavs['content'] = [
                'label' => Craft::t('seomatic', 'Content SEO'),
                'url' => 'seomatic/content' . $siteSuffix,
            ];
        }
        if ($currentUser->can('seomatic:site-settings')) {
            $subNavs['site'] = [
                'label' => Craft::t('seomatic', 'Site Settings'),
                'url' => 'seomatic/site/identity' . $siteSuffix,
            ];
        }
        if ($currentUser->can('seomatic:tracking-scripts')) {
            $subNavs['tracking'] = [
                'label' => Craft::t('seomatic', 'Tracking Scripts'),
                'url' => 'seomatic/tracking/gtag' . $siteSuffix,
            ];
        }
        $editableSettings = true;
        $general = Craft::$app->getConfig()->getGeneral();
        if (!$general->allowAdminChanges) {
            $editableSettings = false;
        }
        if ($editableSettings && $currentUser->can('seomatic:plugin-settings')) {
            $subNavs['plugin'] = [
                'label' => Craft::t('seomatic', 'Plugin Settings'),
                'url' => 'seomatic/plugin',
            ];
        }
        // SEOmatic doesn't really have an index page, so if the user can't access any sub nav items, we probably shouldn't show the main sub nav item either
        if (empty($subNavs)) {
            return null;
        }
        // A single sub nav item is redundant
        if (count($subNavs) === 1) {
            $subNavs = [];
        }

        return array_merge($navItem, [
            'subnav' => $subNavs,
        ]);
    }

    /**
     * Install our event listeners.
     */
    protected function installEventListeners(): void
    {
        // Install our event listeners only if our table schema exists
        if ($this->migrationsAndSchemaReady()) {
            // Add in our Twig extensions
            self::$view->registerTwigExtension(new SeomaticTwigExtension());
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
            function(PluginEvent $event) {
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
            function(RegisterCacheOptionsEvent $event) {
                Craft::debug(
                    'ClearCaches::EVENT_REGISTER_CACHE_OPTIONS',
                    __METHOD__
                );
                // Register our Cache Options
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
            function(PluginEvent $event) {
                if ($event->plugin === $this && !Craft::$app->getDb()->getSupportsMb4()) {
                    // For all the emojis
                    $settingsModel = $this->getSettings();
                    self::$savingSettings = true;
                    if ($settingsModel !== null) {
                        $attributes = $settingsModel->attributes();
                        if ($attributes !== null) {
                            foreach ($attributes as $attribute) {
                                if (is_string($settingsModel->$attribute)) {
                                    $settingsModel->$attribute =
                                        StringHelper::encodeMb4($settingsModel->$attribute);
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
    protected function installGlobalEventListeners(): void
    {
        // Handler: Plugins::EVENT_AFTER_LOAD_PLUGINS
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_LOAD_PLUGINS,
            function() {
                // Delay registering SEO Elements to give other plugins a chance to load first
                $this->seoElements->getAllSeoElementTypes(false);
                // Delay installing GQL handlers to give other plugins a chance to register their own first
                $this->installGqlHandlers();
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
            static function(RegisterComponentTypesEvent $event) {
                $event->types[] = SeoSettingsField::class;
                $event->types[] = Seomatic_MetaField::class;
            }
        );
        // Handler: Element::EVENT_AFTER_PROPAGATE
        Event::on(
            Element::class,
            Element::EVENT_AFTER_PROPAGATE,
            static function(ModelEvent $event) {
                Craft::debug(
                    'Element::EVENT_AFTER_PROPAGATE',
                    __METHOD__
                );
                /** @var Element $element */
                $element = $event->sender;
                self::$plugin->metaBundles->invalidateMetaBundleByElement(
                    $element,
                    $event->isNew
                );
                if ($event->isNew) {
                    self::$plugin->sitemaps->submitSitemapForElement($element);
                }
            }
        );
        // Handler: Elements::EVENT_AFTER_DELETE_ELEMENT
        Event::on(
            Elements::class,
            Elements::EVENT_AFTER_DELETE_ELEMENT,
            static function(ElementEvent $event) {
                Craft::debug(
                    'Elements::EVENT_AFTER_DELETE_ELEMENT',
                    __METHOD__
                );
                /** @var Element $element */
                $element = $event->element;
                self::$plugin->metaBundles->invalidateMetaBundleByElement(
                    $element,
                    false
                );
            }
        );
        // Add social media preview targets on Craft 3.2 or later
        if (self::$settings->socialMediaPreviewTarget) {
            // Handler: Entry::EVENT_REGISTER_PREVIEW_TARGETS
            Event::on(
                Entry::class,
                Element::EVENT_REGISTER_PREVIEW_TARGETS,
                static function(RegisterPreviewTargetsEvent $e) {
                    /** @var Element $element */
                    $element = $e->sender;
                    if ($element->uri !== null) {
                        $e->previewTargets[] = [
                            'label' => '📣 ' . Craft::t('seomatic', 'Social Media Preview'),
                            'url' => UrlHelper::siteUrl(self::FRONTEND_PREVIEW_PATH, [
                                'elementId' => $element->id,
                                'siteId' => $element->siteId,
                            ]),
                        ];
                        // Don't allow the preview to be accessed publicly
                        Craft::$app->getSession()->authorize(self::SEOMATIC_PREVIEW_AUTHORIZATION_KEY . $element->id);
                    }
                }
            );
        }
        // Yii2 Debug Toolbar support
        Event::on(
            Application::class,
            BaseApplication::EVENT_BEFORE_REQUEST,
            static function() {
                /** @var Module|null $debugModule */
                $debugModule = Seomatic::$settings->enableDebugToolbarPanel ? Craft::$app->getModule('debug') : null;

                if ($debugModule) {
                    $debugModule->panels['seomatic'] = new SeomaticPanel([
                        'id' => 'seomatic',
                        'module' => $debugModule,
                    ]);
                }
            }
        );
        // FeedMe Support
        if (class_exists(FeedMe::class)) {
            Event::on(
                FeedMeFields::class,
                FeedMeFields::EVENT_REGISTER_FEED_ME_FIELDS,
                static function(RegisterFeedMeFieldsEvent $e) {
                    Craft::debug(
                        'FeedMeFields::EVENT_REGISTER_FEED_ME_FIELDS',
                        __METHOD__
                    );
                    $e->fields[] = SeoSettingsFeedMe::class;
                }
            );
        }
        $updateMetaBundles = static function($message) {
            Craft::debug(
                $message,
                __METHOD__
            );
            $seoElementTypes = Seomatic::$plugin->seoElements->getAllSeoElementTypes();
            foreach ($seoElementTypes as $seoElementType) {
                $metaBundleType = $seoElementType::META_BUNDLE_TYPE ?? '';

                if ($metaBundleType) {
                    Seomatic::$plugin->metaBundles->resaveMetaBundles($metaBundleType);
                }
            }
        };

        // Handler: Elements::EVENT_AFTER_SAVE_SITE
        Event::on(
            SitesService::class,
            SitesService::EVENT_AFTER_SAVE_SITE,
            static function() use ($updateMetaBundles) {
                $updateMetaBundles('SitesService::EVENT_AFTER_SAVE_SITE');
            }
        );

        // Handler: Elements::EVENT_AFTER_DELETE_SITE
        Event::on(
            SitesService::class,
            SitesService::EVENT_AFTER_DELETE_SITE,
            static function() use ($updateMetaBundles) {
                $updateMetaBundles('SitesService::EVENT_AFTER_DELETE_SITE');
            }
        );
    }

    /**
     * Register our GraphQL handlers
     *
     * @return void
     */
    protected function installGqlHandlers(): void
    {
        // Handler: Gql::EVENT_REGISTER_GQL_TYPES
        Event::on(
            Gql::class,
            Gql::EVENT_REGISTER_GQL_TYPES,
            static function(RegisterGqlTypesEvent $event) {
                Craft::debug(
                    'Gql::EVENT_REGISTER_GQL_TYPES',
                    __METHOD__
                );
                $event->types[] = SeomaticInterface::class;
                $event->types[] = SeomaticEnvironmentType::class;
            }
        );
        // Handler: Gql::EVENT_REGISTER_GQL_QUERIES
        Event::on(
            Gql::class,
            Gql::EVENT_REGISTER_GQL_QUERIES,
            static function(RegisterGqlQueriesEvent $event) {
                Craft::debug(
                    'Gql::EVENT_REGISTER_GQL_QUERIES',
                    __METHOD__
                );
                $queries = SeomaticQuery::getQueries();
                foreach ($queries as $key => $value) {
                    $event->queries[$key] = $value;
                }
            }
        );
        // Handler: Gql::EVENT_REGISTER_GQL_SCHEMA_COMPONENTS
        Event::on(
            Gql::class,
            Gql::EVENT_REGISTER_GQL_SCHEMA_COMPONENTS,
            static function(RegisterGqlSchemaComponentsEvent $event) {
                Craft::debug(
                    'Gql::EVENT_REGISTER_GQL_SCHEMA_COMPONENTS',
                    __METHOD__
                );
                $label = Craft::t('seomatic', 'Seomatic');
                $event->queries[$label]['seomatic.all:read'] = ['label' => Craft::t('seomatic', 'Query Seomatic data')];
            }
        );
        // Add support for querying for SEOmatic metadata inside of element queries
        // Handler: TypeManager::EVENT_DEFINE_GQL_TYPE_FIELDS
        $knownInterfaceNames = self::$plugin->seoElements->getAllSeoElementGqlInterfaceNames();
        Event::on(
            TypeManager::class,
            TypeManager::EVENT_DEFINE_GQL_TYPE_FIELDS,
            static function(DefineGqlTypeFieldsEvent $event) use ($knownInterfaceNames) {
                if (in_array($event->typeName, $knownInterfaceNames, true)) {
                    Craft::debug(
                        'TypeManager::EVENT_DEFINE_GQL_TYPE_FIELDS',
                        __METHOD__
                    );

                    if (GqlHelper::canQuerySeo()) {
                        // Make Seomatic tags available to all entries.
                        $event->fields['seomatic'] = [
                            'name' => 'seomatic',
                            'type' => SeomaticInterface::getType(),
                            'args' => SeomaticArguments::getArguments(),
                            'resolve' => SeomaticResolver::class . '::resolve',
                            'description' => Craft::t('seomatic', 'This query is used to query for SEOmatic meta data.'),
                        ];
                    }
                }
            });
    }

    /**
     * Handle site requests.  We do it only after we receive the event
     * EVENT_AFTER_LOAD_PLUGINS so that any pending db migrations can be run
     * before our event listeners kick in
     */
    protected function handleSiteRequest(): void
    {
        // Handler: View::EVENT_END_PAGE
        Event::on(
            View::class,
            BaseView::EVENT_END_PAGE,
            static function() {
                Craft::debug(
                    'View::EVENT_END_PAGE',
                    __METHOD__
                );
                // The page is done rendering, include our meta containers
                if (self::$settings->renderEnabled && self::$seomaticVariable) {
                    self::$plugin->metaContainers->includeMetaContainers();
                }
            }
        );
    }

    /**
     * Handle Control Panel requests. We do it only after we receive the event
     * EVENT_AFTER_LOAD_PLUGINS so that any pending db migrations can be run
     * before our event listeners kick in
     */
    protected function handleAdminCpRequest(): void
    {
        // Don't cache Control Panel requests
        self::$cacheDuration = 1;
        // Prefix the Control Panel title
        self::$view->hook('cp.layouts.base', function(&$context) {
            if (self::$devMode) {
                $context['docTitle'] = self::$settings->devModeCpTitlePrefix . $context['docTitle'];
            } else {
                $context['docTitle'] = self::$settings->cpTitlePrefix . $context['docTitle'];
            }
        });
    }

    /**
     * Install site event listeners for site requests only
     */
    protected function installSiteEventListeners(): void
    {
        // Load the sitemap containers
        self::$plugin->sitemaps->loadSitemapContainers();
        // Load the frontend template containers
        self::$plugin->frontendTemplates->loadFrontendTemplateContainers();
        // Handler: UrlManager::EVENT_REGISTER_SITE_URL_RULES
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function(RegisterUrlRulesEvent $event) {
                Craft::debug(
                    'UrlManager::EVENT_REGISTER_SITE_URL_RULES',
                    __METHOD__
                );
                // FileController
                $route = self::$plugin->handle . '/file/seo-file-link';
                $event->rules[self::FRONTEND_SEO_FILE_LINK] = ['route' => $route];
                // PreviewController
                $route = self::$plugin->handle . '/preview/social-media';
                $event->rules[self::FRONTEND_PREVIEW_PATH] = ['route' => $route];
                // Register our Control Panel routes
                $event->rules = array_merge(
                    $event->rules,
                    $this->customFrontendRoutes()
                );
            }
        );
    }

    /**
     * Return the custom frontend routes
     *
     * @return array
     */
    protected function customFrontendRoutes(): array
    {
        return [
        ];
    }

    /**
     * Install site event listeners for Control Panel requests only
     */
    protected function installCpEventListeners(): void
    {
        // Load the frontend template containers
        self::$plugin->frontendTemplates->loadFrontendTemplateContainers();
        // Handler: UrlManager::EVENT_REGISTER_CP_URL_RULES
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function(RegisterUrlRulesEvent $event) {
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
            function(RegisterUserPermissionsEvent $event) {
                Craft::debug(
                    'UserPermissions::EVENT_REGISTER_PERMISSIONS',
                    __METHOD__
                );
                // Register our custom permissions
                $event->permissions[] = [
                    'heading' => Craft::t('seomatic', 'SEOmatic'),
                    'permissions' => $this->customAdminCpPermissions(),
                ];
            }
        );
        // Handler: AutocompleteService::EVENT_REGISTER_CODEEDITOR_AUTOCOMPLETES
        Event::on(AutocompleteService::class, AutocompleteService::EVENT_REGISTER_CODEEDITOR_AUTOCOMPLETES,
            function(RegisterCodeEditorAutocompletesEvent $event) {
                if ($event->fieldType === self::SEOMATIC_EXPRESSION_FIELD_TYPE) {
                    $event->types[] = EnvironmentVariableAutocomplete::class;
                }
                if ($event->fieldType === self::SEOMATIC_TRACKING_FIELD_TYPE) {
                    $event->types[] = TrackingVarsAutocomplete::class;
                }
            }
        );
        // Handler: TwigTemplateValidator::EVENT_REGISTER_TWIG_VALIDATOR_VARIABLES
        Event::on(TwigTemplateValidator::class,
            TwigTemplateValidator::EVENT_REGISTER_TWIG_VALIDATOR_VARIABLES,
            function(RegisterTwigValidatorVariablesEvent $event) {
                if (Seomatic::$seomaticVariable === null) {
                    Seomatic::$seomaticVariable = new SeomaticVariable();
                    Seomatic::$plugin->metaContainers->loadGlobalMetaContainers();
                    Seomatic::$seomaticVariable->init();
                }
                $event->variables['seomatic'] = Seomatic::$seomaticVariable;
            }
        );
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
                '',
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

            // Seemingly duplicate route needed to handle Solspace Calendar, which allows characters like -'s
            // in their handles
            'seomatic/edit-content/<subSection:{handle}>/<sourceBundleType:{handle}>/<sourceHandle:{slug}>' =>
                'seomatic/settings/edit-content',
            'seomatic/edit-content/<subSection:{handle}>/<sourceBundleType:{handle}>/<sourceHandle:{slug}>/<siteHandle:{handle}>' =>
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
     * Returns the custom Control Panel user permissions.
     *
     * @return array
     * @noinspection PhpArrayShapeAttributeCanBeAddedInspection
     */
    protected function customAdminCpPermissions(): array
    {
        // The script meta containers for the global meta bundle
        try {
            $currentSiteId = Craft::$app->getSites()->getCurrentSite()->id ?? 1;
        } catch (SiteNotFoundException $e) {
            $currentSiteId = 1;
            Craft::error($e->getMessage(), __METHOD__);
        }
        // Dynamic permissions for the scripts
        $metaBundle = self::$plugin->metaBundles->getGlobalMetaBundle($currentSiteId);
        $scriptsPerms = [];
        if ($metaBundle !== null) {
            $scripts = self::$plugin->metaBundles->getContainerDataFromBundle(
                $metaBundle,
                MetaScriptContainer::CONTAINER_TYPE
            );
            foreach ($scripts as $scriptHandle => $scriptData) {
                $scriptsPerms["seomatic:tracking-scripts:$scriptHandle"] = [
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
                    'seomatic:global-meta:security' => [
                        'label' => Craft::t('seomatic', 'Security'),
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
                'action' => [self::$plugin->frontendTemplates, 'invalidateCaches'],
            ],
            // Meta bundle caches
            [
                'key' => 'seomatic-metabundle-caches',
                'label' => Craft::t('seomatic', 'SEOmatic metadata caches'),
                'action' => [self::$plugin->metaContainers, 'invalidateCaches'],
            ],
            // Sitemap caches
            [
                'key' => 'seomatic-sitemap-caches',
                'label' => Craft::t('seomatic', 'SEOmatic sitemap caches'),
                'action' => [self::$plugin->sitemaps, 'invalidateCaches'],
            ],
            // Schema caches
            [
                'key' => 'seomatic-schema-caches',
                'label' => Craft::t('seomatic', 'SEOmatic schema caches'),
                'action' => [SchemaHelper::class, 'invalidateCaches'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }
}
