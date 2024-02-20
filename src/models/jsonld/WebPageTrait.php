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
 * Trait for WebPage.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WebPage
 */
trait WebPageTrait
{
    /**
     * One of the domain specialities to which this web page's content applies.
     *
     * @var array|Specialty|Specialty[]
     */
    public $specialty;

    /**
     * A set of links that can help a user understand and navigate a website
     * hierarchy.
     *
     * @var string|array|BreadcrumbList|BreadcrumbList[]|array|Text|Text[]
     */
    public $breadcrumb;

    /**
     * Date on which the content on this web page was last reviewed for accuracy
     * and/or completeness.
     *
     * @var array|Date|Date[]
     */
    public $lastReviewed;

    /**
     * Indicates if this web page element is the main subject of the page.
     *
     * @var array|WebPageElement|WebPageElement[]
     */
    public $mainContentOfPage;

    /**
     * The most significant URLs on the page. Typically, these are the
     * non-navigation links that are clicked on the most.
     *
     * @var array|URL|URL[]
     */
    public $significantLinks;

    /**
     * People or organizations that have reviewed the content on this web page for
     * accuracy and/or completeness.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $reviewedBy;

    /**
     * A link related to this web page, for example to other related web pages.
     *
     * @var array|URL|URL[]
     */
    public $relatedLink;

    /**
     * Indicates the main image on the page.
     *
     * @var array|ImageObject|ImageObject[]
     */
    public $primaryImageOfPage;

    /**
     * One of the more significant URLs on the page. Typically, these are the
     * non-navigation links that are clicked on the most.
     *
     * @var array|URL|URL[]
     */
    public $significantLink;

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
