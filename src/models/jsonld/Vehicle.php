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

use nystudio107\seomatic\models\jsonld\Product;

/**
 * Vehicle - A vehicle is a device that is designed or used to transport
 * people or cargo over land, water, air, or through space.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     1.0.0
 * @see       http://schema.org/Vehicle
 */
class Vehicle extends Product
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Vehicle';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Vehicle';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A vehicle is a device that is designed or used to transport people or cargo over land, water, air, or through space.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Product';

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
     * The available volume for cargo or luggage. For automobiles, this is usually
     * the trunk volume. Typical unit code(s): LTR for liters, FTQ for cubic
     * foot/feet Note: You can use minValue and maxValue to indicate ranges.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $cargoVolume;

    /**
     * The date of the first registration of the vehicle with the respective
     * public authorities.
     *
     * @var Date [schema.org types: Date]
     */
    public $dateVehicleFirstRegistered;

    /**
     * The drive wheel configuration, i.e. which roadwheels will receive torque
     * from the vehicle's engine via the drivetrain.
     *
     * @var mixed|DriveWheelConfigurationValue|string [schema.org types: DriveWheelConfigurationValue, Text]
     */
    public $driveWheelConfiguration;

    /**
     * The amount of fuel consumed for traveling a particular distance or temporal
     * duration with the given vehicle (e.g. liters per 100 km). Note 1: There are
     * unfortunately no standard unit codes for liters per 100 km. Use unitText to
     * indicate the unit of measurement, e.g. L/100 km. Note 2: There are two ways
     * of indicating the fuel consumption, fuelConsumption (e.g. 8 liters per 100
     * km) and fuelEfficiency (e.g. 30 miles per gallon). They are reciprocal.
     * Note 3: Often, the absolute value is useful only when related to driving
     * speed ("at 80 km/h") or usage pattern ("city traffic"). You can use
     * valueReference to link the value for the fuel consumption to another value.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $fuelConsumption;

    /**
     * The distance traveled per unit of fuel used; most commonly miles per gallon
     * (mpg) or kilometers per liter (km/L). Note 1: There are unfortunately no
     * standard unit codes for miles per gallon or kilometers per liter. Use
     * unitText to indicate the unit of measurement, e.g. mpg or km/L. Note 2:
     * There are two ways of indicating the fuel consumption, fuelConsumption
     * (e.g. 8 liters per 100 km) and fuelEfficiency (e.g. 30 miles per gallon).
     * They are reciprocal. Note 3: Often, the absolute value is useful only when
     * related to driving speed ("at 80 km/h") or usage pattern ("city traffic").
     * You can use valueReference to link the value for the fuel economy to
     * another value.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $fuelEfficiency;

    /**
     * The type of fuel suitable for the engine or engines of the vehicle. If the
     * vehicle has only one engine, this property can be attached directly to the
     * vehicle.
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $fuelType;

    /**
     * A textual description of known damages, both repaired and unrepaired.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $knownVehicleDamages;

    /**
     * The total distance travelled by the particular vehicle since its initial
     * production, as read from its odometer. Typical unit code(s): KMT for
     * kilometers, SMI for statute miles
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $mileageFromOdometer;

    /**
     * The number or type of airbags in the vehicle.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $numberOfAirbags;

    /**
     * The number of axles. Typical unit code(s): C62
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfAxles;

    /**
     * The number of doors. Typical unit code(s): C62
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfDoors;

    /**
     * The total number of forward gears available for the transmission system of
     * the vehicle. Typical unit code(s): C62
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfForwardGears;

    /**
     * The number of owners of the vehicle, including the current one. Typical
     * unit code(s): C62
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $numberOfPreviousOwners;

    /**
     * The date of production of the item, e.g. vehicle.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $productionDate;

    /**
     * The date the item e.g. vehicle was purchased by the current owner.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $purchaseDate;

    /**
     * The position of the steering wheel or similar device (mostly for cars).
     *
     * @var mixed|SteeringPositionValue [schema.org types: SteeringPositionValue]
     */
    public $steeringPosition;

    /**
     * A short text indicating the configuration of the vehicle, e.g. '5dr
     * hatchback ST 2.5 MT 225 hp' or 'limited edition'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vehicleConfiguration;

    /**
     * Information about the engine or engines of the vehicle.
     *
     * @var mixed|EngineSpecification [schema.org types: EngineSpecification]
     */
    public $vehicleEngine;

    /**
     * The Vehicle Identification Number (VIN) is a unique serial number used by
     * the automotive industry to identify individual motor vehicles.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vehicleIdentificationNumber;

    /**
     * The color or color combination of the interior of the vehicle.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vehicleInteriorColor;

    /**
     * The type or material of the interior of the vehicle (e.g. synthetic fabric,
     * leather, wood, etc.). While most interior types are characterized by the
     * material used, an interior type can also be based on vehicle usage or
     * target audience.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vehicleInteriorType;

    /**
     * The release date of a vehicle model (often used to differentiate versions
     * of the same make and model).
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $vehicleModelDate;

    /**
     * The number of passengers that can be seated in the vehicle, both in terms
     * of the physical space available, and in terms of limitations set by law.
     * Typical unit code(s): C62 for persons.
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $vehicleSeatingCapacity;

    /**
     * Indicates whether the vehicle has been used for special purposes, like
     * commercial rental, driving school, or as a taxi. The legislation in many
     * countries requires this information to be revealed when offering a car for
     * sale.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vehicleSpecialUsage;

    /**
     * The type of component used for transmitting the power from a rotating power
     * source to the wheels or other relevant component(s) ("gearbox" for cars).
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $vehicleTransmission;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'cargoVolume',
        'dateVehicleFirstRegistered',
        'driveWheelConfiguration',
        'fuelConsumption',
        'fuelEfficiency',
        'fuelType',
        'knownVehicleDamages',
        'mileageFromOdometer',
        'numberOfAirbags',
        'numberOfAxles',
        'numberOfDoors',
        'numberOfForwardGears',
        'numberOfPreviousOwners',
        'productionDate',
        'purchaseDate',
        'steeringPosition',
        'vehicleConfiguration',
        'vehicleEngine',
        'vehicleIdentificationNumber',
        'vehicleInteriorColor',
        'vehicleInteriorType',
        'vehicleModelDate',
        'vehicleSeatingCapacity',
        'vehicleSpecialUsage',
        'vehicleTransmission'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'cargoVolume' => ['QuantitativeValue'],
        'dateVehicleFirstRegistered' => ['Date'],
        'driveWheelConfiguration' => ['DriveWheelConfigurationValue','Text'],
        'fuelConsumption' => ['QuantitativeValue'],
        'fuelEfficiency' => ['QuantitativeValue'],
        'fuelType' => ['QualitativeValue','Text','URL'],
        'knownVehicleDamages' => ['Text'],
        'mileageFromOdometer' => ['QuantitativeValue'],
        'numberOfAirbags' => ['Number','Text'],
        'numberOfAxles' => ['Number','QuantitativeValue'],
        'numberOfDoors' => ['Number','QuantitativeValue'],
        'numberOfForwardGears' => ['Number','QuantitativeValue'],
        'numberOfPreviousOwners' => ['Number','QuantitativeValue'],
        'productionDate' => ['Date'],
        'purchaseDate' => ['Date'],
        'steeringPosition' => ['SteeringPositionValue'],
        'vehicleConfiguration' => ['Text'],
        'vehicleEngine' => ['EngineSpecification'],
        'vehicleIdentificationNumber' => ['Text'],
        'vehicleInteriorColor' => ['Text'],
        'vehicleInteriorType' => ['Text'],
        'vehicleModelDate' => ['Date'],
        'vehicleSeatingCapacity' => ['Number','QuantitativeValue'],
        'vehicleSpecialUsage' => ['Text'],
        'vehicleTransmission' => ['QualitativeValue','Text','URL']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'cargoVolume' => 'The available volume for cargo or luggage. For automobiles, this is usually the trunk volume. Typical unit code(s): LTR for liters, FTQ for cubic foot/feet Note: You can use minValue and maxValue to indicate ranges.',
        'dateVehicleFirstRegistered' => 'The date of the first registration of the vehicle with the respective public authorities.',
        'driveWheelConfiguration' => 'The drive wheel configuration, i.e. which roadwheels will receive torque from the vehicle\'s engine via the drivetrain.',
        'fuelConsumption' => 'The amount of fuel consumed for traveling a particular distance or temporal duration with the given vehicle (e.g. liters per 100 km). Note 1: There are unfortunately no standard unit codes for liters per 100 km. Use unitText to indicate the unit of measurement, e.g. L/100 km. Note 2: There are two ways of indicating the fuel consumption, fuelConsumption (e.g. 8 liters per 100 km) and fuelEfficiency (e.g. 30 miles per gallon). They are reciprocal. Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use valueReference to link the value for the fuel consumption to another value.',
        'fuelEfficiency' => 'The distance traveled per unit of fuel used; most commonly miles per gallon (mpg) or kilometers per liter (km/L). Note 1: There are unfortunately no standard unit codes for miles per gallon or kilometers per liter. Use unitText to indicate the unit of measurement, e.g. mpg or km/L. Note 2: There are two ways of indicating the fuel consumption, fuelConsumption (e.g. 8 liters per 100 km) and fuelEfficiency (e.g. 30 miles per gallon). They are reciprocal. Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use valueReference to link the value for the fuel economy to another value.',
        'fuelType' => 'The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.',
        'knownVehicleDamages' => 'A textual description of known damages, both repaired and unrepaired.',
        'mileageFromOdometer' => 'The total distance travelled by the particular vehicle since its initial production, as read from its odometer. Typical unit code(s): KMT for kilometers, SMI for statute miles',
        'numberOfAirbags' => 'The number or type of airbags in the vehicle.',
        'numberOfAxles' => 'The number of axles. Typical unit code(s): C62',
        'numberOfDoors' => 'The number of doors. Typical unit code(s): C62',
        'numberOfForwardGears' => 'The total number of forward gears available for the transmission system of the vehicle. Typical unit code(s): C62',
        'numberOfPreviousOwners' => 'The number of owners of the vehicle, including the current one. Typical unit code(s): C62',
        'productionDate' => 'The date of production of the item, e.g. vehicle.',
        'purchaseDate' => 'The date the item e.g. vehicle was purchased by the current owner.',
        'steeringPosition' => 'The position of the steering wheel or similar device (mostly for cars).',
        'vehicleConfiguration' => 'A short text indicating the configuration of the vehicle, e.g. \'5dr hatchback ST 2.5 MT 225 hp\' or \'limited edition\'.',
        'vehicleEngine' => 'Information about the engine or engines of the vehicle.',
        'vehicleIdentificationNumber' => 'The Vehicle Identification Number (VIN) is a unique serial number used by the automotive industry to identify individual motor vehicles.',
        'vehicleInteriorColor' => 'The color or color combination of the interior of the vehicle.',
        'vehicleInteriorType' => 'The type or material of the interior of the vehicle (e.g. synthetic fabric, leather, wood, etc.). While most interior types are characterized by the material used, an interior type can also be based on vehicle usage or target audience.',
        'vehicleModelDate' => 'The release date of a vehicle model (often used to differentiate versions of the same make and model).',
        'vehicleSeatingCapacity' => 'The number of passengers that can be seated in the vehicle, both in terms of the physical space available, and in terms of limitations set by law. Typical unit code(s): C62 for persons.',
        'vehicleSpecialUsage' => 'Indicates whether the vehicle has been used for special purposes, like commercial rental, driving school, or as a taxi. The legislation in many countries requires this information to be revealed when offering a car for sale.',
        'vehicleTransmission' => 'The type of component used for transmitting the power from a rotating power source to the wheels or other relevant component(s) ("gearbox" for cars).'
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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
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
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['cargoVolume','dateVehicleFirstRegistered','driveWheelConfiguration','fuelConsumption','fuelEfficiency','fuelType','knownVehicleDamages','mileageFromOdometer','numberOfAirbags','numberOfAxles','numberOfDoors','numberOfForwardGears','numberOfPreviousOwners','productionDate','purchaseDate','steeringPosition','vehicleConfiguration','vehicleEngine','vehicleIdentificationNumber','vehicleInteriorColor','vehicleInteriorType','vehicleModelDate','vehicleSeatingCapacity','vehicleSpecialUsage','vehicleTransmission'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
