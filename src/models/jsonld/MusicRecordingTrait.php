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
 * Trait for MusicRecording.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicRecording
 */
trait MusicRecordingTrait
{
    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $duration;

    /**
     * The International Standard Recording Code for the recording.
     *
     * @var string|array|Text|Text[]
     */
    public $isrcCode;

    /**
     * The album to which this recording belongs.
     *
     * @var array|MusicAlbum|MusicAlbum[]
     */
    public $inAlbum;

    /**
     * The playlist to which this recording belongs.
     *
     * @var array|MusicPlaylist|MusicPlaylist[]
     */
    public $inPlaylist;

    /**
     * The composition this track is a recording of.
     *
     * @var array|MusicComposition|MusicComposition[]
     */
    public $recordingOf;

    /**
     * The artist that performed this album or recording.
     *
     * @var array|Person|Person[]|array|MusicGroup|MusicGroup[]
     */
    public $byArtist;
}
