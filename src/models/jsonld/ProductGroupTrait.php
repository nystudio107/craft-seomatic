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
 * Trait for ProductGroup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProductGroup
 */
trait ProductGroupTrait
{
    /**
     * Indicates a [[Product]] that is a member of this [[ProductGroup]] (or
     * [[ProductModel]]).
     *
     * @var array|Product|Product[]
     */
    public $hasVariant;

    /**
     * Indicates a textual identifier for a ProductGroup.
     *
     * @var string|array|Text|Text[]
     */
    public $productGroupID;

    /**
     * Indicates the property or properties by which the variants in a
     * [[ProductGroup]] vary, e.g. their size, color etc. Schema.org properties
     * can be referenced by their short name e.g. "color"; terms defined elsewhere
     * can be referenced with their URIs.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $variesBy;
}
