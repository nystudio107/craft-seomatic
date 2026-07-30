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
 * Trait for HowToItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HowToItem
 */
trait HowToItemTrait
{
    /**
     * The required quantity of the item(s).
     *
     * @var float|string|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]|array|Text|Text[]
     */
    public $requiredQuantity;
}
