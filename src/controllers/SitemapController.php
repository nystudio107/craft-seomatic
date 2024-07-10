<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use Craft;
use craft\web\Controller;
use nystudio107\seomatic\helpers\PluginTemplate;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Sitemaps;

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
    protected array|bool|int $allowAnonymous = [
        'sitemap-index',
        'sitemap-index-redirect',
        'sitemap',
        'sitemap-styles',
        'sitemap-empty-styles',
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
        $headers->add('X-Robots-Tag', 'noindex');

        return $this->asRaw($xml);
    }

    /**
     * Redirect from `sitemap.xml` to the actual sitemap for this site
     *
     * @return Response
     */
    public function actionSitemapIndexRedirect(): Response
    {
        $url = Seomatic::$plugin->sitemaps->sitemapIndexUrlForSiteId();

        return $this->redirect($url, 302);
    }

    /**
     * Render the sitemap-style.xsl template
     *
     * @return Response
     */
    public function actionSitemapStyles(): Response
    {
        $xml = PluginTemplate::renderPluginTemplate('_frontend/pages/sitemap-styles.twig', []);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $headers->add('X-Robots-Tag', 'noindex');

        return $this->asRaw($xml);
    }

    /**
     * Render the sitemap-empty-styles.xsl template
     *
     * @return Response
     */
    public function actionSitemapEmptyStyles(): Response
    {
        $xml = PluginTemplate::renderPluginTemplate('_frontend/pages/sitemap-empty-styles.twig', []);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $headers->add('X-Robots-Tag', 'noindex');

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
    public function actionSitemap(int $groupId, string $type, string $handle, int $siteId, string $file): Response
    {
        $page = null;

        if (preg_match('/sitemap-p([\d]+)\.xml/i', $file, $matches)) {
            $page = $matches[1];
        }

        $xml = Seomatic::$plugin->sitemaps->renderTemplate(
            Sitemaps::SEOMATIC_SITEMAP_CONTAINER,
            [
                'groupId' => $groupId,
                'type' => $type,
                'handle' => $handle,
                'siteId' => $siteId,
                'page' => $page,
            ]
        );
        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $headers->add('X-Robots-Tag', 'noindex');

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
        $headers->add('X-Robots-Tag', 'noindex');

        return $this->asRaw($xml);
    }
}
