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
use nystudio107\seomatic\services\FrontendTemplates;

use Craft;
use craft\web\Controller;

use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class FrontendTemplateController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'humans',
        'robots',
        'ads',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Returns the rendered humans.txt
     *
     * @return Response
     */
    public function actionHumans(): Response
    {
        $text = Seomatic::$plugin->frontendTemplates->renderTemplate(FrontendTemplates::HUMANS_TXT_HANDLE);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/plain; charset=utf-8');

        return $this->asRaw($text);
    }

    /**
     * Returns the rendered robots.txt
     *
     * @return Response
     */
    public function actionRobots(): Response
    {
        $text = Seomatic::$plugin->frontendTemplates->renderTemplate(FrontendTemplates::ROBOTS_TXT_HANDLE);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/plain; charset=utf-8');

        return $this->asRaw($text);
    }

    /**
     * Returns the rendered humans.txt
     *
     * @return Response
     */
    public function actionAds(): Response
    {
        $text = Seomatic::$plugin->frontendTemplates->renderTemplate(FrontendTemplates::ADS_TXT_HANDLE);

        $headers = Craft::$app->response->headers;
        $headers->add('Content-Type', 'text/plain; charset=utf-8');

        return $this->asRaw($text);
    }
}
