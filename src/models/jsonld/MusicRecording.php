<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * MusicRecording - A music recording (track), usually a single song.
 * Extends: CreativeWork
 * @see    http://schema.org/MusicRecording
 */
class MusicRecording extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MusicRecording';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MusicRecording';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A music recording (track), usually a single song.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

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
     * The artist that performed this album or recording.
     * @var MusicGroup [schema.org types: MusicGroup]
     */
    public $byArtist;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     * @var Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * The album to which this recording belongs.
     * @var MusicAlbum [schema.org types: MusicAlbum]
     */
    public $inAlbum;

    /**
     * The playlist to which this recording belongs.
     * @var MusicPlaylist [schema.org types: MusicPlaylist]
     */
    public $inPlaylist;

    /**
     * The International Standard Recording Code for the recording.
     * @var string [schema.org types: Text]
     */
    public $isrcCode;

    /**
     * The composition this track is a recording of. Inverse property: recordedAs.
     * @var MusicComposition [schema.org types: MusicComposition]
     */
    public $recordingOf;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'byArtist',
                'duration',
                'inAlbum',
                'inPlaylist',
                'isrcCode',
                'recordingOf',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'byArtist' => ['MusicGroup'],
                'duration' => ['Duration'],
                'inAlbum' => ['MusicAlbum'],
                'inPlaylist' => ['MusicPlaylist'],
                'isrcCode' => ['Text'],
                'recordingOf' => ['MusicComposition'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'byArtist' => 'The artist that performed this album or recording.',
                'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
                'inAlbum' => 'The album to which this recording belongs.',
                'inPlaylist' => 'The playlist to which this recording belongs.',
                'isrcCode' => 'The International Standard Recording Code for the recording.',
                'recordingOf' => 'The composition this track is a recording of. Inverse property: recordedAs.',
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
                [['byArtist','duration','inAlbum','inPlaylist','isrcCode','recordingOf',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MusicRecording*/
