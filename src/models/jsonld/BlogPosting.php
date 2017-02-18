<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\SocialMediaPosting;

/**
 * BlogPosting - A blog post.
 * Extends: SocialMediaPosting
 * @see    http://schema.org/BlogPosting
 */
class BlogPosting extends SocialMediaPosting
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'BlogPosting';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/BlogPosting';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A blog post.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'SocialMediaPosting';

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
                'author',
                'datePublished',
                'headline',
                'image',
                'publisher'
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
                'dateModified',
                'mainEntityOfPage'
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['sharedContent',], 'validateJsonSchema'],
                [['author','datePublished','headline','image','publisher'], 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [['dateModified','mainEntityOfPage'], 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class BlogPosting*/
