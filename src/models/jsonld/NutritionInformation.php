<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v15.0-release
 * NutritionInformation - Nutritional information about the recipe.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/NutritionInformation
 */
class NutritionInformation extends MetaJsonLd implements NutritionInformationInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
	use NutritionInformationTrait;
	use StructuredValueTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static $schemaTypeName = 'NutritionInformation';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static $schemaTypeScope = 'https://schema.org/NutritionInformation';

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
	public static $schemaTypeDescription = 'Nutritional information about the recipe.';


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
		    'alternateName' => ['Text'],
		    'calories' => ['Energy'],
		    'carbohydrateContent' => ['Mass'],
		    'cholesterolContent' => ['Mass'],
		    'description' => ['Text'],
		    'disambiguatingDescription' => ['Text'],
		    'fatContent' => ['Mass'],
		    'fiberContent' => ['Mass'],
		    'identifier' => ['PropertyValue', 'URL', 'Text'],
		    'image' => ['URL', 'ImageObject'],
		    'mainEntityOfPage' => ['URL', 'CreativeWork'],
		    'name' => ['Text'],
		    'potentialAction' => ['Action'],
		    'proteinContent' => ['Mass'],
		    'sameAs' => ['URL'],
		    'saturatedFatContent' => ['Mass'],
		    'servingSize' => ['Text'],
		    'sodiumContent' => ['Mass'],
		    'subjectOf' => ['Event', 'CreativeWork'],
		    'sugarContent' => ['Mass'],
		    'transFatContent' => ['Mass'],
		    'unsaturatedFatContent' => ['Mass'],
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
		    'alternateName' => 'An alias for the item.',
		    'calories' => 'The number of calories.',
		    'carbohydrateContent' => 'The number of grams of carbohydrates.',
		    'cholesterolContent' => 'The number of milligrams of cholesterol.',
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'fatContent' => 'The number of grams of fat.',
		    'fiberContent' => 'The number of grams of fiber.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'name' => 'The name of the item.',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'proteinContent' => 'The number of grams of protein.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'saturatedFatContent' => 'The number of grams of saturated fat.',
		    'servingSize' => 'The serving size, in terms of the number of volume or mass.',
		    'sodiumContent' => 'The number of milligrams of sodium.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
		    'sugarContent' => 'The number of grams of sugar.',
		    'transFatContent' => 'The number of grams of trans fat.',
		    'unsaturatedFatContent' => 'The number of grams of unsaturated fat.',
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
