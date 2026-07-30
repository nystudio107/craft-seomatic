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
 * Trait for MusicGroup.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicGroup
 */
trait MusicGroupTrait
{
    /**
     * A music album.
     *
     * @var array|MusicAlbum|MusicAlbum[]
     */
    public $album;

    /**
     * A collection of music albums.
     *
     * @var array|MusicAlbum|MusicAlbum[]
     */
    public $albums;

    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]|array|URL|URL[]
     */
    public $genre;

    /**
     * A member of a music group—for example, John, Paul, George, or Ringo.
     *
     * @var array|Person|Person[]
     */
    public $musicGroupMember;

    /**
     * A music recording (track)—usually a single song. If an ItemList is given,
     * the list should contain items of type MusicRecording.
     *
     * @var array|ItemList|ItemList[]|array|MusicRecording|MusicRecording[]
     */
    public $track;

    /**
     * A music recording (track)—usually a single song.
     *
     * @var array|MusicRecording|MusicRecording[]
     */
    public $tracks;
}
