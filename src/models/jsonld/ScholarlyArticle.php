<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Article;

/**
 * ScholarlyArticle - A scholarly article.
 * Extends: Article
 * @see    http://schema.org/ScholarlyArticle
 */
class ScholarlyArticle extends Article
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ScholarlyArticle';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ScholarlyArticle';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A scholarly article.';

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
     * The actual body of the article.
     * @var string [schema.org types: Text]
     */
    public $articleBody;

    /**
     * Articles may belong to one or more 'sections' in a magazine or newspaper,
     * such as Sports, Lifestyle, etc.
     * @var string [schema.org types: Text]
     */
    public $articleSection;

    /**
     * The page on which the work ends; for example "138" or "xvi".
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $pageEnd;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $pageStart;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     * @var mixed string [schema.org types: Text]
     */
    public $pagination;

    /**
     * The number of words in the text of the Article.
     * @var mixed int [schema.org types: Integer]
     */
    public $wordCount;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'articleBody',
                'articleSection',
                'pageEnd',
                'pageStart',
                'pagination',
                'wordCount',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'articleBody' => ['Text'],
                'articleSection' => ['Text'],
                'pageEnd' => ['Integer','Text'],
                'pageStart' => ['Integer','Text'],
                'pagination' => ['Text'],
                'wordCount' => ['Integer'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'articleBody' => 'The actual body of the article.',
                'articleSection' => 'Articles may belong to one or more \'sections\' in a magazine or newspaper, such as Sports, Lifestyle, etc.',
                'pageEnd' => 'The page on which the work ends; for example "138" or "xvi".',
                'pageStart' => 'The page on which the work starts; for example "135" or "xiii".',
                'pagination' => 'Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".',
                'wordCount' => 'The number of words in the text of the Article.',
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
                [['articleBody','articleSection','pageEnd','pageStart','pagination','wordCount',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ScholarlyArticle*/
