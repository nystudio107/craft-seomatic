<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\SoftwareApplication;

/**
 * VideoGame - A video game is an electronic game that involves human
 * interaction with a user interface to generate visual feedback on a video
 * device.
 * Extends: SoftwareApplication
 * @see    http://schema.org/VideoGame
 */
class VideoGame extends SoftwareApplication
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'VideoGame';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/VideoGame';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A video game is an electronic game that involves human interaction with a user interface to generate visual feedback on a video device.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'SoftwareApplication';

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
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * Cheat codes to the game.
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $cheatCode;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * The electronic systems used to play video games.
     * @var mixed string, Thing, string [schema.org types: Text, Thing, URL]
     */
    public $gamePlatform;

    /**
     * The server on which it is possible to play the game. Inverse property:
     * game.
     * @var mixed GameServer [schema.org types: GameServer]
     */
    public $gameServer;

    /**
     * Links to tips, tactics, etc.
     * @var mixed CreativeWork [schema.org types: CreativeWork]
     */
    public $gameTip;

    /**
     * The composer of the soundtrack.
     * @var mixed MusicGroup, Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * Indicates whether this game is multi-player, co-op or single-player. The
     * game can be marked as multi-player, co-op and single-player at the same
     * time.
     * @var mixed GamePlayMode [schema.org types: GamePlayMode]
     */
    public $playMode;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     * @var mixed VideoObject [schema.org types: VideoObject]
     */
    public $trailer;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'actor',
                'cheatCode',
                'director',
                'gamePlatform',
                'gameServer',
                'gameTip',
                'musicBy',
                'playMode',
                'trailer',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'actor' => ['Person'],
                'cheatCode' => ['CreativeWork'],
                'director' => ['Person'],
                'gamePlatform' => ['Text','Thing','URL'],
                'gameServer' => ['GameServer'],
                'gameTip' => ['CreativeWork'],
                'musicBy' => ['MusicGroup','Person'],
                'playMode' => ['GamePlayMode'],
                'trailer' => ['VideoObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
                'cheatCode' => 'Cheat codes to the game.',
                'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
                'gamePlatform' => 'The electronic systems used to play video games.',
                'gameServer' => 'The server on which it is possible to play the game. Inverse property: game.',
                'gameTip' => 'Links to tips, tactics, etc.',
                'musicBy' => 'The composer of the soundtrack.',
                'playMode' => 'Indicates whether this game is multi-player, co-op or single-player. The game can be marked as multi-player, co-op and single-player at the same time.',
                'trailer' => 'The trailer of a movie or tv/radio series, season, episode, etc.',
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
                [['actor','cheatCode','director','gamePlatform','gameServer','gameTip','musicBy','playMode','trailer',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class VideoGame*/
