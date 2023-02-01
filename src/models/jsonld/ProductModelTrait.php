<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for ProductModel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProductModel
 */
trait ProductModelTrait
{
    /**
     * Indicates the kind of product that this is a variant of. In the case of
     * [[ProductModel]], this is a pointer (from a ProductModel) to a base product
     * from which this product is a variant. It is safe to infer that the variant
     * inherits all product features from the base model, unless defined locally.
     * This is not transitive. In the case of a [[ProductGroup]], the group
     * description also serves as a template, representing a set of Products that
     * vary on explicitly defined, specific dimensions only (so it defines both a
     * set of variants, as well as which values distinguish amongst those
     * variants). When used with [[ProductGroup]], this property can apply to any
     * [[Product]] included in the group.
     *
     * @var ProductModel|ProductGroup
     */
    public $isVariantOf;

    /**
     * A pointer from a newer variant of a product  to its previous, often
     * discontinued predecessor.
     *
     * @var ProductModel
     */
    public $successorOf;

    /**
     * A pointer from a previous, often discontinued variant of the product to its
     * newer variant.
     *
     * @var ProductModel
     */
    public $predecessorOf;
}
