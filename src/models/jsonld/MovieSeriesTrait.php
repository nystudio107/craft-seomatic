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
 * Trait for MovieSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MovieSeries
 */
trait MovieSeriesTrait
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
     * The composer of the soundtrack.
     *
     * @var array|MusicGroup|MusicGroup[]|array|Person|Person[]
     */
    public $musicBy;

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
