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

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * MerchantReturnPolicy - A MerchantReturnPolicy provides information about
 * product return policies associated with an Organization or Product.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MerchantReturnPolicy
 */
class MerchantReturnPolicy extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MerchantReturnPolicy';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MerchantReturnPolicy';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A MerchantReturnPolicy provides information about product return policies associated with an Organization or Product.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

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
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'inStoreReturnsOffered',
        'merchantReturnDays',
        'merchantReturnLink',
        'refundType',
        'returnFees',
        'returnPolicyCategory'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'inStoreReturnsOffered' => ['Boolean'],
        'merchantReturnDays' => ['Integer'],
        'merchantReturnLink' => ['URL'],
        'refundType' => ['RefundTypeEnumeration'],
        'returnFees' => ['ReturnFeesEnumeration'],
        'returnPolicyCategory' => ['MerchantReturnEnumeration']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'inStoreReturnsOffered' => 'Are in-store returns offered?',
        'merchantReturnDays' => 'The merchantReturnDays property indicates the number of days (from purchase) within which relevant merchant return policy is applicable. Supersedes productReturnDays.',
        'merchantReturnLink' => 'Indicates a Web page or service by URL, for product return. Supersedes productReturnLink.',
        'refundType' => 'A refundType, from an enumerated list.',
        'returnFees' => 'Indicates (via enumerated options) the return fees policy for a MerchantReturnPolicy',
        'returnPolicyCategory' => 'A returnPolicyCategory expresses at most one of several enumerated kinds of return.'
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
    /**
     * Are in-store returns offered?
     *
     * @var bool [schema.org types: Boolean]
     */
    public $inStoreReturnsOffered;

    // Static Protected Properties
    // =========================================================================
    /**
     * The merchantReturnDays property indicates the number of days (from
     * purchase) within which relevant merchant return policy is applicable.
     * Supersedes productReturnDays.
     *
     * @var int [schema.org types: Integer]
     */
    public $merchantReturnDays;
    /**
     * Indicates a Web page or service by URL, for product return. Supersedes
     * productReturnLink.
     *
     * @var string [schema.org types: URL]
     */
    public $merchantReturnLink;
    /**
     * A refundType, from an enumerated list.
     *
     * @var RefundTypeEnumeration [schema.org types: RefundTypeEnumeration]
     */
    public $refundType;
    /**
     * Indicates (via enumerated options) the return fees policy for a
     * MerchantReturnPolicy
     *
     * @var ReturnFeesEnumeration [schema.org types: ReturnFeesEnumeration]
     */
    public $returnFees;
    /**
     * A returnPolicyCategory expresses at most one of several enumerated kinds of
     * return.
     *
     * @var MerchantReturnEnumeration [schema.org types: MerchantReturnEnumeration]
     */
    public $returnPolicyCategory;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
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
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['inStoreReturnsOffered', 'merchantReturnDays', 'merchantReturnLink', 'refundType', 'returnFees', 'returnPolicyCategory'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
