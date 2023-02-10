<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for MedicalTherapy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalTherapy
 */
trait MedicalTherapyTrait
{
    /**
     * A possible serious complication and/or serious side effect of this therapy.
     * Serious adverse outcomes include those that are life-threatening; result in
     * death, disability, or permanent damage; require hospitalization or prolong
     * existing hospitalization; cause congenital anomalies or birth defects; or
     * jeopardize the patient and may require medical or surgical intervention to
     * prevent one of the outcomes in this definition.
     *
     * @var MedicalEntity
     */
    public $seriousAdverseOutcome;

    /**
     * A therapy that duplicates or overlaps this one.
     *
     * @var MedicalTherapy
     */
    public $duplicateTherapy;

    /**
     * A contraindication for this therapy.
     *
     * @var string|Text|MedicalContraindication
     */
    public $contraindication;
}
