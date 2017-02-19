<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PerformingGroup;

/**
 * MusicGroup - A musical group, such as a band, an orchestra, or a choir. Can
 * also be a solo musician.
 *
 * Extends: PerformingGroup
 * @see    http://schema.org/MusicGroup
 */
class MusicGroup extends PerformingGroup
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MusicGroup';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MusicGroup';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A musical group, such as a band, an orchestra, or a choir. Can also be a solo musician.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'PerformingGroup';

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
     * A music album. Supersedes albums.
     *
     * @var MusicAlbum [schema.org types: MusicAlbum]
     */
    public $album;

    /**
     * Genre of the creative work or group.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $genre;

    /**
     * A music recording (track)—usually a single song. If an ItemList is given,
     * the list should contain items of type MusicRecording. Supersedes tracks.
     *
     * @var mixed|ItemList|MusicRecording [schema.org types: ItemList, MusicRecording]
     */
    public $track;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'album',
            'genre',
            'track',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'album' => ['MusicAlbum'],
            'genre' => ['Text','URL'],
            'track' => ['ItemList','MusicRecording'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'album' => 'A music album. Supersedes albums.',
            'genre' => 'Genre of the creative work or group.',
            'track' => 'A music recording (track)—usually a single song. If an ItemList is given, the list should contain items of type MusicRecording. Supersedes tracks.',
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
            [['album','genre','track',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
