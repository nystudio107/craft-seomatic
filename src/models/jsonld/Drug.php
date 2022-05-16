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
 * Drug - A chemical or biologic substance, used as a medical therapy, that has a
 * physiological effect on an organism. Here the term drug is used
 * interchangeably with the term medicine although clinical knowledge make a
 * clear difference between them.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Drug
 */
class Drug extends MetaJsonLd implements DrugInterface, SubstanceInterface, MedicalEntityInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'Drug';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/Drug';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
A chemical or biologic substance, used as a medical therapy, that has a physiological effect on an organism. Here the term drug is used interchangeably with the term medicine although clinical knowledge make a clear difference between them.
SCHEMADESC;

    use DrugTrait;
    use SubstanceTrait;
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
            'activeIngredient' => ['Text'],
            'additionalType' => ['URL'],
            'administrationRoute' => ['Text'],
            'alcoholWarning' => ['Text'],
            'alternateName' => ['Text'],
            'availableStrength' => ['DrugStrength'],
            'breastfeedingWarning' => ['Text'],
            'clincalPharmacology' => ['Text'],
            'clinicalPharmacology' => ['Text'],
            'code' => ['MedicalCode'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'dosageForm' => ['Text'],
            'doseSchedule' => ['DoseSchedule'],
            'drugClass' => ['DrugClass'],
            'drugUnit' => ['Text'],
            'foodWarning' => ['Text'],
            'funding' => ['Grant'],
            'guideline' => ['MedicalGuideline'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'includedInHealthInsurancePlan' => ['HealthInsurancePlan'],
            'interactingDrug' => ['Drug'],
            'isAvailableGenerically' => ['Boolean'],
            'isProprietary' => ['Boolean'],
            'labelDetails' => ['URL'],
            'legalStatus' => ['DrugLegalStatus', 'Text', 'MedicalEnumeration'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'manufacturer' => ['Organization'],
            'maximumIntake' => ['MaximumDoseSchedule'],
            'mechanismOfAction' => ['Text'],
            'medicineSystem' => ['MedicineSystem'],
            'name' => ['Text'],
            'nonProprietaryName' => ['Text'],
            'overdosage' => ['Text'],
            'potentialAction' => ['Action'],
            'pregnancyCategory' => ['DrugPregnancyCategory'],
            'pregnancyWarning' => ['Text'],
            'prescribingInfo' => ['URL'],
            'prescriptionStatus' => ['DrugPrescriptionStatus', 'Text'],
            'proprietaryName' => ['Text'],
            'recognizingAuthority' => ['Organization'],
            'relatedDrug' => ['Drug'],
            'relevantSpecialty' => ['MedicalSpecialty'],
            'rxcui' => ['Text'],
            'sameAs' => ['URL'],
            'study' => ['MedicalStudy'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'url' => ['URL'],
            'warning' => ['URL', 'Text']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'activeIngredient' => 'An active ingredient, typically chemical compounds and/or biologic substances.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'administrationRoute' => 'A route by which this drug may be administered, e.g. \'oral\'.',
            'alcoholWarning' => 'Any precaution, guidance, contraindication, etc. related to consumption of alcohol while taking this drug.',
            'alternateName' => 'An alias for the item.',
            'availableStrength' => 'An available dosage strength for the drug.',
            'breastfeedingWarning' => 'Any precaution, guidance, contraindication, etc. related to this drug\'s use by breastfeeding mothers.',
            'clincalPharmacology' => 'Description of the absorption and elimination of drugs, including their concentration (pharmacokinetics, pK) and biological effects (pharmacodynamics, pD).',
            'clinicalPharmacology' => 'Description of the absorption and elimination of drugs, including their concentration (pharmacokinetics, pK) and biological effects (pharmacodynamics, pD).',
            'code' => 'A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'dosageForm' => 'A dosage form in which this drug/supplement is available, e.g. \'tablet\', \'suspension\', \'injection\'.',
            'doseSchedule' => 'A dosing schedule for the drug for a given population, either observed, recommended, or maximum dose based on the type used.',
            'drugClass' => 'The class of drug this belongs to (e.g., statins).',
            'drugUnit' => 'The unit in which the drug is measured, e.g. \'5 mg tablet\'.',
            'foodWarning' => 'Any precaution, guidance, contraindication, etc. related to consumption of specific foods while taking this drug.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'guideline' => 'A medical guideline related to this entity.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'includedInHealthInsurancePlan' => 'The insurance plans that cover this drug.',
            'interactingDrug' => 'Another drug that is known to interact with this drug in a way that impacts the effect of this drug or causes a risk to the patient. Note: disease interactions are typically captured as contraindications.',
            'isAvailableGenerically' => 'True if the drug is available in a generic form (regardless of name).',
            'isProprietary' => 'True if this item\'s name is a proprietary/brand name (vs. generic name).',
            'labelDetails' => 'Link to the drug\'s label details.',
            'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'manufacturer' => 'The manufacturer of the product.',
            'maximumIntake' => 'Recommended intake of this supplement for a given population as defined by a specific recommending authority.',
            'mechanismOfAction' => 'The specific biochemical interaction through which this drug or supplement produces its pharmacological effect.',
            'medicineSystem' => 'The system of medicine that includes this MedicalEntity, for example \'evidence-based\', \'homeopathic\', \'chiropractic\', etc.',
            'name' => 'The name of the item.',
            'nonProprietaryName' => 'The generic name of this drug or supplement.',
            'overdosage' => 'Any information related to overdose on a drug, including signs or symptoms, treatments, contact information for emergency response.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'pregnancyCategory' => 'Pregnancy category of this drug.',
            'pregnancyWarning' => 'Any precaution, guidance, contraindication, etc. related to this drug\'s use during pregnancy.',
            'prescribingInfo' => 'Link to prescribing information for the drug.',
            'prescriptionStatus' => 'Indicates the status of drug prescription eg. local catalogs classifications or whether the drug is available by prescription or over-the-counter, etc.',
            'proprietaryName' => 'Proprietary name given to the diet plan, typically by its originator or creator.',
            'recognizingAuthority' => 'If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.',
            'relatedDrug' => 'Any other drug related to this one, for example commonly-prescribed alternatives.',
            'relevantSpecialty' => 'If applicable, a medical specialty in which this entity is relevant.',
            'rxcui' => 'The RxCUI drug identifier from RXNORM.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'study' => 'A medical study or trial related to this entity.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
            'warning' => 'Any FDA or other warnings about the drug (text or URL).'
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
