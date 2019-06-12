<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\PullField as PullFieldHelper;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\DynamicMeta as DynamicMetaHelper;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\services\FrontendTemplates;
use nystudio107\seomatic\services\MetaBundles;

use Craft;
use craft\elements\Asset;
use craft\helpers\UrlHelper;
use craft\models\Site;
use craft\web\Controller;

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

    const DOCUMENTATION_URL = 'https://github.com/nystudio107/craft-seomatic';

    const SETUP_GRADES = [
        ['id' => 'data1', 'name' => 'A', 'color' => '#008002'],
        ['id' => 'data2', 'name' => 'B', 'color' => '#9ACD31'],
        ['id' => 'data4', 'name' => 'C', 'color' => '#FFA500'],
        ['id' => 'data5', 'name' => 'D', 'color' => '#8B0100'],
    ];

    const SEO_SETUP_FIELDS = [
        'mainEntityOfPage' => 'Main Entity of Page',
        'seoTitle' => 'SEO Title',
        'seoDescription' => 'SEO Description',
        'seoKeywords' => 'SEO Keywords',
        'seoImage' => 'SEO Image',
        'seoImageDescription' => 'SEO Image Description',
    ];

    const SITE_SETUP_FIELDS = [
        'siteName' => 'Site Name',
        'twitterHandle' => 'Twitter Handle',
        'facebookProfileId' => 'Facebook Profile ID',
    ];

    const IDENTITY_SETUP_FIELDS = [
        'computedType' => 'Identity Entity Type',
        'genericName' => 'Identity Entity Name',
        'genericDescription' => 'Identity Entity Description',
        'genericUrl' => 'Identity Entity URL',
        'genericImage' => 'Identity Entity Brand',
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
        $variables['docTitle'] = "{$pluginName} - {$templateTitle}";
        $siteHandleUri = Craft::$app->isMultiSite ? '/'.$siteHandle : '';
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic/dashboard'.$siteHandleUri),
            ],
        ];
        $variables['selectedSubnavItem'] = 'dashboard';
        $variables['showWelcome'] = $showWelcome;
        // Calulate the setup grades
        $variables['contentSetupStats'] = [];
        $variables['setupGrades'] = self::SETUP_GRADES;
        $numFields = \count(self::SEO_SETUP_FIELDS);
        $numGrades = \count(self::SETUP_GRADES);
        while ($numGrades--) {
            $variables['contentSetupStats'][] = 0;
        }
        $numGrades = \count(self::SETUP_GRADES);
        // Content SEO grades
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
        $variables['contentSetupChecklistCutoff'] = floor($numFields / 2);
        $variables['contentSetupChecklist'] = [];
        Seomatic::$plugin->metaBundles->pruneVestigialMetaBundles($variables['metaBundles']);
        /** @var MetaBundle $metaBundle */
        foreach ($variables['metaBundles'] as $metaBundle) {
            $stat = 0;
            foreach (self::SEO_SETUP_FIELDS as $setupField => $setupLabel) {
                $stat += (int)!empty($metaBundle->metaGlobalVars[$setupField]);
                $value = $variables['contentSetupChecklist'][$setupField]['value'] ?? 0;
                $variables['contentSetupChecklist'][$setupField] = [
                    'label' => $setupLabel,
                    'value' => $value + (int)!empty($metaBundle->metaGlobalVars[$setupField]),
                ];
            }
            $stat = round($numGrades - (($stat * $numGrades) / $numFields));
            if ($stat >= $numGrades) {
                $stat = $numGrades - 1;
            }
            $variables['contentSetupStats'][$stat]++;
        }
        // Global SEO grades
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle((int)$siteId);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle !== null) {
            $stat = 0;
            $variables['globalSetupChecklist'] = [];
            foreach (self::SEO_SETUP_FIELDS as $setupField => $setupLabel) {
                $stat += (int)!empty($metaBundle->metaGlobalVars[$setupField]);
                $variables['globalSetupChecklist'][$setupField] = [
                    'label' => $setupLabel,
                    'value' => (int)!empty($metaBundle->metaGlobalVars[$setupField]),
                ];
            }
            $stat = round(($stat / $numFields) * 100);
            $variables['globalSetupStat'] = $stat;
            // Site Settings grades
            $numFields = \count(self::SITE_SETUP_FIELDS) + \count(self::IDENTITY_SETUP_FIELDS);
            $stat = 0;
            $variables['siteSetupChecklist'] = [];
            foreach (self::SITE_SETUP_FIELDS as $setupField => $setupLabel) {
                $stat += (int)!empty($metaBundle->metaSiteVars[$setupField]);
                $variables['siteSetupChecklist'][$setupField] = [
                    'label' => $setupLabel,
                    'value' => (int)!empty($metaBundle->metaSiteVars[$setupField]),
                ];
            }
            foreach (self::IDENTITY_SETUP_FIELDS as $setupField => $setupLabel) {
                $stat += (int)!empty($metaBundle->metaSiteVars->identity[$setupField]);
                $variables['siteSetupChecklist'][$setupField] = [
                    'label' => $setupLabel,
                    'value' => (int)!empty($metaBundle->metaSiteVars->identity[$setupField]),
                ];
            }
            $stat = round(($stat / $numFields) * 100);
            $variables['siteSetupStat'] = $stat;
        }

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
        $variables['docTitle'] = "{$pluginName} - {$templateTitle} - {$subSectionTitle}";
        $siteHandleUri = Craft::$app->isMultiSite ? '/'.$siteHandle : '';
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic/global/general'.$siteHandleUri),
            ],
            [
                'label' => $subSectionTitle,
                'url' => UrlHelper::cpUrl('seomatic/global/'.$subSection.$siteHandleUri),
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
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle((int)$variables['currentSiteId']);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle !== null) {
            $variables['metaGlobalVars'] = $metaBundle->metaGlobalVars;
            $variables['metaSitemapVars'] = $metaBundle->metaSitemapVars;
            $variables['metaBundleSettings'] = $metaBundle->metaBundleSettings;
            // Template container settings
            $templateContainers = $metaBundle->frontendTemplatesContainer->data;
            $variables['robotsTemplate'] = $templateContainers[FrontendTemplates::ROBOTS_TXT_HANDLE];
            $variables['humansTemplate'] = $templateContainers[FrontendTemplates::HUMANS_TXT_HANDLE];
            // Handle an edge-case where a migration didn't work properly to add ADS_TXT_HANDLE
            if (!isset($templateContainers[FrontendTemplates::ADS_TXT_HANDLE])) {
                $globalMetaBundle = Seomatic::$plugin->metaBundles->createGlobalMetaBundleForSite($siteId, $metaBundle);
                $templateContainers[FrontendTemplates::ADS_TXT_HANDLE] =
                    $globalMetaBundle->frontendTemplatesContainer->data[FrontendTemplates::ADS_TXT_HANDLE];
            }
            $variables['adsTemplate'] = $templateContainers[FrontendTemplates::ADS_TXT_HANDLE];
            // Image selectors
            $bundleSettings = $metaBundle->metaBundleSettings;
            $variables['elementType'] = Asset::class;
            $variables['seoImageElements'] = ImageTransformHelper::assetElementsFromIds(
                $bundleSettings->seoImageIds,
                $siteId
            );
            $variables['twitterImageElements'] = ImageTransformHelper::assetElementsFromIds(
                $bundleSettings->twitterImageIds,
                $siteId
            );
            $variables['ogImageElements'] = ImageTransformHelper::assetElementsFromIds(
                $bundleSettings->ogImageIds,
                $siteId
            );
        }
        // Preview the meta containers
        Seomatic::$plugin->metaContainers->previewMetaContainers(
            MetaBundles::GLOBAL_META_BUNDLE,
            (int)$variables['currentSiteId']
        );

        // Render the template
        return $this->renderTemplate('seomatic/settings/global/'.$subSection, $variables);
    }

    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     * @throws \craft\errors\MissingComponentException
     */
    public function actionSaveGlobal(): Response
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $siteId = $request->getParam('siteId');
        $globalsSettings = $request->getParam('metaGlobalVars');
        $bundleSettings = $request->getParam('metaBundleSettings');
        $robotsTemplate = $request->getParam('robotsTemplate');
        $humansTemplate = $request->getParam('humansTemplate');
        $adsTemplate = $request->getParam('adsTemplate');

        // Set the element type in the template
        $elementName = '';

        // The site settings for the appropriate meta bundle
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle !== null) {
            if (\is_array($globalsSettings) && \is_array($bundleSettings)) {
                PullFieldHelper::parseTextSources($elementName, $globalsSettings, $bundleSettings);
                PullFieldHelper::parseImageSources($elementName, $globalsSettings, $bundleSettings, $siteId);
                if (!empty($bundleSettings['siteType'])) {
                    $globalsSettings['mainEntityOfPage'] = PullFieldHelper::getSpecificEntityType($bundleSettings);
                }
                $metaBundle->metaGlobalVars->setAttributes($globalsSettings);
                $metaBundle->metaBundleSettings->setAttributes($bundleSettings);
            }
            $templateContainers = $metaBundle->frontendTemplatesContainer->data;
            $robotsContainer = $templateContainers[FrontendTemplates::ROBOTS_TXT_HANDLE];
            if ($robotsContainer !== null && \is_array($robotsTemplate)) {
                $robotsContainer->setAttributes($robotsTemplate);
            }
            $humansContainer = $templateContainers[FrontendTemplates::HUMANS_TXT_HANDLE];
            if ($humansContainer !== null && \is_array($humansTemplate)) {
                $humansContainer->setAttributes($humansTemplate);
            }
            $adsContainer = $templateContainers[FrontendTemplates::ADS_TXT_HANDLE];
            if ($adsContainer !== null && \is_array($adsTemplate)) {
                $adsContainer->setAttributes($adsTemplate);
            }

            Seomatic::$plugin->metaBundles->syncBundleWithConfig($metaBundle, true);
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
        $variables['docTitle'] = "{$pluginName} - {$templateTitle}";
        $siteHandleUri = Craft::$app->isMultiSite ? '/'.$siteHandle : '';
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic/content'.$siteHandleUri),
            ],
        ];
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'content';
        $variables['selectedSubnavItem'] = 'content';
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
        Seomatic::$plugin->metaBundles->pruneVestigialMetaBundles($variables['metaBundles']);

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
        $this->cullDisabledSites($sourceBundleType, $sourceHandle, $variables);
        // Meta Bundle settings
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            (int)$variables['currentSiteId']
        );
        Seomatic::$previewingMetaContainers = false;
        $templateTitle = '';
        if ($metaBundle !== null) {
            $variables['metaGlobalVars'] = $metaBundle->metaGlobalVars;
            $variables['metaSitemapVars'] = $metaBundle->metaSitemapVars;
            $variables['metaBundleSettings'] = $metaBundle->metaBundleSettings;
            $variables['currentSourceHandle'] = $metaBundle->sourceHandle;
            $variables['currentSourceBundleType'] = $metaBundle->sourceBundleType;
            $templateTitle = $metaBundle->sourceName;
        }
        // Basic variables
        $subSectionTitle = Craft::t('seomatic', ucfirst($subSection));
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $templateTitle;
        $variables['subSectionTitle'] = $subSectionTitle;
        $variables['docTitle'] = "{$pluginName} - Content SEO - {$templateTitle} - {$subSectionTitle}";
        $siteHandleUri = Craft::$app->isMultiSite ? '/'.$siteHandle : '';
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => 'Content SEO',
                'url' => UrlHelper::cpUrl('seomatic/content'.$siteHandleUri),
            ],
            [
                'label' => $metaBundle->sourceName.' · '.$subSectionTitle,
                'url' => UrlHelper::cpUrl("seomatic/edit-content/${subSection}/${sourceBundleType}/${sourceHandle}"),
            ],
        ];
        $variables['selectedSubnavItem'] = 'content';
        $variables['controllerHandle'] = "edit-content/${subSection}/${sourceBundleType}/${sourceHandle}";
        // Image selectors
        $variables['currentSubSection'] = $subSection;
        $bundleSettings = $metaBundle->metaBundleSettings;
        $variables['elementType'] = Asset::class;
        $variables['seoImageElements'] = ImageTransformHelper::assetElementsFromIds(
            $bundleSettings->seoImageIds,
            $siteId
        );
        $variables['twitterImageElements'] = ImageTransformHelper::assetElementsFromIds(
            $bundleSettings->twitterImageIds,
            $siteId
        );
        $variables['ogImageElements'] = ImageTransformHelper::assetElementsFromIds(
            $bundleSettings->ogImageIds,
            $siteId
        );
        $variables['sourceType'] = $metaBundle->sourceType;
        // Pass in the pull fields
        $groupName = ucfirst($metaBundle->sourceType);
        $this->setContentFieldSourceVariables($sourceBundleType, $sourceHandle, $groupName, $variables);
        $uri = $this->uriFromSourceBundle($sourceBundleType, $sourceHandle, $siteId);
        // Preview the meta containers
        Seomatic::$plugin->metaContainers->previewMetaContainers(
            $uri,
            (int)$variables['currentSiteId'],
            false,
            false
        );

        // Render the template
        return $this->renderTemplate('seomatic/settings/content/'.$subSection, $variables);
    }


    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     * @throws \craft\errors\MissingComponentException
     */
    public function actionSaveContent(): Response
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $sourceBundleType = $request->getParam('sourceBundleType');
        $sourceHandle = $request->getParam('sourceHandle');
        $siteId = $request->getParam('siteId');
        $globalsSettings = $request->getParam('metaGlobalVars');
        $bundleSettings = $request->getParam('metaBundleSettings');
        $sitemapSettings = $request->getParam('metaSitemapVars');
        // Set the element type in the template
        $elementName = '';
        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
        if ($seoElement !== null) {
            $elementName = $seoElement::getElementRefHandle();
        }
        // The site settings for the appropriate meta bundle
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            $siteId
        );
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle) {
            if (\is_array($globalsSettings) && \is_array($bundleSettings)) {
                PullFieldHelper::parseTextSources($elementName, $globalsSettings, $bundleSettings);
                PullFieldHelper::parseImageSources($elementName, $globalsSettings, $bundleSettings, $siteId);
                if (!empty($bundleSettings['siteType'])) {
                    $globalsSettings['mainEntityOfPage'] = PullFieldHelper::getSpecificEntityType($bundleSettings);
                }
                $metaBundle->metaGlobalVars->setAttributes($globalsSettings);
                $metaBundle->metaBundleSettings->setAttributes($bundleSettings);
            }
            if (\is_array($sitemapSettings)) {
                $metaBundle->metaSitemapVars->setAttributes($sitemapSettings);
            }

            Seomatic::$plugin->metaBundles->syncBundleWithConfig($metaBundle, true);
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
        $subSectionSuffix = '';
        if ($subSection === 'social') {
            $subSectionSuffix = ' Media';
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
        $variables['docTitle'] = "{$pluginName} - {$templateTitle} - {$subSectionTitle}";
        $siteHandleUri = Craft::$app->isMultiSite ? '/'.$siteHandle : '';
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic/site/identity'.$siteHandleUri),
            ],
            [
                'label' => $subSectionTitle,
                'url' => UrlHelper::cpUrl('seomatic/site/'.$subSection.$siteHandleUri),
            ],
        ];
        $variables['selectedSubnavItem'] = 'site';
        $variables['currentSubSection'] = $subSection;

        // Enabled sites
        $this->setMultiSiteVariables($siteHandle, $siteId, $variables);
        $variables['controllerHandle'] = 'site'.'/'.$subSection;

        // The site settings for the appropriate meta bundle
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle((int)$variables['currentSiteId']);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle !== null) {
            $variables['site'] = $metaBundle->metaSiteVars;
            $variables['identityImageElements'] = ImageTransformHelper::assetElementsFromIds(
                $variables['site']->identity->genericImageIds,
                $siteId
            );
            $variables['creatorImageElements'] = ImageTransformHelper::assetElementsFromIds(
                $variables['site']->creator->genericImageIds,
                $siteId
            );
        }
        $variables['elementType'] = Asset::class;

        // Render the template
        return $this->renderTemplate('seomatic/settings/site/'.$subSection, $variables);
    }

    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     * @throws \craft\errors\MissingComponentException
     */
    public function actionSaveSite(): Response
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
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle) {
            if (\is_array($siteSettings)) {
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
                if (!empty($siteSettings['additionalSitemapUrls'])) {
                    $siteSettings['additionalSitemapUrlsDateUpdated'] = new \DateTime;
                    Seomatic::$plugin->sitemaps->submitCustomSitemap($siteId);
                }
                $metaBundle->metaSiteVars->setAttributes($siteSettings);
            }
            Seomatic::$plugin->metaBundles->syncBundleWithConfig($metaBundle, true);
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
        $variables['docTitle'] = "{$pluginName} - {$templateTitle}";
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic/plugin'),
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
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle((int)$variables['currentSiteId']);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle !== null) {
            $variables['scripts'] = Seomatic::$plugin->metaBundles->getContainerDataFromBundle(
                $metaBundle,
                MetaScriptContainer::CONTAINER_TYPE
            );
        }
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
        $variables['docTitle'] = "{$pluginName} - {$templateTitle} - {$subSectionTitle}";
        $siteHandleUri = Craft::$app->isMultiSite ? '/'.$siteHandle : '';
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic/tracking'),
            ],
            [
                'label' => $subSectionTitle,
                'url' => UrlHelper::cpUrl('seomatic/tracking/'.$subSection.$siteHandleUri),
            ],
        ];
        $variables['selectedSubnavItem'] = 'tracking';

        // Render the template
        return $this->renderTemplate('seomatic/settings/tracking/_edit', $variables);
    }

    /**
     * @return Response
     * @throws \yii\web\BadRequestHttpException
     * @throws \craft\errors\MissingComponentException
     */
    public function actionSaveTracking(): Response
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $siteId = $request->getParam('siteId');
        $scriptSettings = $request->getParam('scripts');

        // The site settings for the appropriate meta bundle
        Seomatic::$previewingMetaContainers = true;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        Seomatic::$previewingMetaContainers = false;
        if ($metaBundle) {
            /** @var array $scriptSettings */
            foreach ($scriptSettings as $scriptHandle => $scriptData) {
                foreach ($metaBundle->metaContainers as $metaContainer) {
                    if ($metaContainer::CONTAINER_TYPE === MetaScriptContainer::CONTAINER_TYPE) {
                        $data = $metaContainer->getData($scriptHandle);
                        if ($data) {
                            /** @var array $scriptData */
                            foreach ($scriptData as $key => $value) {
                                if (\is_array($value)) {
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

    /**
     * Saves a plugin’s settings.
     *
     * @return Response|null
     * @throws NotFoundHttpException if the requested plugin cannot be found
     * @throws \yii\web\BadRequestHttpException
     * @throws \craft\errors\MissingComponentException
     */
    public function actionSavePluginSettings()
    {
        $this->requirePostRequest();
        $pluginHandle = Craft::$app->getRequest()->getRequiredBodyParam('pluginHandle');
        $settings = Craft::$app->getRequest()->getBodyParam('settings', []);
        $plugin = Craft::$app->getPlugins()->getPlugin($pluginHandle);

        if ($plugin === null) {
            throw new NotFoundHttpException('Plugin not found');
        }

        if (!Craft::$app->getPlugins()->savePluginSettings($plugin, $settings)) {
            Craft::$app->getSession()->setError(Craft::t('app', "Couldn't save plugin settings."));

            // Send the plugin back to the template
            Craft::$app->getUrlManager()->setRouteParams([
                'plugin' => $plugin,
            ]);

            return null;
        }

        Seomatic::$plugin->clearAllCaches();
        Craft::$app->getSession()->setNotice(Craft::t('app', 'Plugin settings saved.'));

        return $this->redirectToPostedUrl();
    }

    // Protected Methods
    // =========================================================================

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
            ['entryGroup' => ['optgroup' => 'Asset Volume Fields'], '' => '--', 'title' => 'Title'],
            array_merge(
                FieldHelper::fieldsOfTypeFromAssetVolumes(
                    FieldHelper::TEXT_FIELD_CLASS_KEY,
                    false
                )
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
     * @param string   $sourceBundleType
     * @param string   $sourceHandle
     * @param null|int $siteId
     *
     * @return string
     */
    protected function uriFromSourceBundle(string $sourceBundleType, string $sourceHandle, $siteId): string
    {
        $uri = null;
        // Pick an Element to be used for the preview
        if ($sourceBundleType === MetaBundles::GLOBAL_META_BUNDLE) {
            $uri = MetaBundles::GLOBAL_META_BUNDLE;
        } else {
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
            if ($seoElement !== null) {
                $uri = $seoElement::previewUri($sourceHandle, $siteId);
            }
        }
        // Special-case for the __home__ slug, and default to /
        if (($uri === '__home__') || ($uri === null)) {
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
    protected function setMultiSiteVariables($siteHandle, &$siteId, array &$variables, $element = null)
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
            if (!\in_array($siteId, $variables['enabledSiteIds'], false)) {
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
            \count($variables['enabledSiteIds'])
        );

        if ($variables['showSites']) {
            $variables['sitesMenuLabel'] = Craft::t(
                'site',
                $sites->getSiteById((int)$variables['currentSiteId'])->name
            );
        } else {
            $variables['sitesMenuLabel'] = '';
        }
    }

    /**
     * Remove any sites for which meta bundles do not exist (they may be
     * disabled for this section)
     *
     * @param string $sourceBundleType
     * @param string $sourceHandle
     * @param array  $variables
     */
    protected function cullDisabledSites(string $sourceBundleType, string $sourceHandle, array &$variables)
    {
        if (isset($variables['enabledSiteIds'])) {
            foreach ($variables['enabledSiteIds'] as $key => $value) {
                $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
                    $sourceBundleType,
                    $sourceHandle,
                    $value
                );
                if ($metaBundle === null) {
                    unset($variables['enabledSiteIds'][$key]);
                }
            }
        }
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
     *
     * @param array &$settings
     */
    protected function prepEntitySettings(&$settings)
    {
        DynamicMetaHelper::normalizeTimes($settings['localBusinessOpeningHours']);
        if (!empty($settings['siteType'])) {
            $settings['computedType'] = PullFieldHelper::getSpecificEntityType($settings);
        } else {
            $settings['computedType'] = 'WebPage';
        }
        if (!empty($settings['genericImageIds'])) {
            $asset = Craft::$app->getAssets()->getAssetById($settings['genericImageIds'][0]);
            if ($asset !== null) {
                $settings['genericImage'] = $asset->getUrl();
                $settings['genericImageWidth'] = $asset->getWidth();
                $settings['genericImageHeight'] = $asset->getHeight();
            }
        }
    }
}
