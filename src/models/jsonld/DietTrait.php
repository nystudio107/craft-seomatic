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
 * Trait for Diet.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Diet
 */
trait DietTrait
{
    /**
     * Nutritional information specific to the dietary plan. May include dietary
     * recommendations on what foods to avoid, what foods to consume, and specific
     * alterations/deviations from the USDA or other regulatory body's approved
     * dietary guidelines.
     *
     * @var string|array|Text|Text[]
     */
    public $dietFeatures;

    /**
     * People or organizations that endorse the plan.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $endorsers;

    /**
     * Medical expert advice related to the plan.
     *
     * @var string|array|Text|Text[]
     */
    public $expertConsiderations;

    /**
     * Specific physiologic benefits associated to the plan.
     *
     * @var string|array|Text|Text[]
     */
    public $physiologicalBenefits;

    /**
     * Specific physiologic risks associated to the diet plan.
     *
     * @var string|array|Text|Text[]
     */
    public $risks;
}
