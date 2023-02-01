<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Invoice.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Invoice
 */
trait InvoiceTrait
{
    /**
     * A number that confirms the given order or payment has been received.
     *
     * @var string|Text
     */
    public $confirmationNumber;

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange.  If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred.
     *
     * @var Person|Organization
     */
    public $broker;

    /**
     * The date that payment is due.
     *
     * @var Date|DateTime
     */
    public $paymentDueDate;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var Organization|Person
     */
    public $provider;

    /**
     * The total amount due.
     *
     * @var MonetaryAmount|PriceSpecification
     */
    public $totalPaymentDue;

    /**
     * The identifier for the account the payment will be applied to.
     *
     * @var string|Text
     */
    public $accountId;

    /**
     * Party placing the order or paying the invoice.
     *
     * @var Organization|Person
     */
    public $customer;

    /**
     * The date that payment is due.
     *
     * @var DateTime
     */
    public $paymentDue;

    /**
     * The time interval used to compute the invoice.
     *
     * @var Duration
     */
    public $billingPeriod;

    /**
     * An identifier for the method of payment used (e.g. the last 4 digits of the
     * credit card).
     *
     * @var string|Text
     */
    public $paymentMethodId;

    /**
     * The status of payment; whether the invoice has been paid or not.
     *
     * @var string|Text|PaymentStatusType
     */
    public $paymentStatus;

    /**
     * The name of the credit card or other method of payment for the order.
     *
     * @var PaymentMethod
     */
    public $paymentMethod;

    /**
     * The date the invoice is scheduled to be paid.
     *
     * @var Date
     */
    public $scheduledPaymentDate;

    /**
     * The Order(s) related to this Invoice. One or more Orders may be combined
     * into a single Invoice.
     *
     * @var Order
     */
    public $referencesOrder;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|CategoryCode|Text|Thing|PhysicalActivityCategory
     */
    public $category;

    /**
     * The minimum payment required at this time.
     *
     * @var MonetaryAmount|PriceSpecification
     */
    public $minimumPaymentDue;
}
