<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Gene.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Gene
 */
trait GeneTrait
{
    /**
     * Tissue, organ, biological sample, etc in which activity of this gene has
     * been observed experimentally. For example brain, digestive system.
     *
     * @var DefinedTerm|BioChemEntity|AnatomicalSystem|AnatomicalStructure
     */
    public $expressedIn;

    /**
     * A symbolic representation of a BioChemEntity. For example, a nucleotide
     * sequence of a Gene or an amino acid sequence of a Protein.
     *
     * @var string|Text
     */
    public $hasBioPolymerSequence;

    /**
     * Another BioChemEntity encoded by this one.
     *
     * @var BioChemEntity
     */
    public $encodesBioChemEntity;

    /**
     * Another gene which is a variation of this one.
     *
     * @var Gene
     */
    public $alternativeOf;
}
