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
 * Trait for ShippingDeliveryTime.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingDeliveryTime
 */
trait ShippingDeliveryTimeTrait
{
    /**
     * Days of the week when the merchant typically operates, indicated via
     * opening hours markup.
     *
     * @var array|DayOfWeek|DayOfWeek[]|array|OpeningHoursSpecification|OpeningHoursSpecification[]
     */
    public $businessDays;

    /**
     * Order cutoff time allows merchants to describe the time after which they
     * will no longer process orders received on that day. For orders processed
     * after cutoff time, one day gets added to the delivery time estimate. This
     * property is expected to be most typically used via the
     * [[ShippingRateSettings]] publication pattern. The time is indicated using
     * the ISO-8601 Time format, e.g. "23:30:00-05:00" would represent 6:30 pm
     * Eastern Standard Time (EST) which is 5 hours behind Coordinated Universal
     * Time (UTC).
     *
     * @var array|Time|Time[]
     */
    public $cutoffTime;

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
}
