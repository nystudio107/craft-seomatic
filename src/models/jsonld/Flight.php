<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Trip;

/**
 * Flight - An airline flight.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Flight
 */
class Flight extends Trip
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Flight';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Flight';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An airline flight.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Trip';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The kind of aircraft (e.g., "Boeing 747").
     *
     * @var mixed|string|Vehicle [schema.org types: Text, Vehicle]
     */
    public $aircraft;

    /**
     * The airport where the flight terminates.
     *
     * @var mixed|Airport [schema.org types: Airport]
     */
    public $arrivalAirport;

    /**
     * Identifier of the flight's arrival gate.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $arrivalGate;

    /**
     * Identifier of the flight's arrival terminal.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $arrivalTerminal;

    /**
     * The type of boarding policy used by the airline (e.g. zone-based or
     * group-based).
     *
     * @var mixed|BoardingPolicyType [schema.org types: BoardingPolicyType]
     */
    public $boardingPolicy;

    /**
     * The airport where the flight originates.
     *
     * @var mixed|Airport [schema.org types: Airport]
     */
    public $departureAirport;

    /**
     * Identifier of the flight's departure gate.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $departureGate;

    /**
     * Identifier of the flight's departure terminal.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $departureTerminal;

    /**
     * The estimated time the flight will take.
     *
     * @var mixed|Duration|string [schema.org types: Duration, Text]
     */
    public $estimatedFlightDuration;

    /**
     * The distance of the flight.
     *
     * @var mixed|Distance|string [schema.org types: Distance, Text]
     */
    public $flightDistance;

    /**
     * The unique identifier for a flight including the airline IATA code. For
     * example, if describing United flight 110, where the IATA code for United is
     * 'UA', the flightNumber is 'UA110'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $flightNumber;

    /**
     * Description of the meals that will be provided or available for purchase.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $mealService;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods. A seller may also be a provider. Supersedes merchant, vendor.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $seller;

    /**
     * The time when a passenger can check into the flight online.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $webCheckinTime;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'aircraft',
        'arrivalAirport',
        'arrivalGate',
        'arrivalTerminal',
        'boardingPolicy',
        'departureAirport',
        'departureGate',
        'departureTerminal',
        'estimatedFlightDuration',
        'flightDistance',
        'flightNumber',
        'mealService',
        'seller',
        'webCheckinTime'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'aircraft' => ['Text','Vehicle'],
        'arrivalAirport' => ['Airport'],
        'arrivalGate' => ['Text'],
        'arrivalTerminal' => ['Text'],
        'boardingPolicy' => ['BoardingPolicyType'],
        'departureAirport' => ['Airport'],
        'departureGate' => ['Text'],
        'departureTerminal' => ['Text'],
        'estimatedFlightDuration' => ['Duration','Text'],
        'flightDistance' => ['Distance','Text'],
        'flightNumber' => ['Text'],
        'mealService' => ['Text'],
        'seller' => ['Organization','Person'],
        'webCheckinTime' => ['DateTime']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'aircraft' => 'The kind of aircraft (e.g., "Boeing 747").',
        'arrivalAirport' => 'The airport where the flight terminates.',
        'arrivalGate' => 'Identifier of the flight\'s arrival gate.',
        'arrivalTerminal' => 'Identifier of the flight\'s arrival terminal.',
        'boardingPolicy' => 'The type of boarding policy used by the airline (e.g. zone-based or group-based).',
        'departureAirport' => 'The airport where the flight originates.',
        'departureGate' => 'Identifier of the flight\'s departure gate.',
        'departureTerminal' => 'Identifier of the flight\'s departure terminal.',
        'estimatedFlightDuration' => 'The estimated time the flight will take.',
        'flightDistance' => 'The distance of the flight.',
        'flightNumber' => 'The unique identifier for a flight including the airline IATA code. For example, if describing United flight 110, where the IATA code for United is \'UA\', the flightNumber is \'UA110\'.',
        'mealService' => 'Description of the meals that will be provided or available for purchase.',
        'seller' => 'An entity which offers (sells / leases / lends / loans) the services / goods. A seller may also be a provider. Supersedes merchant, vendor.',
        'webCheckinTime' => 'The time when a passenger can check into the flight online.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['aircraft','arrivalAirport','arrivalGate','arrivalTerminal','boardingPolicy','departureAirport','departureGate','departureTerminal','estimatedFlightDuration','flightDistance','flightNumber','mealService','seller','webCheckinTime'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
