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
 * Trait for MusicRecording.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicRecording
 */
trait MusicRecordingTrait
{
    /**
     * The artist that performed this album or recording.
     *
     * @var array|MusicGroup|MusicGroup[]|array|Person|Person[]
     */
    public $byArtist;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * duration format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $duration;

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
     * The International Standard Recording Code for the recording.
     *
     * @var string|array|Text|Text[]
     */
    public $isrcCode;

    /**
     * The composition this track is a recording of.
     *
     * @var array|MusicComposition|MusicComposition[]
     */
    public $recordingOf;
}
