<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * GameServer - Server that provides game interaction in a multiplayer game.
 * Extends: Intangible
 * @see    http://schema.org/GameServer
 */
class GameServer extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'GameServer';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/GameServer';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Server that provides game interaction in a multiplayer game.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

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
     * Video game which is played on this server. Inverse property: gameServer.
     * @var VideoGame [schema.org types: VideoGame]
     */
    public $game;

    /**
     * Number of players on the server.
     * @var int [schema.org types: Integer]
     */
    public $playersOnline;

    /**
     * Status of a game server.
     * @var GameServerStatus [schema.org types: GameServerStatus]
     */
    public $serverStatus;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'game',
                'playersOnline',
                'serverStatus',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'game' => ['VideoGame'],
                'playersOnline' => ['Integer'],
                'serverStatus' => ['GameServerStatus'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'game' => 'Video game which is played on this server. Inverse property: gameServer.',
                'playersOnline' => 'Number of players on the server.',
                'serverStatus' => 'Status of a game server.',
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
                [['game','playersOnline','serverStatus',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class GameServer*/
