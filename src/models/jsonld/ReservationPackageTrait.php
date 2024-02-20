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
 * Trait for ReservationPackage.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ReservationPackage
 */
trait ReservationPackageTrait
{
    /**
     * The individual reservations included in the package. Typically a repeated
     * property.
     *
     * @var array|Reservation|Reservation[]
     */
    public $subReservation;
}
