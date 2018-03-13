<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Place;

/**
 * AdministrativeArea - A geographical region, typically under the
 * jurisdiction of a particular government.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/AdministrativeArea
 */
class AdministrativeArea extends Place
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'AdministrativeArea';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/AdministrativeArea';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A geographical region, typically under the jurisdiction of a particular government.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Place';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * A property-value pair representing an additional characteristics of the
     * entitity, e.g. a product feature or another characteristic for which there
     * is no matching property in schema.org. Note: Publishers should be aware
     * that applications designed to use specific schema.org properties (e.g.
     * http://schema.org/width, http://schema.org/color, http://schema.org/gtin13,
     * ...) will typically expect such data to be provided using those properties,
     * rather than using the generic property/value mechanism.
     *
     * @var PropertyValue [schema.org types: PropertyValue]
     */
    public $additionalProperty;

    /**
     * Physical address of the item.
     *
     * @var mixed|PostalAddress|string [schema.org types: PostalAddress, Text]
     */
    public $address;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var mixed|AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;

    /**
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var mixed|LocationFeatureSpecification [schema.org types: LocationFeatureSpecification]
     */
    public $amenityFeature;

    /**
     * A short textual code (also called "store code") that uniquely identifies a
     * place of business. The code is typically assigned by the parentOrganization
     * and used in structured URLs. For example, in the URL
     * http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is
     * a branchCode for a particular branch.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $branchCode;

    /**
     * The basic containment relation between a place and one that contains it.
     * Supersedes containedIn. Inverse property: containsPlace.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $containedInPlace;

    /**
     * The basic containment relation between a place and another that it
     * contains. Inverse property: containedInPlace.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $containsPlace;

    /**
     * Upcoming or past event associated with this place, organization, or action.
     * Supersedes events.
     *
     * @var mixed|Event [schema.org types: Event]
     */
    public $event;

    /**
     * The fax number.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $faxNumber;

    /**
     * The geo coordinates of the place.
     *
     * @var mixed|GeoCoordinates|GeoShape [schema.org types: GeoCoordinates, GeoShape]
     */
    public $geo;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a containing geometry to a contained geometry. "a
     * contains b iff no points of b lie in the exterior of a, and at least one
     * point of the interior of b lies in the interior of a". As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyContains;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that covers it. As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyCoveredBy;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a covering geometry to a covered geometry. "Every
     * point of b is a point of (the interior or boundary of) a". As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyCovers;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that crosses it: "a crosses b:
     * they have some but not all interior points in common, and the dimension of
     * the intersection is less than that of at least one of them". As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyCrosses;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically disjoint: they have no point in common. They
     * form a set of disconnected geometries." (a symmetric relationship, as
     * defined in DE-9IM)
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyDisjoint;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically equal, as defined in DE-9IM. "Two geometries
     * are topologically equal if their interiors intersect and no part of the
     * interior or boundary of one geometry intersects the exterior of the other"
     * (a symmetric relationship)
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyEquals;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) have at least one point in common. As defined in DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyIntersects;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that geospatially overlaps it,
     * i.e. they have some but not all points in common. As defined in DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyOverlaps;

    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) touch: they have at least one boundary point in common, but no
     * interior points." (a symmetric relationship, as defined in DE-9IM )
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyTouches;

    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to one that contains it, i.e. it is inside
     * (i.e. within) its interior. As defined in DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geospatiallyWithin;

    /**
     * The Global Location Number (GLN, sometimes also referred to as
     * International Location Number or ILN) of the respective organization,
     * person, or place. The GLN is a 13-digit number used to identify parties and
     * physical locations.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $globalLocationNumber;

    /**
     * A URL to a map of the place. Supersedes map, maps.
     *
     * @var mixed|Map|string [schema.org types: Map, URL]
     */
    public $hasMap;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     * Supersedes free.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $isAccessibleForFree;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $isicV4;

    /**
     * An associated logo.
     *
     * @var mixed|ImageObject|string [schema.org types: ImageObject, URL]
     */
    public $logo;

    /**
     * The total number of individuals that may attend an event or venue.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $maximumAttendeeCapacity;

    /**
     * The opening hours of a certain place.
     *
     * @var mixed|OpeningHoursSpecification [schema.org types: OpeningHoursSpecification]
     */
    public $openingHoursSpecification;

    /**
     * A photograph of this place. Supersedes photos.
     *
     * @var mixed|ImageObject|Photograph [schema.org types: ImageObject, Photograph]
     */
    public $photo;

    /**
     * A flag to signal that the Place is open to public visitors. If this
     * property is omitted there is no assumed default boolean value
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $publicAccess;

    /**
     * A review of the item. Supersedes reviews.
     *
     * @var mixed|Review [schema.org types: Review]
     */
    public $review;

    /**
     * Indicates whether it is allowed to smoke in the place, e.g. in the
     * restaurant, hotel or hotel room.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $smokingAllowed;

    /**
     * The special opening hours of a certain place. Use this to explicitly
     * override general opening hours brought in scope by
     * openingHoursSpecification or openingHours.
     *
     * @var mixed|OpeningHoursSpecification [schema.org types: OpeningHoursSpecification]
     */
    public $specialOpeningHoursSpecification;

    /**
     * The telephone number.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $telephone;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'additionalProperty',
        'address',
        'aggregateRating',
        'amenityFeature',
        'branchCode',
        'containedInPlace',
        'containsPlace',
        'event',
        'faxNumber',
        'geo',
        'geospatiallyContains',
        'geospatiallyCoveredBy',
        'geospatiallyCovers',
        'geospatiallyCrosses',
        'geospatiallyDisjoint',
        'geospatiallyEquals',
        'geospatiallyIntersects',
        'geospatiallyOverlaps',
        'geospatiallyTouches',
        'geospatiallyWithin',
        'globalLocationNumber',
        'hasMap',
        'isAccessibleForFree',
        'isicV4',
        'logo',
        'maximumAttendeeCapacity',
        'openingHoursSpecification',
        'photo',
        'publicAccess',
        'review',
        'smokingAllowed',
        'specialOpeningHoursSpecification',
        'telephone'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'additionalProperty' => ['PropertyValue'],
        'address' => ['PostalAddress','Text'],
        'aggregateRating' => ['AggregateRating'],
        'amenityFeature' => ['LocationFeatureSpecification'],
        'branchCode' => ['Text'],
        'containedInPlace' => ['Place'],
        'containsPlace' => ['Place'],
        'event' => ['Event'],
        'faxNumber' => ['Text'],
        'geo' => ['GeoCoordinates','GeoShape'],
        'geospatiallyContains' => ['GeospatialGeometry','Place'],
        'geospatiallyCoveredBy' => ['GeospatialGeometry','Place'],
        'geospatiallyCovers' => ['GeospatialGeometry','Place'],
        'geospatiallyCrosses' => ['GeospatialGeometry','Place'],
        'geospatiallyDisjoint' => ['GeospatialGeometry','Place'],
        'geospatiallyEquals' => ['GeospatialGeometry','Place'],
        'geospatiallyIntersects' => ['GeospatialGeometry','Place'],
        'geospatiallyOverlaps' => ['GeospatialGeometry','Place'],
        'geospatiallyTouches' => ['GeospatialGeometry','Place'],
        'geospatiallyWithin' => ['GeospatialGeometry','Place'],
        'globalLocationNumber' => ['Text'],
        'hasMap' => ['Map','URL'],
        'isAccessibleForFree' => ['Boolean'],
        'isicV4' => ['Text'],
        'logo' => ['ImageObject','URL'],
        'maximumAttendeeCapacity' => ['Integer'],
        'openingHoursSpecification' => ['OpeningHoursSpecification'],
        'photo' => ['ImageObject','Photograph'],
        'publicAccess' => ['Boolean'],
        'review' => ['Review'],
        'smokingAllowed' => ['Boolean'],
        'specialOpeningHoursSpecification' => ['OpeningHoursSpecification'],
        'telephone' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.',
        'address' => 'Physical address of the item.',
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
        'branchCode' => 'A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs. For example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.',
        'containedInPlace' => 'The basic containment relation between a place and one that contains it. Supersedes containedIn. Inverse property: containsPlace.',
        'containsPlace' => 'The basic containment relation between a place and another that it contains. Inverse property: containedInPlace.',
        'event' => 'Upcoming or past event associated with this place, organization, or action. Supersedes events.',
        'faxNumber' => 'The fax number.',
        'geo' => 'The geo coordinates of the place.',
        'geospatiallyContains' => 'Represents a relationship between two geometries (or the places they represent), relating a containing geometry to a contained geometry. "a contains b iff no points of b lie in the exterior of a, and at least one point of the interior of b lies in the interior of a". As defined in DE-9IM.',
        'geospatiallyCoveredBy' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that covers it. As defined in DE-9IM.',
        'geospatiallyCovers' => 'Represents a relationship between two geometries (or the places they represent), relating a covering geometry to a covered geometry. "Every point of b is a point of (the interior or boundary of) a". As defined in DE-9IM.',
        'geospatiallyCrosses' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that crosses it: "a crosses b: they have some but not all interior points in common, and the dimension of the intersection is less than that of at least one of them". As defined in DE-9IM.',
        'geospatiallyDisjoint' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically disjoint: they have no point in common. They form a set of disconnected geometries." (a symmetric relationship, as defined in DE-9IM)',
        'geospatiallyEquals' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically equal, as defined in DE-9IM. "Two geometries are topologically equal if their interiors intersect and no part of the interior or boundary of one geometry intersects the exterior of the other" (a symmetric relationship)',
        'geospatiallyIntersects' => 'Represents spatial relations in which two geometries (or the places they represent) have at least one point in common. As defined in DE-9IM.',
        'geospatiallyOverlaps' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that geospatially overlaps it, i.e. they have some but not all points in common. As defined in DE-9IM.',
        'geospatiallyTouches' => 'Represents spatial relations in which two geometries (or the places they represent) touch: they have at least one boundary point in common, but no interior points." (a symmetric relationship, as defined in DE-9IM )',
        'geospatiallyWithin' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to one that contains it, i.e. it is inside (i.e. within) its interior. As defined in DE-9IM.',
        'globalLocationNumber' => 'The Global Location Number (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
        'hasMap' => 'A URL to a map of the place. Supersedes map, maps.',
        'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free. Supersedes free.',
        'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
        'logo' => 'An associated logo.',
        'maximumAttendeeCapacity' => 'The total number of individuals that may attend an event or venue.',
        'openingHoursSpecification' => 'The opening hours of a certain place.',
        'photo' => 'A photograph of this place. Supersedes photos.',
        'publicAccess' => 'A flag to signal that the Place is open to public visitors. If this property is omitted there is no assumed default boolean value',
        'review' => 'A review of the item. Supersedes reviews.',
        'smokingAllowed' => 'Indicates whether it is allowed to smoke in the place, e.g. in the restaurant, hotel or hotel room.',
        'specialOpeningHoursSpecification' => 'The special opening hours of a certain place. Use this to explicitly override general opening hours brought in scope by openingHoursSpecification or openingHours.',
        'telephone' => 'The telephone number.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['additionalProperty','address','aggregateRating','amenityFeature','branchCode','containedInPlace','containsPlace','event','faxNumber','geo','geospatiallyContains','geospatiallyCoveredBy','geospatiallyCovers','geospatiallyCrosses','geospatiallyDisjoint','geospatiallyEquals','geospatiallyIntersects','geospatiallyOverlaps','geospatiallyTouches','geospatiallyWithin','globalLocationNumber','hasMap','isAccessibleForFree','isicV4','logo','maximumAttendeeCapacity','openingHoursSpecification','photo','publicAccess','review','smokingAllowed','specialOpeningHoursSpecification','telephone'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
