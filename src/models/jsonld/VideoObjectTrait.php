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
 * Trait for VideoObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoObject
 */
trait VideoObjectTrait
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
     * The caption for this object. For downloadable machine formats (closed
     * caption, subtitles etc.) use MediaObject and indicate the
     * [[encodingFormat]].
     *
     * @var string|array|MediaObject|MediaObject[]|array|Text|Text[]
     */
    public $caption;

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
     * Represents textual captioning from a [[MediaObject]], e.g. text of a
     * 'meme'.
     *
     * @var string|array|Text|Text[]
     */
    public $embeddedTextCaption;

    /**
     * The composer of the soundtrack.
     *
     * @var array|MusicGroup|MusicGroup[]|array|Person|Person[]
     */
    public $musicBy;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var string|array|Text|Text[]
     */
    public $transcript;

    /**
     * The frame size of the video.
     *
     * @var string|array|Text|Text[]
     */
    public $videoFrameSize;

    /**
     * The quality of the video.
     *
     * @var string|array|Text|Text[]
     */
    public $videoQuality;
}
