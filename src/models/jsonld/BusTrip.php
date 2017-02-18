<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * BusTrip - A trip on a commercial bus line.
 * Extends: Intangible
 * @see    http://schema.org/BusTrip
 */
class BusTrip extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'BusTrip';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/BusTrip';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A trip on a commercial bus line.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * The stop or station from which the bus arrives.
     * @var mixed BusStation, BusStop [schema.org types: BusStation, BusStop]
     */
    public $arrivalBusStop;

    /**
     * The expected arrival time.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $arrivalTime;

    /**
     * The name of the bus (e.g. Bolt Express).
     * @var mixed string [schema.org types: Text]
     */
    public $busName;

    /**
     * The unique identifier for the bus.
     * @var mixed string [schema.org types: Text]
     */
    public $busNumber;

    /**
     * The stop or station from which the bus departs.
     * @var mixed BusStation, BusStop [schema.org types: BusStation, BusStop]
     */
    public $departureBusStop;

    /**
     * The expected departure time.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $departureTime;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $provider;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'arrivalBusStop',
                'arrivalTime',
                'busName',
                'busNumber',
                'departureBusStop',
                'departureTime',
                'provider',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'arrivalBusStop' => ['BusStation','BusStop'],
                'arrivalTime' => ['DateTime'],
                'busName' => ['Text'],
                'busNumber' => ['Text'],
                'departureBusStop' => ['BusStation','BusStop'],
                'departureTime' => ['DateTime'],
                'provider' => ['Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'arrivalBusStop' => 'The stop or station from which the bus arrives.',
                'arrivalTime' => 'The expected arrival time.',
                'busName' => 'The name of the bus (e.g. Bolt Express).',
                'busNumber' => 'The unique identifier for the bus.',
                'departureBusStop' => 'The stop or station from which the bus departs.',
                'departureTime' => 'The expected departure time.',
                'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['arrivalBusStop','arrivalTime','busName','busNumber','departureBusStop','departureTime','provider',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class BusTrip*/
