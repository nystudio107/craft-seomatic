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
 * Trait for Ticket.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Ticket
 */
trait TicketTrait
{
    /**
     * The unique identifier for the ticket.
     *
     * @var string|Text
     */
    public $ticketNumber;

    /**
     * The organization issuing the ticket or permit.
     *
     * @var Organization
     */
    public $issuedBy;

    /**
     * Reference to an asset (e.g., Barcode, QR code image or PDF) usable for
     * entrance.
     *
     * @var string|URL|Text
     */
    public $ticketToken;

    /**
     * The total price for the reservation or ticket, including applicable taxes,
     * shipping, etc.  Usage guidelines:  * Use values from 0123456789 (Unicode
     * 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially
     * similar Unicode symbols. * Use '.' (Unicode 'FULL STOP' (U+002E)) rather
     * than ',' to indicate a decimal point. Avoid using these symbols as a
     * readability separator.
     *
     * @var float|string|Number|PriceSpecification|Text
     */
    public $totalPrice;

    /**
     * The person or organization the reservation or ticket is for.
     *
     * @var Organization|Person
     */
    public $underName;

    /**
     * The seat associated with the ticket.
     *
     * @var Seat
     */
    public $ticketedSeat;

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

    /**
     * The date the ticket was issued.
     *
     * @var Date|DateTime
     */
    public $dateIssued;
}
