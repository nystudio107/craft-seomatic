<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Room;

/**
 * MeetingRoom - A meeting room, conference room, or conference hall is a room
 * provided for singular events such as business conferences and meetings
 * (Source: Wikipedia, the free encyclopedia, see
 * http://en.wikipedia.org/wiki/Conference_hall). See also the dedicated
 * document on the use of schema.org for marking up hotels and other forms of
 * accommodations.
 * Extends: Room
 * @see    http://schema.org/MeetingRoom
 */
class MeetingRoom extends Room
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MeetingRoom';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MeetingRoom';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A meeting room, conference room, or conference hall is a room provided for singular events such as business conferences and meetings (Source: Wikipedia, the free encyclopedia, see http://en.wikipedia.org/wiki/Conference_hall). See also the dedicated document on the use of schema.org for marking up hotels and other forms of accommodations.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Room';

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
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     * @var LocationFeatureSpecification [schema.org types: LocationFeatureSpecification]
     */
    public $amenityFeature;

    /**
     * The size of the accommodation, e.g. in square meter or squarefoot. Typical
     * unit code(s): MTK for square meter, FTK for square foot, or YDK for square
     * yard
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $floorSize;

    /**
     * The number of rooms (excluding bathrooms and closets) of the acccommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     * @var mixed float, QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfRooms;

    /**
     * Indications regarding the permitted usage of the accommodation.
     * @var mixed string [schema.org types: Text]
     */
    public $permittedUsage;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     * @var mixed bool, string [schema.org types: Boolean, Text]
     */
    public $petsAllowed;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'amenityFeature',
                'floorSize',
                'numberOfRooms',
                'permittedUsage',
                'petsAllowed',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'amenityFeature' => ['LocationFeatureSpecification'],
                'floorSize' => ['QuantitativeValue'],
                'numberOfRooms' => ['Number','QuantitativeValue'],
                'permittedUsage' => ['Text'],
                'petsAllowed' => ['Boolean','Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
                'floorSize' => 'The size of the accommodation, e.g. in square meter or squarefoot. Typical unit code(s): MTK for square meter, FTK for square foot, or YDK for square yard',
                'numberOfRooms' => 'The number of rooms (excluding bathrooms and closets) of the acccommodation or lodging business. Typical unit code(s): ROM for room or C62 for no unit. The type of room can be put in the unitText property of the QuantitativeValue.',
                'permittedUsage' => 'Indications regarding the permitted usage of the accommodation.',
                'petsAllowed' => 'Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.',
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
                [['amenityFeature','floorSize','numberOfRooms','permittedUsage','petsAllowed',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MeetingRoom*/
