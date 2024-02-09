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
 * Muscle - A muscle is an anatomical structure consisting of a contractile form of
 * tissue that animals use to effect movement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Muscle
 */
class Muscle extends MetaJsonLd implements MuscleInterface, AnatomicalStructureInterface, MedicalEntityInterface, ThingInterface
{
    use MuscleTrait;
    use AnatomicalStructureTrait;
    use MedicalEntityTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static $schemaTypeName = 'Muscle';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static $schemaTypeScope = 'https://schema.org/Muscle';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static $schemaTypeExtends = 'AnatomicalStructure';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static $schemaTypeDescription = 'A muscle is an anatomical structure consisting of a contractile form of tissue that animals use to effect movement.';


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
            'antagonist' => ['Muscle'],
            'associatedPathophysiology' => ['Text'],
            'bloodSupply' => ['Vessel'],
            'bodyLocation' => ['Text'],
            'code' => ['MedicalCode'],
            'connectedTo' => ['AnatomicalStructure'],
            'description' => ['Text'],
            'diagram' => ['ImageObject'],
            'disambiguatingDescription' => ['Text'],
            'funding' => ['Grant'],
            'guideline' => ['MedicalGuideline'],
            'identifier' => ['PropertyValue', 'URL', 'Text'],
            'image' => ['URL', 'ImageObject'],
            'insertion' => ['AnatomicalStructure'],
            'legalStatus' => ['Text', 'DrugLegalStatus', 'MedicalEnumeration'],
            'mainEntityOfPage' => ['URL', 'CreativeWork'],
            'medicineSystem' => ['MedicineSystem'],
            'muscleAction' => ['Text'],
            'name' => ['Text'],
            'nerve' => ['Nerve'],
            'partOfSystem' => ['AnatomicalSystem'],
            'potentialAction' => ['Action'],
            'recognizingAuthority' => ['Organization'],
            'relatedCondition' => ['MedicalCondition'],
            'relatedTherapy' => ['MedicalTherapy'],
            'relevantSpecialty' => ['MedicalSpecialty'],
            'sameAs' => ['URL'],
            'study' => ['MedicalStudy'],
            'subStructure' => ['AnatomicalStructure'],
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
            'antagonist' => 'The muscle whose action counteracts the specified muscle.',
            'associatedPathophysiology' => 'If applicable, a description of the pathophysiology associated with the anatomical system, including potential abnormal changes in the mechanical, physical, and biochemical functions of the system.',
            'bloodSupply' => 'The blood vessel that carries blood from the heart to the muscle.',
            'bodyLocation' => 'Location in the body of the anatomical structure.',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'connectedTo' => 'Other anatomical structures to which this structure is connected.',
            'description' => 'A description of the item.',
            'diagram' => 'An image containing a diagram that illustrates the structure and/or its component substructures and/or connections with other structures.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'insertion' => 'The place of attachment of a muscle, or what the muscle moves.',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'muscleAction' => 'The movement the muscle generates.',
            'name' => 'The name of the item.',
            'nerve' => 'The underlying innervation associated with the muscle.',
            'partOfSystem' => 'The anatomical or organ system that this structure is part of.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
            'relatedCondition' => 'A medical condition associated with this anatomy.',
            'relatedTherapy' => 'A medical therapy related to this anatomy.',
            'relevantSpecialty' => 'If applicable, a medical specialty in which this entity is relevant.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'study' => 'A medical study or trial related to this entity.',
            'subStructure' => 'Component (sub-)structure(s) that comprise this anatomical structure.',
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
