<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for WebPage.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WebPage
 */
trait WebPageTrait
{
    /**
     * One of the more significant URLs on the page. Typically, these are the
     * non-navigation links that are clicked on the most.
     *
     * @var URL
     */
    public $significantLink;

    /**
     * One of the domain specialities to which this web page's content applies.
     *
     * @var Specialty
     */
    public $specialty;

    /**
     * People or organizations that have reviewed the content on this web page for
     * accuracy and/or completeness.
     *
     * @var Organization|Person
     */
    public $reviewedBy;

    /**
     * Date on which the content on this web page was last reviewed for accuracy
     * and/or completeness.
     *
     * @var Date
     */
    public $lastReviewed;

    /**
     * A link related to this web page, for example to other related web pages.
     *
     * @var URL
     */
    public $relatedLink;

    /**
     * A set of links that can help a user understand and navigate a website
     * hierarchy.
     *
     * @var string|BreadcrumbList|Text
     */
    public $breadcrumb;

    /**
     * The most significant URLs on the page. Typically, these are the
     * non-navigation links that are clicked on the most.
     *
     * @var URL
     */
    public $significantLinks;

    /**
     * Indicates if this web page element is the main subject of the page.
     *
     * @var WebPageElement
     */
    public $mainContentOfPage;

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
     * @var SpeakableSpecification|URL
     */
    public $speakable;

    /**
     * Indicates the main image on the page.
     *
     * @var ImageObject
     */
    public $primaryImageOfPage;
}
