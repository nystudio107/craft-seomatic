<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\base;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.22
 */
interface GqlSeoElementInterface
{
    // Public Static Methods
    // =========================================================================

    /**
     * Return the name of the GQL interface name
     */
    public static function getGqlInterfaceTypeName();
}
