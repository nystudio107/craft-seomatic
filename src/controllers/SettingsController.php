<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use craft\models\Site;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;

use Craft;
use craft\helpers\UrlHelper;
use craft\web\Controller;

use yii\base\InvalidConfigException;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SettingsController extends Controller
{
    const DOCUMENTATION_URL = 'https://github.com/nystudio107/craft-seomatic/wiki';

    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
    ];

    // Public Methods
    // =========================================================================

    /**
     * Global settings
     *
     * @param array $variables
     *
     * @return Response The rendered result
     */
    public function actionGlobal(array $variables = []): Response
    {
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Global SEO');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
        }
        $variables['baseAssetUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = false;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName . ' ' . $templateTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/global'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'global';
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundles(false);

        // Render the template
        return $this->renderTemplate('seomatic/settings/global', $variables);
    }

    /**
     * Content settings
     *
     * @param array $variables
     *
     * @return Response The rendered result
     */
    public function actionContent(array $variables = []): Response
    {
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Content SEO');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
        }
        $variables['baseAssetUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = false;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName . ' ' . $templateTitle;
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
        $variables['selectedSubnavItem'] = 'content';
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundles(false);

        // Render the template
        return $this->renderTemplate('seomatic/settings/content', $variables);
    }

    /**
     * Site settings
     *
     * @param int $siteId
     *
     * @return Response The rendered result
     */
    public function actionSite(int $siteId = 0): Response
    {
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Site Settings');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
        }
        $variables['baseAssetUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = false;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName . ' ' . $templateTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'site';

        // Enabled sites
        $variables['currentSiteId'] = empty($siteId) ? Craft::$app->getSites()->currentSite->id : $siteId;
        if (Craft::$app->getIsMultiSite()) {
            // Set defaults based on the section settings
            $variables['enabledSiteIds'] = [];
            $variables['siteIds'] = [];

            $sites = Craft::$app->getSites();
            /** @var Site $site */
            foreach ($sites->getAllSites() as $site) {
                $variables['enabledSiteIds'][] = $site->id;
                $variables['siteIds'][] = $site->id;
            }
        }

        // Page title w/ revision label
        $variables['showSites'] = (
            Craft::$app->getIsMultiSite() &&
            count($variables['enabledSiteIds'])
        );

        if ($variables['showSites']) {
            $variables['sitesMenuLabel'] = Craft::t('site', $sites->getSiteById($variables['currentSiteId'])->name);
        } else {
            $variables['sitesMenuLabel'] = '';
        }
        $variables['controllerHandle'] = 'site';

        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($variables['currentSiteId']);
        $variables['site'] = $metaBundle->metaSiteVars;

        // Render the template
        return $this->renderTemplate('seomatic/settings/site', $variables);
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
            $metaBundle->metaSiteVars->setAttributes($siteSettings);
            Seomatic::$plugin->metaBundles->updateGlobalMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'Site settings saved.'));
        }

        return $this->redirectToPostedUrl();
    }

    /**
     * Plugin settings
     *
     * @param array $variables
     *
     * @return Response The rendered result
     */
    public function actionPlugin(array $variables = []): Response
    {
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Plugin Settings');
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
        }
        $variables['baseAssetUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['fullPageForm'] = false;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName . ' ' . $templateTitle;
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
        $variables['selectedSubnavItem'] = 'settings';
        $variables['settings'] = Seomatic::$settings;
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundles(false);

        // Render the template
        return $this->renderTemplate('seomatic/settings/plugin', $variables);
    }

}
