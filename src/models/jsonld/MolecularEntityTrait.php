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

/**
 * schema.org version: v26.0-release
 * Trait for MolecularEntity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MolecularEntity
 */
trait MolecularEntityTrait
{
    /**
     * Intended use of the BioChemEntity by humans.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $potentialUse;

    /**
     * Systematic method of naming chemical compounds as recommended by the
     * International Union of Pure and Applied Chemistry (IUPAC).
     *
     * @var string|array|Text|Text[]
     */
    public $iupacName;

    /**
     * Non-proprietary identifier for molecular entity that can be used in printed
     * and electronic data sources thus enabling easier linking of diverse data
     * compilations.
     *
     * @var string|array|Text|Text[]
     */
    public $inChI;

    /**
     * The empirical formula is the simplest whole number ratio of all the atoms
     * in a molecule.
     *
     * @var string|array|Text|Text[]
     */
    public $molecularFormula;

    /**
     * The monoisotopic mass is the sum of the masses of the atoms in a molecule
     * using the unbound, ground-state, rest mass of the principal (most abundant)
     * isotope for each element instead of the isotopic average mass. Please
     * include the units in the form '<Number> <unit>', for example '770.230488
     * g/mol' or as '<QuantitativeValue>.
     *
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $monoisotopicMolecularWeight;

    /**
     * A specification in form of a line notation for describing the structure of
     * chemical species using short ASCII strings.  Double bond stereochemistry \
     * indicators may need to be escaped in the string in formats where the
     * backslash is an escape character.
     *
     * @var string|array|Text|Text[]
     */
    public $smiles;

    /**
     * A role played by the BioChemEntity within a chemical context.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $chemicalRole;

    /**
     * InChIKey is a hashed version of the full InChI (using the SHA-256
     * algorithm).
     *
     * @var string|array|Text|Text[]
     */
    public $inChIKey;

    /**
     * This is the molecular weight of the entity being described, not of the
     * parent. Units should be included in the form '<Number> <unit>', for example
     * '12 amu' or as '<QuantitativeValue>.
     *
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $molecularWeight;
}
