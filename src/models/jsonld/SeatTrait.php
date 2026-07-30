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
 * Trait for Seat.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Seat
 */
trait SeatTrait
{
    /**
     * The location of the reserved seat (e.g., 27).
     *
     * @var string|array|Text|Text[]
     */
    public $seatNumber;

    /**
     * The row location of the reserved seat (e.g., B).
     *
     * @var string|array|Text|Text[]
     */
    public $seatRow;

    /**
     * The section location of the reserved seat (e.g. Orchestra).
     *
     * @var string|array|Text|Text[]
     */
    public $seatSection;

    /**
     * The type/class of the seat.
     *
     * @var string|array|QualitativeValue|QualitativeValue[]|array|Text|Text[]
     */
    public $seatingType;
}
