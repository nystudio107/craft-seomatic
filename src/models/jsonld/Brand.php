<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Brand - A brand is a name used by an organization or business person for
 * labeling a product, product group, or similar.
 * Extends: Intangible
 * @see    http://schema.org/Brand
 */
class Brand extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Brand';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Brand';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A brand is a name used by an organization or business person for labeling a product, product group, or similar.';

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
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;

    /**
     * An associated logo.
     * @var mixed ImageObject, string [schema.org types: ImageObject, URL]
     */
    public $logo;

    /**
     * A review of the item. Supersedes reviews.
     * @var mixed Review [schema.org types: Review]
     */
    public $review;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'aggregateRating',
                'logo',
                'review',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'aggregateRating' => ['AggregateRating'],
                'logo' => ['ImageObject','URL'],
                'review' => ['Review'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
                'logo' => 'An associated logo.',
                'review' => 'A review of the item. Supersedes reviews.',
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
                [['aggregateRating','logo','review',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Brand*/
