<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Accommodation;

/**
 * Suite - A suite in a hotel or other public accommodation, denotes a class
 * of luxury accommodations, the key feature of which is multiple rooms
 * (Source: Wikipedia, the free encyclopedia, see
 * http://en.wikipedia.org/wiki/Suite_(hotel)). See also the dedicated
 * document on the use of schema.org for marking up hotels and other forms of
 * accommodations.
 * Extends: Accommodation
 * @see    http://schema.org/Suite
 */
class Suite extends Accommodation
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Suite';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Suite';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A suite in a hotel or other public accommodation, denotes a class of luxury accommodations, the key feature of which is multiple rooms (Source: Wikipedia, the free encyclopedia, see http://en.wikipedia.org/wiki/Suite_(hotel)). See also the dedicated document on the use of schema.org for marking up hotels and other forms of accommodations.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Accommodation';

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
     * The type of bed or beds included in the accommodation. For the single case
     * of just one bed of a certain type, you use bed directly with a text. If you
     * want to indicate the quantity of a certain kind of bed, use an instance of
     * BedDetails. For more detailed information, use the amenityFeature property.
     * @var mixed BedDetails, string [schema.org types: BedDetails, Text]
     */
    public $bed;

    /**
     * The number of rooms (excluding bathrooms and closets) of the acccommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     * @var mixed float, QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfRooms;

    /**
     * The allowed total occupancy for the accommodation in persons (including
     * infants etc). For individual accommodations, this is not necessarily the
     * legal maximum but defines the permitted usage as per the contractual
     * agreement (e.g. a double room used by a single person). Typical unit
     * code(s): C62 for person
     * @var mixed QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $occupancy;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'bed',
                'numberOfRooms',
                'occupancy',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'bed' => ['BedDetails','Text'],
                'numberOfRooms' => ['Number','QuantitativeValue'],
                'occupancy' => ['QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'bed' => 'The type of bed or beds included in the accommodation. For the single case of just one bed of a certain type, you use bed directly with a text. If you want to indicate the quantity of a certain kind of bed, use an instance of BedDetails. For more detailed information, use the amenityFeature property.',
                'numberOfRooms' => 'The number of rooms (excluding bathrooms and closets) of the acccommodation or lodging business. Typical unit code(s): ROM for room or C62 for no unit. The type of room can be put in the unitText property of the QuantitativeValue.',
                'occupancy' => 'The allowed total occupancy for the accommodation in persons (including infants etc). For individual accommodations, this is not necessarily the legal maximum but defines the permitted usage as per the contractual agreement (e.g. a double room used by a single person). Typical unit code(s): C62 for person',
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
                [['bed','numberOfRooms','occupancy',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Suite*/
