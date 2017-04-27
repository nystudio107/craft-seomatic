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
class MetaTagContainer extends MetaContainer
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaTagContainer';

    const TAGS_WITH_VALIDATION = [
        'description',
        'referrer',
        'robots',
    ];

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var MetaTag
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function includeMetaData(): void
    {
        /** @var $metaTagModel MetaTag */
        foreach ($this->data as $metaTagModel) {
            if ($metaTagModel->include) {
                $options = $metaTagModel->tagAttributes();
                $metaTagModel->prepForRender($options);
                Seomatic::$view->registerMetaTag($options);
                // If `devMode` is enabled, validate the Meta Tag and output any model errors
                if (Seomatic::$devMode) {
                    $scenario = [];
                    $scenario['default'] = 'error';
                    // Special validation for certain meta tags
                    if (!empty($options['name'])) {
                        if (in_array($options['name'], self::TAGS_WITH_VALIDATION)) {
                            $scenario[$options['name']] = 'warning';
                        }
                    }
                    $metaTagModel->debugMetaItem(
                        "Tag attribute: ",
                        $scenario
                    );
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData(): void
    {
        foreach ($this->data as $key => $config) {
            $this->data[$key] = MetaTag::create($config);
        }
    }
}
