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
    public function render(): string
    {
        $html = '';

        /** @var  $metaItemModel MetaItem*/
        foreach ($this->data as $metaItemModel) {
            $html .= $metaItemModel->render();
        }

        return $html;
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
    }
}
