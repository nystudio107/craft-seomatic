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
 * Trait for ServicePeriod.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ServicePeriod
 */
trait ServicePeriodTrait
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
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * duration format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $duration;
}
