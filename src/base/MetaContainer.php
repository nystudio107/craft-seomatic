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

namespace nystudio107\seomatic\base;

use nystudio107\seomatic\base\Container as SeomaticContainer;
use nystudio107\seomatic\helpers\Dependency;

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
     * @var MetaItem
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function render($params = []): string
    {
        $html = '';

        if ($this->prepForInclusion()) {
            /** @var  $metaItemModel MetaItem */
            foreach ($this->data as $metaItemModel) {
                if ($metaItemModel->include) {
                    $html .= $metaItemModel->render($params);
                }
            }
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function renderArray($params = []): array
    {
        $htmlArray = [];

        if ($this->prepForInclusion()) {
            /** @var  $metaItemModel MetaItem */
            foreach ($this->data as $metaItemModel) {
                if ($metaItemModel->include) {
                    $htmlArray[] = array_filter($metaItemModel->toArray());
                }
            }
        }

        return $htmlArray;
    }

    /**
     * @inheritdoc
     */
    public function includeMetaData(): void
    {
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData(): void
    {
        parent::normalizeContainerData();
    }
}
