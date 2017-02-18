<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Reservation;

/**
 * FlightReservation - A reservation for air travel. Note: This type is for
 * information about actual reservations, e.g. in confirmation emails or HTML
 * pages with individual confirmations of reservations. For offers of tickets,
 * use Offer.
 * Extends: Reservation
 * @see    http://schema.org/FlightReservation
 */
class FlightReservation extends Reservation
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'FlightReservation';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/FlightReservation';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A reservation for air travel. Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, use Offer.';

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
     * The airline-specific indicator of boarding order / preference.
     * @var string [schema.org types: Text]
     */
    public $boardingGroup;

    /**
     * The priority status assigned to a passenger for security or boarding (e.g.
     * FastTrack or Priority).
     * @var mixed QualitativeValue, string [schema.org types: QualitativeValue, Text]
     */
    public $passengerPriorityStatus;

    /**
     * The passenger's sequence number as assigned by the airline.
     * @var mixed string [schema.org types: Text]
     */
    public $passengerSequenceNumber;

    /**
     * The type of security screening the passenger is subject to.
     * @var mixed string [schema.org types: Text]
     */
    public $securityScreening;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'boardingGroup',
                'passengerPriorityStatus',
                'passengerSequenceNumber',
                'securityScreening',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'boardingGroup' => ['Text'],
                'passengerPriorityStatus' => ['QualitativeValue','Text'],
                'passengerSequenceNumber' => ['Text'],
                'securityScreening' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'boardingGroup' => 'The airline-specific indicator of boarding order / preference.',
                'passengerPriorityStatus' => 'The priority status assigned to a passenger for security or boarding (e.g. FastTrack or Priority).',
                'passengerSequenceNumber' => 'The passenger\'s sequence number as assigned by the airline.',
                'securityScreening' => 'The type of security screening the passenger is subject to.',
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
                [['boardingGroup','passengerPriorityStatus','passengerSequenceNumber','securityScreening',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class FlightReservation*/
