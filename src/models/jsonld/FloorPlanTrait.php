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
 * Trait for FloorPlan.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FloorPlan
 */
trait FloorPlanTrait
{
    /**
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var array|LocationFeatureSpecification|LocationFeatureSpecification[]
     */
    public $amenityFeature;

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
     * The total integer number of bedrooms in a some [[Accommodation]],
     * [[ApartmentComplex]] or [[FloorPlan]].
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfBedrooms;

    /**
     * The total integer number of bathrooms in some [[Accommodation]], following
     * real estate conventions as [documented in
     * RESO](https://ddwiki.reso.org/display/DDW17/BathroomsTotalInteger+Field):
     * "The simple sum of the number of bathrooms. For example for a property with
     * two Full Bathrooms and one Half Bathroom, the Bathrooms Total Integer will
     * be 3.". See also [[numberOfRooms]].
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfBathroomsTotal;

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
     * The number of rooms (excluding bathrooms and closets) of the accommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfRooms;

    /**
     * The size of the accommodation, e.g. in square meter or squarefoot. Typical
     * unit code(s): MTK for square meter, FTK for square foot, or YDK for square
     * yard.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $floorSize;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var bool|string|array|Boolean|Boolean[]|array|Text|Text[]
     */
    public $petsAllowed;

    /**
     * Number of partial bathrooms - The total number of half and ¼ bathrooms in
     * an [[Accommodation]]. This corresponds to the [BathroomsPartial field in
     * RESO](https://ddwiki.reso.org/display/DDW17/BathroomsPartial+Field).
     *
     * @var float|array|Number|Number[]
     */
    public $numberOfPartialBathrooms;

    /**
     * Indicates some accommodation that this floor plan describes.
     *
     * @var array|Accommodation|Accommodation[]
     */
    public $isPlanForApartment;

    /**
     * A schematic image showing the floorplan layout.
     *
     * @var array|ImageObject|ImageObject[]|array|URL|URL[]
     */
    public $layoutImage;

    /**
     * Number of full bathrooms - The total number of full and ¾ bathrooms in an
     * [[Accommodation]]. This corresponds to the [BathroomsFull field in
     * RESO](https://ddwiki.reso.org/display/DDW17/BathroomsFull+Field).
     *
     * @var float|array|Number|Number[]
     */
    public $numberOfFullBathrooms;
}
