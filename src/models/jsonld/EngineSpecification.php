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

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * EngineSpecification - Information about the engine of the vehicle. A
 * vehicle can have multiple engines represented by multiple engine
 * specification entities.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/EngineSpecification
 */
class EngineSpecification extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'EngineSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/EngineSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Information about the engine of the vehicle. A vehicle can have multiple engines represented by multiple engine specification entities.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

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
     * The volume swept by all of the pistons inside the cylinders of an internal
     * combustion engine in a single movement. Typical unit code(s): CMQ for cubic
     * centimeter, LTR for liters, INQ for cubic inches * Note 1: You can link to
     * information about how the given value has been determined using the
     * valueReference property. * Note 2: You can use minValue and maxValue to
     * indicate ranges.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $engineDisplacement;

    /**
     * The power of the vehicle's engine. Typical unit code(s): KWT for kilowatt,
     * BHP for brake horsepower, N12 for metric horsepower (PS, with 1 PS =
     * 735,49875 W) Note 1: There are many different ways of measuring an engine's
     * power. For an overview, see
     * http://en.wikipedia.org/wiki/Horsepower#Enginepowertest_codes. Note 2: You
     * can link to information about how the given value has been determined using
     * the valueReference property. Note 3: You can use minValue and maxValue to
     * indicate ranges.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $enginePower;

    /**
     * The type of engine or engines powering the vehicle.
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $engineType;

    /**
     * The type of fuel suitable for the engine or engines of the vehicle. If the
     * vehicle has only one engine, this property can be attached directly to the
     * vehicle.
     *
     * @var mixed|QualitativeValue|string|string [schema.org types: QualitativeValue, Text, URL]
     */
    public $fuelType;

    /**
     * The torque (turning force) of the vehicle's engine. Typical unit code(s):
     * NU for newton metre (N m), F17 for pound-force per foot, or F48 for
     * pound-force per inch Note 1: You can link to information about how the
     * given value has been determined (e.g. reference RPM) using the
     * valueReference property. Note 2: You can use minValue and maxValue to
     * indicate ranges.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $torque;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'engineDisplacement',
        'enginePower',
        'engineType',
        'fuelType',
        'torque'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'engineDisplacement' => ['QuantitativeValue'],
        'enginePower' => ['QuantitativeValue'],
        'engineType' => ['QualitativeValue','Text','URL'],
        'fuelType' => ['QualitativeValue','Text','URL'],
        'torque' => ['QuantitativeValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'engineDisplacement' => 'The volume swept by all of the pistons inside the cylinders of an internal combustion engine in a single movement. Typical unit code(s): CMQ for cubic centimeter, LTR for liters, INQ for cubic inches * Note 1: You can link to information about how the given value has been determined using the valueReference property. * Note 2: You can use minValue and maxValue to indicate ranges.',
        'enginePower' => 'The power of the vehicle\'s engine. Typical unit code(s): KWT for kilowatt, BHP for brake horsepower, N12 for metric horsepower (PS, with 1 PS = 735,49875 W) Note 1: There are many different ways of measuring an engine\'s power. For an overview, see http://en.wikipedia.org/wiki/Horsepower#Enginepowertest_codes. Note 2: You can link to information about how the given value has been determined using the valueReference property. Note 3: You can use minValue and maxValue to indicate ranges.',
        'engineType' => 'The type of engine or engines powering the vehicle.',
        'fuelType' => 'The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.',
        'torque' => 'The torque (turning force) of the vehicle\'s engine. Typical unit code(s): NU for newton metre (N m), F17 for pound-force per foot, or F48 for pound-force per inch Note 1: You can link to information about how the given value has been determined (e.g. reference RPM) using the valueReference property. Note 2: You can use minValue and maxValue to indicate ranges.'
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
            [['engineDisplacement','enginePower','engineType','fuelType','torque'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
