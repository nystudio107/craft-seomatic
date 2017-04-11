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

use nystudio107\seomatic\models\jsonld\CreativeWorkSeries;

/**
 * VideoGameSeries - A video game series.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/VideoGameSeries
 */
class VideoGameSeries extends CreativeWorkSeries
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'VideoGameSeries';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/VideoGameSeries';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A video game series.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWorkSeries';

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
     * A piece of data that represents a particular aspect of a fictional
     * character (skill, power, character points, advantage, disadvantage).
     *
     * @var Thing [schema.org types: Thing]
     */
    public $characterAttribute;

    /**
     * Cheat codes to the game.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $cheatCode;

    /**
     * A season that is part of the media series. Supersedes season.
     *
     * @var CreativeWorkSeason [schema.org types: CreativeWorkSeason]
     */
    public $containsSeason;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * An episode of a tv, radio or game media within a series or season.
     * Supersedes episodes.
     *
     * @var Episode [schema.org types: Episode]
     */
    public $episode;

    /**
     * An item is an object within the game world that can be collected by a
     * player or, occasionally, a non-player character.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $gameItem;

    /**
     * Real or fictional location of the game (or part of game).
     *
     * @var mixed|Place|PostalAddress|string [schema.org types: Place, PostalAddress, URL]
     */
    public $gameLocation;

    /**
     * The electronic systems used to play video games.
     *
     * @var mixed|string|Thing|string [schema.org types: Text, Thing, URL]
     */
    public $gamePlatform;

    /**
     * The composer of the soundtrack.
     *
     * @var mixed|MusicGroup|Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The number of episodes in this season or series.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $numberOfEpisodes;

    /**
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfPlayers;

    /**
     * The number of seasons in this series.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $numberOfSeasons;

    /**
     * Indicates whether this game is multi-player, co-op or single-player. The
     * game can be marked as multi-player, co-op and single-player at the same
     * time.
     *
     * @var mixed|GamePlayMode [schema.org types: GamePlayMode]
     */
    public $playMode;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * The task that a player-controlled character, or group of characters may
     * complete in order to gain a reward.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $quest;

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
        'characterAttribute',
        'cheatCode',
        'containsSeason',
        'director',
        'episode',
        'gameItem',
        'gameLocation',
        'gamePlatform',
        'musicBy',
        'numberOfEpisodes',
        'numberOfPlayers',
        'numberOfSeasons',
        'playMode',
        'productionCompany',
        'quest',
        'trailer'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actor' => ['Person'],
        'characterAttribute' => ['Thing'],
        'cheatCode' => ['CreativeWork'],
        'containsSeason' => ['CreativeWorkSeason'],
        'director' => ['Person'],
        'episode' => ['Episode'],
        'gameItem' => ['Thing'],
        'gameLocation' => ['Place','PostalAddress','URL'],
        'gamePlatform' => ['Text','Thing','URL'],
        'musicBy' => ['MusicGroup','Person'],
        'numberOfEpisodes' => ['Integer'],
        'numberOfPlayers' => ['QuantitativeValue'],
        'numberOfSeasons' => ['Integer'],
        'playMode' => ['GamePlayMode'],
        'productionCompany' => ['Organization'],
        'quest' => ['Thing'],
        'trailer' => ['VideoObject']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
        'characterAttribute' => 'A piece of data that represents a particular aspect of a fictional character (skill, power, character points, advantage, disadvantage).',
        'cheatCode' => 'Cheat codes to the game.',
        'containsSeason' => 'A season that is part of the media series. Supersedes season.',
        'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
        'episode' => 'An episode of a tv, radio or game media within a series or season. Supersedes episodes.',
        'gameItem' => 'An item is an object within the game world that can be collected by a player or, occasionally, a non-player character.',
        'gameLocation' => 'Real or fictional location of the game (or part of game).',
        'gamePlatform' => 'The electronic systems used to play video games.',
        'musicBy' => 'The composer of the soundtrack.',
        'numberOfEpisodes' => 'The number of episodes in this season or series.',
        'numberOfPlayers' => 'Indicate how many people can play this game (minimum, maximum, or range).',
        'numberOfSeasons' => 'The number of seasons in this series.',
        'playMode' => 'Indicates whether this game is multi-player, co-op or single-player. The game can be marked as multi-player, co-op and single-player at the same time.',
        'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
        'quest' => 'The task that a player-controlled character, or group of characters may complete in order to gain a reward.',
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
            [['actor','characterAttribute','cheatCode','containsSeason','director','episode','gameItem','gameLocation','gamePlatform','musicBy','numberOfEpisodes','numberOfPlayers','numberOfSeasons','playMode','productionCompany','quest','trailer'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
