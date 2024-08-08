<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\base\Element;
use craft\errors\SiteNotFoundException;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\Seomatic;
use yii\caching\TagDependency;
use yii\web\BadRequestHttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class Container
{
    // Constants
    // =========================================================================

    public const CACHE_KEY = 'seomatic_metacontroller_';

    // Static Methods
    // =========================================================================

    /**
     * Return an array of meta containers for the given array of keys
     *
     * @param array $containerKeys
     * @param string $uri
     * @param int|null $siteId
     * @param bool $asArray
     *
     * @return array
     */
    public static function getContainerArrays(
        array  $containerKeys,
        string $uri,
        int    $siteId = null,
        bool   $asArray = false,
    ): array {
        // Normalize the incoming URI to account for `__home__`
        $uri = ($uri === '__home__') ? '' : $uri;
        // Determine the siteId
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        // Set Craft's current site to the siteId we decided upon, stashing the current site first
        $sites = Craft::$app->getSites();
        $oldCurrentSite = $siteId;
        try {
            $oldCurrentSite = $sites->getCurrentSite();
        } catch (SiteNotFoundException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $sites->setCurrentSite($siteId);
        // Trim the URI
        $uri = trim($uri, '/');
        // Add a caching layer on top of controller requests
        $sourceId = '';
        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementByUri($uri, $siteId, false);
        $sourceBundleType = '';
        if ($element !== null) {
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId, $typeId)
                = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
        }
        $metaContainers = Seomatic::$plugin->metaContainers;
        // Cache requests that have a token associated with them separately
        $token = '';
        $request = Craft::$app->getRequest();
        if (!$request->isConsoleRequest) {
            try {
                $token = $request->getToken() ?? '';
            } catch (BadRequestHttpException $e) {
            }
        }
        // Get our cache key
        $asArrayKey = $asArray ? 'true' : 'false';
        $cacheKey = $uri . $siteId . implode($containerKeys) . $asArrayKey . Seomatic::$environment . $token;
        // Load the meta containers
        $dependency = new TagDependency([
            'tags' => [
                $metaContainers::GLOBAL_METACONTAINER_CACHE_TAG,
                $metaContainers::METACONTAINER_CACHE_TAG . $sourceId . $sourceBundleType . $siteId,
                $metaContainers::METACONTAINER_CACHE_TAG . $uri . $siteId,
                $metaContainers::METACONTAINER_CACHE_TAG . $cacheKey,
            ],
        ]);
        $cache = Craft::$app->getCache();
        $result = $cache->getOrSet(
            self::CACHE_KEY . $cacheKey,
            function() use ($uri, $siteId, $containerKeys, $asArray) {
                $result = [];
                Craft::info(
                    'Meta controller container cache miss: ' . $uri . '/' . $siteId,
                    __METHOD__
                );
                // Load the meta containers and parse our globals
                Seomatic::$headlessRequest = true;
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
        // Restore old current site
        $sites->setCurrentSite($oldCurrentSite);
        // Invalidate the cache we just created if there were pending image transforms in it
        if (ImageTransformHelper::$pendingImageTransforms) {
            TagDependency::invalidate($cache, $dependency->tags[3]);
        }

        return $result;
    }
}
