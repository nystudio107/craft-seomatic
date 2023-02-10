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
 * Trait for Brand.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Brand
 */
trait BrandTrait
{
    /**
     * A slogan or motto associated with the item.
     *
     * @var string|Text
     */
    public $slogan;

    /**
     * A review of the item.
     *
     * @var Review
     */
    public $review;

    /**
     * An associated logo.
     *
     * @var ImageObject|URL
     */
    public $logo;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating
     */
    public $aggregateRating;
}
