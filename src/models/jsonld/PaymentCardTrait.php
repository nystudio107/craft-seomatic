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
 * Trait for PaymentCard.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PaymentCard
 */
trait PaymentCardTrait
{
    /**
     * A secure method for consumers to purchase products or services via debit,
     * credit or smartcards by using RFID or NFC technology.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $contactlessPayment;

    /**
     * The minimum payment is the lowest amount of money that one is required to
     * pay on a credit card statement each month.
     *
     * @var float|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $monthlyMinimumRepaymentAmount;

    /**
     * A floor limit is the amount of money above which credit card transactions
     * must be authorized.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $floorLimit;

    /**
     * A cardholder benefit that pays the cardholder a small percentage of their
     * net expenditures.
     *
     * @var float|bool|array|Number|Number[]|array|Boolean|Boolean[]
     */
    public $cashBack;
}
