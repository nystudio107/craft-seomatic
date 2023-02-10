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
 * Trait for RadioSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RadioSeries
 */
trait RadioSeriesTrait
{
    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $actors;

    /**
     * A season that is part of the media series.
     *
     * @var CreativeWorkSeason
     */
    public $containsSeason;

    /**
     * The number of seasons in this series.
     *
     * @var int|Integer
     */
    public $numberOfSeasons;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * A season in a media series.
     *
     * @var URL|CreativeWorkSeason
     */
    public $season;

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
     * A season in a media series.
     *
     * @var CreativeWorkSeason
     */
    public $seasons;

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
     * The number of episodes in this season or series.
     *
     * @var int|Integer
     */
    public $numberOfEpisodes;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

    /**
     * The composer of the soundtrack.
     *
     * @var MusicGroup|Person
     */
    public $musicBy;
}
