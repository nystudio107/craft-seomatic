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
 * Trait for HealthPlanNetwork.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthPlanNetwork
 */
trait HealthPlanNetworkTrait
{
    /**
     * The tier(s) for this network.
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanNetworkTier;

    /**
     * The costs to the patient for services under this network or formulary.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $healthPlanCostSharing;

    /**
     * Name or unique ID of network. (Networks are often reused across different
     * insurance plans.)
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanNetworkId;
}
