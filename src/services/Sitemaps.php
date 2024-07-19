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
use craft\errors\SiteNotFoundException;
use craft\events\RegisterUrlRulesEvent;
use craft\models\Section;
use craft\web\UrlManager;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\SitemapCustomTemplate;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Sitemaps extends Component implements SitemapInterface
{
    // Constants
    // =========================================================================

    public const SEOMATIC_SITEMAPINDEX_CONTAINER = Seomatic::SEOMATIC_HANDLE . SitemapIndexTemplate::TEMPLATE_TYPE;

    public const SEOMATIC_SITEMAP_CONTAINER = Seomatic::SEOMATIC_HANDLE . SitemapTemplate::TEMPLATE_TYPE;

    public const SEOMATIC_SITEMAPCUSTOM_CONTAINER = Seomatic::SEOMATIC_HANDLE . SitemapCustomTemplate::TEMPLATE_TYPE;

    public const SEARCH_ENGINE_SUBMISSION_URLS = [
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @var FrontendTemplateContainer
     */
    protected $sitemapTemplateContainer;

    // Public Methods
    // =========================================================================

    /**
     * Load in the sitemap frontend template containers
     */
    public function loadSitemapContainers()
    {
        if (Seomatic::$settings->sitemapsEnabled) {
            $this->sitemapTemplateContainer = FrontendTemplateContainer::create();
            // The Sitemap Index
            $sitemapIndexTemplate = SitemapIndexTemplate::create();
            $this->sitemapTemplateContainer->addData($sitemapIndexTemplate, self::SEOMATIC_SITEMAPINDEX_CONTAINER);
            // A custom sitemap
            $sitemapCustomTemplate = SitemapCustomTemplate::create();
            $this->sitemapTemplateContainer->addData($sitemapCustomTemplate, self::SEOMATIC_SITEMAPCUSTOM_CONTAINER);
            // A generic sitemap
            $sitemapTemplate = SitemapTemplate::create();
            $this->sitemapTemplateContainer->addData($sitemapTemplate, self::SEOMATIC_SITEMAP_CONTAINER);
            // Handler: UrlManager::EVENT_REGISTER_SITE_URL_RULES
            Event::on(
                UrlManager::class,
                UrlManager::EVENT_REGISTER_SITE_URL_RULES,
                function(RegisterUrlRulesEvent $event) {
                    Craft::debug(
                        'UrlManager::EVENT_REGISTER_SITE_URL_RULES',
                        __METHOD__
                    );
                    // Register our sitemap routes
                    $event->rules = array_merge(
                        $event->rules,
                        $this->sitemapRouteRules()
                    );
                }
            );
        }
    }

    /**
     * @return array
     */
    public function sitemapRouteRules(): array
    {
        $rules = [];
        $groups = Craft::$app->getSites()->getAllGroups();
        $groupId = $groups[0]->id;
        $currentSite = null;
        try {
            $currentSite = Craft::$app->getSites()->getCurrentSite();
        } catch (SiteNotFoundException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        if ($currentSite) {
            try {
                $groupId = $currentSite->getGroup()->id;
            } catch (InvalidConfigException $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }
        // Add the route to redirect sitemap.xml to the actual sitemap
        $route =
            Seomatic::$plugin->handle
            . '/'
            . 'sitemap'
            . '/'
            . 'sitemap-index-redirect';
        $rules['sitemap.xml'] = [
            'route' => $route,
        ];
        // Add the route for the sitemap.xsl styles
        $route =
            Seomatic::$plugin->handle
            . '/'
            . 'sitemap'
            . '/'
            . 'sitemap-styles';
        $rules['sitemap.xsl'] = [
            'route' => $route,
        ];
        // Add the route for the sitemap-empty.xsl styles
        $route =
            Seomatic::$plugin->handle
            . '/'
            . 'sitemap'
            . '/'
            . 'sitemap-empty-styles';
        $rules['sitemap-empty.xsl'] = [
            'route' => $route,
        ];
        // Add all of the frontend container routes
        foreach ($this->sitemapTemplateContainer->data as $sitemapTemplate) {
            $rules = array_merge(
                $rules,
                $sitemapTemplate->routeRules()
            );
        }

        return $rules;
    }

    /**
     * See if any of the entry types have robots enable and sitemap urls enabled
     *
     * @param MetaBundle $metaBundle
     * @return bool
     */
    public function anyEntryTypeHasSitemapUrls(MetaBundle $metaBundle): bool
    {
        $result = false;
        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
        if ($seoElement) {
            if (!empty($seoElement::typeMenuFromHandle($metaBundle->sourceHandle))) {
                /** @var Section|null $section */
                $section = $seoElement::sourceModelFromHandle($metaBundle->sourceHandle);
                if ($section !== null) {
                    $entryTypes = $section->getEntryTypes();
                    // Fetch each meta bundle for each entry type to see if _any_ of them have sitemap URLs
                    foreach ($entryTypes as $entryType) {
                        $entryTypeBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                            $metaBundle->sourceBundleType,
                            $metaBundle->sourceId,
                            $metaBundle->sourceSiteId,
                            $entryType->id
                        );
                        if ($entryTypeBundle) {
                            $robotsEnabled = true;
                            if (!empty($entryTypeBundle->metaGlobalVars->robots)) {
                                $robotsEnabled = $entryTypeBundle->metaGlobalVars->robots !== 'none' &&
                                    $entryTypeBundle->metaGlobalVars->robots !== 'noindex';
                            }
                            if ($entryTypeBundle->metaSitemapVars->sitemapUrls && $robotsEnabled) {
                                $result = true;
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }

    /**
     * @param string $template
     * @param array $params
     *
     * @return string
     */
    public function renderTemplate(string $template, array $params = []): string
    {
        $html = '';
        if (!empty($this->sitemapTemplateContainer->data[$template])) {
            /** @var FrontendTemplate $sitemapTemplate */
            $sitemapTemplate = $this->sitemapTemplateContainer->data[$template];
            $html = $sitemapTemplate->render($params);
        }

        return $html;
    }

    /**
     * Submit the sitemap index to the search engine services
     */
    public function submitSitemapIndex()
    {
        if (Seomatic::$settings->sitemapsEnabled && Seomatic::$environment === 'live' && Seomatic::$settings->submitSitemaps) {
            // Submit the sitemap to each search engine
            $searchEngineUrls = self::SEARCH_ENGINE_SUBMISSION_URLS;
            // Array is currently empty, but leave the code in place in case submission urls return
            /** @phpstan-ignore-next-line */
            foreach ($searchEngineUrls as &$url) {
                $groups = Craft::$app->getSites()->getAllGroups();
                foreach ($groups as $group) {
                    $groupSiteIds = $group->getSiteIds();
                    if (!empty($groupSiteIds)) {
                        $siteId = $groupSiteIds[0];
                        $sitemapIndexUrl = $this->sitemapIndexUrlForSiteId($siteId);
                        if (!empty($sitemapIndexUrl)) {
                            $submissionUrl = $url . urlencode($sitemapIndexUrl);
                            // create new guzzle client
                            $guzzleClient = Craft::createGuzzleClient(['timeout' => 5, 'connect_timeout' => 5]);
                            // Submit the sitemap index to each search engine
                            try {
                                $guzzleClient->post($submissionUrl);
                                Craft::info(
                                    'Sitemap index submitted to: ' . $submissionUrl,
                                    __METHOD__
                                );
                            } catch (\Exception $e) {
                                Craft::error(
                                    'Error submitting sitemap index to: ' . $submissionUrl . ' - ' . $e->getMessage(),
                                    __METHOD__
                                );
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Get the URL to the $siteId's sitemap index
     *
     * @param int|null $siteId
     *
     * @return string
     */
    public function sitemapIndexUrlForSiteId(int $siteId = null): string
    {
        $url = '';
        $sites = Craft::$app->getSites();
        if ($siteId === null) {
            $siteId = $sites->currentSite->id ?? 1;
        }
        $site = $sites->getSiteById($siteId);
        if ($site !== null) {
            try {
                $url = UrlHelper::siteUrl(
                    '/sitemaps-'
                    . $site->groupId
                    . '-sitemap.xml',
                    null,
                    null,
                    $siteId
                );
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }

        return $url;
    }

    /**
     * Submit the bundle sitemap to the search engine services
     *
     * @param ElementInterface $element
     */
    public function submitSitemapForElement(ElementInterface $element)
    {
        if (Seomatic::$settings->sitemapsEnabled && Seomatic::$environment === 'live' && Seomatic::$settings->submitSitemaps) {
            /** @var Element $element */
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId, $typeId)
                = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
            // Submit the sitemap to each search engine
            $searchEngineUrls = self::SEARCH_ENGINE_SUBMISSION_URLS;
            // Array is currently empty, but leave the code in place in case submission urls return
            /** @phpstan-ignore-next-line */
            foreach ($searchEngineUrls as &$url) {
                $sitemapUrl = $this->sitemapUrlForBundle($sourceBundleType, $sourceHandle, $sourceSiteId);
                if (!empty($sitemapUrl)) {
                    $submissionUrl = $url . urlencode($sitemapUrl);
                    // create new guzzle client
                    $guzzleClient = Craft::createGuzzleClient(['timeout' => 5, 'connect_timeout' => 5]);
                    // Submit the sitemap index to each search engine
                    try {
                        $guzzleClient->post($submissionUrl);
                        Craft::info(
                            'Sitemap index submitted to: ' . $submissionUrl,
                            __METHOD__
                        );
                    } catch (\Exception $e) {
                        Craft::error(
                            'Error submitting sitemap index to: ' . $submissionUrl . ' - ' . $e->getMessage(),
                            __METHOD__
                        );
                    }
                }
            }
        }
    }

    /**
     * @param string $sourceBundleType
     * @param string $sourceHandle
     * @param int|null $siteId
     *
     * @return string
     */
    public function sitemapUrlForBundle(string $sourceBundleType, string $sourceHandle, int $siteId = null, int $page = null): string
    {
        $url = '';
        $sites = Craft::$app->getSites();
        if ($siteId === null) {
            $siteId = $sites->currentSite->id ?? 1;
        }
        $site = $sites->getSiteById($siteId);
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            $siteId
        );
        if ($site && $metaBundle && $metaBundle->metaSitemapVars->sitemapUrls) {
            try {
                $url = UrlHelper::siteUrl(
                    '/sitemaps-'
                    . $site->groupId
                    . '-'
                    . $metaBundle->sourceBundleType
                    . '-'
                    . $metaBundle->sourceHandle
                    . '-'
                    . $metaBundle->sourceSiteId
                    . '-sitemap'
                    . (!empty($page) ? '-p' . $page : '')
                    . '.xml',
                    null,
                    null,
                    $siteId
                );
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }

        return $url;
    }

    /**
     * Submit the bundle sitemap to the search engine services
     *
     * @param int $siteId
     */
    public function submitCustomSitemap(int $siteId)
    {
        if (Seomatic::$settings->sitemapsEnabled && Seomatic::$environment === 'live' && Seomatic::$settings->submitSitemaps) {
            // Submit the sitemap to each search engine
            $searchEngineUrls = self::SEARCH_ENGINE_SUBMISSION_URLS;
            // Array is currently empty, but leave the code in place in case submission urls return
            /** @phpstan-ignore-next-line */
            foreach ($searchEngineUrls as &$url) {
                $sitemapUrl = $this->sitemapCustomUrlForSiteId($siteId);
                if (!empty($sitemapUrl)) {
                    $submissionUrl = $url . urlencode($sitemapUrl);
                    // create new guzzle client
                    $guzzleClient = Craft::createGuzzleClient(['timeout' => 5, 'connect_timeout' => 5]);
                    // Submit the sitemap index to each search engine
                    try {
                        $guzzleClient->post($submissionUrl);
                        Craft::info(
                            'Sitemap Custom submitted to: ' . $submissionUrl,
                            __METHOD__
                        );
                    } catch (\Exception $e) {
                        Craft::error(
                            'Error submitting sitemap index to: ' . $submissionUrl . ' - ' . $e->getMessage(),
                            __METHOD__
                        );
                    }
                }
            }
        }
    }

    /**
     * @param int|null $siteId
     *
     * @return string
     */
    public function sitemapCustomUrlForSiteId(int $siteId = null)
    {
        $url = '';
        $sites = Craft::$app->getSites();
        if ($siteId === null) {
            $siteId = $sites->currentSite->id ?? 1;
        }
        $site = $sites->getSiteById($siteId);
        if ($site) {
            try {
                $url = UrlHelper::siteUrl(
                    '/sitemaps-'
                    . $site->groupId
                    . '-'
                    . SitemapCustomTemplate::CUSTOM_SCOPE
                    . '-'
                    . SitemapCustomTemplate::CUSTOM_HANDLE
                    . '-'
                    . $siteId
                    . '-sitemap.xml',
                    null,
                    null,
                    $siteId
                );
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }

        return $url;
    }

    /**
     * Return all of the sitemap indexes the current group of sites
     *
     * @return string
     */
    public function sitemapIndex(): string
    {
        $result = '';
        $sites = [];
        // If sitemaps aren't enabled globally, return nothing for the sitemap index
        if (!Seomatic::$settings->sitemapsEnabled) {
            return '';
        }
        if (Seomatic::$settings->siteGroupsSeparate) {
            // Get only the sites that are in the current site's group
            try {
                $siteGroup = Craft::$app->getSites()->getCurrentSite()->getGroup();
            } catch (InvalidConfigException $e) {
                $siteGroup = null;
                Craft::error($e->getMessage(), __METHOD__);
            }
            // If we can't get a group, just use the current site
            if ($siteGroup === null) {
                $sites = [Craft::$app->getSites()->getCurrentSite()];
            } else {
                $sites = $siteGroup->getSites();
            }
        } else {
            $sites = Craft::$app->getSites()->getAllSites();
        }

        foreach ($sites as $site) {
            $result .= 'sitemap: ' . $this->sitemapIndexUrlForSiteId($site->id) . PHP_EOL;
        }

        return rtrim($result, PHP_EOL);
    }

    /**
     * Invalidate all of the sitemap caches
     */
    public function invalidateCaches()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::GLOBAL_SITEMAP_CACHE_TAG);
        Craft::info(
            'All sitemap caches cleared',
            __METHOD__
        );
    }

    /**
     * Invalidate the sitemap cache passed in $handle
     *
     * @param string $handle
     * @param int|null $siteId
     * @param string $type
     * @param bool $invalidateCache
     */
    public function invalidateSitemapCache(string $handle, ?int $siteId, string $type, bool $invalidateCache = true)
    {
        // Always just invalidate the sitemap cache now, since we're doing paginated sitemaps
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, SitemapTemplate::SITEMAP_CACHE_TAG . $handle . $siteId);
        Craft::info(
            'Sitemap cache cleared: ' . $handle,
            __METHOD__
        );
    }

    /**
     * Invalidate the sitemap index cache
     */
    public function invalidateSitemapIndexCache()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, SitemapIndexTemplate::SITEMAP_INDEX_CACHE_TAG);
        Craft::info(
            'Sitemap index cache cleared',
            __METHOD__
        );
    }
}
