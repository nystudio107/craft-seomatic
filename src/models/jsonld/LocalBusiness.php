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

use nystudio107\seomatic\models\jsonld\Organization;

/**
 * LocalBusiness - A particular physical business or branch of an
 * organization. Examples of LocalBusiness include a restaurant, a particular
 * branch of a restaurant chain, a branch of a bank, a medical practice, a
 * club, a bowling alley, etc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/LocalBusiness
 */
class LocalBusiness extends Organization
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'LocalBusiness';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/LocalBusiness';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A particular physical business or branch of an organization. Examples of LocalBusiness include a restaurant, a particular branch of a restaurant chain, a branch of a bank, a medical practice, a club, a bowling alley, etc.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Organization';

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

    // Public Properties from Self
    // =========================================================================

    /**
     * The currency accepted (in ISO 4217 currency format).
     *
     * @var string [schema.org types: Text]
     */
    public $currenciesAccepted;

    /**
     * The general opening hours for a business. Opening hours can be specified as
     * a weekly time range, starting with days, then times per day. Multiple days
     * can be listed with commas ',' separating each day. Day or time ranges are
     * specified using a hyphen '-'. Days are specified using the following
     * two-letter combinations: Mo, Tu, We, Th, Fr, Sa, Su. Times are specified
     * using 24:00 time. For example, 3pm is specified as 15:00. Here is an
     * example: <time itemprop="openingHours" datetime="Tu,Th
     * 16:00-20:00">Tuesdays and Thursdays 4-8pm</time>. If a business is open 7
     * days a week, then it can be specified as <time itemprop="openingHours"
     * datetime="Mo-Su">Monday through Sunday, all day</time>.
     *
     * @var string [schema.org types: Text]
     */
    public $openingHours;

    /**
     * Cash, credit card, etc.
     *
     * @var string [schema.org types: Text]
     */
    public $paymentAccepted;

    /**
     * The price range of the business, for example $$$.
     *
     * @var string [schema.org types: Text]
     */
    public $priceRange;

    // Public Properties from Place
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
     * The geo coordinates of the place.
     *
     * @var mixed|GeoCoordinates|GeoShape [schema.org types: GeoCoordinates, GeoShape]
     */
    public $geo;

    /**
     * A URL to a map of the place. Supersedes map, maps.
     *
     * @var mixed|Map|string [schema.org types: Map, URL]
     */
    public $hasMap;

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

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        // Properties from Self
        'currenciesAccepted',
        'openingHours',
        'paymentAccepted',
        'priceRange',
        // Properties from Place
        'additionalProperty',
        'branchCode',
        'containedInPlace',
        'containsPlace',
        'geo',
        'hasMap',
        'maximumAttendeeCapacity',
        'openingHoursSpecification',
        'photo',
        'publicAccess',
        'smokingAllowed',
        'specialOpeningHoursSpecification',
   ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        // Properties from Self
        'currenciesAccepted' => ['Text'],
        'openingHours' => ['Text'],
        'paymentAccepted' => ['Text'],
        'priceRange' => ['Text'],
        // Properties from Place
        'additionalProperty' => ['PropertyValue'],
        'branchCode' => ['Text'],
        'containedInPlace' => ['Place'],
        'containsPlace' => ['Place'],
        'geo' => ['GeoCoordinates','GeoShape'],
        'hasMap' => ['Map','URL'],
        'maximumAttendeeCapacity' => ['Integer'],
        'openingHoursSpecification' => ['OpeningHoursSpecification'],
        'photo' => ['ImageObject','Photograph'],
        'publicAccess' => ['Boolean'],
        'smokingAllowed' => ['Boolean'],
        'specialOpeningHoursSpecification' => ['OpeningHoursSpecification'],
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        // Properties from Self
        'currenciesAccepted' => 'The currency accepted (in ISO 4217 currency format).',
        'openingHours' => 'The general opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'. Days are specified using the following two-letter combinations: Mo, Tu, We, Th, Fr, Sa, Su. Times are specified using 24:00 time. For example, 3pm is specified as 15:00. Here is an example: <time itemprop="openingHours" datetime="Tu,Th 16:00-20:00">Tuesdays and Thursdays 4-8pm</time>. If a business is open 7 days a week, then it can be specified as <time itemprop="openingHours" datetime="Mo-Su">Monday through Sunday, all day</time>.',
        'paymentAccepted' => 'Cash, credit card, etc.',
        'priceRange' => 'The price range of the business, for example $$$.',
        // Properties from Place
        'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.',
        'branchCode' => 'A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs. For example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.',
        'containedInPlace' => 'The basic containment relation between a place and one that contains it. Supersedes containedIn. Inverse property: containsPlace.',
        'containsPlace' => 'The basic containment relation between a place and another that it contains. Inverse property: containedInPlace.',
        'geo' => 'The geo coordinates of the place.',
        'hasMap' => 'A URL to a map of the place. Supersedes map, maps.',
        'maximumAttendeeCapacity' => 'The total number of individuals that may attend an event or venue.',
        'openingHoursSpecification' => 'The opening hours of a certain place.',
        'photo' => 'A photograph of this place. Supersedes photos.',
        'publicAccess' => 'A flag to signal that the Place is open to public visitors. If this property is omitted there is no assumed default boolean value',
        'smokingAllowed' => 'Indicates whether it is allowed to smoke in the place, e.g. in the restaurant, hotel or hotel room.',
        'specialOpeningHoursSpecification' => 'The special opening hours of a certain place. Use this to explicitly override general opening hours brought in scope by openingHoursSpecification or openingHours.',
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
            // Properties from Self
            [['currenciesAccepted','openingHours','openingHoursSpecification', 'paymentAccepted','priceRange'], 'validateJsonSchema'],
            // Properties from Place
            [['additionalProperty','branchCode','containedInPlace','containsPlace','geo','hasMap','maximumAttendeeCapacity','openingHoursSpecification','photo','publicAccess','smokingAllowed','specialOpeningHoursSpecification'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
