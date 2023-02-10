<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Episode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Episode
 */
trait EpisodeTrait
{
    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $actors;

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
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var Organization
     */
    public $productionCompany;

    /**
     * The season to which this episode belongs.
     *
     * @var CreativeWorkSeason
     */
    public $partOfSeason;

    /**
     * The series to which this episode or season belongs.
     *
     * @var CreativeWorkSeries
     */
    public $partOfSeries;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

    /**
     * Position of the episode within an ordered group of episodes.
     *
     * @var string|int|Text|Integer
     */
    public $episodeNumber;

    /**
     * The composer of the soundtrack.
     *
     * @var MusicGroup|Person
     */
    public $musicBy;
}
