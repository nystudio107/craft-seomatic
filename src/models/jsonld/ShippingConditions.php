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
 * ShippingConditions - ShippingConditions represent a set of constraints and information about the
 * conditions of shipping a product. Such conditions may apply to only a
 * subset of the products being shipped, depending on aspects of the product
 * like weight, size, price, destination, and others. All the specified
 * conditions must be met for this ShippingConditions to apply.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ShippingConditions
 */
class ShippingConditions extends MetaJsonLd implements ShippingConditionsInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
	use ShippingConditionsTrait;
	use StructuredValueTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static string $schemaTypeName = 'ShippingConditions';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static string $schemaTypeScope = 'https://schema.org/ShippingConditions';

	/**
	 * The Schema.org Type Extends
	 *
	 * @var string
	 */
	public static string $schemaTypeExtends = 'StructuredValue';

	/**
	 * The Schema.org Type Description
	 *
	 * @var string
	 */
	public static string $schemaTypeDescription = 'ShippingConditions represent a set of constraints and information about the conditions of shipping a product. Such conditions may apply to only a subset of the products being shipped, depending on aspects of the product like weight, size, price, destination, and others. All the specified conditions must be met for this ShippingConditions to apply.';


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
		    'depth' => ['array', 'Distance', 'Distance[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
		    'description' => ['array', 'Text', 'Text[]', 'array', 'TextObject', 'TextObject[]'],
		    'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
		    'doesNotShip' => ['array', 'Boolean', 'Boolean[]'],
		    'height' => ['array', 'Distance', 'Distance[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
		    'identifier' => ['array', 'PropertyValue', 'PropertyValue[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
		    'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
		    'mainEntityOfPage' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'URL', 'URL[]'],
		    'name' => ['array', 'Text', 'Text[]'],
		    'numItems' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
		    'orderValue' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
		    'owner' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
		    'potentialAction' => ['array', 'Action', 'Action[]'],
		    'sameAs' => ['array', 'URL', 'URL[]'],
		    'seasonalOverride' => ['array', 'OpeningHoursSpecification', 'OpeningHoursSpecification[]'],
		    'shippingDestination' => ['array', 'DefinedRegion', 'DefinedRegion[]'],
		    'shippingOrigin' => ['array', 'DefinedRegion', 'DefinedRegion[]'],
		    'shippingRate' => ['array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'ShippingRateSettings', 'ShippingRateSettings[]'],
		    'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
		    'transitTime' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'ServicePeriod', 'ServicePeriod[]'],
		    'url' => ['array', 'URL', 'URL[]'],
		    'weight' => ['array', 'Mass', 'Mass[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
		    'width' => ['array', 'Distance', 'Distance[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]']
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
		    'depth' => 'The depth of the item.',
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'doesNotShip' => 'Indicates when shipping to a particular [[shippingDestination]] is not available.',
		    'height' => 'The height of the item.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'name' => 'The name of the item.',
		    'numItems' => 'Limits the number of items being shipped for which these conditions apply.',
		    'orderValue' => 'Minimum and maximum order value for which these shipping conditions are valid.',
		    'owner' => 'A person or organization who owns this Thing.',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'seasonalOverride' => 'Limited period during which these shipping conditions apply.',
		    'shippingDestination' => 'indicates (possibly multiple) shipping destinations. These can be defined in several ways, e.g. postalCode ranges.',
		    'shippingOrigin' => 'Indicates the origin of a shipment, i.e. where it should be coming from.',
		    'shippingRate' => 'The shipping rate is the cost of shipping to the specified destination. Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are most appropriate.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
		    'transitTime' => 'The typical delay the order has been sent for delivery and the goods reach the final customer.    In the context of [[ShippingDeliveryTime]], use the [[QuantitativeValue]]. Typical properties: minValue, maxValue, unitCode (d for DAY).    In the context of [[ShippingConditions]], use the [[ServicePeriod]]. It has a duration (as a [[QuantitativeValue]]) and also business days and a cut-off time. ',
		    'url' => 'URL of the item.',
		    'weight' => 'The weight of the product or person.',
		    'width' => 'The width of the item.'
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
