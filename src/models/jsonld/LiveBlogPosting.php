<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\BlogPosting;

/**
 * LiveBlogPosting - A blog post intended to provide a rolling textual
 * coverage of an ongoing event through continuous updates.
 * Extends: BlogPosting
 * @see    http://schema.org/LiveBlogPosting
 */
class LiveBlogPosting extends BlogPosting
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'LiveBlogPosting';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/LiveBlogPosting';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A blog post intended to provide a rolling textual coverage of an ongoing event through continuous updates.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'BlogPosting';

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
     * The time when the live blog will stop covering the Event. Note that
     * coverage may continue after the Event concludes.
     * @var DateTime [schema.org types: DateTime]
     */
    public $coverageEndTime;

    /**
     * The time when the live blog will begin covering the Event. Note that
     * coverage may begin before the Event's start time. The LiveBlogPosting may
     * also be created before coverage begins.
     * @var DateTime [schema.org types: DateTime]
     */
    public $coverageStartTime;

    /**
     * An update to the LiveBlog.
     * @var BlogPosting [schema.org types: BlogPosting]
     */
    public $liveBlogUpdate;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'coverageEndTime',
                'coverageStartTime',
                'liveBlogUpdate',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'coverageEndTime' => ['DateTime'],
                'coverageStartTime' => ['DateTime'],
                'liveBlogUpdate' => ['BlogPosting'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'coverageEndTime' => 'The time when the live blog will stop covering the Event. Note that coverage may continue after the Event concludes.',
                'coverageStartTime' => 'The time when the live blog will begin covering the Event. Note that coverage may begin before the Event\'s start time. The LiveBlogPosting may also be created before coverage begins.',
                'liveBlogUpdate' => 'An update to the LiveBlog.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
                'coverageEndTime',
                'coverageStartTime'
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['coverageEndTime','coverageStartTime','liveBlogUpdate',], 'validateJsonSchema'],
                [['coverageEndTime','coverageStartTime'], 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class LiveBlogPosting*/
