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
use craft\base\Element;
use craft\web\Controller;

use yii\caching\TagDependency;
use yii\web\Response;
use yii\web\JsonResponseFormatter;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainerController extends Controller
{
    // Constants
    // =========================================================================

    const CACHE_KEY = 'seomatic_metacontroller_';

    // Protected Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = [
        'all-meta-containers',
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

    // Protected Methods
    // =========================================================================

    protected function getContainerArrays(
        array $containerKeys,
        string $uri,
        int $siteId = null,
        bool $asArray = false
    ): array {
        $result = [];

        // Normalize the incoming URI to account for `__home__`
        $uri = ($uri === '__home__') ? '' : $uri;

        // Determine the siteId
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        $uri = trim($uri, '/');

        // Add a caching layer on top of controller requests
        $sourceId = '';
        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementByUri($uri, $siteId, false);
        if ($element !== null) {
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId)
                = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
        }
        $metaContainers = Seomatic::$plugin->metaContainers;
        // Get our cache key
        $asArrayKey = $asArray ? 'true' : 'false';
        $cacheKey = $uri.$siteId.implode($containerKeys).$asArrayKey;
        // Load the meta containers
        $dependency = new TagDependency([
            'tags' => [
                $metaContainers::GLOBAL_METACONTAINER_CACHE_TAG,
                $metaContainers::METACONTAINER_CACHE_TAG.$sourceId,
                $metaContainers::METACONTAINER_CACHE_TAG.$uri.$siteId,
                $metaContainers::METACONTAINER_CACHE_TAG.$cacheKey,
            ],
        ]);

        $cache = Craft::$app->getCache();
        $result = $cache->getOrSet(
            $this::CACHE_KEY.$cacheKey,
            function () use ($uri, $siteId, $containerKeys, $asArray) {
                $result = [];
                Craft::info(
                    'Meta controller container cache miss: '.$uri.'/'.$siteId,
                    __METHOD__
                );
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

                return $result;
            },
            Seomatic::$cacheDuration,
            $dependency
        );

        // use "pretty" output in debug mode
        Craft::$app->response->formatters[Response::FORMAT_JSON] = [
            'class' => JsonResponseFormatter::class,
            'prettyPrint' => YII_DEBUG,
        ];

        return $result;
    }
}
