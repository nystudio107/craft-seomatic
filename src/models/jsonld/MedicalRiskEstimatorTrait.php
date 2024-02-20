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
 * Trait for MedicalRiskEstimator.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalRiskEstimator
 */
trait MedicalRiskEstimatorTrait
{
    /**
     * A modifiable or non-modifiable risk factor included in the calculation,
     * e.g. age, coexisting condition.
     *
     * @var array|MedicalRiskFactor|MedicalRiskFactor[]
     */
    public $includedRiskFactor;

    /**
     * The condition, complication, or symptom whose risk is being estimated.
     *
     * @var array|MedicalEntity|MedicalEntity[]
     */
    public $estimatesRiskOf;
}
