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
 * Trait for Protein.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Protein
 */
trait ProteinTrait
{
    /**
     * A symbolic representation of a BioChemEntity. For example, a nucleotide
     * sequence of a Gene or an amino acid sequence of a Protein.
     *
     * @var string|array|Text|Text[]
     */
    public $hasBioPolymerSequence;
}
