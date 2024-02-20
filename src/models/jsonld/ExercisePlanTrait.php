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
 * Trait for ExercisePlan.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ExercisePlan
 */
trait ExercisePlanTrait
{
    /**
     * How often one should break from the activity.
     *
     * @var string|array|QuantitativeValue|QuantitativeValue[]|array|Text|Text[]
     */
    public $restPeriods;

    /**
     * Quantitative measure of the physiologic output of the exercise; also
     * referred to as energy expenditure.
     *
     * @var array|Energy|Energy[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $workload;

    /**
     * Number of times one should repeat the activity.
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $repetitions;

    /**
     * Length of time to engage in the activity.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Duration|Duration[]
     */
    public $activityDuration;

    /**
     * How often one should engage in the activity.
     *
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $activityFrequency;

    /**
     * Type(s) of exercise or activity, such as strength training, flexibility
     * training, aerobics, cardiac rehabilitation, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $exerciseType;

    /**
     * Quantitative measure gauging the degree of force involved in the exercise,
     * for example, heartbeats per minute. May include the velocity of the
     * movement.
     *
     * @var string|array|QuantitativeValue|QuantitativeValue[]|array|Text|Text[]
     */
    public $intensity;

    /**
     * Any additional component of the exercise prescription that may need to be
     * articulated to the patient. This may include the order of exercises, the
     * number of repetitions of movement, quantitative distance, progressions over
     * time, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $additionalVariable;
}
