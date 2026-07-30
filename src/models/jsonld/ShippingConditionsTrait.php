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
 * Trait for ShippingConditions.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingConditions
 */
trait ShippingConditionsTrait
{
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
     * The height of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $height;

    /**
     * Limits the number of items being shipped for which these conditions apply.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numItems;

    /**
     * Minimum and maximum order value for which these shipping conditions are
     * valid.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $orderValue;

    /**
     * Limited period during which these shipping conditions apply.
     *
     * @var array|OpeningHoursSpecification|OpeningHoursSpecification[]
     */
    public $seasonalOverride;

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
     * The typical delay the order has been sent for delivery and the goods reach
     * the final customer.    In the context of [[ShippingDeliveryTime]], use the
     * [[QuantitativeValue]]. Typical properties: minValue, maxValue, unitCode (d
     * for DAY).    In the context of [[ShippingConditions]], use the
     * [[ServicePeriod]]. It has a duration (as a [[QuantitativeValue]]) and also
     * business days and a cut-off time.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|ServicePeriod|ServicePeriod[]
     */
    public $transitTime;

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
