<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for DatedMoneySpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DatedMoneySpecification
 */
trait DatedMoneySpecificationTrait
{
    /**
     * The currency in which the monetary amount is expressed.  Use standard
     * formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217),
     * e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|Text
     */
    public $currency;

    /**
     * The amount of money.
     *
     * @var float|MonetaryAmount|Number
     */
    public $amount;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $startDate;

    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $endDate;
}
