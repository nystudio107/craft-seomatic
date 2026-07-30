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
 * schema.org version: v30.0
 * Trait for MemberProgram.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MemberProgram
 */
trait MemberProgramTrait
{
    /**
     * The tiers of a member program.
     *
     * @var array|MemberProgramTier|MemberProgramTier[]
     */
    public $hasTiers;

    /**
     * The Organization (airline, travelers' club, retailer, etc.) the membership
     * is made with or which offers the  MemberProgram.
     *
     * @var array|Organization|Organization[]
     */
    public $hostingOrganization;
}
