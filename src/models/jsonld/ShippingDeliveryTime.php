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
 * ShippingDeliveryTime - ShippingDeliveryTime provides various pieces of information about delivery
 * times for shipping.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingDeliveryTime
 */
class ShippingDeliveryTime extends MetaJsonLd implements ShippingDeliveryTimeInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
	use ShippingDeliveryTimeTrait;
	use StructuredValueTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static $schemaTypeName = 'ShippingDeliveryTime';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static $schemaTypeScope = 'https://schema.org/ShippingDeliveryTime';

	/**
	 * The Schema.org Type Extends
	 *
	 * @var string
	 */
	public static $schemaTypeExtends = 'StructuredValue';

	/**
	 * The Schema.org Type Description
	 *
	 * @var string
	 */
	public static $schemaTypeDescription = 'ShippingDeliveryTime provides various pieces of information about delivery times for shipping.';


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
		    'businessDays' => ['array', 'DayOfWeek', 'DayOfWeek[]', 'array', 'OpeningHoursSpecification', 'OpeningHoursSpecification[]'],
		    'cutoffTime' => ['array', 'Time', 'Time[]'],
		    'description' => ['array', 'Text', 'Text[]', 'array', 'TextObject', 'TextObject[]'],
		    'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
		    'handlingTime' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'ServicePeriod', 'ServicePeriod[]'],
		    'identifier' => ['array', 'PropertyValue', 'PropertyValue[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
		    'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
		    'mainEntityOfPage' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'URL', 'URL[]'],
		    'name' => ['array', 'Text', 'Text[]'],
		    'owner' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
		    'potentialAction' => ['array', 'Action', 'Action[]'],
		    'sameAs' => ['array', 'URL', 'URL[]'],
		    'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
		    'transitTime' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'ServicePeriod', 'ServicePeriod[]'],
		    'url' => ['array', 'URL', 'URL[]']
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
		    'businessDays' => 'Days of the week when the merchant typically operates, indicated via opening hours markup.',
		    'cutoffTime' => 'Order cutoff time allows merchants to describe the time after which they will no longer process orders received on that day. For orders processed after cutoff time, one day gets added to the delivery time estimate. This property is expected to be most typically used via the [[ShippingRateSettings]] publication pattern. The time is indicated using the ISO-8601 Time format, e.g. "23:30:00-05:00" would represent 6:30 pm Eastern Standard Time (EST) which is 5 hours behind Coordinated Universal Time (UTC).',
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'handlingTime' => 'The typical delay between the receipt of the order and the goods either leaving the warehouse or being prepared for pickup, in case the delivery method is on site pickup.  In the context of [[ShippingDeliveryTime]], Typical properties: minValue, maxValue, unitCode (d for DAY).  This is by common convention assumed to mean business days (if a unitCode is used, coded as "d"), i.e. only counting days when the business normally operates.  In the context of [[ShippingService]], use the [[ServicePeriod]] format, that contains the same information in a structured form, with cut-off time, business days and duration.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'name' => 'The name of the item.',
		    'owner' => 'A person or organization who owns this Thing.',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
		    'transitTime' => 'The typical delay the order has been sent for delivery and the goods reach the final customer.    In the context of [[ShippingDeliveryTime]], use the [[QuantitativeValue]]. Typical properties: minValue, maxValue, unitCode (d for DAY).    In the context of [[ShippingConditions]], use the [[ServicePeriod]]. It has a duration (as a [[QuantitativeValue]]) and also business days and a cut-off time. ',
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
