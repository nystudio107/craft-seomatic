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
 * Trait for Clip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Clip
 */
trait ClipTrait
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
     * Position of the clip within an ordered group of clips.
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $clipNumber;

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
     * The end time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var float|array|HyperTocEntry|HyperTocEntry[]|array|Number|Number[]
     */
    public $endOffset;

    /**
     * The composer of the soundtrack.
     *
     * @var array|MusicGroup|MusicGroup[]|array|Person|Person[]
     */
    public $musicBy;

    /**
     * The episode to which this clip belongs.
     *
     * @var array|Episode|Episode[]
     */
    public $partOfEpisode;

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
     * The start time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var float|array|HyperTocEntry|HyperTocEntry[]|array|Number|Number[]
     */
    public $startOffset;
}
