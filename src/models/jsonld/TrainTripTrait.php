<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for TrainTrip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TrainTrip
 */

trait TrainTripTrait
{
    
    /**
     * The name of the train (e.g. The Orient Express).
     *
     * @var string|Text
     */
    public $trainName;

    /**
     * The station from which the train departs.
     *
     * @var TrainStation
     */
    public $departureStation;

    /**
     * The platform from which the train departs.
     *
     * @var string|Text
     */
    public $departurePlatform;

    /**
     * The unique identifier for the train.
     *
     * @var string|Text
     */
    public $trainNumber;

    /**
     * The platform where the train arrives.
     *
     * @var string|Text
     */
    public $arrivalPlatform;

    /**
     * The station where the train trip ends.
     *
     * @var TrainStation
     */
    public $arrivalStation;

}
