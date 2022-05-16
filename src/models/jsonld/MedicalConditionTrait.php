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
 * Trait for MedicalCondition.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalCondition
 */

trait MedicalConditionTrait
{
    
    /**
     * A possible unexpected and unfavorable evolution of a medical condition.
     * Complications may include worsening of the signs or symptoms of the
     * disease, extension of the condition to other organ systems, etc.
     *
     * @var string|Text
     */
    public $possibleComplication;

    /**
     * The expected progression of the condition if it is not treated and allowed
     * to progress naturally.
     *
     * @var string|Text
     */
    public $naturalProgression;

    /**
     * A preventative therapy used to prevent an initial occurrence of the medical
     * condition, such as vaccination.
     *
     * @var MedicalTherapy
     */
    public $primaryPrevention;

    /**
     * The status of the study (enumerated).
     *
     * @var string|Text|EventStatusType|MedicalStudyStatus
     */
    public $status;

    /**
     * One of a set of differential diagnoses for the condition. Specifically, a
     * closely-related or competing diagnosis typically considered later in the
     * cognitive process whereby this medical condition is distinguished from
     * others most likely responsible for a similar collection of signs and
     * symptoms to reach the most parsimonious diagnosis or diagnoses in a
     * patient.
     *
     * @var DDxElement
     */
    public $differentialDiagnosis;

    /**
     * The stage of the condition, if applicable.
     *
     * @var MedicalConditionStage
     */
    public $stage;

    /**
     * Changes in the normal mechanical, physical, and biochemical functions that
     * are associated with this activity or condition.
     *
     * @var string|Text
     */
    public $pathophysiology;

    /**
     * Specifying a drug or medicine used in a medication procedure.
     *
     * @var Drug
     */
    public $drug;

    /**
     * A preventative therapy used to prevent reoccurrence of the medical
     * condition after an initial episode of the condition.
     *
     * @var MedicalTherapy
     */
    public $secondaryPrevention;

    /**
     * The anatomy of the underlying organ system or structures associated with
     * this entity.
     *
     * @var AnatomicalStructure|AnatomicalSystem|SuperficialAnatomy
     */
    public $associatedAnatomy;

    /**
     * A sign or symptom of this condition. Signs are objective or physically
     * observable manifestations of the medical condition while symptoms are the
     * subjective experience of the medical condition.
     *
     * @var MedicalSignOrSymptom
     */
    public $signOrSymptom;

    /**
     * A medical test typically performed given this condition.
     *
     * @var MedicalTest
     */
    public $typicalTest;

    /**
     * The characteristics of associated patients, such as age, gender, race etc.
     *
     * @var string|Text
     */
    public $epidemiology;

    /**
     * A modifiable or non-modifiable factor that increases the risk of a patient
     * contracting this condition, e.g. age,  coexisting condition.
     *
     * @var MedicalRiskFactor
     */
    public $riskFactor;

    /**
     * The likely outcome in either the short term or long term of the medical
     * condition.
     *
     * @var string|Text
     */
    public $expectedPrognosis;

    /**
     * A possible treatment to address this condition, sign or symptom.
     *
     * @var MedicalTherapy
     */
    public $possibleTreatment;

}
