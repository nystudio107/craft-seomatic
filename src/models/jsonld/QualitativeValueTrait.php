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
 * Trait for QualitativeValue.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/QualitativeValue
 */
trait QualitativeValueTrait
{
    /**
     * This ordering relation for qualitative values indicates that the subject is
     * lesser than or equal to the object.
     *
     * @var array|QualitativeValue|QualitativeValue[]
     */
    public $lesserOrEqual;

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
     * This ordering relation for qualitative values indicates that the subject is
     * greater than the object.
     *
     * @var array|QualitativeValue|QualitativeValue[]
     */
    public $greater;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * greater than or equal to the object.
     *
     * @var array|QualitativeValue|QualitativeValue[]
     */
    public $greaterOrEqual;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * lesser than the object.
     *
     * @var array|QualitativeValue|QualitativeValue[]
     */
    public $lesser;

    /**
     * A secondary value that provides additional information on the original
     * value, e.g. a reference temperature or a type of measurement.
     *
     * @var string|array|QualitativeValue|QualitativeValue[]|array|Text|Text[]|array|Enumeration|Enumeration[]|array|QuantitativeValue|QuantitativeValue[]|array|DefinedTerm|DefinedTerm[]|array|MeasurementTypeEnumeration|MeasurementTypeEnumeration[]|array|StructuredValue|StructuredValue[]|array|PropertyValue|PropertyValue[]
     */
    public $valueReference;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * not equal to the object.
     *
     * @var array|QualitativeValue|QualitativeValue[]
     */
    public $nonEqual;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * equal to the object.
     *
     * @var array|QualitativeValue|QualitativeValue[]
     */
    public $equal;
}
