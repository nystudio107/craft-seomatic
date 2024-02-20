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
 * Trait for ProductCollection.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ProductCollection
 */
trait ProductCollectionTrait
{
    /**
     * This links to a node or nodes indicating the exact quantity of the products
     * included in  an [[Offer]] or [[ProductCollection]].
     *
     * @var array|TypeAndQuantityNode|TypeAndQuantityNode[]
     */
    public $includesObject;
}
