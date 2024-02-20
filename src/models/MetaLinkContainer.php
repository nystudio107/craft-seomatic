<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use Craft;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\Seomatic;
use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaLinkContainer extends MetaContainer
{
    // Constants
    // =========================================================================

    public const CONTAINER_TYPE = 'MetaLinkContainer';

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var MetaLink[] $data
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function includeMetaData($dependency)
    {
        Craft::beginProfile('MetaLinkContainer::includeMetaData', __METHOD__);
        $uniqueKey = $this->handle . $dependency->tags[3];
        $cache = Craft::$app->getCache();
        if ($this->clearCache) {
            TagDependency::invalidate($cache, $dependency->tags[3]);
        }
        $tagData = $cache->getOrSet(
            self::CONTAINER_TYPE . $uniqueKey,
            function() use ($uniqueKey) {
                Craft::info(
                    self::CONTAINER_TYPE . ' cache miss: ' . $uniqueKey,
                    __METHOD__
                );
                $tagData = [];
                if ($this->prepForInclusion()) {
                    /** @var MetaLink $metaLinkModel */
                    foreach ($this->data as $metaLinkModel) {
                        if ($metaLinkModel->include) {
                            $configs = $metaLinkModel->tagAttributesArray();
                            foreach ($configs as $config) {
                                if ($metaLinkModel->prepForRender($config)) {
                                    $tagData[] = $config;
                                    // If `devMode` is enabled, validate the Meta Link and output any model errors
                                    if (Seomatic::$devMode) {
                                        $metaLinkModel->debugMetaItem(
                                            'Link attribute: '
                                        );
                                    }
                                }
                            }
                        }
                    }
                }

                return $tagData;
            },
            Seomatic::$cacheDuration,
            $dependency
        );
        // Invalidate the cache we just created if there were pending image transforms in it
        if (ImageTransformHelper::$pendingImageTransforms) {
            TagDependency::invalidate($cache, $dependency->tags[3]);
        }
        // Register the tags
        foreach ($tagData as $config) {
            Seomatic::$view->registerLinkTag($config);
        }
        Craft::endProfile('MetaLinkContainer::includeMetaData', __METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        parent::normalizeContainerData();

        /** @var array $config */
        foreach ($this->data as $key => $config) {
            $config['key'] = $key;
            $this->data[$key] = MetaLink::create($key, $config);
        }
    }
}
