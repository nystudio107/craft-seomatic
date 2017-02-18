<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PlayAction;

/**
 * ExerciseAction - The act of participating in exertive activity for the
 * purposes of improving health and fitness.
 * Extends: PlayAction
 * @see    http://schema.org/ExerciseAction
 */
class ExerciseAction extends PlayAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ExerciseAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ExerciseAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of participating in exertive activity for the purposes of improving health and fitness.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'PlayAction';

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
     * The distance travelled, e.g. exercising or travelling.
     * @var Distance [schema.org types: Distance]
     */
    public $distance;

    /**
     * A sub property of location. The course where this action was taken.
     * Supersedes course.
     * @var Place [schema.org types: Place]
     */
    public $exerciseCourse;

    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     * @var Place [schema.org types: Place]
     */
    public $fromLocation;

    /**
     * A sub property of participant. The opponent on this action.
     * @var Person [schema.org types: Person]
     */
    public $opponent;

    /**
     * A sub property of location. The sports activity location where this action
     * occurred.
     * @var SportsActivityLocation [schema.org types: SportsActivityLocation]
     */
    public $sportsActivityLocation;

    /**
     * A sub property of location. The sports event where this action occurred.
     * @var SportsEvent [schema.org types: SportsEvent]
     */
    public $sportsEvent;

    /**
     * A sub property of participant. The sports team that participated on this
     * action.
     * @var SportsTeam [schema.org types: SportsTeam]
     */
    public $sportsTeam;

    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     * @var Place [schema.org types: Place]
     */
    public $toLocation;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'distance',
                'exerciseCourse',
                'fromLocation',
                'opponent',
                'sportsActivityLocation',
                'sportsEvent',
                'sportsTeam',
                'toLocation',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'distance' => ['Distance'],
                'exerciseCourse' => ['Place'],
                'fromLocation' => ['Place'],
                'opponent' => ['Person'],
                'sportsActivityLocation' => ['SportsActivityLocation'],
                'sportsEvent' => ['SportsEvent'],
                'sportsTeam' => ['SportsTeam'],
                'toLocation' => ['Place'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'distance' => 'The distance travelled, e.g. exercising or travelling.',
                'exerciseCourse' => 'A sub property of location. The course where this action was taken. Supersedes course.',
                'fromLocation' => 'A sub property of location. The original location of the object or the agent before the action.',
                'opponent' => 'A sub property of participant. The opponent on this action.',
                'sportsActivityLocation' => 'A sub property of location. The sports activity location where this action occurred.',
                'sportsEvent' => 'A sub property of location. The sports event where this action occurred.',
                'sportsTeam' => 'A sub property of participant. The sports team that participated on this action.',
                'toLocation' => 'A sub property of location. The final location of the object or the agent after the action.',
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
                [['distance','exerciseCourse','fromLocation','opponent','sportsActivityLocation','sportsEvent','sportsTeam','toLocation',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ExerciseAction*/
