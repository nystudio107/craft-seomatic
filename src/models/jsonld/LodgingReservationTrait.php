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
 * Trait for LodgingReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LodgingReservation
 */
trait LodgingReservationTrait
{
    /**
     * A full description of the lodging unit.
     *
     * @var string|array|Text|Text[]
     */
    public $lodgingUnitDescription;

    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @var array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $checkoutTime;

    /**
     * The number of adults staying in the unit.
     *
     * @var int|array|QuantitativeValue|QuantitativeValue[]|array|Integer|Integer[]
     */
    public $numAdults;

    /**
     * The number of children staying in the unit.
     *
     * @var int|array|Integer|Integer[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $numChildren;

    /**
     * The earliest someone may check into a lodging establishment.
     *
     * @var array|Time|Time[]|array|DateTime|DateTime[]
     */
    public $checkinTime;

    /**
     * Textual description of the unit type (including suite vs. room, size of
     * bed, etc.).
     *
     * @var string|array|QualitativeValue|QualitativeValue[]|array|Text|Text[]
     */
    public $lodgingUnitType;
}
