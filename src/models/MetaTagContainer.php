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

use yii\web\View;


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

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

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
        $view = Craft::$app->getView();
        /** @var $metaTagModel MetaTag */
        foreach ($this->data as $metaTagModel) {
            $view->registerMetaTag($metaTagModel->tagAttributes());
            // If `devMode` is enabled, validate the Meta Tag and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $metaTagModel->debugMetaItem(
                    "Tag attribute: "
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

    // Private Methods
    // =========================================================================
}
