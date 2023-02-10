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
 * Trait for BusinessAudience.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BusinessAudience
 */
trait BusinessAudienceTrait
{
    /**
     * The size of the business in annual revenue.
     *
     * @var QuantitativeValue
     */
    public $yearlyRevenue;

    /**
     * The number of employees in an organization, e.g. business.
     *
     * @var QuantitativeValue
     */
    public $numberOfEmployees;

    /**
     * The age of the business.
     *
     * @var QuantitativeValue
     */
    public $yearsInOperation;
}
