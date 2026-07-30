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
 * Trait for Game.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Game
 */
trait GameTrait
{
    /**
     * A piece of data that represents a particular aspect of a fictional
     * character (skill, power, character points, advantage, disadvantage).
     *
     * @var array|Thing|Thing[]
     */
    public $characterAttribute;

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
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfPlayers;

    /**
     * The task that a player-controlled character, or group of characters may
     * complete in order to gain a reward.
     *
     * @var array|Thing|Thing[]
     */
    public $quest;
}
