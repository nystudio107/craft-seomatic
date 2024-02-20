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
 * Trait for AggregateRating.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AggregateRating
 */
trait AggregateRatingTrait
{
    /**
     * The count of total number of reviews.
     *
     * @var int|array|Integer|Integer[]
     */
    public $reviewCount;

    /**
     * The item that is being reviewed/rated.
     *
     * @var array|Thing|Thing[]
     */
    public $itemReviewed;

    /**
     * The count of total number of ratings.
     *
     * @var int|array|Integer|Integer[]
     */
    public $ratingCount;
}
