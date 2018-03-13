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
 * Order - An order is a confirmation of a transaction (a receipt), which can
 * contain multiple line items, each represented by an Offer that has been
 * accepted by the customer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Order
 */
class Order extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Order';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Order';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An order is a confirmation of a transaction (a receipt), which can contain multiple line items, each represented by an Offer that has been accepted by the customer.';

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
     * The offer(s) -- e.g., product, quantity and price combinations -- included
     * in the order.
     *
     * @var Offer [schema.org types: Offer]
     */
    public $acceptedOffer;

    /**
     * The billing address for the order.
     *
     * @var PostalAddress [schema.org types: PostalAddress]
     */
    public $billingAddress;

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
     * Any discount applied (to an Order).
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $discount;

    /**
     * Code used to redeem a discount.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $discountCode;

    /**
     * The currency (in 3-letter ISO 4217 format) of the discount.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $discountCurrency;

    /**
     * Was the offer accepted as a gift for someone other than the buyer.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $isGift;

    /**
     * Date order was placed.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $orderDate;

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var mixed|ParcelDelivery [schema.org types: ParcelDelivery]
     */
    public $orderDelivery;

    /**
     * The identifier of the transaction.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $orderNumber;

    /**
     * The current status of the order.
     *
     * @var mixed|OrderStatus [schema.org types: OrderStatus]
     */
    public $orderStatus;

    /**
     * The item ordered.
     *
     * @var mixed|OrderItem|Product [schema.org types: OrderItem, Product]
     */
    public $orderedItem;

    /**
     * The order is being paid as part of the referenced Invoice.
     *
     * @var mixed|Invoice [schema.org types: Invoice]
     */
    public $partOfInvoice;

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
     * The URL for sending a payment.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $paymentUrl;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods. A seller may also be a provider. Supersedes merchant, vendor.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $seller;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'acceptedOffer',
        'billingAddress',
        'broker',
        'confirmationNumber',
        'customer',
        'discount',
        'discountCode',
        'discountCurrency',
        'isGift',
        'orderDate',
        'orderDelivery',
        'orderNumber',
        'orderStatus',
        'orderedItem',
        'partOfInvoice',
        'paymentDueDate',
        'paymentMethod',
        'paymentMethodId',
        'paymentUrl',
        'seller'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'acceptedOffer' => ['Offer'],
        'billingAddress' => ['PostalAddress'],
        'broker' => ['Organization','Person'],
        'confirmationNumber' => ['Text'],
        'customer' => ['Organization','Person'],
        'discount' => ['Number','Text'],
        'discountCode' => ['Text'],
        'discountCurrency' => ['Text'],
        'isGift' => ['Boolean'],
        'orderDate' => ['DateTime'],
        'orderDelivery' => ['ParcelDelivery'],
        'orderNumber' => ['Text'],
        'orderStatus' => ['OrderStatus'],
        'orderedItem' => ['OrderItem','Product'],
        'partOfInvoice' => ['Invoice'],
        'paymentDueDate' => ['DateTime'],
        'paymentMethod' => ['PaymentMethod'],
        'paymentMethodId' => ['Text'],
        'paymentUrl' => ['URL'],
        'seller' => ['Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'acceptedOffer' => 'The offer(s) -- e.g., product, quantity and price combinations -- included in the order.',
        'billingAddress' => 'The billing address for the order.',
        'broker' => 'An entity that arranges for an exchange between a buyer and a seller. In most cases a broker never acquires or releases ownership of a product or service involved in an exchange. If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred. Supersedes bookingAgent.',
        'confirmationNumber' => 'A number that confirms the given order or payment has been received.',
        'customer' => 'Party placing the order or paying the invoice.',
        'discount' => 'Any discount applied (to an Order).',
        'discountCode' => 'Code used to redeem a discount.',
        'discountCurrency' => 'The currency (in 3-letter ISO 4217 format) of the discount.',
        'isGift' => 'Was the offer accepted as a gift for someone other than the buyer.',
        'orderDate' => 'Date order was placed.',
        'orderDelivery' => 'The delivery of the parcel related to this order or order item.',
        'orderNumber' => 'The identifier of the transaction.',
        'orderStatus' => 'The current status of the order.',
        'orderedItem' => 'The item ordered.',
        'partOfInvoice' => 'The order is being paid as part of the referenced Invoice.',
        'paymentDueDate' => 'The date that payment is due. Supersedes paymentDue.',
        'paymentMethod' => 'The name of the credit card or other method of payment for the order.',
        'paymentMethodId' => 'An identifier for the method of payment used (e.g. the last 4 digits of the credit card).',
        'paymentUrl' => 'The URL for sending a payment.',
        'seller' => 'An entity which offers (sells / leases / lends / loans) the services / goods. A seller may also be a provider. Supersedes merchant, vendor.'
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
            [['acceptedOffer','billingAddress','broker','confirmationNumber','customer','discount','discountCode','discountCurrency','isGift','orderDate','orderDelivery','orderNumber','orderStatus','orderedItem','partOfInvoice','paymentDueDate','paymentMethod','paymentMethodId','paymentUrl','seller'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
