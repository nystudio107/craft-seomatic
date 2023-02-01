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

/**
 * schema.org version: v15.0-release
 * Trait for PropertyValue.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PropertyValue
 */
trait PropertyValueTrait
{
    /**
     * The value of the quantitative value or property value node.  * For
     * [[QuantitativeValue]] and [[MonetaryAmount]], the recommended type for
     * values is 'Number'. * For [[PropertyValue]], it can be 'Text', 'Number',
     * 'Boolean', or 'StructuredValue'. * Use values from 0123456789 (Unicode
     * 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially
     * similar Unicode symbols. * Use '.' (Unicode 'FULL STOP' (U+002E)) rather
     * than ',' to indicate a decimal point. Avoid using these symbols as a
     * readability separator.
     *
     * @var string|bool|float|StructuredValue|Text|Boolean|Number
     */
    public $value;

    /**
     * A secondary value that provides additional information on the original
     * value, e.g. a reference temperature or a type of measurement.
     *
     * @var string|Enumeration|QualitativeValue|DefinedTerm|StructuredValue|PropertyValue|Text|MeasurementTypeEnumeration|QuantitativeValue
     */
    public $valueReference;

    /**
     * A technique or technology used in a [[Dataset]] (or [[DataDownload]],
     * [[DataCatalog]]), corresponding to the method used for measuring the
     * corresponding variable(s) (described using [[variableMeasured]]). This is
     * oriented towards scientific and scholarly dataset publication but may have
     * broader applicability; it is not intended as a full representation of
     * measurement, but rather as a high level summary for dataset discovery.  For
     * example, if [[variableMeasured]] is: molecule concentration,
     * [[measurementTechnique]] could be: "mass spectrometry" or "nmr
     * spectroscopy" or "colorimetry" or "immunofluorescence".  If the
     * [[variableMeasured]] is "depression rating", the [[measurementTechnique]]
     * could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".  If there
     * are several [[variableMeasured]] properties recorded for some given data
     * object, use a [[PropertyValue]] for each [[variableMeasured]] and attach
     * the corresponding [[measurementTechnique]].
     *
     * @var string|URL|Text
     */
    public $measurementTechnique;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var string|Text|URL
     */
    public $unitCode;

    /**
     * The upper value of some characteristic or property.
     *
     * @var float|Number
     */
    public $maxValue;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for <a href='unitCode'>unitCode</a>.
     *
     * @var string|Text
     */
    public $unitText;

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
     * @var string|Text|URL
     */
    public $propertyID;

    /**
     * The lower value of some characteristic or property.
     *
     * @var float|Number
     */
    public $minValue;
}
