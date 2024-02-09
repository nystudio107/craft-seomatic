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
 * DrugCost - The cost per unit of a medical drug. Note that this type is not meant to
 * represent the price in an offer of a drug for sale; see the Offer type for
 * that. This type will typically be used to tag wholesale or average retail
 * cost of a drug, or maximum reimbursable cost. Costs of medical drugs vary
 * widely depending on how and where they are paid for, so while this type
 * captures some of the variables, costs should be used with caution by
 * consumers of this schema's markup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DrugCost
 */
class DrugCost extends MetaJsonLd implements DrugCostInterface, MedicalEntityInterface, ThingInterface
{
    use DrugCostTrait;
    use MedicalEntityTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static $schemaTypeName = 'DrugCost';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static $schemaTypeScope = 'https://schema.org/DrugCost';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static $schemaTypeExtends = 'MedicalEntity';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static $schemaTypeDescription = 'The cost per unit of a medical drug. Note that this type is not meant to represent the price in an offer of a drug for sale; see the Offer type for that. This type will typically be used to tag wholesale or average retail cost of a drug, or maximum reimbursable cost. Costs of medical drugs vary widely depending on how and where they are paid for, so while this type captures some of the variables, costs should be used with caution by consumers of this schema\'s markup.';


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
            'applicableLocation' => ['AdministrativeArea'],
            'code' => ['MedicalCode'],
            'costCategory' => ['DrugCostCategory'],
            'costCurrency' => ['Text'],
            'costOrigin' => ['Text'],
            'costPerUnit' => ['Text', 'QualitativeValue', 'Number'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'drugUnit' => ['Text'],
            'funding' => ['Grant'],
            'guideline' => ['MedicalGuideline'],
            'identifier' => ['PropertyValue', 'URL', 'Text'],
            'image' => ['URL', 'ImageObject'],
            'legalStatus' => ['Text', 'DrugLegalStatus', 'MedicalEnumeration'],
            'mainEntityOfPage' => ['URL', 'CreativeWork'],
            'medicineSystem' => ['MedicineSystem'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'recognizingAuthority' => ['Organization'],
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
            'applicableLocation' => 'The location in which the status applies.',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'costCategory' => 'The category of cost, such as wholesale, retail, reimbursement cap, etc.',
            'costCurrency' => 'The currency (in 3-letter) of the drug cost. See: http://en.wikipedia.org/wiki/ISO_4217. ',
            'costOrigin' => 'Additional details to capture the origin of the cost data. For example, \'Medicare Part B\'.',
            'costPerUnit' => 'The cost per unit of the drug.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'drugUnit' => 'The unit in which the drug is measured, e.g. \'5 mg tablet\'.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
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
