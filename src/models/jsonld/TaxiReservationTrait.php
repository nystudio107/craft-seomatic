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
 * Trait for TaxiReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TaxiReservation
 */
trait TaxiReservationTrait
{
    /**
     * When a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @var DateTime
     */
    public $pickupTime;

    /**
     * Where a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @var Place
     */
    public $pickupLocation;

    /**
     * Number of people the reservation should accommodate.
     *
     * @var int|QuantitativeValue|Integer
     */
    public $partySize;
}
