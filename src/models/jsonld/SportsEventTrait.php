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
     * A type of sport (e.g. Baseball).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $sport;

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
}
