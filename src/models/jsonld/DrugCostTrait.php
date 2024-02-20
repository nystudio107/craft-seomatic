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
 * Trait for DrugCost.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DrugCost
 */
trait DrugCostTrait
{
    /**
     * The location in which the status applies.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $applicableLocation;

    /**
     * Additional details to capture the origin of the cost data. For example,
     * 'Medicare Part B'.
     *
     * @var string|array|Text|Text[]
     */
    public $costOrigin;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string|array|Text|Text[]
     */
    public $drugUnit;

    /**
     * The cost per unit of the drug.
     *
     * @var string|float|array|Text|Text[]|array|Number|Number[]|array|QualitativeValue|QualitativeValue[]
     */
    public $costPerUnit;

    /**
     * The category of cost, such as wholesale, retail, reimbursement cap, etc.
     *
     * @var array|DrugCostCategory|DrugCostCategory[]
     */
    public $costCategory;

    /**
     * The currency (in 3-letter) of the drug cost. See:
     * http://en.wikipedia.org/wiki/ISO_4217.
     *
     * @var string|array|Text|Text[]
     */
    public $costCurrency;
}
