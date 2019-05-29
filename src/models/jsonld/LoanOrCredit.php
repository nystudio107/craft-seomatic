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
 * LoanOrCredit - A financial product for the loaning of an amount of money
 * under agreed terms and charges.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/LoanOrCredit
 */
class LoanOrCredit extends FinancialProduct
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'LoanOrCredit';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/LoanOrCredit';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A financial product for the loaning of an amount of money under agreed terms and charges.';

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
     * The amount of money.
     *
     * @var mixed|MonetaryAmount|float [schema.org types: MonetaryAmount, Number]
     */
    public $amount;

    /**
     * The currency in which the monetary amount is expressed. Use standard
     * formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for
     * cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings
     * Systems (LETS) and other currency types e.g. "Ithaca HOUR".
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $currency;

    /**
     * The period of time after any due date that the borrower has to fulfil its
     * obligations before a default (failure to pay) is deemed to have occurred.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $gracePeriod;

    /**
     * A form of paying back money previously borrowed from a lender. Repayment
     * usually takes the form of periodic payments that normally include part
     * principal plus interest in each payment.
     *
     * @var mixed|RepaymentSpecification [schema.org types: RepaymentSpecification]
     */
    public $loanRepaymentForm;

    /**
     * The duration of the loan or credit agreement.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $loanTerm;

    /**
     * The type of a loan or credit.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $loanType;

    /**
     * The only way you get the money back in the event of default is the
     * security. Recourse is where you still have the opportunity to go back to
     * the borrower for the rest of the money.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $recourseLoan;

    /**
     * Whether the terms for payment of interest can be renegotiated during the
     * life of the loan.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $renegotiableLoan;

    /**
     * Assets required to secure loan or credit repayments. It may take form of
     * third party pledge, goods, financial instruments (cash, securities, etc.)
     *
     * @var mixed|string|Thing [schema.org types: Text, Thing]
     */
    public $requiredCollateral;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'amount',
        'currency',
        'gracePeriod',
        'loanRepaymentForm',
        'loanTerm',
        'loanType',
        'recourseLoan',
        'renegotiableLoan',
        'requiredCollateral'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'amount' => ['MonetaryAmount','Number'],
        'currency' => ['Text'],
        'gracePeriod' => ['Duration'],
        'loanRepaymentForm' => ['RepaymentSpecification'],
        'loanTerm' => ['QuantitativeValue'],
        'loanType' => ['Text','URL'],
        'recourseLoan' => ['Boolean'],
        'renegotiableLoan' => ['Boolean'],
        'requiredCollateral' => ['Text','Thing']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'amount' => 'The amount of money.',
        'currency' => 'The currency in which the monetary amount is expressed. Use standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR".',
        'gracePeriod' => 'The period of time after any due date that the borrower has to fulfil its obligations before a default (failure to pay) is deemed to have occurred.',
        'loanRepaymentForm' => 'A form of paying back money previously borrowed from a lender. Repayment usually takes the form of periodic payments that normally include part principal plus interest in each payment.',
        'loanTerm' => 'The duration of the loan or credit agreement.',
        'loanType' => 'The type of a loan or credit.',
        'recourseLoan' => 'The only way you get the money back in the event of default is the security. Recourse is where you still have the opportunity to go back to the borrower for the rest of the money.',
        'renegotiableLoan' => 'Whether the terms for payment of interest can be renegotiated during the life of the loan.',
        'requiredCollateral' => 'Assets required to secure loan or credit repayments. It may take form of third party pledge, goods, financial instruments (cash, securities, etc.)'
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
            [['amount','currency','gracePeriod','loanRepaymentForm','loanTerm','loanType','recourseLoan','renegotiableLoan','requiredCollateral'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
