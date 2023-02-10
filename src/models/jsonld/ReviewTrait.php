<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Review.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Review
 */
trait ReviewTrait
{
    /**
     * The actual body of the review.
     *
     * @var string|Text
     */
    public $reviewBody;

    /**
     * An associated [[MediaReview]], related by specific common content, topic or
     * claim. The expectation is that this property would be most typically used
     * in cases where a single activity is conducting both claim reviews and media
     * reviews, in which case [[relatedMediaReview]] would commonly be used on a
     * [[ClaimReview]], while [[relatedClaimReview]] would be used on
     * [[MediaReview]].
     *
     * @var Review
     */
    public $associatedMediaReview;

    /**
     * An associated [[Review]].
     *
     * @var Review
     */
    public $associatedReview;

    /**
     * Provides positive considerations regarding something, for example product
     * highlights or (alongside [[negativeNotes]]) pro/con lists for reviews.  In
     * the case of a [[Review]], the property describes the [[itemReviewed]] from
     * the perspective of the review; in the case of a [[Product]], the product
     * itself is being described.  The property values can be expressed either as
     * unstructured text (repeated as necessary), or if ordered, as a list (in
     * which case the most positive is at the beginning of the list).
     *
     * @var string|Text|WebContent|ListItem|ItemList
     */
    public $positiveNotes;

    /**
     * The rating given in this review. Note that reviews can themselves be rated.
     * The ```reviewRating``` applies to rating given by the review. The
     * [[aggregateRating]] property applies to the review itself, as a creative
     * work.
     *
     * @var Rating
     */
    public $reviewRating;

    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var string|Text
     */
    public $reviewAspect;

    /**
     * The item that is being reviewed/rated.
     *
     * @var Thing
     */
    public $itemReviewed;

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
     * @var string|ListItem|Text|ItemList|WebContent
     */
    public $negativeNotes;

    /**
     * An associated [[ClaimReview]], related by specific common content, topic or
     * claim. The expectation is that this property would be most typically used
     * in cases where a single activity is conducting both claim reviews and media
     * reviews, in which case [[relatedMediaReview]] would commonly be used on a
     * [[ClaimReview]], while [[relatedClaimReview]] would be used on
     * [[MediaReview]].
     *
     * @var Review
     */
    public $associatedClaimReview;
}
