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

namespace nystudio107\seomatic\helpers;

use Craft;

use craft\helpers\Template;

use craft\web\View;
use nystudio107\minify\Minify;
use nystudio107\seomatic\Seomatic;

use yii\base\Exception;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class PluginTemplate
{
    // Constants
    // =========================================================================

    public const MINIFY_PLUGIN_HANDLE = 'minify';

    // Static Methods
    // =========================================================================

    /**
     * Render the passed in Twig string template, catching any errors
     *
     * @param string $templateString
     * @param array $params
     * @return string
     */
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
     * @param string      $templatePath
     * @param array       $params
     * @param string|null $minifier
     *
     * @return string
     */
    public static function renderPluginTemplate(
        string $templatePath,
        array $params = [],
        string $minifier = null,
    ): string {
        $template = 'seomatic/' . $templatePath;
        $oldMode = Craft::$app->view->getTemplateMode();
        // Look for the template on the frontend first
        try {
            $templateMode = View::TEMPLATE_MODE_CP;
            if (Craft::$app->view->doesTemplateExist($template, View::TEMPLATE_MODE_SITE)) {
                $templateMode = View::TEMPLATE_MODE_SITE;
            }
            Craft::$app->view->setTemplateMode($templateMode);
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }

        // Render the template with our vars passed in
        try {
            $htmlText = Craft::$app->view->renderTemplate($template, $params);
            if ($minifier) {
                // If Minify is installed, use it to minify the template
                $minify = Craft::$app->getPlugins()->getPlugin(self::MINIFY_PLUGIN_HANDLE);
                if ($minify) {
                    $htmlText = Minify::$plugin->minify->$minifier($htmlText);
                }
            }
        } catch (\Exception $e) {
            $htmlText = Craft::t(
                'seomatic',
                'Error rendering `{template}` -> {error}',
                ['template' => $templatePath, 'error' => $e->getMessage()]
            );
            Craft::error($htmlText, __METHOD__);
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
