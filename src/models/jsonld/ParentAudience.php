<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PeopleAudience;

/**
 * ParentAudience - A set of characteristics describing parents, who can be
 * interested in viewing some content.
 * Extends: PeopleAudience
 * @see    http://schema.org/ParentAudience
 */
class ParentAudience extends PeopleAudience
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ParentAudience';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ParentAudience';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A set of characteristics describing parents, who can be interested in viewing some content.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'PeopleAudience';

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
     * Maximal age of the child.
     * @var float [schema.org types: Number]
     */
    public $childMaxAge;

    /**
     * Minimal age of the child.
     * @var float [schema.org types: Number]
     */
    public $childMinAge;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'childMaxAge',
                'childMinAge',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'childMaxAge' => ['Number'],
                'childMinAge' => ['Number'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'childMaxAge' => 'Maximal age of the child.',
                'childMinAge' => 'Minimal age of the child.',
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
                [['childMaxAge','childMinAge',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ParentAudience*/
