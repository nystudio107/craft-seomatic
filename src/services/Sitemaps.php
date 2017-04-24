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
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;

use Craft;
use craft\base\Component;
use craft\events\RegisterUrlRulesEvent;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;

use yii\base\Event;
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

    const SEOMATIC_SITEMAPINDEX_CONTAINER = Seomatic::SEOMATIC_HANDLE . SitemapIndexTemplate::TEMPLATE_TYPE;

    const SEOMATIC_SITEMAP_CONTAINER = Seomatic::SEOMATIC_HANDLE . SitemapTemplate::TEMPLATE_TYPE;

    const SEARCH_ENGINE_SUBMISSION_URLS = [
        'google' => 'http://www.google.com/webmasters/sitemaps/ping?sitemap=',
        'bing'   => 'http://www.bing.com/webmaster/ping.aspx?siteMap=',
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
        $this->sitemapTemplateContainer = FrontendTemplateContainer::create();
        // The Sitemap Index
        $sitemapIndexTemplate = SitemapIndexTemplate::create();
        $this->sitemapTemplateContainer->addData($sitemapIndexTemplate, self::SEOMATIC_SITEMAPINDEX_CONTAINER);
        // A generic sitemap
        $sitemapTemplate = SitemapTemplate::create();
        $this->sitemapTemplateContainer->addData($sitemapTemplate, self::SEOMATIC_SITEMAP_CONTAINER);

        // Handler: UrlManager::EVENT_REGISTER_SITE_URL_RULES
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                Craft::trace(
                    'UrlManager::EVENT_REGISTER_SITE_URL_RULES',
                    'seomatic'
                );
                // Register our sitemap routes
                $event->rules = array_merge(
                    $event->rules,
                    $this->sitemapRouteRules()
                );
            }
        );
    }

    /**
     * @return array
     */
    public function sitemapRouteRules(): array
    {
        $rules = [];
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
    public function renderTemplate(string $template, $params = []): string
    {
        $html = '';
        if (!empty($this->sitemapTemplateContainer->data[$template])) {
            /** @var $sitemapTemplate FrontendTemplate */
            $sitemapTemplate = $this->sitemapTemplateContainer->data[$template];
            $html = $sitemapTemplate->render($params);
        }

        return $html;
    }

    /**
     * Submit the sitemap index to the search engine services
     */
    public function submitSitemapIndex(): void
    {
        // Submit the sitemap to each search engine
        foreach ($this::SEARCH_ENGINE_SUBMISSION_URLS as &$url) {
            $submissionUrl = $url . UrlHelper::siteUrl('sitemap.xml');
            // create new guzzle client
            $guzzleClient = Craft::createGuzzleClient(['timeout' => 120, 'connect_timeout' => 120]);
            // Submit the sitemap index to each search engine
            try {
                $guzzleClient->post($submissionUrl);
                Craft::info(
                    'Sitemap index submitted to: ' . $submissionUrl,
                    'seomatic'
                );
            } catch (\Exception $e) {
                Craft::error(
                    'Error submitting sitemap index to: ' . $submissionUrl . ' - ' . $e->getMessage(),
                    'seomatic'
                );
            }
        }
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
            'seomatic'
        );
    }

    /**
     * Invalidate the sitemap cache passed in $handle
     *
     * @param string $handle
     * @param int    $siteId
     */
    public function invalidateSitemapCache(string $handle, int $siteId)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, SitemapTemplate::SITEMAP_CACHE_TAG . $handle . $siteId);
        Craft::info(
            'Sitemap cache cleared: ' . $handle,
            'seomatic'
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
            'seomatic'
        );
    }
}
