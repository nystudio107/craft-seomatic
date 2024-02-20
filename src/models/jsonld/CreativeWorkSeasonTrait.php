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
 * Trait for CreativeWorkSeason.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CreativeWorkSeason
 */
trait CreativeWorkSeasonTrait
{
    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $endDate;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * An episode of a TV/radio series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episodes;

    /**
     * An episode of a TV, radio or game media within a series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episode;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var array|VideoObject|VideoObject[]
     */
    public $trailer;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var array|Organization|Organization[]
     */
    public $productionCompany;

    /**
     * The series to which this episode or season belongs.
     *
     * @var array|CreativeWorkSeries|CreativeWorkSeries[]
     */
    public $partOfSeries;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfEpisodes;

    /**
     * Position of the season within an ordered group of seasons.
     *
     * @var string|int|array|Text|Text[]|array|Integer|Integer[]
     */
    public $seasonNumber;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $startDate;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var array|Person|Person[]
     */
    public $actor;
}
