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

namespace nystudio107\seomatic\controllers;

use Craft;
use craft\base\Element;
use craft\elements\Entry;
use craft\web\Controller;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.13
 */
class PreviewController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected array|bool|int $allowAnonymous = [
        'social-media',
    ];

    // Public Methods
    // =========================================================================

    /**
     * @param $elementId
     * @param $siteId
     *
     * @return \yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionSocialMedia($elementId, $siteId = null)
    {
        $html = '';

        // Don't allow the preview to be accessed publicly
        $this->requireAuthorization(Seomatic::SEOMATIC_PREVIEW_AUTHORIZATION_KEY . $elementId);

        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementById($elementId, null, $siteId);
        if ($element !== null) {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
            /** @var  $entry Entry */
            if ($element->uri !== null) {
                Seomatic::$plugin->metaContainers->previewMetaContainers($element->uri, $element->siteId, true);
                // Render our preview sidebar template
                if (Seomatic::$matchedElement) {
                    $html = PluginTemplate::renderPluginTemplate('_frontend/preview/social-media.twig');
                }
            }
        }

        return $this->asRaw($html);
    }
}
