<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\EducationalOrganization;

/**
 * MiddleSchool - A middle school (typically for children aged around 11-14,
 * although this varies somewhat).
 * Extends: EducationalOrganization
 * @see    http://schema.org/MiddleSchool
 */
class MiddleSchool extends EducationalOrganization
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MiddleSchool';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MiddleSchool';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A middle school (typically for children aged around 11-14, although this varies somewhat).';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'EducationalOrganization';

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
     * Alumni of an organization. Inverse property: alumniOf.
     * @var Person [schema.org types: Person]
     */
    public $alumni;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'alumni',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'alumni' => ['Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'alumni' => 'Alumni of an organization. Inverse property: alumniOf.',
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
                [['alumni',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MiddleSchool*/
