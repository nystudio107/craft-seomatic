<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * SizeSpecification - Size related properties of a product, typically a size code ([[name]]) and
 * optionally a [[sizeSystem]], [[sizeGroup]], and product measurements
 * ([[hasMeasurement]]). In addition, the intended audience can be defined
 * through [[suggestedAge]], [[suggestedGender]], and suggested body
 * measurements ([[suggestedMeasurement]]).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SizeSpecification
 */
class SizeSpecification extends MetaJsonLd implements SizeSpecificationInterface, QualitativeValueInterface, EnumerationInterface, IntangibleInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'SizeSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/SizeSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
Size related properties of a product, typically a size code ([[name]]) and optionally a [[sizeSystem]], [[sizeGroup]], and product measurements ([[hasMeasurement]]). In addition, the intended audience can be defined through [[suggestedAge]], [[suggestedGender]], and suggested body measurements ([[suggestedMeasurement]]).
SCHEMADESC;

    use SizeSpecificationTrait;
    use QualitativeValueTrait;
    use EnumerationTrait;
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
            'additionalProperty' => ['PropertyValue'],
            'additionalType' => ['URL'],
            'alternateName' => ['Text'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'equal' => ['QualitativeValue'],
            'greater' => ['QualitativeValue'],
            'greaterOrEqual' => ['QualitativeValue'],
            'hasMeasurement' => ['QuantitativeValue'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'lesser' => ['QualitativeValue'],
            'lesserOrEqual' => ['QualitativeValue'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'nonEqual' => ['QualitativeValue'],
            'potentialAction' => ['Action'],
            'sameAs' => ['URL'],
            'sizeGroup' => ['Text', 'SizeGroupEnumeration'],
            'sizeSystem' => ['Text', 'SizeSystemEnumeration'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'suggestedAge' => ['QuantitativeValue'],
            'suggestedGender' => ['GenderType', 'Text'],
            'suggestedMeasurement' => ['QuantitativeValue'],
            'supersededBy' => ['Enumeration', 'Class', 'Property'],
            'url' => ['URL'],
            'valueReference' => ['Enumeration', 'DefinedTerm', 'Text', 'MeasurementTypeEnumeration', 'QualitativeValue', 'StructuredValue', 'PropertyValue', 'QuantitativeValue']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'alternateName' => 'An alias for the item.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'equal' => 'This ordering relation for qualitative values indicates that the subject is equal to the object.',
            'greater' => 'This ordering relation for qualitative values indicates that the subject is greater than the object.',
            'greaterOrEqual' => 'This ordering relation for qualitative values indicates that the subject is greater than or equal to the object.',
            'hasMeasurement' => 'A product measurement, for example the inseam of pants, the wheel size of a bicycle, or the gauge of a screw. Usually an exact measurement, but can also be a range of measurements for adjustable products, for example belts and ski bindings.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'lesser' => 'This ordering relation for qualitative values indicates that the subject is lesser than the object.',
            'lesserOrEqual' => 'This ordering relation for qualitative values indicates that the subject is lesser than or equal to the object.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'nonEqual' => 'This ordering relation for qualitative values indicates that the subject is not equal to the object.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'sizeGroup' => 'The size group (also known as "size type") for a product\'s size. Size groups are common in the fashion industry to define size segments and suggested audiences for wearable products. Multiple values can be combined, for example "men\'s big and tall", "petite maternity" or "regular"',
            'sizeSystem' => 'The size system used to identify a product\'s size. Typically either a standard (for example, "GS1" or "ISO-EN13402"), country code (for example "US" or "JP"), or a measuring system (for example "Metric" or "Imperial").',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'suggestedAge' => 'The age or age range for the intended audience or person, for example 3-12 months for infants, 1-5 years for toddlers.',
            'suggestedGender' => 'The suggested gender of the intended person or audience, for example "male", "female", or "unisex".',
            'suggestedMeasurement' => 'A suggested range of body measurements for the intended audience or person, for example inseam between 32 and 34 inches or height between 170 and 190 cm. Typically found on a size chart for wearable products.',
            'supersededBy' => 'Relates a term (i.e. a property, class or enumeration) to one that supersedes it.',
            'url' => 'URL of the item.',
            'valueReference' => 'A secondary value that provides additional information on the original value, e.g. a reference temperature or a type of measurement.'
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
