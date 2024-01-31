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
use nystudio107\seomatic\helpers\Container as ContainerHelper;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaSiteVars;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\Seomatic;
use yii\web\JsonResponseFormatter;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainerController extends Controller
{
    // Protected Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected array|bool|int $allowAnonymous = [
        'all-meta-containers',
        'meta-title-container',
        'meta-tag-container',
        'meta-link-container',
        'meta-script-container',
        'meta-json-ld-container',
        'meta-site-vars-container',
        'frontend-template-container',
    ];

    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public function beforeAction($action): bool
    {
        if (!Seomatic::$settings->enableMetaContainerEndpoint) {
            $this->allowAnonymous = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * Return all of the containers
     * URI: /actions/seomatic/meta-container/all-meta-containers?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionAllMetaContainers(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaTitleContainer::CONTAINER_TYPE,
                MetaTagContainer::CONTAINER_TYPE,
                MetaLinkContainer::CONTAINER_TYPE,
                MetaScriptContainer::CONTAINER_TYPE,
                MetaJsonLdContainer::CONTAINER_TYPE,
                MetaSiteVars::CONTAINER_TYPE,
                MetaSiteVars::CONTAINER_TYPE,
                FrontendTemplateContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the MetaTitleContainer
     * URI: /actions/seomatic/meta-container/meta-title-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionMetaTitleContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaTitleContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the MetaTagContainer
     * URI: /actions/seomatic/meta-container/meta-tag-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionMetaTagContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaTagContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the MetaLinkContainer
     * URI: /actions/seomatic/meta-container/meta-link-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionMetaLinkContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaLinkContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the MetaScriptContainer
     * URI: /actions/seomatic/meta-container/meta-script-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionMetaScriptContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaScriptContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the MetaJsonLdContainer
     * URI: /actions/seomatic/meta-container/meta-json-ld-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionMetaJsonLdContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaJsonLdContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the MetaSiteVars "container"
     * URI: /actions/seomatic/meta-container/meta-site-vars-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionMetaSiteVarsContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                MetaSiteVars::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }

    /**
     * Return the FrontendTemplateContainer "container"
     * URI: /actions/seomatic/meta-container/frontend-template-container?uri=/
     *
     * @param string $uri
     * @param int $siteId
     * @param bool $asArray
     *
     * @return Response
     */
    public function actionFrontendTemplateContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = ContainerHelper::getContainerArrays(
            [
                FrontendTemplateContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $this->asJson($result);
    }
}
