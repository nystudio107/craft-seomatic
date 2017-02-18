<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Rating - A rating is an evaluation on a numeric scale, such as 1 to 5
 * stars.
 * Extends: Intangible
 * @see    http://schema.org/Rating
 */
class Rating extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Rating';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Rating';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A rating is an evaluation on a numeric scale, such as 1 to 5 stars.';

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
     * The author of this content or rating. Please note that author is special in
     * that HTML 5 provides a special mechanism for indicating authorship via the
     * rel tag. That is equivalent to this and may be used interchangeably.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $author;

    /**
     * The highest value allowed in this rating system. If bestRating is omitted,
     * 5 is assumed.
     * @var mixed float, string [schema.org types: Number, Text]
     */
    public $bestRating;

    /**
     * The rating for the content.
     * @var mixed float, string [schema.org types: Number, Text]
     */
    public $ratingValue;

    /**
     * The lowest value allowed in this rating system. If worstRating is omitted,
     * 1 is assumed.
     * @var mixed float, string [schema.org types: Number, Text]
     */
    public $worstRating;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'author',
                'bestRating',
                'ratingValue',
                'worstRating',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'author' => ['Organization','Person'],
                'bestRating' => ['Number','Text'],
                'ratingValue' => ['Number','Text'],
                'worstRating' => ['Number','Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'author' => 'The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.',
                'bestRating' => 'The highest value allowed in this rating system. If bestRating is omitted, 5 is assumed.',
                'ratingValue' => 'The rating for the content.',
                'worstRating' => 'The lowest value allowed in this rating system. If worstRating is omitted, 1 is assumed.',
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
                [['author','bestRating','ratingValue','worstRating',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Rating*/
