<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for ShippingDeliveryTime.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingDeliveryTime
 */

trait ShippingDeliveryTimeTrait
{
    
    /**
     * The typical delay the order has been sent for delivery and the goods reach
     * the final customer. Typical properties: minValue, maxValue, unitCode (d for
     * DAY).
     *
     * @var QuantitativeValue
     */
    public $transitTime;

    /**
     * Days of the week when the merchant typically operates, indicated via
     * opening hours markup.
     *
     * @var OpeningHoursSpecification
     */
    public $businessDays;

    /**
     * The typical delay between the receipt of the order and the goods either
     * leaving the warehouse or being prepared for pickup, in case the delivery
     * method is on site pickup. Typical properties: minValue, maxValue, unitCode
     * (d for DAY).  This is by common convention assumed to mean business days
     * (if a unitCode is used, coded as "d"), i.e. only counting days when the
     * business normally operates.
     *
     * @var QuantitativeValue
     */
    public $handlingTime;

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
     * @var Time
     */
    public $cutoffTime;

}
