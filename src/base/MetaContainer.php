<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\base;

use nystudio107\seomatic\base\Container as SeomaticContainer;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class MetaContainer extends SeomaticContainer implements MetaContainerInterface
{
    // Traits
    // =========================================================================

    use MetaContainerTrait;

    // Public Properties
    // =========================================================================

    /**
     * The MetaItems in this container
     *
     * @var MetaItem[] $data
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $html = '';
        if ($this->prepForInclusion()) {
            /** @var MetaItem $metaItemModel */
            foreach ($this->data as $metaItemModel) {
                if ($metaItemModel->include) {
                    $renderedTag = $metaItemModel->render($params);
                    if (!empty($renderedTag)) {
                        $html .= $metaItemModel->render($params);
                    }
                }
            }
        }

        return trim($html);
    }

    /**
     * @inheritdoc
     */
    public function renderArray(array $params = []): array
    {
        $htmlArray = [];

        if ($this->prepForInclusion()) {
            foreach ($this->data as $metaItemModel) {
                if ($metaItemModel->include) {
                    $htmlArray[$metaItemModel->key] = $metaItemModel->renderAttributes($params);
                }
            }
        }

        return $htmlArray;
    }

    /**
     * @inheritdoc
     */
    public function includeMetaData($dependency)
    {
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        parent::normalizeContainerData();
    }
}
