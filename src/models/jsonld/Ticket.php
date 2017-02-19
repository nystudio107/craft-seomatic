<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Ticket - Used to describe a ticket to an event, a flight, a bus ride, etc.
 *
 * Extends: Intangible
 * @see    http://schema.org/Ticket
 */
class Ticket extends Intangible
{
    // Static Properties
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
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
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
     * The currency (in 3-letter ISO 4217 format) of the price or a price
     * component, when attached to PriceSpecification and its subtypes.
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
     * shipping, etc.
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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'dateIssued',
            'issuedBy',
            'priceCurrency',
            'ticketNumber',
            'ticketToken',
            'ticketedSeat',
            'totalPrice',
            'underName',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'dateIssued' => ['DateTime'],
            'issuedBy' => ['Organization'],
            'priceCurrency' => ['Text'],
            'ticketNumber' => ['Text'],
            'ticketToken' => ['Text','URL'],
            'ticketedSeat' => ['Seat'],
            'totalPrice' => ['Number','PriceSpecification','Text'],
            'underName' => ['Organization','Person'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'dateIssued' => 'The date the ticket was issued.',
            'issuedBy' => 'The organization issuing the ticket or permit.',
            'priceCurrency' => 'The currency (in 3-letter ISO 4217 format) of the price or a price component, when attached to PriceSpecification and its subtypes.',
            'ticketNumber' => 'The unique identifier for the ticket.',
            'ticketToken' => 'Reference to an asset (e.g., Barcode, QR code image or PDF) usable for entrance.',
            'ticketedSeat' => 'The seat associated with the ticket.',
            'totalPrice' => 'The total price for the reservation or ticket, including applicable taxes, shipping, etc.',
            'underName' => 'The person or organization the reservation or ticket is for.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['dateIssued','issuedBy','priceCurrency','ticketNumber','ticketToken','ticketedSeat','totalPrice','underName',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
