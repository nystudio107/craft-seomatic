<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\HowTo;

/**
 * Recipe - No comment
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       https://schema.org/Recipe
 */
class Recipe extends HowTo
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Recipe';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Recipe';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'No comment';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'HowTo';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The time it takes to actually cook the dish, in ISO 8601 duration format.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $cookTime;

    /**
     * The method of cooking, such as Frying, Steaming, ...
     *
     * @var string [schema.org types: Text]
     */
    public $cookingMethod;

    /**
     * Nutrition information about the recipe or menu item.
     *
     * @var NutritionInformation [schema.org types: NutritionInformation]
     */
    public $nutrition;

    /**
     * The category of the recipe—for example, appetizer, entree, etc.
     *
     * @var string [schema.org types: Text]
     */
    public $recipeCategory;

    /**
     * The cuisine of the recipe (for example, French or Ethiopian).
     *
     * @var string [schema.org types: Text]
     */
    public $recipeCuisine;

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     * Supersedes ingredients.
     *
     * @var string [schema.org types: Text]
     */
    public $recipeIngredient;

    /**
     * A step in making the recipe, in the form of a single item (document, video,
     * etc.) or an ordered list with HowToStep and/or HowToSection items.
     *
     * @var mixed|CreativeWork|ItemList|string [schema.org types: CreativeWork, ItemList, Text]
     */
    public $recipeInstructions;

    /**
     * The quantity produced by the recipe (for example, number of people served,
     * number of servings, etc).
     *
     * @var mixed|QuantitativeValue|string [schema.org types: QuantitativeValue, Text]
     */
    public $recipeYield;

    /**
     * Indicates a dietary restriction or guideline for which this recipe or menu
     * item is suitable, e.g. diabetic, halal etc.
     *
     * @var mixed|RestrictedDiet [schema.org types: RestrictedDiet]
     */
    public $suitableForDiet;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'cookTime',
        'cookingMethod',
        'nutrition',
        'recipeCategory',
        'recipeCuisine',
        'recipeIngredient',
        'recipeInstructions',
        'recipeYield',
        'suitableForDiet'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'cookTime' => ['Duration'],
        'cookingMethod' => ['Text'],
        'nutrition' => ['NutritionInformation'],
        'recipeCategory' => ['Text'],
        'recipeCuisine' => ['Text'],
        'recipeIngredient' => ['Text'],
        'recipeInstructions' => ['CreativeWork','ItemList','Text'],
        'recipeYield' => ['QuantitativeValue','Text'],
        'suitableForDiet' => ['RestrictedDiet']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'cookTime' => 'The time it takes to actually cook the dish, in ISO 8601 duration format.',
        'cookingMethod' => 'The method of cooking, such as Frying, Steaming, ...',
        'nutrition' => 'Nutrition information about the recipe or menu item.',
        'recipeCategory' => 'The category of the recipe—for example, appetizer, entree, etc.',
        'recipeCuisine' => 'The cuisine of the recipe (for example, French or Ethiopian).',
        'recipeIngredient' => 'A single ingredient used in the recipe, e.g. sugar, flour or garlic. Supersedes ingredients.',
        'recipeInstructions' => 'A step in making the recipe, in the form of a single item (document, video, etc.) or an ordered list with HowToStep and/or HowToSection items.',
        'recipeYield' => 'The quantity produced by the recipe (for example, number of people served, number of servings, etc).',
        'suitableForDiet' => 'Indicates a dietary restriction or guideline for which this recipe or menu item is suitable, e.g. diabetic, halal etc.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['cookTime','cookingMethod','nutrition','recipeCategory','recipeCuisine','recipeIngredient','recipeInstructions','recipeYield','suitableForDiet'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
