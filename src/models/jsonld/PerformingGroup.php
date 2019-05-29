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
 * PerformingGroup - A performance group, such as a band, an orchestra, or a
 * circus.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PerformingGroup
 */
class PerformingGroup extends Organization
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PerformingGroup';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PerformingGroup';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A performance group, such as a band, an orchestra, or a circus.';

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

    // Public Properties
    // =========================================================================

    /**
     * For a NewsMediaOrganization or other news-related Organization, a statement
     * about public engagement activities (for news media, the newsroom’s),
     * including involving the public - digitally or otherwise -- in coverage
     * decisions, reporting and activities after publication.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $actionableFeedbackPolicy;

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
     * Alumni of an organization. Inverse property: alumniOf.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $alumni;

    /**
     * The geographic area where a service or offered item is provided. Supersedes
     * serviceArea.
     *
     * @var mixed|AdministrativeArea|GeoShape|Place|string [schema.org types: AdministrativeArea, GeoShape, Place, Text]
     */
    public $areaServed;

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
     * A contact point for a person or organization. Supersedes contactPoints.
     *
     * @var mixed|ContactPoint [schema.org types: ContactPoint]
     */
    public $contactPoint;

    /**
     * For an Organization (e.g. NewsMediaOrganization), a statement describing
     * (in news media, the newsroom’s) disclosure and correction policy for
     * errors.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $correctionsPolicy;

    /**
     * A relationship between an organization and a department of that
     * organization, also described as an organization (allowing different urls,
     * logos, opening hours). For example: a store with a pharmacy, or a bakery
     * with a cafe.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $department;

    /**
     * The date that this organization was dissolved.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $dissolutionDate;

    /**
     * Statement on diversity policy by an Organization e.g. a
     * NewsMediaOrganization. For a NewsMediaOrganization, a statement describing
     * the newsroom’s diversity policy on both staffing and sources, typically
     * providing staffing data.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $diversityPolicy;

    /**
     * For an Organization (often but not necessarily a NewsMediaOrganization), a
     * report on staffing diversity issues. In a news context this might be for
     * example ASNE or RTDNA (US) reports, or self-reported.
     *
     * @var mixed|Article|string [schema.org types: Article, URL]
     */
    public $diversityStaffingReport;

    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $duns;

    /**
     * Email address.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $email;

    /**
     * Someone working for this organization. Supersedes employees.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $employee;

    /**
     * Statement about ethics policy, e.g. of a NewsMediaOrganization regarding
     * journalistic and publishing practices, or of a Restaurant, a page
     * describing food source policies. In the case of a NewsMediaOrganization, an
     * ethicsPolicy is typically a statement describing the personal,
     * organizational, and corporate standards of behavior expected by the
     * organization.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $ethicsPolicy;

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
     * A person who founded this organization. Supersedes founders.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $founder;

    /**
     * The date that this organization was founded.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $foundingDate;

    /**
     * The place where the Organization was founded.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $foundingLocation;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $funder;

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
     * Indicates an OfferCatalog listing for this Organization, Person, or
     * Service.
     *
     * @var mixed|OfferCatalog [schema.org types: OfferCatalog]
     */
    public $hasOfferCatalog;

    /**
     * Points-of-Sales operated by the organization or person.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $hasPOS;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $isicV4;

    /**
     * Of a Person, and less typically of an Organization, to indicate a topic
     * that is known about - suggesting possible expertise but not implying it. We
     * do not distinguish skill levels here, or yet relate this to educational
     * content, events, objectives or JobPosting descriptions.
     *
     * @var mixed|string|Thing|string [schema.org types: Text, Thing, URL]
     */
    public $knowsAbout;

    /**
     * Of a Person, and less typically of an Organization, to indicate a known
     * language. We do not distinguish skill levels or
     * reading/writing/speaking/signing here. Use language codes from the IETF BCP
     * 47 standard.
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $knowsLanguage;

    /**
     * The official name of the organization, e.g. the registered company name.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $legalName;

    /**
     * An organization identifier that uniquely identifies a legal entity as
     * defined in ISO 17442.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $leiCode;

    /**
     * The location of for example where the event is happening, an organization
     * is located, or where an action takes place.
     *
     * @var mixed|Place|PostalAddress|string [schema.org types: Place, PostalAddress, Text]
     */
    public $location;

    /**
     * An associated logo.
     *
     * @var mixed|ImageObject|string [schema.org types: ImageObject, URL]
     */
    public $logo;

    /**
     * A pointer to products or services offered by the organization or person.
     * Inverse property: offeredBy.
     *
     * @var mixed|Offer [schema.org types: Offer]
     */
    public $makesOffer;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     * Supersedes members, musicGroupMember. Inverse property: memberOf.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $member;

    /**
     * An Organization (or ProgramMembership) to which this Person or Organization
     * belongs. Inverse property: member.
     *
     * @var mixed|Organization|ProgramMembership [schema.org types: Organization, ProgramMembership]
     */
    public $memberOf;

    /**
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $naics;

    /**
     * The number of employees in an organization e.g. business.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfEmployees;

    /**
     * For an Organization (often but not necessarily a NewsMediaOrganization), a
     * description of organizational ownership structure; funding and grants. In a
     * news/media setting, this is with particular reference to editorial
     * independence. Note that the funder is also available and can be used to
     * make basic funder information machine-readable.
     *
     * @var mixed|AboutPage|CreativeWork|string|string [schema.org types: AboutPage, CreativeWork, Text, URL]
     */
    public $ownershipFundingInfo;

    /**
     * Products owned by the organization or person.
     *
     * @var mixed|OwnershipInfo|Product [schema.org types: OwnershipInfo, Product]
     */
    public $owns;

    /**
     * The larger organization that this organization is a subOrganization of, if
     * any. Supersedes branchOf. Inverse property: subOrganization.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $parentOrganization;

    /**
     * The publishingPrinciples property indicates (typically via URL) a document
     * describing the editorial principles of an Organization (or individual e.g.
     * a Person writing a blog) that relate to their activities as a publisher,
     * e.g. ethics or diversity policies. When applied to a CreativeWork (e.g.
     * NewsArticle) the principles are those of the party primarily responsible
     * for the creation of the CreativeWork. While such policies are most
     * typically expressed in natural language, sometimes related information
     * (e.g. indicating a funder) can be expressed using schema.org terminology.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $publishingPrinciples;

    /**
     * A review of the item. Supersedes reviews.
     *
     * @var mixed|Review [schema.org types: Review]
     */
    public $review;

    /**
     * A pointer to products or services sought by the organization or person
     * (demand).
     *
     * @var mixed|Demand [schema.org types: Demand]
     */
    public $seeks;

    /**
     * A slogan or motto associated with the item.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $slogan;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $sponsor;

    /**
     * A relationship between two organizations where the first includes the
     * second, e.g., as a subsidiary. See also: the more specific 'department'
     * property. Inverse property: parentOrganization.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $subOrganization;

    /**
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US
     * or the CIF/NIF in Spain.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $taxID;

    /**
     * The telephone number.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $telephone;

    /**
     * For an Organization (typically a NewsMediaOrganization), a statement about
     * policy on use of unnamed sources and the decision process required.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $unnamedSourcesPolicy;

    /**
     * The Value-added Tax ID of the organization or person.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vatID;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'actionableFeedbackPolicy',
        'address',
        'aggregateRating',
        'alumni',
        'areaServed',
        'award',
        'brand',
        'contactPoint',
        'correctionsPolicy',
        'department',
        'dissolutionDate',
        'diversityPolicy',
        'diversityStaffingReport',
        'duns',
        'email',
        'employee',
        'ethicsPolicy',
        'event',
        'faxNumber',
        'founder',
        'foundingDate',
        'foundingLocation',
        'funder',
        'globalLocationNumber',
        'hasOfferCatalog',
        'hasPOS',
        'isicV4',
        'knowsAbout',
        'knowsLanguage',
        'legalName',
        'leiCode',
        'location',
        'logo',
        'makesOffer',
        'member',
        'memberOf',
        'naics',
        'numberOfEmployees',
        'ownershipFundingInfo',
        'owns',
        'parentOrganization',
        'publishingPrinciples',
        'review',
        'seeks',
        'slogan',
        'sponsor',
        'subOrganization',
        'taxID',
        'telephone',
        'unnamedSourcesPolicy',
        'vatID'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actionableFeedbackPolicy' => ['CreativeWork','URL'],
        'address' => ['PostalAddress','Text'],
        'aggregateRating' => ['AggregateRating'],
        'alumni' => ['Person'],
        'areaServed' => ['AdministrativeArea','GeoShape','Place','Text'],
        'award' => ['Text'],
        'brand' => ['Brand','Organization'],
        'contactPoint' => ['ContactPoint'],
        'correctionsPolicy' => ['CreativeWork','URL'],
        'department' => ['Organization'],
        'dissolutionDate' => ['Date'],
        'diversityPolicy' => ['CreativeWork','URL'],
        'diversityStaffingReport' => ['Article','URL'],
        'duns' => ['Text'],
        'email' => ['Text'],
        'employee' => ['Person'],
        'ethicsPolicy' => ['CreativeWork','URL'],
        'event' => ['Event'],
        'faxNumber' => ['Text'],
        'founder' => ['Person'],
        'foundingDate' => ['Date'],
        'foundingLocation' => ['Place'],
        'funder' => ['Organization','Person'],
        'globalLocationNumber' => ['Text'],
        'hasOfferCatalog' => ['OfferCatalog'],
        'hasPOS' => ['Place'],
        'isicV4' => ['Text'],
        'knowsAbout' => ['Text','Thing','URL'],
        'knowsLanguage' => ['Language','Text'],
        'legalName' => ['Text'],
        'leiCode' => ['Text'],
        'location' => ['Place','PostalAddress','Text'],
        'logo' => ['ImageObject','URL'],
        'makesOffer' => ['Offer'],
        'member' => ['Organization','Person'],
        'memberOf' => ['Organization','ProgramMembership'],
        'naics' => ['Text'],
        'numberOfEmployees' => ['QuantitativeValue'],
        'ownershipFundingInfo' => ['AboutPage','CreativeWork','Text','URL'],
        'owns' => ['OwnershipInfo','Product'],
        'parentOrganization' => ['Organization'],
        'publishingPrinciples' => ['CreativeWork','URL'],
        'review' => ['Review'],
        'seeks' => ['Demand'],
        'slogan' => ['Text'],
        'sponsor' => ['Organization','Person'],
        'subOrganization' => ['Organization'],
        'taxID' => ['Text'],
        'telephone' => ['Text'],
        'unnamedSourcesPolicy' => ['CreativeWork','URL'],
        'vatID' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actionableFeedbackPolicy' => 'For a NewsMediaOrganization or other news-related Organization, a statement about public engagement activities (for news media, the newsroom’s), including involving the public - digitally or otherwise -- in coverage decisions, reporting and activities after publication.',
        'address' => 'Physical address of the item.',
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'alumni' => 'Alumni of an organization. Inverse property: alumniOf.',
        'areaServed' => 'The geographic area where a service or offered item is provided. Supersedes serviceArea.',
        'award' => 'An award won by or for this item. Supersedes awards.',
        'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
        'contactPoint' => 'A contact point for a person or organization. Supersedes contactPoints.',
        'correctionsPolicy' => 'For an Organization (e.g. NewsMediaOrganization), a statement describing (in news media, the newsroom’s) disclosure and correction policy for errors.',
        'department' => 'A relationship between an organization and a department of that organization, also described as an organization (allowing different urls, logos, opening hours). For example: a store with a pharmacy, or a bakery with a cafe.',
        'dissolutionDate' => 'The date that this organization was dissolved.',
        'diversityPolicy' => 'Statement on diversity policy by an Organization e.g. a NewsMediaOrganization. For a NewsMediaOrganization, a statement describing the newsroom’s diversity policy on both staffing and sources, typically providing staffing data.',
        'diversityStaffingReport' => 'For an Organization (often but not necessarily a NewsMediaOrganization), a report on staffing diversity issues. In a news context this might be for example ASNE or RTDNA (US) reports, or self-reported.',
        'duns' => 'The Dun & Bradstreet DUNS number for identifying an organization or business person.',
        'email' => 'Email address.',
        'employee' => 'Someone working for this organization. Supersedes employees.',
        'ethicsPolicy' => 'Statement about ethics policy, e.g. of a NewsMediaOrganization regarding journalistic and publishing practices, or of a Restaurant, a page describing food source policies. In the case of a NewsMediaOrganization, an ethicsPolicy is typically a statement describing the personal, organizational, and corporate standards of behavior expected by the organization.',
        'event' => 'Upcoming or past event associated with this place, organization, or action. Supersedes events.',
        'faxNumber' => 'The fax number.',
        'founder' => 'A person who founded this organization. Supersedes founders.',
        'foundingDate' => 'The date that this organization was founded.',
        'foundingLocation' => 'The place where the Organization was founded.',
        'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
        'globalLocationNumber' => 'The Global Location Number (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
        'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
        'hasPOS' => 'Points-of-Sales operated by the organization or person.',
        'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
        'knowsAbout' => 'Of a Person, and less typically of an Organization, to indicate a topic that is known about - suggesting possible expertise but not implying it. We do not distinguish skill levels here, or yet relate this to educational content, events, objectives or JobPosting descriptions.',
        'knowsLanguage' => 'Of a Person, and less typically of an Organization, to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the IETF BCP 47 standard.',
        'legalName' => 'The official name of the organization, e.g. the registered company name.',
        'leiCode' => 'An organization identifier that uniquely identifies a legal entity as defined in ISO 17442.',
        'location' => 'The location of for example where the event is happening, an organization is located, or where an action takes place.',
        'logo' => 'An associated logo.',
        'makesOffer' => 'A pointer to products or services offered by the organization or person. Inverse property: offeredBy.',
        'member' => 'A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals. Supersedes members, musicGroupMember. Inverse property: memberOf.',
        'memberOf' => 'An Organization (or ProgramMembership) to which this Person or Organization belongs. Inverse property: member.',
        'naics' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.',
        'numberOfEmployees' => 'The number of employees in an organization e.g. business.',
        'ownershipFundingInfo' => 'For an Organization (often but not necessarily a NewsMediaOrganization), a description of organizational ownership structure; funding and grants. In a news/media setting, this is with particular reference to editorial independence. Note that the funder is also available and can be used to make basic funder information machine-readable.',
        'owns' => 'Products owned by the organization or person.',
        'parentOrganization' => 'The larger organization that this organization is a subOrganization of, if any. Supersedes branchOf. Inverse property: subOrganization.',
        'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via URL) a document describing the editorial principles of an Organization (or individual e.g. a Person writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a CreativeWork (e.g. NewsArticle) the principles are those of the party primarily responsible for the creation of the CreativeWork. While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a funder) can be expressed using schema.org terminology.',
        'review' => 'A review of the item. Supersedes reviews.',
        'seeks' => 'A pointer to products or services sought by the organization or person (demand).',
        'slogan' => 'A slogan or motto associated with the item.',
        'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
        'subOrganization' => 'A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific \'department\' property. Inverse property: parentOrganization.',
        'taxID' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.',
        'telephone' => 'The telephone number.',
        'unnamedSourcesPolicy' => 'For an Organization (typically a NewsMediaOrganization), a statement about policy on use of unnamed sources and the decision process required.',
        'vatID' => 'The Value-added Tax ID of the organization or person.'
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
            [['actionableFeedbackPolicy','address','aggregateRating','alumni','areaServed','award','brand','contactPoint','correctionsPolicy','department','dissolutionDate','diversityPolicy','diversityStaffingReport','duns','email','employee','ethicsPolicy','event','faxNumber','founder','foundingDate','foundingLocation','funder','globalLocationNumber','hasOfferCatalog','hasPOS','isicV4','knowsAbout','knowsLanguage','legalName','leiCode','location','logo','makesOffer','member','memberOf','naics','numberOfEmployees','ownershipFundingInfo','owns','parentOrganization','publishingPrinciples','review','seeks','slogan','sponsor','subOrganization','taxID','telephone','unnamedSourcesPolicy','vatID'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
