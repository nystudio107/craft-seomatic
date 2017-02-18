<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PriceSpecification;

/**
 * PaymentChargeSpecification - The costs of settling the payment using a
 * particular payment method.
 * Extends: PriceSpecification
 * @see    http://schema.org/PaymentChargeSpecification
 */
class PaymentChargeSpecification extends PriceSpecification
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'PaymentChargeSpecification';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/PaymentChargeSpecification';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The costs of settling the payment using a particular payment method.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'PriceSpecification';

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
     * The delivery method(s) to which the delivery charge or payment charge
     * specification applies.
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $appliesToDeliveryMethod;

    /**
     * The payment method(s) to which the payment charge specification applies.
     * @var PaymentMethod [schema.org types: PaymentMethod]
     */
    public $appliesToPaymentMethod;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'appliesToDeliveryMethod',
                'appliesToPaymentMethod',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'appliesToDeliveryMethod' => ['DeliveryMethod'],
                'appliesToPaymentMethod' => ['PaymentMethod'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'appliesToDeliveryMethod' => 'The delivery method(s) to which the delivery charge or payment charge specification applies.',
                'appliesToPaymentMethod' => 'The payment method(s) to which the payment charge specification applies.',
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
                [['appliesToDeliveryMethod','appliesToPaymentMethod',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class PaymentChargeSpecification*/
