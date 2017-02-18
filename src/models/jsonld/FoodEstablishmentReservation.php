<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Reservation;

/**
 * FoodEstablishmentReservation - A reservation to dine at a food-related
 * business.Note: This type is for information about actual reservations, e.g.
 * in confirmation emails or HTML pages with individual confirmations of
 * reservations.
 * Extends: Reservation
 * @see    http://schema.org/FoodEstablishmentReservation
 */
class FoodEstablishmentReservation extends Reservation
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'FoodEstablishmentReservation';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/FoodEstablishmentReservation';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A reservation to dine at a food-related business.Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.';

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
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to December. Note that Event uses
     * startDate/endDate instead of startTime/endTime, even when describing dates
     * with times. This situation may be clarified in future revisions.
     * @var DateTime [schema.org types: DateTime]
     */
    public $endTime;

    /**
     * Number of people the reservation should accommodate.
     * @var mixed int, QuantitativeValue [schema.org types: Integer, QuantitativeValue]
     */
    public $partySize;

    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to December. Note that Event uses
     * startDate/endDate instead of startTime/endTime, even when describing dates
     * with times. This situation may be clarified in future revisions.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $startTime;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'endTime',
                'partySize',
                'startTime',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'endTime' => ['DateTime'],
                'partySize' => ['Integer','QuantitativeValue'],
                'startTime' => ['DateTime'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'endTime' => 'The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to December. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
                'partySize' => 'Number of people the reservation should accommodate.',
                'startTime' => 'The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to December. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
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
                [['endTime','partySize','startTime',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class FoodEstablishmentReservation*/
