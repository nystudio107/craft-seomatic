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
 * Reservation - Describes a reservation for travel, dining or an event. Some
 * reservations require tickets. Note: This type is for information about
 * actual reservations, e.g. in confirmation emails or HTML pages with
 * individual confirmations of reservations. For offers of tickets, restaurant
 * reservations, flights, or rental cars, use Offer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Reservation
 */
class Reservation extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Reservation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Reservation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Describes a reservation for travel, dining or an event. Some reservations require tickets. Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, restaurant reservations, flights, or rental cars, use Offer.';

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
     * The date and time the reservation was booked.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $bookingTime;

    /**
     * An entity that arranges for an exchange between a buyer and a seller. In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange. If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred. Supersedes
     * bookingAgent.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $broker;

    /**
     * The date and time the reservation was modified.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $modifiedTime;

    /**
     * The currency of the price, or a price component when attached to
     * PriceSpecification and its subtypes. Use standard formats: ISO 4217
     * currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC";
     * well known names for Local Exchange Tradings Systems (LETS) and other
     * currency types e.g. "Ithaca HOUR".
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $priceCurrency;

    /**
     * Any membership in a frequent flyer, hotel loyalty program, etc. being
     * applied to the reservation.
     *
     * @var mixed|ProgramMembership [schema.org types: ProgramMembership]
     */
    public $programMembershipUsed;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * The thing -- flight, event, restaurant,etc. being reserved.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $reservationFor;

    /**
     * A unique identifier for the reservation.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $reservationId;

    /**
     * The current status of the reservation.
     *
     * @var mixed|ReservationStatusType [schema.org types: ReservationStatusType]
     */
    public $reservationStatus;

    /**
     * A ticket associated with the reservation.
     *
     * @var mixed|Ticket [schema.org types: Ticket]
     */
    public $reservedTicket;

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
        'bookingTime',
        'broker',
        'modifiedTime',
        'priceCurrency',
        'programMembershipUsed',
        'provider',
        'reservationFor',
        'reservationId',
        'reservationStatus',
        'reservedTicket',
        'totalPrice',
        'underName'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'bookingTime' => ['DateTime'],
        'broker' => ['Organization','Person'],
        'modifiedTime' => ['DateTime'],
        'priceCurrency' => ['Text'],
        'programMembershipUsed' => ['ProgramMembership'],
        'provider' => ['Organization','Person'],
        'reservationFor' => ['Thing'],
        'reservationId' => ['Text'],
        'reservationStatus' => ['ReservationStatusType'],
        'reservedTicket' => ['Ticket'],
        'totalPrice' => ['Number','PriceSpecification','Text'],
        'underName' => ['Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'bookingTime' => 'The date and time the reservation was booked.',
        'broker' => 'An entity that arranges for an exchange between a buyer and a seller. In most cases a broker never acquires or releases ownership of a product or service involved in an exchange. If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred. Supersedes bookingAgent.',
        'modifiedTime' => 'The date and time the reservation was modified.',
        'priceCurrency' => 'The currency of the price, or a price component when attached to PriceSpecification and its subtypes. Use standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR".',
        'programMembershipUsed' => 'Any membership in a frequent flyer, hotel loyalty program, etc. being applied to the reservation.',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
        'reservationFor' => 'The thing -- flight, event, restaurant,etc. being reserved.',
        'reservationId' => 'A unique identifier for the reservation.',
        'reservationStatus' => 'The current status of the reservation.',
        'reservedTicket' => 'A ticket associated with the reservation.',
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
            [['bookingTime','broker','modifiedTime','priceCurrency','programMembershipUsed','provider','reservationFor','reservationId','reservationStatus','reservedTicket','totalPrice','underName'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
