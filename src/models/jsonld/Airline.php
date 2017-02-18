<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Organization;

/**
 * Airline - An organization that provides flights for passengers.
 * Extends: Organization
 * @see    http://schema.org/Airline
 */
class Airline extends Organization
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Airline';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Airline';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An organization that provides flights for passengers.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Organization';

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
     * The type of boarding policy used by the airline (e.g. zone-based or
     * group-based).
     * @var BoardingPolicyType [schema.org types: BoardingPolicyType]
     */
    public $boardingPolicy;

    /**
     * IATA identifier for an airline or airport.
     * @var string [schema.org types: Text]
     */
    public $iataCode;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'boardingPolicy',
                'iataCode',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'boardingPolicy' => ['BoardingPolicyType'],
                'iataCode' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'boardingPolicy' => 'The type of boarding policy used by the airline (e.g. zone-based or group-based).',
                'iataCode' => 'IATA identifier for an airline or airport.',
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
                [['boardingPolicy','iataCode',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Airline*/
