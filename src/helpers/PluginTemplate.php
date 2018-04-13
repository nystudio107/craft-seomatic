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

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\Seomatic;

use Craft;
use craft\helpers\Template;
use craft\web\View;
use yii\base\Exception;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class PluginTemplate
{
    // Static Methods
    // =========================================================================

    public static function renderStringTemplate(string $templateString, array $params = []): string
    {
        try {
            $html = Seomatic::$view->renderString($templateString, $params);
        } catch (\Exception $e) {
            $html = Craft::t(
                'seomatic',
                'Error rendering template string -> {error}',
                ['error' => $e->getMessage()]
            );
            Craft::error($html, __METHOD__);
        }

        return $html;
    }

    /**
     * Render a plugin template
     *
     * @param $templatePath
     * @param $params
     *
     * @return string
     */
    public static function renderPluginTemplate(string $templatePath, array $params = []): string
    {
        // Stash the old template mode, and set it AdminCP template mode
        $oldMode = Craft::$app->view->getTemplateMode();
        try {
            Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }

        // Render the template with our vars passed in
        try {
            $htmlText = Craft::$app->view->renderTemplate('seomatic/' . $templatePath, $params);
            $templateRendered = true;
        } catch (\Exception $e) {
            $htmlText = Craft::t(
                'seomatic',
                'Error rendering `{template}` -> {error}',
                ['template' => $templatePath, 'error' => $e->getMessage()]
            );
            Craft::error($htmlText, __METHOD__);
            $templateRendered = false;
        }

        // If we couldn't find a plugin template, look for a frontend template
        if (!$templateRendered) {
            try {
                Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_SITE);
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
            // Render the template with our vars passed in
            try {
                $htmlText = Craft::$app->view->renderTemplate($templatePath, $params);
                $templateRendered = true;
            } catch (\Exception $e) {
                $htmlText = Craft::t(
                    'seomatic',
                    'Error rendering `{template}` -> {error}',
                    ['template' => $templatePath, 'error' => $e->getMessage()]
                );
                Craft::error($htmlText, __METHOD__);
                $templateRendered = false;
            }
        }

        // Restore the old template mode
        try {
            Craft::$app->view->setTemplateMode($oldMode);
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }

        return Template::raw($htmlText);
    }
}
