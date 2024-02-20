<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
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
     * @var int|array|Integer|Integer[]
     */
    public $playersOnline;

    /**
     * Video game which is played on this server.
     *
     * @var array|VideoGame|VideoGame[]
     */
    public $game;

    /**
     * Status of a game server.
     *
     * @var array|GameServerStatus|GameServerStatus[]
     */
    public $serverStatus;
}
