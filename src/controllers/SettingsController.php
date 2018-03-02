<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\helpers\Field as FieldHelper;

use Craft;
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;
use craft\helpers\UrlHelper;
use craft\models\Site;
use craft\web\Controller;

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
     * Global settings
     *
     * @param string|null $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     */
    public function actionGlobal(string $siteHandle = null): Response
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

        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Global Meta');
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
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName.' '.$templateTitle;
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

        // Enabled sites
        $sites = Craft::$app->getSites();
        $variables['currentSiteId'] = empty($siteId) ? Craft::$app->getSites()->currentSite->id : $siteId;
        $variables['currentSiteHandle'] = empty($siteHandle)
            ? Craft::$app->getSites()->currentSite->handle
            : $siteHandle;
        if (Craft::$app->getIsMultiSite()) {
            // Set defaults based on the section settings
            $variables['enabledSiteIds'] = [];
            $variables['siteIds'] = [];

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
        $variables['controllerHandle'] = 'global';
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($variables['currentSiteId']);

        $variables['globals'] = $metaBundle->metaGlobalVars;
        $variables['sitemap'] = $metaBundle->metaSitemapVars;
        $variables['settings'] = $metaBundle->metaBundleSettings;

        // Image selectors
        $elements = Craft::$app->getElements();
        $variables['elementType'] = Asset::class;
        // SEO Image
        $seoImageElements = [];
        if (!empty($variables['settings']['seoImageIds'])) {
            foreach ($variables['settings']['seoImageIds'] as $seoImageId) {
                $seoImageElements[] = $elements->getElementById($seoImageId, Asset::class, $siteId);
            }
        }
        $variables['seoImageElements'] = $seoImageElements;
        // Twitter Image
        $twitterImageElements = [];
        if (!empty($variables['settings']['twitterImageIds'])) {
            foreach ($variables['settings']['twitterImageIds'] as $twitterImageId) {
                $twitterImageElements[] = $elements->getElementById($twitterImageId, Asset::class, $siteId);
            }
        }
        $variables['twitterImageElements'] = $twitterImageElements;
        // OG Image
        $ogImageElements = [];
        if (!empty($variables['settings']['ogImageIds'])) {
            foreach ($variables['settings']['ogImageIds'] as $ogImageId) {
                $ogImageElements[] = $elements->getElementById($ogImageId, Asset::class, $siteId);
            }
        }
        $variables['ogImageElements'] = $ogImageElements;

        // Preview the meta containers
        Seomatic::$plugin->metaContainers->previewMetaContainers(
            MetaBundles::GLOBAL_META_BUNDLE,
            $variables['currentSiteId']
        );

        // Render the template
        return $this->renderTemplate('seomatic/settings/global/_edit', $variables);
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

        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            $this->parseImageSources($globalsSettings, $bundleSettings, $siteId);
            $metaBundle->metaGlobalVars->setAttributes($globalsSettings);
            $metaBundle->metaBundleSettings->setAttributes($bundleSettings);
            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic global settings saved.'));
        }

        return $this->redirectToPostedUrl();
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
        $variables['title'] = $pluginName.' '.$templateTitle;
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
        return $this->renderTemplate('seomatic/settings/content/index', $variables);
    }

    /**
     * Global settings
     *
     * @param string      $sourceBundleType
     * @param string      $sourceHandle
     * @param string|null $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     */
    public function actionEditContent(string $sourceBundleType, string $sourceHandle, string $siteHandle = null): Response
    {
        // @TODO: Let people choose an entry/categorygroup/product as the preview
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

        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Content Meta');
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
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName.' '.$templateTitle;
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

        // Enabled sites
        $sites = Craft::$app->getSites();
        $variables['currentSiteId'] = empty($siteId) ? Craft::$app->getSites()->currentSite->id : $siteId;
        $variables['currentSiteHandle'] = empty($siteHandle) ? Craft::$app->getSites()->currentSite->handle : $siteHandle;
        $variables['currentSourceHandle'] = $sourceHandle;
        $variables['currentSourceBundleType'] = $sourceBundleType;
        if (Craft::$app->getIsMultiSite()) {
            // Set defaults based on the section settings
            $variables['enabledSiteIds'] = [];
            $variables['siteIds'] = [];

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
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            $variables['currentSiteId']
        );
        $variables['controllerHandle'] = 'edit-content'.'/'.$sourceHandle;

        $variables['globals'] = $metaBundle->metaGlobalVars;
        $variables['sitemap'] = $metaBundle->metaSitemapVars;
        $variables['settings'] = $metaBundle->metaBundleSettings;

        // Image selectors
        $elements = Craft::$app->getElements();
        $variables['elementType'] = Asset::class;
        // SEO Image
        $seoImageElements = [];
        if (!empty($variables['settings']['seoImageIds'])) {
            foreach ($variables['settings']['seoImageIds'] as $seoImageId) {
                $seoImageElements[] = $elements->getElementById($seoImageId, Asset::class, $siteId);
            }
        }
        $variables['seoImageElements'] = $seoImageElements;
        // Twitter Image
        $twitterImageElements = [];
        if (!empty($variables['settings']['twitterImageIds'])) {
            foreach ($variables['settings']['twitterImageIds'] as $twitterImageId) {
                $twitterImageElements[] = $elements->getElementById($twitterImageId, Asset::class, $siteId);
            }
        }
        $variables['twitterImageElements'] = $twitterImageElements;
        // OG Image
        $ogImageElements = [];
        if (!empty($variables['settings']['ogImageIds'])) {
            foreach ($variables['settings']['ogImageIds'] as $ogImageId) {
                $ogImageElements[] = $elements->getElementById($ogImageId, Asset::class, $siteId);
            }
        }
        $variables['ogImageElements'] = $ogImageElements;

        // Pass in the pull fields
        $variables['textFieldSources'] = FieldHelper::fieldsOfTypeFromSource(
            $sourceBundleType,
            $sourceHandle,
            FieldHelper::TEXT_FIELD_CLASS_KEY,
            false
        );
        $variables['assetFieldSources'] = FieldHelper::fieldsOfTypeFromSource(
            $sourceBundleType,
            $sourceHandle,
            FieldHelper::ASSET_FIELD_CLASS_KEY,
            false
        );

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
        if ($uri == '__home__') {
            $uri = '/';
        }
        // Preview the meta containers
        Seomatic::$plugin->metaContainers->previewMetaContainers(
            $uri,
            $variables['currentSiteId']
        );

        // Render the template
        return $this->renderTemplate('seomatic/settings/content/_edit', $variables);
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

        // The site settings for the appropriate meta bundle
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle(
            $sourceBundleType,
            $sourceHandle,
            $siteId
        );
        if ($metaBundle) {
            $this->parseImageSources($globalsSettings, $bundleSettings, $siteId);
            $metaBundle->metaGlobalVars->setAttributes($globalsSettings);
            $metaBundle->metaBundleSettings->setAttributes($bundleSettings);
            $metaBundle->metaSitemapVars->setAttributes($sitemapSettings);
            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic content settings saved.'));
        }

        return $this->redirectToPostedUrl();
    }

    /**
     * Site settings
     *
     * @param string $siteHandle
     *
     * @return Response The rendered result
     * @throws NotFoundHttpException
     */
    public function actionSite(string $siteHandle = null): Response
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
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName.' '.$templateTitle;
        $variables['crumbs'] = [
            [
                'label' => $pluginName,
                'url'   => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url'   => UrlHelper::cpUrl('seomatic/site'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'site';

        // Enabled sites
        $sites = Craft::$app->getSites();
        $variables['currentSiteId'] = empty($siteId) ? Craft::$app->getSites()->currentSite->id : $siteId;
        $variables['currentSiteHandle'] = empty($siteHandle) ? Craft::$app->getSites()->currentSite->handle : $siteHandle;
        if (Craft::$app->getIsMultiSite()) {
            // Set defaults based on the section settings
            $variables['enabledSiteIds'] = [];
            $variables['siteIds'] = [];

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
        return $this->renderTemplate('seomatic/settings/site/_edit', $variables);
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
            Seomatic::$plugin->metaBundles->updateMetaBundle($metaBundle, $siteId);

            Seomatic::$plugin->clearAllCaches();
            Craft::$app->getSession()->setNotice(Craft::t('seomatic', 'SEOmatic site settings saved.'));
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
        $variables['fullPageForm'] = true;
        $variables['docsUrl'] = self::DOCUMENTATION_URL;
        $variables['pluginName'] = Seomatic::$settings->pluginName;
        $variables['title'] = $pluginName.' '.$templateTitle;
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
        return $this->renderTemplate('seomatic/settings/plugin/_edit', $variables);
    }

    // Protected Methods
    // =========================================================================

    /**
     * Set the image sources depending on the field settings
     *
     * @param $globalsSettings
     * @param $bundleSettings
     * @param $siteId
     */
    protected function parseImageSources(&$globalsSettings, &$bundleSettings, $siteId): void
    {
        // Handle the SEO Image
        switch ($bundleSettings['seoImageSource']) {
            case 'fromField':
                if (!empty($bundleSettings['seoImageField'])) {
                    $globalsSettings['seoImage'] = '{seomatic.helper.socialTransform('
                        .'object.entry.'.$bundleSettings['seoImageField'].'.one()'
                        .', "base"'
                        .', '.$siteId.')}';
                }
                break;
            case 'fromAsset':
                if (!empty($bundleSettings['seoImageIds'])) {
                    $globalsSettings['seoImage'] = '{seomatic.helper.socialTransform('
                        .$bundleSettings['seoImageIds'][0]
                        .', "base"'
                        .', '.$siteId.')}';
                }
                break;
        }
        $twitterCardTransform = 'twitter-summary';
        if ($globalsSettings['twitterCard'] == 'summary_large_image') {
            $twitterCardTransform = 'twitter-large';
        }
        // Handle the Twitter Image
        switch ($bundleSettings['twitterImageSource']) {
            case 'sameAsSeo':
                $globalsSettings['twitterImage'] = '{seomatic.meta.seoImage}';
                break;
            case 'fromField':
                if (!empty($bundleSettings['twitterImageField'])) {
                    $globalsSettings['twitterImage'] = '{seomatic.helper.socialTransform('
                        .'object.entry.'.$bundleSettings['twitterImageField'].'.one()'
                        .', "'.$twitterCardTransform.'"'
                        .', '.$siteId.')}';
                }
                break;
            case 'fromAsset':
                if (!empty($bundleSettings['twitterImageIds'])) {
                    $globalsSettings['twitterImage'] = '{seomatic.helper.socialTransform('
                        .$bundleSettings['twitterImageIds'][0]
                        .', "'.$twitterCardTransform.'"'
                        .', '.$siteId.')}';
                }
                break;
        }
        // Handle the Facebook IG Image
        switch ($bundleSettings['ogImageSource']) {
            case 'sameAsSeo':
                $globalsSettings['ogImage'] = '{seomatic.meta.seoImage}';
                break;
            case 'fromField':
                if (!empty($bundleSettings['ogImageField'])) {
                    $globalsSettings['ogImage'] = '{seomatic.helper.socialTransform('
                        .'object.entry.'.$bundleSettings['ogImageField'].'.one()'
                        .', "facebook"'
                        .', '.$siteId.')}';
                }
                break;
            case 'fromAsset':
                if (!empty($bundleSettings['ogImageIds'])) {
                    $globalsSettings['ogImage'] = '{seomatic.helper.socialTransform('
                        .$bundleSettings['ogImageIds'][0]
                        .', "facebook"'
                        .', '.$siteId.')}';
                }
                break;
        }
    }
}
