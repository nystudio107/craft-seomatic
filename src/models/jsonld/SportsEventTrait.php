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
 * Trait for SportsEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SportsEvent
 */
trait SportsEventTrait
{
    /**
     * The away team in a sports event.
     *
     * @var array|Person|Person[]|array|SportsTeam|SportsTeam[]
     */
    public $awayTeam;

    /**
     * A competitor in a sports event.
     *
     * @var array|Person|Person[]|array|SportsTeam|SportsTeam[]
     */
    public $competitor;

    /**
     * The home team in a sports event.
     *
     * @var array|Person|Person[]|array|SportsTeam|SportsTeam[]
     */
    public $homeTeam;

    /**
     * An official who watches a game or match closely to enforce the rules and
     * arbitrate on matters arising from the play such as referees, umpires or
     * judges. The name of the effective function can vary according to the sport.
     *
     * @var array|Person|Person[]
     */
    public $referee;

    /**
     * A type of sport (e.g. Baseball).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $sport;
}
