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
 * Trait for HealthPlanCostSharingSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthPlanCostSharingSpecification
 */
trait HealthPlanCostSharingSpecificationTrait
{
    /**
     * Whether the coinsurance applies before or after deductible, etc. TODO: Is
     * this a closed set?
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanCoinsuranceOption;

    /**
     * Whether the copay is before or after deductible, etc. TODO: Is this a
     * closed set?
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanCopayOption;

    /**
     * The rate of coinsurance expressed as a number between 0.0 and 1.0.
     *
     * @var float|array|Number|Number[]
     */
    public $healthPlanCoinsuranceRate;

    /**
     * The category or type of pharmacy associated with this cost sharing.
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanPharmacyCategory;

    /**
     * The copay amount.
     *
     * @var array|PriceSpecification|PriceSpecification[]
     */
    public $healthPlanCopay;
}
