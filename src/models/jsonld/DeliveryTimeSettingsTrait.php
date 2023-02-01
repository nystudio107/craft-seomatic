<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for DeliveryTimeSettings.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DeliveryTimeSettings
 */
trait DeliveryTimeSettingsTrait
{
    /**
     * indicates (possibly multiple) shipping destinations. These can be defined
     * in several ways, e.g. postalCode ranges.
     *
     * @var DefinedRegion
     */
    public $shippingDestination;

    /**
     * The total delay between the receipt of the order and the goods reaching the
     * final customer.
     *
     * @var ShippingDeliveryTime
     */
    public $deliveryTime;

    /**
     * Label to match an [[OfferShippingDetails]] with a [[DeliveryTimeSettings]]
     * (within the context of a [[shippingSettingsLink]] cross-reference).
     *
     * @var string|Text
     */
    public $transitTimeLabel;

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
     * @var bool|Boolean
     */
    public $isUnlabelledFallback;
}
