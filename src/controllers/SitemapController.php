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
        'sitemap',
        'sitemap-custom',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Returns the rendered sitemap index.
     *
     * @param int $groupId Which Site Group the sitemap index is for
     *
     * @return Response
     */
    public function actionSitemapIndex(int $groupId, int $siteId = null): Response
    {
        $xml = Seomatic::$plugin->sitemaps->renderTemplate(
            Sitemaps::SEOMATIC_SITEMAPINDEX_CONTAINER,
            [
                'groupId' => $groupId,
                'siteId' => $siteId ?? Craft::$app->getSites()->currentSite->id,
            ]
        );
        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }

    /**
     * Returns a rendered sitemap.
     *
     * @param int    $groupId Which Site Group the sitemap index is for
     * @param string $type
     * @param string $handle
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionSitemap(int $groupId, string $type, string $handle, int $siteId): Response
    {
        $xml = Seomatic::$plugin->sitemaps->renderTemplate(
            Sitemaps::SEOMATIC_SITEMAP_CONTAINER,
            [
                'groupId' => $groupId,
                'type' => $type,
                'handle' => $handle,
                'siteId' => $siteId,
            ]
        );
        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }

    /**
     * Returns a rendered custom sitemap.
     *
     * @param int $groupId Which Site Group the sitemap index is for
     * @param int $siteId
     *
     * @return Response
     */
    public function actionSitemapCustom(int $groupId, int $siteId): Response
    {
        $xml = Seomatic::$plugin->sitemaps->renderTemplate(
            Sitemaps::SEOMATIC_SITEMAPCUSTOM_CONTAINER,
            [
                'groupId' => $groupId,
                'siteId' => $siteId,
            ]
        );
        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');

        return $this->asRaw($xml);
    }
}
