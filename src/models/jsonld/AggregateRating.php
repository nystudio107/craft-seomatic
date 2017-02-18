<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Rating;

/**
 * AggregateRating - The average rating based on multiple ratings or reviews.
 * Extends: Rating
 * @see    http://schema.org/AggregateRating
 */
class AggregateRating extends Rating
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'AggregateRating';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/AggregateRating';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The average rating based on multiple ratings or reviews.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Rating';

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
     * The item that is being reviewed/rated.
     * @var Thing [schema.org types: Thing]
     */
    public $itemReviewed;

    /**
     * The count of total number of ratings.
     * @var int [schema.org types: Integer]
     */
    public $ratingCount;

    /**
     * The count of total number of reviews.
     * @var int [schema.org types: Integer]
     */
    public $reviewCount;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'itemReviewed',
                'ratingCount',
                'reviewCount',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'itemReviewed' => ['Thing'],
                'ratingCount' => ['Integer'],
                'reviewCount' => ['Integer'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'itemReviewed' => 'The item that is being reviewed/rated.',
                'ratingCount' => 'The count of total number of ratings.',
                'reviewCount' => 'The count of total number of reviews.',
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
                [['itemReviewed','ratingCount','reviewCount',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class AggregateRating*/
