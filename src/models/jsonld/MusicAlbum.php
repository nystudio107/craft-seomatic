<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MusicPlaylist;

/**
 * MusicAlbum - A collection of music tracks.
 * Extends: MusicPlaylist
 * @see    http://schema.org/MusicAlbum
 */
class MusicAlbum extends MusicPlaylist
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MusicAlbum';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MusicAlbum';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A collection of music tracks.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'MusicPlaylist';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * Classification of the album by it's type of content: soundtrack, live
     * album, studio album, etc.
     * @var MusicAlbumProductionType [schema.org types: MusicAlbumProductionType]
     */
    public $albumProductionType;

    /**
     * A release of this album. Inverse property: releaseOf.
     * @var MusicRelease [schema.org types: MusicRelease]
     */
    public $albumRelease;

    /**
     * The kind of release which this album is: single, EP or album.
     * @var MusicAlbumReleaseType [schema.org types: MusicAlbumReleaseType]
     */
    public $albumReleaseType;

    /**
     * The artist that performed this album or recording.
     * @var MusicGroup [schema.org types: MusicGroup]
     */
    public $byArtist;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'albumProductionType',
                'albumRelease',
                'albumReleaseType',
                'byArtist',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'albumProductionType' => ['MusicAlbumProductionType'],
                'albumRelease' => ['MusicRelease'],
                'albumReleaseType' => ['MusicAlbumReleaseType'],
                'byArtist' => ['MusicGroup'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'albumProductionType' => 'Classification of the album by it\'s type of content: soundtrack, live album, studio album, etc.',
                'albumRelease' => 'A release of this album. Inverse property: releaseOf.',
                'albumReleaseType' => 'The kind of release which this album is: single, EP or album.',
                'byArtist' => 'The artist that performed this album or recording.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['albumProductionType','albumRelease','albumReleaseType','byArtist',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MusicAlbum*/
