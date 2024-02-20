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
 * Trait for NutritionInformation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/NutritionInformation
 */
trait NutritionInformationTrait
{
    /**
     * The number of milligrams of cholesterol.
     *
     * @var array|Mass|Mass[]
     */
    public $cholesterolContent;

    /**
     * The number of milligrams of sodium.
     *
     * @var array|Mass|Mass[]
     */
    public $sodiumContent;

    /**
     * The number of grams of saturated fat.
     *
     * @var array|Mass|Mass[]
     */
    public $saturatedFatContent;

    /**
     * The serving size, in terms of the number of volume or mass.
     *
     * @var string|array|Text|Text[]
     */
    public $servingSize;

    /**
     * The number of grams of protein.
     *
     * @var array|Mass|Mass[]
     */
    public $proteinContent;

    /**
     * The number of grams of trans fat.
     *
     * @var array|Mass|Mass[]
     */
    public $transFatContent;

    /**
     * The number of grams of unsaturated fat.
     *
     * @var array|Mass|Mass[]
     */
    public $unsaturatedFatContent;

    /**
     * The number of calories.
     *
     * @var array|Energy|Energy[]
     */
    public $calories;

    /**
     * The number of grams of fat.
     *
     * @var array|Mass|Mass[]
     */
    public $fatContent;

    /**
     * The number of grams of sugar.
     *
     * @var array|Mass|Mass[]
     */
    public $sugarContent;

    /**
     * The number of grams of carbohydrates.
     *
     * @var array|Mass|Mass[]
     */
    public $carbohydrateContent;

    /**
     * The number of grams of fiber.
     *
     * @var array|Mass|Mass[]
     */
    public $fiberContent;
}
