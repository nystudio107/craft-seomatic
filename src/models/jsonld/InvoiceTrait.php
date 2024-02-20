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
 * schema.org version: v26.0-release
 * Trait for Invoice.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Invoice
 */
trait InvoiceTrait
{
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
     * @var string|array|Text|Text[]|array|PaymentStatusType|PaymentStatusType[]
     */
    public $paymentStatus;

    /**
     * The date the invoice is scheduled to be paid.
     *
     * @var array|Date|Date[]
     */
    public $scheduledPaymentDate;

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange.  If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $broker;

    /**
     * The Order(s) related to this Invoice. One or more Orders may be combined
     * into a single Invoice.
     *
     * @var array|Order|Order[]
     */
    public $referencesOrder;

    /**
     * Party placing the order or paying the invoice.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $customer;

    /**
     * The time interval used to compute the invoice.
     *
     * @var array|Duration|Duration[]
     */
    public $billingPeriod;

    /**
     * The identifier for the account the payment will be applied to.
     *
     * @var string|array|Text|Text[]
     */
    public $accountId;

    /**
     * The date that payment is due.
     *
     * @var array|DateTime|DateTime[]
     */
    public $paymentDue;

    /**
     * A number that confirms the given order or payment has been received.
     *
     * @var string|array|Text|Text[]
     */
    public $confirmationNumber;

    /**
     * The minimum payment required at this time.
     *
     * @var array|PriceSpecification|PriceSpecification[]|array|MonetaryAmount|MonetaryAmount[]
     */
    public $minimumPaymentDue;

    /**
     * The name of the credit card or other method of payment for the order.
     *
     * @var array|PaymentMethod|PaymentMethod[]
     */
    public $paymentMethod;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Thing|Thing[]
     */
    public $category;

    /**
     * The date that payment is due.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $paymentDueDate;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $provider;

    /**
     * The total amount due.
     *
     * @var array|PriceSpecification|PriceSpecification[]|array|MonetaryAmount|MonetaryAmount[]
     */
    public $totalPaymentDue;
}
