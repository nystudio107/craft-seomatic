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

namespace nystudio107\seomatic\services;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\commerce\Plugin as CommercePlugin;
use craft\console\Application as ConsoleApplication;
use craft\elements\GlobalSet;
use craft\helpers\ElementHelper;
use craft\web\UrlManager;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\events\InvalidateContainerCachesEvent;
use nystudio107\seomatic\events\MetaBundleDebugDataEvent;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\DynamicMeta as DynamicMetaHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\Json;
use nystudio107\seomatic\helpers\Localization as LocalizationHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaGlobalVars;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\MetaSiteVars;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\seoelements\SeoProduct;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\JsonLd as JsonLdService;
use nystudio107\seomatic\variables\SeomaticVariable;
use Throwable;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\caching\TagDependency;
use yii\web\BadRequestHttpException;
use function is_array;
use function is_object;

/**
 * Meta container functions for SEOmatic
 * An instance of the service is available via [[`Seomatic::$plugin->metaContainers`|`seomatic.containers`]]
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainers extends Component
{
    // Constants
    // =========================================================================

    public const GLOBAL_METACONTAINER_CACHE_TAG = 'seomatic_metacontainer';
    public const METACONTAINER_CACHE_TAG = 'seomatic_metacontainer_';

    public const CACHE_KEY = 'seomatic_metacontainer_';
    public const INVALID_RESPONSE_CACHE_KEY = 'seomatic_invalid_response';
    public const GLOBALS_CACHE_KEY = 'parsed_globals_';
    public const SCRIPTS_CACHE_KEY = 'body_scripts_';

    /** @var array Rules for replacement values on arbitrary empty values */
    public const COMPOSITE_SETTING_LOOKUP = [
        'ogImage' => [
            'metaBundleSettings.ogImageSource' => 'sameAsSeo.seoImage',
        ],
        'twitterImage' => [
            'metaBundleSettings.twitterImageSource' => 'sameAsSeo.seoImage',
        ],
    ];

    /**
     * @event InvalidateContainerCachesEvent The event that is triggered when SEOmatic
     *        is about to clear its meta container caches
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\InvalidateContainerCachesEvent;
     * use nystudio107\seomatic\services\MetaContainers;
     * use yii\base\Event;
     * Event::on(MetaContainers::class, MetaContainers::EVENT_INVALIDATE_CONTAINER_CACHES, function(InvalidateContainerCachesEvent $e) {
     *     // Container caches are about to be cleared
     * });
     * ```
     */
    public const EVENT_INVALIDATE_CONTAINER_CACHES = 'invalidateContainerCaches';

    /**
     * @event MetaBundleDebugDataEvent The event that is triggered to record MetaBundle
     * debug data
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\MetaBundleDebugDataEvent;
     * use nystudio107\seomatic\services\MetaContainers;
     * use yii\base\Event;
     * Event::on(MetaContainers::class, MetaContainers::EVENT_METABUNDLE_DEBUG_DATA, function(MetaBundleDebugDataEvent $e) {
     *     // Do something with the MetaBundle debug data
     * });
     * ```
     */
    public const EVENT_METABUNDLE_DEBUG_DATA = 'metaBundleDebugData';

    // Public Properties
    // =========================================================================

    /**
     * @var MetaGlobalVars|null
     */
    public $metaGlobalVars;

    /**
     * @var MetaSiteVars|null
     */
    public $metaSiteVars;

    /**
     * @var MetaSitemapVars|null
     */
    public $metaSitemapVars;

    /**
     * @var string The current page number of paginated pages
     */
    public $paginationPage = '1';

    /**
     * @var null|string Cached nonce to be shared by all JSON-LD entities
     */
    public $cachedJsonLdNonce;

    /**
     * @var MetaContainer[]|array|null
     */
    public $metaContainers = [];

    // Protected Properties
    // =========================================================================

    /**
     * @var null|MetaBundle
     */
    protected $matchedMetaBundle;

    /**
     * @var null|TagDependency
     */
    protected $containerDependency;

    /**
     * @var bool Whether or not the matched element should be included in the
     *      meta containers
     */
    protected $includeMatchedElement = true;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        // Get the page number of this request
        $request = Craft::$app->getRequest();
        if (!$request->isConsoleRequest) {
            $this->paginationPage = (string)$request->pageNum;
        }
    }

    /**
     * Return the containers of a specific type
     *
     * @param string $type
     *
     * @return array
     */
    public function getContainersOfType(string $type): array
    {
        $containers = [];
        /** @var MetaContainer $metaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type) {
                $containers[] = $metaContainer;
            }
        }

        return $containers;
    }

    /**
     * Include the meta containers
     */
    public function includeMetaContainers()
    {
        Craft::beginProfile('MetaContainers::includeMetaContainers', __METHOD__);
        // Fire an 'metaBundleDebugData' event
        if ($this->hasEventHandlers(self::EVENT_METABUNDLE_DEBUG_DATA)) {
            $metaBundle = new MetaBundle([
                'metaGlobalVars' => clone $this->metaGlobalVars,
                'metaSiteVars' => clone $this->metaSiteVars,
                'metaSitemapVars' => clone $this->metaSitemapVars,
                'metaContainers' => $this->metaContainers,
            ]);
            $event = new MetaBundleDebugDataEvent([
                'metaBundleCategory' => MetaBundleDebugDataEvent::COMBINED_META_BUNDLE,
                'metaBundle' => $metaBundle,
            ]);
            $this->trigger(self::EVENT_METABUNDLE_DEBUG_DATA, $event);
        }
        // Add in our http headers
        DynamicMetaHelper::includeHttpHeaders();
        DynamicMetaHelper::addCspTags();
        $this->parseGlobalVars();
        foreach ($this->metaContainers as $metaContainer) {
            /** @var $metaContainer MetaContainer */
            if ($metaContainer->include) {
                // Don't cache the rendered result if we're previewing meta containers
                if (Seomatic::$previewingMetaContainers) {
                    $metaContainer->clearCache = true;
                }
                $metaContainer->includeMetaData($this->containerDependency);
            }
        }
        Craft::endProfile('MetaContainers::includeMetaContainers', __METHOD__);
    }

    /**
     * Parse the global variables
     */
    public function parseGlobalVars()
    {
        $dependency = $this->containerDependency;
        $uniqueKey = $dependency->tags[3] ?? self::GLOBALS_CACHE_KEY;
        list($this->metaGlobalVars, $this->metaSiteVars) = Craft::$app->getCache()->getOrSet(
            self::GLOBALS_CACHE_KEY . $uniqueKey,
            function() use ($uniqueKey) {
                Craft::info(
                    self::GLOBALS_CACHE_KEY . ' cache miss: ' . $uniqueKey,
                    __METHOD__
                );

                if ($this->metaGlobalVars) {
                    $this->metaGlobalVars->parseProperties();
                }
                if ($this->metaSiteVars) {
                    $this->metaSiteVars->parseProperties();
                }

                return [$this->metaGlobalVars, $this->metaSiteVars];
            },
            Seomatic::$cacheDuration,
            $dependency
        );
    }

    /**
     * Prep all of the meta for preview purposes
     *
     * @param string $uri
     * @param int|null $siteId
     * @param bool $parseVariables Whether or not the variables should be
     *                                 parsed as Twig
     * @param bool $includeElement Whether or not the matched element
     *                                 should be factored into the preview
     */
    public function previewMetaContainers(
        string            $uri = '',
        int               $siteId = null,
        bool              $parseVariables = false,
        bool              $includeElement = true,
        ?ElementInterface $element = null,
    ) {
        // If we've already previewed the containers for this request, there's no need to do it again
        if (Seomatic::$previewingMetaContainers && !Seomatic::$headlessRequest) {
            return;
        }
        // It's possible this won't exist at this point
        if (!Seomatic::$seomaticVariable) {
            // Create our variable and stash it in the plugin for global access
            Seomatic::$seomaticVariable = new SeomaticVariable();
        }
        Seomatic::$previewingMetaContainers = true;
        $this->includeMatchedElement = $includeElement;
        $this->loadMetaContainers($uri, $siteId, $element);
        // Load in the right globals
        $twig = Craft::$app->getView()->getTwig();
        $globalSets = GlobalSet::findAll([
            'siteId' => $siteId,
        ]);
        foreach ($globalSets as $globalSet) {
            MetaValueHelper::$templatePreviewVars[$globalSet->handle] = $globalSet;
        }
        // Parse the global vars
        if ($parseVariables) {
            $this->parseGlobalVars();
        }
        // Get the homeUrl and canonicalUrl
        $homeUrl = '/';
        $canonicalUrl = $this->metaGlobalVars->parsedValue('canonicalUrl');
        $canonicalUrl = DynamicMetaHelper::sanitizeUrl($canonicalUrl, false);
        // Special-case the global bundle
        if ($uri === MetaBundles::GLOBAL_META_BUNDLE || $uri === '__home__') {
            $canonicalUrl = '/';
        }
        try {
            $homeUrl = UrlHelper::siteUrl($homeUrl, null, null, $siteId);
            $canonicalUrl = UrlHelper::siteUrl($canonicalUrl, null, null, $siteId);
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $canonical = Seomatic::$seomaticVariable->link->get('canonical');
        if ($canonical !== null) {
            $canonical->href = $canonicalUrl;
        }
        $home = Seomatic::$seomaticVariable->link->get('home');
        if ($home !== null) {
            $home->href = $homeUrl;
        }
        // The current language may _not_ match the current site, if we're headless
        $ogLocale = Seomatic::$seomaticVariable->tag->get('og:locale');
        if ($ogLocale !== null && $siteId !== null) {
            $site = Craft::$app->getSites()->getSiteById($siteId);
            if ($site !== null) {
                $ogLocale->content = LocalizationHelper::normalizeOgLocaleLanguage($site->language);
            }
        }
        // Update seomatic.meta.canonicalUrl when previewing meta containers
        $this->metaGlobalVars->canonicalUrl = $canonicalUrl;
    }

    /**
     * Load the meta containers
     *
     * @param string|null $uri
     * @param int|null $siteId
     * @param ElementInterface|null $element
     */
    public function loadMetaContainers(?string $uri = '', int $siteId = null, ?ElementInterface $element = null)
    {
        Craft::beginProfile('MetaContainers::loadMetaContainers', __METHOD__);
        // Avoid recursion
        if (!Seomatic::$loadingMetaContainers) {
            Seomatic::$loadingMetaContainers = true;
            $this->setMatchedElement($uri, $siteId);
            // If this is a draft or revision we're previewing, swap it in so they see the draft preview image & data
            if ($element && ElementHelper::isDraftOrRevision($element)) {
                Seomatic::setMatchedElement($element);
            }
            // Get the cache tag for the matched meta bundle
            $metaBundle = $this->getMatchedMetaBundle();
            $metaBundleSourceId = '';
            $metaBundleSourceType = '';
            if ($metaBundle) {
                $metaBundleSourceId = $metaBundle->sourceId;
                $metaBundleSourceType = $metaBundle->sourceBundleType;
            }
            // We need an actual $siteId here for the cache key
            if ($siteId === null) {
                $siteId = Craft::$app->getSites()->currentSite->id
                    ?? Craft::$app->getSites()->primarySite->id
                    ?? 1;
            }
            // Handle pagination
            $paginationPage = 'page' . $this->paginationPage;
            // Get the path for the current request
            $request = Craft::$app->getRequest();
            $requestPath = '/';
            if (!$request->getIsConsoleRequest()) {
                try {
                    $requestPath = $request->getPathInfo();
                } catch (InvalidConfigException $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
                // If this is any type of a preview, ensure that it's not cached
                if (Seomatic::$plugin->helper::isPreview()) {
                    Seomatic::$previewingMetaContainers = true;
                }
            }
            // Cache requests that have a token associated with them separately
            $token = '';
            $request = Craft::$app->getRequest();
            if (!$request->isConsoleRequest) {
                try {
                    $token = $request->getToken() ?? '';
                } catch (BadRequestHttpException $e) {
                }
            }
            // Get our cache key
            $cacheKey = $uri . $siteId . $paginationPage . $requestPath . $this->getAllowedUrlParams() . $token;
            // For requests with a status code of >= 400, use one cache key
            if (!$request->isConsoleRequest) {
                $response = Craft::$app->getResponse();
                if ($response->statusCode >= 400) {
                    $cacheKey = $siteId . self::INVALID_RESPONSE_CACHE_KEY . $response->statusCode;
                }
            }
            // Load the meta containers
            $dependency = new TagDependency([
                'tags' => [
                    self::GLOBAL_METACONTAINER_CACHE_TAG,
                    self::METACONTAINER_CACHE_TAG . $metaBundleSourceId . $metaBundleSourceType . $siteId,
                    self::METACONTAINER_CACHE_TAG . $uri . $siteId,
                    self::METACONTAINER_CACHE_TAG . $cacheKey,
                ],
            ]);
            $this->containerDependency = $dependency;
            $debugModule = Seomatic::$settings->enableDebugToolbarPanel ? Craft::$app->getModule('debug') : null;
            if (Seomatic::$previewingMetaContainers || $debugModule) {
                Seomatic::$plugin->frontendTemplates->loadFrontendTemplateContainers($siteId);
                $this->loadGlobalMetaContainers($siteId);
                $this->loadContentMetaContainers();
                $this->loadFieldMetaContainers();
                // We only need the dynamic data for headless requests
                if (Seomatic::$headlessRequest || Seomatic::$plugin->helper::isPreview() || $debugModule) {
                    DynamicMetaHelper::addDynamicMetaToContainers($uri, $siteId);
                }
            } else {
                $cache = Craft::$app->getCache();
                list($this->metaGlobalVars, $this->metaSiteVars, $this->metaSitemapVars, $this->metaContainers) = $cache->getOrSet(
                    self::CACHE_KEY . $cacheKey,
                    function() use ($uri, $siteId) {
                        Craft::info(
                            'Meta container cache miss: ' . $uri . '/' . $siteId,
                            __METHOD__
                        );
                        $this->loadGlobalMetaContainers($siteId);
                        $this->loadContentMetaContainers();
                        $this->loadFieldMetaContainers();
                        DynamicMetaHelper::addDynamicMetaToContainers($uri, $siteId);

                        return [$this->metaGlobalVars, $this->metaSiteVars, $this->metaSitemapVars, $this->metaContainers];
                    },
                    Seomatic::$cacheDuration,
                    $dependency
                );
            }
            Seomatic::$seomaticVariable->init();
            MetaValueHelper::cache();
            Seomatic::$loadingMetaContainers = false;
        }
        Craft::endProfile('MetaContainers::loadMetaContainers', __METHOD__);
    }

    /**
     * Return the MetaBundle that corresponds with the Seomatic::$matchedElement
     *
     * @return null|MetaBundle
     */
    public function getMatchedMetaBundle()
    {
        $metaBundle = null;
        /** @var Element|null $element */
        $element = Seomatic::$matchedElement;
        if ($element) {
            $sourceType = Seomatic::$plugin->seoElements->getMetaBundleTypeFromElement($element);
            if ($sourceType) {
                list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId, $typeId)
                    = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
                if ($sourceId !== null) {
                    $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                        $sourceType,
                        $sourceId,
                        $sourceSiteId,
                        $typeId
                    );
                }
            }
        }
        $this->matchedMetaBundle = $metaBundle;

        return $metaBundle;
    }

    /**
     * Load the global site meta containers
     *
     * @param int|null $siteId
     */
    public function loadGlobalMetaContainers(int $siteId = null)
    {
        Craft::beginProfile('MetaContainers::loadGlobalMetaContainers', __METHOD__);
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id ?? 1;
        }
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            // Fire an 'metaBundleDebugData' event
            if ($this->hasEventHandlers(self::EVENT_METABUNDLE_DEBUG_DATA)) {
                $event = new MetaBundleDebugDataEvent([
                    'metaBundleCategory' => MetaBundleDebugDataEvent::GLOBAL_META_BUNDLE,
                    'metaBundle' => $metaBundle,
                ]);
                $this->trigger(self::EVENT_METABUNDLE_DEBUG_DATA, $event);
            }
            // Meta global vars
            $this->metaGlobalVars = clone $metaBundle->metaGlobalVars;
            // Meta site vars
            $this->metaSiteVars = clone $metaBundle->metaSiteVars;
            // Meta sitemap vars
            $this->metaSitemapVars = clone $metaBundle->metaSitemapVars;
            // Language
            $this->metaGlobalVars->language = Seomatic::$language;
            // Meta containers
            foreach ($metaBundle->metaContainers as $key => $metaContainer) {
                $this->metaContainers[$key] = clone $metaContainer;
            }
        }
        Craft::endProfile('MetaContainers::loadGlobalMetaContainers', __METHOD__);
    }

    /**
     * Add the meta bundle to our existing meta containers, overwriting meta
     * items with the same key
     *
     * @param MetaBundle $metaBundle
     */
    public function addMetaBundleToContainers(MetaBundle $metaBundle)
    {
        // Ensure the variable is synced properly first
        Seomatic::$seomaticVariable->init();
        // Meta global vars
        $attributes = $metaBundle->metaGlobalVars->getAttributes();
        // Parse the meta values so we can filter out any blank or empty attributes
        // So that they can fall back on the parent container
        $parsedAttributes = $attributes;
        MetaValueHelper::parseArray($parsedAttributes);
        $parsedAttributes = array_filter(
            $parsedAttributes,
            [ArrayHelper::class, 'preserveBools']
        );
        $attributes = array_intersect_key($attributes, $parsedAttributes);
        // Add the attributes in
        $attributes = array_filter(
            $attributes,
            [ArrayHelper::class, 'preserveBools']
        );
        $this->metaGlobalVars->setAttributes($attributes, false);
        // Meta site vars
        /*
         * Don't merge in the Site vars, since they are only editable on
         * a global basis. Otherwise stale data will be unable to be edited
        $attributes = $metaBundle->metaSiteVars->getAttributes();
        $attributes = array_filter($attributes);
        $this->metaSiteVars->setAttributes($attributes, false);
        */
        // Meta sitemap vars
        $attributes = $metaBundle->metaSitemapVars->getAttributes();
        $attributes = array_filter(
            $attributes,
            [ArrayHelper::class, 'preserveBools']
        );
        $this->metaSitemapVars->setAttributes($attributes, false);
        // Language
        $this->metaGlobalVars->language = Seomatic::$language;
        // Meta containers
        foreach ($metaBundle->metaContainers as $key => $metaContainer) {
            foreach ($metaContainer->data as $metaTag) {
                $this->addToMetaContainer($metaTag, $key);
            }
        }
    }

    /**
     * Add the passed in MetaItem to the MetaContainer indexed as $key
     *
     * @param $data MetaItem The MetaItem to add to the container
     * @param $key  string   The key to the container to add the data to
     */
    public function addToMetaContainer(MetaItem $data, string $key)
    {
        /** @var MetaContainer $container */
        $container = $this->getMetaContainer($key);

        if ($container !== null) {
            $container->addData($data, $data->key);
        }
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function getMetaContainer(string $key)
    {
        if (!$key || empty($this->metaContainers[$key])) {
            $error = Craft::t(
                'seomatic',
                'Meta container with key `{key}` does not exist.',
                ['key' => $key]
            );
            Craft::error($error, __METHOD__);

            return null;
        }

        return $this->metaContainers[$key];
    }

    /**
     * Create a MetaContainer of the given $type with the $key
     *
     * @param string $type
     * @param string $key
     *
     * @return null|MetaContainer
     */
    public function createMetaContainer(string $type, string $key): ?MetaContainer
    {
        /** @var MetaContainer $container */
        $container = null;
        if (empty($this->metaContainers[$key])) {
            /** @var string|null $className */
            $className = null;
            // Create a new container based on the type passed in
            switch ($type) {
                case MetaTagContainer::CONTAINER_TYPE:
                    $className = MetaTagContainer::class;
                    break;
                case MetaLinkContainer::CONTAINER_TYPE:
                    $className = MetaLinkContainer::class;
                    break;
                case MetaScriptContainer::CONTAINER_TYPE:
                    $className = MetaScriptContainer::class;
                    break;
                case MetaJsonLdContainer::CONTAINER_TYPE:
                    $className = MetaJsonLdContainer::class;
                    break;
                case MetaTitleContainer::CONTAINER_TYPE:
                    $className = MetaTitleContainer::class;
                    break;
            }
            if ($className) {
                $container = $className::create();
                $this->metaContainers[$key] = $container;
            }
        }

        /** @var MetaContainer $className */
        return $container;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Render the HTML of all MetaContainers of a specific $type
     *
     * @param string $type
     *
     * @return string
     */
    public function renderContainersByType(string $type): string
    {
        $html = '';
        // Special-case for requests for the FrontendTemplateContainer "container"
        if ($type === FrontendTemplateContainer::CONTAINER_TYPE) {
            $renderedTemplates = [];
            if (Seomatic::$plugin->frontendTemplates->frontendTemplateContainer['data'] ?? false) {
                $frontendTemplateContainers = Seomatic::$plugin->frontendTemplates->frontendTemplateContainer['data'];
                foreach ($frontendTemplateContainers as $name => $frontendTemplateContainer) {
                    if ($frontendTemplateContainer->include) {
                        $result = $frontendTemplateContainer->render([
                        ]);
                        $renderedTemplates[] = [$name => $result];
                    }
                }
            }
            $html .= Json::encode($renderedTemplates);

            return $html;
        }
        /** @var MetaContainer $metaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type && $metaContainer->include) {
                $result = $metaContainer->render([
                    'renderRaw' => true,
                    'renderScriptTags' => true,
                    'array' => true,
                ]);
                // Special case for script containers, because they can have body scripts too
                if ($metaContainer::CONTAINER_TYPE === MetaScriptContainer::CONTAINER_TYPE) {
                    $bodyScript = '';
                    /** @var MetaScriptContainer $metaContainer */
                    if ($metaContainer->prepForInclusion()) {
                        foreach ($metaContainer->data as $metaScript) {
                            /** @var MetaScript $metaScript */
                            if (!empty($metaScript->bodyTemplatePath)) {
                                $bodyScript .= $metaScript->renderBodyHtml();
                            }
                        }
                    }

                    $result = Json::encode([
                        'script' => $result,
                        'bodyScript' => $bodyScript,
                    ]);
                }

                $html .= $result;
            }
        }
        // Special-case for requests for the MetaSiteVars "container"
        if ($type === MetaSiteVars::CONTAINER_TYPE) {
            $result = Json::encode($this->metaSiteVars->toArray());
            $html .= $result;
        }

        return $html;
    }

    /**
     * Render the HTML of all MetaContainers of a specific $type as an array
     *
     * @param string $type
     *
     * @return array
     */
    public function renderContainersArrayByType(string $type): array
    {
        $htmlArray = [];
        // Special-case for requests for the FrontendTemplateContainer "container"
        if ($type === FrontendTemplateContainer::CONTAINER_TYPE) {
            $renderedTemplates = [];
            if (Seomatic::$plugin->frontendTemplates->frontendTemplateContainer['data'] ?? false) {
                $frontendTemplateContainers = Seomatic::$plugin->frontendTemplates->frontendTemplateContainer['data'];
                foreach ($frontendTemplateContainers as $name => $frontendTemplateContainer) {
                    if ($frontendTemplateContainer->include) {
                        $result = $frontendTemplateContainer->render([
                        ]);
                        $renderedTemplates[] = [$name => $result];
                    }
                }
            }

            return $renderedTemplates;
        }
        /** @var MetaContainer $metaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type && $metaContainer->include) {
                /** @noinspection SlowArrayOperationsInLoopInspection */
                $htmlArray = array_merge($htmlArray, $metaContainer->renderArray());
            }
        }
        // Special-case for requests for the MetaSiteVars "container"
        if ($type === MetaSiteVars::CONTAINER_TYPE) {
            $result = Json::encode($this->metaSiteVars->toArray());
            $htmlArray = array_merge($htmlArray, $this->metaSiteVars->toArray());
        }

        return $htmlArray;
    }

    /**
     * Return a MetaItem object by $key from container $type
     *
     * @param string $key
     * @param string $type
     *
     * @return null|MetaItem
     */
    public function getMetaItemByKey(string $key, string $type = '')
    {
        $metaItem = null;
        /** @var MetaContainer $metaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if (($metaContainer::CONTAINER_TYPE === $type) || empty($type)) {
                foreach ($metaContainer->data as $metaItem) {
                    if ($key === $metaItem->key) {
                        return $metaItem;
                    }
                }
            }
        }

        return null;
    }

    /**
     * Invalidate all of the meta container caches
     */
    public function invalidateCaches()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::GLOBAL_METACONTAINER_CACHE_TAG);
        Craft::info(
            'All meta container caches cleared',
            __METHOD__
        );
        // Trigger an event to let other plugins/modules know we've cleared our caches
        $event = new InvalidateContainerCachesEvent([
            'uri' => null,
            'siteId' => null,
            'sourceId' => null,
            'sourceType' => null,
        ]);
        if (!Craft::$app instanceof ConsoleApplication) {
            $this->trigger(self::EVENT_INVALIDATE_CONTAINER_CACHES, $event);
        }
    }

    /**
     * Invalidate a meta bundle cache
     *
     * @param int $sourceId
     * @param null|string $sourceType
     * @param null|int $siteId
     */
    public function invalidateContainerCacheById(int $sourceId, $sourceType = null, $siteId = null)
    {
        $metaBundleSourceId = '';
        if ($sourceId) {
            $metaBundleSourceId = $sourceId;
        }
        $metaBundleSourceType = '';
        if ($sourceType) {
            $metaBundleSourceType = $sourceType;
        }
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id ?? 1;
        }
        $cache = Craft::$app->getCache();
        TagDependency::invalidate(
            $cache,
            self::METACONTAINER_CACHE_TAG . $metaBundleSourceId . $metaBundleSourceType . $siteId
        );
        Craft::info(
            'Meta bundle cache cleared: ' . $metaBundleSourceId . ' / ' . $metaBundleSourceType . ' / ' . $siteId,
            __METHOD__
        );
        // Trigger an event to let other plugins/modules know we've cleared our caches
        $event = new InvalidateContainerCachesEvent([
            'uri' => null,
            'siteId' => $siteId,
            'sourceId' => $sourceId,
            'sourceType' => $metaBundleSourceType,
        ]);
        if (!Craft::$app instanceof ConsoleApplication) {
            $this->trigger(self::EVENT_INVALIDATE_CONTAINER_CACHES, $event);
        }
    }

    /**
     * Invalidate a meta bundle cache
     *
     * @param string $uri
     * @param null|int $siteId
     */
    public function invalidateContainerCacheByPath(string $uri, $siteId = null)
    {
        $cache = Craft::$app->getCache();
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id ?? 1;
        }
        TagDependency::invalidate($cache, self::METACONTAINER_CACHE_TAG . $uri . $siteId);
        Craft::info(
            'Meta container cache cleared: ' . $uri . ' / ' . $siteId,
            __METHOD__
        );
        // Trigger an event to let other plugins/modules know we've cleared our caches
        $event = new InvalidateContainerCachesEvent([
            'uri' => $uri,
            'siteId' => $siteId,
            'sourceId' => null,
            'sourceType' => null,
        ]);
        if (!Craft::$app instanceof ConsoleApplication) {
            $this->trigger(self::EVENT_INVALIDATE_CONTAINER_CACHES, $event);
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Set the element that matches the $uri
     *
     * @param string $uri
     * @param int|null $siteId
     */
    protected function setMatchedElement(string $uri, int $siteId = null)
    {
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        $element = null;
        $uri = trim($uri, '/');
        /** @var Element $element */
        $enabledOnly = !Seomatic::$previewingMetaContainers;
        // Try to use Craft's matched element if looking for an enabled element, the current `siteId` is being used and
        // the current `uri` matches what was in the request
        $request = Craft::$app->getRequest();
        if ($enabledOnly && !$request->getIsConsoleRequest()) {
            /** @var UrlManager $urlManager */
            $urlManager = Craft::$app->getUrlManager();
            try {
                if ($siteId === Craft::$app->getSites()->currentSite->id
                    && $request->getPathInfo() === $uri) {
                    $element = $urlManager->getMatchedElement();
                }
            } catch (Throwable $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }
        if (!$element) {
            $element = Craft::$app->getElements()->getElementByUri($uri, $siteId, $enabledOnly);
        }
        if ($element && ($element->uri !== null)) {
            Seomatic::setMatchedElement($element);
        }
    }

    /**
     * Return as key/value pairs any allowed parameters in the request
     *
     * @return string
     */
    protected function getAllowedUrlParams(): string
    {
        $result = '';
        $allowedParams = Seomatic::$settings->allowedUrlParams;
        if (Craft::$app->getPlugins()->getPlugin(SeoProduct::REQUIRED_PLUGIN_HANDLE)) {
            $commerce = CommercePlugin::getInstance();
            if ($commerce !== null) {
                $allowedParams[] = 'variant';
            }
        }
        // Iterate through the allowed parameters, adding the key/value pair to the $result string as found
        $request = Craft::$app->getRequest();
        if (!$request->isConsoleRequest) {
            foreach ($allowedParams as $allowedParam) {
                $value = $request->getParam($allowedParam);
                if ($value !== null) {
                    $result .= "{$allowedParam}={$value}";
                }
            }
        }

        return $result;
    }

    /**
     * Load the meta containers specific to the matched meta bundle
     */
    protected function loadContentMetaContainers()
    {
        Craft::beginProfile('MetaContainers::loadContentMetaContainers', __METHOD__);
        $metaBundle = $this->getMatchedMetaBundle();
        if ($metaBundle) {
            // Fire an 'metaBundleDebugData' event
            if ($this->hasEventHandlers(self::EVENT_METABUNDLE_DEBUG_DATA)) {
                $event = new MetaBundleDebugDataEvent([
                    'metaBundleCategory' => MetaBundleDebugDataEvent::CONTENT_META_BUNDLE,
                    'metaBundle' => $metaBundle,
                ]);
                $this->trigger(self::EVENT_METABUNDLE_DEBUG_DATA, $event);
            }
            $this->addMetaBundleToContainers($metaBundle);
        }
        Craft::endProfile('MetaContainers::loadContentMetaContainers', __METHOD__);
    }

    /**
     * Load any meta containers in the current element
     */
    protected function loadFieldMetaContainers()
    {
        Craft::beginProfile('MetaContainers::loadFieldMetaContainers', __METHOD__);
        $element = Seomatic::$matchedElement;
        if ($element && $this->includeMatchedElement) {
            /** @var Element $element */
            $fieldHandles = FieldHelper::fieldsOfTypeFromElement($element, FieldHelper::SEO_SETTINGS_CLASS_KEY, true);
            foreach ($fieldHandles as $fieldHandle) {
                if (!empty($element->$fieldHandle)) {
                    /** @var MetaBundle $metaBundle */
                    $metaBundle = $element->$fieldHandle;
                    Seomatic::$plugin->metaBundles->pruneFieldMetaBundleSettings($metaBundle, $fieldHandle);

                    // See which properties have to be overridden, because the parent bundle says so.
                    foreach (self::COMPOSITE_SETTING_LOOKUP as $settingName => $rules) {
                        if (empty($metaBundle->metaGlobalVars->{$settingName})) {
                            $parentBundle = Seomatic::$plugin->metaBundles->getContentMetaBundleForElement($element);

                            foreach ($rules as $settingPath => $action) {
                                list($container, $property) = explode('.', $settingPath);
                                list($testValue, $sourceSetting) = explode('.', $action);

                                $bundleProp = $parentBundle->{$container}->{$property} ?? null;
                                if ($bundleProp == $testValue) {
                                    $metaBundle->metaGlobalVars->{$settingName} = $metaBundle->metaGlobalVars->{$sourceSetting};
                                }
                            }
                        }
                    }

                    // Handle re-creating the `mainEntityOfPage` so that the model injected into the
                    // templates has the appropriate attributes
                    $generalContainerKey = MetaJsonLdContainer::CONTAINER_TYPE . JsonLdService::GENERAL_HANDLE;
                    $generalContainer = $this->metaContainers[$generalContainerKey];
                    if (($generalContainer !== null) && !empty($generalContainer->data['mainEntityOfPage'])) {
                        /** @var MetaJsonLd $jsonLdModel */
                        $jsonLdModel = $generalContainer->data['mainEntityOfPage'];
                        $config = $jsonLdModel->getAttributes();
                        $schemaType = $metaBundle->metaGlobalVars->mainEntityOfPage ?? $config['type'] ?? null;
                        // If the schemaType is '' we should fall back on whatever the mainEntityOfPage already is
                        if (empty($schemaType)) {
                            $schemaType = null;
                        }
                        if ($schemaType !== null) {
                            $config['key'] = 'mainEntityOfPage';
                            $schemaType = MetaValueHelper::parseString($schemaType);
                            $generalContainer->data['mainEntityOfPage'] = MetaJsonLd::create($schemaType, $config);
                        }
                    }
                    // Fire an 'metaBundleDebugData' event
                    if ($this->hasEventHandlers(self::EVENT_METABUNDLE_DEBUG_DATA)) {
                        $event = new MetaBundleDebugDataEvent([
                            'metaBundleCategory' => MetaBundleDebugDataEvent::FIELD_META_BUNDLE,
                            'metaBundle' => $metaBundle,
                        ]);
                        $this->trigger(self::EVENT_METABUNDLE_DEBUG_DATA, $event);
                    }
                    $this->addMetaBundleToContainers($metaBundle);
                }
            }
        }
        Craft::endProfile('MetaContainers::loadFieldMetaContainers', __METHOD__);
    }

    /**
     * Generate an md5 hash from an object or array
     *
     * @param string|array|MetaItem $data
     *
     * @return string
     */
    protected function getHash($data): string
    {
        if (is_object($data)) {
            $data = $data->toArray();
        }
        if (is_array($data)) {
            $data = serialize($data);
        }

        return md5($data);
    }

    // Private Methods
    // =========================================================================
}
