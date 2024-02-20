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
 * Trait for ChemicalSubstance.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ChemicalSubstance
 */
trait ChemicalSubstanceTrait
{
    /**
     * Intended use of the BioChemEntity by humans.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $potentialUse;

    /**
     * The chemical composition describes the identity and relative ratio of the
     * chemical elements that make up the substance.
     *
     * @var string|array|Text|Text[]
     */
    public $chemicalComposition;

    /**
     * A role played by the BioChemEntity within a chemical context.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $chemicalRole;
}
