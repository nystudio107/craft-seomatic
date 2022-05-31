<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for MediaReview.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MediaReview
 */

trait MediaReviewTrait
{
    
    /**
     * Describes, in a [[MediaReview]] when dealing with
     * [[DecontextualizedContent]], background information that can contribute to
     * better interpretation of the [[MediaObject]].
     *
     * @var string|Text
     */
    public $originalMediaContextDescription;

    /**
     * Indicates a MediaManipulationRatingEnumeration classification of a media
     * object (in the context of how it was published or shared).
     *
     * @var MediaManipulationRatingEnumeration
     */
    public $mediaAuthenticityCategory;

    /**
     * Link to the page containing an original version of the content, or directly
     * to an online copy of the original [[MediaObject]] content, e.g. video file.
     *
     * @var URL|MediaObject|WebPage
     */
    public $originalMediaLink;

}
