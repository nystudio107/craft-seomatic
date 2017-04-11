<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * MusicRecording - A music recording (track), usually a single song.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MusicRecording
 */
class MusicRecording extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MusicRecording';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MusicRecording';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A music recording (track), usually a single song.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The artist that performed this album or recording.
     *
     * @var MusicGroup [schema.org types: MusicGroup]
     */
    public $byArtist;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * The album to which this recording belongs.
     *
     * @var MusicAlbum [schema.org types: MusicAlbum]
     */
    public $inAlbum;

    /**
     * The playlist to which this recording belongs.
     *
     * @var MusicPlaylist [schema.org types: MusicPlaylist]
     */
    public $inPlaylist;

    /**
     * The International Standard Recording Code for the recording.
     *
     * @var string [schema.org types: Text]
     */
    public $isrcCode;

    /**
     * The composition this track is a recording of. Inverse property: recordedAs.
     *
     * @var MusicComposition [schema.org types: MusicComposition]
     */
    public $recordingOf;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'byArtist',
        'duration',
        'inAlbum',
        'inPlaylist',
        'isrcCode',
        'recordingOf'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'byArtist' => ['MusicGroup'],
        'duration' => ['Duration'],
        'inAlbum' => ['MusicAlbum'],
        'inPlaylist' => ['MusicPlaylist'],
        'isrcCode' => ['Text'],
        'recordingOf' => ['MusicComposition']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'byArtist' => 'The artist that performed this album or recording.',
        'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
        'inAlbum' => 'The album to which this recording belongs.',
        'inPlaylist' => 'The playlist to which this recording belongs.',
        'isrcCode' => 'The International Standard Recording Code for the recording.',
        'recordingOf' => 'The composition this track is a recording of. Inverse property: recordedAs.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['byArtist','duration','inAlbum','inPlaylist','isrcCode','recordingOf'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
