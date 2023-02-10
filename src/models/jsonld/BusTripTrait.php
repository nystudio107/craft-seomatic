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
 * Trait for BusTrip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BusTrip
 */
trait BusTripTrait
{
    /**
     * The name of the bus (e.g. Bolt Express).
     *
     * @var string|Text
     */
    public $busName;

    /**
     * The unique identifier for the bus.
     *
     * @var string|Text
     */
    public $busNumber;

    /**
     * The stop or station from which the bus departs.
     *
     * @var BusStop|BusStation
     */
    public $departureBusStop;

    /**
     * The stop or station from which the bus arrives.
     *
     * @var BusStop|BusStation
     */
    public $arrivalBusStop;
}
