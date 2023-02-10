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
 * Trait for MusicAlbum.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicAlbum
 */
trait MusicAlbumTrait
{
    /**
     * The kind of release which this album is: single, EP or album.
     *
     * @var MusicAlbumReleaseType
     */
    public $albumReleaseType;

    /**
     * A release of this album.
     *
     * @var MusicRelease
     */
    public $albumRelease;

    /**
     * The artist that performed this album or recording.
     *
     * @var MusicGroup|Person
     */
    public $byArtist;

    /**
     * Classification of the album by its type of content: soundtrack, live album,
     * studio album, etc.
     *
     * @var MusicAlbumProductionType
     */
    public $albumProductionType;
}
