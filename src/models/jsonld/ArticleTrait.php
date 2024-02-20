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
 * Trait for Article.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Article
 */
trait ArticleTrait
{
    /**
     * For an [[Article]], typically a [[NewsArticle]], the backstory property
     * provides a textual summary giving a brief explanation of why and how an
     * article was created. In a journalistic setting this could include
     * information about reporting process, methods, interviews, data sources,
     * etc.
     *
     * @var string|array|Text|Text[]|array|CreativeWork|CreativeWork[]
     */
    public $backstory;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     *
     * @var string|array|Text|Text[]
     */
    public $pagination;

    /**
     * The number of words in the text of the Article.
     *
     * @var int|array|Integer|Integer[]
     */
    public $wordCount;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $pageStart;

    /**
     * Articles may belong to one or more 'sections' in a magazine or newspaper,
     * such as Sports, Lifestyle, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $articleSection;

    /**
     * The actual body of the article.
     *
     * @var string|array|Text|Text[]
     */
    public $articleBody;

    /**
     * The page on which the work ends; for example "138" or "xvi".
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $pageEnd;

    /**
     * Indicates sections of a Web page that are particularly 'speakable' in the
     * sense of being highlighted as being especially appropriate for
     * text-to-speech conversion. Other sections of a page may also be usefully
     * spoken in particular circumstances; the 'speakable' property serves to
     * indicate the parts most likely to be generally useful for speech.  The
     * *speakable* property can be repeated an arbitrary number of times, with
     * three kinds of possible 'content-locator' values:  1.) *id-value* URL
     * references - uses *id-value* of an element in the page being annotated. The
     * simplest use of *speakable* has (potentially relative) URL values,
     * referencing identified sections of the document concerned.  2.) CSS
     * Selectors - addresses content in the annotated page, e.g. via class
     * attribute. Use the [[cssSelector]] property.  3.)  XPaths - addresses
     * content via XPaths (assuming an XML view of the content). Use the [[xpath]]
     * property.   For more sophisticated markup of speakable sections beyond
     * simple ID references, either CSS selectors or XPath expressions to pick out
     * document section(s) as speakable. For this we define a supporting type,
     * [[SpeakableSpecification]]  which is defined to be a possible value of the
     * *speakable* property.
     *
     * @var array|URL|URL[]|array|SpeakableSpecification|SpeakableSpecification[]
     */
    public $speakable;
}
