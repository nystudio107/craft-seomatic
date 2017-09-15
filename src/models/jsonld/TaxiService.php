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

use nystudio107\seomatic\models\jsonld\Service;

/**
 * TaxiService - A service for a vehicle for hire with a driver for local
 * travel. Fares are usually calculated based on distance traveled.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/TaxiService
 */
class TaxiService extends Service
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'TaxiService';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/TaxiService';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A service for a vehicle for hire with a driver for local travel. Fares are usually calculated based on distance traveled.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Service';

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
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;

    /**
     * The geographic area where a service or offered item is provided. Supersedes
     * serviceArea.
     *
     * @var mixed|AdministrativeArea|GeoShape|Place|string [schema.org types: AdministrativeArea, GeoShape, Place, Text]
     */
    public $areaServed;

    /**
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     *
     * @var mixed|Audience [schema.org types: Audience]
     */
    public $audience;

    /**
     * A means of accessing the service (e.g. a phone bank, a web site, a
     * location, etc.).
     *
     * @var mixed|ServiceChannel [schema.org types: ServiceChannel]
     */
    public $availableChannel;

    /**
     * An award won by or for this item. Supersedes awards.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $award;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var mixed|Brand|Organization [schema.org types: Brand, Organization]
     */
    public $brand;

    /**
     * An entity that arranges for an exchange between a buyer and a seller. In
     * most cases a broker never acquires or releases ownership of a product or
     * service involved in an exchange. If it is not clear whether an entity is a
     * broker, seller, or buyer, the latter two terms are preferred. Supersedes
     * bookingAgent.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $broker;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var mixed|PhysicalActivityCategory|string|Thing [schema.org types: PhysicalActivityCategory, Text, Thing]
     */
    public $category;

    /**
     * Indicates an OfferCatalog listing for this Organization, Person, or
     * Service.
     *
     * @var mixed|OfferCatalog [schema.org types: OfferCatalog]
     */
    public $hasOfferCatalog;

    /**
     * The hours during which this service or contact is available.
     *
     * @var mixed|OpeningHoursSpecification [schema.org types: OpeningHoursSpecification]
     */
    public $hoursAvailable;

    /**
     * A pointer to another, somehow related product (or multiple products).
     *
     * @var mixed|Product|Service [schema.org types: Product, Service]
     */
    public $isRelatedTo;

    /**
     * A pointer to another, functionally similar product (or multiple products).
     *
     * @var mixed|Product|Service [schema.org types: Product, Service]
     */
    public $isSimilarTo;

    /**
     * An associated logo.
     *
     * @var mixed|ImageObject|string [schema.org types: ImageObject, URL]
     */
    public $logo;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     *
     * @var mixed|Offer [schema.org types: Offer]
     */
    public $offers;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * Indicates the mobility of a provided service (e.g. 'static', 'dynamic').
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $providerMobility;

    /**
     * A review of the item. Supersedes reviews.
     *
     * @var mixed|Review [schema.org types: Review]
     */
    public $review;

    /**
     * The tangible thing generated by the service, e.g. a passport, permit, etc.
     * Supersedes produces.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $serviceOutput;

    /**
     * The type of service being offered, e.g. veterans' benefits, emergency
     * relief, etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $serviceType;

    /**
     * Human-readable terms of service documentation.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $termsOfService;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'aggregateRating',
        'areaServed',
        'audience',
        'availableChannel',
        'award',
        'brand',
        'broker',
        'category',
        'hasOfferCatalog',
        'hoursAvailable',
        'isRelatedTo',
        'isSimilarTo',
        'logo',
        'offers',
        'provider',
        'providerMobility',
        'review',
        'serviceOutput',
        'serviceType',
        'termsOfService'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'aggregateRating' => ['AggregateRating'],
        'areaServed' => ['AdministrativeArea','GeoShape','Place','Text'],
        'audience' => ['Audience'],
        'availableChannel' => ['ServiceChannel'],
        'award' => ['Text'],
        'brand' => ['Brand','Organization'],
        'broker' => ['Organization','Person'],
        'category' => ['PhysicalActivityCategory','Text','Thing'],
        'hasOfferCatalog' => ['OfferCatalog'],
        'hoursAvailable' => ['OpeningHoursSpecification'],
        'isRelatedTo' => ['Product','Service'],
        'isSimilarTo' => ['Product','Service'],
        'logo' => ['ImageObject','URL'],
        'offers' => ['Offer'],
        'provider' => ['Organization','Person'],
        'providerMobility' => ['Text'],
        'review' => ['Review'],
        'serviceOutput' => ['Thing'],
        'serviceType' => ['Text'],
        'termsOfService' => ['Text','URL']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'areaServed' => 'The geographic area where a service or offered item is provided. Supersedes serviceArea.',
        'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
        'availableChannel' => 'A means of accessing the service (e.g. a phone bank, a web site, a location, etc.).',
        'award' => 'An award won by or for this item. Supersedes awards.',
        'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
        'broker' => 'An entity that arranges for an exchange between a buyer and a seller. In most cases a broker never acquires or releases ownership of a product or service involved in an exchange. If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred. Supersedes bookingAgent.',
        'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
        'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
        'hoursAvailable' => 'The hours during which this service or contact is available.',
        'isRelatedTo' => 'A pointer to another, somehow related product (or multiple products).',
        'isSimilarTo' => 'A pointer to another, functionally similar product (or multiple products).',
        'logo' => 'An associated logo.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
        'providerMobility' => 'Indicates the mobility of a provided service (e.g. \'static\', \'dynamic\').',
        'review' => 'A review of the item. Supersedes reviews.',
        'serviceOutput' => 'The tangible thing generated by the service, e.g. a passport, permit, etc. Supersedes produces.',
        'serviceType' => 'The type of service being offered, e.g. veterans\' benefits, emergency relief, etc.',
        'termsOfService' => 'Human-readable terms of service documentation.'
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
            [['aggregateRating','areaServed','audience','availableChannel','award','brand','broker','category','hasOfferCatalog','hoursAvailable','isRelatedTo','isSimilarTo','logo','offers','provider','providerMobility','review','serviceOutput','serviceType','termsOfService'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
