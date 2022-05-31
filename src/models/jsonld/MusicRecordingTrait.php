<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for MusicRecording.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicRecording
 */

trait MusicRecordingTrait
{
    
    /**
     * The International Standard Recording Code for the recording.
     *
     * @var string|Text
     */
    public $isrcCode;

    /**
     * The playlist to which this recording belongs.
     *
     * @var MusicPlaylist
     */
    public $inPlaylist;

    /**
     * The album to which this recording belongs.
     *
     * @var MusicAlbum
     */
    public $inAlbum;

    /**
     * The composition this track is a recording of.
     *
     * @var MusicComposition
     */
    public $recordingOf;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * The artist that performed this album or recording.
     *
     * @var Person|MusicGroup
     */
    public $byArtist;

}
