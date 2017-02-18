<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Audience - Intended audience for an item, i.e. the group for whom the item
 * was created.
 * Extends: Intangible
 * @see    http://schema.org/Audience
 */
class Audience extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Audience';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Audience';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Intended audience for an item, i.e. the group for whom the item was created.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

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
     * The target group associated with a given audience (e.g. veterans, car
     * owners, musicians, etc.).
     * @var string [schema.org types: Text]
     */
    public $audienceType;

    /**
     * The geographic area associated with the audience.
     * @var AdministrativeArea [schema.org types: AdministrativeArea]
     */
    public $geographicArea;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'audienceType',
                'geographicArea',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'audienceType' => ['Text'],
                'geographicArea' => ['AdministrativeArea'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'audienceType' => 'The target group associated with a given audience (e.g. veterans, car owners, musicians, etc.).',
                'geographicArea' => 'The geographic area associated with the audience.',
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
                [['audienceType','geographicArea',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Audience*/
