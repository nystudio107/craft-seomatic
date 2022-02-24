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

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * RepaymentSpecification - A structured value representing repayment.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/RepaymentSpecification
 */
class RepaymentSpecification extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'RepaymentSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/RepaymentSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A structured value representing repayment.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

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
        'downPayment',
        'earlyPrepaymentPenalty',
        'loanPaymentAmount',
        'loanPaymentFrequency',
        'numberOfLoanPayments'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'downPayment' => ['MonetaryAmount', 'Number'],
        'earlyPrepaymentPenalty' => ['MonetaryAmount'],
        'loanPaymentAmount' => ['MonetaryAmount'],
        'loanPaymentFrequency' => ['Number'],
        'numberOfLoanPayments' => ['Number']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'downPayment' => 'a type of payment made in cash during the onset of the purchase of an expensive good/service. The payment typically represents only a percentage of the full purchase price.',
        'earlyPrepaymentPenalty' => 'The amount to be paid as a penalty in the event of early payment of the loan.',
        'loanPaymentAmount' => 'The amount of money to pay in a single payment.',
        'loanPaymentFrequency' => 'Frequency of payments due, i.e. number of months between payments. This is defined as a frequency, i.e. the reciprocal of a period of time.',
        'numberOfLoanPayments' => 'The number of payments contractually required at origination to repay the loan. For monthly paying loans this is the number of months from the contractual first payment date to the maturity date.'
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

    // Static Protected Properties
    // =========================================================================
    /**
     * a type of payment made in cash during the onset of the purchase of an
     * expensive good/service. The payment typically represents only a percentage
     * of the full purchase price.
     *
     * @var mixed|MonetaryAmount|float [schema.org types: MonetaryAmount, Number]
     */
    public $downPayment;
    /**
     * The amount to be paid as a penalty in the event of early payment of the
     * loan.
     *
     * @var MonetaryAmount [schema.org types: MonetaryAmount]
     */
    public $earlyPrepaymentPenalty;
    /**
     * The amount of money to pay in a single payment.
     *
     * @var MonetaryAmount [schema.org types: MonetaryAmount]
     */
    public $loanPaymentAmount;
    /**
     * Frequency of payments due, i.e. number of months between payments. This is
     * defined as a frequency, i.e. the reciprocal of a period of time.
     *
     * @var float [schema.org types: Number]
     */
    public $loanPaymentFrequency;
    /**
     * The number of payments contractually required at origination to repay the
     * loan. For monthly paying loans this is the number of months from the
     * contractual first payment date to the maturity date.
     *
     * @var float [schema.org types: Number]
     */
    public $numberOfLoanPayments;

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
            [['downPayment', 'earlyPrepaymentPenalty', 'loanPaymentAmount', 'loanPaymentFrequency', 'numberOfLoanPayments'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
