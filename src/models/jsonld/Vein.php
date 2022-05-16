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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v14.0-release
 * Vein - A type of blood vessel that specifically carries blood to the heart.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Vein
 */
class Vein extends MetaJsonLd implements VeinInterface, VesselInterface, AnatomicalStructureInterface, MedicalEntityInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'Vein';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/Vein';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
A type of blood vessel that specifically carries blood to the heart.
SCHEMADESC;

    use VeinTrait;
    use VesselTrait;
    use AnatomicalStructureTrait;
    use MedicalEntityTrait;
    use ThingTrait;

    // Public methods
    // =========================================================================

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
            'associatedPathophysiology' => ['Text'],
            'bodyLocation' => ['Text'],
            'code' => ['MedicalCode'],
            'connectedTo' => ['AnatomicalStructure'],
            'description' => ['Text'],
            'diagram' => ['ImageObject'],
            'disambiguatingDescription' => ['Text'],
            'drainsTo' => ['Vessel'],
            'funding' => ['Grant'],
            'guideline' => ['MedicalGuideline'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'legalStatus' => ['DrugLegalStatus', 'Text', 'MedicalEnumeration'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'medicineSystem' => ['MedicineSystem'],
            'name' => ['Text'],
            'partOfSystem' => ['AnatomicalSystem'],
            'potentialAction' => ['Action'],
            'recognizingAuthority' => ['Organization'],
            'regionDrained' => ['AnatomicalSystem', 'AnatomicalStructure'],
            'relatedCondition' => ['MedicalCondition'],
            'relatedTherapy' => ['MedicalTherapy'],
            'relevantSpecialty' => ['MedicalSpecialty'],
            'sameAs' => ['URL'],
            'study' => ['MedicalStudy'],
            'subStructure' => ['AnatomicalStructure'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'tributary' => ['AnatomicalStructure'],
            'url' => ['URL']
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
            'associatedPathophysiology' => 'If applicable, a description of the pathophysiology associated with the anatomical system, including potential abnormal changes in the mechanical, physical, and biochemical functions of the system.',
            'bodyLocation' => 'Location in the body of the anatomical structure.',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'connectedTo' => 'Other anatomical structures to which this structure is connected.',
            'description' => 'A description of the item.',
            'diagram' => 'An image containing a diagram that illustrates the structure and/or its component substructures and/or connections with other structures.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'drainsTo' => 'The vasculature that the vein drains into.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'name' => 'The name of the item.',
            'partOfSystem' => 'The anatomical or organ system that this structure is part of.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
            'regionDrained' => 'The anatomical or organ system drained by this vessel; generally refers to a specific part of an organ.',
            'relatedCondition' => 'A medical condition associated with this anatomy.',
            'relatedTherapy' => 'A medical therapy related to this anatomy.',
            'relevantSpecialty' => 'If applicable, a medical specialty in which this entity is relevant.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'study' => 'A medical study or trial related to this entity.',
            'subStructure' => 'Component (sub-)structure(s) that comprise this anatomical structure.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'tributary' => 'The anatomical or organ system that the vein flows into; a larger structure that the vein connects to.',
            'url' => 'URL of the item.'
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
            [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
