<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Accommodation;

/**
 * CampingPitch - A CampingPitch is an individual place for overnight stay in
 * the outdoors, typically being part of a larger camping site, or Campground.
 * In British English a campsite, or campground, is an area, usually divided
 * into a number of pitches, where people can camp overnight using tents or
 * camper vans or caravans; this British English use of the word is synonymous
 * with the American English expression campground. In American English the
 * term campsite generally means an area where an individual, family, group,
 * or military unit can pitch a tent or park a camper; a campground may
 * contain many campsites. (Source: Wikipedia see
 * https://en.wikipedia.org/wiki/Campsite). See also the dedicated document on
 * the use of schema.org for marking up hotels and other forms of
 * accommodations.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/CampingPitch
 */
class CampingPitch extends Accommodation
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'CampingPitch';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/CampingPitch';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A CampingPitch is an individual place for overnight stay in the outdoors, typically being part of a larger camping site, or Campground. In British English a campsite, or campground, is an area, usually divided into a number of pitches, where people can camp overnight using tents or camper vans or caravans; this British English use of the word is synonymous with the American English expression campground. In American English the term campsite generally means an area where an individual, family, group, or military unit can pitch a tent or park a camper; a campground may contain many campsites. (Source: Wikipedia see https://en.wikipedia.org/wiki/Campsite). See also the dedicated document on the use of schema.org for marking up hotels and other forms of accommodations.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Accommodation';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'accommodationCategory',
        'accommodationFloorPlan',
        'amenityFeature',
        'floorLevel',
        'floorSize',
        'leaseLength',
        'numberOfBathroomsTotal',
        'numberOfBedrooms',
        'numberOfFullBathrooms',
        'numberOfPartialBathrooms',
        'numberOfRooms',
        'permittedUsage',
        'petsAllowed',
        'tourBookingPage',
        'yearBuilt'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'accommodationCategory' => ['Text'],
        'accommodationFloorPlan' => ['FloorPlan'],
        'amenityFeature' => ['LocationFeatureSpecification'],
        'floorLevel' => ['Text'],
        'floorSize' => ['QuantitativeValue'],
        'leaseLength' => ['Duration', 'QuantitativeValue'],
        'numberOfBathroomsTotal' => ['Integer'],
        'numberOfBedrooms' => ['Number', 'QuantitativeValue'],
        'numberOfFullBathrooms' => ['Number'],
        'numberOfPartialBathrooms' => ['Number'],
        'numberOfRooms' => ['Number', 'QuantitativeValue'],
        'permittedUsage' => ['Text'],
        'petsAllowed' => ['Boolean', 'Text'],
        'tourBookingPage' => ['URL'],
        'yearBuilt' => ['Number']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'accommodationCategory' => 'Category of an Accommodation, following real estate conventions e.g. RESO (see PropertySubType, and PropertyType fields for suggested values).',
        'accommodationFloorPlan' => 'A floorplan of some Accommodation.',
        'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
        'floorLevel' => 'The floor level for an Accommodation in a multi-storey building. Since counting systems vary internationally, the local system should be used where possible.',
        'floorSize' => 'The size of the accommodation, e.g. in square meter or squarefoot. Typical unit code(s): MTK for square meter, FTK for square foot, or YDK for square yard',
        'leaseLength' => 'Length of the lease for some Accommodation, either particular to some Offer or in some cases intrinsic to the property.',
        'numberOfBathroomsTotal' => 'The total integer number of bathrooms in a some Accommodation, following real estate conventions as documented in RESO: "The simple sum of the number of bathrooms. For example for a property with two Full Bathrooms and one Half Bathroom, the Bathrooms Total Integer will be 3.". See also numberOfRooms.',
        'numberOfBedrooms' => 'The total integer number of bedrooms in a some Accommodation, ApartmentComplex or FloorPlan.',
        'numberOfFullBathrooms' => 'Number of full bathrooms - The total number of full and ¾ bathrooms in an Accommodation. This corresponds to the BathroomsFull field in RESO.',
        'numberOfPartialBathrooms' => 'Number of partial bathrooms - The total number of half and ¼ bathrooms in an Accommodation. This corresponds to the BathroomsPartial field in RESO.',
        'numberOfRooms' => 'The number of rooms (excluding bathrooms and closets) of the accommodation or lodging business. Typical unit code(s): ROM for room or C62 for no unit. The type of room can be put in the unitText property of the QuantitativeValue.',
        'permittedUsage' => 'Indications regarding the permitted usage of the accommodation.',
        'petsAllowed' => 'Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.',
        'tourBookingPage' => 'A page providing information on how to book a tour of some Place, such as an Accommodation or ApartmentComplex in a real estate setting, as well as other kinds of tours as appropriate.',
        'yearBuilt' => 'The year an Accommodation was constructed. This corresponds to the YearBuilt field in RESO.'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];
    /**
     * Category of an Accommodation, following real estate conventions e.g. RESO
     * (see PropertySubType, and PropertyType fields for suggested values).
     *
     * @var string [schema.org types: Text]
     */
    public $accommodationCategory;
    /**
     * A floorplan of some Accommodation.
     *
     * @var FloorPlan [schema.org types: FloorPlan]
     */
    public $accommodationFloorPlan;
    /**
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var LocationFeatureSpecification [schema.org types: LocationFeatureSpecification]
     */
    public $amenityFeature;
    /**
     * The floor level for an Accommodation in a multi-storey building. Since
     * counting systems vary internationally, the local system should be used
     * where possible.
     *
     * @var string [schema.org types: Text]
     */
    public $floorLevel;
    /**
     * The size of the accommodation, e.g. in square meter or squarefoot. Typical
     * unit code(s): MTK for square meter, FTK for square foot, or YDK for square
     * yard
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $floorSize;
    /**
     * Length of the lease for some Accommodation, either particular to some Offer
     * or in some cases intrinsic to the property.
     *
     * @var mixed|Duration|QuantitativeValue [schema.org types: Duration, QuantitativeValue]
     */
    public $leaseLength;
    /**
     * The total integer number of bathrooms in a some Accommodation, following
     * real estate conventions as documented in RESO: "The simple sum of the
     * number of bathrooms. For example for a property with two Full Bathrooms and
     * one Half Bathroom, the Bathrooms Total Integer will be 3.". See also
     * numberOfRooms.
     *
     * @var int [schema.org types: Integer]
     */
    public $numberOfBathroomsTotal;
    /**
     * The total integer number of bedrooms in a some Accommodation,
     * ApartmentComplex or FloorPlan.
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfBedrooms;
    /**
     * Number of full bathrooms - The total number of full and ¾ bathrooms in an
     * Accommodation. This corresponds to the BathroomsFull field in RESO.
     *
     * @var float [schema.org types: Number]
     */
    public $numberOfFullBathrooms;
    /**
     * Number of partial bathrooms - The total number of half and ¼ bathrooms in
     * an Accommodation. This corresponds to the BathroomsPartial field in RESO.
     *
     * @var float [schema.org types: Number]
     */
    public $numberOfPartialBathrooms;

    // Static Protected Properties
    // =========================================================================
    /**
     * The number of rooms (excluding bathrooms and closets) of the accommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfRooms;
    /**
     * Indications regarding the permitted usage of the accommodation.
     *
     * @var string [schema.org types: Text]
     */
    public $permittedUsage;
    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var mixed|bool|string [schema.org types: Boolean, Text]
     */
    public $petsAllowed;
    /**
     * A page providing information on how to book a tour of some Place, such as
     * an Accommodation or ApartmentComplex in a real estate setting, as well as
     * other kinds of tours as appropriate.
     *
     * @var string [schema.org types: URL]
     */
    public $tourBookingPage;
    /**
     * The year an Accommodation was constructed. This corresponds to the
     * YearBuilt field in RESO.
     *
     * @var float [schema.org types: Number]
     */
    public $yearBuilt;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['accommodationCategory', 'accommodationFloorPlan', 'amenityFeature', 'floorLevel', 'floorSize', 'leaseLength', 'numberOfBathroomsTotal', 'numberOfBedrooms', 'numberOfFullBathrooms', 'numberOfPartialBathrooms', 'numberOfRooms', 'permittedUsage', 'petsAllowed', 'tourBookingPage', 'yearBuilt'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
