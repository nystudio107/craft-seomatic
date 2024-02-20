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
 * EngineSpecification - Information about the engine of the vehicle. A vehicle can have multiple
 * engines represented by multiple engine specification entities.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EngineSpecification
 */
class EngineSpecification extends MetaJsonLd implements EngineSpecificationInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
    use EngineSpecificationTrait;
    use StructuredValueTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'EngineSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/EngineSpecification';

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
    public static string $schemaTypeDescription = 'Information about the engine of the vehicle. A vehicle can have multiple engines represented by multiple engine specification entities.';


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
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'engineDisplacement' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'enginePower' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'engineType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'QualitativeValue', 'QualitativeValue[]'],
            'fuelType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'QualitativeValue', 'QualitativeValue[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'torque' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
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
            'alternateName' => 'An alias for the item.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'engineDisplacement' => 'The volume swept by all of the pistons inside the cylinders of an internal combustion engine in a single movement.   Typical unit code(s): CMQ for cubic centimeter, LTR for liters, INQ for cubic inches * Note 1: You can link to information about how the given value has been determined using the [[valueReference]] property. * Note 2: You can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'enginePower' => 'The power of the vehicle\'s engine.     Typical unit code(s): KWT for kilowatt, BHP for brake horsepower, N12 for metric horsepower (PS, with 1 PS = 735,49875 W)  * Note 1: There are many different ways of measuring an engine\'s power. For an overview, see  [http://en.wikipedia.org/wiki/Horsepower#Engine\_power\_test\_codes](http://en.wikipedia.org/wiki/Horsepower#Engine_power_test_codes). * Note 2: You can link to information about how the given value has been determined using the [[valueReference]] property. * Note 3: You can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'engineType' => 'The type of engine or engines powering the vehicle.',
            'fuelType' => 'The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'torque' => 'The torque (turning force) of the vehicle\'s engine.  Typical unit code(s): NU for newton metre (N m), F17 for pound-force per foot, or F48 for pound-force per inch  * Note 1: You can link to information about how the given value has been determined (e.g. reference RPM) using the [[valueReference]] property. * Note 2: You can use [[minValue]] and [[maxValue]] to indicate ranges.',
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
