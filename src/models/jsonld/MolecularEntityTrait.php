<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for MolecularEntity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MolecularEntity
 */

trait MolecularEntityTrait
{
    
    /**
     * InChIKey is a hashed version of the full InChI (using the SHA-256
     * algorithm).
     *
     * @var string|Text
     */
    public $inChIKey;

    /**
     * Systematic method of naming chemical compounds as recommended by the
     * International Union of Pure and Applied Chemistry (IUPAC).
     *
     * @var string|Text
     */
    public $iupacName;

    /**
     * The monoisotopic mass is the sum of the masses of the atoms in a molecule
     * using the unbound, ground-state, rest mass of the principal (most abundant)
     * isotope for each element instead of the isotopic average mass. Please
     * include the units the form '<Number> <unit>', for example '770.230488
     * g/mol' or as '<QuantitativeValue>.
     *
     * @var string|Text|QuantitativeValue
     */
    public $monoisotopicMolecularWeight;

    /**
     * The empirical formula is the simplest whole number ratio of all the atoms
     * in a molecule.
     *
     * @var string|Text
     */
    public $molecularFormula;

    /**
     * Intended use of the BioChemEntity by humans.
     *
     * @var DefinedTerm
     */
    public $potentialUse;

    /**
     * A role played by the BioChemEntity within a chemical context.
     *
     * @var DefinedTerm
     */
    public $chemicalRole;

    /**
     * This is the molecular weight of the entity being described, not of the
     * parent. Units should be included in the form '<Number> <unit>', for example
     * '12 amu' or as '<QuantitativeValue>.
     *
     * @var string|QuantitativeValue|Text
     */
    public $molecularWeight;

    /**
     * Non-proprietary identifier for molecular entity that can be used in printed
     * and electronic data sources thus enabling easier linking of diverse data
     * compilations.
     *
     * @var string|Text
     */
    public $inChI;

    /**
     * A specification in form of a line notation for describing the structure of
     * chemical species using short ASCII strings.  Double bond stereochemistry \
     * indicators may need to be escaped in the string in formats where the
     * backslash is an escape character.
     *
     * @var string|Text
     */
    public $smiles;

}
