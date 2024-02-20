<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
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
     * @var array|SportsTeam|SportsTeam[]
     */
    public $sportsTeam;

    /**
     * A sub property of participant. The opponent on this action.
     *
     * @var array|Person|Person[]
     */
    public $opponent;

    /**
     * A sub property of instrument. The diet used in this action.
     *
     * @var array|Diet|Diet[]
     */
    public $diet;

    /**
     * A sub property of location. The sports event where this action occurred.
     *
     * @var array|SportsEvent|SportsEvent[]
     */
    public $sportsEvent;

    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     *
     * @var array|Place|Place[]
     */
    public $fromLocation;

    /**
     * The distance travelled, e.g. exercising or travelling.
     *
     * @var array|Distance|Distance[]
     */
    public $distance;

    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     *
     * @var array|Place|Place[]
     */
    public $toLocation;

    /**
     * A sub property of location. The course where this action was taken.
     *
     * @var array|Place|Place[]
     */
    public $course;

    /**
     * A sub property of location. The course where this action was taken.
     *
     * @var array|Place|Place[]
     */
    public $exerciseCourse;

    /**
     * A sub property of instrument. The exercise plan used on this action.
     *
     * @var array|ExercisePlan|ExercisePlan[]
     */
    public $exercisePlan;

    /**
     * Type(s) of exercise or activity, such as strength training, flexibility
     * training, aerobics, cardiac rehabilitation, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $exerciseType;

    /**
     * A sub property of location. The sports activity location where this action
     * occurred.
     *
     * @var array|SportsActivityLocation|SportsActivityLocation[]
     */
    public $sportsActivityLocation;

    /**
     * A sub property of instrument. The diet used in this action.
     *
     * @var array|Diet|Diet[]
     */
    public $exerciseRelatedDiet;
}
