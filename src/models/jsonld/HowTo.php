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
 * HowTo - Instructions that explain how to achieve a result by performing a
 * sequence of steps.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/HowTo
 */
class HowTo extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'HowTo';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/HowTo';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Instructions that explain how to achieve a result by performing a sequence of steps.';

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
     * The estimated cost of the supply or supplies consumed when performing
     * instructions.
     *
     * @var mixed|MonetaryAmount|string [schema.org types: MonetaryAmount, Text]
     */
    public $estimatedCost;

    /**
     * The length of time it takes to perform instructions or a direction (not
     * including time to prepare the supplies), in ISO 8601 duration format.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $performTime;

    /**
     * The length of time it takes to prepare the items to be used in instructions
     * or a direction, in ISO 8601 duration format.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $prepTime;

    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection. Supersedes steps.
     *
     * @var mixed|CreativeWork|HowToSection|HowToStep|string [schema.org types: CreativeWork, HowToSection, HowToStep, Text]
     */
    public $step;

    /**
     * A sub-property of instrument. A supply consumed when performing
     * instructions or a direction.
     *
     * @var mixed|HowToSupply|string [schema.org types: HowToSupply, Text]
     */
    public $supply;

    /**
     * A sub property of instrument. An object used (but not consumed) when
     * performing instructions or a direction.
     *
     * @var mixed|HowToTool|string [schema.org types: HowToTool, Text]
     */
    public $tool;

    /**
     * The total time required to perform instructions or a direction (including
     * time to prepare the supplies), in ISO 8601 duration format.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $totalTime;

    /**
     * The quantity that results by performing instructions. For example, a paper
     * airplane, 10 personalized candles.
     *
     * @var mixed|QuantitativeValue|string [schema.org types: QuantitativeValue, Text]
     */
    public $yield;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'estimatedCost',
        'performTime',
        'prepTime',
        'step',
        'supply',
        'tool',
        'totalTime',
        'yield'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'estimatedCost' => ['MonetaryAmount','Text'],
        'performTime' => ['Duration'],
        'prepTime' => ['Duration'],
        'step' => ['CreativeWork','HowToSection','HowToStep','Text'],
        'supply' => ['HowToSupply','Text'],
        'tool' => ['HowToTool','Text'],
        'totalTime' => ['Duration'],
        'yield' => ['QuantitativeValue','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'estimatedCost' => 'The estimated cost of the supply or supplies consumed when performing instructions.',
        'performTime' => 'The length of time it takes to perform instructions or a direction (not including time to prepare the supplies), in ISO 8601 duration format.',
        'prepTime' => 'The length of time it takes to prepare the items to be used in instructions or a direction, in ISO 8601 duration format.',
        'step' => 'A single step item (as HowToStep, text, document, video, etc.) or a HowToSection. Supersedes steps.',
        'supply' => 'A sub-property of instrument. A supply consumed when performing instructions or a direction.',
        'tool' => 'A sub property of instrument. An object used (but not consumed) when performing instructions or a direction.',
        'totalTime' => 'The total time required to perform instructions or a direction (including time to prepare the supplies), in ISO 8601 duration format.',
        'yield' => 'The quantity that results by performing instructions. For example, a paper airplane, 10 personalized candles.'
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
            [['estimatedCost','performTime','prepTime','step','supply','tool','totalTime','yield'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
