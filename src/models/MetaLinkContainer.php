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
    public function includeMetaData()
    {
        if ($this->prepForInclusion()) {
            /** @var MetaLink $metaLinkModel */
            foreach ($this->data as $metaLinkModel) {
                if ($metaLinkModel->include) {
                    $configs = $metaLinkModel->tagAttributesArray();
                    foreach ($configs as $config) {
                        if ($metaLinkModel->prepForRender($config)) {
                            Seomatic::$view->registerLinkTag($config);
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
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        parent::normalizeContainerData();

        foreach ($this->data as $key => $config) {
            $config['key'] = $key;
            $this->data[$key] = MetaLink::create($config);
        }
    }
}
