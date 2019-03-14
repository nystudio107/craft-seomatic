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

use nystudio107\seomatic\jobs\GenerateSitemap;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\models\SitemapCustomTemplate;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\errors\SiteNotFoundException;
use craft\events\RegisterUrlRulesEvent;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;

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

    const SEOMATIC_SITEMAPINDEX_CONTAINER = Seomatic::SEOMATIC_HANDLE.SitemapIndexTemplate::TEMPLATE_TYPE;

    const SEOMATIC_SITEMAP_CONTAINER = Seomatic::SEOMATIC_HANDLE.SitemapTemplate::TEMPLATE_TYPE;

    const SEOMATIC_SITEMAPCUSTOM_CONTAINER = Seomatic::SEOMATIC_HANDLE.SitemapCustomTemplate::TEMPLATE_TYPE;

    const SEARCH_ENGINE_SUBMISSION_URLS = [
        'google' => 'http://www.google.com/webmasters/sitemaps/ping?sitemap=',
        'bing' => 'http://www.bing.com/webmaster/ping.aspx?siteMap=',
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
     *
     */
    public function init()
    {
        parent::init();
    }

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
                function (RegisterUrlRulesEvent $event) {
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
        $route =
            Seomatic::$plugin->handle
            .'/'
            .'sitemap'
            .'/'
            .'sitemap-index';
        $rules['sitemap.xml'] = [
            'route' => $route,
            'defaults' => ['groupId' => $groupId],
        ];
        foreach ($this->sitemapTemplateContainer->data as $sitemapTemplate) {
            /** @var $sitemapTemplate FrontendTemplate */
            $rules = array_merge(
                $rules,
                $sitemapTemplate->routeRules()
            );
        }

        return $rules;
    }

    /**
     * @param string $template
     * @param array  $params
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
        if (Seomatic::$settings->sitemapsEnabled && Seomatic::$settings->environment === 'live') {
            // Submit the sitemap to each search engine
            $searchEngineUrls = $this::SEARCH_ENGINE_SUBMISSION_URLS;
            foreach ($searchEngineUrls as &$url) {
                $groups = Craft::$app->getSites()->getAllGroups();
                foreach ($groups as $group) {
                    $siteId = $group->getSiteIds()[0];
                    $sitemapIndexUrl = $this->sitemapIndexUrlForSiteId($siteId);
                    if (!empty($sitemapIndexUrl)) {
                        $submissionUrl = $url.$sitemapIndexUrl;
                        // create new guzzle client
                        $guzzleClient = Craft::createGuzzleClient(['timeout' => 120, 'connect_timeout' => 120]);
                        // Submit the sitemap index to each search engine
                        try {
                            $guzzleClient->post($submissionUrl);
                            Craft::info(
                                'Sitemap index submitted to: '.$submissionUrl,
                                __METHOD__
                            );
                        } catch (\Exception $e) {
                            Craft::error(
                                'Error submitting sitemap index to: '.$submissionUrl.' - '.$e->getMessage(),
                                __METHOD__
                            );
                        }
                    }
                }
            }
        }
    }

    /**
     * Submit the bundle sitemap to the search engine services
     *
     * @param ElementInterface $element
     */
    public function submitSitemapForElement(ElementInterface $element)
    {
        if (Seomatic::$settings->sitemapsEnabled && Seomatic::$settings->environment === 'live') {
            /** @var Element $element */
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId)
                = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
            // Submit the sitemap to each search engine
            $searchEngineUrls = $this::SEARCH_ENGINE_SUBMISSION_URLS;
            foreach ($searchEngineUrls as &$url) {
                $sitemapUrl = $this->sitemapUrlForBundle($sourceBundleType, $sourceHandle, $sourceSiteId);
                if (!empty($sitemapUrl)) {
                    $submissionUrl = $url.$sitemapUrl;
                    // create new guzzle client
                    $guzzleClient = Craft::createGuzzleClient(['timeout' => 120, 'connect_timeout' => 120]);
                    // Submit the sitemap index to each search engine
                    try {
                        $guzzleClient->post($submissionUrl);
                        Craft::info(
                            'Sitemap index submitted to: '.$submissionUrl,
                            __METHOD__
                        );
                    } catch (\Exception $e) {
                        Craft::error(
                            'Error submitting sitemap index to: '.$submissionUrl.' - '.$e->getMessage(),
                            __METHOD__
                        );
                    }
                }
            }
        }
    }

    /**
     * Submit the bundle sitemap to the search engine services
     *
     * @param int $siteId
     */
    public function submitCustomSitemap(int $siteId)
    {
        if (Seomatic::$settings->sitemapsEnabled && Seomatic::$settings->environment === 'live') {
            // Submit the sitemap to each search engine
            $searchEngineUrls = $this::SEARCH_ENGINE_SUBMISSION_URLS;
            foreach ($searchEngineUrls as &$url) {
                $sitemapUrl = $this->sitemapCustomUrlForSiteId($siteId);
                if (!empty($sitemapUrl)) {
                    $submissionUrl = $url.$sitemapUrl;
                    // create new guzzle client
                    $guzzleClient = Craft::createGuzzleClient(['timeout' => 120, 'connect_timeout' => 120]);
                    // Submit the sitemap index to each search engine
                    try {
                        $guzzleClient->post($submissionUrl);
                        Craft::info(
                            'Sitemap Custom submitted to: '.$submissionUrl,
                            __METHOD__
                        );
                    } catch (\Exception $e) {
                        Craft::error(
                            'Error submitting sitemap index to: '.$submissionUrl.' - '.$e->getMessage(),
                            __METHOD__
                        );
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
                    .$site->groupId
                    .'-sitemap.xml',
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
                    .$site->groupId
                    .'-'
                    .SitemapCustomTemplate::CUSTOM_SCOPE
                    .'-'
                    .SitemapCustomTemplate::CUSTOM_HANDLE
                    .'-'
                    .$siteId
                    .'-sitemap.xml',
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
     * @param string   $sourceBundleType
     * @param string   $sourceHandle
     * @param int|null $siteId
     *
     * @return string
     */
    public function sitemapUrlForBundle(string $sourceBundleType, string $sourceHandle, int $siteId = null): string
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
        if ($site && $metaBundle) {
            try {
                $url = UrlHelper::siteUrl(
                    '/sitemaps-'
                    .$site->groupId
                    .'-'
                    .$metaBundle->sourceBundleType
                    .'-'
                    .$metaBundle->sourceHandle
                    .'-'
                    .$metaBundle->sourceSiteId
                    .'-sitemap.xml',
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
     * Invalidate all of the sitemap caches
     */
    public function invalidateCaches()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::GLOBAL_SITEMAP_CACHE_TAG);
        Craft::info(
            'All sitemap caches cleared',
            __METHOD__
        );
    }

    /**
     * Invalidate the sitemap cache passed in $handle
     *
     * @param string $handle
     * @param int    $siteId
     * @param string $type
     */
    public function invalidateSitemapCache(string $handle, int $siteId, string $type)
    {
        $cache = Craft::$app->getCache();
        // If the queue should be run automatically, do it now
        TagDependency::invalidate($cache, SitemapTemplate::SITEMAP_CACHE_TAG.$handle.$siteId);
        Craft::info(
            'Sitemap cache cleared: '.$handle,
            __METHOD__
        );
        $sites = Craft::$app->getSites();
        if ($siteId === null) {
            $siteId = $sites->currentSite->id ?? 1;
        }
        $site = $sites->getSiteById($siteId);
        // Start up a job to generate the sitemap
        $queue = Craft::$app->getQueue();
        $jobId = $queue->push(new GenerateSitemap([
            'groupId' => $site->groupId,
            'type' => $type,
            'handle' => $handle,
            'siteId' => $siteId,
        ]));
        Craft::debug(
            Craft::t(
                'seomatic',
                'Started GenerateSitemap queue job id: {jobId}',
                [
                    'jobId' => $jobId,
                ]
            ),
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
