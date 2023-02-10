<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for GameServer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GameServer
 */
trait GameServerTrait
{
    /**
     * Number of players on the server.
     *
     * @var int|Integer
     */
    public $playersOnline;

    /**
     * Video game which is played on this server.
     *
     * @var VideoGame
     */
    public $game;

    /**
     * Status of a game server.
     *
     * @var GameServerStatus
     */
    public $serverStatus;
}
