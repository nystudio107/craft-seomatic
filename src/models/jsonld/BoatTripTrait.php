<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for BoatTrip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BoatTrip
 */
trait BoatTripTrait
{
    /**
     * The terminal or port from which the boat departs.
     *
     * @var BoatTerminal
     */
    public $departureBoatTerminal;

    /**
     * The terminal or port from which the boat arrives.
     *
     * @var BoatTerminal
     */
    public $arrivalBoatTerminal;
}
