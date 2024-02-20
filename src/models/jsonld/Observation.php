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
 * Observation - Instances of the class [[Observation]] are used to specify observations
 * about an entity at a particular time. The principal properties of an
 * [[Observation]] are [[observationAbout]], [[measuredProperty]],
 * [[statType]], [[value] and [[observationDate]]  and [[measuredProperty]].
 * Some but not all Observations represent a [[QuantitativeValue]].
 * Quantitative observations can be about a [[StatisticalVariable]], which is
 * an abstract specification about which we can make observations that are
 * grounded at a particular location and time.       Observations can also
 * encode a subset of simple RDF-like statements (its observationAbout, a
 * StatisticalVariable, defining the measuredPoperty; its observationAbout
 * property indicating the entity the statement is about, and [[value]] )  In
 * the context of a quantitative knowledge graph, typical properties could
 * include [[measuredProperty]], [[observationAbout]], [[observationDate]],
 * [[value]], [[unitCode]], [[unitText]], [[measurementMethod]].
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Observation
 */
class Observation extends MetaJsonLd implements ObservationInterface, QuantitativeValueInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
    use ObservationTrait;
    use QuantitativeValueTrait;
    use StructuredValueTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'Observation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/Observation';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'QuantitativeValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = "Instances of the class [[Observation]] are used to specify observations about an entity at a particular time. The principal properties of an [[Observation]] are [[observationAbout]], [[measuredProperty]], [[statType]], [[value] and [[observationDate]]  and [[measuredProperty]]. Some but not all Observations represent a [[QuantitativeValue]]. Quantitative observations can be about a [[StatisticalVariable]], which is an abstract specification about which we can make observations that are grounded at a particular location and time. \n    \nObservations can also encode a subset of simple RDF-like statements (its observationAbout, a StatisticalVariable, defining the measuredPoperty; its observationAbout property indicating the entity the statement is about, and [[value]] )\n\nIn the context of a quantitative knowledge graph, typical properties could include [[measuredProperty]], [[observationAbout]], [[observationDate]], [[value]], [[unitCode]], [[unitText]], [[measurementMethod]].\n    ";


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
            'additionalProperty' => ['array', 'PropertyValue', 'PropertyValue[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'marginOfError' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'maxValue' => ['array', 'Number', 'Number[]'],
            'measuredProperty' => ['array', 'Property', 'Property[]'],
            'measurementDenominator' => ['array', 'StatisticalVariable', 'StatisticalVariable[]'],
            'measurementMethod' => ['array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementMethodEnum', 'MeasurementMethodEnum[]', 'array', 'Text', 'Text[]'],
            'measurementQualifier' => ['array', 'Enumeration', 'Enumeration[]'],
            'measurementTechnique' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementMethodEnum', 'MeasurementMethodEnum[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'minValue' => ['array', 'Number', 'Number[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'observationAbout' => ['array', 'Thing', 'Thing[]', 'array', 'Place', 'Place[]'],
            'observationDate' => ['array', 'DateTime', 'DateTime[]'],
            'observationPeriod' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'unitCode' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'unitText' => ['array', 'Text', 'Text[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'value' => ['array', 'StructuredValue', 'StructuredValue[]', 'array', 'Number', 'Number[]', 'array', 'Text', 'Text[]', 'array', 'Boolean', 'Boolean[]'],
            'valueReference' => ['array', 'QualitativeValue', 'QualitativeValue[]', 'array', 'Text', 'Text[]', 'array', 'Enumeration', 'Enumeration[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementTypeEnumeration', 'MeasurementTypeEnumeration[]', 'array', 'StructuredValue', 'StructuredValue[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'variableMeasured' => ['array', 'Text', 'Text[]', 'array', 'Property', 'Property[]', 'array', 'StatisticalVariable', 'StatisticalVariable[]', 'array', 'PropertyValue', 'PropertyValue[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalProperty' => 'A property-value pair representing an additional characteristic of the entity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'marginOfError' => 'A [[marginOfError]] for an [[Observation]].',
            'maxValue' => 'The upper value of some characteristic or property.',
            'measuredProperty' => 'The measuredProperty of an [[Observation]], typically via its [[StatisticalVariable]]. There are various kinds of applicable [[Property]]: a schema.org property, a property from other RDF-compatible systems, e.g. W3C RDF Data Cube, Data Commons, Wikidata, or schema.org extensions such as [GS1\'s](https://www.gs1.org/voc/?show=properties).',
            'measurementDenominator' => 'Identifies the denominator variable when an observation represents a ratio or percentage.',
            'measurementMethod' => 'A subproperty of [[measurementTechnique]] that can be used for specifying specific methods, in particular via [[MeasurementMethodEnum]].',
            'measurementQualifier' => 'Provides additional qualification to an observation. For example, a GDP observation measures the Nominal value.',
            'measurementTechnique' => 'A technique, method or technology used in an [[Observation]], [[StatisticalVariable]] or [[Dataset]] (or [[DataDownload]], [[DataCatalog]]), corresponding to the method used for measuring the corresponding variable(s) (for datasets, described using [[variableMeasured]]; for [[Observation]], a [[StatisticalVariable]]). Often but not necessarily each [[variableMeasured]] will have an explicit representation as (or mapping to) an property such as those defined in Schema.org, or other RDF vocabularies and "knowledge graphs". In that case the subproperty of [[variableMeasured]] called [[measuredProperty]] is applicable.      The [[measurementTechnique]] property helps when extra clarification is needed about how a [[measuredProperty]] was measured. This is oriented towards scientific and scholarly dataset publication but may have broader applicability; it is not intended as a full representation of measurement, but can often serve as a high level summary for dataset discovery.   For example, if [[variableMeasured]] is: molecule concentration, [[measurementTechnique]] could be: "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the [[variableMeasured]] is "depression rating", the [[measurementTechnique]] could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".   If there are several [[variableMeasured]] properties recorded for some given data object, use a [[PropertyValue]] for each [[variableMeasured]] and attach the corresponding [[measurementTechnique]]. The value can also be from an enumeration, organized as a [[MeasurementMetholdEnumeration]].',
            'minValue' => 'The lower value of some characteristic or property.',
            'name' => 'The name of the item.',
            'observationAbout' => 'The [[observationAbout]] property identifies an entity, often a [[Place]], associated with an [[Observation]].',
            'observationDate' => 'The observationDate of an [[Observation]].',
            'observationPeriod' => 'The length of time an Observation took place over. The format follows `P[0-9]*[Y|M|D|h|m|s]`. For example, P1Y is Period 1 Year, P3M is Period 3 Months, P3h is Period 3 hours.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
            'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for <a href=\'unitCode\'>unitCode</a>.',
            'url' => 'URL of the item.',
            'value' => 'The value of a [[QuantitativeValue]] (including [[Observation]]) or property value node.  * For [[QuantitativeValue]] and [[MonetaryAmount]], the recommended type for values is \'Number\'. * For [[PropertyValue]], it can be \'Text\', \'Number\', \'Boolean\', or \'StructuredValue\'. * Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similar Unicode symbols. * Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
            'valueReference' => 'A secondary value that provides additional information on the original value, e.g. a reference temperature or a type of measurement.',
            'variableMeasured' => 'The variableMeasured property can indicate (repeated as necessary) the  variables that are measured in some dataset, either described as text or as pairs of identifier and description using PropertyValue, or more explicitly as a [[StatisticalVariable]].',
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
