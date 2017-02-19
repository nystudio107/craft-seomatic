<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Comment - A comment on an item - for example, a comment on a blog post. The
 * comment's content is expressed via the text property, and its topic via
 * about, properties shared with all CreativeWorks.
 *
 * Extends: CreativeWork
 * @see    http://schema.org/Comment
 */
class Comment extends CreativeWork
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Comment';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Comment';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A comment on an item - for example, a comment on a blog post. The comment\'s content is expressed via the text property, and its topic via about, properties shared with all CreativeWorks.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * The number of downvotes this question, answer or comment has received from
     * the community.
     *
     * @var int [schema.org types: Integer]
     */
    public $downvoteCount;

    /**
     * The parent of a question, answer or item in general.
     *
     * @var Question [schema.org types: Question]
     */
    public $parentItem;

    /**
     * The number of upvotes this question, answer or comment has received from
     * the community.
     *
     * @var int [schema.org types: Integer]
     */
    public $upvoteCount;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'downvoteCount',
            'parentItem',
            'upvoteCount',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'downvoteCount' => ['Integer'],
            'parentItem' => ['Question'],
            'upvoteCount' => ['Integer'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'downvoteCount' => 'The number of downvotes this question, answer or comment has received from the community.',
            'parentItem' => 'The parent of a question, answer or item in general.',
            'upvoteCount' => 'The number of upvotes this question, answer or comment has received from the community.',
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
            [['downvoteCount','parentItem','upvoteCount',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
