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
 * Trait for VideoObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoObject
 */
trait VideoObjectTrait
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
     * The caption for this object. For downloadable machine formats (closed
     * caption, subtitles etc.) use MediaObject and indicate the
     * [[encodingFormat]].
     *
     * @var string|MediaObject|Text
     */
    public $caption;

    /**
     * Thumbnail image for an image or video.
     *
     * @var ImageObject
     */
    public $thumbnail;

    /**
     * Represents textual captioning from a [[MediaObject]], e.g. text of a
     * 'meme'.
     *
     * @var string|Text
     */
    public $embeddedTextCaption;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * The frame size of the video.
     *
     * @var string|Text
     */
    public $videoFrameSize;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var string|Text
     */
    public $transcript;

    /**
     * The composer of the soundtrack.
     *
     * @var MusicGroup|Person
     */
    public $musicBy;

    /**
     * The quality of the video.
     *
     * @var string|Text
     */
    public $videoQuality;
}
