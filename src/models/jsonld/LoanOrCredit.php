<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\FinancialProduct;

/**
 * LoanOrCredit - A financial product for the loaning of an amount of money
 * under agreed terms and charges.
 * Extends: FinancialProduct
 * @see    http://schema.org/LoanOrCredit
 */
class LoanOrCredit extends FinancialProduct
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'LoanOrCredit';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/LoanOrCredit';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A financial product for the loaning of an amount of money under agreed terms and charges.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'FinancialProduct';

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
     * The amount of money.
     * @var mixed MonetaryAmount, float [schema.org types: MonetaryAmount, Number]
     */
    public $amount;

    /**
     * The duration of the loan or credit agreement.
     * @var mixed QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $loanTerm;

    /**
     * Assets required to secure loan or credit repayments. It may take form of
     * third party pledge, goods, financial instruments (cash, securities, etc.)
     * @var mixed string, Thing [schema.org types: Text, Thing]
     */
    public $requiredCollateral;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'amount',
                'loanTerm',
                'requiredCollateral',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'amount' => ['MonetaryAmount','Number'],
                'loanTerm' => ['QuantitativeValue'],
                'requiredCollateral' => ['Text','Thing'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'amount' => 'The amount of money.',
                'loanTerm' => 'The duration of the loan or credit agreement.',
                'requiredCollateral' => 'Assets required to secure loan or credit repayments. It may take form of third party pledge, goods, financial instruments (cash, securities, etc.)',
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
                [['amount','loanTerm','requiredCollateral',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class LoanOrCredit*/
