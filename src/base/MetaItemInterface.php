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

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * Render the meta item as HTML-safe text
     *
     * @return string
     */
    public function render(): string;

    // Private Methods
    // =========================================================================
}
