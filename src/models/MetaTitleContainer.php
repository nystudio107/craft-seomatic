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
class MetaTitleContainer extends MetaContainer
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaTitleContainer';

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var MetaTitle[] $data
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
            /** @var $metaTitleModel MetaTitle */
            foreach ($this->data as $metaTitleModel) {
                if ($metaTitleModel->include) {
                    $title = $metaTitleModel->title;
                    if ($metaTitleModel->prepForRender($title)) {
                        Seomatic::$view->title = $title;
                        // If `devMode` is enabled, validate the Meta Tag and output any model errors
                        if (Seomatic::$devMode) {
                            $scenario = [];
                            $scenario['default'] = 'error';
                            $scenario['warning'] = 'warning';
                            $metaTitleModel->debugMetaItem(
                                'Tag attribute: ',
                                $scenario
                            );
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
            $this->data[$key] = MetaTitle::create($config);
        }
    }
}
