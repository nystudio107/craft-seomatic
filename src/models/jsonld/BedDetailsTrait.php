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
 * Trait for BedDetails.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BedDetails
 */
trait BedDetailsTrait
{
    /**
     * The type of bed to which the BedDetail refers, i.e. the type of bed
     * available in the quantity indicated by quantity.
     *
     * @var string|BedType|Text
     */
    public $typeOfBed;

    /**
     * The quantity of the given bed type available in the HotelRoom, Suite,
     * House, or Apartment.
     *
     * @var float|Number
     */
    public $numberOfBeds;
}
