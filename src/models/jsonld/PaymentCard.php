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

use nystudio107\seomatic\models\jsonld\FinancialProduct;

/**
 * PaymentCard - A payment method using a credit, debit, store or other card
 * to associate the payment with an account.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PaymentCard
 */
class PaymentCard extends FinancialProduct
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PaymentCard';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PaymentCard';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A payment method using a credit, debit, store or other card to associate the payment with an account.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'FinancialProduct';

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
     * A cardholder benefit that pays the cardholder a small percentage of their
     * net expenditures.
     *
     * @var mixed|bool|float [schema.org types: Boolean, Number]
     */
    public $cashBack;

    /**
     * A secure method for consumers to purchase products or services via debit,
     * credit or smartcards by using RFID or NFC technology.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $contactlessPayment;

    /**
     * A floor limit is the amount of money above which credit card transactions
     * must be authorized.
     *
     * @var mixed|MonetaryAmount [schema.org types: MonetaryAmount]
     */
    public $floorLimit;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'cashBack',
        'contactlessPayment',
        'floorLimit'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'cashBack' => ['Boolean','Number'],
        'contactlessPayment' => ['Boolean'],
        'floorLimit' => ['MonetaryAmount']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'cashBack' => 'A cardholder benefit that pays the cardholder a small percentage of their net expenditures.',
        'contactlessPayment' => 'A secure method for consumers to purchase products or services via debit, credit or smartcards by using RFID or NFC technology.',
        'floorLimit' => 'A floor limit is the amount of money above which credit card transactions must be authorized.'
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
            [['cashBack','contactlessPayment','floorLimit'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
