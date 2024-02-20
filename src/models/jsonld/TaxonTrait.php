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
 * Trait for Taxon.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Taxon
 */
trait TaxonTrait
{
    /**
     * The taxonomic rank of this taxon given preferably as a URI from a
     * controlled vocabulary – typically the ranks from TDWG TaxonRank ontology
     * or equivalent Wikidata URIs.
     *
     * @var string|array|PropertyValue|PropertyValue[]|array|Text|Text[]|array|URL|URL[]
     */
    public $taxonRank;

    /**
     * Closest child taxa of the taxon in question.
     *
     * @var string|array|Taxon|Taxon[]|array|Text|Text[]|array|URL|URL[]
     */
    public $childTaxon;

    /**
     * Closest parent taxon of the taxon in question.
     *
     * @var string|array|Taxon|Taxon[]|array|Text|Text[]|array|URL|URL[]
     */
    public $parentTaxon;

    /**
     * A Defined Term contained in this term set.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $hasDefinedTerm;
}
