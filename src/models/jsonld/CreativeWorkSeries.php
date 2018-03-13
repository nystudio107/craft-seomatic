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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * CreativeWorkSeries - A CreativeWorkSeries in schema.org is a group of
 * related items, typically but not necessarily of the same kind.
 * CreativeWorkSeries are usually organized into some order, often
 * chronological. Unlike ItemList which is a general purpose data structure
 * for lists of things, the emphasis with CreativeWorkSeries is on published
 * materials (written e.g. books and periodicals, or media such as tv, radio
 * and games). Specific subtypes are available for describing TVSeries,
 * RadioSeries, MovieSeries, BookSeries, Periodical and VideoGameSeries. In
 * each case, the hasPart / isPartOf properties can be used to relate the
 * CreativeWorkSeries to its parts. The general CreativeWorkSeries type serves
 * largely just to organize these more specific and practical subtypes. It is
 * common for properties applicable to an item from the series to be usefully
 * applied to the containing group. Schema.org attempts to anticipate some of
 * these cases, but publishers should be free to apply properties of the
 * series parts to the series as a whole wherever they seem appropriate.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/CreativeWorkSeries
 */
class CreativeWorkSeries extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'CreativeWorkSeries';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/CreativeWorkSeries';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A CreativeWorkSeries in schema.org is a group of related items, typically but not necessarily of the same kind. CreativeWorkSeries are usually organized into some order, often chronological. Unlike ItemList which is a general purpose data structure for lists of things, the emphasis with CreativeWorkSeries is on published materials (written e.g. books and periodicals, or media such as tv, radio and games). Specific subtypes are available for describing TVSeries, RadioSeries, MovieSeries, BookSeries, Periodical and VideoGameSeries. In each case, the hasPart / isPartOf properties can be used to relate the CreativeWorkSeries to its parts. The general CreativeWorkSeries type serves largely just to organize these more specific and practical subtypes. It is common for properties applicable to an item from the series to be usefully applied to the containing group. Schema.org attempts to anticipate some of these cases, but publishers should be free to apply properties of the series parts to the series as a whole wherever they seem appropriate.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * The end date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    /**
     * The International Standard Serial Number (ISSN) that identifies this serial
     * publication. You can repeat this property to identify different formats of,
     * or the linking ISSN (ISSN-L) for, this serial publication.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $issn;

    /**
     * The start date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'endDate',
        'issn',
        'startDate'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'endDate' => ['Date','DateTime'],
        'issn' => ['Text'],
        'startDate' => ['Date','DateTime']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
        'issn' => 'The International Standard Serial Number (ISSN) that identifies this serial publication. You can repeat this property to identify different formats of, or the linking ISSN (ISSN-L) for, this serial publication.',
        'startDate' => 'The start date and time of the item (in ISO 8601 date format).'
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
            [['endDate','issn','startDate'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
