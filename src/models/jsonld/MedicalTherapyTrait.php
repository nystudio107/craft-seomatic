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
 * Trait for MedicalTherapy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalTherapy
 */
trait MedicalTherapyTrait
{
    /**
     * A contraindication for this therapy.
     *
     * @var string|array|Text|Text[]|array|MedicalContraindication|MedicalContraindication[]
     */
    public $contraindication;

    /**
     * A therapy that duplicates or overlaps this one.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $duplicateTherapy;

    /**
     * A possible serious complication and/or serious side effect of this therapy.
     * Serious adverse outcomes include those that are life-threatening; result in
     * death, disability, or permanent damage; require hospitalization or prolong
     * existing hospitalization; cause congenital anomalies or birth defects; or
     * jeopardize the patient and may require medical or surgical intervention to
     * prevent one of the outcomes in this definition.
     *
     * @var array|MedicalEntity|MedicalEntity[]
     */
    public $seriousAdverseOutcome;
}
