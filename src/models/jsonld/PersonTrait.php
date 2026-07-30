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
 * Trait for Person.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Person
 */
trait PersonTrait
{
    /**
     * An additional name for a Person, can be used for a middle name.
     *
     * @var string|array|Text|Text[]
     */
    public $additionalName;

    /**
     * Physical address of the item.
     *
     * @var string|array|PostalAddress|PostalAddress[]|array|Text|Text[]
     */
    public $address;

    /**
     * An organization that this person is affiliated with. For example, a
     * school/university, a club, or a team.
     *
     * @var array|Organization|Organization[]
     */
    public $affiliation;

    /**
     * The number of completed interactions for this entity, in a particular role
     * (the 'agent'), in a particular action (indicated in the statistic), and in
     * a particular context (i.e. interactionService).
     *
     * @var array|InteractionCounter|InteractionCounter[]
     */
    public $agentInteractionStatistic;

    /**
     * An organization that the person is an alumni of.
     *
     * @var array|EducationalOrganization|EducationalOrganization[]|array|Organization|Organization[]
     */
    public $alumniOf;

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
     * Date of birth.
     *
     * @var array|Date|Date[]
     */
    public $birthDate;

    /**
     * The place where the person was born.
     *
     * @var array|Place|Place[]
     */
    public $birthPlace;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var array|Brand|Brand[]|array|Organization|Organization[]
     */
    public $brand;

    /**
     * A [callsign](https://en.wikipedia.org/wiki/Call_sign), as used in
     * broadcasting and radio communications to identify people, radio and TV
     * stations, or vehicles.
     *
     * @var string|array|Text|Text[]
     */
    public $callSign;

    /**
     * A child of the person.
     *
     * @var array|Person|Person[]
     */
    public $children;

    /**
     * A colleague of the person.
     *
     * @var array|Person|Person[]|array|URL|URL[]
     */
    public $colleague;

    /**
     * A colleague of the person.
     *
     * @var array|Person|Person[]
     */
    public $colleagues;

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
     * Date of death.
     *
     * @var array|Date|Date[]
     */
    public $deathDate;

    /**
     * The place where the person died.
     *
     * @var array|Place|Place[]
     */
    public $deathPlace;

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
     * Family name. In the U.S., the last name of a Person.
     *
     * @var string|array|Text|Text[]
     */
    public $familyName;

    /**
     * The fax number.
     *
     * @var string|array|Text|Text[]
     */
    public $faxNumber;

    /**
     * The most generic uni-directional social relation.
     *
     * @var array|Person|Person[]
     */
    public $follows;

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
     * Gender of something, typically a [[Person]], but possibly also fictional
     * characters, animals, etc. While https://schema.org/Male and
     * https://schema.org/Female may be used, text strings are also acceptable for
     * people who are not a binary gender. The [[gender]] property can also be
     * used in an extended sense to cover e.g. the gender of sports teams. As with
     * the gender of individuals, we do not try to enumerate all possibilities. A
     * mixed-gender [[SportsTeam]] can be indicated with a text value of "Mixed".
     *
     * @var string|array|GenderType|GenderType[]|array|Text|Text[]
     */
    public $gender;

    /**
     * Given name. In the U.S., the first name of a Person.
     *
     * @var string|array|Text|Text[]
     */
    public $givenName;

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
     * The Person's occupation. For past professions, use Role for expressing
     * dates.
     *
     * @var array|Occupation|Occupation[]
     */
    public $hasOccupation;

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
     * The height of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $height;

    /**
     * A contact location for a person's residence.
     *
     * @var array|ContactPoint|ContactPoint[]|array|Place|Place[]
     */
    public $homeLocation;

    /**
     * An honorific prefix preceding a Person's name such as Dr/Mrs/Mr.
     *
     * @var string|array|Text|Text[]
     */
    public $honorificPrefix;

    /**
     * An honorific suffix following a Person's name such as M.D./PhD/MSCSW.
     *
     * @var string|array|Text|Text[]
     */
    public $honorificSuffix;

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
     * The job title of the person (for example, Financial Manager).
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $jobTitle;

    /**
     * The most generic bi-directional social/work relation.
     *
     * @var array|Person|Person[]
     */
    public $knows;

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
     * A life event like baptism, communions, Bar Mitzvahs, Aqiqah, Namakarana,
     * Miyamairi, burial, ....
     *
     * @var array|Event|Event[]
     */
    public $lifeEvent;

    /**
     * A pointer to products or services offered by the organization or person.
     *
     * @var array|Offer|Offer[]
     */
    public $makesOffer;

    /**
     * An Organization (or ProgramMembership) to which this Person or Organization
     * belongs.
     *
     * @var array|MemberProgramTier|MemberProgramTier[]|array|Organization|Organization[]|array|ProgramMembership|ProgramMembership[]
     */
    public $memberOf;

    /**
     * The North American Industry Classification System (NAICS) code for a
     * particular organization or business person.
     *
     * @var string|array|Text|Text[]
     */
    public $naics;

    /**
     * Nationality of the person.
     *
     * @var array|Country|Country[]
     */
    public $nationality;

    /**
     * The total financial value of the person as calculated by subtracting the
     * total value of liabilities from the total value of assets.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]|array|PriceSpecification|PriceSpecification[]
     */
    public $netWorth;

    /**
     * Things owned by the organization or person.
     *
     * @var array|Thing|Thing[]
     */
    public $owns;

    /**
     * A parent of this person.
     *
     * @var array|Person|Person[]
     */
    public $parent;

    /**
     * A parents of the person.
     *
     * @var array|Person|Person[]
     */
    public $parents;

    /**
     * Event that this person is a performer or participant in.
     *
     * @var array|Event|Event[]
     */
    public $performerIn;

    /**
     * A short string listing or describing pronouns for a person. Typically the
     * person concerned is the best authority as pronouns are a critical part of
     * personal identity and expression. Publishers and consumers of this
     * information are reminded to treat this data responsibly, take
     * country-specific laws related to gender expression into account, and be
     * wary of out-of-date data and drawing unwarranted inferences about the
     * person being described.  In English, formulations such as "they/them",
     * "she/her", and "he/him" are commonly used online and can also be used here.
     * We do not intend to enumerate all possible micro-syntaxes in all languages.
     * More structured and well-defined external values for pronouns can be
     * referenced using the [[StructuredValue]] or [[DefinedTerm]] values.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|StructuredValue|StructuredValue[]|array|Text|Text[]
     */
    public $pronouns;

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
     * The most generic familial relation.
     *
     * @var array|Person|Person[]
     */
    public $relatedTo;

    /**
     * A pointer to products or services sought by the organization or person
     * (demand).
     *
     * @var array|Demand|Demand[]
     */
    public $seeks;

    /**
     * A sibling of the person.
     *
     * @var array|Person|Person[]
     */
    public $sibling;

    /**
     * A sibling of the person.
     *
     * @var array|Person|Person[]
     */
    public $siblings;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is either claimed by a person, an organization
     * or desired or required to fulfill a role or to work in an occupation.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $skills;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. E.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $sponsor;

    /**
     * The person's spouse.
     *
     * @var array|Person|Person[]
     */
    public $spouse;

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
     * The value-added Tax ID of the organization or person with national prefix
     * (for example IT123456789). Can also be described as [[iso6523Code]] with
     * proper prefix.
     *
     * @var string|array|Text|Text[]
     */
    public $vatID;

    /**
     * The weight of the product or person.
     *
     * @var array|Mass|Mass[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $weight;

    /**
     * A contact location for a person's place of work.
     *
     * @var array|ContactPoint|ContactPoint[]|array|Place|Place[]
     */
    public $workLocation;

    /**
     * Organizations that the person works for.
     *
     * @var array|Organization|Organization[]
     */
    public $worksFor;
}
