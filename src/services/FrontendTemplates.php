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
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\models\EditableTemplate;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\records\FrontendTemplate as FrontendTemplateRecord;

use Craft;
use craft\base\Component;
use craft\db\Query;
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

    const FRONTENDTEMPLATE_CACHE_DURATION = null;
    const DEVMODE_FRONTENDTEMPLATE_CACHE_DURATION = 30;
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
    protected $frontendTemplateContainers = [];

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
     */
    public function loadFrontendTemplateContainers()
    {
        $this->frontendTemplateContainers = FrontendTemplateContainer::create();
        // Load in all of the frontend templates
        $frontendTemplates = $this->getFrontendTemplates();
        foreach ($frontendTemplates as $frontendTemplate) {
            $this->frontendTemplateContainers->addData(
                $frontendTemplate,
                $frontendTemplate->handle
            );
        }
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
        foreach ($this->frontendTemplateContainers->data as $frontendTemplate) {
            /** @var $frontendTemplate FrontendTemplate */
            $rules = array_merge(
                $rules,
                $frontendTemplate->routeRules()
            );
        }

        return $rules;
    }

    /**
     * Get an individual frontend template by handle
     *
     * @param string $handle
     *
     * @return null|FrontendTemplate
     */
    public function getFrontendTemplateByHandle(string $handle)
    {
        $frontendTemplate = null;
        $frontendTemplateArray = (new Query())
            ->from(['{{%seomatic_frontendtemplates}}'])
            ->where([
                'handle' => $handle,
            ])
            ->one();
        Craft::dd($frontendTemplateArray);
        if (!empty($frontendTemplateArray)) {
            $frontendTemplateArray = array_diff_key($frontendTemplateArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $frontendTemplate = EditableTemplate::create(
                $frontendTemplateArray
            );
        }

        return $frontendTemplate;
    }

    /**
     * Get all of the frontend templates
     *
     * @return array
     */
    public function getFrontendTemplates(): array
    {
        $frontendTemplates = [];
        $frontendTemplateArrays = (new Query())
            ->from(['{{%seomatic_frontendtemplates}}'])
            ->all();
        /** @var  $frontendTemplateArrays EditableTemplate */
        foreach ($frontendTemplateArrays as $frontendTemplateArray) {
            $frontendTemplateArray = array_diff_key($frontendTemplateArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $frontendTemplate = EditableTemplate::create($frontendTemplateArray);
            if ($frontendTemplate) {
                $frontendTemplates[] = $frontendTemplate;
            }
        }

        return $frontendTemplates;
    }

    /**
     * Create the default frontend templates
     */
    public function createFrontendTemplates()
    {
        // Create a new FrontendTemplatesContainer with propagated defaults
        $frontendTemplateDefaults = array_merge(
            ConfigHelper::getConfigFromFile('FrontendTemplatesContainer', 'defaults'),
            []
        );
        // Save each container out as a record
        $frontendTemplateContainer = FrontendTemplateContainer::create($frontendTemplateDefaults);
        /** @var  $frontendTemplate FrontendTemplate */
        foreach ($frontendTemplateContainer->data as $frontendTemplate) {
            // Save it out to a record
            $frontendTemplateRecord = new FrontendTemplateRecord($frontendTemplate->getAttributes());
            $frontendTemplateRecord->save();
        }
    }

    /**
     * @param string $template
     * @param array  $params
     *
     * @return string
     */
    public function renderTemplate(string $template, $params = []): string
    {
        $duration = Seomatic::$devMode
            ? $this::DEVMODE_FRONTENDTEMPLATE_CACHE_DURATION
            : $this::FRONTENDTEMPLATE_CACHE_DURATION;
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
                    'seomatic'
                );
                $html = '';
                if (!empty($this->frontendTemplateContainers->data[$template])) {
                    /** @var $frontendTemplate FrontendTemplate */
                    $frontendTemplate = $this->frontendTemplateContainers->data[$template];
                    $html = $frontendTemplate->render($params);
                }

                return $html;
            },
            $duration,
            $dependency
        );

        return $html;
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
            'seomatic'
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
            'seomatic'
        );
    }
}
