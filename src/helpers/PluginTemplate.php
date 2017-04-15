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

use Craft;
use craft\base\Component;
use craft\helpers\Template;
use craft\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class PluginTemplate extends Component
{
    // Static Methods
    // =========================================================================

    /**
     * Render a plugin template
     *
     * @param $templatePath
     * @param $vars
     *
     * @return string
     */
    public static function renderPluginTemplate($templatePath, $vars)
    {
        // Stash the old template mode, and set it AdminCP template mode
        $oldMode = Craft::$app->view->getTemplateMode();
        Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);

        // Render the template with our vars passed in
        try {
            $htmlText = Craft::$app->view->renderTemplate('seomatic/' . $templatePath, $vars);
        } catch (\Exception $e) {
            $htmlText = 'Error rendering template ' . $templatePath . ' -> ' . $e->getMessage();
            Craft::error(Craft::t('seomatic', $htmlText), __METHOD__);
        }

        // Restore the old template mode
        Craft::$app->view->setTemplateMode($oldMode);

        return Template::raw($htmlText);
    }
}
