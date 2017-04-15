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
interface FrontendTemplateInterface
{

    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'Generic';

    // Public Methods
    // =========================================================================

    /**
     * Render the template as HTML-safe text
     *
     * @return string
     */
    public function render(): string;
}
