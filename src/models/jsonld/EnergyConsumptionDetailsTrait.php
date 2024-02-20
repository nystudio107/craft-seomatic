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
 * Trait for EnergyConsumptionDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EnergyConsumptionDetails
 */
trait EnergyConsumptionDetailsTrait
{
    /**
     * Specifies the most energy efficient class on the regulated EU energy
     * consumption scale for the product category a product belongs to. For
     * example, energy consumption for televisions placed on the market after
     * January 1, 2020 is scaled from D to A+++.
     *
     * @var array|EUEnergyEfficiencyEnumeration|EUEnergyEfficiencyEnumeration[]
     */
    public $energyEfficiencyScaleMax;

    /**
     * Defines the energy efficiency Category (which could be either a rating out
     * of range of values or a yes/no certification) for a product according to an
     * international energy efficiency standard.
     *
     * @var array|EnergyEfficiencyEnumeration|EnergyEfficiencyEnumeration[]
     */
    public $hasEnergyEfficiencyCategory;

    /**
     * Specifies the least energy efficient class on the regulated EU energy
     * consumption scale for the product category a product belongs to. For
     * example, energy consumption for televisions placed on the market after
     * January 1, 2020 is scaled from D to A+++.
     *
     * @var array|EUEnergyEfficiencyEnumeration|EUEnergyEfficiencyEnumeration[]
     */
    public $energyEfficiencyScaleMin;
}
