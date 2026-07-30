<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v30.0
 * Trait for Order.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Order
 */
trait OrderTrait
{
    /**
     * The offer(s) -- e.g., product, quantity and price combinations -- included
     * in the order.
     *
     * @var array|Offer|Offer[]
     */
    public $acceptedOffer;

    /**
     * The billing address for the order.
     *
     * @var array|PostalAddress|PostalAddress[]
     */
    public $billingAddress;

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange.  If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $broker;

    /**
     * A number that confirms the given order or payment has been received.
     *
     * @var string|array|Text|Text[]
     */
    public $confirmationNumber;

    /**
     * Party placing the order or paying the invoice.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $customer;

    /**
     * Any discount applied (to an Order).
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $discount;

    /**
     * Code used to redeem a discount.
     *
     * @var string|array|Text|Text[]
     */
    public $discountCode;

    /**
     * The currency of the discount.  Use standard formats: [ISO 4217 currency
     * format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|array|Text|Text[]
     */
    public $discountCurrency;

    /**
     * Indicates whether the offer was accepted as a gift for someone other than
     * the buyer.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isGift;

    /**
     * 'merchant' is an out-dated term for 'seller'.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $merchant;

    /**
     * Date order was placed.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $orderDate;

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var array|ParcelDelivery|ParcelDelivery[]
     */
    public $orderDelivery;

    /**
     * The identifier of the transaction.
     *
     * @var string|array|Text|Text[]
     */
    public $orderNumber;

    /**
     * The current status of the order.
     *
     * @var array|OrderStatus|OrderStatus[]
     */
    public $orderStatus;

    /**
     * The item ordered.
     *
     * @var array|OrderItem|OrderItem[]|array|Product|Product[]|array|Service|Service[]
     */
    public $orderedItem;

    /**
     * The order is being paid as part of the referenced Invoice.
     *
     * @var array|Invoice|Invoice[]
     */
    public $partOfInvoice;

    /**
     * The date that payment is due.
     *
     * @var array|DateTime|DateTime[]
     */
    public $paymentDue;

    /**
     * The date that payment is due.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $paymentDueDate;

    /**
     * The name of the credit card or other method of payment for the order.
     *
     * @var string|array|PaymentMethod|PaymentMethod[]|array|Text|Text[]
     */
    public $paymentMethod;

    /**
     * An identifier for the method of payment used (e.g. the last 4 digits of the
     * credit card).
     *
     * @var string|array|Text|Text[]
     */
    public $paymentMethodId;

    /**
     * The URL for sending a payment.
     *
     * @var array|URL|URL[]
     */
    public $paymentUrl;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods.  A seller may also be a provider.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $seller;
}
