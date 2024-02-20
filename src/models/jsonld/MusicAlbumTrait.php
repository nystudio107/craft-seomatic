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
 * Trait for MusicAlbum.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicAlbum
 */
trait MusicAlbumTrait
{
    /**
     * A release of this album.
     *
     * @var array|MusicRelease|MusicRelease[]
     */
    public $albumRelease;

    /**
     * The kind of release which this album is: single, EP or album.
     *
     * @var array|MusicAlbumReleaseType|MusicAlbumReleaseType[]
     */
    public $albumReleaseType;

    /**
     * Classification of the album by its type of content: soundtrack, live album,
     * studio album, etc.
     *
     * @var array|MusicAlbumProductionType|MusicAlbumProductionType[]
     */
    public $albumProductionType;

    /**
     * The artist that performed this album or recording.
     *
     * @var array|Person|Person[]|array|MusicGroup|MusicGroup[]
     */
    public $byArtist;
}
