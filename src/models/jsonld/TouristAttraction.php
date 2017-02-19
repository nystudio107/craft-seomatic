<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Place;

/**
 * TouristAttraction - A tourist attraction.
 *
 * Extends: Place
 * @see    http://schema.org/TouristAttraction
 */
class TouristAttraction extends Place
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'TouristAttraction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/TouristAttraction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A tourist attraction.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Place';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

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
     * The geo coordinates of the place.
     *
     * @var mixed|GeoCoordinates|GeoShape [schema.org types: GeoCoordinates, GeoShape]
     */
    public $geo;

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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'address',
            'aggregateRating',
            'amenityFeature',
            'containedInPlace',
            'containsPlace',
            'event',
            'geo',
            'globalLocationNumber',
            'hasMap',
            'review',
            'smokingAllowed',
            'specialOpeningHoursSpecification',
            'telephone',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'address' => ['PostalAddress','Text'],
            'aggregateRating' => ['AggregateRating'],
            'amenityFeature' => ['LocationFeatureSpecification'],
            'containedInPlace' => ['Place'],
            'containsPlace' => ['Place'],
            'event' => ['Event'],
            'geo' => ['GeoCoordinates','GeoShape'],
            'globalLocationNumber' => ['Text'],
            'hasMap' => ['Map','URL'],
            'review' => ['Review'],
            'smokingAllowed' => ['Boolean'],
            'specialOpeningHoursSpecification' => ['OpeningHoursSpecification'],
            'telephone' => ['Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'address' => 'Physical address of the item.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
            'containedInPlace' => 'The basic containment relation between a place and one that contains it. Supersedes containedIn. Inverse property: containsPlace.',
            'containsPlace' => 'The basic containment relation between a place and another that it contains. Inverse property: containedInPlace.',
            'event' => 'Upcoming or past event associated with this place, organization, or action. Supersedes events.',
            'geo' => 'The geo coordinates of the place.',
            'globalLocationNumber' => 'The Global Location Number (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
            'hasMap' => 'A URL to a map of the place. Supersedes map, maps.',
            'review' => 'A review of the item. Supersedes reviews.',
            'smokingAllowed' => 'Indicates whether it is allowed to smoke in the place, e.g. in the restaurant, hotel or hotel room.',
            'specialOpeningHoursSpecification' => 'The special opening hours of a certain place. Use this to explicitly override general opening hours brought in scope by openingHoursSpecification or openingHours.',
            'telephone' => 'The telephone number.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['address','aggregateRating','amenityFeature','containedInPlace','containsPlace','event','geo','globalLocationNumber','hasMap','review','smokingAllowed','specialOpeningHoursSpecification','telephone',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
