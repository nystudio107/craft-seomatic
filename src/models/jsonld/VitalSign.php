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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v26.0-release
 * VitalSign - Vital signs are measures of various physiological functions in order to
 * assess the most basic body functions.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VitalSign
 */
class VitalSign extends MetaJsonLd implements VitalSignInterface, MedicalSignInterface, MedicalSignOrSymptomInterface, MedicalConditionInterface, MedicalEntityInterface, ThingInterface
{
    use VitalSignTrait;
    use MedicalSignTrait;
    use MedicalSignOrSymptomTrait;
    use MedicalConditionTrait;
    use MedicalEntityTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'VitalSign';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/VitalSign';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'MedicalSign';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'Vital signs are measures of various physiological functions in order to assess the most basic body functions.';


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'associatedAnatomy' => ['array', 'AnatomicalSystem', 'AnatomicalSystem[]', 'array', 'SuperficialAnatomy', 'SuperficialAnatomy[]', 'array', 'AnatomicalStructure', 'AnatomicalStructure[]'],
            'code' => ['array', 'MedicalCode', 'MedicalCode[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'differentialDiagnosis' => ['array', 'DDxElement', 'DDxElement[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'drug' => ['array', 'Drug', 'Drug[]'],
            'epidemiology' => ['array', 'Text', 'Text[]'],
            'expectedPrognosis' => ['array', 'Text', 'Text[]'],
            'funding' => ['array', 'Grant', 'Grant[]'],
            'guideline' => ['array', 'MedicalGuideline', 'MedicalGuideline[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'identifyingExam' => ['array', 'PhysicalExam', 'PhysicalExam[]'],
            'identifyingTest' => ['array', 'MedicalTest', 'MedicalTest[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'legalStatus' => ['array', 'Text', 'Text[]', 'array', 'DrugLegalStatus', 'DrugLegalStatus[]', 'array', 'MedicalEnumeration', 'MedicalEnumeration[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'medicineSystem' => ['array', 'MedicineSystem', 'MedicineSystem[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'naturalProgression' => ['array', 'Text', 'Text[]'],
            'pathophysiology' => ['array', 'Text', 'Text[]'],
            'possibleComplication' => ['array', 'Text', 'Text[]'],
            'possibleTreatment' => ['array', 'MedicalTherapy', 'MedicalTherapy[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'primaryPrevention' => ['array', 'MedicalTherapy', 'MedicalTherapy[]'],
            'recognizingAuthority' => ['array', 'Organization', 'Organization[]'],
            'relevantSpecialty' => ['array', 'MedicalSpecialty', 'MedicalSpecialty[]'],
            'riskFactor' => ['array', 'MedicalRiskFactor', 'MedicalRiskFactor[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'secondaryPrevention' => ['array', 'MedicalTherapy', 'MedicalTherapy[]'],
            'signOrSymptom' => ['array', 'MedicalSignOrSymptom', 'MedicalSignOrSymptom[]'],
            'stage' => ['array', 'MedicalConditionStage', 'MedicalConditionStage[]'],
            'status' => ['array', 'MedicalStudyStatus', 'MedicalStudyStatus[]', 'array', 'EventStatusType', 'EventStatusType[]', 'array', 'Text', 'Text[]'],
            'study' => ['array', 'MedicalStudy', 'MedicalStudy[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'typicalTest' => ['array', 'MedicalTest', 'MedicalTest[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'associatedAnatomy' => 'The anatomy of the underlying organ system or structures associated with this entity.',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'description' => 'A description of the item.',
            'differentialDiagnosis' => 'One of a set of differential diagnoses for the condition. Specifically, a closely-related or competing diagnosis typically considered later in the cognitive process whereby this medical condition is distinguished from others most likely responsible for a similar collection of signs and symptoms to reach the most parsimonious diagnosis or diagnoses in a patient.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'drug' => 'Specifying a drug or medicine used in a medication procedure.',
            'epidemiology' => 'The characteristics of associated patients, such as age, gender, race etc.',
            'expectedPrognosis' => 'The likely outcome in either the short term or long term of the medical condition.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'identifyingExam' => 'A physical examination that can identify this sign.',
            'identifyingTest' => 'A diagnostic test that can identify this sign.',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'name' => 'The name of the item.',
            'naturalProgression' => 'The expected progression of the condition if it is not treated and allowed to progress naturally.',
            'pathophysiology' => 'Changes in the normal mechanical, physical, and biochemical functions that are associated with this activity or condition.',
            'possibleComplication' => 'A possible unexpected and unfavorable evolution of a medical condition. Complications may include worsening of the signs or symptoms of the disease, extension of the condition to other organ systems, etc.',
            'possibleTreatment' => 'A possible treatment to address this condition, sign or symptom.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'primaryPrevention' => 'A preventative therapy used to prevent an initial occurrence of the medical condition, such as vaccination.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
            'relevantSpecialty' => 'If applicable, a medical specialty in which this entity is relevant.',
            'riskFactor' => 'A modifiable or non-modifiable factor that increases the risk of a patient contracting this condition, e.g. age,  coexisting condition.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'secondaryPrevention' => 'A preventative therapy used to prevent reoccurrence of the medical condition after an initial episode of the condition.',
            'signOrSymptom' => 'A sign or symptom of this condition. Signs are objective or physically observable manifestations of the medical condition while symptoms are the subjective experience of the medical condition.',
            'stage' => 'The stage of the condition, if applicable.',
            'status' => 'The status of the study (enumerated).',
            'study' => 'A medical study or trial related to this entity.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'typicalTest' => 'A medical test typically performed given this condition.',
            'url' => 'URL of the item.',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRequiredSchema(): array
    {
        return ['description', 'name'];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRecommendedSchema(): array
    {
        return ['image', 'url'];
    }


    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules = array_merge($rules, [
                [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
                [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);

        return $rules;
    }
}
