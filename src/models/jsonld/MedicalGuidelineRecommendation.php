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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v15.0-release
 * MedicalGuidelineRecommendation - A guideline recommendation that is regarded as efficacious and where
 * quality of the data supporting the recommendation is sound.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalGuidelineRecommendation
 */
class MedicalGuidelineRecommendation extends MetaJsonLd implements MedicalGuidelineRecommendationInterface, MedicalGuidelineInterface, MedicalEntityInterface, ThingInterface
{
    use MedicalGuidelineRecommendationTrait;
    use MedicalGuidelineTrait;
    use MedicalEntityTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static $schemaTypeName = 'MedicalGuidelineRecommendation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static $schemaTypeScope = 'https://schema.org/MedicalGuidelineRecommendation';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static $schemaTypeExtends = 'MedicalGuideline';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static $schemaTypeDescription = 'A guideline recommendation that is regarded as efficacious and where quality of the data supporting the recommendation is sound.';


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
            'additionalType' => ['URL'],
            'alternateName' => ['Text'],
            'code' => ['MedicalCode'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'evidenceLevel' => ['MedicalEvidenceLevel'],
            'evidenceOrigin' => ['Text'],
            'funding' => ['Grant'],
            'guideline' => ['MedicalGuideline'],
            'guidelineDate' => ['Date'],
            'guidelineSubject' => ['MedicalEntity'],
            'identifier' => ['PropertyValue', 'URL', 'Text'],
            'image' => ['URL', 'ImageObject'],
            'legalStatus' => ['Text', 'DrugLegalStatus', 'MedicalEnumeration'],
            'mainEntityOfPage' => ['URL', 'CreativeWork'],
            'medicineSystem' => ['MedicineSystem'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'recognizingAuthority' => ['Organization'],
            'recommendationStrength' => ['Text'],
            'relevantSpecialty' => ['MedicalSpecialty'],
            'sameAs' => ['URL'],
            'study' => ['MedicalStudy'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'url' => ['URL'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'alternateName' => 'An alias for the item.',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'evidenceLevel' => 'Strength of evidence of the data used to formulate the guideline (enumerated).',
            'evidenceOrigin' => 'Source of the data used to formulate the guidance, e.g. RCT, consensus opinion, etc.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'guidelineDate' => 'Date on which this guideline\'s recommendation was made.',
            'guidelineSubject' => 'The medical conditions, treatments, etc. that are the subject of the guideline.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
            'recommendationStrength' => 'Strength of the guideline\'s recommendation (e.g. \'class I\').',
            'relevantSpecialty' => 'If applicable, a medical specialty in which this entity is relevant.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
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
