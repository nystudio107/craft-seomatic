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
use nystudio107\seomatic\services\Sitemaps;

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
     * Returns the rendered sitemap index.
     *
     * @return Response
     */
    public function actionSitemapIndex()
    {
        $xml = Seomatic::$plugin->sitemaps->renderTemplate(Sitemaps::SEOMATIC_SITEMAPINDEX_CONTAINER);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }

    /**
     * Returns a rendered sitemap.
     *
     * @param string      $handle
     * @param int         $siteId
     * @param string|null $file
     *
     * @return Response
     */
    public function actionSitemap(string $handle, int $siteId, string $file = null)
    {
        $xml = Seomatic::$plugin->sitemaps->renderTemplate(
            Sitemaps::SEOMATIC_SITEMAP_CONTAINER,
            [
                'handle' => $handle,
                'siteId' => $siteId
            ]
        );

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }
}
