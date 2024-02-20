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
 * Trait for BusinessAudience.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BusinessAudience
 */
trait BusinessAudienceTrait
{
    /**
     * The number of employees in an organization, e.g. business.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfEmployees;

    /**
     * The age of the business.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $yearsInOperation;

    /**
     * The size of the business in annual revenue.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $yearlyRevenue;
}
