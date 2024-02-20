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
 * Trait for EngineSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EngineSpecification
 */
trait EngineSpecificationTrait
{
    /**
     * The type of engine or engines powering the vehicle.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|QualitativeValue|QualitativeValue[]
     */
    public $engineType;

    /**
     * The type of fuel suitable for the engine or engines of the vehicle. If the
     * vehicle has only one engine, this property can be attached directly to the
     * vehicle.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|QualitativeValue|QualitativeValue[]
     */
    public $fuelType;

    /**
     * The volume swept by all of the pistons inside the cylinders of an internal
     * combustion engine in a single movement.   Typical unit code(s): CMQ for
     * cubic centimeter, LTR for liters, INQ for cubic inches * Note 1: You can
     * link to information about how the given value has been determined using the
     * [[valueReference]] property. * Note 2: You can use [[minValue]] and
     * [[maxValue]] to indicate ranges.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $engineDisplacement;

    /**
     * The power of the vehicle's engine.     Typical unit code(s): KWT for
     * kilowatt, BHP for brake horsepower, N12 for metric horsepower (PS, with 1
     * PS = 735,49875 W)  * Note 1: There are many different ways of measuring an
     * engine's power. For an overview, see
     * [http://en.wikipedia.org/wiki/Horsepower#Engine\_power\_test\_codes](http://en.wikipedia.org/wiki/Horsepower#Engine_power_test_codes).
     * * Note 2: You can link to information about how the given value has been
     * determined using the [[valueReference]] property. * Note 3: You can use
     * [[minValue]] and [[maxValue]] to indicate ranges.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $enginePower;

    /**
     * The torque (turning force) of the vehicle's engine.  Typical unit code(s):
     * NU for newton metre (N m), F17 for pound-force per foot, or F48 for
     * pound-force per inch  * Note 1: You can link to information about how the
     * given value has been determined (e.g. reference RPM) using the
     * [[valueReference]] property. * Note 2: You can use [[minValue]] and
     * [[maxValue]] to indicate ranges.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $torque;
}
