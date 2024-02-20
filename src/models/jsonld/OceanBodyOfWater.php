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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v26.0-release
 * OceanBodyOfWater - An ocean (for example, the Pacific).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OceanBodyOfWater
 */
class OceanBodyOfWater extends MetaJsonLd implements OceanBodyOfWaterInterface, BodyOfWaterInterface, LandformInterface, PlaceInterface, ThingInterface
{
    use OceanBodyOfWaterTrait;
    use BodyOfWaterTrait;
    use LandformTrait;
    use PlaceTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'OceanBodyOfWater';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/OceanBodyOfWater';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'BodyOfWater';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'An ocean (for example, the Pacific).';


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [
            'additionalProperty' => ['array', 'PropertyValue', 'PropertyValue[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'address' => ['array', 'Text', 'Text[]', 'array', 'PostalAddress', 'PostalAddress[]'],
            'aggregateRating' => ['array', 'AggregateRating', 'AggregateRating[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'amenityFeature' => ['array', 'LocationFeatureSpecification', 'LocationFeatureSpecification[]'],
            'branchCode' => ['array', 'Text', 'Text[]'],
            'containedIn' => ['array', 'Place', 'Place[]'],
            'containedInPlace' => ['array', 'Place', 'Place[]'],
            'containsPlace' => ['array', 'Place', 'Place[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'event' => ['array', 'Event', 'Event[]'],
            'events' => ['array', 'Event', 'Event[]'],
            'faxNumber' => ['array', 'Text', 'Text[]'],
            'geo' => ['array', 'GeoShape', 'GeoShape[]', 'array', 'GeoCoordinates', 'GeoCoordinates[]'],
            'geoContains' => ['array', 'GeospatialGeometry', 'GeospatialGeometry[]', 'array', 'Place', 'Place[]'],
            'geoCoveredBy' => ['array', 'Place', 'Place[]', 'array', 'GeospatialGeometry', 'GeospatialGeometry[]'],
            'geoCovers' => ['array', 'GeospatialGeometry', 'GeospatialGeometry[]', 'array', 'Place', 'Place[]'],
            'geoCrosses' => ['array', 'GeospatialGeometry', 'GeospatialGeometry[]', 'array', 'Place', 'Place[]'],
            'geoDisjoint' => ['array', 'GeospatialGeometry', 'GeospatialGeometry[]', 'array', 'Place', 'Place[]'],
            'geoEquals' => ['array', 'Place', 'Place[]', 'array', 'GeospatialGeometry', 'GeospatialGeometry[]'],
            'geoIntersects' => ['array', 'Place', 'Place[]', 'array', 'GeospatialGeometry', 'GeospatialGeometry[]'],
            'geoOverlaps' => ['array', 'Place', 'Place[]', 'array', 'GeospatialGeometry', 'GeospatialGeometry[]'],
            'geoTouches' => ['array', 'Place', 'Place[]', 'array', 'GeospatialGeometry', 'GeospatialGeometry[]'],
            'geoWithin' => ['array', 'Place', 'Place[]', 'array', 'GeospatialGeometry', 'GeospatialGeometry[]'],
            'globalLocationNumber' => ['array', 'Text', 'Text[]'],
            'hasCertification' => ['array', 'Certification', 'Certification[]'],
            'hasDriveThroughService' => ['array', 'Boolean', 'Boolean[]'],
            'hasMap' => ['array', 'Map', 'Map[]', 'array', 'URL', 'URL[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'isAccessibleForFree' => ['array', 'Boolean', 'Boolean[]'],
            'isicV4' => ['array', 'Text', 'Text[]'],
            'keywords' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'latitude' => ['array', 'Text', 'Text[]', 'array', 'Number', 'Number[]'],
            'logo' => ['array', 'URL', 'URL[]', 'array', 'ImageObject', 'ImageObject[]'],
            'longitude' => ['array', 'Number', 'Number[]', 'array', 'Text', 'Text[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'map' => ['array', 'URL', 'URL[]'],
            'maps' => ['array', 'URL', 'URL[]'],
            'maximumAttendeeCapacity' => ['array', 'Integer', 'Integer[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'openingHoursSpecification' => ['array', 'OpeningHoursSpecification', 'OpeningHoursSpecification[]'],
            'photo' => ['array', 'Photograph', 'Photograph[]', 'array', 'ImageObject', 'ImageObject[]'],
            'photos' => ['array', 'Photograph', 'Photograph[]', 'array', 'ImageObject', 'ImageObject[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'publicAccess' => ['array', 'Boolean', 'Boolean[]'],
            'review' => ['array', 'Review', 'Review[]'],
            'reviews' => ['array', 'Review', 'Review[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'slogan' => ['array', 'Text', 'Text[]'],
            'smokingAllowed' => ['array', 'Boolean', 'Boolean[]'],
            'specialOpeningHoursSpecification' => ['array', 'OpeningHoursSpecification', 'OpeningHoursSpecification[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'telephone' => ['array', 'Text', 'Text[]'],
            'tourBookingPage' => ['array', 'URL', 'URL[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalProperty' => 'A property-value pair representing an additional characteristic of the entity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'address' => 'Physical address of the item.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
            'branchCode' => 'A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs.  For example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.       ',
            'containedIn' => 'The basic containment relation between a place and one that contains it.',
            'containedInPlace' => 'The basic containment relation between a place and one that contains it.',
            'containsPlace' => 'The basic containment relation between a place and another that it contains.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'event' => 'Upcoming or past event associated with this place, organization, or action.',
            'events' => 'Upcoming or past events associated with this place or organization.',
            'faxNumber' => 'The fax number.',
            'geo' => 'The geo coordinates of the place.',
            'geoContains' => 'Represents a relationship between two geometries (or the places they represent), relating a containing geometry to a contained geometry. "a contains b iff no points of b lie in the exterior of a, and at least one point of the interior of b lies in the interior of a". As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoCoveredBy' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that covers it. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoCovers' => 'Represents a relationship between two geometries (or the places they represent), relating a covering geometry to a covered geometry. "Every point of b is a point of (the interior or boundary of) a". As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoCrosses' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that crosses it: "a crosses b: they have some but not all interior points in common, and the dimension of the intersection is less than that of at least one of them". As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoDisjoint' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically disjoint: "they have no point in common. They form a set of disconnected geometries." (A symmetric relationship, as defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).)',
            'geoEquals' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically equal, as defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM). "Two geometries are topologically equal if their interiors intersect and no part of the interior or boundary of one geometry intersects the exterior of the other" (a symmetric relationship).',
            'geoIntersects' => 'Represents spatial relations in which two geometries (or the places they represent) have at least one point in common. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoOverlaps' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that geospatially overlaps it, i.e. they have some but not all points in common. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoTouches' => 'Represents spatial relations in which two geometries (or the places they represent) touch: "they have at least one boundary point in common, but no interior points." (A symmetric relationship, as defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).)',
            'geoWithin' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to one that contains it, i.e. it is inside (i.e. within) its interior. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'globalLocationNumber' => 'The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
            'hasCertification' => 'Certification information about a product, organization, service, place, or person.',
            'hasDriveThroughService' => 'Indicates whether some facility (e.g. [[FoodEstablishment]], [[CovidTestingFacility]]) offers a service that can be used by driving through in a car. In the case of [[CovidTestingFacility]] such facilities could potentially help with social distancing from other potentially-infected users.',
            'hasMap' => 'A URL to a map of the place.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free.',
            'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'latitude' => 'The latitude of a location. For example ```37.42242``` ([WGS 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).',
            'logo' => 'An associated logo.',
            'longitude' => 'The longitude of a location. For example ```-122.08585``` ([WGS 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'map' => 'A URL to a map of the place.',
            'maps' => 'A URL to a map of the place.',
            'maximumAttendeeCapacity' => 'The total number of individuals that may attend an event or venue.',
            'name' => 'The name of the item.',
            'openingHoursSpecification' => 'The opening hours of a certain place.',
            'photo' => 'A photograph of this place.',
            'photos' => 'Photographs of this place.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'publicAccess' => 'A flag to signal that the [[Place]] is open to public visitors.  If this property is omitted there is no assumed default boolean value.',
            'review' => 'A review of the item.',
            'reviews' => 'Review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'slogan' => 'A slogan or motto associated with the item.',
            'smokingAllowed' => 'Indicates whether it is allowed to smoke in the place, e.g. in the restaurant, hotel or hotel room.',
            'specialOpeningHoursSpecification' => 'The special opening hours of a certain place.  Use this to explicitly override general opening hours brought in scope by [[openingHoursSpecification]] or [[openingHours]].       ',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'telephone' => 'The telephone number.',
            'tourBookingPage' => 'A page providing information on how to book a tour of some [[Place]], such as an [[Accommodation]] or [[ApartmentComplex]] in a real estate setting, as well as other kinds of tours as appropriate.',
            'url' => 'URL of the item.',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRequiredSchema(): array
    {
        return ['description', 'name'];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRecommendedSchema(): array
    {
        return ['image', 'url'];
    }


    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules = array_merge($rules, [
                [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
                [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);

        return $rules;
    }
}
