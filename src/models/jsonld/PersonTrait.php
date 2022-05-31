<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for Person.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Person
 */

trait PersonTrait
{
    
    /**
     * The person's spouse.
     *
     * @var Person
     */
    public $spouse;

    /**
     * An additional name for a Person, can be used for a middle name.
     *
     * @var string|Text
     */
    public $additionalName;

    /**
     * A credential awarded to the Person or Organization.
     *
     * @var EducationalOccupationalCredential
     */
    public $hasCredential;

    /**
     * The telephone number.
     *
     * @var string|Text
     */
    public $telephone;

    /**
     * An honorific prefix preceding a Person's name such as Dr/Mrs/Mr.
     *
     * @var string|Text
     */
    public $honorificPrefix;

    /**
     * A parents of the person.
     *
     * @var Person
     */
    public $parents;

    /**
     * Family name. In the U.S., the last name of a Person.
     *
     * @var string|Text
     */
    public $familyName;

    /**
     * Given name. In the U.S., the first name of a Person.
     *
     * @var string|Text
     */
    public $givenName;

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
     * Event that this person is a performer or participant in.
     *
     * @var Event
     */
    public $performerIn;

    /**
     * The total financial value of the person as calculated by subtracting assets
     * from liabilities.
     *
     * @var MonetaryAmount|PriceSpecification
     */
    public $netWorth;

    /**
     * An award won by or for this item.
     *
     * @var string|Text
     */
    public $award;

    /**
     * A contact location for a person's place of work.
     *
     * @var Place|ContactPoint
     */
    public $workLocation;

    /**
     * An honorific suffix following a Person's name such as M.D. /PhD/MSCSW.
     *
     * @var string|Text
     */
    public $honorificSuffix;

    /**
     * The place where the person died.
     *
     * @var Place
     */
    public $deathPlace;

    /**
     * A contact location for a person's residence.
     *
     * @var Place|ContactPoint
     */
    public $homeLocation;

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
     * The height of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $height;

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
     * A contact point for a person or organization.
     *
     * @var ContactPoint
     */
    public $contactPoints;

    /**
     * The Person's occupation. For past professions, use Role for expressing
     * dates.
     *
     * @var Occupation
     */
    public $hasOccupation;

    /**
     * Gender of something, typically a [[Person]], but possibly also fictional
     * characters, animals, etc. While https://schema.org/Male and
     * https://schema.org/Female may be used, text strings are also acceptable for
     * people who do not identify as a binary gender. The [[gender]] property can
     * also be used in an extended sense to cover e.g. the gender of sports teams.
     * As with the gender of individuals, we do not try to enumerate all
     * possibilities. A mixed-gender [[SportsTeam]] can be indicated with a text
     * value of "Mixed".
     *
     * @var string|GenderType|Text
     */
    public $gender;

    /**
     * A parent of this person.
     *
     * @var Person
     */
    public $parent;

    /**
     * Awards won by or for this item.
     *
     * @var string|Text
     */
    public $awards;

    /**
     * A sibling of the person.
     *
     * @var Person
     */
    public $sibling;

    /**
     * The job title of the person (for example, Financial Manager).
     *
     * @var string|Text|DefinedTerm
     */
    public $jobTitle;

    /**
     * Date of birth.
     *
     * @var Date
     */
    public $birthDate;

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
     * A child of the person.
     *
     * @var Person
     */
    public $children;

    /**
     * Organizations that the person works for.
     *
     * @var Organization
     */
    public $worksFor;

    /**
     * The most generic bi-directional social/work relation.
     *
     * @var Person
     */
    public $knows;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used.
     *
     * @var InteractionCounter
     */
    public $interactionStatistic;

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
     * A colleague of the person.
     *
     * @var Person
     */
    public $colleagues;

    /**
     * Date of death.
     *
     * @var Date
     */
    public $deathDate;

    /**
     * Email address.
     *
     * @var string|Text
     */
    public $email;

    /**
     * An organization that this person is affiliated with. For example, a
     * school/university, a club, or a team.
     *
     * @var Organization
     */
    public $affiliation;

    /**
     * A sibling of the person.
     *
     * @var Person
     */
    public $siblings;

    /**
     * The place where the person was born.
     *
     * @var Place
     */
    public $birthPlace;

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
     * A [callsign](https://en.wikipedia.org/wiki/Call_sign), as used in
     * broadcasting and radio communications to identify people, radio and TV
     * stations, or vehicles.
     *
     * @var string|Text
     */
    public $callSign;

    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var string|Text
     */
    public $isicV4;

    /**
     * Points-of-Sales operated by the organization or person.
     *
     * @var Place
     */
    public $hasPOS;

    /**
     * An organization that the person is an alumni of.
     *
     * @var EducationalOrganization|Organization
     */
    public $alumniOf;

    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     *
     * @var string|Text
     */
    public $duns;

    /**
     * The weight of the product or person.
     *
     * @var QuantitativeValue
     */
    public $weight;

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
     * The most generic familial relation.
     *
     * @var Person
     */
    public $relatedTo;

    /**
     * A colleague of the person.
     *
     * @var Person|URL
     */
    public $colleague;

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
     * The most generic uni-directional social relation.
     *
     * @var Person
     */
    public $follows;

    /**
     * Nationality of the person.
     *
     * @var Country
     */
    public $nationality;

    /**
     * The fax number.
     *
     * @var string|Text
     */
    public $faxNumber;

}
