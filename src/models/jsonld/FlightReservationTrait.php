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
 * Trait for FlightReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FlightReservation
 */

trait FlightReservationTrait
{
    
    /**
     * The priority status assigned to a passenger for security or boarding (e.g.
     * FastTrack or Priority).
     *
     * @var string|QualitativeValue|Text
     */
    public $passengerPriorityStatus;

    /**
     * The airline-specific indicator of boarding order / preference.
     *
     * @var string|Text
     */
    public $boardingGroup;

    /**
     * The type of security screening the passenger is subject to.
     *
     * @var string|Text
     */
    public $securityScreening;

    /**
     * The passenger's sequence number as assigned by the airline.
     *
     * @var string|Text
     */
    public $passengerSequenceNumber;

}
