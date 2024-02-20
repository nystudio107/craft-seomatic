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
 * Trait for LocalBusiness.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LocalBusiness
 */
trait LocalBusinessTrait
{
    /**
     * The price range of the business, for example ```$$$```.
     *
     * @var string|array|Text|Text[]
     */
    public $priceRange;

    /**
     * Cash, Credit Card, Cryptocurrency, Local Exchange Tradings System, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $paymentAccepted;

    /**
     * The larger organization that this local business is a branch of, if any.
     * Not to be confused with (anatomical) [[branch]].
     *
     * @var array|Organization|Organization[]
     */
    public $branchOf;

    /**
     * The general opening hours for a business. Opening hours can be specified as
     * a weekly time range, starting with days, then times per day. Multiple days
     * can be listed with commas ',' separating each day. Day or time ranges are
     * specified using a hyphen '-'.  * Days are specified using the following
     * two-letter combinations: ```Mo```, ```Tu```, ```We```, ```Th```, ```Fr```,
     * ```Sa```, ```Su```. * Times are specified using 24:00 format. For example,
     * 3pm is specified as ```15:00```, 10am as ```10:00```.  * Here is an
     * example: <code><time itemprop="openingHours" datetime="Tu,Th
     * 16:00-20:00">Tuesdays and Thursdays 4-8pm</time></code>. * If a business is
     * open 7 days a week, then it can be specified as <code><time
     * itemprop="openingHours" datetime="Mo-Su">Monday through Sunday, all
     * day</time></code>.
     *
     * @var string|array|Text|Text[]
     */
    public $openingHours;

    /**
     * The currency accepted.  Use standard formats: [ISO 4217 currency
     * format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|array|Text|Text[]
     */
    public $currenciesAccepted;
}
