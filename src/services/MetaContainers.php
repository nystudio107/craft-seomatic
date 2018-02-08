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

use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\Dependency as DependencyHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\models\jsonld\BreadcrumbList;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaGlobalVars;
use nystudio107\seomatic\models\MetaSiteVars;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaTitleContainer;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\elements\Category;
use craft\elements\Entry;
use craft\errors\SiteNotFoundException;
use craft\helpers\UrlHelper;

use yii\base\Exception;
use yii\base\InvalidConfigException;
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

    const METACONTAINER_CACHE_DURATION = null;
    const DEVMODE_METACONTAINER_CACHE_DURATION = 30;
    const CACHE_KEY = 'seomatic_metacontainer_';

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
     * @var bool
     */
    protected $loadingContainers = false;

    /**
     * @var null|MetaBundle
     */
    protected $matchedMetaBundle = null;

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
        // Avoid recursion
        if (!$this->loadingContainers) {
            $this->loadingContainers = true;
            $this->setMatchedElement($uri, $siteId);
            // Get the cache tag for the matched meta bundle
            $metaBundle = $this->getMatchedMetaBundle();
            $metaBundleSourceId = "";
            if ($metaBundle) {
                $metaBundleSourceId = $metaBundle->sourceId;
            }
            // Load the meta containers
            $duration = Seomatic::$devMode
                ? $this::DEVMODE_METACONTAINER_CACHE_DURATION
                : $this::METACONTAINER_CACHE_DURATION;
            $dependency = new TagDependency([
                'tags' => [
                    $this::GLOBAL_METACONTAINER_CACHE_TAG,
                    $this::METACONTAINER_CACHE_TAG . $metaBundleSourceId,
                    $this::METACONTAINER_CACHE_TAG . $uri . $siteId,
                ],
            ]);
            $cache = Craft::$app->getCache();
            list($this->metaGlobalVars, $this->metaSiteVars, $this->metaSitemapVars, $this->metaContainers) = $cache->getOrSet(
                $this::CACHE_KEY . $uri . $siteId,
                function () use ($uri, $siteId) {
                    Craft::info(
                        'Meta container cache miss: ' . $uri . '/' . $siteId,
                        __METHOD__
                    );
                    $this->loadGlobalMetaContainers($siteId);
                    $this->loadContentMetaContainers();
                    $this->addDynamicMetaToContainers($uri, $siteId);
                    return [$this->metaGlobalVars, $this->metaSiteVars, $this->metaSitemapVars, $this->metaContainers];
                },
                $duration,
                $dependency
            );
            MetaValueHelper::cache();
            $this->loadingContainers = false;
        }
    }

    /**
     * Include the meta containers
     */
    public function includeMetaContainers()
    {
        $this->parseGlobalVars();
        foreach ($this->metaContainers as $metaContainer) {
            /** @var $metaContainer MetaContainer */
            if ($metaContainer->include) {
                $metaContainer->includeMetaData();
            }
        }
    }

    /**
     * Parse the global variables
     */
    public function parseGlobalVars()
    {
        if ($this->metaGlobalVars) {
            $this->metaGlobalVars->parseProperties();
        }
        if ($this->metaSiteVars) {
            $this->metaSiteVars->parseProperties();
        }
    }

    /**
     * Prep all of the meta for preview purposes
     *
     * @param string   $uri
     * @param int|null $siteId
     */
    public function previewMetaContainers(string $uri = '', int $siteId = null)
    {
        $this->loadMetaContainers($uri, $siteId);
        $this->parseGlobalVars();
        Seomatic::$seomaticVariable->init();
    }

    /**
     * Add any custom/dynamic meta to the containers
     *
     * @param string $uri
     * @param int    $siteId
     *
     * @throws Exception
     * @throws SiteNotFoundException
     */
    public function addDynamicMetaToContainers(string $uri = '', int $siteId = null)
    {
        $this->addMetaJsonLdBreadCrumbs($siteId);
        $this->addMetaLinkHrefLang();
        $this->addSameAsMeta();
    }

    /**
     * Add the passed in MetaItem to the MetaContainer indexed as $key
     *
     * @param $data MetaItem The MetaItem to add to the container
     * @param $key  string   The key to the container to add the data to
     *
     */
    public function addToMetaContainer(MetaItem $data, string $key = null)
    {
        /** @var  $container MetaContainer */
        $container = $this->getMetaContainer($key);

        if (!empty($container)) {
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
     * @return MetaContainer
     */
    public function createMetaContainer(string $type, string $key): MetaContainer
    {
        /** @var  $container MetaContainer */
        $container = null;
        if (empty($this->metaContainers[$key])) {
            /** @var  $className MetaContainer */
            $className = null;
            // Create a new container based on the type passed in
            switch ($type) {
                case MetaTagContainer::CONTAINER_TYPE:
                    $className = MetaTagContainer::className();
                    break;
                case MetaLinkContainer::CONTAINER_TYPE:
                    $className = MetaLinkContainer::className();
                    break;
                case MetaScriptContainer::CONTAINER_TYPE:
                    $className = MetaScriptContainer::className();
                    break;
                case MetaJsonLdContainer::CONTAINER_TYPE:
                    $className = MetaJsonLdContainer::className();
                    break;
                case MetaTitleContainer::CONTAINER_TYPE:
                    $className = MetaTitleContainer::className();
                    break;
            }
            if ($className) {
                $container = $className::create();
                if ($container) {
                    $this->metaContainers[$key] = $container;
                }
            }
        }

        return $container;
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
            if ($metaContainer::CONTAINER_TYPE == $type && $metaContainer->include) {
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
            if ($metaContainer::CONTAINER_TYPE == $type && $metaContainer->include) {
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
            if (($metaContainer::CONTAINER_TYPE == $type) || (empty($type))) {
                /** @var  $metaTag MetaItem */
                foreach ($metaContainer->data as $metaItem) {
                    if ($key == $metaItem->key) {
                        return $metaItem;
                    }
                }
            }
        }

        return $metaItem;
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
        if (!$siteId) {
            $siteId = Craft::$app->getSites()->currentSite->id;
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
    }

    /**
     * Load the meta containers specific to the matched meta bundle
     */
    protected function loadContentMetaContainers()
    {
        $metaBundle = $this->getMatchedMetaBundle();
        if ($metaBundle) {
            $this->addMetaBundleToContainers($metaBundle);
        }
    }

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
            switch ($element::className()) {
                case Entry::class:
                    /** @var  $element Entry */
                    $sourceType = MetaBundles::SECTION_META_BUNDLE;
                    break;

                case Category::class:
                    /** @var  $element Category */
                    $sourceType = MetaBundles::CATEGORYGROUP_META_BUNDLE;
                    break;
                // @todo handle commerce products
            }
            list($sourceId, $sourceSiteId) = Seomatic::$plugin->metaBundles->getMetaSourceIdFromElement($element);
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
     * Set the element that matches the $uri
     *
     * @param string   $uri
     * @param int|null $siteId
     */
    protected function setMatchedElement(string $uri, int $siteId = null)
    {
        if (!$siteId) {
            $siteId = Craft::$app->getSites()->primarySite->id;
        }
        $uri = trim($uri, '/');
        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementByUri($uri, $siteId, true);
        if ($element) {
            Seomatic::setMatchedElement($element);
        }
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
        $attributes = array_filter($attributes);
        $this->metaGlobalVars->setAttributes($attributes, false);
        // Meta site vars
        $attributes = $metaBundle->metaSiteVars->getAttributes();
        $attributes = array_filter($attributes);
        $this->metaSiteVars->setAttributes($attributes, false);
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
        $metaBundleSourceId = "";
        if ($sourceId) {
            $metaBundleSourceId = $sourceId;
        }
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::METACONTAINER_CACHE_TAG . $metaBundleSourceId);
        Craft::info(
            'Meta bundle cache cleared: ' . $metaBundleSourceId,
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
        TagDependency::invalidate($cache, $this::METACONTAINER_CACHE_TAG . $uri . $siteId);
        Craft::info(
            'Meta container cache cleared: ' . $uri . '/' . $siteId,
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Add breadcrumbs to the MetaJsonLdContainer
     *
     * @param int|null $siteId
     *
     * @throws Exception
     * @throws \craft\errors\SiteNotFoundException
     */
    protected function addMetaJsonLdBreadCrumbs(int $siteId = null)
    {
        $position = 1;
        if (!$siteId) {
            $siteId = Craft::$app->getSites()->primarySite->id;
        }
        $site = Craft::$app->getSites()->getSiteById($siteId);
        $siteUrl = $site->hasUrls ? $site->baseUrl : Craft::$app->getSites()->getPrimarySite()->baseUrl;
        /** @var  $crumbs BreadcrumbList */
        $crumbs = Seomatic::$plugin->jsonLd->create([
            'type' => 'BreadcrumbList',
            'name' => 'Breadcrumbs',
            'description' => 'Breadcrumbs list'
        ]);
        /** @var  $element Element */
        $element = Craft::$app->getElements()->getElementByUri("__home__", $siteId);
        if ($element) {
            $uri = $element->uri == '__home__' ? '' : $element->uri;
            $listItem = MetaJsonLd::create("ListItem", [
                'position' => $position,
                'item'     => [
                    '@id'  => UrlHelper::siteUrl($uri, null, null, $siteId),
                    'name' => $element->title,
                ],
            ]);
            $crumbs->itemListElement[] = $listItem;
        } else {
            $crumbs->itemListElement[] = MetaJsonLd::create("ListItem", [
                'position' => $position,
                'item'     => [
                    '@id'  => $siteUrl,
                    'name' => 'Homepage',
                ],
            ]);
        }
        // Build up the segments, and look for elements that match
        $uri = '';
        $segments = Craft::$app->getRequest()->getSegments();
        /** @var  $lastElement Element */
        $lastElement = Seomatic::$matchedElement;
        if ($lastElement && $element) {
            if ($lastElement->uri != "__home__" && $element->uri) {
                $path = parse_url($lastElement->url, PHP_URL_PATH);
                $path = trim($path, "/");
                $segments = explode("/", $path);
            }
        }
        // Parse through the segments looking for elements that match
        foreach ($segments as $segment) {
            $uri .= $segment;
            $element = Craft::$app->getElements()->getElementByUri($uri, $siteId);
            if ($element && $element->uri) {
                $position++;
                $uri = $element->uri == '__home__' ? '' : $element->uri;
                $crumbs->itemListElement[] = MetaJsonLd::create("ListItem", [
                    'position' => $position,
                    'item'     => [
                        '@id'  => UrlHelper::siteUrl($uri, null, null, $siteId),
                        'name' => $element->title,
                    ],
                ]);
            }
            $uri .= "/";
        }

        Seomatic::$plugin->jsonLd->add($crumbs);
    }

    /**
     * Add meta hreflang tags if there is more than one site
     */
    protected function addMetaLinkHrefLang()
    {
        /** @TODO: this is wrong, we should get the localized URLs for the current request */
        $sites = $this->getLocalizedUrls();

        // Add the x-default hreflang
        $site = $sites[0];
        $metaTag = Seomatic::$plugin->link->create([
            'rel'      => 'alternate',
            'hreflang' => 'x-default',
            'href'     => $site['url'],
        ]);
        Seomatic::$plugin->link->add($metaTag);
        // Add the alternate language link rel's
        if (count($sites) > 1) {
            foreach ($sites as $site) {
                $metaTag = Seomatic::$plugin->link->create([
                    'rel'      => 'alternate',
                    'hreflang' => $site['language'],
                    'href'     => $site['url'],
                ]);
                Seomatic::$plugin->link->add($metaTag);
            }
        }
    }

    /**
     * Add the Same As meta tags and JSON-LD
     */
    protected function addSameAsMeta()
    {
        $sameAsUrls = ArrayHelper::getColumn($this->metaSiteVars->sameAsLinks, 'url', false);
        $sameAsUrls = array_filter($sameAsUrls);
        // Facebook OpenGraph
        $ogSeeAlso = Seomatic::$plugin->tag->get('og:see_also');
        if ($ogSeeAlso) {
            $ogSeeAlso->content = $sameAsUrls;
        }
    }

    /**
     * @return array
     */
    protected function getLocalizedUrls()
    {
        $localizedUrls = [];
        try {
            $requestUri = Craft::$app->getRequest()->getUrl();
        } catch (InvalidConfigException $e) {
            $requestUri = '';
            Craft::error($e->getMessage(), __METHOD__);
        }
        $sites = Craft::$app->getSites()->getAllSites();
        $elements = Craft::$app->getElements();
        foreach ($sites as $site) {
            if (Seomatic::$matchedElement) {
                $url = $elements->getElementUriForSite(Seomatic::$matchedElement->getId(), $site->id);
                $url = ($url === '__home__') ? '' : $url;
            } else {
                try {
                    $url = $site->hasUrls ? UrlHelper::siteUrl($requestUri, null, null, $site->id)
                        : Craft::$app->getSites()->getPrimarySite()->baseUrl;
                } catch (SiteNotFoundException $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                } catch (Exception $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            if (!UrlHelper::isAbsoluteUrl($url)) {
                try {
                    $url = UrlHelper::siteUrl($url);
                } catch (Exception $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            $language = $site->language;
            $language = strtolower($language);
            $language = str_replace('_', '-', $language);
            $localizedUrls[] = [
                'id' => $site->id,
                'language' => $language,
                'url' => $url
            ];
        }

        return $localizedUrls;
    }

    /**
     * Generate an md5 hash from an object or array
     *
     * @param MetaItem $data
     *
     * @return string
     */
    protected function getHash(MetaItem $data): string
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
