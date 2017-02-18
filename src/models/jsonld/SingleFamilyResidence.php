<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\House;

/**
 * SingleFamilyResidence - Residence type: Single-family home.
 * Extends: House
 * @see    http://schema.org/SingleFamilyResidence
 */
class SingleFamilyResidence extends House
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SingleFamilyResidence';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SingleFamilyResidence';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Residence type: Single-family home.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'House';

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
                'numberOfRooms',
                'occupancy',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'numberOfRooms' => ['Number','QuantitativeValue'],
                'occupancy' => ['QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
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
                [['numberOfRooms','occupancy',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SingleFamilyResidence*/
