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
 * schema.org version: v26.0-release
 * Trait for QuantitativeValue.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/QuantitativeValue
 */
trait QuantitativeValueTrait
{
    /**
     * The lower value of some characteristic or property.
     *
     * @var float|array|Number|Number[]
     */
    public $minValue;

    /**
     * A property-value pair representing an additional characteristic of the
     * entity, e.g. a product feature or another characteristic for which there is
     * no matching property in schema.org.  Note: Publishers should be aware that
     * applications designed to use specific schema.org properties (e.g.
     * https://schema.org/width, https://schema.org/color,
     * https://schema.org/gtin13, ...) will typically expect such data to be
     * provided using those properties, rather than using the generic
     * property/value mechanism.
     *
     * @var array|PropertyValue|PropertyValue[]
     */
    public $additionalProperty;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for <a href='unitCode'>unitCode</a>.
     *
     * @var string|array|Text|Text[]
     */
    public $unitText;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $unitCode;

    /**
     * A secondary value that provides additional information on the original
     * value, e.g. a reference temperature or a type of measurement.
     *
     * @var string|array|QualitativeValue|QualitativeValue[]|array|Text|Text[]|array|Enumeration|Enumeration[]|array|QuantitativeValue|QuantitativeValue[]|array|DefinedTerm|DefinedTerm[]|array|MeasurementTypeEnumeration|MeasurementTypeEnumeration[]|array|StructuredValue|StructuredValue[]|array|PropertyValue|PropertyValue[]
     */
    public $valueReference;

    /**
     * The upper value of some characteristic or property.
     *
     * @var float|array|Number|Number[]
     */
    public $maxValue;

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
     * @var float|string|bool|array|StructuredValue|StructuredValue[]|array|Number|Number[]|array|Text|Text[]|array|Boolean|Boolean[]
     */
    public $value;
}
