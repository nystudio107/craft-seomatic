<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Article;

/**
 * NewsArticle - A news article.
 * Extends: Article
 * @see    http://schema.org/NewsArticle
 */
class NewsArticle extends Article
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'NewsArticle';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/NewsArticle';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A news article.';

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
     * The location where the NewsArticle was produced.
     * @var string [schema.org types: Text]
     */
    public $dateline;

    /**
     * The number of the column in which the NewsArticle appears in the print
     * edition.
     * @var string [schema.org types: Text]
     */
    public $printColumn;

    /**
     * The edition of the print product in which the NewsArticle appears.
     * @var string [schema.org types: Text]
     */
    public $printEdition;

    /**
     * If this NewsArticle appears in print, this field indicates the name of the
     * page on which the article is found. Please note that this field is intended
     * for the exact page name (e.g. A5, B18).
     * @var string [schema.org types: Text]
     */
    public $printPage;

    /**
     * If this NewsArticle appears in print, this field indicates the print
     * section in which the article appeared.
     * @var string [schema.org types: Text]
     */
    public $printSection;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'dateline',
                'printColumn',
                'printEdition',
                'printPage',
                'printSection',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'dateline' => ['Text'],
                'printColumn' => ['Text'],
                'printEdition' => ['Text'],
                'printPage' => ['Text'],
                'printSection' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'dateline' => 'The location where the NewsArticle was produced.',
                'printColumn' => 'The number of the column in which the NewsArticle appears in the print edition.',
                'printEdition' => 'The edition of the print product in which the NewsArticle appears.',
                'printPage' => 'If this NewsArticle appears in print, this field indicates the name of the page on which the article is found. Please note that this field is intended for the exact page name (e.g. A5, B18).',
                'printSection' => 'If this NewsArticle appears in print, this field indicates the print section in which the article appeared.',
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
                [['dateline','printColumn','printEdition','printPage','printSection',], 'validateJsonSchema'],
                [['author','datePublished','headline','image','publisher'], 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [['dateModified','mainEntityOfPage'], 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class NewsArticle*/
