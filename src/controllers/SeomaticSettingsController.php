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

use Craft;
use craft\helpers\UrlHelper;
use craft\web\Controller;

use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticSettingsController extends Controller
{
    const DOCUMENTATION_URL = 'https://github.com/nystudio107/craft3-seomatic/wiki';

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
     * Content
     *
     * @param array $variables
     *
     * @return Response The rendering result
     */
    public function actionContent(array $variables = []): Response
    {
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Content SEO');
        // Asset bundle
        Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
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
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'content';
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundles(false);
        // Render the template
        return $this->renderTemplate('seomatic/settings/content', $variables);
    }

    /**
     * Global
     *
     * @param array $variables
     *
     * @return Response The rendering result
     */
    public function actionGlobal(array $variables = []): Response
    {
        $pluginName = Seomatic::$settings->pluginName;
        $templateTitle = Craft::t('seomatic', 'Global SEO');
        // Asset bundle
        Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
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
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
            [
                'label' => $templateTitle,
                'url' => UrlHelper::cpUrl('seomatic'),
            ],
        ];
        $variables['selectedSubnavItem'] = 'global';
        $variables['metaBundles'] = Seomatic::$plugin->metaBundles->getContentMetaBundles(false);
        // Render the template
        return $this->renderTemplate('seomatic/settings/global', $variables);
    }

}
