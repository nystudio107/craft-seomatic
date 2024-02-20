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
 * Trait for TrainTrip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TrainTrip
 */
trait TrainTripTrait
{
    /**
     * The station from which the train departs.
     *
     * @var array|TrainStation|TrainStation[]
     */
    public $departureStation;

    /**
     * The unique identifier for the train.
     *
     * @var string|array|Text|Text[]
     */
    public $trainNumber;

    /**
     * The station where the train trip ends.
     *
     * @var array|TrainStation|TrainStation[]
     */
    public $arrivalStation;

    /**
     * The platform where the train arrives.
     *
     * @var string|array|Text|Text[]
     */
    public $arrivalPlatform;

    /**
     * The name of the train (e.g. The Orient Express).
     *
     * @var string|array|Text|Text[]
     */
    public $trainName;

    /**
     * The platform from which the train departs.
     *
     * @var string|array|Text|Text[]
     */
    public $departurePlatform;
}
