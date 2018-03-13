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
 * @since     3.0.0
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
     * The time needed to accelerate the vehicle from a given start velocity to a
     * given target velocity. Typical unit code(s): SEC for seconds Note: There
     * are unfortunately no standard unit codes for seconds/0..100 km/h or
     * seconds/0..60 mph. Simply use "SEC" for seconds and indicate the velocities
     * in the name of the QuantitativeValue, or use valueReference with a
     * QuantitativeValue of 0..60 mph or 0..100 km/h to specify the reference
     * speeds.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $accelerationTime;

    /**
     * Indicates the design and body style of the vehicle (e.g. station wagon,
     * hatchback, etc.).
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $bodyType;

    /**
     * The available volume for cargo or luggage. For automobiles, this is usually
     * the trunk volume. Typical unit code(s): LTR for liters, FTQ for cubic
     * foot/feet Note: You can use minValue and maxValue to indicate ranges.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $cargoVolume;

    /**
     * The date of the first registration of the vehicle with the respective
     * public authorities.
     *
     * @var mixed|Date [schema.org types: Date]
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
     * The CO2 emissions in g/km. When used in combination with a
     * QuantitativeValue, put "g/km" into the unitText property of that value,
     * since there is no UN/CEFACT Common Code for "g/km".
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $emissionsCO2;

    /**
     * The capacity of the fuel tank or in the case of electric cars, the battery.
     * If there are multiple components for storage, this should indicate the
     * total of all storage of the same type. Typical unit code(s): LTR for
     * liters, GLL of US gallons, GLI for UK / imperial gallons, AMH for
     * ampere-hours (for electrical vehicles).
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $fuelCapacity;

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
     * Indicates that the vehicle meets the respective emission standard.
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $meetsEmissionStandard;

    /**
     * The total distance travelled by the particular vehicle since its initial
     * production, as read from its odometer. Typical unit code(s): KMT for
     * kilometers, SMI for statute miles
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $mileageFromOdometer;

    /**
     * The release date of a vehicle model (often used to differentiate versions
     * of the same make and model).
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $modelDate;

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
     * The permitted weight of passengers and cargo, EXCLUDING the weight of the
     * empty vehicle. Typical unit code(s): KGM for kilogram, LBR for pound Note
     * 1: Many databases specify the permitted TOTAL weight instead, which is the
     * sum of weight and payload Note 2: You can indicate additional information
     * in the name of the QuantitativeValue node. Note 3: You may also link to a
     * QualitativeValue node that provides additional information using
     * valueReference. Note 4: Note that you can use minValue and maxValue to
     * indicate ranges.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $payload;

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
     * The number of persons that can be seated (e.g. in a vehicle), both in terms
     * of the physical space available, and in terms of limitations set by law.
     * Typical unit code(s): C62 for persons
     *
     * @var mixed|float|QuantitativeValue [schema.org types: Number, QuantitativeValue]
     */
    public $seatingCapacity;

    /**
     * The speed range of the vehicle. If the vehicle is powered by an engine, the
     * upper limit of the speed range (indicated by maxValue should be the maximum
     * speed achievable under regular conditions. Typical unit code(s): KMH for
     * km/h, HM for mile per hour (0.447 04 m/s), KNT for knot *Note 1: Use
     * minValue and maxValue to indicate the range. Typically, the minimal value
     * is zero. * Note 2: There are many different ways of measuring the speed
     * range. You can link to information about how the given value has been
     * determined using the valueReference property.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $speed;

    /**
     * The position of the steering wheel or similar device (mostly for cars).
     *
     * @var mixed|SteeringPositionValue [schema.org types: SteeringPositionValue]
     */
    public $steeringPosition;

    /**
     * The permitted vertical load (TWR) of a trailer attached to the vehicle.
     * Also referred to as Tongue Load Rating (TLR) or Vertical Load Rating (VLR)
     * Typical unit code(s): KGM for kilogram, LBR for pound Note 1: You can
     * indicate additional information in the name of the QuantitativeValue node.
     * Note 2: You may also link to a QualitativeValue node that provides
     * additional information using valueReference. Note 3: Note that you can use
     * minValue and maxValue to indicate ranges.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $tongueWeight;

    /**
     * The permitted weight of a trailer attached to the vehicle. Typical unit
     * code(s): KGM for kilogram, LBR for pound * Note 1: You can indicate
     * additional information in the name of the QuantitativeValue node. * Note 2:
     * You may also link to a QualitativeValue node that provides additional
     * information using valueReference. * Note 3: Note that you can use minValue
     * and maxValue to indicate ranges.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $trailerWeight;

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
     * @var mixed|CarUsageType|string [schema.org types: CarUsageType, Text]
     */
    public $vehicleSpecialUsage;

    /**
     * The type of component used for transmitting the power from a rotating power
     * source to the wheels or other relevant component(s) ("gearbox" for cars).
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $vehicleTransmission;

    /**
     * The permitted total weight of the loaded vehicle, including passengers and
     * cargo and the weight of the empty vehicle. Typical unit code(s): KGM for
     * kilogram, LBR for pound Note 1: You can indicate additional information in
     * the name of the QuantitativeValue node. Note 2: You may also link to a
     * QualitativeValue node that provides additional information using
     * valueReference. Note 3: Note that you can use minValue and maxValue to
     * indicate ranges.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $weightTotal;

    /**
     * The distance between the centers of the front and rear wheels. Typical unit
     * code(s): CMT for centimeters, MTR for meters, INH for inches, FOT for
     * foot/feet
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $wheelbase;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'accelerationTime',
        'bodyType',
        'cargoVolume',
        'dateVehicleFirstRegistered',
        'driveWheelConfiguration',
        'emissionsCO2',
        'fuelCapacity',
        'fuelConsumption',
        'fuelEfficiency',
        'fuelType',
        'knownVehicleDamages',
        'meetsEmissionStandard',
        'mileageFromOdometer',
        'modelDate',
        'numberOfAirbags',
        'numberOfAxles',
        'numberOfDoors',
        'numberOfForwardGears',
        'numberOfPreviousOwners',
        'payload',
        'productionDate',
        'purchaseDate',
        'seatingCapacity',
        'speed',
        'steeringPosition',
        'tongueWeight',
        'trailerWeight',
        'vehicleConfiguration',
        'vehicleEngine',
        'vehicleIdentificationNumber',
        'vehicleInteriorColor',
        'vehicleInteriorType',
        'vehicleModelDate',
        'vehicleSeatingCapacity',
        'vehicleSpecialUsage',
        'vehicleTransmission',
        'weightTotal',
        'wheelbase'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'accelerationTime' => ['QuantitativeValue'],
        'bodyType' => ['QualitativeValue','Text','URL'],
        'cargoVolume' => ['QuantitativeValue'],
        'dateVehicleFirstRegistered' => ['Date'],
        'driveWheelConfiguration' => ['DriveWheelConfigurationValue','Text'],
        'emissionsCO2' => ['Number'],
        'fuelCapacity' => ['QuantitativeValue'],
        'fuelConsumption' => ['QuantitativeValue'],
        'fuelEfficiency' => ['QuantitativeValue'],
        'fuelType' => ['QualitativeValue','Text','URL'],
        'knownVehicleDamages' => ['Text'],
        'meetsEmissionStandard' => ['QualitativeValue','Text','URL'],
        'mileageFromOdometer' => ['QuantitativeValue'],
        'modelDate' => ['Date'],
        'numberOfAirbags' => ['Number','Text'],
        'numberOfAxles' => ['Number','QuantitativeValue'],
        'numberOfDoors' => ['Number','QuantitativeValue'],
        'numberOfForwardGears' => ['Number','QuantitativeValue'],
        'numberOfPreviousOwners' => ['Number','QuantitativeValue'],
        'payload' => ['QuantitativeValue'],
        'productionDate' => ['Date'],
        'purchaseDate' => ['Date'],
        'seatingCapacity' => ['Number','QuantitativeValue'],
        'speed' => ['QuantitativeValue'],
        'steeringPosition' => ['SteeringPositionValue'],
        'tongueWeight' => ['QuantitativeValue'],
        'trailerWeight' => ['QuantitativeValue'],
        'vehicleConfiguration' => ['Text'],
        'vehicleEngine' => ['EngineSpecification'],
        'vehicleIdentificationNumber' => ['Text'],
        'vehicleInteriorColor' => ['Text'],
        'vehicleInteriorType' => ['Text'],
        'vehicleModelDate' => ['Date'],
        'vehicleSeatingCapacity' => ['Number','QuantitativeValue'],
        'vehicleSpecialUsage' => ['CarUsageType','Text'],
        'vehicleTransmission' => ['QualitativeValue','Text','URL'],
        'weightTotal' => ['QuantitativeValue'],
        'wheelbase' => ['QuantitativeValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'accelerationTime' => 'The time needed to accelerate the vehicle from a given start velocity to a given target velocity. Typical unit code(s): SEC for seconds Note: There are unfortunately no standard unit codes for seconds/0..100 km/h or seconds/0..60 mph. Simply use "SEC" for seconds and indicate the velocities in the name of the QuantitativeValue, or use valueReference with a QuantitativeValue of 0..60 mph or 0..100 km/h to specify the reference speeds.',
        'bodyType' => 'Indicates the design and body style of the vehicle (e.g. station wagon, hatchback, etc.).',
        'cargoVolume' => 'The available volume for cargo or luggage. For automobiles, this is usually the trunk volume. Typical unit code(s): LTR for liters, FTQ for cubic foot/feet Note: You can use minValue and maxValue to indicate ranges.',
        'dateVehicleFirstRegistered' => 'The date of the first registration of the vehicle with the respective public authorities.',
        'driveWheelConfiguration' => 'The drive wheel configuration, i.e. which roadwheels will receive torque from the vehicle\'s engine via the drivetrain.',
        'emissionsCO2' => 'The CO2 emissions in g/km. When used in combination with a QuantitativeValue, put "g/km" into the unitText property of that value, since there is no UN/CEFACT Common Code for "g/km".',
        'fuelCapacity' => 'The capacity of the fuel tank or in the case of electric cars, the battery. If there are multiple components for storage, this should indicate the total of all storage of the same type. Typical unit code(s): LTR for liters, GLL of US gallons, GLI for UK / imperial gallons, AMH for ampere-hours (for electrical vehicles).',
        'fuelConsumption' => 'The amount of fuel consumed for traveling a particular distance or temporal duration with the given vehicle (e.g. liters per 100 km). Note 1: There are unfortunately no standard unit codes for liters per 100 km. Use unitText to indicate the unit of measurement, e.g. L/100 km. Note 2: There are two ways of indicating the fuel consumption, fuelConsumption (e.g. 8 liters per 100 km) and fuelEfficiency (e.g. 30 miles per gallon). They are reciprocal. Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use valueReference to link the value for the fuel consumption to another value.',
        'fuelEfficiency' => 'The distance traveled per unit of fuel used; most commonly miles per gallon (mpg) or kilometers per liter (km/L). Note 1: There are unfortunately no standard unit codes for miles per gallon or kilometers per liter. Use unitText to indicate the unit of measurement, e.g. mpg or km/L. Note 2: There are two ways of indicating the fuel consumption, fuelConsumption (e.g. 8 liters per 100 km) and fuelEfficiency (e.g. 30 miles per gallon). They are reciprocal. Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use valueReference to link the value for the fuel economy to another value.',
        'fuelType' => 'The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.',
        'knownVehicleDamages' => 'A textual description of known damages, both repaired and unrepaired.',
        'meetsEmissionStandard' => 'Indicates that the vehicle meets the respective emission standard.',
        'mileageFromOdometer' => 'The total distance travelled by the particular vehicle since its initial production, as read from its odometer. Typical unit code(s): KMT for kilometers, SMI for statute miles',
        'modelDate' => 'The release date of a vehicle model (often used to differentiate versions of the same make and model).',
        'numberOfAirbags' => 'The number or type of airbags in the vehicle.',
        'numberOfAxles' => 'The number of axles. Typical unit code(s): C62',
        'numberOfDoors' => 'The number of doors. Typical unit code(s): C62',
        'numberOfForwardGears' => 'The total number of forward gears available for the transmission system of the vehicle. Typical unit code(s): C62',
        'numberOfPreviousOwners' => 'The number of owners of the vehicle, including the current one. Typical unit code(s): C62',
        'payload' => 'The permitted weight of passengers and cargo, EXCLUDING the weight of the empty vehicle. Typical unit code(s): KGM for kilogram, LBR for pound Note 1: Many databases specify the permitted TOTAL weight instead, which is the sum of weight and payload Note 2: You can indicate additional information in the name of the QuantitativeValue node. Note 3: You may also link to a QualitativeValue node that provides additional information using valueReference. Note 4: Note that you can use minValue and maxValue to indicate ranges.',
        'productionDate' => 'The date of production of the item, e.g. vehicle.',
        'purchaseDate' => 'The date the item e.g. vehicle was purchased by the current owner.',
        'seatingCapacity' => 'The number of persons that can be seated (e.g. in a vehicle), both in terms of the physical space available, and in terms of limitations set by law. Typical unit code(s): C62 for persons',
        'speed' => 'The speed range of the vehicle. If the vehicle is powered by an engine, the upper limit of the speed range (indicated by maxValue should be the maximum speed achievable under regular conditions. Typical unit code(s): KMH for km/h, HM for mile per hour (0.447 04 m/s), KNT for knot *Note 1: Use minValue and maxValue to indicate the range. Typically, the minimal value is zero. * Note 2: There are many different ways of measuring the speed range. You can link to information about how the given value has been determined using the valueReference property.',
        'steeringPosition' => 'The position of the steering wheel or similar device (mostly for cars).',
        'tongueWeight' => 'The permitted vertical load (TWR) of a trailer attached to the vehicle. Also referred to as Tongue Load Rating (TLR) or Vertical Load Rating (VLR) Typical unit code(s): KGM for kilogram, LBR for pound Note 1: You can indicate additional information in the name of the QuantitativeValue node. Note 2: You may also link to a QualitativeValue node that provides additional information using valueReference. Note 3: Note that you can use minValue and maxValue to indicate ranges.',
        'trailerWeight' => 'The permitted weight of a trailer attached to the vehicle. Typical unit code(s): KGM for kilogram, LBR for pound * Note 1: You can indicate additional information in the name of the QuantitativeValue node. * Note 2: You may also link to a QualitativeValue node that provides additional information using valueReference. * Note 3: Note that you can use minValue and maxValue to indicate ranges.',
        'vehicleConfiguration' => 'A short text indicating the configuration of the vehicle, e.g. \'5dr hatchback ST 2.5 MT 225 hp\' or \'limited edition\'.',
        'vehicleEngine' => 'Information about the engine or engines of the vehicle.',
        'vehicleIdentificationNumber' => 'The Vehicle Identification Number (VIN) is a unique serial number used by the automotive industry to identify individual motor vehicles.',
        'vehicleInteriorColor' => 'The color or color combination of the interior of the vehicle.',
        'vehicleInteriorType' => 'The type or material of the interior of the vehicle (e.g. synthetic fabric, leather, wood, etc.). While most interior types are characterized by the material used, an interior type can also be based on vehicle usage or target audience.',
        'vehicleModelDate' => 'The release date of a vehicle model (often used to differentiate versions of the same make and model).',
        'vehicleSeatingCapacity' => 'The number of passengers that can be seated in the vehicle, both in terms of the physical space available, and in terms of limitations set by law. Typical unit code(s): C62 for persons.',
        'vehicleSpecialUsage' => 'Indicates whether the vehicle has been used for special purposes, like commercial rental, driving school, or as a taxi. The legislation in many countries requires this information to be revealed when offering a car for sale.',
        'vehicleTransmission' => 'The type of component used for transmitting the power from a rotating power source to the wheels or other relevant component(s) ("gearbox" for cars).',
        'weightTotal' => 'The permitted total weight of the loaded vehicle, including passengers and cargo and the weight of the empty vehicle. Typical unit code(s): KGM for kilogram, LBR for pound Note 1: You can indicate additional information in the name of the QuantitativeValue node. Note 2: You may also link to a QualitativeValue node that provides additional information using valueReference. Note 3: Note that you can use minValue and maxValue to indicate ranges.',
        'wheelbase' => 'The distance between the centers of the front and rear wheels. Typical unit code(s): CMT for centimeters, MTR for meters, INH for inches, FOT for foot/feet'
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
            [['accelerationTime','bodyType','cargoVolume','dateVehicleFirstRegistered','driveWheelConfiguration','emissionsCO2','fuelCapacity','fuelConsumption','fuelEfficiency','fuelType','knownVehicleDamages','meetsEmissionStandard','mileageFromOdometer','modelDate','numberOfAirbags','numberOfAxles','numberOfDoors','numberOfForwardGears','numberOfPreviousOwners','payload','productionDate','purchaseDate','seatingCapacity','speed','steeringPosition','tongueWeight','trailerWeight','vehicleConfiguration','vehicleEngine','vehicleIdentificationNumber','vehicleInteriorColor','vehicleInteriorType','vehicleModelDate','vehicleSeatingCapacity','vehicleSpecialUsage','vehicleTransmission','weightTotal','wheelbase'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
