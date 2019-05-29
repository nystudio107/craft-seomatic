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
 * TrainTrip - A trip on a commercial train line.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/TrainTrip
 */
class TrainTrip extends Trip
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'TrainTrip';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/TrainTrip';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A trip on a commercial train line.';

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
     * The platform where the train arrives.
     *
     * @var string [schema.org types: Text]
     */
    public $arrivalPlatform;

    /**
     * The station where the train trip ends.
     *
     * @var TrainStation [schema.org types: TrainStation]
     */
    public $arrivalStation;

    /**
     * The platform from which the train departs.
     *
     * @var string [schema.org types: Text]
     */
    public $departurePlatform;

    /**
     * The station from which the train departs.
     *
     * @var TrainStation [schema.org types: TrainStation]
     */
    public $departureStation;

    /**
     * The name of the train (e.g. The Orient Express).
     *
     * @var string [schema.org types: Text]
     */
    public $trainName;

    /**
     * The unique identifier for the train.
     *
     * @var string [schema.org types: Text]
     */
    public $trainNumber;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'arrivalPlatform',
        'arrivalStation',
        'departurePlatform',
        'departureStation',
        'trainName',
        'trainNumber'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'arrivalPlatform' => ['Text'],
        'arrivalStation' => ['TrainStation'],
        'departurePlatform' => ['Text'],
        'departureStation' => ['TrainStation'],
        'trainName' => ['Text'],
        'trainNumber' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'arrivalPlatform' => 'The platform where the train arrives.',
        'arrivalStation' => 'The station where the train trip ends.',
        'departurePlatform' => 'The platform from which the train departs.',
        'departureStation' => 'The station from which the train departs.',
        'trainName' => 'The name of the train (e.g. The Orient Express).',
        'trainNumber' => 'The unique identifier for the train.'
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
            [['arrivalPlatform','arrivalStation','departurePlatform','departureStation','trainName','trainNumber'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
