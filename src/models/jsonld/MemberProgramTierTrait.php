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
 * Trait for MemberProgramTier.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MemberProgramTier
 */
trait MemberProgramTierTrait
{
    /**
     * A member benefit for a particular tier of a loyalty program.
     *
     * @var array|TierBenefitEnumeration|TierBenefitEnumeration[]
     */
    public $hasTierBenefit;

    /**
     * A requirement for a user to join a membership tier, for example: a
     * CreditCard if the tier requires sign up for a credit card, A
     * UnitPriceSpecification if the user is required to pay a (periodic) fee, or
     * a MonetaryAmount if the user needs to spend a minimum amount to join the
     * tier. If a tier is free to join then this property does not need to be
     * specified.
     *
     * @var string|array|CreditCard|CreditCard[]|array|MonetaryAmount|MonetaryAmount[]|array|Text|Text[]|array|UnitPriceSpecification|UnitPriceSpecification[]
     */
    public $hasTierRequirement;

    /**
     * The member program this tier is a part of.
     *
     * @var array|MemberProgram|MemberProgram[]
     */
    public $isTierOf;

    /**
     * The number of membership points earned by the member. If necessary, the
     * unitText can be used to express the units the points are issued in. (E.g.
     * stars, miles, etc.)
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $membershipPointsEarned;
}
