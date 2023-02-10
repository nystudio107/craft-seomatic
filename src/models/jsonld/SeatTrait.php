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
 * Trait for Seat.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Seat
 */
trait SeatTrait
{
    /**
     * The section location of the reserved seat (e.g. Orchestra).
     *
     * @var string|Text
     */
    public $seatSection;

    /**
     * The location of the reserved seat (e.g., 27).
     *
     * @var string|Text
     */
    public $seatNumber;

    /**
     * The type/class of the seat.
     *
     * @var string|Text|QualitativeValue
     */
    public $seatingType;

    /**
     * The row location of the reserved seat (e.g., B).
     *
     * @var string|Text
     */
    public $seatRow;
}
