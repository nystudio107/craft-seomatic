<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Article;

/**
 * SocialMediaPosting - A post to a social media platform, including blog
 * posts, tweets, Facebook posts, etc.
 * Extends: Article
 * @see    http://schema.org/SocialMediaPosting
 */
class SocialMediaPosting extends Article
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SocialMediaPosting';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SocialMediaPosting';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A post to a social media platform, including blog posts, tweets, Facebook posts, etc.';

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
     * A CreativeWork such as an image, video, or audio clip shared as part of
     * this posting.
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $sharedContent;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'sharedContent',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'sharedContent' => ['CreativeWork'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'sharedContent' => 'A CreativeWork such as an image, video, or audio clip shared as part of this posting.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
                'datePublished',
                'headline',
                'image'
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
                [['sharedContent',], 'validateJsonSchema'],
                [['datePublished','headline','image'], 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SocialMediaPosting*/
