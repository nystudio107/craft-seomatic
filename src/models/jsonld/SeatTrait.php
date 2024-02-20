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
 * Trait for Seat.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Seat
 */
trait SeatTrait
{
    /**
     * The type/class of the seat.
     *
     * @var string|array|Text|Text[]|array|QualitativeValue|QualitativeValue[]
     */
    public $seatingType;

    /**
     * The section location of the reserved seat (e.g. Orchestra).
     *
     * @var string|array|Text|Text[]
     */
    public $seatSection;

    /**
     * The row location of the reserved seat (e.g., B).
     *
     * @var string|array|Text|Text[]
     */
    public $seatRow;

    /**
     * The location of the reserved seat (e.g., 27).
     *
     * @var string|array|Text|Text[]
     */
    public $seatNumber;
}
