<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Invoice - A statement of the money due for goods or services; a bill.
 *
 * Extends: Intangible
 * @see    http://schema.org/Invoice
 */
class Invoice extends Intangible
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Invoice';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Invoice';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A statement of the money due for goods or services; a bill.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The identifier for the account the payment will be applied to.
     *
     * @var string [schema.org types: Text]
     */
    public $accountId;

    /**
     * The time interval used to compute the invoice.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $billingPeriod;

    /**
     * An entity that arranges for an exchange between a buyer and a seller. In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange. If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred. Supersedes
     * bookingAgent.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $broker;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var mixed|string|Thing [schema.org types: Text, Thing]
     */
    public $category;

    /**
     * A number that confirms the given order or payment has been received.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $confirmationNumber;

    /**
     * Party placing the order or paying the invoice.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $customer;

    /**
     * The minimum payment required at this time.
     *
     * @var mixed|MonetaryAmount|PriceSpecification [schema.org types: MonetaryAmount, PriceSpecification]
     */
    public $minimumPaymentDue;

    /**
     * The date that payment is due. Supersedes paymentDue.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $paymentDueDate;

    /**
     * The name of the credit card or other method of payment for the order.
     *
     * @var mixed|PaymentMethod [schema.org types: PaymentMethod]
     */
    public $paymentMethod;

    /**
     * An identifier for the method of payment used (e.g. the last 4 digits of the
     * credit card).
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $paymentMethodId;

    /**
     * The status of payment; whether the invoice has been paid or not.
     *
     * @var mixed|PaymentStatusType|string [schema.org types: PaymentStatusType, Text]
     */
    public $paymentStatus;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * The Order(s) related to this Invoice. One or more Orders may be combined
     * into a single Invoice.
     *
     * @var mixed|Order [schema.org types: Order]
     */
    public $referencesOrder;

    /**
     * The date the invoice is scheduled to be paid.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $scheduledPaymentDate;

    /**
     * The total amount due.
     *
     * @var mixed|MonetaryAmount|PriceSpecification [schema.org types: MonetaryAmount, PriceSpecification]
     */
    public $totalPaymentDue;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'accountId',
            'billingPeriod',
            'broker',
            'category',
            'confirmationNumber',
            'customer',
            'minimumPaymentDue',
            'paymentDueDate',
            'paymentMethod',
            'paymentMethodId',
            'paymentStatus',
            'provider',
            'referencesOrder',
            'scheduledPaymentDate',
            'totalPaymentDue',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'accountId' => ['Text'],
            'billingPeriod' => ['Duration'],
            'broker' => ['Organization','Person'],
            'category' => ['Text','Thing'],
            'confirmationNumber' => ['Text'],
            'customer' => ['Organization','Person'],
            'minimumPaymentDue' => ['MonetaryAmount','PriceSpecification'],
            'paymentDueDate' => ['DateTime'],
            'paymentMethod' => ['PaymentMethod'],
            'paymentMethodId' => ['Text'],
            'paymentStatus' => ['PaymentStatusType','Text'],
            'provider' => ['Organization','Person'],
            'referencesOrder' => ['Order'],
            'scheduledPaymentDate' => ['Date'],
            'totalPaymentDue' => ['MonetaryAmount','PriceSpecification'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'accountId' => 'The identifier for the account the payment will be applied to.',
            'billingPeriod' => 'The time interval used to compute the invoice.',
            'broker' => 'An entity that arranges for an exchange between a buyer and a seller. In most cases a broker never acquires or releases ownership of a product or service involved in an exchange. If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred. Supersedes bookingAgent.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'confirmationNumber' => 'A number that confirms the given order or payment has been received.',
            'customer' => 'Party placing the order or paying the invoice.',
            'minimumPaymentDue' => 'The minimum payment required at this time.',
            'paymentDueDate' => 'The date that payment is due. Supersedes paymentDue.',
            'paymentMethod' => 'The name of the credit card or other method of payment for the order.',
            'paymentMethodId' => 'An identifier for the method of payment used (e.g. the last 4 digits of the credit card).',
            'paymentStatus' => 'The status of payment; whether the invoice has been paid or not.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
            'referencesOrder' => 'The Order(s) related to this Invoice. One or more Orders may be combined into a single Invoice.',
            'scheduledPaymentDate' => 'The date the invoice is scheduled to be paid.',
            'totalPaymentDue' => 'The total amount due.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['accountId','billingPeriod','broker','category','confirmationNumber','customer','minimumPaymentDue','paymentDueDate','paymentMethod','paymentMethodId','paymentStatus','provider','referencesOrder','scheduledPaymentDate','totalPaymentDue',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
