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
 * Trait for MusicGroup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicGroup
 */
trait MusicGroupTrait
{
    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var string|array|URL|URL[]|array|Text|Text[]
     */
    public $genre;

    /**
     * A collection of music albums.
     *
     * @var array|MusicAlbum|MusicAlbum[]
     */
    public $albums;

    /**
     * A music album.
     *
     * @var array|MusicAlbum|MusicAlbum[]
     */
    public $album;

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

    /**
     * A member of a music group—for example, John, Paul, George, or Ringo.
     *
     * @var array|Person|Person[]
     */
    public $musicGroupMember;
}
