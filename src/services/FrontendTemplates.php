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
use craft\errors\SiteNotFoundException;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\EditableTemplate;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;
use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class FrontendTemplates extends Component
{
    // Constants
    // =========================================================================

    public const FRONTENDTEMPLATES_CONTAINER = Seomatic::SEOMATIC_HANDLE . EditableTemplate::TEMPLATE_TYPE;

    public const HUMANS_TXT_HANDLE = 'humans';
    public const ROBOTS_TXT_HANDLE = 'robots';
    public const ADS_TXT_HANDLE = 'ads';
    public const SECURITY_TXT_HANDLE = 'security';

    public const GLOBAL_FRONTENDTEMPLATE_CACHE_TAG = 'seomatic_frontendtemplate';
    public const FRONTENDTEMPLATE_CACHE_TAG = 'seomatic_frontendtemplate_';

    public const CACHE_KEY = 'seomatic_frontendtemplate_';

    public const IGNORE_DB_ATTRIBUTES = [
        'id',
        'dateCreated',
        'dateUpdated',
        'uid',
    ];

    // Public Properties
    // =========================================================================

    /**
     * @var FrontendTemplateContainer|null
     */
    public $frontendTemplateContainer;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
    }

    /**
     * Load the frontend template containers
     *
     * @param int|null $siteId
     */
    public function loadFrontendTemplateContainers(int $siteId = null)
    {
        $sites = Craft::$app->getSites();
        if ($siteId === null) {
            $siteId = $sites->getCurrentSite()->id ?? 1;
        }
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId, false);
        if ($metaBundle === null) {
            return;
        }
        // Don't register any frontend templates if this site has no Base URL or a sub-directory as part of the URL
        $shouldRegister = false;
        try {
            $baseUrl = $sites->getCurrentSite()->getBaseUrl(true);
        } catch (SiteNotFoundException $e) {
            $baseUrl = null;
        }
        if ($baseUrl !== null && !UrlHelper::urlHasSubDir($baseUrl)) {
            $shouldRegister = true;
        }
        // See if the path for this request is the domain root, and the request has a file extension
        $request = Craft::$app->getRequest();
        if ($request->isConsoleRequest) {
            return;
        }
        $fullPath = $request->getFullPath();
        if ((strpos($fullPath, '/') === false) && (strpos($fullPath, '.') !== false)) {
            $shouldRegister = true;
        }
        // If this is a headless request, register them
        if (Seomatic::$headlessRequest) {
            $shouldRegister = true;
        }
        // Register the frontend template only if we pass the various tests
        if ($shouldRegister) {
            $this->frontendTemplateContainer = $metaBundle->frontendTemplatesContainer;
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
                        $this->frontendTemplateRouteRules()
                    );
                }
            );
        }
    }

    /**
     * @return array
     */
    public function frontendTemplateRouteRules(): array
    {
        $rules = [];
        foreach ($this->frontendTemplateContainer->data as $frontendTemplate) {
            if ($frontendTemplate->include) {
                $rules = array_merge(
                    $rules,
                    $frontendTemplate->routeRules()
                );
            }
        }

        return $rules;
    }

    /**
     * @param string $template
     * @param array $params
     *
     * @return string
     */
    public function renderTemplate(string $template, array $params = []): string
    {
        // Make sure the cache is on a per-site basis
        $siteId = 1;
        try {
            $currentSite = Craft::$app->getSites()->getCurrentSite();
        } catch (SiteNotFoundException $e) {
            $currentSite = null;
        }
        if ($currentSite) {
            $siteId = $currentSite->id;
        }
        $dependency = new TagDependency([
            'tags' => [
                self::GLOBAL_FRONTENDTEMPLATE_CACHE_TAG,
                self::FRONTENDTEMPLATE_CACHE_TAG . $template,
                self::FRONTENDTEMPLATE_CACHE_TAG . $template . $siteId,
            ],
        ]);
        $cache = Craft::$app->getCache();
        $html = $cache->getOrSet(
            self::CACHE_KEY . $template . $siteId,
            function() use ($template, $params) {
                Craft::info(
                    'Frontend template cache miss: ' . $template,
                    __METHOD__
                );
                $html = '';
                if (!empty($this->frontendTemplateContainer->data[$template])) {
                    /** @var EditableTemplate $frontendTemplate */
                    $frontendTemplate = $this->frontendTemplateContainer->data[$template];
                    // Special-case for the Robots.text template, to upgrade it
                    if ($template === FrontendTemplates::ROBOTS_TXT_HANDLE) {
                        $frontendTemplate->templateString = str_replace(
                            'Sitemap: {{ seomatic.helper.sitemapIndexForSiteId() }}',
                            '{{ seomatic.helper.sitemapIndex() }}',
                            $frontendTemplate->templateString
                        );
                    }
                    $html = $frontendTemplate->render($params);
                }

                return $html;
            },
            Seomatic::$cacheDuration,
            $dependency
        );

        return $html;
    }

    /**
     * Return a EditableTemplate object by $key from container $type
     *
     * @param string $key
     * @param string $type
     *
     * @return null|EditableTemplate
     */
    public function getFrontendTemplateByKey(string $key, string $type = '')
    {
        $frontendTemplate = null;
        if (!empty($this->frontendTemplateContainer) && !empty($this->frontendTemplateContainer->data)) {
            foreach ($this->frontendTemplateContainer->data as $frontendTemplate) {
                if ($key === $frontendTemplate->handle) {
                    return $frontendTemplate;
                }
            }
        }

        return $frontendTemplate;
    }

    /**
     * Invalidate all of the frontend template caches
     */
    public function invalidateCaches()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::GLOBAL_FRONTENDTEMPLATE_CACHE_TAG);
        Craft::info(
            'All frontend template caches cleared',
            __METHOD__
        );
    }

    /**
     * Invalidate a frontend template cache
     *
     * @param string $template
     */
    public function invalidateFrontendTemplateCache(string $template)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::FRONTENDTEMPLATE_CACHE_TAG . $template);
        Craft::info(
            'Frontend template cache cleared: ' . $template,
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================
}
