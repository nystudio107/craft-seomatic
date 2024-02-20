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
 * Trait for ShippingRateSettings.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingRateSettings
 */
trait ShippingRateSettingsTrait
{
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
     * @var array|MonetaryAmount|MonetaryAmount[]|array|DeliveryChargeSpecification|DeliveryChargeSpecification[]
     */
    public $freeShippingThreshold;

    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways, e.g. postalCode ranges.
     *
     * @var array|DefinedRegion|DefinedRegion[]
     */
    public $shippingDestination;
}
