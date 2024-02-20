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
 * Trait for HowToSupply.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HowToSupply
 */
trait HowToSupplyTrait
{
    /**
     * The estimated cost of the supply or supplies consumed when performing
     * instructions.
     *
     * @var string|array|MonetaryAmount|MonetaryAmount[]|array|Text|Text[]
     */
    public $estimatedCost;
}
