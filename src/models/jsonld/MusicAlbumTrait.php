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
 * Trait for MusicAlbum.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicAlbum
 */

trait MusicAlbumTrait
{
    
    /**
     * Classification of the album by it's type of content: soundtrack, live
     * album, studio album, etc.
     *
     * @var MusicAlbumProductionType
     */
    public $albumProductionType;

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
     * @var Person|MusicGroup
     */
    public $byArtist;

}
