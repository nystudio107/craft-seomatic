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
 * Trait for Flight.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Flight
 */
trait FlightTrait
{
    /**
     * The kind of aircraft (e.g., "Boeing 747").
     *
     * @var string|array|Text|Text[]|array|Vehicle|Vehicle[]
     */
    public $aircraft;

    /**
     * The airport where the flight terminates.
     *
     * @var array|Airport|Airport[]
     */
    public $arrivalAirport;

    /**
     * Identifier of the flight's arrival gate.
     *
     * @var string|array|Text|Text[]
     */
    public $arrivalGate;

    /**
     * Identifier of the flight's arrival terminal.
     *
     * @var string|array|Text|Text[]
     */
    public $arrivalTerminal;

    /**
     * The type of boarding policy used by the airline (e.g. zone-based or
     * group-based).
     *
     * @var array|BoardingPolicyType|BoardingPolicyType[]
     */
    public $boardingPolicy;

    /**
     * 'carrier' is an out-dated term indicating the 'provider' for parcel
     * delivery and flights.
     *
     * @var array|Organization|Organization[]
     */
    public $carrier;

    /**
     * The airport where the flight originates.
     *
     * @var array|Airport|Airport[]
     */
    public $departureAirport;

    /**
     * Identifier of the flight's departure gate.
     *
     * @var string|array|Text|Text[]
     */
    public $departureGate;

    /**
     * Identifier of the flight's departure terminal.
     *
     * @var string|array|Text|Text[]
     */
    public $departureTerminal;

    /**
     * The estimated time the flight will take.
     *
     * @var string|array|Duration|Duration[]|array|Text|Text[]
     */
    public $estimatedFlightDuration;

    /**
     * The distance of the flight.
     *
     * @var string|array|Distance|Distance[]|array|Text|Text[]
     */
    public $flightDistance;

    /**
     * The unique identifier for a flight including the airline IATA code. For
     * example, if describing United flight 110, where the IATA code for United is
     * 'UA', the flightNumber is 'UA110'.
     *
     * @var string|array|Text|Text[]
     */
    public $flightNumber;

    /**
     * Description of the meals that will be provided or available for purchase.
     *
     * @var string|array|Text|Text[]
     */
    public $mealService;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods.  A seller may also be a provider.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $seller;

    /**
     * The time when a passenger can check into the flight online.
     *
     * @var array|DateTime|DateTime[]
     */
    public $webCheckinTime;
}
