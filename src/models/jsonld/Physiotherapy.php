<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v14.0-release
 * Physiotherapy - The practice of treatment of disease, injury, or deformity by physical
 * methods such as massage, heat treatment, and exercise rather than by drugs
 * or surgery..
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Physiotherapy
 */
class Physiotherapy extends MetaJsonLd implements PhysiotherapyInterface, MedicalBusinessInterface, LocalBusinessInterface, OrganizationInterface, ThingInterface, PlaceInterface, MedicalSpecialtyInterface, SpecialtyInterface, EnumerationInterface, IntangibleInterface, MedicalEnumerationInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'Physiotherapy';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/Physiotherapy';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
The practice of treatment of disease, injury, or deformity by physical methods such as massage, heat treatment, and exercise rather than by drugs or surgery..
SCHEMADESC;

    use PhysiotherapyTrait;
    use MedicalBusinessTrait;
    use LocalBusinessTrait;
    use OrganizationTrait;
    use ThingTrait;
    use PlaceTrait;
    use MedicalSpecialtyTrait;
    use SpecialtyTrait;
    use EnumerationTrait;
    use IntangibleTrait;
    use MedicalEnumerationTrait;

    // Public methods
    // =========================================================================

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
            'actionableFeedbackPolicy' => ['URL', 'CreativeWork'],
            'additionalProperty' => ['PropertyValue'],
            'additionalType' => ['URL'],
            'address' => ['Text', 'PostalAddress'],
            'aggregateRating' => ['AggregateRating'],
            'alternateName' => ['Text'],
            'alumni' => ['Person'],
            'amenityFeature' => ['LocationFeatureSpecification'],
            'areaServed' => ['AdministrativeArea', 'GeoShape', 'Text', 'Place'],
            'award' => ['Text'],
            'awards' => ['Text'],
            'branchCode' => ['Text'],
            'branchOf' => ['Organization'],
            'brand' => ['Organization', 'Brand'],
            'contactPoint' => ['ContactPoint'],
            'contactPoints' => ['ContactPoint'],
            'containedIn' => ['Place'],
            'containedInPlace' => ['Place'],
            'containsPlace' => ['Place'],
            'correctionsPolicy' => ['URL', 'CreativeWork'],
            'currenciesAccepted' => ['Text'],
            'department' => ['Organization'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'dissolutionDate' => ['Date'],
            'diversityPolicy' => ['CreativeWork', 'URL'],
            'diversityStaffingReport' => ['URL', 'Article'],
            'duns' => ['Text'],
            'email' => ['Text'],
            'employee' => ['Person'],
            'employees' => ['Person'],
            'ethicsPolicy' => ['URL', 'CreativeWork'],
            'event' => ['Event'],
            'events' => ['Event'],
            'faxNumber' => ['Text'],
            'founder' => ['Person'],
            'founders' => ['Person'],
            'foundingDate' => ['Date'],
            'foundingLocation' => ['Place'],
            'funder' => ['Organization', 'Person'],
            'funding' => ['Grant'],
            'geo' => ['GeoCoordinates', 'GeoShape'],
            'geoContains' => ['Place', 'GeospatialGeometry'],
            'geoCoveredBy' => ['Place', 'GeospatialGeometry'],
            'geoCovers' => ['GeospatialGeometry', 'Place'],
            'geoCrosses' => ['GeospatialGeometry', 'Place'],
            'geoDisjoint' => ['GeospatialGeometry', 'Place'],
            'geoEquals' => ['Place', 'GeospatialGeometry'],
            'geoIntersects' => ['GeospatialGeometry', 'Place'],
            'geoOverlaps' => ['GeospatialGeometry', 'Place'],
            'geoTouches' => ['Place', 'GeospatialGeometry'],
            'geoWithin' => ['Place', 'GeospatialGeometry'],
            'globalLocationNumber' => ['Text'],
            'hasCredential' => ['EducationalOccupationalCredential'],
            'hasDriveThroughService' => ['Boolean'],
            'hasMap' => ['URL', 'Map'],
            'hasMerchantReturnPolicy' => ['MerchantReturnPolicy'],
            'hasOfferCatalog' => ['OfferCatalog'],
            'hasPOS' => ['Place'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'interactionStatistic' => ['InteractionCounter'],
            'isAccessibleForFree' => ['Boolean'],
            'isicV4' => ['Text'],
            'iso6523Code' => ['Text'],
            'keywords' => ['DefinedTerm', 'Text', 'URL'],
            'knowsAbout' => ['URL', 'Text', 'Thing'],
            'knowsLanguage' => ['Language', 'Text'],
            'latitude' => ['Text', 'Number'],
            'legalName' => ['Text'],
            'leiCode' => ['Text'],
            'location' => ['PostalAddress', 'Text', 'Place', 'VirtualLocation'],
            'logo' => ['URL', 'ImageObject'],
            'longitude' => ['Number', 'Text'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'makesOffer' => ['Offer'],
            'map' => ['URL'],
            'maps' => ['URL'],
            'maximumAttendeeCapacity' => ['Integer'],
            'member' => ['Organization', 'Person'],
            'memberOf' => ['ProgramMembership', 'Organization'],
            'members' => ['Person', 'Organization'],
            'naics' => ['Text'],
            'name' => ['Text'],
            'nonprofitStatus' => ['NonprofitType'],
            'numberOfEmployees' => ['QuantitativeValue'],
            'openingHours' => ['Text'],
            'openingHoursSpecification' => ['OpeningHoursSpecification'],
            'ownershipFundingInfo' => ['URL', 'AboutPage', 'Text', 'CreativeWork'],
            'owns' => ['Product', 'OwnershipInfo'],
            'parentOrganization' => ['Organization'],
            'paymentAccepted' => ['Text'],
            'photo' => ['Photograph', 'ImageObject'],
            'photos' => ['ImageObject', 'Photograph'],
            'potentialAction' => ['Action'],
            'priceRange' => ['Text'],
            'publicAccess' => ['Boolean'],
            'publishingPrinciples' => ['URL', 'CreativeWork'],
            'review' => ['Review'],
            'reviews' => ['Review'],
            'sameAs' => ['URL'],
            'seeks' => ['Demand'],
            'serviceArea' => ['GeoShape', 'AdministrativeArea', 'Place'],
            'slogan' => ['Text'],
            'smokingAllowed' => ['Boolean'],
            'specialOpeningHoursSpecification' => ['OpeningHoursSpecification'],
            'sponsor' => ['Organization', 'Person'],
            'subOrganization' => ['Organization'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'supersededBy' => ['Enumeration', 'Class', 'Property'],
            'taxID' => ['Text'],
            'telephone' => ['Text'],
            'tourBookingPage' => ['URL'],
            'unnamedSourcesPolicy' => ['CreativeWork', 'URL'],
            'url' => ['URL'],
            'vatID' => ['Text']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'actionableFeedbackPolicy' => 'For a [[NewsMediaOrganization]] or other news-related [[Organization]], a statement about public engagement activities (for news media, the newsroom’s), including involving the public - digitally or otherwise -- in coverage decisions, reporting and activities after publication.',
            'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'address' => 'Physical address of the item.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'alumni' => 'Alumni of an organization.',
            'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
            'areaServed' => 'The geographic area where a service or offered item is provided.',
            'award' => 'An award won by or for this item.',
            'awards' => 'Awards won by or for this item.',
            'branchCode' => 'A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs.  For example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.       ',
            'branchOf' => 'The larger organization that this local business is a branch of, if any. Not to be confused with (anatomical)[[branch]].',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'contactPoint' => 'A contact point for a person or organization.',
            'contactPoints' => 'A contact point for a person or organization.',
            'containedIn' => 'The basic containment relation between a place and one that contains it.',
            'containedInPlace' => 'The basic containment relation between a place and one that contains it.',
            'containsPlace' => 'The basic containment relation between a place and another that it contains.',
            'correctionsPolicy' => 'For an [[Organization]] (e.g. [[NewsMediaOrganization]]), a statement describing (in news media, the newsroom’s) disclosure and correction policy for errors.',
            'currenciesAccepted' => 'The currency accepted.  Use standard formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217) e.g. "USD"; [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for cryptocurrencies e.g. "BTC"; well known names for [Local Exchange Tradings Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system) (LETS) and other currency types e.g. "Ithaca HOUR".',
            'department' => 'A relationship between an organization and a department of that organization, also described as an organization (allowing different urls, logos, opening hours). For example: a store with a pharmacy, or a bakery with a cafe.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'dissolutionDate' => 'The date that this organization was dissolved.',
            'diversityPolicy' => 'Statement on diversity policy by an [[Organization]] e.g. a [[NewsMediaOrganization]]. For a [[NewsMediaOrganization]], a statement describing the newsroom’s diversity policy on both staffing and sources, typically providing staffing data.',
            'diversityStaffingReport' => 'For an [[Organization]] (often but not necessarily a [[NewsMediaOrganization]]), a report on staffing diversity issues. In a news context this might be for example ASNE or RTDNA (US) reports, or self-reported.',
            'duns' => 'The Dun & Bradstreet DUNS number for identifying an organization or business person.',
            'email' => 'Email address.',
            'employee' => 'Someone working for this organization.',
            'employees' => 'People working for this organization.',
            'ethicsPolicy' => 'Statement about ethics policy, e.g. of a [[NewsMediaOrganization]] regarding journalistic and publishing practices, or of a [[Restaurant]], a page describing food source policies. In the case of a [[NewsMediaOrganization]], an ethicsPolicy is typically a statement describing the personal, organizational, and corporate standards of behavior expected by the organization.',
            'event' => 'Upcoming or past event associated with this place, organization, or action.',
            'events' => 'Upcoming or past events associated with this place or organization.',
            'faxNumber' => 'The fax number.',
            'founder' => 'A person who founded this organization.',
            'founders' => 'A person who founded this organization.',
            'foundingDate' => 'The date that this organization was founded.',
            'foundingLocation' => 'The place where the Organization was founded.',
            'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'geo' => 'The geo coordinates of the place.',
            'geoContains' => 'Represents a relationship between two geometries (or the places they represent), relating a containing geometry to a contained geometry. "a contains b iff no points of b lie in the exterior of a, and at least one point of the interior of b lies in the interior of a". As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoCoveredBy' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that covers it. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoCovers' => 'Represents a relationship between two geometries (or the places they represent), relating a covering geometry to a covered geometry. "Every point of b is a point of (the interior or boundary of) a". As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoCrosses' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that crosses it: "a crosses b: they have some but not all interior points in common, and the dimension of the intersection is less than that of at least one of them". As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoDisjoint' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically disjoint: they have no point in common. They form a set of disconnected geometries." (a symmetric relationship, as defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM))',
            'geoEquals' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically equal, as defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM). "Two geometries are topologically equal if their interiors intersect and no part of the interior or boundary of one geometry intersects the exterior of the other" (a symmetric relationship)',
            'geoIntersects' => 'Represents spatial relations in which two geometries (or the places they represent) have at least one point in common. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoOverlaps' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that geospatially overlaps it, i.e. they have some but not all points in common. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'geoTouches' => 'Represents spatial relations in which two geometries (or the places they represent) touch: they have at least one boundary point in common, but no interior points." (a symmetric relationship, as defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM) )',
            'geoWithin' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to one that contains it, i.e. it is inside (i.e. within) its interior. As defined in [DE-9IM](https://en.wikipedia.org/wiki/DE-9IM).',
            'globalLocationNumber' => 'The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
            'hasCredential' => 'A credential awarded to the Person or Organization.',
            'hasDriveThroughService' => 'Indicates whether some facility (e.g. [[FoodEstablishment]], [[CovidTestingFacility]]) offers a service that can be used by driving through in a car. In the case of [[CovidTestingFacility]] such facilities could potentially help with social distancing from other potentially-infected users.',
            'hasMap' => 'A URL to a map of the place.',
            'hasMerchantReturnPolicy' => 'Specifies a MerchantReturnPolicy that may be applicable.',
            'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
            'hasPOS' => 'Points-of-Sales operated by the organization or person.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used.',
            'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free.',
            'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
            'iso6523Code' => 'An organization identifier as defined in ISO 6523(-1). Note that many existing organization identifiers such as [leiCode](https://schema.org/leiCode), [duns](https://schema.org/duns) and [vatID](https://schema.org/vatID) can be expressed as an ISO 6523 identifier by setting the ICD part of the ISO 6523 identifier accordingly. ',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'knowsAbout' => 'Of a [[Person]], and less typically of an [[Organization]], to indicate a topic that is known about - suggesting possible expertise but not implying it. We do not distinguish skill levels here, or relate this to educational content, events, objectives or [[JobPosting]] descriptions.',
            'knowsLanguage' => 'Of a [[Person]], and less typically of an [[Organization]], to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47).',
            'latitude' => 'The latitude of a location. For example ```37.42242``` ([WGS 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).',
            'legalName' => 'The official name of the organization, e.g. the registered company name.',
            'leiCode' => 'An organization identifier that uniquely identifies a legal entity as defined in ISO 17442.',
            'location' => 'The location of, for example, where an event is happening, where an organization is located, or where an action takes place.',
            'logo' => 'An associated logo.',
            'longitude' => 'The longitude of a location. For example ```-122.08585``` ([WGS 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'makesOffer' => 'A pointer to products or services offered by the organization or person.',
            'map' => 'A URL to a map of the place.',
            'maps' => 'A URL to a map of the place.',
            'maximumAttendeeCapacity' => 'The total number of individuals that may attend an event or venue.',
            'member' => 'A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals.',
            'memberOf' => 'An Organization (or ProgramMembership) to which this Person or Organization belongs.',
            'members' => 'A member of this organization.',
            'naics' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.',
            'name' => 'The name of the item.',
            'nonprofitStatus' => 'nonprofit Status indicates the legal status of a non-profit organization in its primary place of business.',
            'numberOfEmployees' => 'The number of employees in an organization e.g. business.',
            'openingHours' => 'The general opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'.  * Days are specified using the following two-letter combinations: ```Mo```, ```Tu```, ```We```, ```Th```, ```Fr```, ```Sa```, ```Su```. * Times are specified using 24:00 format. For example, 3pm is specified as ```15:00```, 10am as ```10:00```.  * Here is an example: <code><time itemprop="openingHours" datetime="Tu,Th 16:00-20:00">Tuesdays and Thursdays 4-8pm</time></code>. * If a business is open 7 days a week, then it can be specified as <code><time itemprop="openingHours" datetime="Mo-Su">Monday through Sunday, all day</time></code>.',
            'openingHoursSpecification' => 'The opening hours of a certain place.',
            'ownershipFundingInfo' => 'For an [[Organization]] (often but not necessarily a [[NewsMediaOrganization]]), a description of organizational ownership structure; funding and grants. In a news/media setting, this is with particular reference to editorial independence.   Note that the [[funder]] is also available and can be used to make basic funder information machine-readable.',
            'owns' => 'Products owned by the organization or person.',
            'parentOrganization' => 'The larger organization that this organization is a [[subOrganization]] of, if any.',
            'paymentAccepted' => 'Cash, Credit Card, Cryptocurrency, Local Exchange Tradings System, etc.',
            'photo' => 'A photograph of this place.',
            'photos' => 'Photographs of this place.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'priceRange' => 'The price range of the business, for example ```$$$```.',
            'publicAccess' => 'A flag to signal that the [[Place]] is open to public visitors.  If this property is omitted there is no assumed default boolean value',
            'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via [[URL]]) a document describing the editorial principles of an [[Organization]] (or individual e.g. a [[Person]] writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of the party primarily responsible for the creation of the [[CreativeWork]].  While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a [[funder]]) can be expressed using schema.org terminology. ',
            'review' => 'A review of the item.',
            'reviews' => 'Review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seeks' => 'A pointer to products or services sought by the organization or person (demand).',
            'serviceArea' => 'The geographic area where the service is provided.',
            'slogan' => 'A slogan or motto associated with the item.',
            'smokingAllowed' => 'Indicates whether it is allowed to smoke in the place, e.g. in the restaurant, hotel or hotel room.',
            'specialOpeningHoursSpecification' => 'The special opening hours of a certain place.  Use this to explicitly override general opening hours brought in scope by [[openingHoursSpecification]] or [[openingHours]].       ',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'subOrganization' => 'A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific \'department\' property.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'supersededBy' => 'Relates a term (i.e. a property, class or enumeration) to one that supersedes it.',
            'taxID' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.',
            'telephone' => 'The telephone number.',
            'tourBookingPage' => 'A page providing information on how to book a tour of some [[Place]], such as an [[Accommodation]] or [[ApartmentComplex]] in a real estate setting, as well as other kinds of tours as appropriate.',
            'unnamedSourcesPolicy' => 'For an [[Organization]] (typically a [[NewsMediaOrganization]]), a statement about policy on use of unnamed sources and the decision process required.',
            'url' => 'URL of the item.',
            'vatID' => 'The Value-added Tax ID of the organization or person.'
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
            [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
