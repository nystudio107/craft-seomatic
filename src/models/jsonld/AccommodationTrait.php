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
 * Trait for Accommodation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Accommodation
 */
trait AccommodationTrait
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
     * A floorplan of some [[Accommodation]].
     *
     * @var array|FloorPlan|FloorPlan[]
     */
    public $accommodationFloorPlan;

    /**
     * The type of bed or beds included in the accommodation. For the single case
     * of just one bed of a certain type, you use bed directly with a text.
     * If you want to indicate the quantity of a certain kind of bed, use an
     * instance of BedDetails. For more detailed information, use the
     * amenityFeature property.
     *
     * @var string|array|Text|Text[]|array|BedDetails|BedDetails[]|array|BedType|BedType[]
     */
    public $bed;

    /**
     * The allowed total occupancy for the accommodation in persons (including
     * infants etc). For individual accommodations, this is not necessarily the
     * legal maximum but defines the permitted usage as per the contractual
     * agreement (e.g. a double room used by a single person). Typical unit
     * code(s): C62 for person.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $occupancy;

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
     * Category of an [[Accommodation]], following real estate conventions, e.g.
     * RESO (see
     * [PropertySubType](https://ddwiki.reso.org/display/DDW17/PropertySubType+Field),
     * and
     * [PropertyType](https://ddwiki.reso.org/display/DDW17/PropertyType+Field)
     * fields  for suggested values).
     *
     * @var string|array|Text|Text[]
     */
    public $accommodationCategory;

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
     * The year an [[Accommodation]] was constructed. This corresponds to the
     * [YearBuilt field in
     * RESO](https://ddwiki.reso.org/display/DDW17/YearBuilt+Field).
     *
     * @var float|array|Number|Number[]
     */
    public $yearBuilt;

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
     * The floor level for an [[Accommodation]] in a multi-storey building. Since
     * counting   systems [vary
     * internationally](https://en.wikipedia.org/wiki/Storey#Consecutive_number_floor_designations),
     * the local system should be used where possible.
     *
     * @var string|array|Text|Text[]
     */
    public $floorLevel;

    /**
     * Number of partial bathrooms - The total number of half and ¼ bathrooms in
     * an [[Accommodation]]. This corresponds to the [BathroomsPartial field in
     * RESO](https://ddwiki.reso.org/display/DDW17/BathroomsPartial+Field).
     *
     * @var float|array|Number|Number[]
     */
    public $numberOfPartialBathrooms;

    /**
     * Indications regarding the permitted usage of the accommodation.
     *
     * @var string|array|Text|Text[]
     */
    public $permittedUsage;

    /**
     * Number of full bathrooms - The total number of full and ¾ bathrooms in an
     * [[Accommodation]]. This corresponds to the [BathroomsFull field in
     * RESO](https://ddwiki.reso.org/display/DDW17/BathroomsFull+Field).
     *
     * @var float|array|Number|Number[]
     */
    public $numberOfFullBathrooms;

    /**
     * Length of the lease for some [[Accommodation]], either particular to some
     * [[Offer]] or in some cases intrinsic to the property.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Duration|Duration[]
     */
    public $leaseLength;
}
