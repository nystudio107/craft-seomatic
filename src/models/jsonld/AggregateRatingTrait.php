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
 * Trait for AggregateRating.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AggregateRating
 */
trait AggregateRatingTrait
{
    /**
     * The item that is being reviewed/rated.
     *
     * @var Thing
     */
    public $itemReviewed;

    /**
     * The count of total number of ratings.
     *
     * @var int|Integer
     */
    public $ratingCount;

    /**
     * The count of total number of reviews.
     *
     * @var int|Integer
     */
    public $reviewCount;
}
