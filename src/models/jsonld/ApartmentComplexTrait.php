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
 * Trait for ApartmentComplex.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ApartmentComplex
 */
trait ApartmentComplexTrait
{
    /**
     * A page providing information on how to book a tour of some [[Place]], such
     * as an [[Accommodation]] or [[ApartmentComplex]] in a real estate setting,
     * as well as other kinds of tours as appropriate.
     *
     * @var URL
     */
    public $tourBookingPage;

    /**
     * The total integer number of bedrooms in a some [[Accommodation]],
     * [[ApartmentComplex]] or [[FloorPlan]].
     *
     * @var float|Number|QuantitativeValue
     */
    public $numberOfBedrooms;

    /**
     * Indicates the number of available accommodation units in an
     * [[ApartmentComplex]], or the number of accommodation units for a specific
     * [[FloorPlan]] (within its specific [[ApartmentComplex]]). See also
     * [[numberOfAccommodationUnits]].
     *
     * @var QuantitativeValue
     */
    public $numberOfAvailableAccommodationUnits;

    /**
     * Indicates the total (available plus unavailable) number of accommodation
     * units in an [[ApartmentComplex]], or the number of accommodation units for
     * a specific [[FloorPlan]] (within its specific [[ApartmentComplex]]). See
     * also [[numberOfAvailableAccommodationUnits]].
     *
     * @var QuantitativeValue
     */
    public $numberOfAccommodationUnits;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var string|bool|Text|Boolean
     */
    public $petsAllowed;
}
