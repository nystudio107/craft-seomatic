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
 * Trait for Rating.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Rating
 */
trait RatingTrait
{
    /**
     * The rating for the content.  Usage guidelines:  * Use values from
     * 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather
     * than superficially similar Unicode symbols. * Use '.' (Unicode 'FULL STOP'
     * (U+002E)) rather than ',' to indicate a decimal point. Avoid using these
     * symbols as a readability separator.
     *
     * @var string|float|array|Text|Text[]|array|Number|Number[]
     */
    public $ratingValue;

    /**
     * A short explanation (e.g. one to two sentences) providing background
     * context and other information that led to the conclusion expressed in the
     * rating. This is particularly applicable to ratings associated with "fact
     * check" markup using [[ClaimReview]].
     *
     * @var string|array|Text|Text[]
     */
    public $ratingExplanation;

    /**
     * The highest value allowed in this rating system. If bestRating is omitted,
     * 5 is assumed.
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $bestRating;

    /**
     * The author of this content or rating. Please note that author is special in
     * that HTML 5 provides a special mechanism for indicating authorship via the
     * rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $author;

    /**
     * The lowest value allowed in this rating system. If worstRating is omitted,
     * 1 is assumed.
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $worstRating;

    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var string|array|Text|Text[]
     */
    public $reviewAspect;
}
