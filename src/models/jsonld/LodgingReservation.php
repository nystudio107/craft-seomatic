<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Reservation;

/**
 * LodgingReservation - A reservation for lodging at a hotel, motel, inn, etc.
 * Note: This type is for information about actual reservations, e.g. in
 * confirmation emails or HTML pages with individual confirmations of
 * reservations.
 *
 * Extends: Reservation
 * @see    http://schema.org/LodgingReservation
 */
class LodgingReservation extends Reservation
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'LodgingReservation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/LodgingReservation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A reservation for lodging at a hotel, motel, inn, etc. Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.';

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
     * The earliest someone may check into a lodging establishment.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $checkinTime;

    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $checkoutTime;

    /**
     * A full description of the lodging unit.
     *
     * @var string [schema.org types: Text]
     */
    public $lodgingUnitDescription;

    /**
     * Textual description of the unit type (including suite vs. room, size of
     * bed, etc.).
     *
     * @var mixed|QualitativeValue|string [schema.org types: QualitativeValue, Text]
     */
    public $lodgingUnitType;

    /**
     * The number of adults staying in the unit.
     *
     * @var mixed|int|QuantitativeValue [schema.org types: Integer, QuantitativeValue]
     */
    public $numAdults;

    /**
     * The number of children staying in the unit.
     *
     * @var mixed|int|QuantitativeValue [schema.org types: Integer, QuantitativeValue]
     */
    public $numChildren;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'checkinTime',
            'checkoutTime',
            'lodgingUnitDescription',
            'lodgingUnitType',
            'numAdults',
            'numChildren',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'checkinTime' => ['DateTime'],
            'checkoutTime' => ['DateTime'],
            'lodgingUnitDescription' => ['Text'],
            'lodgingUnitType' => ['QualitativeValue','Text'],
            'numAdults' => ['Integer','QuantitativeValue'],
            'numChildren' => ['Integer','QuantitativeValue'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'checkinTime' => 'The earliest someone may check into a lodging establishment.',
            'checkoutTime' => 'The latest someone may check out of a lodging establishment.',
            'lodgingUnitDescription' => 'A full description of the lodging unit.',
            'lodgingUnitType' => 'Textual description of the unit type (including suite vs. room, size of bed, etc.).',
            'numAdults' => 'The number of adults staying in the unit.',
            'numChildren' => 'The number of children staying in the unit.',
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
            [['checkinTime','checkoutTime','lodgingUnitDescription','lodgingUnitType','numAdults','numChildren',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
