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
 * Trait for UnitPriceSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/UnitPriceSpecification
 */
trait UnitPriceSpecificationTrait
{
    /**
     * Identifies a price component (for example, a line item on an invoice), part
     * of the total price for an offer.
     *
     * @var array|PriceComponentTypeEnumeration|PriceComponentTypeEnumeration[]
     */
    public $priceComponentType;

    /**
     * This property specifies the minimal quantity and rounding increment that
     * will be the basis for the billing. The unit of measurement is specified by
     * the unitCode property.
     *
     * @var float|array|Number|Number[]
     */
    public $billingIncrement;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for <a href='unitCode'>unitCode</a>.
     *
     * @var string|array|Text|Text[]
     */
    public $unitText;

    /**
     * Defines the type of a price specified for an offered product, for example a
     * list price, a (temporary) sale price or a manufacturer suggested retail
     * price. If multiple prices are specified for an offer the [[priceType]]
     * property can be used to identify the type of each such specified price. The
     * value of priceType can be specified as a value from enumeration
     * PriceTypeEnumeration or as a free form text string for price types that are
     * not already predefined in PriceTypeEnumeration.
     *
     * @var string|array|PriceTypeEnumeration|PriceTypeEnumeration[]|array|Text|Text[]
     */
    public $priceType;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $unitCode;

    /**
     * Specifies for how long this price (or price component) will be billed. Can
     * be used, for example, to model the contractual duration of a subscription
     * or payment plan. Type can be either a Duration or a Number (in which case
     * the unit of measurement, for example month, is specified by the unitCode
     * property).
     *
     * @var float|array|Duration|Duration[]|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $billingDuration;

    /**
     * Specifies after how much time this price (or price component) becomes valid
     * and billing starts. Can be used, for example, to model a price increase
     * after the first year of a subscription. The unit of measurement is
     * specified by the unitCode property.
     *
     * @var float|array|Number|Number[]
     */
    public $billingStart;

    /**
     * The reference quantity for which a certain price applies, e.g. 1 EUR per 4
     * kWh of electricity. This property is a replacement for unitOfMeasurement
     * for the advanced cases where the price does not relate to a standard unit.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $referenceQuantity;
}
