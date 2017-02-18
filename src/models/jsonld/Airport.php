<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CivicStructure;

/**
 * Airport - An airport.
 * Extends: CivicStructure
 * @see    http://schema.org/Airport
 */
class Airport extends CivicStructure
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Airport';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Airport';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An airport.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CivicStructure';

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
     * IATA identifier for an airline or airport.
     * @var string [schema.org types: Text]
     */
    public $iataCode;

    /**
     * ICAO identifier for an airport.
     * @var string [schema.org types: Text]
     */
    public $icaoCode;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'iataCode',
                'icaoCode',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'iataCode' => ['Text'],
                'icaoCode' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'iataCode' => 'IATA identifier for an airline or airport.',
                'icaoCode' => 'ICAO identifier for an airport.',
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
                [['iataCode','icaoCode',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Airport*/
