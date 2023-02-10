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
 * Trait for TrainTrip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TrainTrip
 */
trait TrainTripTrait
{
    /**
     * The platform where the train arrives.
     *
     * @var string|Text
     */
    public $arrivalPlatform;

    /**
     * The platform from which the train departs.
     *
     * @var string|Text
     */
    public $departurePlatform;

    /**
     * The station where the train trip ends.
     *
     * @var TrainStation
     */
    public $arrivalStation;

    /**
     * The name of the train (e.g. The Orient Express).
     *
     * @var string|Text
     */
    public $trainName;

    /**
     * The unique identifier for the train.
     *
     * @var string|Text
     */
    public $trainNumber;

    /**
     * The station from which the train departs.
     *
     * @var TrainStation
     */
    public $departureStation;
}
