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
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\models\MetaTagContainer;

use Craft;
use craft\web\Controller;

use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainerController extends Controller
{
    // Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'all',
        'meta-title-container',
        'meta-tag-container',
        'meta-link-container',
        'meta-script-container',
        'meta-json-ld-container',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Return all of the containers
     * URI: /actions/seomatic/meta-container/all-meta-containers?path=&siteId=
     *
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionAllMetaContainers(string $path, int $siteId = null)
    {
        $result = $this->getContainerArrays(
            [
                MetaTitleContainer::CONTAINER_TYPE,
                MetaTagContainer::CONTAINER_TYPE,
                MetaLinkContainer::CONTAINER_TYPE,
                MetaScriptContainer::CONTAINER_TYPE,
                MetaJsonLdContainer::CONTAINER_TYPE,
            ],
            $path,
            $siteId
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaTitleContainer
     * URI: /actions/seomatic/meta-container/meta-title-container?path=&siteId=
     *
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionMetaTitleContainer(string $path, int $siteId = null)
    {
        $result = $this->getContainerArrays(
            [
                MetaTitleContainer::CONTAINER_TYPE,
            ],
            $path,
            $siteId
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaTagContainer
     * URI: /actions/seomatic/meta-container/meta-tag-container?path=&siteId=
     *
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionMetaTagContainer(string $path, int $siteId = null)
    {
        $result = $this->getContainerArrays(
            [
                MetaTagContainer::CONTAINER_TYPE,
            ],
            $path,
            $siteId
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaLinkContainer
     * URI: /actions/seomatic/meta-container/meta-link-container?path=&siteId=
     *
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionMetaLinkContainer(string $path, int $siteId = null)
    {
        $result = $this->getContainerArrays(
            [
                MetaLinkContainer::CONTAINER_TYPE,
            ],
            $path,
            $siteId
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaScriptContainer
     * URI: /actions/seomatic/meta-container/meta-script-container?path=&siteId=
     *
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionMetaScriptContainer(string $path, int $siteId = null)
    {
        $result = $this->getContainerArrays(
            [
                MetaScriptContainer::CONTAINER_TYPE,
            ],
            $path,
            $siteId
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaJsonLdContainer
     * URI: /actions/seomatic/meta-container/meta-json-ld-container?path=&siteId=
     *
     * @param string $path
     * @param int    $siteId
     *
     * @return Response
     */
    public function actionMetaJsonLdContainer(string $path, int $siteId = null)
    {
        $result = $this->getContainerArrays(
            [
                MetaJsonLdContainer::CONTAINER_TYPE,
            ],
            $path,
            $siteId
        );

        return $this->asJson($result);
    }

    // Protected Methods
    // =========================================================================

    protected function getContainerArrays(array $containerKeys, string $path, int $siteId = null): array
    {
        $result = [];

        Seomatic::$plugin->metaContainers->loadMetaContainers($path, $siteId);
        // Iterate through the desired $containerKeys
        foreach ($containerKeys as $containerKey) {
            Seomatic::$plugin->metaContainers->loadMetaContainers($path, $siteId);
            $result[$containerKey] = Seomatic::$plugin->metaContainers->renderContainersArrayByType(
                $containerKey
            );
        }
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => 'yii\web\JsonResponseFormatter',
            'prettyPrint' => YII_DEBUG,
        ];

        return $result;
    }
}
