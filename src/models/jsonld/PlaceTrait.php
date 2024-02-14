<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Place.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Place
 */
trait PlaceTrait
{
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a covering geometry to a covered geometry. "Every
     * point of b is a point of (the interior or boundary of) a". As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoCovers;

    /**
     * The longitude of a location. For example ```-122.08585``` ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).
     *
     * @var string|float|Text|Number
     */
    public $longitude;

    /**
     * Indicates whether it is allowed to smoke in the place, e.g. in the
     * restaurant, hotel or hotel room.
     *
     * @var bool|Boolean
     */
    public $smokingAllowed;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var string|Text
     */
    public $isicV4;

    /**
     * The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also
     * referred to as International Location Number or ILN) of the respective
     * organization, person, or place. The GLN is a 13-digit number used to
     * identify parties and physical locations.
     *
     * @var string|Text
     */
    public $globalLocationNumber;

    /**
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var LocationFeatureSpecification
     */
    public $amenityFeature;

    /**
     * A property-value pair representing an additional characteristic of the
     * entity, e.g. a product feature or another characteristic for which there is
     * no matching property in schema.org.  Note: Publishers should be aware that
     * applications designed to use specific schema.org properties (e.g.
     * https://schema.org/width, https://schema.org/color,
     * https://schema.org/gtin13, ...) will typically expect such data to be
     * provided using those properties, rather than using the generic
     * property/value mechanism.
     *
     * @var PropertyValue
     */
    public $additionalProperty;

    /**
     * A slogan or motto associated with the item.
     *
     * @var string|Text
     */
    public $slogan;

    /**
     * Photographs of this place.
     *
     * @var ImageObject|Photograph
     */
    public $photos;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|URL|DefinedTerm|Text
     */
    public $keywords;

    /**
     * Review of the item.
     *
     * @var Review
     */
    public $reviews;

    /**
     * A page providing information on how to book a tour of some [[Place]], such
     * as an [[Accommodation]] or [[ApartmentComplex]] in a real estate setting,
     * as well as other kinds of tours as appropriate.
     *
     * @var URL
     */
    public $tourBookingPage;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to one that contains it, i.e. it is inside
     * (i.e. within) its interior. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoWithin;

    /**
     * The basic containment relation between a place and another that it
     * contains.
     *
     * @var Place
     */
    public $containsPlace;

    /**
     * A review of the item.
     *
     * @var Review
     */
    public $review;

    /**
     * A URL to a map of the place.
     *
     * @var URL|Map
     */
    public $hasMap;

    /**
     * The basic containment relation between a place and one that contains it.
     *
     * @var Place
     */
    public $containedIn;

    /**
     * Upcoming or past events associated with this place or organization.
     *
     * @var Event
     */
    public $events;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that geospatially overlaps it,
     * i.e. they have some but not all points in common. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoOverlaps;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically equal, as defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM). "Two geometries are
     * topologically equal if their interiors intersect and no part of the
     * interior or boundary of one geometry intersects the exterior of the other"
     * (a symmetric relationship).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoEquals;

    /**
     * A URL to a map of the place.
     *
     * @var URL
     */
    public $maps;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     *
     * @var bool|Boolean
     */
    public $isAccessibleForFree;

    /**
     * Upcoming or past event associated with this place, organization, or action.
     *
     * @var Event
     */
    public $event;

    /**
     * A photograph of this place.
     *
     * @var Photograph|ImageObject
     */
    public $photo;

    /**
     * The basic containment relation between a place and one that contains it.
     *
     * @var Place
     */
    public $containedInPlace;

    /**
     * An associated logo.
     *
     * @var ImageObject|URL
     */
    public $logo;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that crosses it: "a crosses b:
     * they have some but not all interior points in common, and the dimension of
     * the intersection is less than that of at least one of them". As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoCrosses;

    /**
     * Physical address of the item.
     *
     * @var string|Text|PostalAddress
     */
    public $address;

    /**
     * The geo coordinates of the place.
     *
     * @var GeoCoordinates|GeoShape
     */
    public $geo;

    /**
     * The opening hours of a certain place.
     *
     * @var array|OpeningHoursSpecification
     */
    public $openingHoursSpecification;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically disjoint: "they have no point in common. They
     * form a set of disconnected geometries." (A symmetric relationship, as
     * defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).)
     *
     * @var GeospatialGeometry|Place
     */
    public $geoDisjoint;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) have at least one point in common. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoIntersects;

    /**
     * The latitude of a location. For example ```37.42242``` ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).
     *
     * @var float|string|Number|Text
     */
    public $latitude;

    /**
     * The total number of individuals that may attend an event or venue.
     *
     * @var int|Integer
     */
    public $maximumAttendeeCapacity;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating
     */
    public $aggregateRating;

    /**
     * A URL to a map of the place.
     *
     * @var URL
     */
    public $map;

    /**
     * A short textual code (also called "store code") that uniquely identifies a
     * place of business. The code is typically assigned by the parentOrganization
     * and used in structured URLs.  For example, in the URL
     * http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is
     * a branchCode for a particular branch.
     *
     * @var string|Text
     */
    public $branchCode;

    /**
     * The fax number.
     *
     * @var string|Text
     */
    public $faxNumber;

    /**
     * A flag to signal that the [[Place]] is open to public visitors.  If this
     * property is omitted there is no assumed default boolean value
     *
     * @var bool|Boolean
     */
    public $publicAccess;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) touch: "they have at least one boundary point in common, but no
     * interior points." (A symmetric relationship, as defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).)
     *
     * @var GeospatialGeometry|Place
     */
    public $geoTouches;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that covers it. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var GeospatialGeometry|Place
     */
    public $geoCoveredBy;

    /**
     * The telephone number.
     *
     * @var string|Text
     */
    public $telephone;

    /**
     * Indicates whether some facility (e.g. [[FoodEstablishment]],
     * [[CovidTestingFacility]]) offers a service that can be used by driving
     * through in a car. In the case of [[CovidTestingFacility]] such facilities
     * could potentially help with social distancing from other
     * potentially-infected users.
     *
     * @var bool|Boolean
     */
    public $hasDriveThroughService;

    /**
     * The special opening hours of a certain place.  Use this to explicitly
     * override general opening hours brought in scope by
     * [[openingHoursSpecification]] or [[openingHours]].
     *
     * @var OpeningHoursSpecification
     */
    public $specialOpeningHoursSpecification;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a containing geometry to a contained geometry. "a
     * contains b iff no points of b lie in the exterior of a, and at least one
     * point of the interior of b lies in the interior of a". As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var Place|GeospatialGeometry
     */
    public $geoContains;
}
