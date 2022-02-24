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

use nystudio107\seomatic\models\jsonld\Thing;

/**
 * Person - A person (alive, dead, undead, or fictional).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Person
 */
class Person extends Thing
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Person';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Person';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A person (alive, dead, undead, or fictional).';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Thing';

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
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'additionalName',
        'address',
        'affiliation',
        'alumniOf',
        'award',
        'birthDate',
        'birthPlace',
        'brand',
        'callSign',
        'children',
        'colleague',
        'contactPoint',
        'deathDate',
        'deathPlace',
        'duns',
        'email',
        'familyName',
        'faxNumber',
        'follows',
        'funder',
        'gender',
        'givenName',
        'globalLocationNumber',
        'hasCredential',
        'hasOccupation',
        'hasOfferCatalog',
        'hasPOS',
        'height',
        'homeLocation',
        'honorificPrefix',
        'honorificSuffix',
        'interactionStatistic',
        'isicV4',
        'jobTitle',
        'knows',
        'knowsAbout',
        'knowsLanguage',
        'makesOffer',
        'memberOf',
        'naics',
        'nationality',
        'netWorth',
        'owns',
        'parent',
        'performerIn',
        'publishingPrinciples',
        'relatedTo',
        'seeks',
        'sibling',
        'sponsor',
        'spouse',
        'taxID',
        'telephone',
        'vatID',
        'weight',
        'workLocation',
        'worksFor'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'additionalName' => ['Text'],
        'address' => ['PostalAddress', 'Text'],
        'affiliation' => ['Organization'],
        'alumniOf' => ['EducationalOrganization', 'Organization'],
        'award' => ['Text'],
        'birthDate' => ['Date'],
        'birthPlace' => ['Place'],
        'brand' => ['Brand', 'Organization'],
        'callSign' => ['Text'],
        'children' => ['Person'],
        'colleague' => ['Person', 'URL'],
        'contactPoint' => ['ContactPoint'],
        'deathDate' => ['Date'],
        'deathPlace' => ['Place'],
        'duns' => ['Text'],
        'email' => ['Text'],
        'familyName' => ['Text'],
        'faxNumber' => ['Text'],
        'follows' => ['Person'],
        'funder' => ['Organization', 'Person'],
        'gender' => ['GenderType', 'Text'],
        'givenName' => ['Text'],
        'globalLocationNumber' => ['Text'],
        'hasCredential' => ['EducationalOccupationalCredential'],
        'hasOccupation' => ['Occupation'],
        'hasOfferCatalog' => ['OfferCatalog'],
        'hasPOS' => ['Place'],
        'height' => ['Distance', 'QuantitativeValue'],
        'homeLocation' => ['ContactPoint', 'Place'],
        'honorificPrefix' => ['Text'],
        'honorificSuffix' => ['Text'],
        'interactionStatistic' => ['InteractionCounter'],
        'isicV4' => ['Text'],
        'jobTitle' => ['DefinedTerm', 'Text'],
        'knows' => ['Person'],
        'knowsAbout' => ['Text', 'Thing', 'URL'],
        'knowsLanguage' => ['Language', 'Text'],
        'makesOffer' => ['Offer'],
        'memberOf' => ['Organization', 'ProgramMembership'],
        'naics' => ['Text'],
        'nationality' => ['Country'],
        'netWorth' => ['MonetaryAmount', 'PriceSpecification'],
        'owns' => ['OwnershipInfo', 'Product'],
        'parent' => ['Person'],
        'performerIn' => ['Event'],
        'publishingPrinciples' => ['CreativeWork', 'URL'],
        'relatedTo' => ['Person'],
        'seeks' => ['Demand'],
        'sibling' => ['Person'],
        'sponsor' => ['Organization', 'Person'],
        'spouse' => ['Person'],
        'taxID' => ['Text'],
        'telephone' => ['Text'],
        'vatID' => ['Text'],
        'weight' => ['QuantitativeValue'],
        'workLocation' => ['ContactPoint', 'Place'],
        'worksFor' => ['Organization']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'additionalName' => 'An additional name for a Person, can be used for a middle name.',
        'address' => 'Physical address of the item.',
        'affiliation' => 'An organization that this person is affiliated with. For example, a school/university, a club, or a team.',
        'alumniOf' => 'An organization that the person is an alumni of. Inverse property: alumni.',
        'award' => 'An award won by or for this item. Supersedes awards.',
        'birthDate' => 'Date of birth.',
        'birthPlace' => 'The place where the person was born.',
        'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
        'callSign' => 'A callsign, as used in broadcasting and radio communications to identify people, radio and TV stations, or vehicles.',
        'children' => 'A child of the person.',
        'colleague' => 'A colleague of the person. Supersedes colleagues.',
        'contactPoint' => 'A contact point for a person or organization. Supersedes contactPoints.',
        'deathDate' => 'Date of death.',
        'deathPlace' => 'The place where the person died.',
        'duns' => 'The Dun & Bradstreet DUNS number for identifying an organization or business person.',
        'email' => 'Email address.',
        'familyName' => 'Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property.',
        'faxNumber' => 'The fax number.',
        'follows' => 'The most generic uni-directional social relation.',
        'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
        'gender' => 'Gender of something, typically a Person, but possibly also fictional characters, animals, etc. While http://schema.org/Male and http://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender. The gender property can also be used in an extended sense to cover e.g. the gender of sports teams. As with the gender of individuals, we do not try to enumerate all possibilities. A mixed-gender SportsTeam can be indicated with a text value of "Mixed".',
        'givenName' => 'Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.',
        'globalLocationNumber' => 'The Global Location Number (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
        'hasCredential' => 'A credential awarded to the Person or Organization.',
        'hasOccupation' => 'The Person\'s occupation. For past professions, use Role for expressing dates.',
        'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
        'hasPOS' => 'Points-of-Sales operated by the organization or person.',
        'height' => 'The height of the item.',
        'homeLocation' => 'A contact location for a person\'s residence.',
        'honorificPrefix' => 'An honorific prefix preceding a Person\'s name such as Dr/Mrs/Mr.',
        'honorificSuffix' => 'An honorific suffix preceding a Person\'s name such as M.D. /PhD/MSCSW.',
        'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used. Supersedes interactionCount.',
        'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
        'jobTitle' => 'The job title of the person (for example, Financial Manager).',
        'knows' => 'The most generic bi-directional social/work relation.',
        'knowsAbout' => 'Of a Person, and less typically of an Organization, to indicate a topic that is known about - suggesting possible expertise but not implying it. We do not distinguish skill levels here, or relate this to educational content, events, objectives or JobPosting descriptions.',
        'knowsLanguage' => 'Of a Person, and less typically of an Organization, to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the IETF BCP 47 standard.',
        'makesOffer' => 'A pointer to products or services offered by the organization or person. Inverse property: offeredBy.',
        'memberOf' => 'An Organization (or ProgramMembership) to which this Person or Organization belongs. Inverse property: member.',
        'naics' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.',
        'nationality' => 'Nationality of the person.',
        'netWorth' => 'The total financial value of the person as calculated by subtracting assets from liabilities.',
        'owns' => 'Products owned by the organization or person.',
        'parent' => 'A parent of this person. Supersedes parents.',
        'performerIn' => 'Event that this person is a performer or participant in.',
        'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via URL) a document describing the editorial principles of an Organization (or individual e.g. a Person writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a CreativeWork (e.g. NewsArticle) the principles are those of the party primarily responsible for the creation of the CreativeWork. While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a funder) can be expressed using schema.org terminology.',
        'relatedTo' => 'The most generic familial relation.',
        'seeks' => 'A pointer to products or services sought by the organization or person (demand).',
        'sibling' => 'A sibling of the person. Supersedes siblings.',
        'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
        'spouse' => 'The person\'s spouse.',
        'taxID' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.',
        'telephone' => 'The telephone number.',
        'vatID' => 'The Value-added Tax ID of the organization or person.',
        'weight' => 'The weight of the product or person.',
        'workLocation' => 'A contact location for a person\'s place of work.',
        'worksFor' => 'Organizations that the person works for.'
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
    /**
     * An additional name for a Person, can be used for a middle name.
     *
     * @var string [schema.org types: Text]
     */
    public $additionalName;
    /**
     * Physical address of the item.
     *
     * @var mixed|PostalAddress|string [schema.org types: PostalAddress, Text]
     */
    public $address;
    /**
     * An organization that this person is affiliated with. For example, a
     * school/university, a club, or a team.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $affiliation;
    /**
     * An organization that the person is an alumni of. Inverse property: alumni.
     *
     * @var mixed|EducationalOrganization|Organization [schema.org types: EducationalOrganization, Organization]
     */
    public $alumniOf;
    /**
     * An award won by or for this item. Supersedes awards.
     *
     * @var string [schema.org types: Text]
     */
    public $award;
    /**
     * Date of birth.
     *
     * @var Date [schema.org types: Date]
     */
    public $birthDate;
    /**
     * The place where the person was born.
     *
     * @var Place [schema.org types: Place]
     */
    public $birthPlace;
    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var mixed|Brand|Organization [schema.org types: Brand, Organization]
     */
    public $brand;
    /**
     * A callsign, as used in broadcasting and radio communications to identify
     * people, radio and TV stations, or vehicles.
     *
     * @var string [schema.org types: Text]
     */
    public $callSign;
    /**
     * A child of the person.
     *
     * @var Person [schema.org types: Person]
     */
    public $children;
    /**
     * A colleague of the person. Supersedes colleagues.
     *
     * @var mixed|Person|string [schema.org types: Person, URL]
     */
    public $colleague;
    /**
     * A contact point for a person or organization. Supersedes contactPoints.
     *
     * @var ContactPoint [schema.org types: ContactPoint]
     */
    public $contactPoint;
    /**
     * Date of death.
     *
     * @var Date [schema.org types: Date]
     */
    public $deathDate;
    /**
     * The place where the person died.
     *
     * @var Place [schema.org types: Place]
     */
    public $deathPlace;
    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or
     * business person.
     *
     * @var string [schema.org types: Text]
     */
    public $duns;
    /**
     * Email address.
     *
     * @var string [schema.org types: Text]
     */
    public $email;
    /**
     * Family name. In the U.S., the last name of an Person. This can be used
     * along with givenName instead of the name property.
     *
     * @var string [schema.org types: Text]
     */
    public $familyName;
    /**
     * The fax number.
     *
     * @var string [schema.org types: Text]
     */
    public $faxNumber;
    /**
     * The most generic uni-directional social relation.
     *
     * @var Person [schema.org types: Person]
     */
    public $follows;
    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $funder;
    /**
     * Gender of something, typically a Person, but possibly also fictional
     * characters, animals, etc. While http://schema.org/Male and
     * http://schema.org/Female may be used, text strings are also acceptable for
     * people who do not identify as a binary gender. The gender property can also
     * be used in an extended sense to cover e.g. the gender of sports teams. As
     * with the gender of individuals, we do not try to enumerate all
     * possibilities. A mixed-gender SportsTeam can be indicated with a text value
     * of "Mixed".
     *
     * @var mixed|GenderType|string [schema.org types: GenderType, Text]
     */
    public $gender;
    /**
     * Given name. In the U.S., the first name of a Person. This can be used along
     * with familyName instead of the name property.
     *
     * @var string [schema.org types: Text]
     */
    public $givenName;
    /**
     * The Global Location Number (GLN, sometimes also referred to as
     * International Location Number or ILN) of the respective organization,
     * person, or place. The GLN is a 13-digit number used to identify parties and
     * physical locations.
     *
     * @var string [schema.org types: Text]
     */
    public $globalLocationNumber;
    /**
     * A credential awarded to the Person or Organization.
     *
     * @var EducationalOccupationalCredential [schema.org types: EducationalOccupationalCredential]
     */
    public $hasCredential;
    /**
     * The Person's occupation. For past professions, use Role for expressing
     * dates.
     *
     * @var Occupation [schema.org types: Occupation]
     */
    public $hasOccupation;
    /**
     * Indicates an OfferCatalog listing for this Organization, Person, or
     * Service.
     *
     * @var OfferCatalog [schema.org types: OfferCatalog]
     */
    public $hasOfferCatalog;
    /**
     * Points-of-Sales operated by the organization or person.
     *
     * @var Place [schema.org types: Place]
     */
    public $hasPOS;
    /**
     * The height of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $height;
    /**
     * A contact location for a person's residence.
     *
     * @var mixed|ContactPoint|Place [schema.org types: ContactPoint, Place]
     */
    public $homeLocation;
    /**
     * An honorific prefix preceding a Person's name such as Dr/Mrs/Mr.
     *
     * @var string [schema.org types: Text]
     */
    public $honorificPrefix;
    /**
     * An honorific suffix preceding a Person's name such as M.D. /PhD/MSCSW.
     *
     * @var string [schema.org types: Text]
     */
    public $honorificSuffix;
    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used. Supersedes interactionCount.
     *
     * @var InteractionCounter [schema.org types: InteractionCounter]
     */
    public $interactionStatistic;
    /**
     * The International Standard of Industrial Classification of All Economic
     * Activities (ISIC), Revision 4 code for a particular organization, business
     * person, or place.
     *
     * @var string [schema.org types: Text]
     */
    public $isicV4;
    /**
     * The job title of the person (for example, Financial Manager).
     *
     * @var mixed|DefinedTerm|string [schema.org types: DefinedTerm, Text]
     */
    public $jobTitle;
    /**
     * The most generic bi-directional social/work relation.
     *
     * @var Person [schema.org types: Person]
     */
    public $knows;
    /**
     * Of a Person, and less typically of an Organization, to indicate a topic
     * that is known about - suggesting possible expertise but not implying it. We
     * do not distinguish skill levels here, or relate this to educational
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
     * A pointer to products or services offered by the organization or person.
     * Inverse property: offeredBy.
     *
     * @var Offer [schema.org types: Offer]
     */
    public $makesOffer;
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
     * @var string [schema.org types: Text]
     */
    public $naics;
    /**
     * Nationality of the person.
     *
     * @var Country [schema.org types: Country]
     */
    public $nationality;
    /**
     * The total financial value of the person as calculated by subtracting assets
     * from liabilities.
     *
     * @var mixed|MonetaryAmount|PriceSpecification [schema.org types: MonetaryAmount, PriceSpecification]
     */
    public $netWorth;
    /**
     * Products owned by the organization or person.
     *
     * @var mixed|OwnershipInfo|Product [schema.org types: OwnershipInfo, Product]
     */
    public $owns;
    /**
     * A parent of this person. Supersedes parents.
     *
     * @var Person [schema.org types: Person]
     */
    public $parent;
    /**
     * Event that this person is a performer or participant in.
     *
     * @var Event [schema.org types: Event]
     */
    public $performerIn;
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
     * The most generic familial relation.
     *
     * @var Person [schema.org types: Person]
     */
    public $relatedTo;
    /**
     * A pointer to products or services sought by the organization or person
     * (demand).
     *
     * @var Demand [schema.org types: Demand]
     */
    public $seeks;
    /**
     * A sibling of the person. Supersedes siblings.
     *
     * @var Person [schema.org types: Person]
     */
    public $sibling;
    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $sponsor;
    /**
     * The person's spouse.
     *
     * @var Person [schema.org types: Person]
     */
    public $spouse;
    /**
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US
     * or the CIF/NIF in Spain.
     *
     * @var string [schema.org types: Text]
     */
    public $taxID;

    // Static Protected Properties
    // =========================================================================
    /**
     * The telephone number.
     *
     * @var string [schema.org types: Text]
     */
    public $telephone;
    /**
     * The Value-added Tax ID of the organization or person.
     *
     * @var string [schema.org types: Text]
     */
    public $vatID;
    /**
     * The weight of the product or person.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $weight;
    /**
     * A contact location for a person's place of work.
     *
     * @var mixed|ContactPoint|Place [schema.org types: ContactPoint, Place]
     */
    public $workLocation;
    /**
     * Organizations that the person works for.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $worksFor;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
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
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['additionalName', 'address', 'affiliation', 'alumniOf', 'award', 'birthDate', 'birthPlace', 'brand', 'callSign', 'children', 'colleague', 'contactPoint', 'deathDate', 'deathPlace', 'duns', 'email', 'familyName', 'faxNumber', 'follows', 'funder', 'gender', 'givenName', 'globalLocationNumber', 'hasCredential', 'hasOccupation', 'hasOfferCatalog', 'hasPOS', 'height', 'homeLocation', 'honorificPrefix', 'honorificSuffix', 'interactionStatistic', 'isicV4', 'jobTitle', 'knows', 'knowsAbout', 'knowsLanguage', 'makesOffer', 'memberOf', 'naics', 'nationality', 'netWorth', 'owns', 'parent', 'performerIn', 'publishingPrinciples', 'relatedTo', 'seeks', 'sibling', 'sponsor', 'spouse', 'taxID', 'telephone', 'vatID', 'weight', 'workLocation', 'worksFor'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
