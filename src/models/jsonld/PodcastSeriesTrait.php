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
 * Trait for PodcastSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PodcastSeries
 */
trait PodcastSeriesTrait
{
    /**
     * The URL for a feed, e.g. associated with a podcast series, blog, or series
     * of date-stamped updates. This is usually RSS or Atom.
     *
     * @var array|DataFeed|DataFeed[]|array|URL|URL[]
     */
    public $webFeed;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var array|Person|Person[]
     */
    public $actor;
}
