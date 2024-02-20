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
 * CreditCard - A card payment method of a particular brand or name.  Used to mark up a
 * particular payment method and/or the financial product/service that
 * supplies the card account.  Commonly used values:  *
 * http://purl.org/goodrelations/v1#AmericanExpress *
 * http://purl.org/goodrelations/v1#DinersClub *
 * http://purl.org/goodrelations/v1#Discover *
 * http://purl.org/goodrelations/v1#JCB *
 * http://purl.org/goodrelations/v1#MasterCard *
 * http://purl.org/goodrelations/v1#VISA
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CreditCard
 */
class CreditCard extends MetaJsonLd implements CreditCardInterface, PaymentCardInterface, FinancialProductInterface, ServiceInterface, IntangibleInterface, ThingInterface, PaymentMethodInterface, EnumerationInterface, LoanOrCreditInterface
{
    use CreditCardTrait;
    use PaymentCardTrait;
    use FinancialProductTrait;
    use ServiceTrait;
    use IntangibleTrait;
    use ThingTrait;
    use PaymentMethodTrait;
    use EnumerationTrait;
    use LoanOrCreditTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'CreditCard';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/CreditCard';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'PaymentCard';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = "A card payment method of a particular brand or name.  Used to mark up a particular payment method and/or the financial product/service that supplies the card account.\\n\\nCommonly used values:\\n\\n* http://purl.org/goodrelations/v1#AmericanExpress\\n* http://purl.org/goodrelations/v1#DinersClub\\n* http://purl.org/goodrelations/v1#Discover\\n* http://purl.org/goodrelations/v1#JCB\\n* http://purl.org/goodrelations/v1#MasterCard\\n* http://purl.org/goodrelations/v1#VISA\n       ";


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
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'aggregateRating' => ['array', 'AggregateRating', 'AggregateRating[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'amount' => ['array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'Number', 'Number[]'],
            'annualPercentageRate' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'areaServed' => ['array', 'Text', 'Text[]', 'array', 'Place', 'Place[]', 'array', 'AdministrativeArea', 'AdministrativeArea[]', 'array', 'GeoShape', 'GeoShape[]'],
            'audience' => ['array', 'Audience', 'Audience[]'],
            'availableChannel' => ['array', 'ServiceChannel', 'ServiceChannel[]'],
            'award' => ['array', 'Text', 'Text[]'],
            'brand' => ['array', 'Organization', 'Organization[]', 'array', 'Brand', 'Brand[]'],
            'broker' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'cashBack' => ['array', 'Number', 'Number[]', 'array', 'Boolean', 'Boolean[]'],
            'category' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'CategoryCode', 'CategoryCode[]', 'array', 'PhysicalActivityCategory', 'PhysicalActivityCategory[]', 'array', 'Thing', 'Thing[]'],
            'contactlessPayment' => ['array', 'Boolean', 'Boolean[]'],
            'currency' => ['array', 'Text', 'Text[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'feesAndCommissionsSpecification' => ['array', 'URL', 'URL[]', 'array', 'Text', 'Text[]'],
            'floorLimit' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'gracePeriod' => ['array', 'Duration', 'Duration[]'],
            'hasCertification' => ['array', 'Certification', 'Certification[]'],
            'hasOfferCatalog' => ['array', 'OfferCatalog', 'OfferCatalog[]'],
            'hoursAvailable' => ['array', 'OpeningHoursSpecification', 'OpeningHoursSpecification[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'interestRate' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'isRelatedTo' => ['array', 'Product', 'Product[]', 'array', 'Service', 'Service[]'],
            'isSimilarTo' => ['array', 'Product', 'Product[]', 'array', 'Service', 'Service[]'],
            'loanRepaymentForm' => ['array', 'RepaymentSpecification', 'RepaymentSpecification[]'],
            'loanTerm' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'loanType' => ['array', 'URL', 'URL[]', 'array', 'Text', 'Text[]'],
            'logo' => ['array', 'URL', 'URL[]', 'array', 'ImageObject', 'ImageObject[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'monthlyMinimumRepaymentAmount' => ['array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'Number', 'Number[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'offers' => ['array', 'Demand', 'Demand[]', 'array', 'Offer', 'Offer[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'produces' => ['array', 'Thing', 'Thing[]'],
            'provider' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'providerMobility' => ['array', 'Text', 'Text[]'],
            'recourseLoan' => ['array', 'Boolean', 'Boolean[]'],
            'renegotiableLoan' => ['array', 'Boolean', 'Boolean[]'],
            'requiredCollateral' => ['array', 'Text', 'Text[]', 'array', 'Thing', 'Thing[]'],
            'review' => ['array', 'Review', 'Review[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'serviceArea' => ['array', 'AdministrativeArea', 'AdministrativeArea[]', 'array', 'GeoShape', 'GeoShape[]', 'array', 'Place', 'Place[]'],
            'serviceAudience' => ['array', 'Audience', 'Audience[]'],
            'serviceOutput' => ['array', 'Thing', 'Thing[]'],
            'serviceType' => ['array', 'GovernmentBenefitsType', 'GovernmentBenefitsType[]', 'array', 'Text', 'Text[]'],
            'slogan' => ['array', 'Text', 'Text[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'supersededBy' => ['array', 'SchemaClass', 'SchemaClass[]', 'array', 'Enumeration', 'Enumeration[]', 'array', 'Property', 'Property[]'],
            'termsOfService' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
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
            'cashBack' => 'A cardholder benefit that pays the cardholder a small percentage of their net expenditures.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'contactlessPayment' => 'A secure method for consumers to purchase products or services via debit, credit or smartcards by using RFID or NFC technology.',
            'currency' => 'The currency in which the monetary amount is expressed.  Use standard formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system) (LETS) and other currency types, e.g. "Ithaca HOUR".',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'feesAndCommissionsSpecification' => 'Description of fees, commissions, and other terms applied either to a class of financial product, or by a financial service organization.',
            'floorLimit' => 'A floor limit is the amount of money above which credit card transactions must be authorized.',
            'gracePeriod' => 'The period of time after any due date that the borrower has to fulfil its obligations before a default (failure to pay) is deemed to have occurred.',
            'hasCertification' => 'Certification information about a product, organization, service, place, or person.',
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
            'monthlyMinimumRepaymentAmount' => 'The minimum payment is the lowest amount of money that one is required to pay on a credit card statement each month.',
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
            'supersededBy' => 'Relates a term (i.e. a property, class or enumeration) to one that supersedes it.',
            'termsOfService' => 'Human-readable terms of service documentation.',
            'url' => 'URL of the item.',
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
