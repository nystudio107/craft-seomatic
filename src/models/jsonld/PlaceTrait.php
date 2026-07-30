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
 * Trait for Place.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Place
 */
trait PlaceTrait
{
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
     * @var array|PropertyValue|PropertyValue[]
     */
    public $additionalProperty;

    /**
     * Physical address of the item.
     *
     * @var string|array|PostalAddress|PostalAddress[]|array|Text|Text[]
     */
    public $address;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var array|AggregateRating|AggregateRating[]
     */
    public $aggregateRating;

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
     * A short textual code (also called "store code") that uniquely identifies a
     * place of business. The code is typically assigned by the parentOrganization
     * and used in structured URLs.  For example, in the URL
     * http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is
     * a branchCode for a particular branch.
     *
     * @var string|array|Text|Text[]
     */
    public $branchCode;

    /**
     * The basic containment relation between a place and one that contains it.
     *
     * @var array|Place|Place[]
     */
    public $containedIn;

    /**
     * The basic containment relation between a place and one that contains it.
     *
     * @var array|Place|Place[]
     */
    public $containedInPlace;

    /**
     * The basic containment relation between a place and another that it
     * contains.
     *
     * @var array|Place|Place[]
     */
    public $containsPlace;

    /**
     * Upcoming or past event associated with this place, organization, or action.
     *
     * @var array|Event|Event[]
     */
    public $event;

    /**
     * Upcoming or past events associated with this place or organization.
     *
     * @var array|Event|Event[]
     */
    public $events;

    /**
     * The fax number.
     *
     * @var string|array|Text|Text[]
     */
    public $faxNumber;

    /**
     * The geo coordinates of the place.
     *
     * @var array|GeoCoordinates|GeoCoordinates[]|array|GeoShape|GeoShape[]
     */
    public $geo;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a containing geometry to a contained geometry. "a
     * contains b iff no points of b lie in the exterior of a, and at least one
     * point of the interior of b lies in the interior of a". As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoContains;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that covers it. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoCoveredBy;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a covering geometry to a covered geometry. "Every
     * point of b is a point of (the interior or boundary of) a". As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoCovers;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that crosses it: "a crosses b:
     * they have some but not all interior points in common, and the dimension of
     * the intersection is less than that of at least one of them". As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoCrosses;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically disjoint: "they have no point in common. They
     * form a set of disconnected geometries." (A symmetric relationship, as
     * defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).)
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoDisjoint;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically equal, as defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM). "Two geometries are
     * topologically equal if their interiors intersect and no part of the
     * interior or boundary of one geometry intersects the exterior of the other"
     * (a symmetric relationship).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoEquals;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) have at least one point in common. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoIntersects;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that geospatially overlaps it,
     * i.e. they have some but not all points in common. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoOverlaps;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) touch: "they have at least one boundary point in common, but no
     * interior points." (A symmetric relationship, as defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).)
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoTouches;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to one that contains it, i.e. it is inside
     * (i.e. within) its interior. As defined in
     * [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).
     *
     * @var array|GeospatialGeometry|GeospatialGeometry[]|array|Place|Place[]
     */
    public $geoWithin;

    /**
     * The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also
     * referred to as International Location Number or ILN) of the respective
     * organization, person, or place. The GLN is a 13-digit number used to
     * identify parties and physical locations.
     *
     * @var string|array|Text|Text[]
     */
    public $globalLocationNumber;

    /**
     * Certification information about a product, organization, service, place, or
     * person.
     *
     * @var array|Certification|Certification[]
     */
    public $hasCertification;

    /**
     * Indicates whether some facility (e.g. [[FoodEstablishment]],
     * [[CovidTestingFacility]]) offers a service that can be used by driving
     * through in a car. In the case of [[CovidTestingFacility]] such facilities
     * could potentially help with social distancing from other
     * potentially-infected users.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $hasDriveThroughService;

    /**
     * The <a href="https://www.gs1.org/standards/gs1-digital-link">GS1 digital
     * link</a> associated with the object. This URL should conform to the
     * particular requirements of digital links. The link should only contain the
     * Application Identifiers (AIs) that are relevant for the entity being
     * annotated, for instance a [[Product]] or an [[Organization]], and for the
     * correct granularity. In particular, for products:<ul><li>A Digital Link
     * that contains a serial number (AI <code>21</code>) should only be present
     * on instances of [[IndividualProduct]]</li><li>A Digital Link that contains
     * a lot number (AI <code>10</code>) should be annotated as [[SomeProducts]]
     * if only products from that lot are sold, or [[IndividualProduct]] if there
     * is only a specific product.</li><li>A Digital Link that contains a global
     * model number (AI <code>8013</code>) should be attached to a [[Product]] or
     * a [[ProductModel]].</li></ul> Other item types should be adapted similarly.
     *
     * @var array|URL|URL[]
     */
    public $hasGS1DigitalLink;

    /**
     * A URL to a map of the place.
     *
     * @var array|Map|Map[]|array|URL|URL[]
     */
    public $hasMap;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isAccessibleForFree;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var string|array|Text|Text[]
     */
    public $isicV4;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]|array|URL|URL[]
     */
    public $keywords;

    /**
     * The latitude of a location. For example ```37.42242``` ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $latitude;

    /**
     * An associated logo.
     *
     * @var array|ImageObject|ImageObject[]|array|URL|URL[]
     */
    public $logo;

    /**
     * The longitude of a location. For example ```-122.08585``` ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $longitude;

    /**
     * A URL to a map of the place.
     *
     * @var array|URL|URL[]
     */
    public $map;

    /**
     * A URL to a map of the place.
     *
     * @var array|URL|URL[]
     */
    public $maps;

    /**
     * The total number of individuals that may attend an event or venue.
     *
     * @var int|array|Integer|Integer[]
     */
    public $maximumAttendeeCapacity;

    /**
     * The opening hours of a certain place.
     *
     * @var array|OpeningHoursSpecification|OpeningHoursSpecification[]
     */
    public $openingHoursSpecification;

    /**
     * A photograph of this place.
     *
     * @var array|ImageObject|ImageObject[]|array|Photograph|Photograph[]
     */
    public $photo;

    /**
     * Photographs of this place.
     *
     * @var array|ImageObject|ImageObject[]|array|Photograph|Photograph[]
     */
    public $photos;

    /**
     * A flag to signal that the [[Place]] is open to public visitors.  If this
     * property is omitted there is no assumed default boolean value.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $publicAccess;

    /**
     * A review of the item.
     *
     * @var array|Review|Review[]
     */
    public $review;

    /**
     * Review of the item.
     *
     * @var array|Review|Review[]
     */
    public $reviews;

    /**
     * A slogan or motto associated with the item.
     *
     * @var string|array|Text|Text[]
     */
    public $slogan;

    /**
     * Indicates whether it is allowed to smoke in the place, e.g. in the
     * restaurant, hotel or hotel room.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $smokingAllowed;

    /**
     * The special opening hours of a certain place.  Use this to explicitly
     * override general opening hours brought in scope by
     * [[openingHoursSpecification]] or [[openingHours]].
     *
     * @var array|OpeningHoursSpecification|OpeningHoursSpecification[]
     */
    public $specialOpeningHoursSpecification;

    /**
     * The telephone number.
     *
     * @var string|array|Text|Text[]
     */
    public $telephone;

    /**
     * A page providing information on how to book a tour of some [[Place]], such
     * as an [[Accommodation]] or [[ApartmentComplex]] in a real estate setting,
     * as well as other kinds of tours as appropriate.
     *
     * @var array|URL|URL[]
     */
    public $tourBookingPage;
}
