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
 * Trait for Invoice.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Invoice
 */
trait InvoiceTrait
{
    /**
     * The identifier for the account the payment will be applied to.
     *
     * @var string|array|Text|Text[]
     */
    public $accountId;

    /**
     * The time interval used to compute the invoice.
     *
     * @var array|Duration|Duration[]
     */
    public $billingPeriod;

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
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Text|Text[]|array|Thing|Thing[]|array|URL|URL[]
     */
    public $category;

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
     * The minimum payment required at this time.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]|array|PriceSpecification|PriceSpecification[]
     */
    public $minimumPaymentDue;

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
     * The status of payment; whether the invoice has been paid or not.
     *
     * @var string|array|PaymentStatusType|PaymentStatusType[]|array|Text|Text[]
     */
    public $paymentStatus;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $provider;

    /**
     * The Order(s) related to this Invoice. One or more Orders may be combined
     * into a single Invoice.
     *
     * @var array|Order|Order[]
     */
    public $referencesOrder;

    /**
     * The date the invoice is scheduled to be paid.
     *
     * @var array|Date|Date[]
     */
    public $scheduledPaymentDate;

    /**
     * The total amount due.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]|array|PriceSpecification|PriceSpecification[]
     */
    public $totalPaymentDue;
}
