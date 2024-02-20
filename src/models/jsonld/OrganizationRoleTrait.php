<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for OrganizationRole.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OrganizationRole
 */
trait OrganizationRoleTrait
{
    /**
     * A number associated with a role in an organization, for example, the number
     * on an athlete's jersey.
     *
     * @var float|array|Number|Number[]
     */
    public $numberedPosition;
}
