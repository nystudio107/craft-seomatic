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
 * MedicalTherapy - Any medical intervention designed to prevent, treat, and cure human
 * diseases and medical conditions, including both curative and palliative
 * therapies. Medical therapies are typically processes of care relying upon
 * pharmacotherapy, behavioral therapy, supportive therapy (with fluid or
 * nutrition for example), or detoxification (e.g. hemodialysis) aimed at
 * improving or preventing a health condition.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalTherapy
 */
class MedicalTherapy extends MetaJsonLd implements MedicalTherapyInterface, TherapeuticProcedureInterface, MedicalProcedureInterface, MedicalEntityInterface, ThingInterface
{
    use MedicalTherapyTrait;
    use TherapeuticProcedureTrait;
    use MedicalProcedureTrait;
    use MedicalEntityTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'MedicalTherapy';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/MedicalTherapy';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'TherapeuticProcedure';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'Any medical intervention designed to prevent, treat, and cure human diseases and medical conditions, including both curative and palliative therapies. Medical therapies are typically processes of care relying upon pharmacotherapy, behavioral therapy, supportive therapy (with fluid or nutrition for example), or detoxification (e.g. hemodialysis) aimed at improving or preventing a health condition.';


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
            'adverseOutcome' => ['array', 'MedicalEntity', 'MedicalEntity[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'bodyLocation' => ['array', 'Text', 'Text[]'],
            'code' => ['array', 'MedicalCode', 'MedicalCode[]'],
            'contraindication' => ['array', 'Text', 'Text[]', 'array', 'MedicalContraindication', 'MedicalContraindication[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'doseSchedule' => ['array', 'DoseSchedule', 'DoseSchedule[]'],
            'drug' => ['array', 'Drug', 'Drug[]'],
            'duplicateTherapy' => ['array', 'MedicalTherapy', 'MedicalTherapy[]'],
            'followup' => ['array', 'Text', 'Text[]'],
            'funding' => ['array', 'Grant', 'Grant[]'],
            'guideline' => ['array', 'MedicalGuideline', 'MedicalGuideline[]'],
            'howPerformed' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'legalStatus' => ['array', 'Text', 'Text[]', 'array', 'DrugLegalStatus', 'DrugLegalStatus[]', 'array', 'MedicalEnumeration', 'MedicalEnumeration[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'medicineSystem' => ['array', 'MedicineSystem', 'MedicineSystem[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'preparation' => ['array', 'MedicalEntity', 'MedicalEntity[]', 'array', 'Text', 'Text[]'],
            'procedureType' => ['array', 'MedicalProcedureType', 'MedicalProcedureType[]'],
            'recognizingAuthority' => ['array', 'Organization', 'Organization[]'],
            'relevantSpecialty' => ['array', 'MedicalSpecialty', 'MedicalSpecialty[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'seriousAdverseOutcome' => ['array', 'MedicalEntity', 'MedicalEntity[]'],
            'status' => ['array', 'MedicalStudyStatus', 'MedicalStudyStatus[]', 'array', 'EventStatusType', 'EventStatusType[]', 'array', 'Text', 'Text[]'],
            'study' => ['array', 'MedicalStudy', 'MedicalStudy[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
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
            'adverseOutcome' => 'A possible complication and/or side effect of this therapy. If it is known that an adverse outcome is serious (resulting in death, disability, or permanent damage; requiring hospitalization; or otherwise life-threatening or requiring immediate medical attention), tag it as a seriousAdverseOutcome instead.',
            'alternateName' => 'An alias for the item.',
            'bodyLocation' => 'Location in the body of the anatomical structure.',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'contraindication' => 'A contraindication for this therapy.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'doseSchedule' => 'A dosing schedule for the drug for a given population, either observed, recommended, or maximum dose based on the type used.',
            'drug' => 'Specifying a drug or medicine used in a medication procedure.',
            'duplicateTherapy' => 'A therapy that duplicates or overlaps this one.',
            'followup' => 'Typical or recommended followup care after the procedure is performed.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'howPerformed' => 'How the procedure is performed.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'preparation' => 'Typical preparation that a patient must undergo before having the procedure performed.',
            'procedureType' => 'The type of procedure, for example Surgical, Noninvasive, or Percutaneous.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
            'relevantSpecialty' => 'If applicable, a medical specialty in which this entity is relevant.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seriousAdverseOutcome' => 'A possible serious complication and/or serious side effect of this therapy. Serious adverse outcomes include those that are life-threatening; result in death, disability, or permanent damage; require hospitalization or prolong existing hospitalization; cause congenital anomalies or birth defects; or jeopardize the patient and may require medical or surgical intervention to prevent one of the outcomes in this definition.',
            'status' => 'The status of the study (enumerated).',
            'study' => 'A medical study or trial related to this entity.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
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
