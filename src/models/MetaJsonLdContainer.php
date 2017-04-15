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
     * @var MetaJsonLd
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
        /** @var $metaJsonLdModel MetaJsonLd */
        foreach ($this->data as $metaJsonLdModel) {
            $metaJsonLdModel->renderRaw = true;
            $metaJsonLdModel->renderScriptTags = false;
            $jsonLd = $metaJsonLdModel->render();
            $view->registerScript(
                $jsonLd,
                View::POS_END,
                ['type' => 'application/ld+json']
            );
            // If `devMode` is enabled, validate the JSON-LD and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $metaJsonLdModel->debugMetaItem(
                    'JSON-LD property: ',
                    [
                        'default' => 'error',
                        'google' => 'warning'
                    ]
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
