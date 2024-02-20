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
 * Trait for Ticket.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Ticket
 */
trait TicketTrait
{
    /**
     * The person or organization the reservation or ticket is for.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $underName;

    /**
     * The unique identifier for the ticket.
     *
     * @var string|array|Text|Text[]
     */
    public $ticketNumber;

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
     * The organization issuing the item, for example a [[Permit]], [[Ticket]], or
     * [[Certification]].
     *
     * @var array|Organization|Organization[]
     */
    public $issuedBy;

    /**
     * The date the ticket was issued.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $dateIssued;

    /**
     * The seat associated with the ticket.
     *
     * @var array|Seat|Seat[]
     */
    public $ticketedSeat;

    /**
     * Reference to an asset (e.g., Barcode, QR code image or PDF) usable for
     * entrance.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $ticketToken;
}
