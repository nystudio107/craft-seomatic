<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MusicPlaylist;

/**
 * MusicAlbum - A collection of music tracks.
 *
 * Extends: MusicPlaylist
 * @see    http://schema.org/MusicAlbum
 */
class MusicAlbum extends MusicPlaylist
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MusicAlbum';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MusicAlbum';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A collection of music tracks.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MusicPlaylist';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * Classification of the album by it's type of content: soundtrack, live
     * album, studio album, etc.
     *
     * @var MusicAlbumProductionType [schema.org types: MusicAlbumProductionType]
     */
    public $albumProductionType;

    /**
     * A release of this album. Inverse property: releaseOf.
     *
     * @var MusicRelease [schema.org types: MusicRelease]
     */
    public $albumRelease;

    /**
     * The kind of release which this album is: single, EP or album.
     *
     * @var MusicAlbumReleaseType [schema.org types: MusicAlbumReleaseType]
     */
    public $albumReleaseType;

    /**
     * The artist that performed this album or recording.
     *
     * @var MusicGroup [schema.org types: MusicGroup]
     */
    public $byArtist;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'albumProductionType',
            'albumRelease',
            'albumReleaseType',
            'byArtist',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'albumProductionType' => ['MusicAlbumProductionType'],
            'albumRelease' => ['MusicRelease'],
            'albumReleaseType' => ['MusicAlbumReleaseType'],
            'byArtist' => ['MusicGroup'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'albumProductionType' => 'Classification of the album by it\'s type of content: soundtrack, live album, studio album, etc.',
            'albumRelease' => 'A release of this album. Inverse property: releaseOf.',
            'albumReleaseType' => 'The kind of release which this album is: single, EP or album.',
            'byArtist' => 'The artist that performed this album or recording.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['albumProductionType','albumRelease','albumReleaseType','byArtist',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
