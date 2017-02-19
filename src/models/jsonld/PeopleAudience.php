<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Audience;

/**
 * PeopleAudience - A set of characteristics belonging to people, e.g. who
 * compose an item's target audience.
 *
 * Extends: Audience
 * @see    http://schema.org/PeopleAudience
 */
class PeopleAudience extends Audience
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PeopleAudience';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PeopleAudience';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A set of characteristics belonging to people, e.g. who compose an item\'s target audience.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Audience';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * Audiences defined by a person's gender.
     *
     * @var string [schema.org types: Text]
     */
    public $requiredGender;

    /**
     * Audiences defined by a person's maximum age.
     *
     * @var int [schema.org types: Integer]
     */
    public $requiredMaxAge;

    /**
     * Audiences defined by a person's minimum age.
     *
     * @var int [schema.org types: Integer]
     */
    public $requiredMinAge;

    /**
     * The gender of the person or audience.
     *
     * @var string [schema.org types: Text]
     */
    public $suggestedGender;

    /**
     * Maximal age recommended for viewing content.
     *
     * @var float [schema.org types: Number]
     */
    public $suggestedMaxAge;

    /**
     * Minimal age recommended for viewing content.
     *
     * @var float [schema.org types: Number]
     */
    public $suggestedMinAge;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'requiredGender',
            'requiredMaxAge',
            'requiredMinAge',
            'suggestedGender',
            'suggestedMaxAge',
            'suggestedMinAge',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'requiredGender' => ['Text'],
            'requiredMaxAge' => ['Integer'],
            'requiredMinAge' => ['Integer'],
            'suggestedGender' => ['Text'],
            'suggestedMaxAge' => ['Number'],
            'suggestedMinAge' => ['Number'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'requiredGender' => 'Audiences defined by a person\'s gender.',
            'requiredMaxAge' => 'Audiences defined by a person\'s maximum age.',
            'requiredMinAge' => 'Audiences defined by a person\'s minimum age.',
            'suggestedGender' => 'The gender of the person or audience.',
            'suggestedMaxAge' => 'Maximal age recommended for viewing content.',
            'suggestedMinAge' => 'Minimal age recommended for viewing content.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['requiredGender','requiredMaxAge','requiredMinAge','suggestedGender','suggestedMaxAge','suggestedMinAge',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
