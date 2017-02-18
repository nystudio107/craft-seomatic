<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Service;

/**
 * GovernmentService - A service provided by a government organization, e.g.
 * food stamps, veterans benefits, etc.
 * Extends: Service
 * @see    http://schema.org/GovernmentService
 */
class GovernmentService extends Service
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'GovernmentService';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/GovernmentService';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A service provided by a government organization, e.g. food stamps, veterans benefits, etc.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Service';

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
     * The operating organization, if different from the provider. This enables
     * the representation of services that are provided by an organization, but
     * operated by another organization like a subcontractor.
     * @var Organization [schema.org types: Organization]
     */
    public $serviceOperator;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'serviceOperator',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'serviceOperator' => ['Organization'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'serviceOperator' => 'The operating organization, if different from the provider. This enables the representation of services that are provided by an organization, but operated by another organization like a subcontractor.',
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
                [['serviceOperator',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class GovernmentService*/
