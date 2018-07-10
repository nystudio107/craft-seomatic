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

namespace nystudio107\seomatic\services;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\DynamicMeta as DynamicMetaHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaGlobalVars;
use nystudio107\seomatic\models\MetaSiteVars;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\variables\SeomaticVariable;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\elements\Category;
use craft\elements\Entry;
use craft\helpers\UrlHelper;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;

use yii\base\Exception;
use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainers extends Component
{
    // Constants
    // =========================================================================

    const GLOBAL_METACONTAINER_CACHE_TAG = 'seomatic_metacontainer';
    const METACONTAINER_CACHE_TAG = 'seomatic_metacontainer_';

    const CACHE_KEY = 'seomatic_metacontainer_';
    const GLOBALS_CACHE_KEY = 'parsed_globals_';
    const SCRIPTS_CACHE_KEY = 'body_scripts_';

    // Public Properties
    // =========================================================================

    /**
     * @var MetaGlobalVars
     */
    public $metaGlobalVars;

    /**
     * @var MetaSiteVars
     */
    public $metaSiteVars;

    /**
     * @var MetaSitemapVars
     */
    public $metaSitemapVars;

    // Protected Properties
    // =========================================================================

    /**
     * @var MetaContainer
     */
    protected $metaContainers = [];

    /**
     * @var null|MetaBundle
     */
    protected $matchedMetaBundle = null;

    /**
     * @var null|TagDependency
     */
    protected $containerDependency = null;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Load the meta containers
     *
     * @param string|null $uri
     * @param int|null    $siteId
     */
    public function loadMetaContainers(string $uri = '', int $siteId = null)
    {
        Craft::beginProfile('MetaContainers::loadMetaContainers', __METHOD__);
        // Avoid recursion
        if (!Seomatic::$loadingContainers) {
            Seomatic::$loadingContainers = true;
            $this->setMatchedElement($uri, $siteId);
            // Get the cache tag for the matched meta bundle
            $metaBundle = $this->getMatchedMetaBundle();
            $metaBundleSourceId = '';
            if ($metaBundle) {
                $metaBundleSourceId = $metaBundle->sourceId;
            }
            // We need an actual $siteId here for the cache key
            if ($siteId === null) {
                $siteId = Craft::$app->getSites()->currentSite->id
                    ?? Craft::$app->getSites()->primarySite->id
                    ?? 1;
            }
            // Load the meta containers
            $dependency = new TagDependency([
                'tags' => [
                    $this::GLOBAL_METACONTAINER_CACHE_TAG,
                    $this::METACONTAINER_CACHE_TAG.$metaBundleSourceId,
                    $this::METACONTAINER_CACHE_TAG.$uri.$siteId,
                ],
            ]);
            $this->containerDependency = $dependency;
            if (Seomatic::$previewingMetaContainers) {
                $this->loadGlobalMetaContainers($siteId);
                $this->loadContentMetaContainers();
                $this->loadFieldMetaContainers();
                DynamicMetaHelper::addDynamicMetaToContainers($uri, $siteId);
            } else {
                $cache = Craft::$app->getCache();
                list($this->metaGlobalVars, $this->metaSiteVars, $this->metaSitemapVars, $this->metaContainers) = $cache->getOrSet(
                    $this::CACHE_KEY.$uri.$siteId,
                    function () use ($uri, $siteId) {
                        Craft::info(
                            'Meta container cache miss: '.$uri.'/'.$siteId,
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
            Seomatic::$loadingContainers = false;
        }
        Craft::endProfile('MetaContainers::loadMetaContainers', __METHOD__);
    }

    /**
     * Include any script body HTML
     *
     * @param int $bodyPosition
     */
    public function includeScriptBodyHtml(int $bodyPosition)
    {
        Craft::beginProfile('MetaContainers::includeScriptBodyHtml', __METHOD__);
        $dependency = $this->containerDependency;
        $uniqueKey = $dependency->tags[2].$bodyPosition;
        $scriptData = Craft::$app->getCache()->getOrSet(
            $this::GLOBALS_CACHE_KEY.$uniqueKey,
            function () use ($uniqueKey, $bodyPosition) {
                Craft::info(
                    $this::SCRIPTS_CACHE_KEY.' cache miss: '.$uniqueKey,
                    __METHOD__
                );
                $scriptData = [];
                $scriptContainers = $this->getContainersOfType(MetaScriptContainer::CONTAINER_TYPE);
                foreach ($scriptContainers as $scriptContainer) {
                    /** @var MetaScriptContainer $scriptContainer */
                    foreach ($scriptContainer->data as $metaScript) {
                        /** @var MetaScript $metaScript */
                        if (!empty($metaScript->bodyTemplatePath) && ($metaScript->bodyPosition === $bodyPosition)) {
                            $scriptData[] = $metaScript->renderBodyHtml();
                        }
                    }
                }

                return $scriptData;
            },
            Seomatic::$cacheDuration,
            $dependency
        );
        // Output the script HTML
        foreach ($scriptData as $script) {
            echo $script;
        }
        Craft::endProfile('MetaContainers::includeScriptBodyHtml', __METHOD__);
    }

    /**
     * Include the meta containers
     */
    public function includeMetaContainers()
    {
        Craft::beginProfile('MetaContainers::includeMetaContainers', __METHOD__);
        DynamicMetaHelper::includeHttpHeaders();
        $this->parseGlobalVars();
        foreach ($this->metaContainers as $metaContainer) {
            /** @var $metaContainer MetaContainer */
            if ($metaContainer->include) {
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
        $uniqueKey = $dependency->tags[2];
        list($this->metaGlobalVars, $this->metaSiteVars) = Craft::$app->getCache()->getOrSet(
            $this::GLOBALS_CACHE_KEY.$uniqueKey,
            function () use ($uniqueKey) {
                Craft::info(
                    $this::GLOBALS_CACHE_KEY.' cache miss: '.$uniqueKey,
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
     * @param string   $uri
     * @param int|null $siteId
     * @param bool     $parseVariables
     */
    public function previewMetaContainers(string $uri = '', int $siteId = null, bool $parseVariables = false)
    {
        // It's possible this won't exist at this point
        if (!Seomatic::$seomaticVariable) {
            // Create our variable and stash it in the plugin for global access
            Seomatic::$seomaticVariable = new SeomaticVariable();
        }
        Seomatic::$previewingMetaContainers = true;
        $this->loadMetaContainers($uri, $siteId);
        if ($parseVariables) {
            $this->parseGlobalVars();
        }
        // Special-case the global bundle
        if ($uri === MetaBundles::GLOBAL_META_BUNDLE) {
            try {
                $canonical = Seomatic::$seomaticVariable->link->get('canonical');
                if ($canonical !== null) {
                    $canonical->href = UrlHelper::siteUrl('/', null, null, $siteId);
                }
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
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
        /** @var  $container MetaContainer */
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
    public function createMetaContainer(string $type, string $key): MetaContainer
    {
        /** @var MetaContainer $container */
        $container = null;
        if (empty($this->metaContainers[$key])) {
            /** @var MetaContainer $className */
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
                if ($container) {
                    $this->metaContainers[$key] = $container;
                }
            }
        }

        /** @var MetaContainer $className */
        return $container;
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
        /** @var  $metaContainer MetaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type) {
                $containers[] = $metaContainer;
            }
        }

        return $containers;
    }

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
        /** @var  $metaContainer MetaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type && $metaContainer->include) {
                $html .= $metaContainer->render([
                    'renderRaw'        => true,
                    'renderScriptTags' => true,
                    'array'            => true,
                ]);
            }
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
        /** @var  $metaContainer MetaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type && $metaContainer->include) {
                $htmlArray = array_merge($htmlArray, $metaContainer->renderArray());
            }
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
        /** @var  $metaContainer MetaContainer */
        foreach ($this->metaContainers as $metaContainer) {
            if (($metaContainer::CONTAINER_TYPE === $type) || empty($type)) {
                /** @var  $metaTag MetaItem */
                foreach ($metaContainer->data as $metaItem) {
                    if ($key === $metaItem->key) {
                        return $metaItem;
                    }
                }
            }
        }

        return null;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Return the MetaBundle that corresponds with the Seomatic::$matchedElement
     *
     * @return null|MetaBundle
     */
    public function getMatchedMetaBundle()
    {
        $metaBundle = null;
        /** @var Element $element */
        $element = Seomatic::$matchedElement;
        if ($element) {
            $sourceType = '';
            switch (\get_class($element)) {
                case Entry::class:
                    /** @var  $element Entry */
                    $sourceType = MetaBundles::SECTION_META_BUNDLE;
                    break;

                case Category::class:
                    /** @var  $element Category */
                    $sourceType = MetaBundles::CATEGORYGROUP_META_BUNDLE;
                    break;
                case Product::class:
                    if (Seomatic::$commerceInstalled) {
                        $commerce = CommercePlugin::getInstance();
                        if ($commerce !== null) {
                            $sourceType = MetaBundles::PRODUCT_META_BUNDLE;
                        }
                    }
                    break;
            }
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId)
                = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
            $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                $sourceType,
                $sourceId,
                $sourceSiteId
            );
        }
        $this->matchedMetaBundle = $metaBundle;

        return $metaBundle;
    }

    /**
     * Add the meta bundle to our existing meta containers, overwriting meta
     * items with the same key
     *
     * @param MetaBundle $metaBundle
     */
    public function addMetaBundleToContainers(MetaBundle $metaBundle)
    {
        // Meta global vars
        $attributes = $metaBundle->metaGlobalVars->getAttributes();
        // Parse the meta values so we can filter out any blank or empty attributes
        // So that they can fall back on the parent container
        $parsedAttributes = $attributes;
        MetaValueHelper::parseArray($parsedAttributes);
        $parsedAttributes = array_filter($parsedAttributes);
        //Craft::dd($parsedAttributes);
        $attributes = array_intersect_key($attributes, $parsedAttributes);
        // Add the attributes in
        $attributes = array_filter($attributes);
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
        $attributes = array_filter($attributes);
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
     * Invalidate all of the meta container caches
     */
    public function invalidateCaches()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::GLOBAL_METACONTAINER_CACHE_TAG);
        Craft::info(
            'All meta container caches cleared',
            __METHOD__
        );
    }

    /**
     * Invalidate a meta bundle cache
     *
     * @param int $sourceId
     */
    public function invalidateContainerCacheById(int $sourceId)
    {
        $metaBundleSourceId = '';
        if ($sourceId) {
            $metaBundleSourceId = $sourceId;
        }
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::METACONTAINER_CACHE_TAG.$metaBundleSourceId);
        Craft::info(
            'Meta bundle cache cleared: '.$metaBundleSourceId,
            __METHOD__
        );
    }

    /**
     * Invalidate a meta bundle cache
     *
     * @param string $uri
     * @param int    $siteId
     */
    public function invalidateContainerCacheByPath(string $uri, int $siteId)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::METACONTAINER_CACHE_TAG.$uri.$siteId);
        Craft::info(
            'Meta container cache cleared: '.$uri.'/'.$siteId,
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Load the global site meta containers
     *
     * @param int|null $siteId
     */
    protected function loadGlobalMetaContainers(int $siteId = null)
    {
        Craft::beginProfile('MetaContainers::loadGlobalMetaContainers', __METHOD__);
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id ?? 1;
        }
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            // Meta global vars
            $this->metaGlobalVars = $metaBundle->metaGlobalVars;
            // Meta site vars
            $this->metaSiteVars = $metaBundle->metaSiteVars;
            // Meta sitemap vars
            $this->metaSitemapVars = $metaBundle->metaSitemapVars;
            // Language
            $this->metaGlobalVars->language = Seomatic::$language;
            // Meta containers
            foreach ($metaBundle->metaContainers as $key => $metaContainer) {
                $this->metaContainers[$key] = $metaContainer;
            }
        }
        Craft::beginProfile('MetaContainers::loadGlobalMetaContainers', __METHOD__);
    }

    /**
     * Load the meta containers specific to the matched meta bundle
     */
    protected function loadContentMetaContainers()
    {
        Craft::beginProfile('MetaContainers::loadContentMetaContainers', __METHOD__);
        $metaBundle = $this->getMatchedMetaBundle();
        if ($metaBundle) {
            $this->addMetaBundleToContainers($metaBundle);
        }
        Craft::beginProfile('MetaContainers::loadContentMetaContainers', __METHOD__);
    }

    /**
     * Load any meta containers in the current element
     */
    protected function loadFieldMetaContainers()
    {
        Craft::beginProfile('MetaContainers::loadFieldMetaContainers', __METHOD__);
        $element = Seomatic::$matchedElement;
        if ($element) {
            /** @var Element $element */
            $fieldHandles = FieldHelper::fieldsOfTypeFromElement($element, FieldHelper::SEO_SETTINGS_CLASS_KEY, true);
            foreach ($fieldHandles as $fieldHandle) {
                if (!empty($element->$fieldHandle)) {
                    $metaBundle = $element->$fieldHandle;
                    $this->addMetaBundleToContainers($metaBundle);
                }
            }
        }
        Craft::beginProfile('MetaContainers::loadFieldMetaContainers', __METHOD__);
    }

    /**
     * Set the element that matches the $uri
     *
     * @param string   $uri
     * @param int|null $siteId
     */
    protected function setMatchedElement(string $uri, int $siteId = null)
    {
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        $uri = trim($uri, '/');
        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementByUri($uri, $siteId, false);
        if ($element && ($element->uri !== null)) {
            Seomatic::setMatchedElement($element);
        }
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
        if (\is_object($data)) {
            $data = $data->toArray();
        }
        if (\is_array($data)) {
            $data = serialize($data);
        }

        return md5($data);
    }

    // Private Methods
    // =========================================================================
}
