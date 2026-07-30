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
 * Trait for ShippingRateSettings.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingRateSettings
 */
trait ShippingRateSettingsTrait
{
    /**
     * Indicates when shipping to a particular [[shippingDestination]] is not
     * available.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $doesNotShip;

    /**
     * A monetary value above (or at) which the shipping rate becomes free.
     * Intended to be used via an [[OfferShippingDetails]] with
     * [[shippingSettingsLink]] matching this [[ShippingRateSettings]].
     *
     * @var array|DeliveryChargeSpecification|DeliveryChargeSpecification[]|array|MonetaryAmount|MonetaryAmount[]
     */
    public $freeShippingThreshold;

    /**
     * This can be marked 'true' to indicate that some published
     * [[DeliveryTimeSettings]] or [[ShippingRateSettings]] are intended to apply
     * to all [[OfferShippingDetails]] published by the same merchant, when
     * referenced by a [[shippingSettingsLink]] in those settings. It is not
     * meaningful to use a 'true' value for this property alongside a
     * transitTimeLabel (for [[DeliveryTimeSettings]]) or shippingLabel (for
     * [[ShippingRateSettings]]), since this property is for use with unlabelled
     * settings.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isUnlabelledFallback;

    /**
     * Value representing the fraction of the value of the order that is charged
     * as shipping cost. Example: 0.10 would mean shipping rate is 10% of the
     * total order value.
     *
     * @var float|array|Number|Number[]
     */
    public $orderPercentage;

    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways, e.g. postalCode ranges.
     *
     * @var array|DefinedRegion|DefinedRegion[]
     */
    public $shippingDestination;

    /**
     * The shipping rate is the cost of shipping to the specified destination.
     * Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are
     * most appropriate.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]|array|ShippingRateSettings|ShippingRateSettings[]
     */
    public $shippingRate;

    /**
     * Value representing the fraction of the weight that is used to compute the
     * shipping price. Example: 0.10 and a shipping weight of 15kg would add $1.5
     * to the order price, where the $ is the currency of the order.
     *
     * @var float|array|Number|Number[]
     */
    public $weightPercentage;
}
