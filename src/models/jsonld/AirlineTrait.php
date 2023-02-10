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
 * Trait for Airline.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Airline
 */
trait AirlineTrait
{
    /**
     * The type of boarding policy used by the airline (e.g. zone-based or
     * group-based).
     *
     * @var BoardingPolicyType
     */
    public $boardingPolicy;

    /**
     * IATA identifier for an airline or airport.
     *
     * @var string|Text
     */
    public $iataCode;
}
