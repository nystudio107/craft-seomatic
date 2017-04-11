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

use nystudio107\seomatic\models\jsonld\PlayAction;

/**
 * ExerciseAction - The act of participating in exertive activity for the
 * purposes of improving health and fitness.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ExerciseAction
 */
class ExerciseAction extends PlayAction
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ExerciseAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ExerciseAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The act of participating in exertive activity for the purposes of improving health and fitness.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'PlayAction';

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
     * The distance travelled, e.g. exercising or travelling.
     *
     * @var Distance [schema.org types: Distance]
     */
    public $distance;

    /**
     * A sub property of location. The course where this action was taken.
     * Supersedes course.
     *
     * @var Place [schema.org types: Place]
     */
    public $exerciseCourse;

    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     *
     * @var Place [schema.org types: Place]
     */
    public $fromLocation;

    /**
     * A sub property of participant. The opponent on this action.
     *
     * @var Person [schema.org types: Person]
     */
    public $opponent;

    /**
     * A sub property of location. The sports activity location where this action
     * occurred.
     *
     * @var SportsActivityLocation [schema.org types: SportsActivityLocation]
     */
    public $sportsActivityLocation;

    /**
     * A sub property of location. The sports event where this action occurred.
     *
     * @var SportsEvent [schema.org types: SportsEvent]
     */
    public $sportsEvent;

    /**
     * A sub property of participant. The sports team that participated on this
     * action.
     *
     * @var SportsTeam [schema.org types: SportsTeam]
     */
    public $sportsTeam;

    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     *
     * @var Place [schema.org types: Place]
     */
    public $toLocation;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'distance',
        'exerciseCourse',
        'fromLocation',
        'opponent',
        'sportsActivityLocation',
        'sportsEvent',
        'sportsTeam',
        'toLocation'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'distance' => ['Distance'],
        'exerciseCourse' => ['Place'],
        'fromLocation' => ['Place'],
        'opponent' => ['Person'],
        'sportsActivityLocation' => ['SportsActivityLocation'],
        'sportsEvent' => ['SportsEvent'],
        'sportsTeam' => ['SportsTeam'],
        'toLocation' => ['Place']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'distance' => 'The distance travelled, e.g. exercising or travelling.',
        'exerciseCourse' => 'A sub property of location. The course where this action was taken. Supersedes course.',
        'fromLocation' => 'A sub property of location. The original location of the object or the agent before the action.',
        'opponent' => 'A sub property of participant. The opponent on this action.',
        'sportsActivityLocation' => 'A sub property of location. The sports activity location where this action occurred.',
        'sportsEvent' => 'A sub property of location. The sports event where this action occurred.',
        'sportsTeam' => 'A sub property of participant. The sports team that participated on this action.',
        'toLocation' => 'A sub property of location. The final location of the object or the agent after the action.'
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
            [['distance','exerciseCourse','fromLocation','opponent','sportsActivityLocation','sportsEvent','sportsTeam','toLocation'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
