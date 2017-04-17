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

use yii\web\Response;

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
        'sitemap-index',
        'sitemap'
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
        $xml = Seomatic::$plugin->sitemap->renderTemplate('sitemap-index');

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }

    /**
     * Returns a sitemap.
     *
     * @return string
     */
    public function actionSitemap($handle, $file = null)
    {
        $xml = Seomatic::$plugin->sitemap->renderTemplate(
            'sitemap',
            ['handle' => $handle]
        );

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }
}
