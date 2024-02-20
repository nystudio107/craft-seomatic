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
 * Trait for Airport.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Airport
 */
trait AirportTrait
{
    /**
     * IATA identifier for an airline or airport.
     *
     * @var string|array|Text|Text[]
     */
    public $iataCode;

    /**
     * ICAO identifier for an airport.
     *
     * @var string|array|Text|Text[]
     */
    public $icaoCode;
}
