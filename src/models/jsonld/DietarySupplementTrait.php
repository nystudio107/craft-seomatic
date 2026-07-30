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
 * schema.org version: v30.0
 * Trait for DietarySupplement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DietarySupplement
 */
trait DietarySupplementTrait
{
    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|array|Text|Text[]
     */
    public $activeIngredient;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isProprietary;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|array|DrugLegalStatus|DrugLegalStatus[]|array|MedicalEnumeration|MedicalEnumeration[]|array|Text|Text[]
     */
    public $legalStatus;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var array|MaximumDoseSchedule|MaximumDoseSchedule[]
     */
    public $maximumIntake;

    /**
     * The specific biochemical interaction through which this drug or supplement
     * produces its pharmacological effect.
     *
     * @var string|array|Text|Text[]
     */
    public $mechanismOfAction;

    /**
     * The generic name of this drug or supplement.
     *
     * @var string|array|Text|Text[]
     */
    public $nonProprietaryName;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var string|array|Text|Text[]
     */
    public $proprietaryName;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var array|RecommendedDoseSchedule|RecommendedDoseSchedule[]
     */
    public $recommendedIntake;

    /**
     * Any potential safety concern associated with the supplement. May include
     * interactions with other drugs and foods, pregnancy, breastfeeding, known
     * adverse reactions, and documented efficacy of the supplement.
     *
     * @var string|array|Text|Text[]
     */
    public $safetyConsideration;

    /**
     * Characteristics of the population for which this is intended, or which
     * typically uses it, e.g. 'adults'.
     *
     * @var string|array|Text|Text[]
     */
    public $targetPopulation;
}
