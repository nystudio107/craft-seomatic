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
 * Trait for OfferShippingDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OfferShippingDetails
 */

trait OfferShippingDetailsTrait
{
    
    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways e.g. postalCode ranges.
     *
     * @var DefinedRegion
     */
    public $shippingDestination;

    /**
     * Indicates when shipping to a particular [[shippingDestination]] is not
     * available.
     *
     * @var bool|Boolean
     */
    public $doesNotShip;

    /**
     * Link to a page containing [[ShippingRateSettings]] and
     * [[DeliveryTimeSettings]] details.
     *
     * @var URL
     */
    public $shippingSettingsLink;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[DeliveryTimeSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|Text
     */
    public $transitTimeLabel;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[ShippingRateSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|Text
     */
    public $shippingLabel;

    /**
     * The total delay between the receipt of the order and the goods reaching the
     * final customer.
     *
     * @var ShippingDeliveryTime
     */
    public $deliveryTime;

    /**
     * The shipping rate is the cost of shipping to the specified destination.
     * Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are
     * most appropriate.
     *
     * @var MonetaryAmount
     */
    public $shippingRate;

}
