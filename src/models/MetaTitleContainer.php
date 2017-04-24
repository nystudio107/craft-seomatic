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
use nystudio107\seomatic\models\MetaTitle;

use Craft;

use yii\web\View;

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
     * @var MetaTitle
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
        /** @var $metaTitleModel MetaTitle */
        foreach ($this->data as $metaTitleModel) {
            if ($metaTitleModel->include) {
                $title = $metaTitleModel->title;
                $metaTitleModel->prepForRender($title);
                $view->title = $title;
                // If `devMode` is enabled, validate the Meta Tag and output any model errors
                if (Seomatic::$devMode) {
                    $metaTitleModel->debugMetaItem(
                        "Tag attribute: "
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
            $this->data[$key] = MetaTitle::create($config);
        }
    }
}
