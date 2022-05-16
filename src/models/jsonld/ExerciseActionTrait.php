<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for ExerciseAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ExerciseAction
 */

trait ExerciseActionTrait
{
    
    /**
     * A sub property of participant. The sports team that participated on this
     * action.
     *
     * @var SportsTeam
     */
    public $sportsTeam;

    /**
     * A sub property of location. The course where this action was taken.
     *
     * @var Place
     */
    public $course;

    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     *
     * @var Place
     */
    public $fromLocation;

    /**
     * A sub property of instrument. The diet used in this action.
     *
     * @var Diet
     */
    public $diet;

    /**
     * A sub property of location. The sports activity location where this action
     * occurred.
     *
     * @var SportsActivityLocation
     */
    public $sportsActivityLocation;

    /**
     * The distance travelled, e.g. exercising or travelling.
     *
     * @var Distance
     */
    public $distance;

    /**
     * A sub property of instrument. The exercise plan used on this action.
     *
     * @var ExercisePlan
     */
    public $exercisePlan;

    /**
     * A sub property of location. The sports event where this action occurred.
     *
     * @var SportsEvent
     */
    public $sportsEvent;

    /**
     * A sub property of instrument. The diet used in this action.
     *
     * @var Diet
     */
    public $exerciseRelatedDiet;

    /**
     * A sub property of participant. The opponent on this action.
     *
     * @var Person
     */
    public $opponent;

    /**
     * A sub property of location. The course where this action was taken.
     *
     * @var Place
     */
    public $exerciseCourse;

    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     *
     * @var Place
     */
    public $toLocation;

    /**
     * Type(s) of exercise or activity, such as strength training, flexibility
     * training, aerobics, cardiac rehabilitation, etc.
     *
     * @var string|Text
     */
    public $exerciseType;

}
