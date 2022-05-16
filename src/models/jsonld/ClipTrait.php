<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
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
     * @var float|Number|HyperTocEntry
     */
    public $startOffset;

    /**
     * The end time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var float|Number|HyperTocEntry
     */
    public $endOffset;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * The episode to which this clip belongs.
     *
     * @var Episode
     */
    public $partOfEpisode;

    /**
     * Position of the clip within an ordered group of clips.
     *
     * @var string|int|Text|Integer
     */
    public $clipNumber;

    /**
     * The series to which this episode or season belongs.
     *
     * @var CreativeWorkSeries
     */
    public $partOfSeries;

    /**
     * The season to which this episode belongs.
     *
     * @var CreativeWorkSeason
     */
    public $partOfSeason;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $actors;

    /**
     * The composer of the soundtrack.
     *
     * @var Person|MusicGroup
     */
    public $musicBy;

    /**
     * A director of e.g. tv, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

}
