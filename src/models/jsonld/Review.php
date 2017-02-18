<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Review - A review of an item - for example, of a restaurant, movie, or
 * store.
 * Extends: CreativeWork
 * @see    http://schema.org/Review
 */
class Review extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Review';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Review';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A review of an item - for example, of a restaurant, movie, or store.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

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
     * The actual body of the review.
     * @var string [schema.org types: Text]
     */
    public $reviewBody;

    /**
     * The rating given in this review. Note that reviews can themselves be rated.
     * The reviewRating applies to rating given by the review. The aggregateRating
     * property applies to the review itself, as a creative work.
     * @var Rating [schema.org types: Rating]
     */
    public $reviewRating;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'itemReviewed',
                'reviewBody',
                'reviewRating',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'itemReviewed' => ['Thing'],
                'reviewBody' => ['Text'],
                'reviewRating' => ['Rating'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'itemReviewed' => 'The item that is being reviewed/rated.',
                'reviewBody' => 'The actual body of the review.',
                'reviewRating' => 'The rating given in this review. Note that reviews can themselves be rated. The reviewRating applies to rating given by the review. The aggregateRating property applies to the review itself, as a creative work.',
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
                [['itemReviewed','reviewBody','reviewRating',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Review*/
