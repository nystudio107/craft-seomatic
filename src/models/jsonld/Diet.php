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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Diet - A strategy of regulating the intake of food to achieve or maintain a
 * specific health-related goal.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Diet
 */
class Diet extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Diet';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Diet';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A strategy of regulating the intake of food to achieve or maintain a specific health-related goal.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * Nutritional information specific to the dietary plan. May include dietary
     * recommendations on what foods to avoid, what foods to consume, and specific
     * alterations/deviations from the USDA or other regulatory body's approved
     * dietary guidelines.
     *
     * @var string [schema.org types: Text]
     */
    public $dietFeatures;

    /**
     * People or organizations that endorse the plan.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $endorsers;

    /**
     * Medical expert advice related to the plan.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $expertConsiderations;

    /**
     * Descriptive information establishing the overarching theory/philosophy of
     * the plan. May include the rationale for the name, the population where the
     * plan first came to prominence, etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $overview;

    /**
     * Specific physiologic benefits associated to the plan.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $physiologicalBenefits;

    /**
     * Specific physiologic risks associated to the diet plan.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $risks;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'dietFeatures',
        'endorsers',
        'expertConsiderations',
        'overview',
        'physiologicalBenefits',
        'risks'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'dietFeatures' => ['Text'],
        'endorsers' => ['Organization','Person'],
        'expertConsiderations' => ['Text'],
        'overview' => ['Text'],
        'physiologicalBenefits' => ['Text'],
        'risks' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'dietFeatures' => 'Nutritional information specific to the dietary plan. May include dietary recommendations on what foods to avoid, what foods to consume, and specific alterations/deviations from the USDA or other regulatory body\'s approved dietary guidelines.',
        'endorsers' => 'People or organizations that endorse the plan.',
        'expertConsiderations' => 'Medical expert advice related to the plan.',
        'overview' => 'Descriptive information establishing the overarching theory/philosophy of the plan. May include the rationale for the name, the population where the plan first came to prominence, etc.',
        'physiologicalBenefits' => 'Specific physiologic benefits associated to the plan.',
        'risks' => 'Specific physiologic risks associated to the diet plan.'
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
            [['dietFeatures','endorsers','expertConsiderations','overview','physiologicalBenefits','risks'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
