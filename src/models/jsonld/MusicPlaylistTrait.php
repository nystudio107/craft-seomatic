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
 * Trait for MusicPlaylist.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicPlaylist
 */
trait MusicPlaylistTrait
{
    /**
     * A music recording (track)—usually a single song.
     *
     * @var MusicRecording
     */
    public $tracks;

    /**
     * A music recording (track)—usually a single song. If an ItemList is given,
     * the list should contain items of type MusicRecording.
     *
     * @var ItemList|MusicRecording
     */
    public $track;

    /**
     * The number of tracks in this album or playlist.
     *
     * @var int|Integer
     */
    public $numTracks;
}
