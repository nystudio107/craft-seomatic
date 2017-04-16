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
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'sitemap-index'
    ];

    // Public Methods
    // =========================================================================

    /**
     * Returns the sitemap index.
     *
     * @return string
     */
    public function actionSitemapIndex()
    {
        $result = Seomatic::$plugin->sitemap->renderTemplate('sitemap-index');

        //return $this->asRaw($result);
        return $this->asXml($result);
    }
}
