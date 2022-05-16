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

/**
 * schema.org version: v14.0-release
 * Trait for QualitativeValue.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/QualitativeValue
 */

trait QualitativeValueTrait
{
    
    /**
     * A secondary value that provides additional information on the original
     * value, e.g. a reference temperature or a type of measurement.
     *
     * @var string|Enumeration|DefinedTerm|Text|MeasurementTypeEnumeration|QualitativeValue|StructuredValue|PropertyValue|QuantitativeValue
     */
    public $valueReference;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * greater than or equal to the object.
     *
     * @var QualitativeValue
     */
    public $greaterOrEqual;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * not equal to the object.
     *
     * @var QualitativeValue
     */
    public $nonEqual;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * equal to the object.
     *
     * @var QualitativeValue
     */
    public $equal;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * lesser than the object.
     *
     * @var QualitativeValue
     */
    public $lesser;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * greater than the object.
     *
     * @var QualitativeValue
     */
    public $greater;

    /**
     * A property-value pair representing an additional characteristics of the
     * entitity, e.g. a product feature or another characteristic for which there
     * is no matching property in schema.org.  Note: Publishers should be aware
     * that applications designed to use specific schema.org properties (e.g.
     * https://schema.org/width, https://schema.org/color,
     * https://schema.org/gtin13, ...) will typically expect such data to be
     * provided using those properties, rather than using the generic
     * property/value mechanism. 
     *
     * @var PropertyValue
     */
    public $additionalProperty;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * lesser than or equal to the object.
     *
     * @var QualitativeValue
     */
    public $lesserOrEqual;

}
