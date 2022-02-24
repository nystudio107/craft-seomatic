<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\NewsArticle;

/**
 * ReportageNewsArticle - The ReportageNewsArticle type is a subtype of
 * NewsArticle representing news articles which are the result of journalistic
 * news reporting conventions. In practice many news publishers produce a wide
 * variety of article types, many of which might be considered a NewsArticle
 * but not a ReportageNewsArticle. For example, opinion pieces, reviews,
 * analysis, sponsored or satirical articles, or articles that combine several
 * of these elements. The ReportageNewsArticle type is based on a stricter
 * ideal for "news" as a work of journalism, with articles based on factual
 * information either observed or verified by the author, or reported and
 * verified from knowledgeable sources. This often includes perspectives from
 * multiple viewpoints on a particular issue (distinguishing news reports from
 * public relations or propaganda). News reports in the ReportageNewsArticle
 * sense de-emphasize the opinion of the author, with commentary and value
 * judgements typically expressed elsewhere. A ReportageNewsArticle which goes
 * deeper into analysis can also be marked with an additional type of
 * AnalysisNewsArticle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ReportageNewsArticle
 */
class ReportageNewsArticle extends NewsArticle
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ReportageNewsArticle';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ReportageNewsArticle';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The ReportageNewsArticle type is a subtype of NewsArticle representing news articles which are the result of journalistic news reporting conventions. In practice many news publishers produce a wide variety of article types, many of which might be considered a NewsArticle but not a ReportageNewsArticle. For example, opinion pieces, reviews, analysis, sponsored or satirical articles, or articles that combine several of these elements. The ReportageNewsArticle type is based on a stricter ideal for "news" as a work of journalism, with articles based on factual information either observed or verified by the author, or reported and verified from knowledgeable sources. This often includes perspectives from multiple viewpoints on a particular issue (distinguishing news reports from public relations or propaganda). News reports in the ReportageNewsArticle sense de-emphasize the opinion of the author, with commentary and value judgements typically expressed elsewhere. A ReportageNewsArticle which goes deeper into analysis can also be marked with an additional type of AnalysisNewsArticle.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'NewsArticle';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'dateline',
        'printColumn',
        'printEdition',
        'printPage',
        'printSection'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'dateline' => ['Text'],
        'printColumn' => ['Text'],
        'printEdition' => ['Text'],
        'printPage' => ['Text'],
        'printSection' => ['Text']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'dateline' => 'A dateline is a brief piece of text included in news articles that describes where and when the story was written or filed though the date is often omitted. Sometimes only a placename is provided. Structured representations of dateline-related information can also be expressed more explicitly using locationCreated (which represents where a work was created e.g. where a news report was written). For location depicted or described in the content, use contentLocation. Dateline summaries are oriented more towards human readers than towards automated processing, and can vary substantially. Some examples: "BEIRUT, Lebanon, June 2.", "Paris, France", "December 19, 2017 11:43AM Reporting from Washington", "Beijing/Moscow", "QUEZON CITY, Philippines".',
        'printColumn' => 'The number of the column in which the NewsArticle appears in the print edition.',
        'printEdition' => 'The edition of the print product in which the NewsArticle appears.',
        'printPage' => 'If this NewsArticle appears in print, this field indicates the name of the page on which the article is found. Please note that this field is intended for the exact page name (e.g. A5, B18).',
        'printSection' => 'If this NewsArticle appears in print, this field indicates the print section in which the article appeared.'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Static Protected Properties
    // =========================================================================
    /**
     * A dateline is a brief piece of text included in news articles that
     * describes where and when the story was written or filed though the date is
     * often omitted. Sometimes only a placename is provided. Structured
     * representations of dateline-related information can also be expressed more
     * explicitly using locationCreated (which represents where a work was created
     * e.g. where a news report was written). For location depicted or described
     * in the content, use contentLocation. Dateline summaries are oriented more
     * towards human readers than towards automated processing, and can vary
     * substantially. Some examples: "BEIRUT, Lebanon, June 2.", "Paris, France",
     * "December 19, 2017 11:43AM Reporting from Washington", "Beijing/Moscow",
     * "QUEZON CITY, Philippines".
     *
     * @var string [schema.org types: Text]
     */
    public $dateline;
    /**
     * The number of the column in which the NewsArticle appears in the print
     * edition.
     *
     * @var string [schema.org types: Text]
     */
    public $printColumn;
    /**
     * The edition of the print product in which the NewsArticle appears.
     *
     * @var string [schema.org types: Text]
     */
    public $printEdition;
    /**
     * If this NewsArticle appears in print, this field indicates the name of the
     * page on which the article is found. Please note that this field is intended
     * for the exact page name (e.g. A5, B18).
     *
     * @var string [schema.org types: Text]
     */
    public $printPage;
    /**
     * If this NewsArticle appears in print, this field indicates the print
     * section in which the article appeared.
     *
     * @var string [schema.org types: Text]
     */
    public $printSection;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['dateline', 'printColumn', 'printEdition', 'printPage', 'printSection'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
