<?php

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\models\MetaTagContainer;

use markhuot\CraftQL\Events\AlterSchemaFields;

use Craft;
use craft\base\Element;

use yii\caching\TagDependency;

class CraftQLSchemaHelper
{
    // Constants
    // =========================================================================

    const CACHE_KEY = 'seomatic_metacontroller_';

    public function handle(AlterSchemaFields $event)
    {
        $seoMaticField = $event->schema->createObjectType('SEOMaticData');

        $seoMaticField->addStringField('MetaTitleContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = $this->getContainerArrays(
                [
                    MetaTitleContainer::CONTAINER_TYPE,
                ],
                $element
            );
            return $result['MetaTitleContainer'];
        });

        $seoMaticField->addStringField('MetaTagContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = $this->getContainerArrays(
                [
                    MetaTagContainer::CONTAINER_TYPE,
                ],
                $element
            );
            return $result['MetaTagContainer'];
        });

        $seoMaticField->addStringField('MetaLinkContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = $this->getContainerArrays(
                [
                    MetaLinkContainer::CONTAINER_TYPE,
                ],
                $element
            );
            return $result['MetaLinkContainer'];
        });

        $seoMaticField->addStringField('MetaScriptContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = $this->getContainerArrays(
                [
                    MetaScriptContainer::CONTAINER_TYPE,
                ],
                $element
            );
            return $result['MetaScriptContainer'];
        });

        $seoMaticField->addStringField('MetaJsonLdContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = $this->getContainerArrays(
                [
                    MetaJsonLdContainer::CONTAINER_TYPE,
                ],
                $element
            );
            return $result['MetaJsonLdContainer'];
        });

        $event->schema->addField('seoMatic')
            ->type($seoMaticField)
            ->resolve(function (Element $root) {
                // Return the root, which is the requested Entry for usage in the fields.
                return $root;
            });
    }

    // Protected Methods
    // =========================================================================

    protected function getContainerArrays(
        array $containerKeys,
        Element $element,
        bool $asArray = false
    ): array {
        $result = [];

        // Normalize the incoming URI to account for `__home__`
        $uri = ($element->uri === '__home__') ? '' : $element->uri;
        $siteId = $element->siteId;

        // Determine the siteId
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        $uri = trim($uri, '/');

        // Add a caching layer on top of controller requests
        $sourceId = '';

        list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId)
            = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);

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

        return $result;
    }
}
