<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for OfferShippingDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OfferShippingDetails
 */
trait OfferShippingDetailsTrait
{
    /**
     * The width of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $width;

    /**
     * Link to a page containing [[ShippingRateSettings]] and
     * [[DeliveryTimeSettings]] details.
     *
     * @var URL
     */
    public $shippingSettingsLink;

    /**
     * The depth of the item.
     *
     * @var QuantitativeValue|Distance
     */
    public $depth;

    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways, e.g. postalCode ranges.
     *
     * @var DefinedRegion
     */
    public $shippingDestination;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[ShippingRateSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|Text
     */
    public $shippingLabel;

    /**
     * The height of the item.
     *
     * @var QuantitativeValue|Distance
     */
    public $height;

    /**
     * Indicates when shipping to a particular [[shippingDestination]] is not
     * available.
     *
     * @var bool|Boolean
     */
    public $doesNotShip;

    /**
     * The weight of the product or person.
     *
     * @var QuantitativeValue
     */
    public $weight;

    /**
     * The total delay between the receipt of the order and the goods reaching the
     * final customer.
     *
     * @var ShippingDeliveryTime
     */
    public $deliveryTime;

    /**
     * Indicates the origin of a shipment, i.e. where it should be coming from.
     *
     * @var DefinedRegion
     */
    public $shippingOrigin;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[DeliveryTimeSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|Text
     */
    public $transitTimeLabel;

    /**
     * The shipping rate is the cost of shipping to the specified destination.
     * Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are
     * most appropriate.
     *
     * @var MonetaryAmount
     */
    public $shippingRate;
}
