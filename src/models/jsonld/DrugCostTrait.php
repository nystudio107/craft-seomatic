<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for DrugCost.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DrugCost
 */
trait DrugCostTrait
{
    /**
     * The cost per unit of the drug.
     *
     * @var string|float|Text|QualitativeValue|Number
     */
    public $costPerUnit;

    /**
     * The location in which the status applies.
     *
     * @var AdministrativeArea
     */
    public $applicableLocation;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string|Text
     */
    public $drugUnit;

    /**
     * Additional details to capture the origin of the cost data. For example,
     * 'Medicare Part B'.
     *
     * @var string|Text
     */
    public $costOrigin;

    /**
     * The category of cost, such as wholesale, retail, reimbursement cap, etc.
     *
     * @var DrugCostCategory
     */
    public $costCategory;

    /**
     * The currency (in 3-letter) of the drug cost. See:
     * http://en.wikipedia.org/wiki/ISO_4217.
     *
     * @var string|Text
     */
    public $costCurrency;
}
