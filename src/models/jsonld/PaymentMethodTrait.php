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
 * Trait for PaymentMethod.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PaymentMethod
 */
trait PaymentMethodTrait
{
    /**
     * The type of a payment method.
     *
     * @var array|PaymentMethodType|PaymentMethodType[]
     */
    public $paymentMethodType;
}
