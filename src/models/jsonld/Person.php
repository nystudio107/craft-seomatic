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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v26.0-release
 * Person - A person (alive, dead, undead, or fictional).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Person
 */
class Person extends MetaJsonLd implements PersonInterface, ThingInterface
{
    use PersonTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'Person';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/Person';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Thing';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'A person (alive, dead, undead, or fictional).';


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
            'additionalName' => ['array', 'Text', 'Text[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'address' => ['array', 'Text', 'Text[]', 'array', 'PostalAddress', 'PostalAddress[]'],
            'affiliation' => ['array', 'Organization', 'Organization[]'],
            'agentInteractionStatistic' => ['array', 'InteractionCounter', 'InteractionCounter[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'alumniOf' => ['array', 'Organization', 'Organization[]', 'array', 'EducationalOrganization', 'EducationalOrganization[]'],
            'award' => ['array', 'Text', 'Text[]'],
            'awards' => ['array', 'Text', 'Text[]'],
            'birthDate' => ['array', 'Date', 'Date[]'],
            'birthPlace' => ['array', 'Place', 'Place[]'],
            'brand' => ['array', 'Organization', 'Organization[]', 'array', 'Brand', 'Brand[]'],
            'callSign' => ['array', 'Text', 'Text[]'],
            'children' => ['array', 'Person', 'Person[]'],
            'colleague' => ['array', 'URL', 'URL[]', 'array', 'Person', 'Person[]'],
            'colleagues' => ['array', 'Person', 'Person[]'],
            'contactPoint' => ['array', 'ContactPoint', 'ContactPoint[]'],
            'contactPoints' => ['array', 'ContactPoint', 'ContactPoint[]'],
            'deathDate' => ['array', 'Date', 'Date[]'],
            'deathPlace' => ['array', 'Place', 'Place[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'duns' => ['array', 'Text', 'Text[]'],
            'email' => ['array', 'Text', 'Text[]'],
            'familyName' => ['array', 'Text', 'Text[]'],
            'faxNumber' => ['array', 'Text', 'Text[]'],
            'follows' => ['array', 'Person', 'Person[]'],
            'funder' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'funding' => ['array', 'Grant', 'Grant[]'],
            'gender' => ['array', 'GenderType', 'GenderType[]', 'array', 'Text', 'Text[]'],
            'givenName' => ['array', 'Text', 'Text[]'],
            'globalLocationNumber' => ['array', 'Text', 'Text[]'],
            'hasCertification' => ['array', 'Certification', 'Certification[]'],
            'hasCredential' => ['array', 'EducationalOccupationalCredential', 'EducationalOccupationalCredential[]'],
            'hasOccupation' => ['array', 'Occupation', 'Occupation[]'],
            'hasOfferCatalog' => ['array', 'OfferCatalog', 'OfferCatalog[]'],
            'hasPOS' => ['array', 'Place', 'Place[]'],
            'height' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
            'homeLocation' => ['array', 'ContactPoint', 'ContactPoint[]', 'array', 'Place', 'Place[]'],
            'honorificPrefix' => ['array', 'Text', 'Text[]'],
            'honorificSuffix' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'interactionStatistic' => ['array', 'InteractionCounter', 'InteractionCounter[]'],
            'isicV4' => ['array', 'Text', 'Text[]'],
            'jobTitle' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Text', 'Text[]'],
            'knows' => ['array', 'Person', 'Person[]'],
            'knowsAbout' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'Thing', 'Thing[]'],
            'knowsLanguage' => ['array', 'Language', 'Language[]', 'array', 'Text', 'Text[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'makesOffer' => ['array', 'Offer', 'Offer[]'],
            'memberOf' => ['array', 'ProgramMembership', 'ProgramMembership[]', 'array', 'Organization', 'Organization[]'],
            'naics' => ['array', 'Text', 'Text[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'nationality' => ['array', 'Country', 'Country[]'],
            'netWorth' => ['array', 'PriceSpecification', 'PriceSpecification[]', 'array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'owns' => ['array', 'OwnershipInfo', 'OwnershipInfo[]', 'array', 'Product', 'Product[]'],
            'parent' => ['array', 'Person', 'Person[]'],
            'parents' => ['array', 'Person', 'Person[]'],
            'performerIn' => ['array', 'Event', 'Event[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'publishingPrinciples' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'relatedTo' => ['array', 'Person', 'Person[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'seeks' => ['array', 'Demand', 'Demand[]'],
            'sibling' => ['array', 'Person', 'Person[]'],
            'siblings' => ['array', 'Person', 'Person[]'],
            'sponsor' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'spouse' => ['array', 'Person', 'Person[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'taxID' => ['array', 'Text', 'Text[]'],
            'telephone' => ['array', 'Text', 'Text[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'vatID' => ['array', 'Text', 'Text[]'],
            'weight' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'workLocation' => ['array', 'Place', 'Place[]', 'array', 'ContactPoint', 'ContactPoint[]'],
            'worksFor' => ['array', 'Organization', 'Organization[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalName' => 'An additional name for a Person, can be used for a middle name.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'address' => 'Physical address of the item.',
            'affiliation' => 'An organization that this person is affiliated with. For example, a school/university, a club, or a team.',
            'agentInteractionStatistic' => 'The number of completed interactions for this entity, in a particular role (the \'agent\'), in a particular action (indicated in the statistic), and in a particular context (i.e. interactionService).',
            'alternateName' => 'An alias for the item.',
            'alumniOf' => 'An organization that the person is an alumni of.',
            'award' => 'An award won by or for this item.',
            'awards' => 'Awards won by or for this item.',
            'birthDate' => 'Date of birth.',
            'birthPlace' => 'The place where the person was born.',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'callSign' => 'A [callsign](https://en.wikipedia.org/wiki/Call_sign), as used in broadcasting and radio communications to identify people, radio and TV stations, or vehicles.',
            'children' => 'A child of the person.',
            'colleague' => 'A colleague of the person.',
            'colleagues' => 'A colleague of the person.',
            'contactPoint' => 'A contact point for a person or organization.',
            'contactPoints' => 'A contact point for a person or organization.',
            'deathDate' => 'Date of death.',
            'deathPlace' => 'The place where the person died.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'duns' => 'The Dun & Bradstreet DUNS number for identifying an organization or business person.',
            'email' => 'Email address.',
            'familyName' => 'Family name. In the U.S., the last name of a Person.',
            'faxNumber' => 'The fax number.',
            'follows' => 'The most generic uni-directional social relation.',
            'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'gender' => 'Gender of something, typically a [[Person]], but possibly also fictional characters, animals, etc. While https://schema.org/Male and https://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender. The [[gender]] property can also be used in an extended sense to cover e.g. the gender of sports teams. As with the gender of individuals, we do not try to enumerate all possibilities. A mixed-gender [[SportsTeam]] can be indicated with a text value of "Mixed".',
            'givenName' => 'Given name. In the U.S., the first name of a Person.',
            'globalLocationNumber' => 'The [Global Location Number](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.',
            'hasCertification' => 'Certification information about a product, organization, service, place, or person.',
            'hasCredential' => 'A credential awarded to the Person or Organization.',
            'hasOccupation' => 'The Person\'s occupation. For past professions, use Role for expressing dates.',
            'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
            'hasPOS' => 'Points-of-Sales operated by the organization or person.',
            'height' => 'The height of the item.',
            'homeLocation' => 'A contact location for a person\'s residence.',
            'honorificPrefix' => 'An honorific prefix preceding a Person\'s name such as Dr/Mrs/Mr.',
            'honorificSuffix' => 'An honorific suffix following a Person\'s name such as M.D./PhD/MSCSW.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used.',
            'isicV4' => 'The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.',
            'jobTitle' => 'The job title of the person (for example, Financial Manager).',
            'knows' => 'The most generic bi-directional social/work relation.',
            'knowsAbout' => 'Of a [[Person]], and less typically of an [[Organization]], to indicate a topic that is known about - suggesting possible expertise but not implying it. We do not distinguish skill levels here, or relate this to educational content, events, objectives or [[JobPosting]] descriptions.',
            'knowsLanguage' => 'Of a [[Person]], and less typically of an [[Organization]], to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47).',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'makesOffer' => 'A pointer to products or services offered by the organization or person.',
            'memberOf' => 'An Organization (or ProgramMembership) to which this Person or Organization belongs.',
            'naics' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.',
            'name' => 'The name of the item.',
            'nationality' => 'Nationality of the person.',
            'netWorth' => 'The total financial value of the person as calculated by subtracting assets from liabilities.',
            'owns' => 'Products owned by the organization or person.',
            'parent' => 'A parent of this person.',
            'parents' => 'A parents of the person.',
            'performerIn' => 'Event that this person is a performer or participant in.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via [[URL]]) a document describing the editorial principles of an [[Organization]] (or individual, e.g. a [[Person]] writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of the party primarily responsible for the creation of the [[CreativeWork]].  While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a [[funder]]) can be expressed using schema.org terminology. ',
            'relatedTo' => 'The most generic familial relation.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seeks' => 'A pointer to products or services sought by the organization or person (demand).',
            'sibling' => 'A sibling of the person.',
            'siblings' => 'A sibling of the person.',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. E.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'spouse' => 'The person\'s spouse.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'taxID' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.',
            'telephone' => 'The telephone number.',
            'url' => 'URL of the item.',
            'vatID' => 'The Value-added Tax ID of the organization or person.',
            'weight' => 'The weight of the product or person.',
            'workLocation' => 'A contact location for a person\'s place of work.',
            'worksFor' => 'Organizations that the person works for.',
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
