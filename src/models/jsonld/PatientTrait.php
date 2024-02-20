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
 * Trait for Patient.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Patient
 */
trait PatientTrait
{
    /**
     * Specifying a drug or medicine used in a medication procedure.
     *
     * @var array|Drug|Drug[]
     */
    public $drug;

    /**
     * Specifying the health condition(s) of a patient, medical study, or other
     * target audience.
     *
     * @var array|MedicalCondition|MedicalCondition[]
     */
    public $healthCondition;

    /**
     * One or more alternative conditions considered in the differential diagnosis
     * process as output of a diagnosis process.
     *
     * @var array|MedicalCondition|MedicalCondition[]
     */
    public $diagnosis;
}
