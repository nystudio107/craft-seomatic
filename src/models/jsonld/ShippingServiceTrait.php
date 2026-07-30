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
 * Trait for ShippingService.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingService
 */
trait ShippingServiceTrait
{
    /**
     * Type of fulfillment applicable to the [[ShippingService]].
     *
     * @var array|FulfillmentTypeEnumeration|FulfillmentTypeEnumeration[]
     */
    public $fulfillmentType;

    /**
     * The typical delay between the receipt of the order and the goods either
     * leaving the warehouse or being prepared for pickup, in case the delivery
     * method is on site pickup.  In the context of [[ShippingDeliveryTime]],
     * Typical properties: minValue, maxValue, unitCode (d for DAY).  This is by
     * common convention assumed to mean business days (if a unitCode is used,
     * coded as "d"), i.e. only counting days when the business normally operates.
     *  In the context of [[ShippingService]], use the [[ServicePeriod]] format,
     * that contains the same information in a structured form, with cut-off time,
     * business days and duration.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|ServicePeriod|ServicePeriod[]
     */
    public $handlingTime;

    /**
     * The conditions (constraints, price) applicable to the [[ShippingService]].
     *
     * @var array|ShippingConditions|ShippingConditions[]
     */
    public $shippingConditions;

    /**
     * The membership program tier(s) an Offer (or a PriceSpecification,
     * OfferShippingDetails, or MerchantReturnPolicy under an Offer) is valid for.
     *
     * @var array|MemberProgramTier|MemberProgramTier[]
     */
    public $validForMemberTier;
}
