<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\Seomatic;

use Craft;
use craft\base\Element;

use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class Container
{
    // Constants
    // =========================================================================

    const CACHE_KEY = 'seomatic_metacontroller_';

    // Static Methods
    // =========================================================================
    public static function getContainerArrays(
        array $containerKeys,
        string $uri,
        int $siteId = null,
        bool $asArray = false
    ): array {
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
            self::CACHE_KEY.$cacheKey,
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

        return $result;
    }
}
