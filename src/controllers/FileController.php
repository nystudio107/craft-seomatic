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

use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\Seomatic;

use Craft;
use craft\elements\Asset;
use craft\helpers\FileHelper;
use craft\helpers\Assets as AssetsHelper;
use craft\web\Controller;

use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

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
     * @inheritDoc
     */
    public function beforeAction($action)
    {
        if (!Seomatic::$settings->enableSeoFileLinkEndpoint) {
            $this->allowAnonymous = false;
        }

        return parent::beforeAction($action);
    }

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
            // Ensure the file type is allowed
            // ref: https://craftcms.com/docs/3.x/config/config-settings.html#allowedfileextensions
            $allowedExtensions = Craft::$app->getConfig()->getGeneral()->allowedFileExtensions;
            if (($ext = pathinfo($fileName, PATHINFO_EXTENSION)) !== '') {
                $ext = strtolower($ext);
            }
            if ($ext === '' || !in_array($ext, $allowedExtensions, true)) {
                throw new ServerErrorHttpException(Craft::t('seomatic', 'File format not allowed.'));
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
