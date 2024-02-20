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
 * Trait for Reservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Reservation
 */
trait ReservationTrait
{
    /**
     * The date and time the reservation was booked.
     *
     * @var array|DateTime|DateTime[]
     */
    public $bookingTime;

    /**
     * The person or organization the reservation or ticket is for.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $underName;

    /**
     * The total price for the reservation or ticket, including applicable taxes,
     * shipping, etc.  Usage guidelines:  * Use values from 0123456789 (Unicode
     * 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially
     * similar Unicode symbols. * Use '.' (Unicode 'FULL STOP' (U+002E)) rather
     * than ',' to indicate a decimal point. Avoid using these symbols as a
     * readability separator.
     *
     * @var string|float|array|PriceSpecification|PriceSpecification[]|array|Text|Text[]|array|Number|Number[]
     */
    public $totalPrice;

    /**
     * The currency of the price, or a price component when attached to
     * [[PriceSpecification]] and its subtypes.  Use standard formats: [ISO 4217
     * currency format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD";
     * [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|array|Text|Text[]
     */
    public $priceCurrency;

    /**
     * The date and time the reservation was modified.
     *
     * @var array|DateTime|DateTime[]
     */
    public $modifiedTime;

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange.  If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $broker;

    /**
     * The current status of the reservation.
     *
     * @var array|ReservationStatusType|ReservationStatusType[]
     */
    public $reservationStatus;

    /**
     * A unique identifier for the reservation.
     *
     * @var string|array|Text|Text[]
     */
    public $reservationId;

    /**
     * A ticket associated with the reservation.
     *
     * @var array|Ticket|Ticket[]
     */
    public $reservedTicket;

    /**
     * 'bookingAgent' is an out-dated term indicating a 'broker' that serves as a
     * booking agent.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $bookingAgent;

    /**
     * Any membership in a frequent flyer, hotel loyalty program, etc. being
     * applied to the reservation.
     *
     * @var array|ProgramMembership|ProgramMembership[]
     */
    public $programMembershipUsed;

    /**
     * The thing -- flight, event, restaurant, etc. being reserved.
     *
     * @var array|Thing|Thing[]
     */
    public $reservationFor;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $provider;
}
