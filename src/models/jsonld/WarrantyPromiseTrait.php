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
 * Trait for WarrantyPromise.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WarrantyPromise
 */
trait WarrantyPromiseTrait
{
    /**
     * The duration of the warranty promise. Common unitCode values are ANN for
     * year, MON for months, or DAY for days.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $durationOfWarranty;

    /**
     * The scope of the warranty promise.
     *
     * @var array|WarrantyScope|WarrantyScope[]
     */
    public $warrantyScope;
}
