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
 * Trait for LoanOrCredit.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LoanOrCredit
 */
trait LoanOrCreditTrait
{
    /**
     * The amount of money.
     *
     * @var float|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $amount;

    /**
     * The only way you get the money back in the event of default is the
     * security. Recourse is where you still have the opportunity to go back to
     * the borrower for the rest of the money.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $recourseLoan;

    /**
     * Whether the terms for payment of interest can be renegotiated during the
     * life of the loan.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $renegotiableLoan;

    /**
     * The currency in which the monetary amount is expressed.  Use standard
     * formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217),
     * e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|array|Text|Text[]
     */
    public $currency;

    /**
     * A form of paying back money previously borrowed from a lender. Repayment
     * usually takes the form of periodic payments that normally include part
     * principal plus interest in each payment.
     *
     * @var array|RepaymentSpecification|RepaymentSpecification[]
     */
    public $loanRepaymentForm;

    /**
     * The duration of the loan or credit agreement.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $loanTerm;

    /**
     * Assets required to secure loan or credit repayments. It may take form of
     * third party pledge, goods, financial instruments (cash, securities, etc.)
     *
     * @var string|array|Text|Text[]|array|Thing|Thing[]
     */
    public $requiredCollateral;

    /**
     * The period of time after any due date that the borrower has to fulfil its
     * obligations before a default (failure to pay) is deemed to have occurred.
     *
     * @var array|Duration|Duration[]
     */
    public $gracePeriod;

    /**
     * The type of a loan or credit.
     *
     * @var string|array|URL|URL[]|array|Text|Text[]
     */
    public $loanType;
}
