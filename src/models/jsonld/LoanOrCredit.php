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
 * LoanOrCredit - A financial product for the loaning of an amount of money, or line of
 * credit, under agreed terms and charges.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LoanOrCredit
 */
class LoanOrCredit extends MetaJsonLd implements LoanOrCreditInterface, FinancialProductInterface, ServiceInterface, IntangibleInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'LoanOrCredit';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/LoanOrCredit';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
A financial product for the loaning of an amount of money, or line of credit, under agreed terms and charges.
SCHEMADESC;

    use LoanOrCreditTrait;
    use FinancialProductTrait;
    use ServiceTrait;
    use IntangibleTrait;
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
            'additionalType' => ['URL'],
            'aggregateRating' => ['AggregateRating'],
            'alternateName' => ['Text'],
            'amount' => ['Number', 'MonetaryAmount'],
            'annualPercentageRate' => ['Number', 'QuantitativeValue'],
            'areaServed' => ['AdministrativeArea', 'GeoShape', 'Text', 'Place'],
            'audience' => ['Audience'],
            'availableChannel' => ['ServiceChannel'],
            'award' => ['Text'],
            'brand' => ['Organization', 'Brand'],
            'broker' => ['Person', 'Organization'],
            'category' => ['URL', 'Text', 'PhysicalActivityCategory', 'Thing', 'CategoryCode'],
            'currency' => ['Text'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'feesAndCommissionsSpecification' => ['URL', 'Text'],
            'gracePeriod' => ['Duration'],
            'hasOfferCatalog' => ['OfferCatalog'],
            'hoursAvailable' => ['OpeningHoursSpecification'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'interestRate' => ['Number', 'QuantitativeValue'],
            'isRelatedTo' => ['Service', 'Product'],
            'isSimilarTo' => ['Service', 'Product'],
            'loanRepaymentForm' => ['RepaymentSpecification'],
            'loanTerm' => ['QuantitativeValue'],
            'loanType' => ['URL', 'Text'],
            'logo' => ['URL', 'ImageObject'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'offers' => ['Offer', 'Demand'],
            'potentialAction' => ['Action'],
            'produces' => ['Thing'],
            'provider' => ['Organization', 'Person'],
            'providerMobility' => ['Text'],
            'recourseLoan' => ['Boolean'],
            'renegotiableLoan' => ['Boolean'],
            'requiredCollateral' => ['Text', 'Thing'],
            'review' => ['Review'],
            'sameAs' => ['URL'],
            'serviceArea' => ['GeoShape', 'AdministrativeArea', 'Place'],
            'serviceAudience' => ['Audience'],
            'serviceOutput' => ['Thing'],
            'serviceType' => ['GovernmentBenefitsType', 'Text'],
            'slogan' => ['Text'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'termsOfService' => ['URL', 'Text'],
            'url' => ['URL']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'amount' => 'The amount of money.',
            'annualPercentageRate' => 'The annual rate that is charged for borrowing (or made by investing), expressed as a single percentage number that represents the actual yearly cost of funds over the term of a loan. This includes any fees or additional costs associated with the transaction.',
            'areaServed' => 'The geographic area where a service or offered item is provided.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'availableChannel' => 'A means of accessing the service (e.g. a phone bank, a web site, a location, etc.).',
            'award' => 'An award won by or for this item.',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'broker' => 'An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'currency' => 'The currency in which the monetary amount is expressed.  Use standard formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217) e.g. "USD"; [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for cryptocurrencies e.g. "BTC"; well known names for [Local Exchange Tradings Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system) (LETS) and other currency types e.g. "Ithaca HOUR".',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'feesAndCommissionsSpecification' => 'Description of fees, commissions, and other terms applied either to a class of financial product, or by a financial service organization.',
            'gracePeriod' => 'The period of time after any due date that the borrower has to fulfil its obligations before a default (failure to pay) is deemed to have occurred.',
            'hasOfferCatalog' => 'Indicates an OfferCatalog listing for this Organization, Person, or Service.',
            'hoursAvailable' => 'The hours during which this service or contact is available.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'interestRate' => 'The interest rate, charged or paid, applicable to the financial product. Note: This is different from the calculated annualPercentageRate.',
            'isRelatedTo' => 'A pointer to another, somehow related product (or multiple products).',
            'isSimilarTo' => 'A pointer to another, functionally similar product (or multiple products).',
            'loanRepaymentForm' => 'A form of paying back money previously borrowed from a lender. Repayment usually takes the form of periodic payments that normally include part principal plus interest in each payment.',
            'loanTerm' => 'The duration of the loan or credit agreement.',
            'loanType' => 'The type of a loan or credit.',
            'logo' => 'An associated logo.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'produces' => 'The tangible thing generated by the service, e.g. a passport, permit, etc.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'providerMobility' => 'Indicates the mobility of a provided service (e.g. \'static\', \'dynamic\').',
            'recourseLoan' => 'The only way you get the money back in the event of default is the security. Recourse is where you still have the opportunity to go back to the borrower for the rest of the money.',
            'renegotiableLoan' => 'Whether the terms for payment of interest can be renegotiated during the life of the loan.',
            'requiredCollateral' => 'Assets required to secure loan or credit repayments. It may take form of third party pledge, goods, financial instruments (cash, securities, etc.)',
            'review' => 'A review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'serviceArea' => 'The geographic area where the service is provided.',
            'serviceAudience' => 'The audience eligible for this service.',
            'serviceOutput' => 'The tangible thing generated by the service, e.g. a passport, permit, etc.',
            'serviceType' => 'The type of service being offered, e.g. veterans\' benefits, emergency relief, etc.',
            'slogan' => 'A slogan or motto associated with the item.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'termsOfService' => 'Human-readable terms of service documentation.',
            'url' => 'URL of the item.'
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
