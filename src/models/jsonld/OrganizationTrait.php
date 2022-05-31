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

/**
 * schema.org version: v14.0-release
 * Trait for Organization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Organization
 */

trait OrganizationTrait
{
    
    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a description of organizational ownership
     * structure; funding and grants. In a news/media setting, this is with
     * particular reference to editorial independence.   Note that the [[funder]]
     * is also available and can be used to make basic funder information
     * machine-readable.
     *
     * @var string|URL|AboutPage|Text|CreativeWork
     */
    public $ownershipFundingInfo;

    /**
     * A credential awarded to the Person or Organization.
     *
     * @var EducationalOccupationalCredential
     */
    public $hasCredential;

    /**
     * A person who founded this organization.
     *
     * @var Person
     */
    public $founders;

    /**
     * The telephone number.
     *
     * @var string|Text
     */
    public $telephone;

    /**
     * A review of the item.
     *
     * @var Review
     */
    public $review;

    /**
     * Of a [[Person]], and less typically of an [[Organization]], to indicate a
     * topic that is known about - suggesting possible expertise but not implying
     * it. We do not distinguish skill levels here, or relate this to educational
     * content, events, objectives or [[JobPosting]] descriptions.
     *
     * @var string|URL|Text|Thing
     */
    public $knowsAbout;

    /**
     * An award won by or for this item.
     *
     * @var string|Text
     */
    public $award;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     *
     * @var Organization|Person
     */
    public $member;

    /**
     * Someone working for this organization.
     *
     * @var Person
     */
    public $employee;

    /**
     * The date that this organization was dissolved.
     *
     * @var Date
     */
    public $dissolutionDate;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var Grant
     */
    public $funding;

    /**
     * The Value-added Tax ID of the organization or person.
     *
     * @var string|Text
     */
    public $vatID;

    /**
     * The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also
     * referred to as International Location Number or ILN) of the respective
     * organization, person, or place. The GLN is a 13-digit number used to
     * identify parties and physical locations.
     *
     * @var string|Text
     */
    public $globalLocationNumber;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|DefinedTerm|Text|URL
     */
    public $keywords;

    /**
     * A contact point for a person or organization.
     *
     * @var ContactPoint
     */
    public $contactPoints;

    /**
     * A relationship between two organizations where the first includes the
     * second, e.g., as a subsidiary. See also: the more specific 'department'
     * property.
     *
     * @var Organization
     */
    public $subOrganization;

    /**
     * Awards won by or for this item.
     *
     * @var string|Text
     */
    public $awards;

    /**
     * The number of employees in an organization e.g. business.
     *
     * @var QuantitativeValue
     */
    public $numberOfEmployees;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var Organization|Person
     */
    public $funder;

    /**
     * A pointer to products or services offered by the organization or person.
     *
     * @var Offer
     */
    public $makesOffer;

    /**
     * The official name of the organization, e.g. the registered company name.
     *
     * @var string|Text
     */
    public $legalName;

    /**
     * For an [[Organization]] (e.g. [[NewsMediaOrganization]]), a statement
     * describing (in news media, the newsroom’s) disclosure and correction
     * policy for errors.
     *
     * @var URL|CreativeWork
     */
    public $correctionsPolicy;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating
     */
    public $aggregateRating;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used.
     *
     * @var InteractionCounter
     */
    public $interactionStatistic;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|PostalAddress|Text|Place|VirtualLocation
     */
    public $location;

    /**
     * Physical address of the item.
     *
     * @var string|Text|PostalAddress
     */
    public $address;

    /**
     * An Organization (or ProgramMembership) to which this Person or Organization
     * belongs.
     *
     * @var ProgramMembership|Organization
     */
    public $memberOf;

    /**
     * The publishingPrinciples property indicates (typically via [[URL]]) a
     * document describing the editorial principles of an [[Organization]] (or
     * individual e.g. a [[Person]] writing a blog) that relate to their
     * activities as a publisher, e.g. ethics or diversity policies. When applied
     * to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of
     * the party primarily responsible for the creation of the [[CreativeWork]]. 
     * While such policies are most typically expressed in natural language,
     * sometimes related information (e.g. indicating a [[funder]]) can be
     * expressed using schema.org terminology. 
     *
     * @var URL|CreativeWork
     */
    public $publishingPrinciples;

    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a report on staffing diversity issues. In a
     * news context this might be for example ASNE or RTDNA (US) reports, or
     * self-reported.
     *
     * @var URL|Article
     */
    public $diversityStaffingReport;

    /**
     * Statement on diversity policy by an [[Organization]] e.g. a
     * [[NewsMediaOrganization]]. For a [[NewsMediaOrganization]], a statement
     * describing the newsroom’s diversity policy on both staffing and sources,
     * typically providing staffing data.
     *
     * @var CreativeWork|URL
     */
    public $diversityPolicy;

    /**
     * Email address.
     *
     * @var string|Text
     */
    public $email;

    /**
     * People working for this organization.
     *
     * @var Person
     */
    public $employees;

    /**
     * nonprofit Status indicates the legal status of a non-profit organization in
     * its primary place of business.
     *
     * @var NonprofitType
     */
    public $nonprofitStatus;

    /**
     * A slogan or motto associated with the item.
     *
     * @var string|Text
     */
    public $slogan;

    /**
     * Statement about ethics policy, e.g. of a [[NewsMediaOrganization]]
     * regarding journalistic and publishing practices, or of a [[Restaurant]], a
     * page describing food source policies. In the case of a
     * [[NewsMediaOrganization]], an ethicsPolicy is typically a statement
     * describing the personal, organizational, and corporate standards of
     * behavior expected by the organization.
     *
     * @var URL|CreativeWork
     */
    public $ethicsPolicy;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var Organization|Brand
     */
    public $brand;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var Organization|Person
     */
    public $sponsor;

    /**
     * An associated logo.
     *
     * @var URL|ImageObject
     */
    public $logo;

    /**
     * For a [[NewsMediaOrganization]] or other news-related [[Organization]], a
     * statement about public engagement activities (for news media, the
     * newsroom’s), including involving the public - digitally or otherwise --
     * in coverage decisions, reporting and activities after publication.
     *
     * @var URL|CreativeWork
     */
    public $actionableFeedbackPolicy;

    /**
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     *
     * @var string|Text
     */
    public $naics;

    /**
     * A contact point for a person or organization.
     *
     * @var ContactPoint
     */
    public $contactPoint;

    /**
     * The geographic area where the service is provided.
     *
     * @var GeoShape|AdministrativeArea|Place
     */
    public $serviceArea;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var string|Text
     */
    public $isicV4;

    /**
     * Specifies a MerchantReturnPolicy that may be applicable.
     *
     * @var MerchantReturnPolicy
     */
    public $hasMerchantReturnPolicy;

    /**
     * Points-of-Sales operated by the organization or person.
     *
     * @var Place
     */
    public $hasPOS;

    /**
     * A person who founded this organization.
     *
     * @var Person
     */
    public $founder;

    /**
     * For an [[Organization]] (typically a [[NewsMediaOrganization]]), a
     * statement about policy on use of unnamed sources and the decision process
     * required.
     *
     * @var CreativeWork|URL
     */
    public $unnamedSourcesPolicy;

    /**
     * The place where the Organization was founded.
     *
     * @var Place
     */
    public $foundingLocation;

    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     *
     * @var string|Text
     */
    public $duns;

    /**
     * The larger organization that this organization is a [[subOrganization]] of,
     * if any.
     *
     * @var Organization
     */
    public $parentOrganization;

    /**
     * Alumni of an organization.
     *
     * @var Person
     */
    public $alumni;

    /**
     * An organization identifier that uniquely identifies a legal entity as
     * defined in ISO 17442.
     *
     * @var string|Text
     */
    public $leiCode;

    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|AdministrativeArea|GeoShape|Text|Place
     */
    public $areaServed;

    /**
     * The date that this organization was founded.
     *
     * @var Date
     */
    public $foundingDate;

    /**
     * Of a [[Person]], and less typically of an [[Organization]], to indicate a
     * known language. We do not distinguish skill levels or
     * reading/writing/speaking/signing here. Use language codes from the [IETF
     * BCP 47 standard](http://tools.ietf.org/html/bcp47).
     *
     * @var string|Language|Text
     */
    public $knowsLanguage;

    /**
     * Review of the item.
     *
     * @var Review
     */
    public $reviews;

    /**
     * A pointer to products or services sought by the organization or person
     * (demand).
     *
     * @var Demand
     */
    public $seeks;

    /**
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US
     * or the CIF/NIF in Spain.
     *
     * @var string|Text
     */
    public $taxID;

    /**
     * Products owned by the organization or person.
     *
     * @var Product|OwnershipInfo
     */
    public $owns;

    /**
     * Indicates an OfferCatalog listing for this Organization, Person, or
     * Service.
     *
     * @var OfferCatalog
     */
    public $hasOfferCatalog;

    /**
     * A member of this organization.
     *
     * @var Person|Organization
     */
    public $members;

    /**
     * Upcoming or past events associated with this place or organization.
     *
     * @var Event
     */
    public $events;

    /**
     * An organization identifier as defined in ISO 6523(-1). Note that many
     * existing organization identifiers such as
     * [leiCode](https://schema.org/leiCode), [duns](https://schema.org/duns) and
     * [vatID](https://schema.org/vatID) can be expressed as an ISO 6523
     * identifier by setting the ICD part of the ISO 6523 identifier accordingly. 
     *
     * @var string|Text
     */
    public $iso6523Code;

    /**
     * A relationship between an organization and a department of that
     * organization, also described as an organization (allowing different urls,
     * logos, opening hours). For example: a store with a pharmacy, or a bakery
     * with a cafe.
     *
     * @var Organization
     */
    public $department;

    /**
     * The fax number.
     *
     * @var string|Text
     */
    public $faxNumber;

    /**
     * Upcoming or past event associated with this place, organization, or action.
     *
     * @var Event
     */
    public $event;

}
