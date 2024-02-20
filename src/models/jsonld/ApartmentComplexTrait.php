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
 * Trait for ApartmentComplex.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ApartmentComplex
 */
trait ApartmentComplexTrait
{
    /**
     * Indicates the total (available plus unavailable) number of accommodation
     * units in an [[ApartmentComplex]], or the number of accommodation units for
     * a specific [[FloorPlan]] (within its specific [[ApartmentComplex]]). See
     * also [[numberOfAvailableAccommodationUnits]].
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfAccommodationUnits;

    /**
     * A page providing information on how to book a tour of some [[Place]], such
     * as an [[Accommodation]] or [[ApartmentComplex]] in a real estate setting,
     * as well as other kinds of tours as appropriate.
     *
     * @var array|URL|URL[]
     */
    public $tourBookingPage;

    /**
     * The total integer number of bedrooms in a some [[Accommodation]],
     * [[ApartmentComplex]] or [[FloorPlan]].
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfBedrooms;

    /**
     * Indicates the number of available accommodation units in an
     * [[ApartmentComplex]], or the number of accommodation units for a specific
     * [[FloorPlan]] (within its specific [[ApartmentComplex]]). See also
     * [[numberOfAccommodationUnits]].
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfAvailableAccommodationUnits;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var bool|string|array|Boolean|Boolean[]|array|Text|Text[]
     */
    public $petsAllowed;
}
