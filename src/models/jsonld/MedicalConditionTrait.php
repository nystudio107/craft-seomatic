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
 * Trait for MedicalCondition.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalCondition
 */
trait MedicalConditionTrait
{
    /**
     * One of a set of differential diagnoses for the condition. Specifically, a
     * closely-related or competing diagnosis typically considered later in the
     * cognitive process whereby this medical condition is distinguished from
     * others most likely responsible for a similar collection of signs and
     * symptoms to reach the most parsimonious diagnosis or diagnoses in a
     * patient.
     *
     * @var array|DDxElement|DDxElement[]
     */
    public $differentialDiagnosis;

    /**
     * Specifying a drug or medicine used in a medication procedure.
     *
     * @var array|Drug|Drug[]
     */
    public $drug;

    /**
     * A possible unexpected and unfavorable evolution of a medical condition.
     * Complications may include worsening of the signs or symptoms of the
     * disease, extension of the condition to other organ systems, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $possibleComplication;

    /**
     * The stage of the condition, if applicable.
     *
     * @var array|MedicalConditionStage|MedicalConditionStage[]
     */
    public $stage;

    /**
     * The expected progression of the condition if it is not treated and allowed
     * to progress naturally.
     *
     * @var string|array|Text|Text[]
     */
    public $naturalProgression;

    /**
     * The characteristics of associated patients, such as age, gender, race etc.
     *
     * @var string|array|Text|Text[]
     */
    public $epidemiology;

    /**
     * A preventative therapy used to prevent an initial occurrence of the medical
     * condition, such as vaccination.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $primaryPrevention;

    /**
     * The anatomy of the underlying organ system or structures associated with
     * this entity.
     *
     * @var array|AnatomicalSystem|AnatomicalSystem[]|array|SuperficialAnatomy|SuperficialAnatomy[]|array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $associatedAnatomy;

    /**
     * The status of the study (enumerated).
     *
     * @var string|array|MedicalStudyStatus|MedicalStudyStatus[]|array|EventStatusType|EventStatusType[]|array|Text|Text[]
     */
    public $status;

    /**
     * A sign or symptom of this condition. Signs are objective or physically
     * observable manifestations of the medical condition while symptoms are the
     * subjective experience of the medical condition.
     *
     * @var array|MedicalSignOrSymptom|MedicalSignOrSymptom[]
     */
    public $signOrSymptom;

    /**
     * A medical test typically performed given this condition.
     *
     * @var array|MedicalTest|MedicalTest[]
     */
    public $typicalTest;

    /**
     * A possible treatment to address this condition, sign or symptom.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $possibleTreatment;

    /**
     * A modifiable or non-modifiable factor that increases the risk of a patient
     * contracting this condition, e.g. age,  coexisting condition.
     *
     * @var array|MedicalRiskFactor|MedicalRiskFactor[]
     */
    public $riskFactor;

    /**
     * Changes in the normal mechanical, physical, and biochemical functions that
     * are associated with this activity or condition.
     *
     * @var string|array|Text|Text[]
     */
    public $pathophysiology;

    /**
     * The likely outcome in either the short term or long term of the medical
     * condition.
     *
     * @var string|array|Text|Text[]
     */
    public $expectedPrognosis;

    /**
     * A preventative therapy used to prevent reoccurrence of the medical
     * condition after an initial episode of the condition.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $secondaryPrevention;
}
