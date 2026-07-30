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
 * schema.org version: v30.0
 * Trait for Gene.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Gene
 */
trait GeneTrait
{
    /**
     * Another gene which is a variation of this one.
     *
     * @var array|Gene|Gene[]
     */
    public $alternativeOf;

    /**
     * Another BioChemEntity encoded by this one.
     *
     * @var array|BioChemEntity|BioChemEntity[]
     */
    public $encodesBioChemEntity;

    /**
     * Tissue, organ, biological sample, etc in which activity of this gene has
     * been observed experimentally. For example brain, digestive system.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]|array|AnatomicalSystem|AnatomicalSystem[]|array|BioChemEntity|BioChemEntity[]|array|DefinedTerm|DefinedTerm[]
     */
    public $expressedIn;

    /**
     * A symbolic representation of a BioChemEntity. For example, a nucleotide
     * sequence of a Gene or an amino acid sequence of a Protein.
     *
     * @var string|array|Text|Text[]
     */
    public $hasBioPolymerSequence;
}
