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
 * Trait for Gene.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Gene
 */
trait GeneTrait
{
    /**
     * Another BioChemEntity encoded by this one.
     *
     * @var array|BioChemEntity|BioChemEntity[]
     */
    public $encodesBioChemEntity;

    /**
     * A symbolic representation of a BioChemEntity. For example, a nucleotide
     * sequence of a Gene or an amino acid sequence of a Protein.
     *
     * @var string|array|Text|Text[]
     */
    public $hasBioPolymerSequence;

    /**
     * Another gene which is a variation of this one.
     *
     * @var array|Gene|Gene[]
     */
    public $alternativeOf;

    /**
     * Tissue, organ, biological sample, etc in which activity of this gene has
     * been observed experimentally. For example brain, digestive system.
     *
     * @var array|DefinedTerm|DefinedTerm[]|array|AnatomicalSystem|AnatomicalSystem[]|array|AnatomicalStructure|AnatomicalStructure[]|array|BioChemEntity|BioChemEntity[]
     */
    public $expressedIn;
}
