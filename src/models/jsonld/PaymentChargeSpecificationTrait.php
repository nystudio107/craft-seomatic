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
 * Trait for PaymentChargeSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PaymentChargeSpecification
 */
trait PaymentChargeSpecificationTrait
{
    /**
     * The payment method(s) to which the payment charge specification applies.
     *
     * @var array|PaymentMethod|PaymentMethod[]
     */
    public $appliesToPaymentMethod;

    /**
     * The delivery method(s) to which the delivery charge or payment charge
     * specification applies.
     *
     * @var array|DeliveryMethod|DeliveryMethod[]
     */
    public $appliesToDeliveryMethod;
}
