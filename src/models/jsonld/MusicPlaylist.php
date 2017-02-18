<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * MusicPlaylist - A collection of music tracks in playlist form.
 * Extends: CreativeWork
 * @see    http://schema.org/MusicPlaylist
 */
class MusicPlaylist extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MusicPlaylist';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MusicPlaylist';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A collection of music tracks in playlist form.';

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
     * The number of tracks in this album or playlist.
     * @var int [schema.org types: Integer]
     */
    public $numTracks;

    /**
     * A music recording (track)—usually a single song. If an ItemList is given,
     * the list should contain items of type MusicRecording. Supersedes tracks.
     * @var mixed ItemList, MusicRecording [schema.org types: ItemList, MusicRecording]
     */
    public $track;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'numTracks',
                'track',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'numTracks' => ['Integer'],
                'track' => ['ItemList','MusicRecording'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'numTracks' => 'The number of tracks in this album or playlist.',
                'track' => 'A music recording (track)—usually a single song. If an ItemList is given, the list should contain items of type MusicRecording. Supersedes tracks.',
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
                [['numTracks','track',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MusicPlaylist*/
