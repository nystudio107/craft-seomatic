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
use nystudio107\seomatic\models\EditableTemplate;
use nystudio107\seomatic\models\FrontendTemplateContainer;

use Craft;
use craft\base\Component;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;

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

    const FRONTENDTEMPLATES_CONTAINER = Seomatic::SEOMATIC_HANDLE . EditableTemplate::TEMPLATE_TYPE;

    const HUMANS_TXT_HANDLE = 'humans';
    const ROBOTS_TXT_HANDLE = 'robots';

    const GLOBAL_FRONTENDTEMPLATE_CACHE_TAG = 'seomatic_frontendtemplate';
    const FRONTENDTEMPLATE_CACHE_TAG = 'seomatic_frontendtemplate_';

    const CACHE_KEY = 'seomatic_frontendtemplate_';

    const IGNORE_DB_ATTRIBUTES = [
        'id',
        'dateCreated',
        'dateUpdated',
        'uid',
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @var FrontendTemplateContainer
     */
    protected $frontendTemplateContainer;

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
     * Load the frontend template containers
     *
     * @param int|null $siteId
     */
    public function loadFrontendTemplateContainers(int $siteId = null)
    {
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id ?? 1;
        }
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle === null) {
            return;
        }
        $this->frontendTemplateContainer = $metaBundle->frontendTemplatesContainer;
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
                    $this->frontendTemplateRouteRules()
                );
            }
        );
    }

    /**
     * @return array
     */
    public function frontendTemplateRouteRules(): array
    {
        $rules = [];
        foreach ($this->frontendTemplateContainer->data as $frontendTemplate) {
            if ($frontendTemplate->include) {
                /** @var $frontendTemplate FrontendTemplate */
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
     * @param array  $params
     *
     * @return string
     */
    public function renderTemplate(string $template, array $params = []): string
    {
        $dependency = new TagDependency([
            'tags' => [
                $this::GLOBAL_FRONTENDTEMPLATE_CACHE_TAG,
                $this::FRONTENDTEMPLATE_CACHE_TAG . $template,
            ],
        ]);
        $cache = Craft::$app->getCache();
        $html = $cache->getOrSet(
            $this::CACHE_KEY . $template,
            function () use ($template, $params) {
                Craft::info(
                    'Frontend template cache miss: ' . $template,
                    __METHOD__
                );
                $html = '';
                if (!empty($this->frontendTemplateContainer->data[$template])) {
                    /** @var $frontendTemplate FrontendTemplate */
                    $frontendTemplate = $this->frontendTemplateContainer->data[$template];
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
        /** @var  $frontendTemplate EditableTemplate */
        foreach ($this->frontendTemplateContainer->data as $frontendTemplate) {
            if ($key === $frontendTemplate->handle) {
                return $frontendTemplate;
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
        TagDependency::invalidate($cache, $this::GLOBAL_FRONTENDTEMPLATE_CACHE_TAG);
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
        TagDependency::invalidate($cache, $this::FRONTENDTEMPLATE_CACHE_TAG . $template);
        Craft::info(
            'Frontend template cache cleared: ' . $template,
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================
}
