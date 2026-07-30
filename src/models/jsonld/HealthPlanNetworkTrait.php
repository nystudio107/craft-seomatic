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
 * Trait for HealthPlanNetwork.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthPlanNetwork
 */
trait HealthPlanNetworkTrait
{
    /**
     * The costs to the patient for services under this network or formulary.
     *
     * @var bool|array|Boolean|Boolean[]|array|HealthPlanCostSharingSpecification|HealthPlanCostSharingSpecification[]
     */
    public $healthPlanCostSharing;

    /**
     * Name or unique ID of network. (Networks are often reused across different
     * insurance plans.)
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanNetworkId;

    /**
     * The tier(s) for this network.
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanNetworkTier;
}
