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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v15.0-release
 * Service - A service provided by an organization, e.g. delivery service, print
 * services, etc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Service
 */
class Service extends MetaJsonLd implements ServiceInterface, IntangibleInterface, ThingInterface
{
    use ServiceTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static $schemaTypeName = 'Service';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static $schemaTypeScope = 'https://schema.org/Service';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static $schemaTypeDescription = 'A service provided by an organization, e.g. delivery service, print services, etc.';


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
            'additionalType' => ['URL'],
            'aggregateRating' => ['AggregateRating'],
            'alternateName' => ['Text'],
            'areaServed' => ['Text', 'Place', 'GeoShape', 'AdministrativeArea'],
            'audience' => ['Audience'],
            'availableChannel' => ['ServiceChannel'],
            'award' => ['Text'],
            'brand' => ['Brand', 'Organization'],
            'broker' => ['Person', 'Organization'],
            'category' => ['URL', 'CategoryCode', 'Text', 'Thing', 'PhysicalActivityCategory'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'hasOfferCatalog' => ['OfferCatalog'],
            'hoursAvailable' => ['OpeningHoursSpecification'],
            'identifier' => ['PropertyValue', 'URL', 'Text'],
            'image' => ['URL', 'ImageObject'],
            'isRelatedTo' => ['Product', 'Service'],
            'isSimilarTo' => ['Product', 'Service'],
            'logo' => ['ImageObject', 'URL'],
            'mainEntityOfPage' => ['URL', 'CreativeWork'],
            'name' => ['Text'],
            'offers' => ['Demand', 'Offer'],
            'potentialAction' => ['Action'],
            'produces' => ['Thing'],
            'provider' => ['Organization', 'Person'],
            'providerMobility' => ['Text'],
            'review' => ['Review'],
            'sameAs' => ['URL'],
            'serviceArea' => ['AdministrativeArea', 'Place', 'GeoShape'],
            'serviceAudience' => ['Audience'],
            'serviceOutput' => ['Thing'],
            'serviceType' => ['Text', 'GovernmentBenefitsType'],
            'slogan' => ['Text'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'termsOfService' => ['URL', 'Text'],
            'url' => ['URL'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'areaServed' => 'The geographic area where a service or offered item is provided.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'availableChannel' => 'A means of accessing the service (e.g. a phone bank, a web site, a location, etc.).',
            'award' => 'An award won by or for this item.',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'broker' => 'An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
            'hoursAvailable' => 'The hours during which this service or contact is available.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'isRelatedTo' => 'A pointer to another, somehow related product (or multiple products).',
            'isSimilarTo' => 'A pointer to another, functionally similar product (or multiple products).',
            'logo' => 'An associated logo.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'produces' => 'The tangible thing generated by the service, e.g. a passport, permit, etc.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'providerMobility' => 'Indicates the mobility of a provided service (e.g. \'static\', \'dynamic\').',
            'review' => 'A review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'serviceArea' => 'The geographic area where the service is provided.',
            'serviceAudience' => 'The audience eligible for this service.',
            'serviceOutput' => 'The tangible thing generated by the service, e.g. a passport, permit, etc.',
            'serviceType' => 'The type of service being offered, e.g. veterans\' benefits, emergency relief, etc.',
            'slogan' => 'A slogan or motto associated with the item.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'termsOfService' => 'Human-readable terms of service documentation.',
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
