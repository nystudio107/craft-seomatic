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

    const TEMPLATE_TYPE = 'GenericTemplate';

    // Public Methods
    // =========================================================================

    /**
     * Return the route for this frontend template as an array of key => value pairs
     *
     * @return array
     */
    public function routeRules(): array;

    /**
     * Render the template as HTML-safe text
     *
     * @param array $params
     *
     * @return string
     */
    public function render(array $params = []): string;
}
