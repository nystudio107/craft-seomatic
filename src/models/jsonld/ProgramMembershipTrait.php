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
 * Trait for ProgramMembership.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProgramMembership
 */
trait ProgramMembershipTrait
{
    /**
     * The Organization (airline, travelers' club, retailer, etc.) the membership
     * is made with or which offers the  MemberProgram.
     *
     * @var array|Organization|Organization[]
     */
    public $hostingOrganization;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $member;

    /**
     * A member of this organization.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $members;

    /**
     * A unique identifier for the membership.
     *
     * @var string|array|Text|Text[]
     */
    public $membershipNumber;

    /**
     * The number of membership points earned by the member. If necessary, the
     * unitText can be used to express the units the points are issued in. (E.g.
     * stars, miles, etc.)
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $membershipPointsEarned;

    /**
     * The [MemberProgram](https://schema.org/MemberProgram) associated with a
     * [ProgramMembership](https://schema.org/ProgramMembership).
     *
     * @var array|MemberProgram|MemberProgram[]
     */
    public $program;

    /**
     * The program providing the membership. It is preferable to use
     * [:program](https://schema.org/program) instead.
     *
     * @var string|array|Text|Text[]
     */
    public $programName;
}
