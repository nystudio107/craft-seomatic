<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for NewsArticle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/NewsArticle
 */
trait NewsArticleTrait
{
    /**
     * A [dateline](https://en.wikipedia.org/wiki/Dateline) is a brief piece of
     * text included in news articles that describes where and when the story was
     * written or filed though the date is often omitted. Sometimes only a
     * placename is provided.  Structured representations of dateline-related
     * information can also be expressed more explicitly using [[locationCreated]]
     * (which represents where a work was created, e.g. where a news report was
     * written).  For location depicted or described in the content, use
     * [[contentLocation]].  Dateline summaries are oriented more towards human
     * readers than towards automated processing, and can vary substantially. Some
     * examples: "BEIRUT, Lebanon, June 2.", "Paris, France", "December 19, 2017
     * 11:43AM Reporting from Washington", "Beijing/Moscow", "QUEZON CITY,
     * Philippines".
     *
     * @var string|array|Text|Text[]
     */
    public $dateline;

    /**
     * The number of the column in which the NewsArticle appears in the print
     * edition.
     *
     * @var string|array|Text|Text[]
     */
    public $printColumn;

    /**
     * The edition of the print product in which the NewsArticle appears.
     *
     * @var string|array|Text|Text[]
     */
    public $printEdition;

    /**
     * If this NewsArticle appears in print, this field indicates the print
     * section in which the article appeared.
     *
     * @var string|array|Text|Text[]
     */
    public $printSection;

    /**
     * If this NewsArticle appears in print, this field indicates the name of the
     * page on which the article is found. Please note that this field is intended
     * for the exact page name (e.g. A5, B18).
     *
     * @var string|array|Text|Text[]
     */
    public $printPage;
}
