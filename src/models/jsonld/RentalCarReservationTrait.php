<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for RentalCarReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RentalCarReservation
 */

trait RentalCarReservationTrait
{
    
    /**
     * Where a rental car can be dropped off.
     *
     * @var Place
     */
    public $dropoffLocation;

    /**
     * When a rental car can be dropped off.
     *
     * @var DateTime
     */
    public $dropoffTime;

    /**
     * When a taxi will pickup a passenger or a rental car can be picked up.
     *
     * @var DateTime
     */
    public $pickupTime;

    /**
     * Where a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @var Place
     */
    public $pickupLocation;

}
