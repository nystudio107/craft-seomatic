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
 * ExercisePlan - Fitness-related activity designed for a specific
 * health-related purpose, including defined exercise routines as well as
 * activity prescribed by a clinician.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ExercisePlan
 */
class ExercisePlan extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ExercisePlan';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ExercisePlan';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Fitness-related activity designed for a specific health-related purpose, including defined exercise routines as well as activity prescribed by a clinician.';

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
     * Length of time to engage in the activity.
     *
     * @var mixed|Duration|QualitativeValue [schema.org types: Duration, QualitativeValue]
     */
    public $activityDuration;

    /**
     * How often one should engage in the activity.
     *
     * @var mixed|QualitativeValue|string [schema.org types: QualitativeValue, Text]
     */
    public $activityFrequency;

    /**
     * Any additional component of the exercise prescription that may need to be
     * articulated to the patient. This may include the order of exercises, the
     * number of repetitions of movement, quantitative distance, progressions over
     * time, etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $additionalVariable;

    /**
     * Type(s) of exercise or activity, such as strength training, flexibility
     * training, aerobics, cardiac rehabilitation, etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $exerciseType;

    /**
     * Quantitative measure gauging the degree of force involved in the exercise,
     * for example, heartbeats per minute. May include the velocity of the
     * movement.
     *
     * @var mixed|QualitativeValue|string [schema.org types: QualitativeValue, Text]
     */
    public $intensity;

    /**
     * Number of times one should repeat the activity.
     *
     * @var mixed|float|QualitativeValue [schema.org types: Number, QualitativeValue]
     */
    public $repetitions;

    /**
     * How often one should break from the activity.
     *
     * @var mixed|QualitativeValue|string [schema.org types: QualitativeValue, Text]
     */
    public $restPeriods;

    /**
     * Quantitative measure of the physiologic output of the exercise; also
     * referred to as energy expenditure.
     *
     * @var mixed|Energy|QualitativeValue [schema.org types: Energy, QualitativeValue]
     */
    public $workload;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'activityDuration',
        'activityFrequency',
        'additionalVariable',
        'exerciseType',
        'intensity',
        'repetitions',
        'restPeriods',
        'workload'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'activityDuration' => ['Duration','QualitativeValue'],
        'activityFrequency' => ['QualitativeValue','Text'],
        'additionalVariable' => ['Text'],
        'exerciseType' => ['Text'],
        'intensity' => ['QualitativeValue','Text'],
        'repetitions' => ['Number','QualitativeValue'],
        'restPeriods' => ['QualitativeValue','Text'],
        'workload' => ['Energy','QualitativeValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'activityDuration' => 'Length of time to engage in the activity.',
        'activityFrequency' => 'How often one should engage in the activity.',
        'additionalVariable' => 'Any additional component of the exercise prescription that may need to be articulated to the patient. This may include the order of exercises, the number of repetitions of movement, quantitative distance, progressions over time, etc.',
        'exerciseType' => 'Type(s) of exercise or activity, such as strength training, flexibility training, aerobics, cardiac rehabilitation, etc.',
        'intensity' => 'Quantitative measure gauging the degree of force involved in the exercise, for example, heartbeats per minute. May include the velocity of the movement.',
        'repetitions' => 'Number of times one should repeat the activity.',
        'restPeriods' => 'How often one should break from the activity.',
        'workload' => 'Quantitative measure of the physiologic output of the exercise; also referred to as energy expenditure.'
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
            [['activityDuration','activityFrequency','additionalVariable','exerciseType','intensity','repetitions','restPeriods','workload'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
