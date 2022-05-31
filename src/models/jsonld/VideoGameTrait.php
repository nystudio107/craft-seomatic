<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for VideoGame.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoGame
 */

trait VideoGameTrait
{
    
    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     *
     * @var VideoObject
     */
    public $trailer;

    /**
     * The edition of a video game.
     *
     * @var string|Text
     */
    public $gameEdition;

    /**
     * Cheat codes to the game.
     *
     * @var CreativeWork
     */
    public $cheatCode;

    /**
     * The server on which  it is possible to play the game.
     *
     * @var GameServer
     */
    public $gameServer;

    /**
     * Links to tips, tactics, etc.
     *
     * @var CreativeWork
     */
    public $gameTip;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $actors;

    /**
     * Indicates whether this game is multi-player, co-op or single-player.  The
     * game can be marked as multi-player, co-op and single-player at the same
     * time.
     *
     * @var GamePlayMode
     */
    public $playMode;

    /**
     * The electronic systems used to play <a
     * href="http://en.wikipedia.org/wiki/Category:Video_game_platforms">video
     * games</a>.
     *
     * @var string|Text|URL|Thing
     */
    public $gamePlatform;

    /**
     * The composer of the soundtrack.
     *
     * @var Person|MusicGroup
     */
    public $musicBy;

    /**
     * A director of e.g. tv, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

}
