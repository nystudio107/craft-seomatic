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
 * GeoShape - The geographic shape of a place. A GeoShape can be described
 * using several properties whose values are based on latitude/longitude
 * pairs. Either whitespace or commas can be used to separate latitude and
 * longitude; whitespace should be used when writing a list of several such
 * points.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/GeoShape
 */
class GeoShape extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'GeoShape';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/GeoShape';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The geographic shape of a place. A GeoShape can be described using several properties whose values are based on latitude/longitude pairs. Either whitespace or commas can be used to separate latitude and longitude; whitespace should be used when writing a list of several such points.';

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
     * A box is the area enclosed by the rectangle formed by two points. The first
     * point is the lower corner, the second point is the upper corner. A box is
     * expressed as two points separated by a space character.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $box;

    /**
     * A circle is the circular region of a specified radius centered at a
     * specified latitude and longitude. A circle is expressed as a pair followed
     * by a radius in meters.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $circle;

    /**
     * The elevation of a location (WGS 84).
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $elevation;

    /**
     * A line is a point-to-point path consisting of two or more points. A line is
     * expressed as a series of two or more point objects separated by space.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $line;

    /**
     * A polygon is the area enclosed by a point-to-point path for which the
     * starting and ending points are the same. A polygon is expressed as a series
     * of four or more space delimited points where the first and final points are
     * identical.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $polygon;

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
        'box',
        'circle',
        'elevation',
        'line',
        'polygon',
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
        'box' => ['Text'],
        'circle' => ['Text'],
        'elevation' => ['Number','Text'],
        'line' => ['Text'],
        'polygon' => ['Text'],
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
        'box' => 'A box is the area enclosed by the rectangle formed by two points. The first point is the lower corner, the second point is the upper corner. A box is expressed as two points separated by a space character.',
        'circle' => 'A circle is the circular region of a specified radius centered at a specified latitude and longitude. A circle is expressed as a pair followed by a radius in meters.',
        'elevation' => 'The elevation of a location (WGS 84).',
        'line' => 'A line is a point-to-point path consisting of two or more points. A line is expressed as a series of two or more point objects separated by space.',
        'polygon' => 'A polygon is the area enclosed by a point-to-point path for which the starting and ending points are the same. A polygon is expressed as a series of four or more space delimited points where the first and final points are identical.',
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
            [['address','addressCountry','box','circle','elevation','line','polygon','postalCode'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
