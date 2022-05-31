<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for ProgramMembership.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProgramMembership
 */

trait ProgramMembershipTrait
{
    
    /**
     * The number of membership points earned by the member. If necessary, the
     * unitText can be used to express the units the points are issued in. (e.g.
     * stars, miles, etc.)
     *
     * @var float|Number|QuantitativeValue
     */
    public $membershipPointsEarned;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     *
     * @var Organization|Person
     */
    public $member;

    /**
     * A unique identifier for the membership.
     *
     * @var string|Text
     */
    public $membershipNumber;

    /**
     * The organization (airline, travelers' club, etc.) the membership is made
     * with.
     *
     * @var Organization
     */
    public $hostingOrganization;

    /**
     * The program providing the membership.
     *
     * @var string|Text
     */
    public $programName;

    /**
     * A member of this organization.
     *
     * @var Person|Organization
     */
    public $members;

}
