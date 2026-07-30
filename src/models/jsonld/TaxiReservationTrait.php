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
 * Trait for TaxiReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TaxiReservation
 */
trait TaxiReservationTrait
{
    /**
     * Number of people the reservation should accommodate.
     *
     * @var int|array|Integer|Integer[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $partySize;

    /**
     * Where a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @var array|Place|Place[]
     */
    public $pickupLocation;

    /**
     * When a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @var array|DateTime|DateTime[]
     */
    public $pickupTime;
}
