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
 * Trait for Recipe.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Recipe
 */
trait RecipeTrait
{
    /**
     * Nutrition information about the recipe or menu item.
     *
     * @var array|NutritionInformation|NutritionInformation[]
     */
    public $nutrition;

    /**
     * Indicates a dietary restriction or guideline for which this recipe or menu
     * item is suitable, e.g. diabetic, halal etc.
     *
     * @var array|RestrictedDiet|RestrictedDiet[]
     */
    public $suitableForDiet;

    /**
     * The quantity produced by the recipe (for example, number of people served,
     * number of servings, etc).
     *
     * @var string|array|QuantitativeValue|QuantitativeValue[]|array|Text|Text[]
     */
    public $recipeYield;

    /**
     * The method of cooking, such as Frying, Steaming, ...
     *
     * @var string|array|Text|Text[]
     */
    public $cookingMethod;

    /**
     * The time it takes to actually cook the dish, in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $cookTime;

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @var string|array|Text|Text[]
     */
    public $recipeIngredient;

    /**
     * A step in making the recipe, in the form of a single item (document, video,
     * etc.) or an ordered list with HowToStep and/or HowToSection items.
     *
     * @var string|array|ItemList|ItemList[]|array|Text|Text[]|array|CreativeWork|CreativeWork[]
     */
    public $recipeInstructions;

    /**
     * The cuisine of the recipe (for example, French or Ethiopian).
     *
     * @var string|array|Text|Text[]
     */
    public $recipeCuisine;

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @var string|array|Text|Text[]
     */
    public $ingredients;

    /**
     * The category of the recipe—for example, appetizer, entree, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $recipeCategory;
}
