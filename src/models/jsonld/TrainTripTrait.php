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
 * schema.org version: v30.0
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
     * @var string|array|Text|Text[]
     */
    public $arrivalPlatform;

    /**
     * The station where the train trip ends.
     *
     * @var array|TrainStation|TrainStation[]
     */
    public $arrivalStation;

    /**
     * The platform from which the train departs.
     *
     * @var string|array|Text|Text[]
     */
    public $departurePlatform;

    /**
     * The station from which the train departs.
     *
     * @var array|TrainStation|TrainStation[]
     */
    public $departureStation;

    /**
     * The name of the train (e.g. The Orient Express).
     *
     * @var string|array|Text|Text[]
     */
    public $trainName;

    /**
     * The unique identifier for the train.
     *
     * @var string|array|Text|Text[]
     */
    public $trainNumber;
}
