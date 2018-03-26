<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticChartAsset;
use nystudio107\recipe\helpers\Json;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\Field as FieldHelper;

use Craft;
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;
use craft\helpers\DateTimeHelper;
use craft\helpers\UrlHelper;
use craft\models\Site;
use craft\web\Controller;

use nystudio107\seomatic\services\FrontendTemplates;
use nystudio107\seomatic\services\MetaBundles;
use yii\base\InvalidConfigException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SettingsController extends Controller
{
    // Constants
    // =========================================================================

    const DOCUMENTATION_URL = 'https://github.com/nystudio107/craft-seomatic/wiki';

    const PULL_TEXT_FIELDS = [
        ['fieldName' => 'seoTitle', 'seoField' => 'seoTitle'],
        ['fieldName' => 'siteNamePosition', 'seoField' => 'siteNamePosition'],
        ['fieldName' => 'seoDescription', 'seoField' => 'seoDescription'],
        ['fieldName' => 'seoKeywords', 'seoField' => 'seoKeywords'],
        ['fieldName' => 'seoImageDescription', 'seoField' => 'seoImageDescription'],
        ['fieldName' => 'ogTitle', 'seoField' => 'seoTitle'],
        ['fieldName' => 'ogSiteNamePosition', 'seoField' => 'siteNamePosition'],
        ['fieldName' => 'ogDescription', 'seoField' => 'seoDescription'],
        ['fieldName' => 'ogImageDescription', 'seoField' => 'seoImageDescription'],
        ['fieldName' => 'twitterTitle', 'seoField' => 'seoTitle'],
        ['fieldName' => 'twitterSiteNamePosition', 'seoField' => 'siteNamePosition'],
        ['fieldName' => 'twitterCreator', 'seoField' => 'twitterHandle'],
        ['fieldName' => 'twitterDescription', 'seoField' => 'seoDescription'],
        ['fieldName' => 'twitterImageDescription', 'seoField' => 'seoImageDescription'],
    ];

    const PULL_ASSET_FIELDS = [
        ['fieldName' => 'seoImage', 'seoField' => 'seoImage', 'transformName' => 'base'],
        ['fieldName' => 'ogImage', 'seoField' => 'seoImage', 'transformName' => 'facebook'],
        ['fieldName' => 'twitterImage', 'seoField' => 'seoImage', 'transformName' => 'twitter'],
    ];

    const SETUP_GRADES = [
        ['id' => 'data1', 'name' => 'A', 'color' => '#008002'],
        ['id' => 'data2', 'name' => 'B', 'color' => '#9ACD31'],
        ['id' => 'data4', 'name' => 'C', 'color' => '#FFA500'],
        ['id' => 'data5', 'name' => 'D', 'color' => '#8B0100'],
    ];

    const SEO_SETUP_FIELDS = [
        'seoTitle',
        'seoDescription',
        'seoKeywords',
        'seoImage',
        'seoImageDescription',
    ];

    const SITE_SETUP_FIELDS = [
        'siteName',
        'twitterHandle',
        'facebookProfileId',
    ];

    const SCHEMA_TYPES = [
        'siteSpecificType',
        'siteSubType',
        'siteType'
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
    ];

    // Public Methods
    // =========================================================================

    /**
     * Dashboard display
     *
     * @param string|null $siteHandle
     * @param bool        $showWelcome
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionDashboard(string $siteHandle = null, bool $showWelcome = false): Response
    {
        $variables = [];
        // Get the site to edit
        $siteId = $this->getSiteIdFromHandle($siteHandle);
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Dashboard');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
            Seomatic::$view->registerAssetBundle(SeomaticChartAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Enabled sites
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'dashboard';

        // Basic variables
        $variables['fullPageForm'] = false;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/dashboard'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'dashboard';
        $variables['showWelcome'] = $showWelcome;
        // Calulate the setup grades
        $variables['contentSetupStats'] = [];
        $variables['setupGrades'] = self::SETUP_GRADES;
        $numFields = count(self::SEO_SETUP_FIELDS);
        $numGrades = count(self::SETUP_GRADES);
        while ($numGrades--) {
            $variables['contentSetupStats'][] = 0;
        }
        $numGrades = count(self::SETUP_GRADES);
        // Content SEO grades
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
        /** @var MetaBundle $metaBundle */
        foreach ($variables['metaBundles'] as $metaBundle) {
            $stat = 0;
            foreach (self::SEO_SETUP_FIELDS as $setupField) {
                $stat += intval(!empty($metaBundle->metaGlobalVars[$setupField]));
            }
            $stat = round($numGrades - (($stat * $numGrades) / $numFields));
            if ($stat >= $numGrades) {
                $stat = $numGrades - 1;
            }
            $variables['contentSetupStats'][$stat]++;
        }
        // Global SEO grades
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle(intval($siteId));
        $stat = 0;
        foreach (self::SEO_SETUP_FIELDS as $setupField) {
            $stat += intval(!empty($metaBundle->metaGlobalVars[$setupField]));
        }
        $stat = round(($stat / $numFields) * 100);
        $variables['globalSetupStat'] = $stat;
        // Site Settings grades
        $numFields = count(self::SITE_SETUP_FIELDS);
        $stat = 0;
        foreach (self::SITE_SETUP_FIELDS as $setupField) {
            $stat += intval(!empty($metaBundle->metaSiteVars[$setupField]));
        }
        $stat = round(($stat / $numFields) * 100);
        $variables['siteSetupStat'] = $stat;

        // Render the template
        return $this->renderTemplate('seomatic/dashboard/index', $variables);
    }

    /**
     * Global settings
     *
     * @param string      $subSection
     * @param string|null $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionGlobal(string $subSection = 'general', string $siteHandle = null): Response
    {
        $variables = [];
        $siteId = $this->getSiteIdFromHandle($siteHandle);

        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Global SEO');
        $subSectionTitle = Craft::t('seomatic', ucfirst($subSection));
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['subSectionTitle'] = $subSectionTitle;
        $variables['docTitle'] = $templateTitle.' - '.$subSectionTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/global'),
            ],
            [
                'label' => $subSectionTitle,
                'url'   => UrlHelper::cpUrl('seomatic/global/'.$subSection),
            ],
        ];
        $variables['selectedSubnavItem'] = 'global';
        // Pass in the pull fields
        $this->setGlobalFieldSourceVariables($variables);
        // Enabled sites
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'global'.'/'.$subSection;
        $variables['currentSubSection'] = $subSection;
        // Meta bundle settings
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle(intval($variables['currentSiteId']));
        $variables['globals'] = $metaBundle->metaGlobalVars;
        $variables['sitemap'] = $metaBundle->metaSitemapVars;
        $variables['settings'] = $metaBundle->metaBundleSettings;
        // Template container settings
        $templateContainers = $metaBundle->frontendTemplatesContainer->data;
        $variables['robotsTemplate'] = $templateContainers[FrontendTemplates::ROBOTS_TXT_HANDLE];
        $variables['humansTemplate'] = $templateContainers[FrontendTemplates::HUMANS_TXT_HANDLE];
        // Image selectors
        $bundleSettings = $metaBundle->metaBundleSettings;
        $variables['elementType'] = Asset::class;
        $variables['seoImageElements'] = $this->assetElementsFromIds($bundleSettings->seoImageIds, $siteId);
        $variables['twitterImageElements'] = $this->assetElementsFromIds($bundleSettings->twitterImageIds, $siteId);
        $variables['ogImageElements'] = $this->assetElementsFromIds($bundleSettings->ogImageIds, $siteId);
        // Preview the meta containers
        Seomatic::$plugin->metaContainers->previewMetaContainers(
            MetaBundles::GLOBAL_META_BUNDLE,
            intval($variables['currentSiteId'])
        );

        // Render the template
        return $this->renderTemplate('seomatic/settings/global/'.$subSection, $variables);
    }

    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionSaveGlobal()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $siteId = $request->getParam('siteId');
        $globalsSettings = $request->getParam('globals');
        $bundleSettings = $request->getParam('settings');
        $robotsTemplate = $request->getParam('robotsTemplate');
        $humansTemplate = $request->getParam('humansTemplate');

        // Set the element type in the template
        $elementName = '';

        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            if (is_array($globalsSettings) && is_array($bundleSettings)) {
                $this->parseTextSources($elementName, $globalsSettings, $bundleSettings);
                $this->parseImageSources($elementName, $globalsSettings, $bundleSettings, $siteId);
                $globalsSettings['mainEntityOfPage'] = $this->getSpecificEntityType($globalsSettings);
                $metaBundle->metaGlobalVars->setAttributes($globalsSettings);
                $metaBundle->metaBundleSettings->setAttributes($bundleSettings);
            }
            $templateContainers = $metaBundle->frontendTemplatesContainer->data;
            $robotsContainer = $templateContainers[FrontendTemplates::ROBOTS_TXT_HANDLE];
            if (!empty($robotsContainer) && is_array($robotsTemplate)) {
                $robotsContainer->setAttributes($robotsTemplate);
            }
            $humansContainer = $templateContainers[FrontendTemplates::HUMANS_TXT_HANDLE];
            if (!empty($humansContainer) && is_array($humansTemplate)) {
                $humansContainer->setAttributes($humansTemplate);
            }

            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic global settings saved.'));
        }

        return $this->redirectToPostedUrl();
    }

    /**
     * Content settings
     *
     * @param string|null $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionContent(string $siteHandle = null): Response
    {
        $variables = [];
        // Get the site to edit
        $siteId = $this->getSiteIdFromHandle($siteHandle);

        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Content SEO');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = false;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/content'),
            ],
        ];
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'content';
        $variables['selectedSubnavItem'] = 'content';
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
        // For the grades
        $variables['seoSetupGrades'] = self::SETUP_GRADES;
        $variables['seoSetupFields'] = self::SEO_SETUP_FIELDS;

        // Render the template
        return $this->renderTemplate('seomatic/settings/content/index', $variables);
    }

    /**
     * Global settings
     *
     * @param string      $subSection
     * @param string      $sourceBundleType
     * @param string      $sourceHandle
     * @param string|null $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionEditContent(
        string $subSection,
        string $sourceBundleType,
        string $sourceHandle,
        string $siteHandle = null
    ): Response {
        $variables = [];
        // @TODO: Let people choose an entry/categorygroup/product as the preview
        // Get the site to edit
        $siteId = $this->getSiteIdFromHandle($siteHandle);

        $pluginName = Seomatic::$settings->pluginName;
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Enabled sites
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        // Meta Bundle settings
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            intval($variables['currentSiteId'])
        );
        $variables['globals'] = $metaBundle->metaGlobalVars;
        $variables['sitemap'] = $metaBundle->metaSitemapVars;
        $variables['settings'] = $metaBundle->metaBundleSettings;
        $variables['currentSourceHandle'] = $metaBundle->sourceHandle;
        $variables['currentSourceBundleType'] = $metaBundle->sourceBundleType;
        // Basic variables
        $templateTitle = $metaBundle->sourceName;
        $subSectionTitle = Craft::t('seomatic', ucfirst($subSection));
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['subSectionTitle'] = $subSectionTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => 'Content SEO',
                'url'   => UrlHelper::cpUrl('seomatic/content'),
            ],
            [
                'label' => $metaBundle->sourceName.' · '.$subSectionTitle,
                'url'   => UrlHelper::cpUrl("seomatic/edit-content/${subSection}/${sourceBundleType}/${sourceHandle}"),
            ],
        ];
        $variables['selectedSubnavItem'] = 'content';
        $variables['controllerHandle'] = "edit-content/${subSection}/${sourceBundleType}/${sourceHandle}";
        // Image selectors
        $variables['currentSubSection'] = $subSection;
        $bundleSettings = $metaBundle->metaBundleSettings;
        $variables['elementType'] = Asset::class;
        $variables['seoImageElements'] = $this->assetElementsFromIds($bundleSettings->seoImageIds, $siteId);
        $variables['twitterImageElements'] = $this->assetElementsFromIds($bundleSettings->twitterImageIds, $siteId);
        $variables['ogImageElements'] = $this->assetElementsFromIds($bundleSettings->ogImageIds, $siteId);
        // Pass in the pull fields
        $groupName = "Entry";
        $this->setContentFieldSourceVariables($sourceBundleType, $sourceHandle, $groupName, $variables);
        $uri = $this->uriFromSourceBundle($sourceBundleType, $sourceHandle);
        // Preview the meta containers
        Seomatic::$plugin->metaContainers->previewMetaContainers(
            $uri,
            intval($variables['currentSiteId'])
        );

        // Render the template
        return $this->renderTemplate('seomatic/settings/content/'.$subSection, $variables);
    }


    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionSaveContent()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $sourceBundleType = $request->getParam('sourceBundleType');
        $sourceHandle = $request->getParam('sourceHandle');
        $siteId = $request->getParam('siteId');
        $globalsSettings = $request->getParam('globals');
        $bundleSettings = $request->getParam('settings');
        $sitemapSettings = $request->getParam('sitemap');

        // Set the element type in the template
        switch ($sourceBundleType) {
            case MetaBundles::SECTION_META_BUNDLE:
                $elementName = 'entry';
                break;
            case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                $elementName = 'category';
                break;
            default:
                $elementName = '';
                break;
        }
        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            $siteId
        );
        if ($metaBundle) {
            if (is_array($globalsSettings) && is_array($bundleSettings)) {
                $this->parseTextSources($elementName, $globalsSettings, $bundleSettings);
                $this->parseImageSources($elementName, $globalsSettings, $bundleSettings, $siteId);
                $globalsSettings['mainEntityOfPage'] = $this->getSpecificEntityType($globalsSettings);
                $metaBundle->metaGlobalVars->setAttributes($globalsSettings);
                $metaBundle->metaBundleSettings->setAttributes($bundleSettings);
            }
            if (is_array($sitemapSettings)) {
                $metaBundle->metaSitemapVars->setAttributes($sitemapSettings);
            }

            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic content settings saved.'));
        }

        return $this->redirectToPostedUrl();
    }

    /**
     * Site settings
     *
     * @param string $subSection
     * @param string $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionSite(string $subSection = 'identity', string $siteHandle = null): Response
    {
        $variables = [];
        // Get the site to edit
        $siteId = $this->getSiteIdFromHandle($siteHandle);

        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Site Settings');
        $subSectionSuffix = "";
        if ($subSection == "social") {
            $subSectionSuffix = " Media";
        }
        $subSectionTitle = Craft::t('seomatic', ucfirst($subSection).$subSectionSuffix);
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['subSectionTitle'] = $subSectionTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/site'),
            ],
            [
                'label' => $subSectionTitle,
                'url'   => UrlHelper::cpUrl('seomatic/site/'.$subSection),
            ],
        ];
        $variables['selectedSubnavItem'] = 'site';
        $variables['currentSubSection'] = $subSection;

        // Enabled sites
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'site'.'/'.$subSection;

        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle(intval($variables['currentSiteId']));
        $variables['site'] = $metaBundle->metaSiteVars;
        $variables['identityImageElements'] =
            $this->assetElementsFromIds($variables['site']->identity->genericImageIds, $siteId);
        $variables['creatorImageElements'] =
            $this->assetElementsFromIds($variables['site']->creator->genericImageIds, $siteId);
        $variables['elementType'] = Asset::class;

        // Render the template
        return $this->renderTemplate('seomatic/settings/site/'.$subSection, $variables);
    }

    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionSaveSite()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $siteId = $request->getParam('siteId');
        $siteSettings = $request->getParam('site');

        // Make sure the twitter handle isn't prefixed with an @
        if (!empty($siteSettings['twitterHandle'])) {
            $siteSettings['twitterHandle'] = ltrim($siteSettings['twitterHandle'], '@');
        }
        // Make sure the sameAsLinks are indexed by the handle
        if (!empty($siteSettings['sameAsLinks'])) {
            $siteSettings['sameAsLinks'] = ArrayHelper::index($siteSettings['sameAsLinks'], 'handle');
        }
        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            if (is_array($siteSettings)) {
                if (!empty($siteSettings['identity'])) {
                    $settings = $siteSettings['identity'];
                    $this->prepEntitySettings($settings);
                    $metaBundle->metaSiteVars->identity->setAttributes($settings);
                    $siteSettings['identity'] = $metaBundle->metaSiteVars->identity;
                }
                if (!empty($siteSettings['creator'])) {
                    $settings = $siteSettings['creator'];
                    $this->prepEntitySettings($settings);
                    $metaBundle->metaSiteVars->creator->setAttributes($settings);
                    $siteSettings['creator'] = $metaBundle->metaSiteVars->creator;
                }
                $metaBundle->metaSiteVars->setAttributes($siteSettings);
            }
            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic site settings saved.'));
        }

        return $this->redirectToPostedUrl();
    }

    /**
     * Plugin settings
     *
     * @return Response The rendered result
     */
    public function actionPlugin(): Response
    {
        $variables = [];
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Plugin Settings');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/settings'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'plugin';
        $variables['settings'] = Seomatic::$settings;

        // Render the template
        return $this->renderTemplate('seomatic/settings/plugin/_edit', $variables);
    }


    /**
     * Tracking settings
     *
     * @param string $subSection
     * @param string $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionTracking(string $subSection = 'googleAnalytics', string $siteHandle = null): Response
    {
        $variables = [];
        // Get the site to edit
        $siteId = $this->getSiteIdFromHandle($siteHandle);
        // Enabled sites
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'tracking'.'/'.$subSection;
        $variables['currentSubSection'] = $subSection;

        // The script meta containers for the global meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle(intval($variables['currentSiteId']));
        $variables['scripts'] = Seomatic::$plugin->metaBundles->getContainerDataFromBundle(
            $metaBundle,
            MetaScriptContainer::CONTAINER_TYPE
        );
        // Plugin and section settings
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Tracking Scripts');
        $subSectionTitle = $variables['scripts'][$subSection]->name;
        $subSectionTitle = Craft::t('seomatic', $subSectionTitle);
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['subSectionTitle'] = $subSectionTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/tracking'),
            ],
            [
                'label' => $subSectionTitle,
                'url'   => UrlHelper::cpUrl('seomatic/tracking/'.$subSection),
            ],
        ];
        $variables['selectedSubnavItem'] = 'tracking';

        // Render the template
        return $this->renderTemplate('seomatic/settings/tracking/_edit', $variables);
    }

    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionSaveTracking()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $siteId = $request->getParam('siteId');
        $scriptSettings = $request->getParam('scripts');

        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            foreach ($scriptSettings as $scriptHandle => $scriptData) {
                foreach ($metaBundle->metaContainers as $metaContainer) {
                    if ($metaContainer::CONTAINER_TYPE == MetaScriptContainer::CONTAINER_TYPE) {
                        $data = $metaContainer->getData($scriptHandle);
                        if ($data) {
                            foreach ($scriptData as $key => $value) {
                                if (is_array($value)) {
                                    foreach ($value as $varsKey => $varsValue) {
                                        $data->$key[$varsKey]['value'] = $varsValue;
                                    }
                                } else {
                                    $data->$key = $value;
                                }
                            }
                        }
                    }
                }
            }
            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic site settings saved.'));
        }

        return $this->redirectToPostedUrl();
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function normalizeTimes(&$value)
    {
        if (is_string($value)) {
            $value = Json::decode($value);
        }
        $normalized = [];
        $times = ['open', 'close'];
        for ($day = 0; $day <= 6; $day++) {
            foreach ($times as $time) {
                if (
                    isset($value[$day][$time]) &&
                    ($date = DateTimeHelper::toDateTime($value[$day][$time])) !== false
                ) {
                    $normalized[$day][$time] = $date;
                } else {
                    $normalized[$day][$time] = null;
                }
            }
        }

        $value = $normalized;
    }

    /**
     * Set the text sources depending on the field settings
     *
     * @param string $elementName
     * @param        $globalsSettings
     * @param        $bundleSettings
     */
    protected function parseTextSources(string $elementName, &$globalsSettings, &$bundleSettings)
    {
        $objectPrefix = '';
        if (!empty($elementName)) {
            $elementName .= '.';
            $objectPrefix = 'object.';
        }
        foreach (self::PULL_TEXT_FIELDS as $fields) {
            $fieldName = $fields['fieldName'];
            $source = $bundleSettings[$fieldName.'Source'] ?? '';
            $sourceField = $bundleSettings[$fieldName.'Field'] ?? '';
            if (!empty($source)) {
                $seoField = $fields['seoField'];
                switch ($source) {
                    case 'sameAsSeo':
                        $globalsSettings[$fieldName] =
                            '{seomatic.meta.'.$seoField.'}';
                        break;

                    case 'sameAsSiteTwitter':
                        $globalsSettings[$fieldName] =
                            '{seomatic.site.'.$seoField.'}';
                        break;

                    case 'sameAsGlobal':
                        $globalsSettings[$fieldName] =
                            '';
                        break;

                    case 'fromField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.$sourceField
                            .')}';
                        break;

                    case 'fromUserField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.'author.'.$sourceField
                            .')}';
                        break;

                    case 'summaryFromField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractSummary(seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.$sourceField
                            .'))}';
                        break;

                    case 'keywordsFromField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractKeywords(seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.$sourceField
                            .'))}';
                        break;

                    case 'fromCustom':
                        break;
                }
            }
        }
    }

    /**
     * Set the image sources depending on the field settings
     *
     * @param $elementName
     * @param $globalsSettings
     * @param $bundleSettings
     * @param $siteId
     */
    protected function parseImageSources($elementName, &$globalsSettings, &$bundleSettings, $siteId)
    {
        $objectPrefix = '';
        if (!empty($elementName)) {
            $elementName .= '.';
            $objectPrefix = 'object.';
        }
        foreach (self::PULL_ASSET_FIELDS as $fields) {
            $fieldName = $fields['fieldName'];
            $source = $bundleSettings[$fieldName.'Source'] ?? '';
            $ids = $bundleSettings[$fieldName.'Ids'] ?? [];
            $sourceField = $bundleSettings[$fieldName.'Field'] ?? '';
            if (!empty($source)) {
                $transformImage = $bundleSettings[$fieldName.'Transform'];
                $seoField = $fields['seoField'];
                $transformName = $fields['transformName'];
                // Special-case Twitter transforms
                if ($transformName == 'twitter') {
                    $transformName = 'twitter-summary';
                    if ($globalsSettings['twitterCard'] == 'summary_large_image') {
                        $transformName = 'twitter-large';
                    }
                }
                if ($transformImage) {
                    switch ($source) {
                        case 'sameAsSeo':
                            $seoSource = $bundleSettings[$seoField.'Source'] ?? '';
                            $seoIds = $bundleSettings[$seoField.'Ids'] ?? [];
                            $seoSourceField = $bundleSettings[$seoField.'Field'] ?? '';
                            if (!empty($seoSource)) {
                                switch ($seoSource) {
                                    case 'fromField':
                                        if (!empty($seoSourceField)) {
                                            $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                                .$objectPrefix.$elementName.$seoSourceField.'.one()'
                                                .', "'.$transformName.'"'
                                                .', '.$siteId.')}';
                                        }
                                        break;
                                    case 'fromAsset':
                                        if (!empty($seoIds)) {
                                            $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                                .$seoIds[0]
                                                .', "'.$transformName.'"'
                                                .', '.$siteId.')}';
                                        }
                                        break;
                                    default:
                                        $globalsSettings[$fieldName] = '{seomatic.meta.'.$seoField.'}';
                                        break;
                                }
                            }
                            break;
                        case 'fromField':
                            if (!empty($sourceField)) {
                                $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                    .$objectPrefix.$elementName.$sourceField.'.one()'
                                    .', "'.$transformName.'"'
                                    .', '.$siteId.')}';
                            }
                            break;
                        case 'fromAsset':
                            if (!empty($ids)) {
                                $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                    .$ids[0]
                                    .', "'.$transformName.'"'
                                    .', '.$siteId.')}';
                            }
                            break;
                    }
                } else {
                    switch ($source) {
                        case 'sameAsSeo':
                            $globalsSettings[$fieldName] = '{seomatic.meta.'.$seoField.'}';
                            break;
                        case 'fromField':
                            if (!empty($sourceField)) {
                                $globalsSettings[$fieldName] = '{'
                                    .$elementName.$sourceField.'.one().url'
                                    .'}';
                            }
                            break;
                        case 'fromAsset':
                            if (!empty($ids)) {
                                $globalsSettings[$fieldName] = '{{ craft.app.assets.assetById('
                                    .$ids[0]
                                    .', '.$siteId.').url }}';
                            }
                            break;
                    }
                }
            }
        }
    }

    /**
     * @param array $variables
     */
    protected function setGlobalFieldSourceVariables(array &$variables)
    {
        $variables['textFieldSources'] = array_merge(
            ['globalsGroup' => ['optgroup' => 'Globals Fields']],
            FieldHelper::fieldsOfTypeFromGlobals(
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['assetFieldSources'] = array_merge(
            ['globalsGroup' => ['optgroup' => 'Globals Fields']],
            FieldHelper::fieldsOfTypeFromGlobals(
                FieldHelper::ASSET_FIELD_CLASS_KEY,
                false
            )
        );
    }

    /**
     * @param string $sourceBundleType
     * @param string $sourceHandle
     * @param string $groupName
     * @param array  $variables
     */
    protected function setContentFieldSourceVariables(
        string $sourceBundleType,
        string $sourceHandle,
        string $groupName,
        array &$variables
    ) {
        $variables['textFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => $groupName.' Fields'], 'title' => 'Title'],
            FieldHelper::fieldsOfTypeFromSource(
                $sourceBundleType,
                $sourceHandle,
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['assetFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => $groupName.' Fields']],
            FieldHelper::fieldsOfTypeFromSource(
                $sourceBundleType,
                $sourceHandle,
                FieldHelper::ASSET_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['assetVolumeTextFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => 'Asset Volume Fields'], 'title' => 'Title'],
            FieldHelper::fieldsOfTypeFromAssetVolumes(
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['userFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => 'User Fields']],
            FieldHelper::fieldsOfTypeFromUsers(
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
    }

    /**
     * @param string $sourceBundleType
     * @param string $sourceHandle
     *
     * @return string
     */
    protected function uriFromSourceBundle(string $sourceBundleType, string $sourceHandle): string
    {
        $uri = '';
        // Pick an Element to be used for the preview
        switch ($sourceBundleType) {
            case MetaBundles::GLOBAL_META_BUNDLE:
                $uri = MetaBundles::GLOBAL_META_BUNDLE;
                break;

            case MetaBundles::SECTION_META_BUNDLE:
                $entry = Entry::find()->section($sourceHandle)->one();
                if ($entry) {
                    $uri = $entry->uri;
                }
                break;

            case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                $category = Category::find()->group($sourceHandle)->one();
                if ($category) {
                    $uri = $category->uri;
                }
                break;
            // @TODO: handle commerce products
        }
        if (($uri == '__home__') || ($uri === null)) {
            $uri = '/';
        }

        return $uri;
    }

    /**
     * @param string $siteHandle
     * @param        $siteId
     * @param        $variables
     *
     * @throws \yii\web\ForbiddenHttpException
     */
    protected function setMultiSiteVariables($siteHandle, &$siteId, array &$variables)
    {
        // Enabled sites
        $sites = Craft::$app->getSites();
        if (Craft::$app->getIsMultiSite()) {
            // Set defaults based on the section settings
            $variables['enabledSiteIds'] = [];
            $variables['siteIds'] = [];

            /** @var Site $site */
            foreach ($sites->getEditableSiteIds() as $editableSiteId) {
                $variables['enabledSiteIds'][] = $editableSiteId;
                $variables['siteIds'][] = $editableSiteId;
            }

            // Make sure the $siteId they are trying to edit is in our array of editable sites
            if (!in_array($siteId, $variables['enabledSiteIds'])) {
                if (!empty($variables['enabledSiteIds'])) {
                    $siteId = reset($variables['enabledSiteIds']);
                } else {
                    $this->requirePermission('editSite:'.$siteId);
                }
            }
        }
        // Set the currentSiteId and currentSiteHandle
        $variables['currentSiteId'] = empty($siteId) ? Craft::$app->getSites()->currentSite->id : $siteId;
        $variables['currentSiteHandle'] = empty($siteHandle)
            ? Craft::$app->getSites()->currentSite->handle
            : $siteHandle;

        // Page title
        $variables['showSites'] = (
            Craft::$app->getIsMultiSite() &&
            count($variables['enabledSiteIds'])
        );

        if ($variables['showSites']) {
            $variables['sitesMenuLabel'] = Craft::t(
                'site',
                $sites->getSiteById(intval($variables['currentSiteId']))->name
            );
        } else {
            $variables['sitesMenuLabel'] = '';
        }
    }

    /**
     * Return the most specific schema.org type possible from the $settings
     *
     * @param $settings
     *
     * @return string
     */
    protected function getSpecificEntityType($settings): string
    {
        if (!empty($settings)) {
            // Go from most specific type to least specific type
            foreach (self::SCHEMA_TYPES as $schemaType) {
                if (!empty($settings[$schemaType]) && ($settings[$schemaType] != 'none')) {
                    return $settings[$schemaType];
                }
            }
        }

        return 'WebPage';
    }

    /**
     * Return an array of Asset elements from an array of element IDs
     *
     * @param array|string $assetIds
     * @param int          $siteId
     *
     * @return array
     */
    protected function assetElementsFromIds($assetIds, int $siteId)
    {
        $elements = Craft::$app->getElements();
        $assets = [];
        if (!empty($assetIds)) {
            foreach ($assetIds as $assetId) {
                $assets[] = $elements->getElementById($assetId, Asset::class, $siteId);
            }
        }

        return $assets;
    }

    /**
     * Return a siteId from a siteHandle
     *
     * @param string $siteHandle
     *
     * @return int|null
     * @throws NotFoundHttpException
     */
    protected function getSiteIdFromHandle($siteHandle)
    {
        // Get the site to edit
        if ($siteHandle !== null) {
            $site = Craft::$app->getSites()->getSiteByHandle($siteHandle);
            if (!$site) {
                throw new NotFoundHttpException('Invalid site handle: '.$siteHandle);
            }
            $siteId = $site->id;
        } else {
            $siteId = Craft::$app->getSites()->currentSite->id;
        }

        return $siteId;
    }

    /**
     * Prep the entity settings for saving to the db
     * @param array &$settings
     */
    protected function prepEntitySettings(&$settings)
    {
        $this->normalizeTimes($settings['localBusinessOpeningHours']);
        $settings['computedType'] = $this->getSpecificEntityType($settings);
        if (!empty($settings['genericImageIds'])) {
            $asset = Craft::$app->getAssets()->getAssetById($settings['genericImageIds'][0]);
            if (!empty($asset)) {
                $settings['genericImage'] = $asset->getUrl();
                $settings['genericImageWidth'] = $asset->getWidth();
                $settings['genericImageHeight'] = $asset->getHeight();
            }
        }
    }

}
