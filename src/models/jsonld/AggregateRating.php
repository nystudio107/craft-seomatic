<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Rating;

/**
 * AggregateRating - The average rating based on multiple ratings or reviews.
 *
 * Extends: Rating
 * @see    http://schema.org/AggregateRating
 */
class AggregateRating extends Rating
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'AggregateRating';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/AggregateRating';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The average rating based on multiple ratings or reviews.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Rating';

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
     * The item that is being reviewed/rated.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $itemReviewed;

    /**
     * The count of total number of ratings.
     *
     * @var int [schema.org types: Integer]
     */
    public $ratingCount;

    /**
     * The count of total number of reviews.
     *
     * @var int [schema.org types: Integer]
     */
    public $reviewCount;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'itemReviewed',
            'ratingCount',
            'reviewCount',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'itemReviewed' => ['Thing'],
            'ratingCount' => ['Integer'],
            'reviewCount' => ['Integer'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'itemReviewed' => 'The item that is being reviewed/rated.',
            'ratingCount' => 'The count of total number of ratings.',
            'reviewCount' => 'The count of total number of reviews.',
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
            [['itemReviewed','ratingCount','reviewCount',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
