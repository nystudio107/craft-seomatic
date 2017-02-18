<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\FinancialProduct;

/**
 * PaymentService - A Service to transfer funds from a person or organization
 * to a beneficiary person or organization.
 * Extends: FinancialProduct
 * @see    http://schema.org/PaymentService
 */
class PaymentService extends FinancialProduct
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'PaymentService';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/PaymentService';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A Service to transfer funds from a person or organization to a beneficiary person or organization.';

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
     * The annual rate that is charged for borrowing (or made by investing),
     * expressed as a single percentage number that represents the actual yearly
     * cost of funds over the term of a loan. This includes any fees or additional
     * costs associated with the transaction.
     * @var mixed float, QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $annualPercentageRate;

    /**
     * Description of fees, commissions, and other terms applied either to a class
     * of financial product, or by a financial service organization.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $feesAndCommissionsSpecification;

    /**
     * The interest rate, charged or paid, applicable to the financial product.
     * Note: This is different from the calculated annualPercentageRate.
     * @var mixed float, QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $interestRate;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'annualPercentageRate',
                'feesAndCommissionsSpecification',
                'interestRate',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'annualPercentageRate' => ['Number','QuantitativeValue'],
                'feesAndCommissionsSpecification' => ['Text','URL'],
                'interestRate' => ['Number','QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'annualPercentageRate' => 'The annual rate that is charged for borrowing (or made by investing), expressed as a single percentage number that represents the actual yearly cost of funds over the term of a loan. This includes any fees or additional costs associated with the transaction.',
                'feesAndCommissionsSpecification' => 'Description of fees, commissions, and other terms applied either to a class of financial product, or by a financial service organization.',
                'interestRate' => 'The interest rate, charged or paid, applicable to the financial product. Note: This is different from the calculated annualPercentageRate.',
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
                [['annualPercentageRate','feesAndCommissionsSpecification','interestRate',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class PaymentService*/
