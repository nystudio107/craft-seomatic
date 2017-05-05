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
use nystudio107\seomatic\helpers\ArrayHelper;

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
    public function renderArray($params = []): array
    {
        $htmlArray = [];

        /** @var  $metaItemModel MetaJsonLd */
        foreach ($this->data as $metaItemModel) {
            // Render the resulting JSON-LD
            $scenario = $this->scenario;
            $this->setScenario('render');
            $htmlArray[] = ArrayHelper::arrayFilterRecursive(
                $metaItemModel->toArray(),
                [ArrayHelper::class, 'unsetNullChildren']
            );
            $this->setScenario($scenario);
        }

        return $htmlArray;
    }

    /**
     * @inheritdoc
     */
    public function includeMetaData(): void
    {
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
                    Seomatic::$view->registerScript(
                        $jsonLd,
                        View::POS_END,
                        ['type' => 'application/ld+json']
                    );
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

    /**
     * @inheritdoc
     */
    public function normalizeContainerData(): void
    {
        foreach ($this->data as $key => $config) {
            $this->data[$key] = MetaJsonLd::create($config['type'], $config);
        }
    }
}
