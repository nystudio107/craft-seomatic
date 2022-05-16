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
 * Trait for Patient.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Patient
 */

trait PatientTrait
{
    
    /**
     * Specifying the health condition(s) of a patient, medical study, or other
     * target audience.
     *
     * @var MedicalCondition
     */
    public $healthCondition;

    /**
     * Specifying a drug or medicine used in a medication procedure.
     *
     * @var Drug
     */
    public $drug;

    /**
     * One or more alternative conditions considered in the differential diagnosis
     * process as output of a diagnosis process.
     *
     * @var MedicalCondition
     */
    public $diagnosis;

}
