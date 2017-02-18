<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\SocialMediaPosting;

/**
 * DiscussionForumPosting - A posting to a discussion forum.
 * Extends: SocialMediaPosting
 * @see    http://schema.org/DiscussionForumPosting
 */
class DiscussionForumPosting extends SocialMediaPosting
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'DiscussionForumPosting';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/DiscussionForumPosting';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A posting to a discussion forum.';

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
            ]);
        return $rules;
    } /* -- rules */

} /* -- class DiscussionForumPosting*/
