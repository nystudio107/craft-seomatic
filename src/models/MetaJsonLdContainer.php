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

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use Craft;

use yii\caching\TagDependency;
use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaJsonLdContainer extends MetaContainer
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaJsonLdContainer';

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var MetaJsonLd[] $data
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function includeMetaData($dependency)
    {
        Craft::beginProfile('MetaJsonLdContainer::includeMetaData', __METHOD__);
        $uniqueKey = $this->handle.$dependency->tags[3];
        $cache = Craft::$app->getCache();
        if ($this->clearCache) {
            TagDependency::invalidate($cache, $uniqueKey);
        }
        $tagData = $cache->getOrSet(
            $this::CONTAINER_TYPE.$uniqueKey,
            function () use ($uniqueKey) {
                Craft::info(
                    $this::CONTAINER_TYPE.' cache miss: '.$uniqueKey,
                    __METHOD__
                );
                $tagData = [];
                if ($this->prepForInclusion()) {
                    /** @var $metaJsonLdModel MetaJsonLd */
                    foreach ($this->data as $metaJsonLdModel) {
                        if ($metaJsonLdModel->include) {
                            $options = $metaJsonLdModel->tagAttributes();
                            if ($metaJsonLdModel->prepForRender($options)) {
                                $jsonLd = $metaJsonLdModel->render([
                                    'renderRaw'        => true,
                                    'renderScriptTags' => false,
                                    'array'            => false,
                                ]);
                                $tagData[] = [
                                    'jsonLd' => $jsonLd,
                                    'position' => View::POS_END
                                ];
                                // If `devMode` is enabled, validate the JSON-LD and output any model errors
                                if (Seomatic::$devMode) {
                                    $metaJsonLdModel->debugMetaItem(
                                        'JSON-LD property: ',
                                        [
                                            'default' => 'error',
                                            'google'  => 'warning',
                                        ]
                                    );
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
        // Register the tags
        foreach ($tagData as $config) {
            Seomatic::$view->registerScript(
                $config['jsonLd'],
                $config['position'],
                ['type' => 'application/ld+json']
            );
        }
        Craft::endProfile('MetaJsonLdContainer::includeMetaData', __METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        parent::normalizeContainerData();

        foreach ($this->data as $key => $config) {
            $schemaType = $config['type'];
            $config['key'] = $key;
            $schemaType = MetaValueHelper::parseString($schemaType);
            $jsonLd = MetaJsonLd::create($schemaType, $config);
            // Retain the intended type
            $jsonLd->type = $config['type'];
            $this->data[$key] = $jsonLd;
        }
    }
}
