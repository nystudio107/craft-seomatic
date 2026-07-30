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
 * Trait for MerchantReturnPolicySeasonalOverride.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MerchantReturnPolicySeasonalOverride
 */
trait MerchantReturnPolicySeasonalOverrideTrait
{
    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $endDate;

    /**
     * Specifies either a fixed return date or the number of days (from the
     * delivery date) that a product can be returned. Used when the
     * [[returnPolicyCategory]] property is specified as
     * [[MerchantReturnFiniteReturnWindow]].
     *
     * @var int|array|Date|Date[]|array|DateTime|DateTime[]|array|Integer|Integer[]
     */
    public $merchantReturnDays;

    /**
     * A refund type, from an enumerated list.
     *
     * @var array|RefundTypeEnumeration|RefundTypeEnumeration[]
     */
    public $refundType;

    /**
     * Use [[MonetaryAmount]] to specify a fixed restocking fee for product
     * returns, or use [[Number]] to specify a percentage of the product price
     * paid by the customer.
     *
     * @var float|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $restockingFee;

    /**
     * The type of return fees for purchased products (for any return reason).
     *
     * @var array|ReturnFeesEnumeration|ReturnFeesEnumeration[]
     */
    public $returnFees;

    /**
     * The type of return method offered, specified from an enumeration.
     *
     * @var array|ReturnMethodEnumeration|ReturnMethodEnumeration[]
     */
    public $returnMethod;

    /**
     * Specifies an applicable return policy (from an enumeration).
     *
     * @var array|MerchantReturnEnumeration|MerchantReturnEnumeration[]
     */
    public $returnPolicyCategory;

    /**
     * Amount of shipping costs for product returns (for any reason). Applicable
     * when property [[returnFees]] equals [[ReturnShippingFees]].
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $returnShippingFeesAmount;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $startDate;
}
