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
 * Trait for OfferShippingDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OfferShippingDetails
 */
trait OfferShippingDetailsTrait
{
    /**
     * The total delay between the receipt of the order and the goods reaching the
     * final customer.
     *
     * @var array|ShippingDeliveryTime|ShippingDeliveryTime[]
     */
    public $deliveryTime;

    /**
     * The depth of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $depth;

    /**
     * Indicates when shipping to a particular [[shippingDestination]] is not
     * available.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $doesNotShip;

    /**
     * Specification of a shipping service offered by the organization.
     *
     * @var array|ShippingService|ShippingService[]
     */
    public $hasShippingService;

    /**
     * The height of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $height;

    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways, e.g. postalCode ranges.
     *
     * @var array|DefinedRegion|DefinedRegion[]
     */
    public $shippingDestination;

    /**
     * Indicates the origin of a shipment, i.e. where it should be coming from.
     *
     * @var array|DefinedRegion|DefinedRegion[]
     */
    public $shippingOrigin;

    /**
     * The shipping rate is the cost of shipping to the specified destination.
     * Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are
     * most appropriate.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]|array|ShippingRateSettings|ShippingRateSettings[]
     */
    public $shippingRate;

    /**
     * The membership program tier(s) an Offer (or a PriceSpecification,
     * OfferShippingDetails, or MerchantReturnPolicy under an Offer) is valid for.
     *
     * @var array|MemberProgramTier|MemberProgramTier[]
     */
    public $validForMemberTier;

    /**
     * The weight of the product or person.
     *
     * @var array|Mass|Mass[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $weight;

    /**
     * The width of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $width;
}
