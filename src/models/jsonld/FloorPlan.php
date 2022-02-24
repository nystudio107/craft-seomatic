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

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * FloorPlan - A FloorPlan is an explicit representation of a collection of
 * similar accommodations, allowing the provision of common information (room
 * counts, sizes, layout diagrams) and offers for rental or sale. In typical
 * use, some ApartmentComplex has an accommodationFloorPlan which is a
 * FloorPlan. A FloorPlan is always in the context of a particular place,
 * either a larger ApartmentComplex or a single Apartment. The visual/spatial
 * aspects of a floor plan (i.e. room layout, see wikipedia) can be indicated
 * using image.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/FloorPlan
 */
class FloorPlan extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'FloorPlan';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/FloorPlan';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A FloorPlan is an explicit representation of a collection of similar accommodations, allowing the provision of common information (room counts, sizes, layout diagrams) and offers for rental or sale. In typical use, some ApartmentComplex has an accommodationFloorPlan which is a FloorPlan. A FloorPlan is always in the context of a particular place, either a larger ApartmentComplex or a single Apartment. The visual/spatial aspects of a floor plan (i.e. room layout, see wikipedia) can be indicated using image.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

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
        'amenityFeature',
        'floorSize',
        'isPlanForApartment',
        'numberOfAccommodationUnits',
        'numberOfAvailableAccommodationUnits',
        'numberOfBathroomsTotal',
        'numberOfBedrooms',
        'numberOfFullBathrooms',
        'numberOfPartialBathrooms',
        'numberOfRooms',
        'petsAllowed'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'amenityFeature' => ['LocationFeatureSpecification'],
        'floorSize' => ['QuantitativeValue'],
        'isPlanForApartment' => ['Accommodation'],
        'numberOfAccommodationUnits' => ['QuantitativeValue'],
        'numberOfAvailableAccommodationUnits' => ['QuantitativeValue'],
        'numberOfBathroomsTotal' => ['Integer'],
        'numberOfBedrooms' => ['Number', 'QuantitativeValue'],
        'numberOfFullBathrooms' => ['Number'],
        'numberOfPartialBathrooms' => ['Number'],
        'numberOfRooms' => ['Number', 'QuantitativeValue'],
        'petsAllowed' => ['Boolean', 'Text']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
        'floorSize' => 'The size of the accommodation, e.g. in square meter or squarefoot. Typical unit code(s): MTK for square meter, FTK for square foot, or YDK for square yard',
        'isPlanForApartment' => 'Indicates some accommodation that this floor plan describes.',
        'numberOfAccommodationUnits' => 'Indicates the total (available plus unavailable) number of accommodation units in an ApartmentComplex, or the number of accommodation units for a specific FloorPlan (within its specific ApartmentComplex). See also numberOfAvailableAccommodationUnits.',
        'numberOfAvailableAccommodationUnits' => 'Indicates the number of available accommodation units in an ApartmentComplex, or the number of accommodation units for a specific FloorPlan (within its specific ApartmentComplex). See also numberOfAccommodationUnits.',
        'numberOfBathroomsTotal' => 'The total integer number of bathrooms in a some Accommodation, following real estate conventions as documented in RESO: "The simple sum of the number of bathrooms. For example for a property with two Full Bathrooms and one Half Bathroom, the Bathrooms Total Integer will be 3.". See also numberOfRooms.',
        'numberOfBedrooms' => 'The total integer number of bedrooms in a some Accommodation, ApartmentComplex or FloorPlan.',
        'numberOfFullBathrooms' => 'Number of full bathrooms - The total number of full and ¾ bathrooms in an Accommodation. This corresponds to the BathroomsFull field in RESO.',
        'numberOfPartialBathrooms' => 'Number of partial bathrooms - The total number of half and ¼ bathrooms in an Accommodation. This corresponds to the BathroomsPartial field in RESO.',
        'numberOfRooms' => 'The number of rooms (excluding bathrooms and closets) of the accommodation or lodging business. Typical unit code(s): ROM for room or C62 for no unit. The type of room can be put in the unitText property of the QuantitativeValue.',
        'petsAllowed' => 'Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.'
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
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var LocationFeatureSpecification [schema.org types: LocationFeatureSpecification]
     */
    public $amenityFeature;
    /**
     * The size of the accommodation, e.g. in square meter or squarefoot. Typical
     * unit code(s): MTK for square meter, FTK for square foot, or YDK for square
     * yard
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $floorSize;
    /**
     * Indicates some accommodation that this floor plan describes.
     *
     * @var Accommodation [schema.org types: Accommodation]
     */
    public $isPlanForApartment;
    /**
     * Indicates the total (available plus unavailable) number of accommodation
     * units in an ApartmentComplex, or the number of accommodation units for a
     * specific FloorPlan (within its specific ApartmentComplex). See also
     * numberOfAvailableAccommodationUnits.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfAccommodationUnits;
    /**
     * Indicates the number of available accommodation units in an
     * ApartmentComplex, or the number of accommodation units for a specific
     * FloorPlan (within its specific ApartmentComplex). See also
     * numberOfAccommodationUnits.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfAvailableAccommodationUnits;
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

    // Static Protected Properties
    // =========================================================================
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
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var mixed|bool|string [schema.org types: Boolean, Text]
     */
    public $petsAllowed;

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
            [['amenityFeature', 'floorSize', 'isPlanForApartment', 'numberOfAccommodationUnits', 'numberOfAvailableAccommodationUnits', 'numberOfBathroomsTotal', 'numberOfBedrooms', 'numberOfFullBathrooms', 'numberOfPartialBathrooms', 'numberOfRooms', 'petsAllowed'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
