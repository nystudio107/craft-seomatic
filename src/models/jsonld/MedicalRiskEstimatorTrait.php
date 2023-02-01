<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for MedicalRiskEstimator.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalRiskEstimator
 */
trait MedicalRiskEstimatorTrait
{
    /**
     * The condition, complication, or symptom whose risk is being estimated.
     *
     * @var MedicalEntity
     */
    public $estimatesRiskOf;

    /**
     * A modifiable or non-modifiable risk factor included in the calculation,
     * e.g. age, coexisting condition.
     *
     * @var MedicalRiskFactor
     */
    public $includedRiskFactor;
}
