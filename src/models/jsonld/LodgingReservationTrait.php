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
 * Trait for LodgingReservation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LodgingReservation
 */

trait LodgingReservationTrait
{
    
    /**
     * Textual description of the unit type (including suite vs. room, size of
     * bed, etc.).
     *
     * @var string|QualitativeValue|Text
     */
    public $lodgingUnitType;

    /**
     * A full description of the lodging unit.
     *
     * @var string|Text
     */
    public $lodgingUnitDescription;

    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @var DateTime|Time
     */
    public $checkoutTime;

    /**
     * The number of adults staying in the unit.
     *
     * @var int|Integer|QuantitativeValue
     */
    public $numAdults;

    /**
     * The earliest someone may check into a lodging establishment.
     *
     * @var DateTime|Time
     */
    public $checkinTime;

    /**
     * The number of children staying in the unit.
     *
     * @var int|Integer|QuantitativeValue
     */
    public $numChildren;

}
