<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\FinancialProduct;

/**
 * InvestmentOrDeposit - A type of financial product that typically requires
 * the client to transfer funds to a financial service in return for potential
 * beneficial financial return.
 * Extends: FinancialProduct
 * @see    http://schema.org/InvestmentOrDeposit
 */
class InvestmentOrDeposit extends FinancialProduct
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'InvestmentOrDeposit';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/InvestmentOrDeposit';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A type of financial product that typically requires the client to transfer funds to a financial service in return for potential beneficial financial return.';

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

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'amount',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'amount' => ['MonetaryAmount','Number'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'amount' => 'The amount of money.',
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
                [['amount',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class InvestmentOrDeposit*/
