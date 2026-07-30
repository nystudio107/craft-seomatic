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
 * schema.org version: v30.0
 * Trait for VideoGameSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VideoGameSeries
 */
trait VideoGameSeriesTrait
{
    /**
     * An actor (individual or a group), e.g. in TV, radio, movie, video games
     * etc., or in an event. Actors can be associated with individual items or
     * with a series, episode, clip.
     *
     * @var array|PerformingGroup|PerformingGroup[]|array|Person|Person[]
     */
    public $actor;

    /**
     * An actor, e.g. in TV, radio, movie, video games etc. Actors can be
     * associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $actors;

    /**
     * A piece of data that represents a particular aspect of a fictional
     * character (skill, power, character points, advantage, disadvantage).
     *
     * @var array|Thing|Thing[]
     */
    public $characterAttribute;

    /**
     * Cheat codes to the game.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $cheatCode;

    /**
     * A season that is part of the media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $containsSeason;

    /**
     * A director of e.g. TV, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $director;

    /**
     * A director of e.g. TV, radio, movie, video games etc. content. Directors
     * can be associated with individual items or with a series, episode, clip.
     *
     * @var array|Person|Person[]
     */
    public $directors;

    /**
     * An episode of a TV, radio or game media within a series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episode;

    /**
     * An episode of a TV/radio series or season.
     *
     * @var array|Episode|Episode[]
     */
    public $episodes;

    /**
     * An item is an object within the game world that can be collected by a
     * player or, occasionally, a non-player character.
     *
     * @var array|Thing|Thing[]
     */
    public $gameItem;

    /**
     * Real or fictional location of the game (or part of game).
     *
     * @var array|Place|Place[]|array|PostalAddress|PostalAddress[]|array|URL|URL[]
     */
    public $gameLocation;

    /**
     * The electronic systems used to play <a
     * href="http://en.wikipedia.org/wiki/Category:Video_game_platforms">video
     * games</a>.
     *
     * @var string|array|Text|Text[]|array|Thing|Thing[]|array|URL|URL[]
     */
    public $gamePlatform;

    /**
     * The composer of the soundtrack.
     *
     * @var array|MusicGroup|MusicGroup[]|array|Person|Person[]
     */
    public $musicBy;

    /**
     * The number of episodes in this season or series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfEpisodes;

    /**
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfPlayers;

    /**
     * The number of seasons in this series.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfSeasons;

    /**
     * Indicates whether this game is multi-player, co-op or single-player.  The
     * game can be marked as multi-player, co-op and single-player at the same
     * time.
     *
     * @var array|GamePlayMode|GamePlayMode[]
     */
    public $playMode;

    /**
     * The production company or studio responsible for the item, e.g. series,
     * video game, episode etc.
     *
     * @var array|Organization|Organization[]
     */
    public $productionCompany;

    /**
     * The task that a player-controlled character, or group of characters may
     * complete in order to gain a reward.
     *
     * @var array|Thing|Thing[]
     */
    public $quest;

    /**
     * A season in a media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]|array|URL|URL[]
     */
    public $season;

    /**
     * A season in a media series.
     *
     * @var array|CreativeWorkSeason|CreativeWorkSeason[]
     */
    public $seasons;

    /**
     * The trailer of a movie or TV/radio series, season, episode, etc.
     *
     * @var array|VideoObject|VideoObject[]
     */
    public $trailer;
}
