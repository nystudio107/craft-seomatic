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
 * Trait for VideoGameSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoGameSeries
 */
trait VideoGameSeriesTrait
{
    /**
     * An item is an object within the game world that can be collected by a
     * player or, occasionally, a non-player character.
     *
     * @var array|Thing|Thing[]
     */
    public $gameItem;

    /**
     * A season in a media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $seasons;

    /**
     * Cheat codes to the game.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $cheatCode;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * Indicates whether this game is multi-player, co-op or single-player.  The
     * game can be marked as multi-player, co-op and single-player at the same
     * time.
     *
     * @var array|GamePlayMode|GamePlayMode[]
     */
    public $playMode;

    /**
     * The number of seasons in this series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfSeasons;

    /**
     * The electronic systems used to play <a
     * href="http://en.wikipedia.org/wiki/Category:Video_game_platforms">video
     * games</a>.
     *
     * @var string|array|Thing|Thing[]|array|Text|Text[]|array|URL|URL[]
     */
    public $gamePlatform;

    /**
     * The task that a player-controlled character, or group of characters may
     * complete in order to gain a reward.
     *
     * @var array|Thing|Thing[]
     */
    public $quest;

    /**
     * An episode of a TV/radio series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episodes;

    /**
     * An episode of a TV, radio or game media within a series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episode;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var array|VideoObject|VideoObject[]
     */
    public $trailer;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var array|Organization|Organization[]
     */
    public $productionCompany;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $directors;

    /**
     * A season in a media series.
     *
     * @var array|URL|URL[]|array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $season;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfEpisodes;

    /**
     * A season that is part of the media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $containsSeason;

    /**
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfPlayers;

    /**
     * Real or fictional location of the game (or part of game).
     *
     * @var array|PostalAddress|PostalAddress[]|array|Place|Place[]|array|URL|URL[]
     */
    public $gameLocation;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $actors;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var array|Person|Person[]
     */
    public $actor;

    /**
     * A piece of data that represents a particular aspect of a fictional
     * character (skill, power, character points, advantage, disadvantage).
     *
     * @var array|Thing|Thing[]
     */
    public $characterAttribute;

    /**
     * The composer of the soundtrack.
     *
     * @var array|Person|Person[]|array|MusicGroup|MusicGroup[]
     */
    public $musicBy;
}
