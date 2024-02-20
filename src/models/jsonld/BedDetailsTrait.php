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
 * Trait for BedDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BedDetails
 */
trait BedDetailsTrait
{
    /**
     * The quantity of the given bed type available in the HotelRoom, Suite,
     * House, or Apartment.
     *
     * @var float|array|Number|Number[]
     */
    public $numberOfBeds;

    /**
     * The type of bed to which the BedDetail refers, i.e. the type of bed
     * available in the quantity indicated by quantity.
     *
     * @var string|array|Text|Text[]|array|BedType|BedType[]
     */
    public $typeOfBed;
}
