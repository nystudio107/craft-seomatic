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
use nystudio107\seomatic\models\MetaScript;

use Craft;

use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaScriptContainer extends MetaContainer
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaScriptContainer';

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var MetaScript
     */
    public $data = [];

    /**
     * @var int
     */
    public $position = View::POS_HEAD;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function includeMetaData(): void
    {
        $view = Craft::$app->getView();
        /** @var $metaScriptModel MetaScript */
        foreach ($this->data as $metaScriptModel) {
            $js = $metaScriptModel->render();
            $view->registerJs(
                $js,
                $this->position
            );
            // If `devMode` is enabled, validate the Meta Script and output any model errors
            if (Seomatic::$devMode) {
                $metaScriptModel->debugMetaItem(
                    "Script attribute: "
                );
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData(): void
    {
        foreach ($this->data as $key => $config) {
            $this->data[$key] = MetaScript::create($config);
        }
    }
}
