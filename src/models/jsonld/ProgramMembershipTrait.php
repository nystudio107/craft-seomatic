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
 * Trait for ProgramMembership.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProgramMembership
 */
trait ProgramMembershipTrait
{
    /**
     * The organization (airline, travelers' club, etc.) the membership is made
     * with.
     *
     * @var array|Organization|Organization[]
     */
    public $hostingOrganization;

    /**
     * The program providing the membership.
     *
     * @var string|array|Text|Text[]
     */
    public $programName;

    /**
     * The number of membership points earned by the member. If necessary, the
     * unitText can be used to express the units the points are issued in. (E.g.
     * stars, miles, etc.)
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $membershipPointsEarned;

    /**
     * A member of this organization.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $members;

    /**
     * A unique identifier for the membership.
     *
     * @var string|array|Text|Text[]
     */
    public $membershipNumber;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $member;
}
