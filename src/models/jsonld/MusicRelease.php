<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MusicPlaylist;

/**
 * MusicRelease - A MusicRelease is a specific release of a music album.
 *
 * Extends: MusicPlaylist
 * @see    http://schema.org/MusicRelease
 */
class MusicRelease extends MusicPlaylist
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MusicRelease';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MusicRelease';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A MusicRelease is a specific release of a music album.';

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
     * The catalog number for the release.
     *
     * @var string [schema.org types: Text]
     */
    public $catalogNumber;

    /**
     * The group the release is credited to if different than the byArtist. For
     * example, Red and Blue is credited to "Stefani Germanotta Band", but by Lady
     * Gaga.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $creditedTo;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * Format of this release (the type of recording media used, ie. compact disc,
     * digital media, LP, etc.).
     *
     * @var mixed|MusicReleaseFormatType [schema.org types: MusicReleaseFormatType]
     */
    public $musicReleaseFormat;

    /**
     * The label that issued the release.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $recordLabel;

    /**
     * The album this is a release of. Inverse property: albumRelease.
     *
     * @var mixed|MusicAlbum [schema.org types: MusicAlbum]
     */
    public $releaseOf;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'catalogNumber',
            'creditedTo',
            'duration',
            'musicReleaseFormat',
            'recordLabel',
            'releaseOf',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'catalogNumber' => ['Text'],
            'creditedTo' => ['Organization','Person'],
            'duration' => ['Duration'],
            'musicReleaseFormat' => ['MusicReleaseFormatType'],
            'recordLabel' => ['Organization'],
            'releaseOf' => ['MusicAlbum'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'catalogNumber' => 'The catalog number for the release.',
            'creditedTo' => 'The group the release is credited to if different than the byArtist. For example, Red and Blue is credited to "Stefani Germanotta Band", but by Lady Gaga.',
            'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
            'musicReleaseFormat' => 'Format of this release (the type of recording media used, ie. compact disc, digital media, LP, etc.).',
            'recordLabel' => 'The label that issued the release.',
            'releaseOf' => 'The album this is a release of. Inverse property: albumRelease.',
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
            [['catalogNumber','creditedTo','duration','musicReleaseFormat','recordLabel','releaseOf',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
