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
 * Trait for MusicPlaylist.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicPlaylist
 */
trait MusicPlaylistTrait
{
    /**
     * The number of tracks in this album or playlist.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numTracks;

    /**
     * A music recording (track)—usually a single song.
     *
     * @var array|MusicRecording|MusicRecording[]
     */
    public $tracks;

    /**
     * A music recording (track)—usually a single song. If an ItemList is given,
     * the list should contain items of type MusicRecording.
     *
     * @var array|ItemList|ItemList[]|array|MusicRecording|MusicRecording[]
     */
    public $track;
}
