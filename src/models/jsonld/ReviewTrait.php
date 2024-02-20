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
 * Trait for Review.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Review
 */
trait ReviewTrait
{
    /**
     * The rating given in this review. Note that reviews can themselves be rated.
     * The ```reviewRating``` applies to rating given by the review. The
     * [[aggregateRating]] property applies to the review itself, as a creative
     * work.
     *
     * @var array|Rating|Rating[]
     */
    public $reviewRating;

    /**
     * The actual body of the review.
     *
     * @var string|array|Text|Text[]
     */
    public $reviewBody;

    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var string|array|Text|Text[]
     */
    public $reviewAspect;

    /**
     * An associated [[Review]].
     *
     * @var array|Review|Review[]
     */
    public $associatedReview;

    /**
     * An associated [[MediaReview]], related by specific common content, topic or
     * claim. The expectation is that this property would be most typically used
     * in cases where a single activity is conducting both claim reviews and media
     * reviews, in which case [[relatedMediaReview]] would commonly be used on a
     * [[ClaimReview]], while [[relatedClaimReview]] would be used on
     * [[MediaReview]].
     *
     * @var array|Review|Review[]
     */
    public $associatedMediaReview;

    /**
     * The item that is being reviewed/rated.
     *
     * @var array|Thing|Thing[]
     */
    public $itemReviewed;

    /**
     * An associated [[ClaimReview]], related by specific common content, topic or
     * claim. The expectation is that this property would be most typically used
     * in cases where a single activity is conducting both claim reviews and media
     * reviews, in which case [[relatedMediaReview]] would commonly be used on a
     * [[ClaimReview]], while [[relatedClaimReview]] would be used on
     * [[MediaReview]].
     *
     * @var array|Review|Review[]
     */
    public $associatedClaimReview;

    /**
     * Provides positive considerations regarding something, for example product
     * highlights or (alongside [[negativeNotes]]) pro/con lists for reviews.  In
     * the case of a [[Review]], the property describes the [[itemReviewed]] from
     * the perspective of the review; in the case of a [[Product]], the product
     * itself is being described.  The property values can be expressed either as
     * unstructured text (repeated as necessary), or if ordered, as a list (in
     * which case the most positive is at the beginning of the list).
     *
     * @var string|array|ItemList|ItemList[]|array|WebContent|WebContent[]|array|Text|Text[]|array|ListItem|ListItem[]
     */
    public $positiveNotes;

    /**
     * Provides negative considerations regarding something, most typically in
     * pro/con lists for reviews (alongside [[positiveNotes]]). For symmetry   In
     * the case of a [[Review]], the property describes the [[itemReviewed]] from
     * the perspective of the review; in the case of a [[Product]], the product
     * itself is being described. Since product descriptions  tend to emphasise
     * positive claims, it may be relatively unusual to find [[negativeNotes]]
     * used in this way. Nevertheless for the sake of symmetry, [[negativeNotes]]
     * can be used on [[Product]].  The property values can be expressed either as
     * unstructured text (repeated as necessary), or if ordered, as a list (in
     * which case the most negative is at the beginning of the list).
     *
     * @var string|array|ItemList|ItemList[]|array|Text|Text[]|array|WebContent|WebContent[]|array|ListItem|ListItem[]
     */
    public $negativeNotes;
}
