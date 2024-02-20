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
 * Trait for VideoObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoObject
 */
trait VideoObjectTrait
{
    /**
     * Represents textual captioning from a [[MediaObject]], e.g. text of a
     * 'meme'.
     *
     * @var string|array|Text|Text[]
     */
    public $embeddedTextCaption;

    /**
     * The frame size of the video.
     *
     * @var string|array|Text|Text[]
     */
    public $videoFrameSize;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * The caption for this object. For downloadable machine formats (closed
     * caption, subtitles etc.) use MediaObject and indicate the
     * [[encodingFormat]].
     *
     * @var string|array|Text|Text[]|array|MediaObject|MediaObject[]
     */
    public $caption;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $directors;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var string|array|Text|Text[]
     */
    public $transcript;

    /**
     * The quality of the video.
     *
     * @var string|array|Text|Text[]
     */
    public $videoQuality;

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
