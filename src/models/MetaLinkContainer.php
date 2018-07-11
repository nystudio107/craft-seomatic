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

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaLinkContainer extends MetaContainer
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaLinkContainer';

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
        $uniqueKey = $this->handle.$dependency->tags[2];
        $tagData = Craft::$app->getCache()->getOrSet(
            $this::CONTAINER_TYPE.$uniqueKey,
            function () use ($uniqueKey) {
                Craft::info(
                    $this::CONTAINER_TYPE.' cache miss: '.$uniqueKey,
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

        foreach ($this->data as $key => $config) {
            $config['key'] = $key;
            $this->data[$key] = MetaLink::create($key, $config);
        }
    }
}
