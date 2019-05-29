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
 * Trip - A trip or journey. An itinerary of visits to one or more places.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Trip
 */
class Trip extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Trip';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Trip';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A trip or journey. An itinerary of visits to one or more places.';

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
     * The expected arrival time.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $arrivalTime;

    /**
     * The expected departure time.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $departureTime;

    /**
     * Destination(s) ( Place ) that make up a trip. For a trip where destination
     * order is important use ItemList to specify that order (see examples).
     *
     * @var mixed|ItemList|Place [schema.org types: ItemList, Place]
     */
    public $itinerary;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     *
     * @var mixed|Offer [schema.org types: Offer]
     */
    public $offers;

    /**
     * Identifies that this Trip is a subTrip of another Trip. For example Day 1,
     * Day 2, etc. of a multi-day trip. Inverse property: subTrip.
     *
     * @var mixed|Trip [schema.org types: Trip]
     */
    public $partOfTrip;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * Identifies a Trip that is a subTrip of this Trip. For example Day 1, Day 2,
     * etc. of a multi-day trip. Inverse property: partOfTrip.
     *
     * @var mixed|Trip [schema.org types: Trip]
     */
    public $subTrip;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'arrivalTime',
        'departureTime',
        'itinerary',
        'offers',
        'partOfTrip',
        'provider',
        'subTrip'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'arrivalTime' => ['DateTime'],
        'departureTime' => ['DateTime'],
        'itinerary' => ['ItemList','Place'],
        'offers' => ['Offer'],
        'partOfTrip' => ['Trip'],
        'provider' => ['Organization','Person'],
        'subTrip' => ['Trip']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'arrivalTime' => 'The expected arrival time.',
        'departureTime' => 'The expected departure time.',
        'itinerary' => 'Destination(s) ( Place ) that make up a trip. For a trip where destination order is important use ItemList to specify that order (see examples).',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
        'partOfTrip' => 'Identifies that this Trip is a subTrip of another Trip. For example Day 1, Day 2, etc. of a multi-day trip. Inverse property: subTrip.',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
        'subTrip' => 'Identifies a Trip that is a subTrip of this Trip. For example Day 1, Day 2, etc. of a multi-day trip. Inverse property: partOfTrip.'
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
            [['arrivalTime','departureTime','itinerary','offers','partOfTrip','provider','subTrip'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
