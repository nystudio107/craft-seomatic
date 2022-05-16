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
 * MolecularEntity - Any constitutionally or isotopically distinct atom, molecule, ion, ion
 * pair, radical, radical ion, complex, conformer etc., identifiable as a
 * separately distinguishable entity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MolecularEntity
 */
class MolecularEntity extends MetaJsonLd implements MolecularEntityInterface, BioChemEntityInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'MolecularEntity';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/MolecularEntity';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
Any constitutionally or isotopically distinct atom, molecule, ion, ion pair, radical, radical ion, complex, conformer etc., identifiable as a separately distinguishable entity.
SCHEMADESC;

    use MolecularEntityTrait;
    use BioChemEntityTrait;
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
            'associatedDisease' => ['URL', 'PropertyValue', 'MedicalCondition'],
            'bioChemInteraction' => ['BioChemEntity'],
            'bioChemSimilarity' => ['BioChemEntity'],
            'biologicalRole' => ['DefinedTerm'],
            'chemicalRole' => ['DefinedTerm'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'funding' => ['Grant'],
            'hasBioChemEntityPart' => ['BioChemEntity'],
            'hasMolecularFunction' => ['PropertyValue', 'DefinedTerm', 'URL'],
            'hasRepresentation' => ['Text', 'PropertyValue', 'URL'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'inChI' => ['Text'],
            'inChIKey' => ['Text'],
            'isEncodedByBioChemEntity' => ['Gene'],
            'isInvolvedInBiologicalProcess' => ['PropertyValue', 'URL', 'DefinedTerm'],
            'isLocatedInSubcellularLocation' => ['PropertyValue', 'DefinedTerm', 'URL'],
            'isPartOfBioChemEntity' => ['BioChemEntity'],
            'iupacName' => ['Text'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'molecularFormula' => ['Text'],
            'molecularWeight' => ['QuantitativeValue', 'Text'],
            'monoisotopicMolecularWeight' => ['Text', 'QuantitativeValue'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'potentialUse' => ['DefinedTerm'],
            'sameAs' => ['URL'],
            'smiles' => ['Text'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'taxonomicRange' => ['URL', 'DefinedTerm', 'Text', 'Taxon'],
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
            'associatedDisease' => 'Disease associated to this BioChemEntity. Such disease can be a MedicalCondition or a URL. If you want to add an evidence supporting the association, please use PropertyValue.',
            'bioChemInteraction' => 'A BioChemEntity that is known to interact with this item.',
            'bioChemSimilarity' => 'A similar BioChemEntity, e.g., obtained by fingerprint similarity algorithms.',
            'biologicalRole' => 'A role played by the BioChemEntity within a biological context.',
            'chemicalRole' => 'A role played by the BioChemEntity within a chemical context.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'hasBioChemEntityPart' => 'Indicates a BioChemEntity that (in some sense) has this BioChemEntity as a part. ',
            'hasMolecularFunction' => 'Molecular function performed by this BioChemEntity; please use PropertyValue if you want to include any evidence.',
            'hasRepresentation' => 'A common representation such as a protein sequence or chemical structure for this entity. For images use schema.org/image.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inChI' => 'Non-proprietary identifier for molecular entity that can be used in printed and electronic data sources thus enabling easier linking of diverse data compilations.',
            'inChIKey' => 'InChIKey is a hashed version of the full InChI (using the SHA-256 algorithm).',
            'isEncodedByBioChemEntity' => 'Another BioChemEntity encoding by this one.',
            'isInvolvedInBiologicalProcess' => 'Biological process this BioChemEntity is involved in; please use PropertyValue if you want to include any evidence.',
            'isLocatedInSubcellularLocation' => 'Subcellular location where this BioChemEntity is located; please use PropertyValue if you want to include any evidence.',
            'isPartOfBioChemEntity' => 'Indicates a BioChemEntity that is (in some sense) a part of this BioChemEntity. ',
            'iupacName' => 'Systematic method of naming chemical compounds as recommended by the International Union of Pure and Applied Chemistry (IUPAC).',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'molecularFormula' => 'The empirical formula is the simplest whole number ratio of all the atoms in a molecule.',
            'molecularWeight' => 'This is the molecular weight of the entity being described, not of the parent. Units should be included in the form \'<Number> <unit>\', for example \'12 amu\' or as \'<QuantitativeValue>.',
            'monoisotopicMolecularWeight' => 'The monoisotopic mass is the sum of the masses of the atoms in a molecule using the unbound, ground-state, rest mass of the principal (most abundant) isotope for each element instead of the isotopic average mass. Please include the units the form \'<Number> <unit>\', for example \'770.230488 g/mol\' or as \'<QuantitativeValue>.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'potentialUse' => 'Intended use of the BioChemEntity by humans.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'smiles' => 'A specification in form of a line notation for describing the structure of chemical species using short ASCII strings.  Double bond stereochemistry \ indicators may need to be escaped in the string in formats where the backslash is an escape character.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'taxonomicRange' => 'The taxonomic grouping of the organism that expresses, encodes, or in someway related to the BioChemEntity.',
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
