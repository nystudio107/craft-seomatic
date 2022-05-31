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
     * @var string|Text
     */
    public $embeddedTextCaption;

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
     * The caption for this object. For downloadable machine formats (closed
     * caption, subtitles etc.) use MediaObject and indicate the
     * [[encodingFormat]].
     *
     * @var string|Text|MediaObject
     */
    public $caption;

    /**
     * Thumbnail image for an image or video.
     *
     * @var ImageObject
     */
    public $thumbnail;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var string|Text
     */
    public $transcript;

    /**
     * The quality of the video.
     *
     * @var string|Text
     */
    public $videoQuality;

    /**
     * The frame size of the video.
     *
     * @var string|Text
     */
    public $videoFrameSize;

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
