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
 * Trait for CreativeWorkSeason.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CreativeWorkSeason
 */
trait CreativeWorkSeasonTrait
{
    /**
     * Position of the season within an ordered group of seasons.
     *
     * @var string|int|Text|Integer
     */
    public $seasonNumber;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var VideoObject
     */
    public $trailer;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var Organization
     */
    public $productionCompany;

    /**
     * An episode of a TV/radio series or season.
     *
     * @var Episode
     */
    public $episodes;

    /**
     * The series to which this episode or season belongs.
     *
     * @var CreativeWorkSeries
     */
    public $partOfSeries;

    /**
     * An episode of a TV, radio or game media within a series or season.
     *
     * @var Episode
     */
    public $episode;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $startDate;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|Integer
     */
    public $numberOfEpisodes;

    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $endDate;
}
