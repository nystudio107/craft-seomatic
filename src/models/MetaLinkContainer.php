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
     * @var MetaLink
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function includeMetaData(): void
    {
        $view = Craft::$app->getView();
        /** @var $metaLinkModel MetaLink */
        foreach ($this->data as $metaLinkModel) {
            $view->registerLinkTag($metaLinkModel->tagAttributes());
            // If `devMode` is enabled, validate the Meta Link and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $metaLinkModel->debugMetaItem(
                    "Link attribute: "
                );
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData(): void
    {
    }
}
