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

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * BusTrip - A trip on a commercial bus line.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/BusTrip
 */
class BusTrip extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'BusTrip';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/BusTrip';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A trip on a commercial bus line.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

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
     * The stop or station from which the bus arrives.
     *
     * @var mixed|BusStation|BusStop [schema.org types: BusStation, BusStop]
     */
    public $arrivalBusStop;

    /**
     * The expected arrival time.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $arrivalTime;

    /**
     * The name of the bus (e.g. Bolt Express).
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $busName;

    /**
     * The unique identifier for the bus.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $busNumber;

    /**
     * The stop or station from which the bus departs.
     *
     * @var mixed|BusStation|BusStop [schema.org types: BusStation, BusStop]
     */
    public $departureBusStop;

    /**
     * The expected departure time.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $departureTime;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'arrivalBusStop',
        'arrivalTime',
        'busName',
        'busNumber',
        'departureBusStop',
        'departureTime',
        'provider'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'arrivalBusStop' => ['BusStation','BusStop'],
        'arrivalTime' => ['DateTime'],
        'busName' => ['Text'],
        'busNumber' => ['Text'],
        'departureBusStop' => ['BusStation','BusStop'],
        'departureTime' => ['DateTime'],
        'provider' => ['Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'arrivalBusStop' => 'The stop or station from which the bus arrives.',
        'arrivalTime' => 'The expected arrival time.',
        'busName' => 'The name of the bus (e.g. Bolt Express).',
        'busNumber' => 'The unique identifier for the bus.',
        'departureBusStop' => 'The stop or station from which the bus departs.',
        'departureTime' => 'The expected departure time.',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.'
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
            [['arrivalBusStop','arrivalTime','busName','busNumber','departureBusStop','departureTime','provider'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
