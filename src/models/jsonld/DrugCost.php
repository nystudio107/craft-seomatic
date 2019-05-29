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

use nystudio107\seomatic\models\jsonld\MedicalEnumeration;

/**
 * DrugCost - The cost per unit of a medical drug. Note that this type is not
 * meant to represent the price in an offer of a drug for sale; see the Offer
 * type for that. This type will typically be used to tag wholesale or average
 * retail cost of a drug, or maximum reimbursable cost. Costs of medical drugs
 * vary widely depending on how and where they are paid for, so while this
 * type captures some of the variables, costs should be used with caution by
 * consumers of this schema's markup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/DrugCost
 */
class DrugCost extends MedicalEnumeration
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'DrugCost';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/DrugCost';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The cost per unit of a medical drug. Note that this type is not meant to represent the price in an offer of a drug for sale; see the Offer type for that. This type will typically be used to tag wholesale or average retail cost of a drug, or maximum reimbursable cost. Costs of medical drugs vary widely depending on how and where they are paid for, so while this type captures some of the variables, costs should be used with caution by consumers of this schema\'s markup.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MedicalEnumeration';

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
     * The location in which the status applies.
     *
     * @var AdministrativeArea [schema.org types: AdministrativeArea]
     */
    public $applicableLocation;

    /**
     * The category of cost, such as wholesale, retail, reimbursement cap, etc.
     *
     * @var DrugCostCategory [schema.org types: DrugCostCategory]
     */
    public $costCategory;

    /**
     * The currency (in 3-letter of the drug cost. See:
     * http://en.wikipedia.org/wiki/ISO_4217
     *
     * @var string [schema.org types: Text]
     */
    public $costCurrency;

    /**
     * Additional details to capture the origin of the cost data. For example,
     * 'Medicare Part B'.
     *
     * @var string [schema.org types: Text]
     */
    public $costOrigin;

    /**
     * The cost per unit of the drug.
     *
     * @var mixed|float|QualitativeValue|string [schema.org types: Number, QualitativeValue, Text]
     */
    public $costPerUnit;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $drugUnit;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'applicableLocation',
        'costCategory',
        'costCurrency',
        'costOrigin',
        'costPerUnit',
        'drugUnit'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'applicableLocation' => ['AdministrativeArea'],
        'costCategory' => ['DrugCostCategory'],
        'costCurrency' => ['Text'],
        'costOrigin' => ['Text'],
        'costPerUnit' => ['Number','QualitativeValue','Text'],
        'drugUnit' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'applicableLocation' => 'The location in which the status applies.',
        'costCategory' => 'The category of cost, such as wholesale, retail, reimbursement cap, etc.',
        'costCurrency' => 'The currency (in 3-letter of the drug cost. See: http://en.wikipedia.org/wiki/ISO_4217',
        'costOrigin' => 'Additional details to capture the origin of the cost data. For example, \'Medicare Part B\'.',
        'costPerUnit' => 'The cost per unit of the drug.',
        'drugUnit' => 'The unit in which the drug is measured, e.g. \'5 mg tablet\'.'
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
            [['applicableLocation','costCategory','costCurrency','costOrigin','costPerUnit','drugUnit'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
