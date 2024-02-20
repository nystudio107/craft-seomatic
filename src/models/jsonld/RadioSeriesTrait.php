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
 * Trait for RadioSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RadioSeries
 */
trait RadioSeriesTrait
{
    /**
     * A season in a media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $seasons;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * The number of seasons in this series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfSeasons;

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
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $directors;

    /**
     * A season in a media series.
     *
     * @var array|URL|URL[]|array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $season;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfEpisodes;

    /**
     * A season that is part of the media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $containsSeason;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $actors;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var array|Person|Person[]
     */
    public $actor;

    /**
     * The composer of the soundtrack.
     *
     * @var array|Person|Person[]|array|MusicGroup|MusicGroup[]
     */
    public $musicBy;
}
