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
 * Trait for ProductGroup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProductGroup
 */
trait ProductGroupTrait
{
    /**
     * Indicates the property or properties by which the variants in a
     * [[ProductGroup]] vary, e.g. their size, color etc. Schema.org properties
     * can be referenced by their short name e.g. "color"; terms defined elsewhere
     * can be referenced with their URIs.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $variesBy;

    /**
     * Indicates a textual identifier for a ProductGroup.
     *
     * @var string|array|Text|Text[]
     */
    public $productGroupID;

    /**
     * Indicates a [[Product]] that is a member of this [[ProductGroup]] (or
     * [[ProductModel]]).
     *
     * @var array|Product|Product[]
     */
    public $hasVariant;
}
