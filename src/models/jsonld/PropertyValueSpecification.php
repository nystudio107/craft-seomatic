<?php

/**
 * SEOmatic plugin for Craft CMS 4
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
 * PropertyValueSpecification - A Property value specification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PropertyValueSpecification
 */
class PropertyValueSpecification extends MetaJsonLd implements PropertyValueSpecificationInterface, IntangibleInterface, ThingInterface
{
	use PropertyValueSpecificationTrait;
	use IntangibleTrait;
	use ThingTrait;

	/**
	 * The Schema.org Type Name
	 *
	 * @var string
	 */
	public static string $schemaTypeName = 'PropertyValueSpecification';

	/**
	 * The Schema.org Type Scope
	 *
	 * @var string
	 */
	public static string $schemaTypeScope = 'https://schema.org/PropertyValueSpecification';

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
	public static string $schemaTypeDescription = 'A Property value specification.';


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
		    'defaultValue' => ['Thing', 'Text'],
		    'description' => ['Text'],
		    'disambiguatingDescription' => ['Text'],
		    'identifier' => ['PropertyValue', 'URL', 'Text'],
		    'image' => ['URL', 'ImageObject'],
		    'mainEntityOfPage' => ['URL', 'CreativeWork'],
		    'maxValue' => ['Number'],
		    'minValue' => ['Number'],
		    'multipleValues' => ['Boolean'],
		    'name' => ['Text'],
		    'potentialAction' => ['Action'],
		    'readonlyValue' => ['Boolean'],
		    'sameAs' => ['URL'],
		    'stepValue' => ['Number'],
		    'subjectOf' => ['Event', 'CreativeWork'],
		    'url' => ['URL'],
		    'valueMaxLength' => ['Number'],
		    'valueMinLength' => ['Number'],
		    'valueName' => ['Text'],
		    'valuePattern' => ['Text'],
		    'valueRequired' => ['Boolean']
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
		    'defaultValue' => 'The default value of the input.  For properties that expect a literal, the default is a literal value, for properties that expect an object, it\'s an ID reference to one of the current values.',
		    'description' => 'A description of the item.',
		    'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
		    'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
		    'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
		    'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
		    'maxValue' => 'The upper value of some characteristic or property.',
		    'minValue' => 'The lower value of some characteristic or property.',
		    'multipleValues' => 'Whether multiple values are allowed for the property.  Default is false.',
		    'name' => 'The name of the item.',
		    'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
		    'readonlyValue' => 'Whether or not a property is mutable.  Default is false. Specifying this for a property that also has a value makes it act similar to a "hidden" input in an HTML form.',
		    'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
		    'stepValue' => 'The stepValue attribute indicates the granularity that is expected (and required) of the value in a PropertyValueSpecification.',
		    'subjectOf' => 'A CreativeWork or Event about this Thing.',
		    'url' => 'URL of the item.',
		    'valueMaxLength' => 'Specifies the allowed range for number of characters in a literal value.',
		    'valueMinLength' => 'Specifies the minimum allowed range for number of characters in a literal value.',
		    'valueName' => 'Indicates the name of the PropertyValueSpecification to be used in URL templates and form encoding in a manner analogous to HTML\'s input@name.',
		    'valuePattern' => 'Specifies a regular expression for testing literal values according to the HTML spec.',
		    'valueRequired' => 'Whether the property must be filled in to complete the action.  Default is false.'
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
