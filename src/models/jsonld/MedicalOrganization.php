<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Organization;

/**
 * MedicalOrganization - A medical organization (physical or not), such as
 * hospital, institution or clinic.
 *
 * Extends: Organization
 * @see    http://schema.org/MedicalOrganization
 */
class MedicalOrganization extends Organization
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MedicalOrganization';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MedicalOrganization';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A medical organization (physical or not), such as hospital, institution or clinic.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Organization';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

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
     * Products owned by the organization or person.
     *
     * @var mixed|OwnershipInfo|Product [schema.org types: OwnershipInfo, Product]
     */
    public $owns;

    /**
     * The larger organization that this local business is a branch of, if any.
     * Supersedes branchOf. Inverse property: subOrganization.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $parentOrganization;

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
     * The Value-added Tax ID of the organization or person.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $vatID;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'address',
            'aggregateRating',
            'alumni',
            'areaServed',
            'award',
            'brand',
            'contactPoint',
            'department',
            'dissolutionDate',
            'duns',
            'email',
            'employee',
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
            'legalName',
            'leiCode',
            'location',
            'logo',
            'makesOffer',
            'member',
            'memberOf',
            'naics',
            'numberOfEmployees',
            'owns',
            'parentOrganization',
            'review',
            'seeks',
            'sponsor',
            'subOrganization',
            'taxID',
            'telephone',
            'vatID',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'address' => ['PostalAddress','Text'],
            'aggregateRating' => ['AggregateRating'],
            'alumni' => ['Person'],
            'areaServed' => ['AdministrativeArea','GeoShape','Place','Text'],
            'award' => ['Text'],
            'brand' => ['Brand','Organization'],
            'contactPoint' => ['ContactPoint'],
            'department' => ['Organization'],
            'dissolutionDate' => ['Date'],
            'duns' => ['Text'],
            'email' => ['Text'],
            'employee' => ['Person'],
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
            'legalName' => ['Text'],
            'leiCode' => ['Text'],
            'location' => ['Place','PostalAddress','Text'],
            'logo' => ['ImageObject','URL'],
            'makesOffer' => ['Offer'],
            'member' => ['Organization','Person'],
            'memberOf' => ['Organization','ProgramMembership'],
            'naics' => ['Text'],
            'numberOfEmployees' => ['QuantitativeValue'],
            'owns' => ['OwnershipInfo','Product'],
            'parentOrganization' => ['Organization'],
            'review' => ['Review'],
            'seeks' => ['Demand'],
            'sponsor' => ['Organization','Person'],
            'subOrganization' => ['Organization'],
            'taxID' => ['Text'],
            'telephone' => ['Text'],
            'vatID' => ['Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'address' => 'Physical address of the item.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alumni' => 'Alumni of an organization. Inverse property: alumniOf.',
            'areaServed' => 'The geographic area where a service or offered item is provided. Supersedes serviceArea.',
            'award' => 'An award won by or for this item. Supersedes awards.',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'contactPoint' => 'A contact point for a person or organization. Supersedes contactPoints.',
            'department' => 'A relationship between an organization and a department of that organization, also described as an organization (allowing different urls, logos, opening hours). For example: a store with a pharmacy, or a bakery with a cafe.',
            'dissolutionDate' => 'The date that this organization was dissolved.',
            'duns' => 'The Dun & Bradstreet DUNS number for identifying an organization or business person.',
            'email' => 'Email address.',
            'employee' => 'Someone working for this organization. Supersedes employees.',
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
            'legalName' => 'The official name of the organization, e.g. the registered company name.',
            'leiCode' => 'An organization identifier that uniquely identifies a legal entity as defined in ISO 17442.',
            'location' => 'The location of for example where the event is happening, an organization is located, or where an action takes place.',
            'logo' => 'An associated logo.',
            'makesOffer' => 'A pointer to products or services offered by the organization or person. Inverse property: offeredBy.',
            'member' => 'A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals. Supersedes members, musicGroupMember. Inverse property: memberOf.',
            'memberOf' => 'An Organization (or ProgramMembership) to which this Person or Organization belongs. Inverse property: member.',
            'naics' => 'The North American Industry Classification System (NAICS) code for a particular organization or business person.',
            'numberOfEmployees' => 'The number of employees in an organization e.g. business.',
            'owns' => 'Products owned by the organization or person.',
            'parentOrganization' => 'The larger organization that this local business is a branch of, if any. Supersedes branchOf. Inverse property: subOrganization.',
            'review' => 'A review of the item. Supersedes reviews.',
            'seeks' => 'A pointer to products or services sought by the organization or person (demand).',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'subOrganization' => 'A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific \'department\' property. Inverse property: parentOrganization.',
            'taxID' => 'The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.',
            'telephone' => 'The telephone number.',
            'vatID' => 'The Value-added Tax ID of the organization or person.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['address','aggregateRating','alumni','areaServed','award','brand','contactPoint','department','dissolutionDate','duns','email','employee','event','faxNumber','founder','foundingDate','foundingLocation','funder','globalLocationNumber','hasOfferCatalog','hasPOS','isicV4','legalName','leiCode','location','logo','makesOffer','member','memberOf','naics','numberOfEmployees','owns','parentOrganization','review','seeks','sponsor','subOrganization','taxID','telephone','vatID',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
