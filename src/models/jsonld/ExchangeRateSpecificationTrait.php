<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for ExchangeRateSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ExchangeRateSpecification
 */

trait ExchangeRateSpecificationTrait
{
    
    /**
     * The current price of a currency.
     *
     * @var UnitPriceSpecification
     */
    public $currentExchangeRate;

    /**
     * The difference between the price at which a broker or other intermediary
     * buys and sells foreign currency.
     *
     * @var float|Number|MonetaryAmount
     */
    public $exchangeRateSpread;

    /**
     * The currency in which the monetary amount is expressed.  Use standard
     * formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217)
     * e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies e.g. "BTC"; well known names for [Local Exchange Tradings
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types e.g. "Ithaca HOUR".
     *
     * @var string|Text
     */
    public $currency;

}
