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
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $width;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[ShippingRateSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|array|Text|Text[]
     */
    public $shippingLabel;

    /**
     * The shipping rate is the cost of shipping to the specified destination.
     * Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are
     * most appropriate.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $shippingRate;

    /**
     * Link to a page containing [[ShippingRateSettings]] and
     * [[DeliveryTimeSettings]] details.
     *
     * @var array|URL|URL[]
     */
    public $shippingSettingsLink;

    /**
     * The height of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $height;

    /**
     * Indicates the origin of a shipment, i.e. where it should be coming from.
     *
     * @var array|DefinedRegion|DefinedRegion[]
     */
    public $shippingOrigin;

    /**
     * Indicates when shipping to a particular [[shippingDestination]] is not
     * available.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $doesNotShip;

    /**
     * The total delay between the receipt of the order and the goods reaching the
     * final customer.
     *
     * @var array|ShippingDeliveryTime|ShippingDeliveryTime[]
     */
    public $deliveryTime;

    /**
     * The weight of the product or person.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $weight;

    /**
     * The depth of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $depth;

    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways, e.g. postalCode ranges.
     *
     * @var array|DefinedRegion|DefinedRegion[]
     */
    public $shippingDestination;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[DeliveryTimeSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|array|Text|Text[]
     */
    public $transitTimeLabel;
}
