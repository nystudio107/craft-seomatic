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
 * Trait for Taxon.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Taxon
 */
trait TaxonTrait
{
    /**
     * Closest parent taxon of the taxon in question.
     *
     * @var string|URL|Text|Taxon
     */
    public $parentTaxon;

    /**
     * The taxonomic rank of this taxon given preferably as a URI from a
     * controlled vocabulary – typically the ranks from TDWG TaxonRank ontology
     * or equivalent Wikidata URIs.
     *
     * @var string|URL|PropertyValue|Text
     */
    public $taxonRank;

    /**
     * Closest child taxa of the taxon in question.
     *
     * @var string|Text|Taxon|URL
     */
    public $childTaxon;

    /**
     * A Defined Term contained in this term set.
     *
     * @var DefinedTerm
     */
    public $hasDefinedTerm;
}
