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
 * MemberProgramTier - A MemberProgramTier specifies a tier under a loyalty (member) program, for
 * example "gold".
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MemberProgramTier
 */
class MemberProgramTier extends MetaJsonLd implements MemberProgramTierInterface, IntangibleInterface, ThingInterface
{
	use MemberProgramTierTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static string $schemaTypeName = 'MemberProgramTier';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static string $schemaTypeScope = 'https://schema.org/MemberProgramTier';

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
	public static string $schemaTypeDescription = 'A MemberProgramTier specifies a tier under a loyalty (member) program, for example "gold".';


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
		    'description' => ['array', 'Text', 'Text[]', 'array', 'TextObject', 'TextObject[]'],
		    'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
		    'hasTierBenefit' => ['array', 'TierBenefitEnumeration', 'TierBenefitEnumeration[]'],
		    'hasTierRequirement' => ['array', 'CreditCard', 'CreditCard[]', 'array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'Text', 'Text[]', 'array', 'UnitPriceSpecification', 'UnitPriceSpecification[]'],
		    'identifier' => ['array', 'PropertyValue', 'PropertyValue[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
		    'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
		    'isTierOf' => ['array', 'MemberProgram', 'MemberProgram[]'],
		    'mainEntityOfPage' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'URL', 'URL[]'],
		    'membershipPointsEarned' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
		    'name' => ['array', 'Text', 'Text[]'],
		    'owner' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
		    'potentialAction' => ['array', 'Action', 'Action[]'],
		    'sameAs' => ['array', 'URL', 'URL[]'],
		    'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
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
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'hasTierBenefit' => 'A member benefit for a particular tier of a loyalty program.',
		    'hasTierRequirement' => 'A requirement for a user to join a membership tier, for example: a CreditCard if the tier requires sign up for a credit card, A UnitPriceSpecification if the user is required to pay a (periodic) fee, or a MonetaryAmount if the user needs to spend a minimum amount to join the tier. If a tier is free to join then this property does not need to be specified.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'isTierOf' => 'The member program this tier is a part of.',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'membershipPointsEarned' => 'The number of membership points earned by the member. If necessary, the unitText can be used to express the units the points are issued in. (E.g. stars, miles, etc.)',
		    'name' => 'The name of the item.',
		    'owner' => 'A person or organization who owns this Thing.',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
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
