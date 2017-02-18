<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Accommodation;

/**
 * House - A house is a building or structure that has the ability to be
 * occupied for habitation by humans or other creatures (Source: Wikipedia,
 * the free encyclopedia, see http://en.wikipedia.org/wiki/House).
 * Extends: Accommodation
 * @see    http://schema.org/House
 */
class House extends Accommodation
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'House';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/House';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A house is a building or structure that has the ability to be occupied for habitation by humans or other creatures (Source: Wikipedia, the free encyclopedia, see http://en.wikipedia.org/wiki/House).';

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
     * The number of rooms (excluding bathrooms and closets) of the acccommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     * @var mixed float, QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfRooms;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'numberOfRooms',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'numberOfRooms' => ['Number','QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'numberOfRooms' => 'The number of rooms (excluding bathrooms and closets) of the acccommodation or lodging business. Typical unit code(s): ROM for room or C62 for no unit. The type of room can be put in the unitText property of the QuantitativeValue.',
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
                [['numberOfRooms',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class House*/
