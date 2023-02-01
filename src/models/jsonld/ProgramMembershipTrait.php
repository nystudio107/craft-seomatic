<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for ProgramMembership.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProgramMembership
 */
trait ProgramMembershipTrait
{
    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     *
     * @var Organization|Person
     */
    public $member;

    /**
     * The organization (airline, travelers' club, etc.) the membership is made
     * with.
     *
     * @var Organization
     */
    public $hostingOrganization;

    /**
     * A unique identifier for the membership.
     *
     * @var string|Text
     */
    public $membershipNumber;

    /**
     * A member of this organization.
     *
     * @var Organization|Person
     */
    public $members;

    /**
     * The number of membership points earned by the member. If necessary, the
     * unitText can be used to express the units the points are issued in. (E.g.
     * stars, miles, etc.)
     *
     * @var float|Number|QuantitativeValue
     */
    public $membershipPointsEarned;

    /**
     * The program providing the membership.
     *
     * @var string|Text
     */
    public $programName;
}
