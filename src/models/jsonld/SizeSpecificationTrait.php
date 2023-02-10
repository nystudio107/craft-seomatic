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
 * Trait for SizeSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SizeSpecification
 */
trait SizeSpecificationTrait
{
    /**
     * A product measurement, for example the inseam of pants, the wheel size of a
     * bicycle, or the gauge of a screw. Usually an exact measurement, but can
     * also be a range of measurements for adjustable products, for example belts
     * and ski bindings.
     *
     * @var QuantitativeValue
     */
    public $hasMeasurement;

    /**
     * A suggested range of body measurements for the intended audience or person,
     * for example inseam between 32 and 34 inches or height between 170 and 190
     * cm. Typically found on a size chart for wearable products.
     *
     * @var QuantitativeValue
     */
    public $suggestedMeasurement;

    /**
     * The size system used to identify a product's size. Typically either a
     * standard (for example, "GS1" or "ISO-EN13402"), country code (for example
     * "US" or "JP"), or a measuring system (for example "Metric" or "Imperial").
     *
     * @var string|Text|SizeSystemEnumeration
     */
    public $sizeSystem;

    /**
     * The size group (also known as "size type") for a product's size. Size
     * groups are common in the fashion industry to define size segments and
     * suggested audiences for wearable products. Multiple values can be combined,
     * for example "men's big and tall", "petite maternity" or "regular"
     *
     * @var string|SizeGroupEnumeration|Text
     */
    public $sizeGroup;

    /**
     * The suggested gender of the intended person or audience, for example
     * "male", "female", or "unisex".
     *
     * @var string|GenderType|Text
     */
    public $suggestedGender;

    /**
     * The age or age range for the intended audience or person, for example 3-12
     * months for infants, 1-5 years for toddlers.
     *
     * @var QuantitativeValue
     */
    public $suggestedAge;
}
