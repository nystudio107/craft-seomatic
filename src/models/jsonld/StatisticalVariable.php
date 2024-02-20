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
 * StatisticalVariable - [[StatisticalVariable]] represents any type of statistical metric that can
 * be measured at a place and time. The usage pattern for
 * [[StatisticalVariable]] is typically expressed using [[Observation]] with
 * an explicit [[populationType]], which is a type, typically drawn from
 * Schema.org. Each [[StatisticalVariable]] is marked as a [[ConstraintNode]],
 * meaning that some properties (those listed using [[constraintProperty]])
 * serve in this setting solely to define the statistical variable rather than
 * literally describe a specific person, place or thing. For example, a
 * [[StatisticalVariable]] Median_Height_Person_Female representing the median
 * height of women, could be written as follows: the population type is
 * [[Person]]; the measuredProperty [[height]]; the [[statType]] [[median]];
 * the [[gender]] [[Female]]. It is important to note that there are many
 * kinds of scientific quantitative observation which are not fully, perfectly
 * or unambiguously described following this pattern, or with solely
 * Schema.org terminology. The approach taken here is designed to allow
 * partial, incremental or minimal description of [[StatisticalVariable]]s,
 * and the use of detailed sets of entity and property IDs from external
 * repositories. The [[measurementMethod]], [[unitCode]] and [[unitText]]
 * properties can also be used to clarify the specific nature and notation of
 * an observed measurement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/StatisticalVariable
 */
class StatisticalVariable extends MetaJsonLd implements StatisticalVariableInterface, ConstraintNodeInterface, IntangibleInterface, ThingInterface
{
    use StatisticalVariableTrait;
    use ConstraintNodeTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'StatisticalVariable';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/StatisticalVariable';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'ConstraintNode';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = '[[StatisticalVariable]] represents any type of statistical metric that can be measured at a place and time. The usage pattern for [[StatisticalVariable]] is typically expressed using [[Observation]] with an explicit [[populationType]], which is a type, typically drawn from Schema.org. Each [[StatisticalVariable]] is marked as a [[ConstraintNode]], meaning that some properties (those listed using [[constraintProperty]]) serve in this setting solely to define the statistical variable rather than literally describe a specific person, place or thing. For example, a [[StatisticalVariable]] Median_Height_Person_Female representing the median height of women, could be written as follows: the population type is [[Person]]; the measuredProperty [[height]]; the [[statType]] [[median]]; the [[gender]] [[Female]]. It is important to note that there are many kinds of scientific quantitative observation which are not fully, perfectly or unambiguously described following this pattern, or with solely Schema.org terminology. The approach taken here is designed to allow partial, incremental or minimal description of [[StatisticalVariable]]s, and the use of detailed sets of entity and property IDs from external repositories. The [[measurementMethod]], [[unitCode]] and [[unitText]] properties can also be used to clarify the specific nature and notation of an observed measurement. ';


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
            'constraintProperty' => ['array', 'URL', 'URL[]', 'array', 'Property', 'Property[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'measuredProperty' => ['array', 'Property', 'Property[]'],
            'measurementDenominator' => ['array', 'StatisticalVariable', 'StatisticalVariable[]'],
            'measurementMethod' => ['array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementMethodEnum', 'MeasurementMethodEnum[]', 'array', 'Text', 'Text[]'],
            'measurementQualifier' => ['array', 'Enumeration', 'Enumeration[]'],
            'measurementTechnique' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementMethodEnum', 'MeasurementMethodEnum[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'numConstraints' => ['array', 'Integer', 'Integer[]'],
            'populationType' => ['array', 'SchemaClass', 'SchemaClass[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'statType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'Property', 'Property[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
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
            'constraintProperty' => 'Indicates a property used as a constraint. For example, in the definition of a [[StatisticalVariable]]. The value is a property, either from within Schema.org or from other compatible (e.g. RDF) systems such as DataCommons.org or Wikidata.org. ',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'measuredProperty' => 'The measuredProperty of an [[Observation]], typically via its [[StatisticalVariable]]. There are various kinds of applicable [[Property]]: a schema.org property, a property from other RDF-compatible systems, e.g. W3C RDF Data Cube, Data Commons, Wikidata, or schema.org extensions such as [GS1\'s](https://www.gs1.org/voc/?show=properties).',
            'measurementDenominator' => 'Identifies the denominator variable when an observation represents a ratio or percentage.',
            'measurementMethod' => 'A subproperty of [[measurementTechnique]] that can be used for specifying specific methods, in particular via [[MeasurementMethodEnum]].',
            'measurementQualifier' => 'Provides additional qualification to an observation. For example, a GDP observation measures the Nominal value.',
            'measurementTechnique' => 'A technique, method or technology used in an [[Observation]], [[StatisticalVariable]] or [[Dataset]] (or [[DataDownload]], [[DataCatalog]]), corresponding to the method used for measuring the corresponding variable(s) (for datasets, described using [[variableMeasured]]; for [[Observation]], a [[StatisticalVariable]]). Often but not necessarily each [[variableMeasured]] will have an explicit representation as (or mapping to) an property such as those defined in Schema.org, or other RDF vocabularies and "knowledge graphs". In that case the subproperty of [[variableMeasured]] called [[measuredProperty]] is applicable.      The [[measurementTechnique]] property helps when extra clarification is needed about how a [[measuredProperty]] was measured. This is oriented towards scientific and scholarly dataset publication but may have broader applicability; it is not intended as a full representation of measurement, but can often serve as a high level summary for dataset discovery.   For example, if [[variableMeasured]] is: molecule concentration, [[measurementTechnique]] could be: "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the [[variableMeasured]] is "depression rating", the [[measurementTechnique]] could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".   If there are several [[variableMeasured]] properties recorded for some given data object, use a [[PropertyValue]] for each [[variableMeasured]] and attach the corresponding [[measurementTechnique]]. The value can also be from an enumeration, organized as a [[MeasurementMetholdEnumeration]].',
            'name' => 'The name of the item.',
            'numConstraints' => 'Indicates the number of constraints property values defined for a particular [[ConstraintNode]] such as [[StatisticalVariable]]. This helps applications understand if they have access to a sufficiently complete description of a [[StatisticalVariable]] or other construct that is defined using properties on template-style nodes.',
            'populationType' => 'Indicates the populationType common to all members of a [[StatisticalPopulation]] or all cases within the scope of a [[StatisticalVariable]].',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'statType' => 'Indicates the kind of statistic represented by a [[StatisticalVariable]], e.g. mean, count etc. The value of statType is a property, either from within Schema.org (e.g. [[count]], [[median]], [[marginOfError]], [[maxValue]], [[minValue]]) or from other compatible (e.g. RDF) systems such as DataCommons.org or Wikidata.org. ',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
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
