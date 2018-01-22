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

    const FRONTENDTEMPLATES_CONTAINER = Seomatic::SEOMATIC_HANDLE.EditableTemplate::TEMPLATE_TYPE;

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
     * @param int|null $siteId
     */
    public function loadFrontendTemplateContainers(int $siteId = null)
    {
        if (!$siteId) {
            $siteId = Craft::$app->getSites()->currentSite->id;
        }
        /** @var FrontendTemplateContainer $container */
        $container = FrontendTemplateContainer::create();
        // Load in all of the frontend templates
        $frontendTemplates = $this->frontendTemplates($siteId);
        foreach ($frontendTemplates as $frontendTemplate) {
            $container->addData(
                $frontendTemplate,
                $frontendTemplate->handle
            );
        }
        $this->frontendTemplateContainers = $container;
        // Handler: UrlManager::EVENT_REGISTER_SITE_URL_RULES
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                Craft::trace(
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
     * @param int    $siteId
     *
     * @return null|FrontendTemplate
     */
    public function frontendTemplateByHandle(string $handle, int $siteId)
    {
        $frontendTemplate = null;
        $frontendTemplateArray = (new Query())
            ->from(['{{%seomatic_frontendtemplates}}'])
            ->where([
                'handle' => $handle,
                'siteId' => $siteId,
            ])
            ->one();
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
     * @param int $siteId
     *
     * @return array
     */
    public function frontendTemplates(int $siteId): array
    {
        $frontendTemplates = [];
        $frontendTemplateArrays = (new Query())
            ->from(['{{%seomatic_frontendtemplates}}'])
            ->where([
                'siteId' => $siteId,
            ])
            ->all();
        if (!empty($frontendTemplateArrays)) {
            /** @var  $frontendTemplateArrays EditableTemplate */
            foreach ($frontendTemplateArrays as $frontendTemplateArray) {
                $frontendTemplateArray = array_diff_key($frontendTemplateArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
                /** @var EditableTemplate $frontendTemplate */
                $frontendTemplate = EditableTemplate::create($frontendTemplateArray);
                $this->syncTemplateWithConfig($frontendTemplate);
                if ($frontendTemplate) {
                    $frontendTemplates[] = $frontendTemplate;
                }
            }
        } else {
            // If it doesn't exist, create it
            $this->createFrontendTemplatesForSite($siteId);
        }

        return $frontendTemplates;
    }

    /**
     * Create the default frontend templates
     *
     * @param array $baseConfig
     */
    public function createFrontendTemplates($baseConfig = [])
    {
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var EditableTemplate $frontendTemplate */
        foreach ($sites as $site) {
            $this->createFrontendTemplatesForSite($site->id, $baseConfig);
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
                $this::FRONTENDTEMPLATE_CACHE_TAG.$template,
            ],
        ]);
        $cache = Craft::$app->getCache();
        $html = $cache->getOrSet(
            $this::CACHE_KEY.$template,
            function () use ($template, $params) {
                Craft::info(
                    'Frontend template cache miss: '.$template,
                    __METHOD__
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
        TagDependency::invalidate($cache, $this::FRONTENDTEMPLATE_CACHE_TAG.$template);
        Craft::info(
            'Frontend template cache cleared: '.$template,
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param int   $siteId
     * @param array $baseConfig
     */
    protected function createFrontendTemplatesForSite(int $siteId, $baseConfig = [])
    {
        // Create a new FrontendTemplatesContainer with propagated defaults
        $config = array_merge(
            ConfigHelper::getConfigFromFile('frontendtemplates/Bundle'),
            []
        );
        // Save each container out as a record
        /** @var FrontendTemplateContainer $frontendTemplateContainer */
        $frontendTemplateContainer = FrontendTemplateContainer::create(ArrayHelper::merge(
            $baseConfig,
            $config
        ));

        /** @var EditableTemplate $frontendTemplate */
        foreach ($frontendTemplateContainer->data as $frontendTemplate) {
            $frontendTemplate->siteId = $siteId;
            $this->createFrontendTemplate($frontendTemplate);
        }
    }

    /**
     * Synchronize the passed in $container with the seomatic-config files if
     * there is a newer version of the EditableTemplate containerVersion
     * in the config file
     *
     * @param EditableTemplate $template
     */
    protected function syncTemplateWithConfig(EditableTemplate &$template)
    {
        $config = array_merge(
            ConfigHelper::getConfigFromFile('frontendtemplates/Bundle'),
            []
        );
        // If the config file has a newer version than the $metaBundleArray, merge them
        if (!empty($config) && !empty($config[$template->handle])) {
            $templateConfig = $config[$template->handle];
            if (version_compare($templateConfig['templateVersion'], $template->templateVersion, '>')) {
                $template->setAttributes($templateConfig);
                // Create a new EditableTemplate
                $this->createFrontendTemplate(
                    $template
                );
            }
        }
    }

    /**
     * @param EditableTemplate $template
     */
    protected function createFrontendTemplate(EditableTemplate &$template)
    {
        // Save it out to a record
        $frontendTemplateRecord = FrontendTemplateRecord::findOne([
            'handle' => $template->handle,
            'siteId' => $template->siteId,
        ]);
        if (!$frontendTemplateRecord) {
            $frontendTemplateRecord = new FrontendTemplateRecord($template->getAttributes());
        }
        $frontendTemplateRecord->save();
    }
}
