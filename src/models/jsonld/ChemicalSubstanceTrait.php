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

/**
 * schema.org version: v14.0-release
 * Trait for ChemicalSubstance.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ChemicalSubstance
 */

trait ChemicalSubstanceTrait
{
    
    /**
     * The chemical composition describes the identity and relative ratio of the
     * chemical elements that make up the substance.
     *
     * @var string|Text
     */
    public $chemicalComposition;

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

}
