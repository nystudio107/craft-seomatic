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
 * schema.org version: v30.0
 * Trait for MediaReview.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MediaReview
 */
trait MediaReviewTrait
{
    /**
     * Indicates a MediaManipulationRatingEnumeration classification of a media
     * object (in the context of how it was published or shared).
     *
     * @var array|MediaManipulationRatingEnumeration|MediaManipulationRatingEnumeration[]
     */
    public $mediaAuthenticityCategory;

    /**
     * Describes, in a [[MediaReview]] when dealing with
     * [[DecontextualizedContent]], background information that can contribute to
     * better interpretation of the [[MediaObject]].
     *
     * @var string|array|Text|Text[]
     */
    public $originalMediaContextDescription;

    /**
     * Link to the page containing an original version of the content, or directly
     * to an online copy of the original [[MediaObject]] content, e.g. video file.
     *
     * @var array|MediaObject|MediaObject[]|array|URL|URL[]|array|WebPage|WebPage[]
     */
    public $originalMediaLink;
}
