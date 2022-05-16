<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
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
     * @var AdministrativeArea
     */
    public $applicableLocation;

    /**
     * The cost per unit of the drug.
     *
     * @var float|string|Number|Text|QualitativeValue
     */
    public $costPerUnit;

    /**
     * The category of cost, such as wholesale, retail, reimbursement cap, etc.
     *
     * @var DrugCostCategory
     */
    public $costCategory;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string|Text
     */
    public $drugUnit;

    /**
     * The currency (in 3-letter of the drug cost. See:
     * http://en.wikipedia.org/wiki/ISO_4217. 
     *
     * @var string|Text
     */
    public $costCurrency;

    /**
     * Additional details to capture the origin of the cost data. For example,
     * 'Medicare Part B'.
     *
     * @var string|Text
     */
    public $costOrigin;

}
