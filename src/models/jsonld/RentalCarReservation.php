<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Reservation;

/**
 * RentalCarReservation - A reservation for a rental car. Note: This type is
 * for information about actual reservations, e.g. in confirmation emails or
 * HTML pages with individual confirmations of reservations.
 *
 * Extends: Reservation
 * @see    http://schema.org/RentalCarReservation
 */
class RentalCarReservation extends Reservation
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'RentalCarReservation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/RentalCarReservation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A reservation for a rental car. Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Reservation';

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
     * Where a rental car can be dropped off.
     *
     * @var Place [schema.org types: Place]
     */
    public $dropoffLocation;

    /**
     * When a rental car can be dropped off.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $dropoffTime;

    /**
     * Where a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @var Place [schema.org types: Place]
     */
    public $pickupLocation;

    /**
     * When a taxi will pickup a passenger or a rental car can be picked up.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $pickupTime;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'dropoffLocation',
            'dropoffTime',
            'pickupLocation',
            'pickupTime',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'dropoffLocation' => ['Place'],
            'dropoffTime' => ['DateTime'],
            'pickupLocation' => ['Place'],
            'pickupTime' => ['DateTime'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'dropoffLocation' => 'Where a rental car can be dropped off.',
            'dropoffTime' => 'When a rental car can be dropped off.',
            'pickupLocation' => 'Where a taxi will pick up a passenger or a rental car can be picked up.',
            'pickupTime' => 'When a taxi will pickup a passenger or a rental car can be picked up.',
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
            [['dropoffLocation','dropoffTime','pickupLocation','pickupTime',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
