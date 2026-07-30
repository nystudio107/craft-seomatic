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

/**
 * schema.org version: v30.0
 * Trait for PropertyValue.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PropertyValue
 */
trait PropertyValueTrait
{
    /**
     * The upper value of some characteristic or property.
     *
     * @var float|array|Number|Number[]
     */
    public $maxValue;

    /**
     * A subproperty of [[measurementTechnique]] that can be used for specifying
     * specific methods, in particular via [[MeasurementMethodEnum]].
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|MeasurementMethodEnum|MeasurementMethodEnum[]|array|Text|Text[]|array|URL|URL[]
     */
    public $measurementMethod;

    /**
     * A technique, method or technology used in an [[Observation]],
     * [[StatisticalVariable]] or [[Dataset]] (or [[DataDownload]],
     * [[DataCatalog]]), corresponding to the method used for measuring the
     * corresponding variable(s) (for datasets, described using
     * [[variableMeasured]]; for [[Observation]], a [[StatisticalVariable]]).
     * Often but not necessarily each [[variableMeasured]] will have an explicit
     * representation as (or mapping to) an property such as those defined in
     * Schema.org, or other RDF vocabularies and "knowledge graphs". In that case
     * the subproperty of [[variableMeasured]] called [[measuredProperty]] is
     * applicable.      The [[measurementTechnique]] property helps when extra
     * clarification is needed about how a [[measuredProperty]] was measured. This
     * is oriented towards scientific and scholarly dataset publication but may
     * have broader applicability; it is not intended as a full representation of
     * measurement, but can often serve as a high level summary for dataset
     * discovery.   For example, if [[variableMeasured]] is: molecule
     * concentration, [[measurementTechnique]] could be: "mass spectrometry" or
     * "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the
     * [[variableMeasured]] is "depression rating", the [[measurementTechnique]]
     * could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".   If there
     * are several [[variableMeasured]] properties recorded for some given data
     * object, use a [[PropertyValue]] for each [[variableMeasured]] and attach
     * the corresponding [[measurementTechnique]]. The value can also be from an
     * enumeration, organized as a [[MeasurementMethodEnum]].
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|MeasurementMethodEnum|MeasurementMethodEnum[]|array|Text|Text[]|array|URL|URL[]
     */
    public $measurementTechnique;

    /**
     * The lower value of some characteristic or property.
     *
     * @var float|array|Number|Number[]
     */
    public $minValue;

    /**
     * A commonly used identifier for the characteristic represented by the
     * property, e.g. a manufacturer or a standard code for a property. propertyID
     * can be (1) a prefixed string, mainly meant to be used with standards for
     * product properties; (2) a site-specific, non-prefixed string (e.g. the
     * primary key of the property or the vendor-specific ID of the property), or
     * (3) a URL indicating the type of the property, either pointing to an
     * external vocabulary, or a Web resource that describes the property (e.g. a
     * glossary entry). Standards bodies should promote a standard prefix for the
     * identifiers of properties from their standards.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $propertyID;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $unitCode;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for <a href='unitCode'>unitCode</a>.
     *
     * @var string|array|Text|Text[]
     */
    public $unitText;

    /**
     * The value of a [[QuantitativeValue]] (including [[Observation]]) or
     * property value node.  * For [[QuantitativeValue]] and [[MonetaryAmount]],
     * the recommended type for values is 'Number'. * For [[PropertyValue]], it
     * can be 'Text', 'Number', 'Boolean', or 'StructuredValue'. * Use values from
     * 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather
     * than superficially similar Unicode symbols. * Use '.' (Unicode 'FULL STOP'
     * (U+002E)) rather than ',' to indicate a decimal point. Avoid using these
     * symbols as a readability separator.
     *
     * @var bool|float|string|array|Boolean|Boolean[]|array|Number|Number[]|array|StructuredValue|StructuredValue[]|array|Text|Text[]
     */
    public $value;

    /**
     * A secondary value that provides additional information on the original
     * value, e.g. a reference temperature or a type of measurement.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Enumeration|Enumeration[]|array|MeasurementTypeEnumeration|MeasurementTypeEnumeration[]|array|PropertyValue|PropertyValue[]|array|QualitativeValue|QualitativeValue[]|array|QuantitativeValue|QuantitativeValue[]|array|StructuredValue|StructuredValue[]|array|Text|Text[]
     */
    public $valueReference;
}
