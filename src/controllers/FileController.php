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
use craft\helpers\FileHelper;
use craft\web\Controller;

use nystudio107\seomatic\helpers\UrlHelper;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
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
     * @param string $robots
     * @param string $canonical
     * @param bool   $inline
     * @param string $fileName
     *
     * @return Response|\yii\console\Response
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function actionSeoFileLink($url, $robots = '', $canonical = '', $inline = true, $fileName = '')
    {
        $url = base64_decode($url);
        $robots = base64_decode($robots);
        $canonical = base64_decode($canonical);
        $url = UrlHelper::absoluteUrlWithProtocol($url);
        $contents = file_get_contents($url);
        $response = Craft::$app->getResponse();
        if ($contents) {
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
            $response->sendContentAsFile(
                $contents,
                $fileName,
                [
                    'inline' => $inline,
                    'mimeType' => FileHelper::getMimeTypeByExtension($fileName)
                ]
            );
        } else {
            throw new NotFoundHttpException(Craft::t('seomatic', 'File not found.'));
        }

        return $response;
    }
}
