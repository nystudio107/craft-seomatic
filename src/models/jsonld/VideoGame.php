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

use nystudio107\seomatic\models\jsonld\SoftwareApplication;

/**
 * VideoGame - A video game is an electronic game that involves human
 * interaction with a user interface to generate visual feedback on a video
 * device.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/VideoGame
 */
class VideoGame extends SoftwareApplication
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'VideoGame';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/VideoGame';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A video game is an electronic game that involves human interaction with a user interface to generate visual feedback on a video device.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'SoftwareApplication';

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
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     *
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * Cheat codes to the game.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $cheatCode;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * The electronic systems used to play video games.
     *
     * @var mixed|string|Thing|string [schema.org types: Text, Thing, URL]
     */
    public $gamePlatform;

    /**
     * The server on which it is possible to play the game. Inverse property:
     * game.
     *
     * @var mixed|GameServer [schema.org types: GameServer]
     */
    public $gameServer;

    /**
     * Links to tips, tactics, etc.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $gameTip;

    /**
     * The composer of the soundtrack.
     *
     * @var mixed|MusicGroup|Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * Indicates whether this game is multi-player, co-op or single-player. The
     * game can be marked as multi-player, co-op and single-player at the same
     * time.
     *
     * @var mixed|GamePlayMode [schema.org types: GamePlayMode]
     */
    public $playMode;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     *
     * @var mixed|VideoObject [schema.org types: VideoObject]
     */
    public $trailer;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'actor',
        'cheatCode',
        'director',
        'gamePlatform',
        'gameServer',
        'gameTip',
        'musicBy',
        'playMode',
        'trailer'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actor' => ['Person'],
        'cheatCode' => ['CreativeWork'],
        'director' => ['Person'],
        'gamePlatform' => ['Text','Thing','URL'],
        'gameServer' => ['GameServer'],
        'gameTip' => ['CreativeWork'],
        'musicBy' => ['MusicGroup','Person'],
        'playMode' => ['GamePlayMode'],
        'trailer' => ['VideoObject']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
        'cheatCode' => 'Cheat codes to the game.',
        'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
        'gamePlatform' => 'The electronic systems used to play video games.',
        'gameServer' => 'The server on which it is possible to play the game. Inverse property: game.',
        'gameTip' => 'Links to tips, tactics, etc.',
        'musicBy' => 'The composer of the soundtrack.',
        'playMode' => 'Indicates whether this game is multi-player, co-op or single-player. The game can be marked as multi-player, co-op and single-player at the same time.',
        'trailer' => 'The trailer of a movie or tv/radio series, season, episode, etc.'
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
            [['actor','cheatCode','director','gamePlatform','gameServer','gameTip','musicBy','playMode','trailer'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
