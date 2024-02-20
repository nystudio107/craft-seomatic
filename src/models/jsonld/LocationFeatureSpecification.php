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
 * LocationFeatureSpecification - Specifies a location feature by providing a structured value representing a
 * feature of an accommodation as a property-value pair of varying degrees of
 * formality.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LocationFeatureSpecification
 */
class LocationFeatureSpecification extends MetaJsonLd implements LocationFeatureSpecificationInterface, PropertyValueInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
    use LocationFeatureSpecificationTrait;
    use PropertyValueTrait;
    use StructuredValueTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'LocationFeatureSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/LocationFeatureSpecification';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'PropertyValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'Specifies a location feature by providing a structured value representing a feature of an accommodation as a property-value pair of varying degrees of formality.';


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
            'hoursAvailable' => ['array', 'OpeningHoursSpecification', 'OpeningHoursSpecification[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'maxValue' => ['array', 'Number', 'Number[]'],
            'measurementMethod' => ['array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementMethodEnum', 'MeasurementMethodEnum[]', 'array', 'Text', 'Text[]'],
            'measurementTechnique' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementMethodEnum', 'MeasurementMethodEnum[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'minValue' => ['array', 'Number', 'Number[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'propertyID' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'unitCode' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'unitText' => ['array', 'Text', 'Text[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'validFrom' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'validThrough' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'value' => ['array', 'StructuredValue', 'StructuredValue[]', 'array', 'Number', 'Number[]', 'array', 'Text', 'Text[]', 'array', 'Boolean', 'Boolean[]'],
            'valueReference' => ['array', 'QualitativeValue', 'QualitativeValue[]', 'array', 'Text', 'Text[]', 'array', 'Enumeration', 'Enumeration[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'MeasurementTypeEnumeration', 'MeasurementTypeEnumeration[]', 'array', 'StructuredValue', 'StructuredValue[]', 'array', 'PropertyValue', 'PropertyValue[]'],
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
            'hoursAvailable' => 'The hours during which this service or contact is available.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'maxValue' => 'The upper value of some characteristic or property.',
            'measurementMethod' => 'A subproperty of [[measurementTechnique]] that can be used for specifying specific methods, in particular via [[MeasurementMethodEnum]].',
            'measurementTechnique' => 'A technique, method or technology used in an [[Observation]], [[StatisticalVariable]] or [[Dataset]] (or [[DataDownload]], [[DataCatalog]]), corresponding to the method used for measuring the corresponding variable(s) (for datasets, described using [[variableMeasured]]; for [[Observation]], a [[StatisticalVariable]]). Often but not necessarily each [[variableMeasured]] will have an explicit representation as (or mapping to) an property such as those defined in Schema.org, or other RDF vocabularies and "knowledge graphs". In that case the subproperty of [[variableMeasured]] called [[measuredProperty]] is applicable.      The [[measurementTechnique]] property helps when extra clarification is needed about how a [[measuredProperty]] was measured. This is oriented towards scientific and scholarly dataset publication but may have broader applicability; it is not intended as a full representation of measurement, but can often serve as a high level summary for dataset discovery.   For example, if [[variableMeasured]] is: molecule concentration, [[measurementTechnique]] could be: "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the [[variableMeasured]] is "depression rating", the [[measurementTechnique]] could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".   If there are several [[variableMeasured]] properties recorded for some given data object, use a [[PropertyValue]] for each [[variableMeasured]] and attach the corresponding [[measurementTechnique]]. The value can also be from an enumeration, organized as a [[MeasurementMetholdEnumeration]].',
            'minValue' => 'The lower value of some characteristic or property.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'propertyID' => 'A commonly used identifier for the characteristic represented by the property, e.g. a manufacturer or a standard code for a property. propertyID can be (1) a prefixed string, mainly meant to be used with standards for product properties; (2) a site-specific, non-prefixed string (e.g. the primary key of the property or the vendor-specific ID of the property), or (3) a URL indicating the type of the property, either pointing to an external vocabulary, or a Web resource that describes the property (e.g. a glossary entry). Standards bodies should promote a standard prefix for the identifiers of properties from their standards.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
            'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for <a href=\'unitCode\'>unitCode</a>.',
            'url' => 'URL of the item.',
            'validFrom' => 'The date when the item becomes valid.',
            'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
            'value' => 'The value of a [[QuantitativeValue]] (including [[Observation]]) or property value node.  * For [[QuantitativeValue]] and [[MonetaryAmount]], the recommended type for values is \'Number\'. * For [[PropertyValue]], it can be \'Text\', \'Number\', \'Boolean\', or \'StructuredValue\'. * Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similar Unicode symbols. * Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
            'valueReference' => 'A secondary value that provides additional information on the original value, e.g. a reference temperature or a type of measurement.',
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
