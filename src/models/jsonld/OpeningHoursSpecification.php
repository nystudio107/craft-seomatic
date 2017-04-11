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
 * OpeningHoursSpecification - A structured value providing information about
 * the opening hours of a place or a certain service inside a place. The place
 * is open if the opens property is specified, and closed otherwise. If the
 * value for the closes property is less than the value for the opens property
 * then the hour range is assumed to span over the next day.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/OpeningHoursSpecification
 */
class OpeningHoursSpecification extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OpeningHoursSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OpeningHoursSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A structured value providing information about the opening hours of a place or a certain service inside a place. The place is open if the opens property is specified, and closed otherwise. If the value for the closes property is less than the value for the opens property then the hour range is assumed to span over the next day.';

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
     * The closing hour of the place or service on the given day(s) of the week.
     *
     * @var Time [schema.org types: Time]
     */
    public $closes;

    /**
     * The day of the week for which these opening hours are valid.
     *
     * @var DayOfWeek [schema.org types: DayOfWeek]
     */
    public $dayOfWeek;

    /**
     * The opening hour of the place or service on the given day(s) of the week.
     *
     * @var Time [schema.org types: Time]
     */
    public $opens;

    /**
     * The date when the item becomes valid.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $validFrom;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $validThrough;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'closes',
        'dayOfWeek',
        'opens',
        'validFrom',
        'validThrough'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'closes' => ['Time'],
        'dayOfWeek' => ['DayOfWeek'],
        'opens' => ['Time'],
        'validFrom' => ['DateTime'],
        'validThrough' => ['DateTime']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'closes' => 'The closing hour of the place or service on the given day(s) of the week.',
        'dayOfWeek' => 'The day of the week for which these opening hours are valid.',
        'opens' => 'The opening hour of the place or service on the given day(s) of the week.',
        'validFrom' => 'The date when the item becomes valid.',
        'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.'
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
            [['closes','dayOfWeek','opens','validFrom','validThrough'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
