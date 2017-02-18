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

use Craft;
use craft\web\Controller;

/**
 * Sitemap controller for SEOmatic
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */
class SitemapController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = ['get-index'];

    // Public Methods
    // =========================================================================

    /**
     * Returns the sitemap index.
     *
     * @return string
     */
    public function actionGetIndex()
    {
        $view = Craft::$app->getView();
        $view->setTemplatesPath(Seomatic::$plugin->getBasePath());
        return $this->renderTemplate('templates/sitemap-index', array(
        ));
    }
}
