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

use nystudio107\seomatic\models\jsonld\Residence;

/**
 * ApartmentComplex - Residence type: Apartment complex.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ApartmentComplex
 */
class ApartmentComplex extends Residence
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ApartmentComplex';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ApartmentComplex';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Residence type: Apartment complex.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Residence';

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
        'numberOfAccommodationUnits',
        'numberOfAvailableAccommodationUnits',
        'numberOfBedrooms',
        'petsAllowed',
        'tourBookingPage'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'numberOfAccommodationUnits' => ['QuantitativeValue'],
        'numberOfAvailableAccommodationUnits' => ['QuantitativeValue'],
        'numberOfBedrooms' => ['Number', 'QuantitativeValue'],
        'petsAllowed' => ['Boolean', 'Text'],
        'tourBookingPage' => ['URL']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'numberOfAccommodationUnits' => 'Indicates the total (available plus unavailable) number of accommodation units in an ApartmentComplex, or the number of accommodation units for a specific FloorPlan (within its specific ApartmentComplex). See also numberOfAvailableAccommodationUnits.',
        'numberOfAvailableAccommodationUnits' => 'Indicates the number of available accommodation units in an ApartmentComplex, or the number of accommodation units for a specific FloorPlan (within its specific ApartmentComplex). See also numberOfAccommodationUnits.',
        'numberOfBedrooms' => 'The total integer number of bedrooms in a some Accommodation, ApartmentComplex or FloorPlan.',
        'petsAllowed' => 'Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.',
        'tourBookingPage' => 'A page providing information on how to book a tour of some Place, such as an Accommodation or ApartmentComplex in a real estate setting, as well as other kinds of tours as appropriate.'
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

    // Static Protected Properties
    // =========================================================================
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
     * The total integer number of bedrooms in a some Accommodation,
     * ApartmentComplex or FloorPlan.
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfBedrooms;
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
            [['numberOfAccommodationUnits', 'numberOfAvailableAccommodationUnits', 'numberOfBedrooms', 'petsAllowed', 'tourBookingPage'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
