<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for SportsEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SportsEvent
 */
trait SportsEventTrait
{
    /**
     * A competitor in a sports event.
     *
     * @var SportsTeam|Person
     */
    public $competitor;

    /**
     * The away team in a sports event.
     *
     * @var SportsTeam|Person
     */
    public $awayTeam;

    /**
     * A type of sport (e.g. Baseball).
     *
     * @var string|Text|URL
     */
    public $sport;

    /**
     * The home team in a sports event.
     *
     * @var SportsTeam|Person
     */
    public $homeTeam;
}
