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
 * Trait for Clip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Clip
 */
trait ClipTrait
{
    /**
     * The start time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var float|array|Number|Number[]|array|HyperTocEntry|HyperTocEntry[]
     */
    public $startOffset;

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
     * Position of the clip within an ordered group of clips.
     *
     * @var string|int|array|Text|Text[]|array|Integer|Integer[]
     */
    public $clipNumber;

    /**
     * The series to which this episode or season belongs.
     *
     * @var array|CreativeWorkSeries|CreativeWorkSeries[]
     */
    public $partOfSeries;

    /**
     * The season to which this episode belongs.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $partOfSeason;

    /**
     * The end time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var float|array|HyperTocEntry|HyperTocEntry[]|array|Number|Number[]
     */
    public $endOffset;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $actors;

    /**
     * The episode to which this clip belongs.
     *
     * @var array|Episode|Episode[]
     */
    public $partOfEpisode;

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
