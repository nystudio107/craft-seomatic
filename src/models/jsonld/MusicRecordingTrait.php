<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for MusicRecording.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicRecording
 */
trait MusicRecordingTrait
{
    /**
     * The composition this track is a recording of.
     *
     * @var MusicComposition
     */
    public $recordingOf;

    /**
     * The artist that performed this album or recording.
     *
     * @var MusicGroup|Person
     */
    public $byArtist;

    /**
     * The playlist to which this recording belongs.
     *
     * @var MusicPlaylist
     */
    public $inPlaylist;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * The International Standard Recording Code for the recording.
     *
     * @var string|Text
     */
    public $isrcCode;

    /**
     * The album to which this recording belongs.
     *
     * @var MusicAlbum
     */
    public $inAlbum;
}
