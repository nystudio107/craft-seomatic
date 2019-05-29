<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Ticket - Used to describe a ticket to an event, a flight, a bus ride, etc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Ticket
 */
class Ticket extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Ticket';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Ticket';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Used to describe a ticket to an event, a flight, a bus ride, etc.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The date the ticket was issued.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $dateIssued;

    /**
     * The organization issuing the ticket or permit.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $issuedBy;

    /**
     * The currency of the price, or a price component when attached to
     * PriceSpecification and its subtypes. Use standard formats: ISO 4217
     * currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC";
     * well known names for Local Exchange Tradings Systems (LETS) and other
     * currency types e.g. "Ithaca HOUR".
     *
     * @var string [schema.org types: Text]
     */
    public $priceCurrency;

    /**
     * The unique identifier for the ticket.
     *
     * @var string [schema.org types: Text]
     */
    public $ticketNumber;

    /**
     * Reference to an asset (e.g., Barcode, QR code image or PDF) usable for
     * entrance.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $ticketToken;

    /**
     * The seat associated with the ticket.
     *
     * @var mixed|Seat [schema.org types: Seat]
     */
    public $ticketedSeat;

    /**
     * The total price for the reservation or ticket, including applicable taxes,
     * shipping, etc. Usage guidelines:Use values from 0123456789 (Unicode 'DIGIT
     * ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially similiar
     * Unicode symbols. Use '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to
     * indicate a decimal point. Avoid using these symbols as a readability
     * separator.
     *
     * @var mixed|float|PriceSpecification|string [schema.org types: Number, PriceSpecification, Text]
     */
    public $totalPrice;

    /**
     * The person or organization the reservation or ticket is for.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $underName;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'dateIssued',
        'issuedBy',
        'priceCurrency',
        'ticketNumber',
        'ticketToken',
        'ticketedSeat',
        'totalPrice',
        'underName'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'dateIssued' => ['DateTime'],
        'issuedBy' => ['Organization'],
        'priceCurrency' => ['Text'],
        'ticketNumber' => ['Text'],
        'ticketToken' => ['Text','URL'],
        'ticketedSeat' => ['Seat'],
        'totalPrice' => ['Number','PriceSpecification','Text'],
        'underName' => ['Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'dateIssued' => 'The date the ticket was issued.',
        'issuedBy' => 'The organization issuing the ticket or permit.',
        'priceCurrency' => 'The currency of the price, or a price component when attached to PriceSpecification and its subtypes. Use standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR".',
        'ticketNumber' => 'The unique identifier for the ticket.',
        'ticketToken' => 'Reference to an asset (e.g., Barcode, QR code image or PDF) usable for entrance.',
        'ticketedSeat' => 'The seat associated with the ticket.',
        'totalPrice' => 'The total price for the reservation or ticket, including applicable taxes, shipping, etc. Usage guidelines:Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
        'underName' => 'The person or organization the reservation or ticket is for.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['dateIssued','issuedBy','priceCurrency','ticketNumber','ticketToken','ticketedSeat','totalPrice','underName'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
