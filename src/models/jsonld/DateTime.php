<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\DataType;

/**
 * DateTime - A combination of date and time of day in the form
 * [-]CCYY-MM-DDThh:mm:ss[Z|(+|-)hh:mm] (see Chapter 5.4 of ISO 8601).
 * Extends: DataType
 * @see    http://schema.org/DateTime
 */
class DateTime extends DataType
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'DateTime';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/DateTime';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A combination of date and time of day in the form [-]CCYY-MM-DDThh:mm:ss[Z|(+|-)hh:mm] (see Chapter 5.4 of ISO 8601).';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'DataType';

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

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
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
                [[], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class DateTime*/
