<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MedicalEntity;

/**
 * MedicalCondition - Any condition of the human body that affects the normal
 * functioning of a person, whether physically or mentally. Includes diseases,
 * injuries, disabilities, disorders, syndromes, etc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MedicalCondition
 */
class MedicalCondition extends MedicalEntity
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MedicalCondition';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MedicalCondition';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Any condition of the human body that affects the normal functioning of a person, whether physically or mentally. Includes diseases, injuries, disabilities, disorders, syndromes, etc.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MedicalEntity';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The anatomy of the underlying organ system or structures associated with
     * this entity.
     *
     * @var mixed|AnatomicalStructure|AnatomicalSystem|SuperficialAnatomy [schema.org types: AnatomicalStructure, AnatomicalSystem, SuperficialAnatomy]
     */
    public $associatedAnatomy;

    /**
     * Specifying a cause of something in general. e.g in medicine , one of the
     * causative agent(s) that are most directly responsible for the
     * pathophysiologic process that eventually results in the occurrence.
     *
     * @var mixed|MedicalCause [schema.org types: MedicalCause]
     */
    public $cause;

    /**
     * One of a set of differential diagnoses for the condition. Specifically, a
     * closely-related or competing diagnosis typically considered later in the
     * cognitive process whereby this medical condition is distinguished from
     * others most likely responsible for a similar collection of signs and
     * symptoms to reach the most parsimonious diagnosis or diagnoses in a
     * patient.
     *
     * @var mixed|DDxElement [schema.org types: DDxElement]
     */
    public $differentialDiagnosis;

    /**
     * Specifying a drug or medicine used in a medication procedure
     *
     * @var mixed|Drug [schema.org types: Drug]
     */
    public $drug;

    /**
     * The characteristics of associated patients, such as age, gender, race etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $epidemiology;

    /**
     * The likely outcome in either the short term or long term of the medical
     * condition.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $expectedPrognosis;

    /**
     * The expected progression of the condition if it is not treated and allowed
     * to progress naturally.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $naturalProgression;

    /**
     * Changes in the normal mechanical, physical, and biochemical functions that
     * are associated with this activity or condition.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $pathophysiology;

    /**
     * A possible unexpected and unfavorable evolution of a medical condition.
     * Complications may include worsening of the signs or symptoms of the
     * disease, extension of the condition to other organ systems, etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $possibleComplication;

    /**
     * A possible treatment to address this condition, sign or symptom.
     *
     * @var mixed|MedicalTherapy [schema.org types: MedicalTherapy]
     */
    public $possibleTreatment;

    /**
     * A preventative therapy used to prevent an initial occurrence of the medical
     * condition, such as vaccination.
     *
     * @var mixed|MedicalTherapy [schema.org types: MedicalTherapy]
     */
    public $primaryPrevention;

    /**
     * A modifiable or non-modifiable factor that increases the risk of a patient
     * contracting this condition, e.g. age, coexisting condition.
     *
     * @var mixed|MedicalRiskFactor [schema.org types: MedicalRiskFactor]
     */
    public $riskFactor;

    /**
     * A preventative therapy used to prevent reoccurrence of the medical
     * condition after an initial episode of the condition.
     *
     * @var mixed|MedicalTherapy [schema.org types: MedicalTherapy]
     */
    public $secondaryPrevention;

    /**
     * A sign or symptom of this condition. Signs are objective or physically
     * observable manifestations of the medical condition while symptoms are the
     * subjective experience of the medical condition.
     *
     * @var mixed|MedicalSignOrSymptom [schema.org types: MedicalSignOrSymptom]
     */
    public $signOrSymptom;

    /**
     * The stage of the condition, if applicable.
     *
     * @var mixed|MedicalConditionStage [schema.org types: MedicalConditionStage]
     */
    public $stage;

    /**
     * The status of the study (enumerated).
     *
     * @var mixed|EventStatusType|MedicalStudyStatus|string [schema.org types: EventStatusType, MedicalStudyStatus, Text]
     */
    public $status;

    /**
     * A more specific type of the condition, where applicable, for example 'Type
     * 1 Diabetes', 'Type 2 Diabetes', or 'Gestational Diabetes' for Diabetes.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $subtype;

    /**
     * A medical test typically performed given this condition.
     *
     * @var mixed|MedicalTest [schema.org types: MedicalTest]
     */
    public $typicalTest;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'associatedAnatomy',
        'cause',
        'differentialDiagnosis',
        'drug',
        'epidemiology',
        'expectedPrognosis',
        'naturalProgression',
        'pathophysiology',
        'possibleComplication',
        'possibleTreatment',
        'primaryPrevention',
        'riskFactor',
        'secondaryPrevention',
        'signOrSymptom',
        'stage',
        'status',
        'subtype',
        'typicalTest'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'associatedAnatomy' => ['AnatomicalStructure','AnatomicalSystem','SuperficialAnatomy'],
        'cause' => ['MedicalCause'],
        'differentialDiagnosis' => ['DDxElement'],
        'drug' => ['Drug'],
        'epidemiology' => ['Text'],
        'expectedPrognosis' => ['Text'],
        'naturalProgression' => ['Text'],
        'pathophysiology' => ['Text'],
        'possibleComplication' => ['Text'],
        'possibleTreatment' => ['MedicalTherapy'],
        'primaryPrevention' => ['MedicalTherapy'],
        'riskFactor' => ['MedicalRiskFactor'],
        'secondaryPrevention' => ['MedicalTherapy'],
        'signOrSymptom' => ['MedicalSignOrSymptom'],
        'stage' => ['MedicalConditionStage'],
        'status' => ['EventStatusType','MedicalStudyStatus','Text'],
        'subtype' => ['Text'],
        'typicalTest' => ['MedicalTest']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'associatedAnatomy' => 'The anatomy of the underlying organ system or structures associated with this entity.',
        'cause' => 'Specifying a cause of something in general. e.g in medicine , one of the causative agent(s) that are most directly responsible for the pathophysiologic process that eventually results in the occurrence.',
        'differentialDiagnosis' => 'One of a set of differential diagnoses for the condition. Specifically, a closely-related or competing diagnosis typically considered later in the cognitive process whereby this medical condition is distinguished from others most likely responsible for a similar collection of signs and symptoms to reach the most parsimonious diagnosis or diagnoses in a patient.',
        'drug' => 'Specifying a drug or medicine used in a medication procedure',
        'epidemiology' => 'The characteristics of associated patients, such as age, gender, race etc.',
        'expectedPrognosis' => 'The likely outcome in either the short term or long term of the medical condition.',
        'naturalProgression' => 'The expected progression of the condition if it is not treated and allowed to progress naturally.',
        'pathophysiology' => 'Changes in the normal mechanical, physical, and biochemical functions that are associated with this activity or condition.',
        'possibleComplication' => 'A possible unexpected and unfavorable evolution of a medical condition. Complications may include worsening of the signs or symptoms of the disease, extension of the condition to other organ systems, etc.',
        'possibleTreatment' => 'A possible treatment to address this condition, sign or symptom.',
        'primaryPrevention' => 'A preventative therapy used to prevent an initial occurrence of the medical condition, such as vaccination.',
        'riskFactor' => 'A modifiable or non-modifiable factor that increases the risk of a patient contracting this condition, e.g. age, coexisting condition.',
        'secondaryPrevention' => 'A preventative therapy used to prevent reoccurrence of the medical condition after an initial episode of the condition.',
        'signOrSymptom' => 'A sign or symptom of this condition. Signs are objective or physically observable manifestations of the medical condition while symptoms are the subjective experience of the medical condition.',
        'stage' => 'The stage of the condition, if applicable.',
        'status' => 'The status of the study (enumerated).',
        'subtype' => 'A more specific type of the condition, where applicable, for example \'Type 1 Diabetes\', \'Type 2 Diabetes\', or \'Gestational Diabetes\' for Diabetes.',
        'typicalTest' => 'A medical test typically performed given this condition.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['associatedAnatomy','cause','differentialDiagnosis','drug','epidemiology','expectedPrognosis','naturalProgression','pathophysiology','possibleComplication','possibleTreatment','primaryPrevention','riskFactor','secondaryPrevention','signOrSymptom','stage','status','subtype','typicalTest'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
