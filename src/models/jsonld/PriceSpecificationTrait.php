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
 * Trait for PriceSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PriceSpecification
 */
trait PriceSpecificationTrait
{
    /**
     * The interval and unit of measurement of ordering quantities for which the
     * offer or price specification is valid. This allows e.g. specifying that a
     * certain freight charge is valid only for a certain quantity.
     *
     * @var QuantitativeValue
     */
    public $eligibleQuantity;

    /**
     * Specifies whether the applicable value-added tax (VAT) is included in the
     * price specification or not.
     *
     * @var bool|Boolean
     */
    public $valueAddedTaxIncluded;

    /**
     * The lowest price if the price is a range.
     *
     * @var float|Number
     */
    public $minPrice;

    /**
     * The offer price of a product, or of a price component when attached to
     * PriceSpecification and its subtypes.  Usage guidelines:  * Use the
     * [[priceCurrency]] property (with standard formats: [ISO 4217 currency
     * format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR") instead of including
     * [ambiguous
     * symbols](http://en.wikipedia.org/wiki/Dollar_sign#Currencies_that_use_the_dollar_or_peso_sign)
     * such as '$' in the value. * Use '.' (Unicode 'FULL STOP' (U+002E)) rather
     * than ',' to indicate a decimal point. Avoid using these symbols as a
     * readability separator. * Note that both
     * [RDFa](http://www.w3.org/TR/xhtml-rdfa-primer/#using-the-content-attribute)
     * and Microdata syntax allow the use of a "content=" attribute for publishing
     * simple machine-readable values alongside more human-friendly formatting. *
     * Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE'
     * (U+0039)) rather than superficially similar Unicode symbols.
     *
     * @var string|float|Text|Number
     */
    public $price;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var Date|DateTime
     */
    public $validThrough;

    /**
     * The highest price if the price is a range.
     *
     * @var float|Number
     */
    public $maxPrice;

    /**
     * The date when the item becomes valid.
     *
     * @var Date|DateTime
     */
    public $validFrom;

    /**
     * The transaction volume, in a monetary unit, for which the offer or price
     * specification is valid, e.g. for indicating a minimal purchasing volume, to
     * express free shipping above a certain order volume, or to limit the
     * acceptance of credit cards to purchases to a certain minimal amount.
     *
     * @var PriceSpecification
     */
    public $eligibleTransactionVolume;

    /**
     * The currency of the price, or a price component when attached to
     * [[PriceSpecification]] and its subtypes.  Use standard formats: [ISO 4217
     * currency format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD";
     * [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|Text
     */
    public $priceCurrency;
}
