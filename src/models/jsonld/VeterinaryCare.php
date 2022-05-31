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
 * VeterinaryCare - A vet's office.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VeterinaryCare
 */
class VeterinaryCare extends MetaJsonLd implements VeterinaryCareInterface, MedicalOrganizationInterface, OrganizationInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'VeterinaryCare';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/VeterinaryCare';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public string $schemaTypeExtends = 'MedicalOrganization';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
A vet's office.
SCHEMADESC;

    use VeterinaryCareTrait;
    use MedicalOrganizationTrait;
    use OrganizationTrait;
    use ThingTrait;

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
            'additionalType' => ['URL'],
            'address' => ['Text', 'PostalAddress'],
            'aggregateRating' => ['AggregateRating'],
            'alternateName' => ['Text'],
            'alumni' => ['Person'],
            'areaServed' => ['AdministrativeArea', 'GeoShape', 'Text', 'Place'],
            'award' => ['Text'],
            'awards' => ['Text'],
            'brand' => ['Organization', 'Brand'],
            'contactPoint' => ['ContactPoint'],
            'contactPoints' => ['ContactPoint'],
            'correctionsPolicy' => ['URL', 'CreativeWork'],
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
            'globalLocationNumber' => ['Text'],
            'hasCredential' => ['EducationalOccupationalCredential'],
            'hasMerchantReturnPolicy' => ['MerchantReturnPolicy'],
            'hasOfferCatalog' => ['OfferCatalog'],
            'hasPOS' => ['Place'],
            'healthPlanNetworkId' => ['Text'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'interactionStatistic' => ['InteractionCounter'],
            'isAcceptingNewPatients' => ['Boolean'],
            'isicV4' => ['Text'],
            'iso6523Code' => ['Text'],
            'keywords' => ['DefinedTerm', 'Text', 'URL'],
            'knowsAbout' => ['URL', 'Text', 'Thing'],
            'knowsLanguage' => ['Language', 'Text'],
            'legalName' => ['Text'],
            'leiCode' => ['Text'],
            'location' => ['PostalAddress', 'Text', 'Place', 'VirtualLocation'],
            'logo' => ['URL', 'ImageObject'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'makesOffer' => ['Offer'],
            'medicalSpecialty' => ['MedicalSpecialty'],
            'member' => ['Organization', 'Person'],
            'memberOf' => ['ProgramMembership', 'Organization'],
            'members' => ['Person', 'Organization'],
            'naics' => ['Text'],
            'name' => ['Text'],
            'nonprofitStatus' => ['NonprofitType'],
            'numberOfEmployees' => ['QuantitativeValue'],
            'ownershipFundingInfo' => ['URL', 'AboutPage', 'Text', 'CreativeWork'],
            'owns' => ['Product', 'OwnershipInfo'],
            'parentOrganization' => ['Organization'],
            'potentialAction' => ['Action'],
            'publishingPrinciples' => ['URL', 'CreativeWork'],
            'review' => ['Review'],
            'reviews' => ['Review'],
            'sameAs' => ['URL'],
            'seeks' => ['Demand'],
            'serviceArea' => ['GeoShape', 'AdministrativeArea', 'Place'],
            'slogan' => ['Text'],
            'sponsor' => ['Organization', 'Person'],
            'subOrganization' => ['Organization'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'taxID' => ['Text'],
            'telephone' => ['Text'],
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
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'address' => 'Physical address of the item.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'alumni' => 'Alumni of an organization.',
            'areaServed' => 'The geographic area where a service or offered item is provided.',
            'award' => 'An award won by or for this item.',
            'awards' => 'Awards won by or for this item.',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'contactPoint' => 'A contact point for a person or organization.',
            'contactPoints' => 'A contact point for a person or organization.',
            'correctionsPolicy' => 'For an [[Organization]] (e.g. [[NewsMediaOrganization]]), a statement describing (in news media, the newsroom’s) disclosure and correction policy for errors.',
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
            'globalLocationNumber' => 'The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
            'hasCredential' => 'A credential awarded to the Person or Organization.',
            'hasMerchantReturnPolicy' => 'Specifies a MerchantReturnPolicy that may be applicable.',
            'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
            'hasPOS' => 'Points-of-Sales operated by the organization or person.',
            'healthPlanNetworkId' => 'Name or unique ID of network. (Networks are often reused across different insurance plans).',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used.',
            'isAcceptingNewPatients' => 'Whether the provider is accepting new patients.',
            'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
            'iso6523Code' => 'An organization identifier as defined in ISO 6523(-1). Note that many existing organization identifiers such as [leiCode](https://schema.org/leiCode), [duns](https://schema.org/duns) and [vatID](https://schema.org/vatID) can be expressed as an ISO 6523 identifier by setting the ICD part of the ISO 6523 identifier accordingly. ',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'knowsAbout' => 'Of a [[Person]], and less typically of an [[Organization]], to indicate a topic that is known about - suggesting possible expertise but not implying it. We do not distinguish skill levels here, or relate this to educational content, events, objectives or [[JobPosting]] descriptions.',
            'knowsLanguage' => 'Of a [[Person]], and less typically of an [[Organization]], to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47).',
            'legalName' => 'The official name of the organization, e.g. the registered company name.',
            'leiCode' => 'An organization identifier that uniquely identifies a legal entity as defined in ISO 17442.',
            'location' => 'The location of, for example, where an event is happening, where an organization is located, or where an action takes place.',
            'logo' => 'An associated logo.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'makesOffer' => 'A pointer to products or services offered by the organization or person.',
            'medicalSpecialty' => 'A medical specialty of the provider.',
            'member' => 'A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals.',
            'memberOf' => 'An Organization (or ProgramMembership) to which this Person or Organization belongs.',
            'members' => 'A member of this organization.',
            'naics' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.',
            'name' => 'The name of the item.',
            'nonprofitStatus' => 'nonprofit Status indicates the legal status of a non-profit organization in its primary place of business.',
            'numberOfEmployees' => 'The number of employees in an organization e.g. business.',
            'ownershipFundingInfo' => 'For an [[Organization]] (often but not necessarily a [[NewsMediaOrganization]]), a description of organizational ownership structure; funding and grants. In a news/media setting, this is with particular reference to editorial independence.   Note that the [[funder]] is also available and can be used to make basic funder information machine-readable.',
            'owns' => 'Products owned by the organization or person.',
            'parentOrganization' => 'The larger organization that this organization is a [[subOrganization]] of, if any.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via [[URL]]) a document describing the editorial principles of an [[Organization]] (or individual e.g. a [[Person]] writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of the party primarily responsible for the creation of the [[CreativeWork]].  While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a [[funder]]) can be expressed using schema.org terminology. ',
            'review' => 'A review of the item.',
            'reviews' => 'Review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seeks' => 'A pointer to products or services sought by the organization or person (demand).',
            'serviceArea' => 'The geographic area where the service is provided.',
            'slogan' => 'A slogan or motto associated with the item.',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'subOrganization' => 'A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific \'department\' property.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'taxID' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.',
            'telephone' => 'The telephone number.',
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
