<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Article;

/**
 * TechArticle - A technical article - Example: How-to (task) topics,
 * step-by-step, procedural troubleshooting, specifications, etc.
 * Extends: Article
 * @see    http://schema.org/TechArticle
 */
class TechArticle extends Article
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'TechArticle';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/TechArticle';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A technical article - Example: How-to (task) topics, step-by-step, procedural troubleshooting, specifications, etc.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Article';

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
     * Prerequisites needed to fulfill steps in article.
     * @var string [schema.org types: Text]
     */
    public $dependencies;

    /**
     * Proficiency needed for this content; expected values: 'Beginner', 'Expert'.
     * @var string [schema.org types: Text]
     */
    public $proficiencyLevel;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'dependencies',
                'proficiencyLevel',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'dependencies' => ['Text'],
                'proficiencyLevel' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'dependencies' => 'Prerequisites needed to fulfill steps in article.',
                'proficiencyLevel' => 'Proficiency needed for this content; expected values: \'Beginner\', \'Expert\'.',
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
                [['dependencies','proficiencyLevel',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class TechArticle*/
