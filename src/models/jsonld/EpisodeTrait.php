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
 * schema.org version: v30.0
 * Trait for Episode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Episode
 */
trait EpisodeTrait
{
    /**
     * An actor (individual or a group), e.g. in TV, radio, movie, video games
     * etc., or in an event. Actors can be associated with individual items or
     * with a series, episode, clip.
     *
     * @var array|PerformingGroup|PerformingGroup[]|array|Person|Person[]
     */
    public $actor;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $actors;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $directors;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * duration format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $duration;

    /**
     * Position of the episode within an ordered group of episodes.
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $episodeNumber;

    /**
     * The composer of the soundtrack.
     *
     * @var array|MusicGroup|MusicGroup[]|array|Person|Person[]
     */
    public $musicBy;

    /**
     * The season to which this episode belongs.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $partOfSeason;

    /**
     * The series to which this episode or season belongs.
     *
     * @var array|CreativeWorkSeries|CreativeWorkSeries[]
     */
    public $partOfSeries;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var array|Organization|Organization[]
     */
    public $productionCompany;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var array|VideoObject|VideoObject[]
     */
    public $trailer;
}
