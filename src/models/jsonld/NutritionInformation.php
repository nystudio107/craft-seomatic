<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * NutritionInformation - Nutritional information about the recipe.
 * Extends: StructuredValue
 * @see    http://schema.org/NutritionInformation
 */
class NutritionInformation extends StructuredValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'NutritionInformation';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/NutritionInformation';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Nutritional information about the recipe.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'StructuredValue';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * The number of calories.
     * @var Energy [schema.org types: Energy]
     */
    public $calories;

    /**
     * The number of grams of carbohydrates.
     * @var Mass [schema.org types: Mass]
     */
    public $carbohydrateContent;

    /**
     * The number of milligrams of cholesterol.
     * @var Mass [schema.org types: Mass]
     */
    public $cholesterolContent;

    /**
     * The number of grams of fat.
     * @var Mass [schema.org types: Mass]
     */
    public $fatContent;

    /**
     * The number of grams of fiber.
     * @var Mass [schema.org types: Mass]
     */
    public $fiberContent;

    /**
     * The number of grams of protein.
     * @var Mass [schema.org types: Mass]
     */
    public $proteinContent;

    /**
     * The number of grams of saturated fat.
     * @var Mass [schema.org types: Mass]
     */
    public $saturatedFatContent;

    /**
     * The serving size, in terms of the number of volume or mass.
     * @var string [schema.org types: Text]
     */
    public $servingSize;

    /**
     * The number of milligrams of sodium.
     * @var Mass [schema.org types: Mass]
     */
    public $sodiumContent;

    /**
     * The number of grams of sugar.
     * @var Mass [schema.org types: Mass]
     */
    public $sugarContent;

    /**
     * The number of grams of trans fat.
     * @var Mass [schema.org types: Mass]
     */
    public $transFatContent;

    /**
     * The number of grams of unsaturated fat.
     * @var Mass [schema.org types: Mass]
     */
    public $unsaturatedFatContent;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'calories',
                'carbohydrateContent',
                'cholesterolContent',
                'fatContent',
                'fiberContent',
                'proteinContent',
                'saturatedFatContent',
                'servingSize',
                'sodiumContent',
                'sugarContent',
                'transFatContent',
                'unsaturatedFatContent',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'calories' => ['Energy'],
                'carbohydrateContent' => ['Mass'],
                'cholesterolContent' => ['Mass'],
                'fatContent' => ['Mass'],
                'fiberContent' => ['Mass'],
                'proteinContent' => ['Mass'],
                'saturatedFatContent' => ['Mass'],
                'servingSize' => ['Text'],
                'sodiumContent' => ['Mass'],
                'sugarContent' => ['Mass'],
                'transFatContent' => ['Mass'],
                'unsaturatedFatContent' => ['Mass'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'calories' => 'The number of calories.',
                'carbohydrateContent' => 'The number of grams of carbohydrates.',
                'cholesterolContent' => 'The number of milligrams of cholesterol.',
                'fatContent' => 'The number of grams of fat.',
                'fiberContent' => 'The number of grams of fiber.',
                'proteinContent' => 'The number of grams of protein.',
                'saturatedFatContent' => 'The number of grams of saturated fat.',
                'servingSize' => 'The serving size, in terms of the number of volume or mass.',
                'sodiumContent' => 'The number of milligrams of sodium.',
                'sugarContent' => 'The number of grams of sugar.',
                'transFatContent' => 'The number of grams of trans fat.',
                'unsaturatedFatContent' => 'The number of grams of unsaturated fat.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['calories','carbohydrateContent','cholesterolContent','fatContent','fiberContent','proteinContent','saturatedFatContent','servingSize','sodiumContent','sugarContent','transFatContent','unsaturatedFatContent',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class NutritionInformation*/
