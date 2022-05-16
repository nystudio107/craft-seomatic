<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for ExercisePlan.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ExercisePlan
 */

trait ExercisePlanTrait
{
    
    /**
     * Number of times one should repeat the activity.
     *
     * @var float|Number|QuantitativeValue
     */
    public $repetitions;

    /**
     * Quantitative measure gauging the degree of force involved in the exercise,
     * for example, heartbeats per minute. May include the velocity of the
     * movement.
     *
     * @var string|QuantitativeValue|Text
     */
    public $intensity;

    /**
     * Quantitative measure of the physiologic output of the exercise; also
     * referred to as energy expenditure.
     *
     * @var QuantitativeValue|Energy
     */
    public $workload;

    /**
     * Length of time to engage in the activity.
     *
     * @var Duration|QuantitativeValue
     */
    public $activityDuration;

    /**
     * How often one should break from the activity.
     *
     * @var string|Text|QuantitativeValue
     */
    public $restPeriods;

    /**
     * How often one should engage in the activity.
     *
     * @var string|Text|QuantitativeValue
     */
    public $activityFrequency;

    /**
     * Any additional component of the exercise prescription that may need to be
     * articulated to the patient. This may include the order of exercises, the
     * number of repetitions of movement, quantitative distance, progressions over
     * time, etc.
     *
     * @var string|Text
     */
    public $additionalVariable;

    /**
     * Type(s) of exercise or activity, such as strength training, flexibility
     * training, aerobics, cardiac rehabilitation, etc.
     *
     * @var string|Text
     */
    public $exerciseType;

}
