<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * EngineSpecification - Information about the engine of the vehicle. A
 * vehicle can have multiple engines represented by multiple engine
 * specification entities.
 * Extends: StructuredValue
 * @see    http://schema.org/EngineSpecification
 */
class EngineSpecification extends StructuredValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'EngineSpecification';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/EngineSpecification';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Information about the engine of the vehicle. A vehicle can have multiple engines represented by multiple engine specification entities.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'StructuredValue';

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
     * The type of fuel suitable for the engine or engines of the vehicle. If the
     * vehicle has only one engine, this property can be attached directly to the
     * vehicle.
     * @var mixed QualitativeValue, string, string [schema.org types: QualitativeValue, Text, URL]
     */
    public $fuelType;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'fuelType',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'fuelType' => ['QualitativeValue','Text','URL'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'fuelType' => 'The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.',
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
                [['fuelType',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class EngineSpecification*/
