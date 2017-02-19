<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Article - An article, such as a news article or piece of investigative
 * report. Newspapers and magazines have articles of many different types and
 * this is intended to cover them all. See also blog post.
 *
 * Extends: CreativeWork
 * @see    http://schema.org/Article
 */
class Article extends CreativeWork
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Article';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Article';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An article, such as a news article or piece of investigative report. Newspapers and magazines have articles of many different types and this is intended to cover them all. See also blog post.';

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
     * The actual body of the article.
     *
     * @var string [schema.org types: Text]
     */
    public $articleBody;

    /**
     * Articles may belong to one or more 'sections' in a magazine or newspaper,
     * such as Sports, Lifestyle, etc.
     *
     * @var string [schema.org types: Text]
     */
    public $articleSection;

    /**
     * The page on which the work ends; for example "138" or "xvi".
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $pageEnd;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $pageStart;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $pagination;

    /**
     * The number of words in the text of the Article.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $wordCount;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'articleBody',
            'articleSection',
            'pageEnd',
            'pageStart',
            'pagination',
            'wordCount',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'articleBody' => ['Text'],
            'articleSection' => ['Text'],
            'pageEnd' => ['Integer','Text'],
            'pageStart' => ['Integer','Text'],
            'pagination' => ['Text'],
            'wordCount' => ['Integer'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'articleBody' => 'The actual body of the article.',
            'articleSection' => 'Articles may belong to one or more \'sections\' in a magazine or newspaper, such as Sports, Lifestyle, etc.',
            'pageEnd' => 'The page on which the work ends; for example "138" or "xvi".',
            'pageStart' => 'The page on which the work starts; for example "135" or "xiii".',
            'pagination' => 'Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".',
            'wordCount' => 'The number of words in the text of the Article.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
            'author',
            'datePublished',
            'headline',
            'image',
            'publisher'
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
            'dateModified',
            'mainEntityOfPage'
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['articleBody','articleSection','pageEnd','pageStart','pagination','wordCount',], 'validateJsonSchema'],
            [['author','datePublished','headline','image','publisher'], 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [['dateModified','mainEntityOfPage'], 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
        ]);

        return $rules;
    }
}
