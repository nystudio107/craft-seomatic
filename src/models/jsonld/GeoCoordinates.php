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

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * GeoCoordinates - The geographic coordinates of a place or event.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/GeoCoordinates
 */
class GeoCoordinates extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'GeoCoordinates';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/GeoCoordinates';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The geographic coordinates of a place or event.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

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
     * Physical address of the item.
     *
     * @var mixed|PostalAddress|string [schema.org types: PostalAddress, Text]
     */
    public $address;

    /**
     * The country. For example, USA. You can also provide the two-letter ISO
     * 3166-1 alpha-2 country code.
     *
     * @var mixed|Country|string [schema.org types: Country, Text]
     */
    public $addressCountry;

    /**
     * The elevation of a location (WGS 84). Values may be of the form 'NUMBER
     * UNITOFMEASUREMENT' (e.g., '1,000 m', '3,200 ft') while numbers alone should
     * be assumed to be a value in meters.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $elevation;

    /**
     * The latitude of a location. For example 37.42242 (WGS 84).
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $latitude;

    /**
     * The longitude of a location. For example -122.08585 (WGS 84).
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $longitude;

    /**
     * The postal code. For example, 94043.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $postalCode;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'address',
        'addressCountry',
        'elevation',
        'latitude',
        'longitude',
        'postalCode'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'address' => ['PostalAddress','Text'],
        'addressCountry' => ['Country','Text'],
        'elevation' => ['Number','Text'],
        'latitude' => ['Number','Text'],
        'longitude' => ['Number','Text'],
        'postalCode' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'address' => 'Physical address of the item.',
        'addressCountry' => 'The country. For example, USA. You can also provide the two-letter ISO 3166-1 alpha-2 country code.',
        'elevation' => 'The elevation of a location (WGS 84). Values may be of the form \'NUMBER UNITOFMEASUREMENT\' (e.g., \'1,000 m\', \'3,200 ft\') while numbers alone should be assumed to be a value in meters.',
        'latitude' => 'The latitude of a location. For example 37.42242 (WGS 84).',
        'longitude' => 'The longitude of a location. For example -122.08585 (WGS 84).',
        'postalCode' => 'The postal code. For example, 94043.'
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
            [['address','addressCountry','elevation','latitude','longitude','postalCode'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
