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
 * Trait for SizeSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SizeSpecification
 */
trait SizeSpecificationTrait
{
    /**
     * A measurement of an item, For example, the inseam of pants, the wheel size
     * of a bicycle, the gauge of a screw, or the carbon footprint measured for
     * certification by an authority. Usually an exact measurement, but can also
     * be a range of measurements for adjustable products, for example belts and
     * ski bindings.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $hasMeasurement;

    /**
     * The age or age range for the intended audience or person, for example 3-12
     * months for infants, 1-5 years for toddlers.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $suggestedAge;

    /**
     * The size system used to identify a product's size. Typically either a
     * standard (for example, "GS1" or "ISO-EN13402"), country code (for example
     * "US" or "JP"), or a measuring system (for example "Metric" or "Imperial").
     *
     * @var string|array|Text|Text[]|array|SizeSystemEnumeration|SizeSystemEnumeration[]
     */
    public $sizeSystem;

    /**
     * The size group (also known as "size type") for a product's size. Size
     * groups are common in the fashion industry to define size segments and
     * suggested audiences for wearable products. Multiple values can be combined,
     * for example "men's big and tall", "petite maternity" or "regular".
     *
     * @var string|array|Text|Text[]|array|SizeGroupEnumeration|SizeGroupEnumeration[]
     */
    public $sizeGroup;

    /**
     * The suggested gender of the intended person or audience, for example
     * "male", "female", or "unisex".
     *
     * @var string|array|GenderType|GenderType[]|array|Text|Text[]
     */
    public $suggestedGender;

    /**
     * A suggested range of body measurements for the intended audience or person,
     * for example inseam between 32 and 34 inches or height between 170 and 190
     * cm. Typically found on a size chart for wearable products.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $suggestedMeasurement;
}
