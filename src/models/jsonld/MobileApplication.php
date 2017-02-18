<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\SoftwareApplication;

/**
 * MobileApplication - A software application designed specifically to work
 * well on a mobile device such as a telephone.
 * Extends: SoftwareApplication
 * @see    http://schema.org/MobileApplication
 */
class MobileApplication extends SoftwareApplication
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MobileApplication';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MobileApplication';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A software application designed specifically to work well on a mobile device such as a telephone.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'SoftwareApplication';

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
     * Specifies specific carrier(s) requirements for the application (e.g. an
     * application may only work on a specific carrier network).
     * @var string [schema.org types: Text]
     */
    public $carrierRequirements;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'carrierRequirements',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'carrierRequirements' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'carrierRequirements' => 'Specifies specific carrier(s) requirements for the application (e.g. an application may only work on a specific carrier network).',
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
                [['carrierRequirements',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MobileApplication*/
