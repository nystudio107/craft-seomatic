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
     * @var string|array|Text|Text[]
     */
    public $busName;

    /**
     * The stop or station from which the bus departs.
     *
     * @var array|BusStation|BusStation[]|array|BusStop|BusStop[]
     */
    public $departureBusStop;

    /**
     * The unique identifier for the bus.
     *
     * @var string|array|Text|Text[]
     */
    public $busNumber;

    /**
     * The stop or station from which the bus arrives.
     *
     * @var array|BusStation|BusStation[]|array|BusStop|BusStop[]
     */
    public $arrivalBusStop;
}
