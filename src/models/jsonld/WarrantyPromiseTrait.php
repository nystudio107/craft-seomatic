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
 * Trait for WarrantyPromise.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WarrantyPromise
 */
trait WarrantyPromiseTrait
{
    /**
     * The scope of the warranty promise.
     *
     * @var WarrantyScope
     */
    public $warrantyScope;

    /**
     * The duration of the warranty promise. Common unitCode values are ANN for
     * year, MON for months, or DAY for days.
     *
     * @var QuantitativeValue
     */
    public $durationOfWarranty;
}
