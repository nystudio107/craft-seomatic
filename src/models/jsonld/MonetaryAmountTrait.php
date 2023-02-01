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
 * Trait for MonetaryAmount.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MonetaryAmount
 */
trait MonetaryAmountTrait
{
    /**
     * The value of the quantitative value or property value node.  * For
     * [[QuantitativeValue]] and [[MonetaryAmount]], the recommended type for
     * values is 'Number'. * For [[PropertyValue]], it can be 'Text', 'Number',
     * 'Boolean', or 'StructuredValue'. * Use values from 0123456789 (Unicode
     * 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially
     * similar Unicode symbols. * Use '.' (Unicode 'FULL STOP' (U+002E)) rather
     * than ',' to indicate a decimal point. Avoid using these symbols as a
     * readability separator.
     *
     * @var string|bool|float|StructuredValue|Text|Boolean|Number
     */
    public $value;

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
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var Date|DateTime
     */
    public $validThrough;

    /**
     * The upper value of some characteristic or property.
     *
     * @var float|Number
     */
    public $maxValue;

    /**
     * The date when the item becomes valid.
     *
     * @var Date|DateTime
     */
    public $validFrom;

    /**
     * The lower value of some characteristic or property.
     *
     * @var float|Number
     */
    public $minValue;
}
