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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
interface MetaItemInterface
{

    // Constants
    // =========================================================================

    const ITEM_TYPE = 'Generic';

    // Public Methods
    // =========================================================================

    /**
     * Prepare the MetaItem's data for rendering
     *
     * @param mixed $data
     *
     * @return bool Whether the render should happen or not
     */
    public function prepForRender(&$data): bool;

    /**
     * Render the meta item as HTML-safe text
     *
     * @param array $params
     *
     * @return string The rendered meta item
     */
    public function render(array $params = []): string;

    /**
     * Render the meta item as an array of attributes
     *
     * @param array $params
     *
     * @return array
     */
    public function renderAttributes(array $params = []): array;
}
