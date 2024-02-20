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
 * Trait for FlightReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FlightReservation
 */
trait FlightReservationTrait
{
    /**
     * The airline-specific indicator of boarding order / preference.
     *
     * @var string|array|Text|Text[]
     */
    public $boardingGroup;

    /**
     * The passenger's sequence number as assigned by the airline.
     *
     * @var string|array|Text|Text[]
     */
    public $passengerSequenceNumber;

    /**
     * The type of security screening the passenger is subject to.
     *
     * @var string|array|Text|Text[]
     */
    public $securityScreening;

    /**
     * The priority status assigned to a passenger for security or boarding (e.g.
     * FastTrack or Priority).
     *
     * @var string|array|Text|Text[]|array|QualitativeValue|QualitativeValue[]
     */
    public $passengerPriorityStatus;
}
