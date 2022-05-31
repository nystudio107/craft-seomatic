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
 * Trait for VideoGameSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoGameSeries
 */

trait VideoGameSeriesTrait
{
    
    /**
     * A season in a media series.
     *
     * @var URL|CreativeWorkSeason
     */
    public $season;

    /**
     * A season that is part of the media series.
     *
     * @var CreativeWorkSeason
     */
    public $containsSeason;

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
     * An episode of a TV/radio series or season.
     *
     * @var Episode
     */
    public $episodes;

    /**
     * A piece of data that represents a particular aspect of a fictional
     * character (skill, power, character points, advantage, disadvantage).
     *
     * @var Thing
     */
    public $characterAttribute;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|Integer
     */
    public $numberOfEpisodes;

    /**
     * A season in a media series.
     *
     * @var CreativeWorkSeason
     */
    public $seasons;

    /**
     * Cheat codes to the game.
     *
     * @var CreativeWork
     */
    public $cheatCode;

    /**
     * An item is an object within the game world that can be collected by a
     * player or, occasionally, a non-player character.
     *
     * @var Thing
     */
    public $gameItem;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var Organization
     */
    public $productionCompany;

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
     * The number of seasons in this series.
     *
     * @var int|Integer
     */
    public $numberOfSeasons;

    /**
     * The composer of the soundtrack.
     *
     * @var Person|MusicGroup
     */
    public $musicBy;

    /**
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @var QuantitativeValue
     */
    public $numberOfPlayers;

    /**
     * The task that a player-controlled character, or group of characters may
     * complete in order to gain a reward.
     *
     * @var Thing
     */
    public $quest;

    /**
     * Real or fictional location of the game (or part of game).
     *
     * @var Place|URL|PostalAddress
     */
    public $gameLocation;

    /**
     * An episode of a tv, radio or game media within a series or season.
     *
     * @var Episode
     */
    public $episode;

    /**
     * A director of e.g. tv, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var Person
     */
    public $directors;

}
