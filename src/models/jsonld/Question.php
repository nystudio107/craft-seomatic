<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Question - A specific question - e.g. from a user seeking answers online,
 * or collected in a Frequently Asked Questions (FAQ) document.
 * Extends: CreativeWork
 * @see    http://schema.org/Question
 */
class Question extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Question';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Question';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A specific question - e.g. from a user seeking answers online, or collected in a Frequently Asked Questions (FAQ) document.';

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
     * The answer that has been accepted as best, typically on a Question/Answer
     * site. Sites vary in their selection mechanisms, e.g. drawing on community
     * opinion and/or the view of the Question author.
     * @var Answer [schema.org types: Answer]
     */
    public $acceptedAnswer;

    /**
     * The number of answers this question has received.
     * @var int [schema.org types: Integer]
     */
    public $answerCount;

    /**
     * The number of downvotes this question, answer or comment has received from
     * the community.
     * @var int [schema.org types: Integer]
     */
    public $downvoteCount;

    /**
     * An answer (possibly one of several, possibly incorrect) to a Question, e.g.
     * on a Question/Answer site.
     * @var Answer [schema.org types: Answer]
     */
    public $suggestedAnswer;

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
                'acceptedAnswer',
                'answerCount',
                'downvoteCount',
                'suggestedAnswer',
                'upvoteCount',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'acceptedAnswer' => ['Answer'],
                'answerCount' => ['Integer'],
                'downvoteCount' => ['Integer'],
                'suggestedAnswer' => ['Answer'],
                'upvoteCount' => ['Integer'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'acceptedAnswer' => 'The answer that has been accepted as best, typically on a Question/Answer site. Sites vary in their selection mechanisms, e.g. drawing on community opinion and/or the view of the Question author.',
                'answerCount' => 'The number of answers this question has received.',
                'downvoteCount' => 'The number of downvotes this question, answer or comment has received from the community.',
                'suggestedAnswer' => 'An answer (possibly one of several, possibly incorrect) to a Question, e.g. on a Question/Answer site.',
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
                [['acceptedAnswer','answerCount','downvoteCount','suggestedAnswer','upvoteCount',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Question*/
