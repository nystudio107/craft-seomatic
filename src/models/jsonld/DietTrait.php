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
 * Trait for Diet.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Diet
 */
trait DietTrait
{
    /**
     * Medical expert advice related to the plan.
     *
     * @var string|array|Text|Text[]
     */
    public $expertConsiderations;

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
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $endorsers;

    /**
     * Specific physiologic risks associated to the diet plan.
     *
     * @var string|array|Text|Text[]
     */
    public $risks;

    /**
     * Specific physiologic benefits associated to the plan.
     *
     * @var string|array|Text|Text[]
     */
    public $physiologicalBenefits;
}
