<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Reservation;

/**
 * EventReservation - A reservation for an event like a concert, sporting
 * event, or lecture. Note: This type is for information about actual
 * reservations, e.g. in confirmation emails or HTML pages with individual
 * confirmations of reservations. For offers of tickets, use Offer.
 * Extends: Reservation
 * @see    http://schema.org/EventReservation
 */
class EventReservation extends Reservation
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'EventReservation';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/EventReservation';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A reservation for an event like a concert, sporting event, or lecture. Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, use Offer.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Reservation';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * The date and time the reservation was booked.
     * @var DateTime [schema.org types: DateTime]
     */
    public $bookingTime;

    /**
     * An entity that arranges for an exchange between a buyer and a seller. In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange. If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred. Supersedes
     * bookingAgent.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $broker;

    /**
     * The date and time the reservation was modified.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $modifiedTime;

    /**
     * The currency (in 3-letter ISO 4217 format) of the price or a price
     * component, when attached to PriceSpecification and its subtypes.
     * @var mixed string [schema.org types: Text]
     */
    public $priceCurrency;

    /**
     * Any membership in a frequent flyer, hotel loyalty program, etc. being
     * applied to the reservation.
     * @var mixed ProgramMembership [schema.org types: ProgramMembership]
     */
    public $programMembershipUsed;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * The thing -- flight, event, restaurant,etc. being reserved.
     * @var mixed Thing [schema.org types: Thing]
     */
    public $reservationFor;

    /**
     * A unique identifier for the reservation.
     * @var mixed string [schema.org types: Text]
     */
    public $reservationId;

    /**
     * The current status of the reservation.
     * @var mixed ReservationStatusType [schema.org types: ReservationStatusType]
     */
    public $reservationStatus;

    /**
     * A ticket associated with the reservation.
     * @var mixed Ticket [schema.org types: Ticket]
     */
    public $reservedTicket;

    /**
     * The total price for the reservation or ticket, including applicable taxes,
     * shipping, etc.
     * @var mixed float, PriceSpecification, string [schema.org types: Number, PriceSpecification, Text]
     */
    public $totalPrice;

    /**
     * The person or organization the reservation or ticket is for.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $underName;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
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
                'underName',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
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
                'underName' => ['Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'bookingTime' => 'The date and time the reservation was booked.',
                'broker' => 'An entity that arranges for an exchange between a buyer and a seller. In most cases a broker never acquires or releases ownership of a product or service involved in an exchange. If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred. Supersedes bookingAgent.',
                'modifiedTime' => 'The date and time the reservation was modified.',
                'priceCurrency' => 'The currency (in 3-letter ISO 4217 format) of the price or a price component, when attached to PriceSpecification and its subtypes.',
                'programMembershipUsed' => 'Any membership in a frequent flyer, hotel loyalty program, etc. being applied to the reservation.',
                'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
                'reservationFor' => 'The thing -- flight, event, restaurant,etc. being reserved.',
                'reservationId' => 'A unique identifier for the reservation.',
                'reservationStatus' => 'The current status of the reservation.',
                'reservedTicket' => 'A ticket associated with the reservation.',
                'totalPrice' => 'The total price for the reservation or ticket, including applicable taxes, shipping, etc.',
                'underName' => 'The person or organization the reservation or ticket is for.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['bookingTime','broker','modifiedTime','priceCurrency','programMembershipUsed','provider','reservationFor','reservationId','reservationStatus','reservedTicket','totalPrice','underName',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class EventReservation*/
