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

namespace nystudio107\seomatic\controllers;

use Craft;
use craft\web\Controller;

use nystudio107\seomatic\helpers\UrlHelper;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     1.0.0
 */
class FileController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'seo-file-link',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Allow setting the X-Robots-Tag and Link headers on static files as per:
     * https://moz.com/blog/how-to-advanced-relcanonical-http-headers
     *
     * @param        $url
     * @param bool   $inline
     * @param string $robots
     * @param string $canonical
     *
     * @return Response
     * @throws NotFoundHttpException
     * @throws HttpException
     */
    public function actionSeoFileLink($url, $robots = 'all', $canonical = '', $inline = true)
    {
        $url = UrlHelper::absoluteUrlWithProtocol($url);
        $contents = file_get_contents($url);
        if ($contents) {
            $path = parse_url($url, PHP_URL_PATH);
            $fileName = pathinfo($path, PATHINFO_BASENAME);
            $response = Craft::$app->getResponse();
            // Add the X-Robots-Tag header
            if (!empty($robots)) {
                $headerValue = $robots;
                $response->headers->add('X-Robots-Tag', $headerValue);
            }
            // Add the Link header
            if (!empty($canonical)) {
                $headerValue = '<'.$canonical.'>; rel="canonical"';
                $response->headers->add('Link', $headerValue);
            }
            // Send the file as a stream, so it can exist anywhere
            $result = $response->sendContentAsFile(
                $contents,
                $fileName,
                [
                    'inline' => $inline,
                ]
            );
        } else {
            throw new NotFoundHttpException(Craft::t('seomatic', 'File not found.'));
        }

        return $response;
    }
}
