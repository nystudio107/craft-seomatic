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
use yii\web\JsonResponseFormatter;

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
        'all-meta-containers',
        'all-meta-containers-for-site',
        'meta-title-container',
        'meta-title-container-for-site',
        'meta-tag-container',
        'meta-tag-container-for-site',
        'meta-link-container',
        'meta-link-container-for-site',
        'meta-script-container',
        'meta-script-container-for-site',
        'meta-json-ld-container',
        'meta-json-ld-container-for-site',
    ];

    // Public Methods
    // =========================================================================

    /**
     * Return all of the containers
     * URI: /actions/seomatic/meta-container/all-meta-containers?path=&siteId=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionAllMetaContainers(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = $this->getContainerArrays(
            [
                MetaTitleContainer::CONTAINER_TYPE,
                MetaTagContainer::CONTAINER_TYPE,
                MetaLinkContainer::CONTAINER_TYPE,
                MetaScriptContainer::CONTAINER_TYPE,
                MetaJsonLdContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );

        return $this->asJson($result);
    }

    /**
     * Return all of the containers for a given site handle
     * URI: /actions/seomatic/meta-container/all-meta-containers-for-site?path=&site=
     *
     * @param string $uri
     * @param string $site
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionAllMetaContainersForSite(string $uri, string $site = null, bool $asArray = false): Response
    {
        $siteId = Craft::$app->getSites()->getSiteByHandle($site)->id;

        return $this->actionAllMetaContainers($uri, $siteId, $asArray);
    }

    /**
     * Return the MetaTitleContainer
     * URI: /actions/seomatic/meta-container/meta-title-container?path=&siteId=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaTitleContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = $this->getContainerArrays(
            [
                MetaTitleContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaTitleContainer for a given site handle
     * URI: /actions/seomatic/meta-container/meta-title-container-for-site?path=&site=
     *
     * @param string $uri
     * @param string $site
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaTitleContainerForSite(string $uri, string $site = null, bool $asArray = false): Response
    {
        $siteId = Craft::$app->getSites()->getSiteByHandle($site)->id;

        return $this->actionMetaTitleContainer($uri, $siteId, $asArray);
    }

    /**
     * Return the MetaTagContainer
     * URI: /actions/seomatic/meta-container/meta-tag-container?path=&siteId=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaTagContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = $this->getContainerArrays(
            [
                MetaTagContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaTagContainer for a given site handle
     * URI: /actions/seomatic/meta-container/meta-tag-container-for-site?path=&site=
     *
     * @param string $uri
     * @param string $site
     * @param bool   $asArray
     *
     * @return Response
     */
     public function actionMetaTagContainerForSite(string $uri, string $site = null, bool $asArray = false): Response
     {
        $siteId = Craft::$app->getSites()->getSiteByHandle($site)->id;

        return $this->actionMetaTagContainer($uri, $siteId, $asArray);
     }

    /**
     * Return the MetaLinkContainer
     * URI: /actions/seomatic/meta-container/meta-link-container?path=&siteId=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaLinkContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = $this->getContainerArrays(
            [
                MetaLinkContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaLinkContainer for a given site handle
     * URI: /actions/seomatic/meta-container/meta-link-container-for-site?path=&site=
     *
     * @param string $uri
     * @param string $site
     * @param bool   $asArray
     *
     * @return Response
     */
     public function actionMetaLinkContainerForSite(string $uri, string $site = null, bool $asArray = false): Response
     {
        $siteId = Craft::$app->getSites()->getSiteByHandle($site)->id;

        return $this->actionMetaLinkContainer($uri, $siteId, $asArray);
     }

    /**
     * Return the MetaScriptContainer
     * URI: /actions/seomatic/meta-container/meta-script-container?path=&siteId=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaScriptContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = $this->getContainerArrays(
            [
                MetaScriptContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaScriptContainer for a given site handle
     * URI: /actions/seomatic/meta-container/meta-script-container-for-site?path=&site=
     *
     * @param string $uri
     * @param string $site
     * @param bool   $asArray
     *
     * @return Response
     */
     public function actionMetaScriptContainerForSite(string $uri, string $site = null, bool $asArray = false): Response
     {
        $siteId = Craft::$app->getSites()->getSiteByHandle($site)->id;

        return $this->actionMetaScriptContainer($uri, $siteId, $asArray);
     }

    /**
     * Return the MetaJsonLdContainer
     * URI: /actions/seomatic/meta-container/meta-json-ld-container?path=&siteId=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaJsonLdContainer(string $uri, int $siteId = null, bool $asArray = false): Response
    {
        $result = $this->getContainerArrays(
            [
                MetaJsonLdContainer::CONTAINER_TYPE,
            ],
            $uri,
            $siteId,
            $asArray
        );

        return $this->asJson($result);
    }

    /**
     * Return the MetaJsonLdContainer for a given site handle
     * URI: /actions/seomatic/meta-container/meta-json-ld-container-for-site?path=&site=
     *
     * @param string $uri
     * @param int    $siteId
     * @param bool   $asArray
     *
     * @return Response
     */
    public function actionMetaJsonLdContainerForSite(string $uri, string $site = null, bool $asArray = false): Response
    {
        $siteId = Craft::$app->getSites()->getSiteByHandle($site)->id;

        return $this->actionMetaJsonLdContainer($uri, $siteId, $asArray);
    }

    // Protected Methods
    // =========================================================================

    protected function getContainerArrays(
        array $containerKeys,
        string $uri,
        int $siteId = null,
        bool $asArray = false
    ): array {
        $result = [];

        // Load the meta containers and parse our globals
        Seomatic::$plugin->metaContainers->previewMetaContainers($uri, $siteId, true);

        // Iterate through the desired $containerKeys
        foreach ($containerKeys as $containerKey) {
            if ($asArray) {
                $result[$containerKey] = Seomatic::$plugin->metaContainers->renderContainersArrayByType(
                    $containerKey
                );
            } else {
                $result[$containerKey] = Seomatic::$plugin->metaContainers->renderContainersByType(
                    $containerKey
                );
            }
        }
        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $result;
    }
}
