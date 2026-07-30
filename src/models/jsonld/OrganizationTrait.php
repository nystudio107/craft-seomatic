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
 * Trait for Organization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Organization
 */
trait OrganizationTrait
{
    /**
     * The payment method(s) that are accepted in general by an organization, or
     * for some specific demand or offer.
     *
     * @var string|array|LoanOrCredit|LoanOrCredit[]|array|PaymentMethod|PaymentMethod[]|array|Text|Text[]
     */
    public $acceptedPaymentMethod;

    /**
     * For a [[NewsMediaOrganization]] or other news-related [[Organization]], a
     * statement about public engagement activities (for news media, the
     * newsroom’s), including involving the public - digitally or otherwise --
     * in coverage decisions, reporting and activities after publication.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $actionableFeedbackPolicy;

    /**
     * Physical address of the item.
     *
     * @var string|array|PostalAddress|PostalAddress[]|array|Text|Text[]
     */
    public $address;

    /**
     * The number of completed interactions for this entity, in a particular role
     * (the 'agent'), in a particular action (indicated in the statistic), and in
     * a particular context (i.e. interactionService).
     *
     * @var array|InteractionCounter|InteractionCounter[]
     */
    public $agentInteractionStatistic;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var array|AggregateRating|AggregateRating[]
     */
    public $aggregateRating;

    /**
     * Alumni of an organization.
     *
     * @var array|Person|Person[]
     */
    public $alumni;

    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|array|AdministrativeArea|AdministrativeArea[]|array|GeoShape|GeoShape[]|array|Place|Place[]|array|Text|Text[]
     */
    public $areaServed;

    /**
     * An award won by or for this item.
     *
     * @var string|array|Text|Text[]
     */
    public $award;

    /**
     * Awards won by or for this item.
     *
     * @var string|array|Text|Text[]
     */
    public $awards;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var array|Brand|Brand[]|array|Organization|Organization[]
     */
    public $brand;

    /**
     * The official registration information of a business including the
     * organization that issued it such as Company House or Chamber of Commerce in
     * form of a Certification.
     *
     * @var array|Certification|Certification[]
     */
    public $companyRegistration;

    /**
     * A contact point for a person or organization.
     *
     * @var array|ContactPoint|ContactPoint[]
     */
    public $contactPoint;

    /**
     * A contact point for a person or organization.
     *
     * @var array|ContactPoint|ContactPoint[]
     */
    public $contactPoints;

    /**
     * For an [[Organization]] (e.g. [[NewsMediaOrganization]]), a statement
     * describing (in news media, the newsroom’s) disclosure and correction
     * policy for errors.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $correctionsPolicy;

    /**
     * A relationship between an organization and a department of that
     * organization, also described as an organization (allowing different urls,
     * logos, opening hours). For example: a store with a pharmacy, or a bakery
     * with a cafe.
     *
     * @var array|Organization|Organization[]
     */
    public $department;

    /**
     * The date that this organization was dissolved.
     *
     * @var array|Date|Date[]
     */
    public $dissolutionDate;

    /**
     * Statement on diversity policy by an [[Organization]] e.g. a
     * [[NewsMediaOrganization]]. For a [[NewsMediaOrganization]], a statement
     * describing the newsroom’s diversity policy on both staffing and sources,
     * typically providing staffing data.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $diversityPolicy;

    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a report on staffing diversity issues. In a
     * news context this might be for example ASNE or RTDNA (US) reports, or
     * self-reported.
     *
     * @var array|Article|Article[]|array|URL|URL[]
     */
    public $diversityStaffingReport;

    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     *
     * @var string|array|Text|Text[]
     */
    public $duns;

    /**
     * Email address.
     *
     * @var string|array|Text|Text[]
     */
    public $email;

    /**
     * Someone working for this organization.
     *
     * @var array|Person|Person[]
     */
    public $employee;

    /**
     * People working for this organization.
     *
     * @var array|Person|Person[]
     */
    public $employees;

    /**
     * Statement about ethics policy, e.g. of a [[NewsMediaOrganization]]
     * regarding journalistic and publishing practices, or of a [[Restaurant]], a
     * page describing food source policies. In the case of a
     * [[NewsMediaOrganization]], an ethicsPolicy is typically a statement
     * describing the personal, organizational, and corporate standards of
     * behavior expected by the organization.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $ethicsPolicy;

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
     * A person or organization who founded this organization.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $founder;

    /**
     * A person who founded this organization.
     *
     * @var array|Person|Person[]
     */
    public $founders;

    /**
     * The date that this organization was founded.
     *
     * @var array|Date|Date[]
     */
    public $foundingDate;

    /**
     * The place where the Organization was founded.
     *
     * @var array|Place|Place[]
     */
    public $foundingLocation;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $funder;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var array|Grant|Grant[]
     */
    public $funding;

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
     * A credential awarded to the Person or Organization.
     *
     * @var array|Credential|Credential[]
     */
    public $hasCredential;

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
     * MemberProgram offered by an Organization, for example an eCommerce merchant
     * or an airline.
     *
     * @var array|MemberProgram|MemberProgram[]
     */
    public $hasMemberProgram;

    /**
     * Specifies a MerchantReturnPolicy that may be applicable.
     *
     * @var array|MerchantReturnPolicy|MerchantReturnPolicy[]
     */
    public $hasMerchantReturnPolicy;

    /**
     * Indicates an OfferCatalog listing for this Organization, Person, or
     * Service.
     *
     * @var array|OfferCatalog|OfferCatalog[]
     */
    public $hasOfferCatalog;

    /**
     * Points-of-Sales operated by the organization or person.
     *
     * @var array|Place|Place[]
     */
    public $hasPOS;

    /**
     * Specification of a shipping service offered by the organization.
     *
     * @var array|ShippingService|ShippingService[]
     */
    public $hasShippingService;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used.
     *
     * @var array|InteractionCounter|InteractionCounter[]
     */
    public $interactionStatistic;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var string|array|Text|Text[]
     */
    public $isicV4;

    /**
     * An organization identifier as defined in [ISO
     * 6523(-1)](https://en.wikipedia.org/wiki/ISO/IEC_6523). The identifier
     * should be in the `XXXX:YYYYYY:ZZZ` or `XXXX:YYYYYY`format. Where `XXXX` is
     * a 4 digit _ICD_ (International Code Designator), `YYYYYY` is an _OID_
     * (Organization Identifier) with all formatting characters (dots, dashes,
     * spaces) removed with a maximal length of 35 characters, and `ZZZ` is an
     * optional OPI (Organization Part Identifier) with a maximum length of 35
     * characters. The various components (ICD, OID, OPI) are joined with a colon
     * character (ASCII `0x3a`). Note that many existing organization identifiers
     * defined as attributes like [leiCode](https://schema.org/leiCode) (`0199`),
     * [duns](https://schema.org/duns) (`0060`) or
     * [GLN](https://schema.org/globalLocationNumber) (`0088`) can be expressed
     * using ISO-6523. If possible, ISO-6523 codes should be preferred to
     * populating [vatID](https://schema.org/vatID) or
     * [taxID](https://schema.org/taxID), as ISO identifiers are less ambiguous.
     *
     * @var string|array|Text|Text[]
     */
    public $iso6523Code;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]|array|URL|URL[]
     */
    public $keywords;

    /**
     * Of a [[Person]], and less typically of an [[Organization]], to indicate a
     * topic that is known about - suggesting possible expertise but not implying
     * it. We do not distinguish skill levels here, or relate this to educational
     * content, events, objectives or [[JobPosting]] descriptions.
     *
     * @var string|array|Text|Text[]|array|Thing|Thing[]|array|URL|URL[]
     */
    public $knowsAbout;

    /**
     * Of a [[Person]], and less typically of an [[Organization]], to indicate a
     * known language. We do not distinguish skill levels or
     * reading/writing/speaking/signing here. Use language codes from the [IETF
     * BCP 47 standard](http://tools.ietf.org/html/bcp47).
     *
     * @var string|array|Language|Language[]|array|Text|Text[]
     */
    public $knowsLanguage;

    /**
     * The legal address of an organization which acts as the officially
     * registered address used for legal and tax purposes. The legal address can
     * be different from the place of operations of a business and other addresses
     * can be part of an organization.
     *
     * @var array|PostalAddress|PostalAddress[]
     */
    public $legalAddress;

    /**
     * The official name of the organization, e.g. the registered company name.
     *
     * @var string|array|Text|Text[]
     */
    public $legalName;

    /**
     * One or multiple persons who represent this organization legally such as CEO
     * or sole administrator.
     *
     * @var array|Person|Person[]
     */
    public $legalRepresentative;

    /**
     * An organization identifier that uniquely identifies a legal entity as
     * defined in ISO 17442.
     *
     * @var string|array|Text|Text[]
     */
    public $leiCode;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|array|Place|Place[]|array|PostalAddress|PostalAddress[]|array|Text|Text[]|array|VirtualLocation|VirtualLocation[]
     */
    public $location;

    /**
     * An associated logo.
     *
     * @var array|ImageObject|ImageObject[]|array|URL|URL[]
     */
    public $logo;

    /**
     * A pointer to products or services offered by the organization or person.
     *
     * @var array|Offer|Offer[]
     */
    public $makesOffer;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $member;

    /**
     * An Organization (or ProgramMembership) to which this Person or Organization
     * belongs.
     *
     * @var array|MemberProgramTier|MemberProgramTier[]|array|Organization|Organization[]|array|ProgramMembership|ProgramMembership[]
     */
    public $memberOf;

    /**
     * A member of this organization.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $members;

    /**
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     *
     * @var string|array|Text|Text[]
     */
    public $naics;

    /**
     * nonprofitStatus indicates the legal status of a non-profit organization in
     * its primary place of business.
     *
     * @var array|NonprofitType|NonprofitType[]
     */
    public $nonprofitStatus;

    /**
     * The number of employees in an organization, e.g. business.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfEmployees;

    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a description of organizational ownership
     * structure; funding and grants. In a news/media setting, this is with
     * particular reference to editorial independence.   Note that the [[funder]]
     * is also available and can be used to make basic funder information
     * machine-readable.
     *
     * @var string|array|AboutPage|AboutPage[]|array|CreativeWork|CreativeWork[]|array|Text|Text[]|array|URL|URL[]
     */
    public $ownershipFundingInfo;

    /**
     * Things owned by the organization or person.
     *
     * @var array|Thing|Thing[]
     */
    public $owns;

    /**
     * The larger organization that this organization is a [[subOrganization]] of,
     * if any.
     *
     * @var array|Organization|Organization[]
     */
    public $parentOrganization;

    /**
     * The publishingPrinciples property indicates (typically via [[URL]]) a
     * document describing the editorial principles of an [[Organization]] (or
     * individual, e.g. a [[Person]] writing a blog) that relate to their
     * activities as a publisher, e.g. ethics or diversity policies. When applied
     * to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of
     * the party primarily responsible for the creation of the [[CreativeWork]].
     * While such policies are most typically expressed in natural language,
     * sometimes related information (e.g. indicating a [[funder]]) can be
     * expressed using schema.org terminology.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $publishingPrinciples;

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
     * A pointer to products or services sought by the organization or person
     * (demand).
     *
     * @var array|Demand|Demand[]
     */
    public $seeks;

    /**
     * The geographic area where the service is provided.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]|array|GeoShape|GeoShape[]|array|Place|Place[]
     */
    public $serviceArea;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is either claimed by a person, an organization
     * or desired or required to fulfill a role or to work in an occupation.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $skills;

    /**
     * A slogan or motto associated with the item.
     *
     * @var string|array|Text|Text[]
     */
    public $slogan;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. E.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $sponsor;

    /**
     * A relationship between two organizations where the first includes the
     * second, e.g., as a subsidiary. See also: the more specific 'department'
     * property.
     *
     * @var array|Organization|Organization[]
     */
    public $subOrganization;

    /**
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US
     * or the CIF/NIF in Spain.
     *
     * @var string|array|Text|Text[]
     */
    public $taxID;

    /**
     * The telephone number.
     *
     * @var string|array|Text|Text[]
     */
    public $telephone;

    /**
     * For an [[Organization]] (typically a [[NewsMediaOrganization]]), a
     * statement about policy on use of unnamed sources and the decision process
     * required.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $unnamedSourcesPolicy;

    /**
     * The value-added Tax ID of the organization or person with national prefix
     * (for example IT123456789). Can also be described as [[iso6523Code]] with
     * proper prefix.
     *
     * @var string|array|Text|Text[]
     */
    public $vatID;
}
