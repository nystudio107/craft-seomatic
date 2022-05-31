<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
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
     * @var Rating
     */
    public $reviewRating;

    /**
     * The item that is being reviewed/rated.
     *
     * @var Thing
     */
    public $itemReviewed;

    /**
     * Indicates, in the context of a [[Review]] (e.g. framed as 'pro' vs 'con'
     * considerations), negative considerations - either as unstructured text, or
     * a list.
     *
     * @var string|ListItem|Text|WebContent|ItemList
     */
    public $negativeNotes;

    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var string|Text
     */
    public $reviewAspect;

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

    /**
     * Indicates, in the context of a [[Review]] (e.g. framed as 'pro' vs 'con'
     * considerations), positive considerations - either as unstructured text, or
     * a list.
     *
     * @var string|WebContent|Text|ListItem|ItemList
     */
    public $positiveNotes;

    /**
     * An associated [[Review]].
     *
     * @var Review
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
     * @var Review
     */
    public $associatedMediaReview;

    /**
     * The actual body of the review.
     *
     * @var string|Text
     */
    public $reviewBody;

}
