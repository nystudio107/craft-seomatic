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
 * Trait for Recipe.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Recipe
 */

trait RecipeTrait
{
    
    /**
     * A step in making the recipe, in the form of a single item (document, video,
     * etc.) or an ordered list with HowToStep and/or HowToSection items.
     *
     * @var string|Text|CreativeWork|ItemList
     */
    public $recipeInstructions;

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @var string|Text
     */
    public $ingredients;

    /**
     * The cuisine of the recipe (for example, French or Ethiopian).
     *
     * @var string|Text
     */
    public $recipeCuisine;

    /**
     * Indicates a dietary restriction or guideline for which this recipe or menu
     * item is suitable, e.g. diabetic, halal etc.
     *
     * @var RestrictedDiet
     */
    public $suitableForDiet;

    /**
     * Nutrition information about the recipe or menu item.
     *
     * @var NutritionInformation
     */
    public $nutrition;

    /**
     * The method of cooking, such as Frying, Steaming, ...
     *
     * @var string|Text
     */
    public $cookingMethod;

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @var string|Text
     */
    public $recipeIngredient;

    /**
     * The quantity produced by the recipe (for example, number of people served,
     * number of servings, etc).
     *
     * @var string|Text|QuantitativeValue
     */
    public $recipeYield;

    /**
     * The time it takes to actually cook the dish, in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $cookTime;

    /**
     * The category of the recipe—for example, appetizer, entree, etc.
     *
     * @var string|Text
     */
    public $recipeCategory;

}
