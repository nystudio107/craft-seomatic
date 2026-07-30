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
 * schema.org version: v30.0
 * FinancialIncentive - <p>Represents financial incentives for goods/services offered by an
 * organization (or individual).</p>  <p>Typically contains the [[name]] of
 * the incentive, the [[incentivizedItem]], the [[incentiveAmount]], the
 * [[incentiveStatus]], [[incentiveType]], the [[provider]] of the incentive,
 * and [[eligibleWithSupplier]].</p>  <p>Optionally contains criteria on
 * whether the incentive is limited based on [[purchaseType]],
 * [[purchasePriceLimit]], [[incomeLimit]], and the [[qualifiedExpense]].
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FinancialIncentive
 */
class FinancialIncentive extends MetaJsonLd implements FinancialIncentiveInterface, IntangibleInterface, ThingInterface
{
	use FinancialIncentiveTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static string $schemaTypeName = 'FinancialIncentive';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static string $schemaTypeScope = 'https://schema.org/FinancialIncentive';

	/**
	 * The Schema.org Type Extends
	 *
	 * @var string
	 */
	public static string $schemaTypeExtends = 'Intangible';

	/**
	 * The Schema.org Type Description
	 *
	 * @var string
	 */
	public static string $schemaTypeDescription = "<p>Represents financial incentives for goods/services offered by an organization (or individual).</p>\n\n<p>Typically contains the [[name]] of the incentive, the [[incentivizedItem]], the [[incentiveAmount]], the [[incentiveStatus]], [[incentiveType]], the [[provider]] of the incentive, and [[eligibleWithSupplier]].</p>\n\n<p>Optionally contains criteria on whether the incentive is limited based on [[purchaseType]], [[purchasePriceLimit]], [[incomeLimit]], and the [[qualifiedExpense]].\n    ";


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
		    'alternateName' => ['array', 'Text', 'Text[]'],
		    'areaServed' => ['array', 'AdministrativeArea', 'AdministrativeArea[]', 'array', 'GeoShape', 'GeoShape[]', 'array', 'Place', 'Place[]', 'array', 'Text', 'Text[]'],
		    'description' => ['array', 'Text', 'Text[]', 'array', 'TextObject', 'TextObject[]'],
		    'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
		    'eligibleWithSupplier' => ['array', 'Organization', 'Organization[]'],
		    'identifier' => ['array', 'PropertyValue', 'PropertyValue[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
		    'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
		    'incentiveAmount' => ['array', 'LoanOrCredit', 'LoanOrCredit[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'UnitPriceSpecification', 'UnitPriceSpecification[]'],
		    'incentiveStatus' => ['array', 'IncentiveStatus', 'IncentiveStatus[]'],
		    'incentiveType' => ['array', 'IncentiveType', 'IncentiveType[]'],
		    'incentivizedItem' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Product', 'Product[]'],
		    'incomeLimit' => ['array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'Text', 'Text[]'],
		    'mainEntityOfPage' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'URL', 'URL[]'],
		    'name' => ['array', 'Text', 'Text[]'],
		    'owner' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
		    'potentialAction' => ['array', 'Action', 'Action[]'],
		    'provider' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
		    'publisher' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
		    'purchasePriceLimit' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
		    'purchaseType' => ['array', 'PurchaseType', 'PurchaseType[]'],
		    'qualifiedExpense' => ['array', 'IncentiveQualifiedExpenseType', 'IncentiveQualifiedExpenseType[]'],
		    'sameAs' => ['array', 'URL', 'URL[]'],
		    'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
		    'url' => ['array', 'URL', 'URL[]'],
		    'validFrom' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
		    'validThrough' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]']
		];
	}


	/**
	 * @inheritdoc
	 */
	public function getSchemaPropertyDescriptions(): array
	{
		return [
		    'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
		    'alternateName' => 'An alias for the item.',
		    'areaServed' => 'The geographic area where a service or offered item is provided.',
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'eligibleWithSupplier' => 'The supplier of the incentivized item/service for which the incentive is valid for such as a utility company, merchant, or contractor.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'incentiveAmount' => 'Describes the amount that can be redeemed from this incentive.      <p>[[QuantitativeValue]]: Use this for incentives based on price (either raw amount or percentage-based). For a raw amount example, "You can claim $2,500 - $7,500 from the total cost of installation" would be represented as the following:</p>     {         "@type": "QuantitativeValue",         “minValue”: 2500,         “maxValue”: 7500,         "unitCode": "USD"     } <p>[[QuantitativeValue]] can also be used for percentage amounts. In such cases, value is used to represent the incentive’s percentage, while maxValue represents a limit (if one exists) to that incentive. The unitCode should be \'P1\' and the unitText should be \'%\', while valueReference should be used for holding the currency type. For example, "You can claim up to 30% of the total cost of installation, up to a maximum of $7,500" would be:</p>     {         "@type": "QuantitativeValue",         "value": 30,         "unitCode": "P1",         "unitText": "%",         “maxValue”: 7500,         “valueReference”: “USD”     } <p>[[UnitPriceSpecification]]: Use this for incentives that are based on amounts rather than price. For example, a net metering rebate that pays $10/kWh, up to $1,000:</p>     {         "@type": "UnitPriceSpecification",         "price": 10,         "priceCurrency": "USD",         "referenceQuantity": 1,         "unitCode": "DO3",         "unitText": "kw/h",         "maxPrice": 1000,         "description": "$10 / kwh up to $1000"     } <p>[[LoanOrCredit]]: Use for incentives that are loan based. For example, a loan of $4,000 - $50,000 with a repayment term of 10 years, interest free would look like:</p>     {         "@type": "LoanOrCredit",         "loanTerm": {                 "@type":"QuantitativeValue",                 "value":"10",                 "unitCode": "ANN"             },         "amount":[             {                 "@type": "QuantitativeValue",                 "Name":"fixed interest rate",                 "value":"0",             },         ],         "amount":[             {                 "@type": "MonetaryAmount",                 "Name":"min loan amount",                 "value":"4000",                 "currency":"CAD"             },             {                 "@type": "MonetaryAmount",                 "Name":"max loan amount",                 "value":"50000",                 "currency":"CAD"             }         ],     }  In summary: <ul><li>Use [[QuantitativeValue]] for absolute/percentage-based incentives applied on the price of a good/service.</li> <li>Use [[UnitPriceSpecification]] for incentives based on a per-unit basis (e.g. net metering).</li> <li>Use [[LoanOrCredit]] for loans/credits.</li> </ul>.',
		    'incentiveStatus' => 'The status of the incentive (active, on hold, retired, etc.).',
		    'incentiveType' => 'The type of incentive offered (tax credit/rebate, tax deduction, tax waiver, subsidies, etc.).',
		    'incentivizedItem' => 'The type or specific product(s) and/or service(s) being incentivized. <p>DefinedTermSets are used for product and service categories such as the United Nations Standard Products and Services Code:</p>     {         "@type": "DefinedTerm",         "inDefinedTermSet": "https://www.unspsc.org/",         "termCode": "261315XX",         "name": "Photovoltaic module"     }  <p>For a specific product or service, use the Product type:</p>     {         "@type": "Product",         "name": "Kenmore White 17" Microwave",     } For multiple different incentivized items, use multiple [[DefinedTerm]] or [[Product]].',
		    'incomeLimit' => 'Optional. Income limit for which the incentive is applicable for.      <p>If MonetaryAmount is specified, this should be based on annualized income (e.g. if an incentive is limited to those making <$114,000 annually):</p>     {         "@type": "MonetaryAmount",         "maxValue": 114000,         "currency": "USD",     }  Use Text for incentives that are limited based on other criteria, for example if an incentive is only available to recipients making 120% of the median poverty income in their area.',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'name' => 'The name of the item.',
		    'owner' => 'A person or organization who owns this Thing.',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
		    'publisher' => 'The publisher of the article in question.',
		    'purchasePriceLimit' => 'Optional. The maximum price the item can have and still qualify for this offer.',
		    'purchaseType' => 'Optional. The type of purchase the consumer must make in order to qualify for this incentive.',
		    'qualifiedExpense' => 'Optional. The types of expenses that are covered by the incentive. For example some incentives are only for the goods (tangible items) but the services (labor) are excluded.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
		    'url' => 'URL of the item.',
		    'validFrom' => 'The date when the item becomes valid.',
		    'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.'
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
