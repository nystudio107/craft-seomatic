<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreateAction;

/**
 * CookAction - The act of producing/preparing food.
 * Extends: CreateAction
 * @see    http://schema.org/CookAction
 */
class CookAction extends CreateAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'CookAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/CookAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of producing/preparing food.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreateAction';

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
     * A sub property of location. The specific food establishment where the
     * action occurred.
     * @var mixed FoodEstablishment, Place [schema.org types: FoodEstablishment, Place]
     */
    public $foodEstablishment;

    /**
     * A sub property of location. The specific food event where the action
     * occurred.
     * @var mixed FoodEvent [schema.org types: FoodEvent]
     */
    public $foodEvent;

    /**
     * A sub property of instrument. The recipe/instructions used to perform the
     * action.
     * @var mixed Recipe [schema.org types: Recipe]
     */
    public $recipe;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'foodEstablishment',
                'foodEvent',
                'recipe',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'foodEstablishment' => ['FoodEstablishment','Place'],
                'foodEvent' => ['FoodEvent'],
                'recipe' => ['Recipe'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'foodEstablishment' => 'A sub property of location. The specific food establishment where the action occurred.',
                'foodEvent' => 'A sub property of location. The specific food event where the action occurred.',
                'recipe' => 'A sub property of instrument. The recipe/instructions used to perform the action.',
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
                [['foodEstablishment','foodEvent','recipe',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class CookAction*/
