<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Comment;

/**
 * Answer - An answer offered to a question; perhaps correct, perhaps
 * opinionated or wrong.
 * Extends: Comment
 * @see    http://schema.org/Answer
 */
class Answer extends Comment
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Answer';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Answer';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An answer offered to a question; perhaps correct, perhaps opinionated or wrong.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Comment';

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
     * The number of downvotes this question, answer or comment has received from
     * the community.
     * @var int [schema.org types: Integer]
     */
    public $downvoteCount;

    /**
     * The parent of a question, answer or item in general.
     * @var Question [schema.org types: Question]
     */
    public $parentItem;

    /**
     * The number of upvotes this question, answer or comment has received from
     * the community.
     * @var int [schema.org types: Integer]
     */
    public $upvoteCount;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'downvoteCount',
                'parentItem',
                'upvoteCount',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'downvoteCount' => ['Integer'],
                'parentItem' => ['Question'],
                'upvoteCount' => ['Integer'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'downvoteCount' => 'The number of downvotes this question, answer or comment has received from the community.',
                'parentItem' => 'The parent of a question, answer or item in general.',
                'upvoteCount' => 'The number of upvotes this question, answer or comment has received from the community.',
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
                [['downvoteCount','parentItem','upvoteCount',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Answer*/
