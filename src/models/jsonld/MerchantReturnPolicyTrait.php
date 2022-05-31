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
 * Trait for MerchantReturnPolicy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MerchantReturnPolicy
 */

trait MerchantReturnPolicyTrait
{
    
    /**
     * Specifies an applicable return policy (from an enumeration).
     *
     * @var MerchantReturnEnumeration
     */
    public $returnPolicyCategory;

    /**
     * The country where the product has to be sent to for returns, for example
     * "Ireland" using the [[name]] property of [[Country]]. You can also provide
     * the two-letter [ISO 3166-1 alpha-2 country
     * code](http://en.wikipedia.org/wiki/ISO_3166-1). Note that this can be
     * different from the country where the product was originally shipped from or
     * sent too.
     *
     * @var string|Country|Text
     */
    public $returnPolicyCountry;

    /**
     * Specifies a Web page or service by URL, for product returns.
     *
     * @var URL
     */
    public $merchantReturnLink;

    /**
     * Use [[MonetaryAmount]] to specify a fixed restocking fee for product
     * returns, or use [[Number]] to specify a percentage of the product price
     * paid by the customer.
     *
     * @var float|MonetaryAmount|Number
     */
    public $restockingFee;

    /**
     * Amount of shipping costs for defect product returns. Applicable when
     * property [[itemDefectReturnFees]] equals [[ReturnShippingFees]].
     *
     * @var MonetaryAmount
     */
    public $itemDefectReturnShippingFeesAmount;

    /**
     * The type of return fees for returns of defect products.
     *
     * @var ReturnFeesEnumeration
     */
    public $itemDefectReturnFees;

    /**
     * Are in-store returns offered? (for more advanced return methods use the
     * [[returnMethod]] property)
     *
     * @var bool|Boolean
     */
    public $inStoreReturnsOffered;

    /**
     * A predefined value from OfferItemCondition specifying the condition of the
     * product or service, or the products or services included in the offer. Also
     * used for product return policies to specify the condition of products
     * accepted for returns.
     *
     * @var OfferItemCondition
     */
    public $itemCondition;

    /**
     * The method (from an enumeration) by which the customer obtains a return
     * shipping label for a defect product.
     *
     * @var ReturnLabelSourceEnumeration
     */
    public $itemDefectReturnLabelSource;

    /**
     * The method (from an enumeration) by which the customer obtains a return
     * shipping label for a product returned for any reason.
     *
     * @var ReturnLabelSourceEnumeration
     */
    public $returnLabelSource;

    /**
     * The amount of shipping costs if a product is returned due to customer
     * remorse. Applicable when property [[customerRemorseReturnFees]] equals
     * [[ReturnShippingFees]].
     *
     * @var MonetaryAmount
     */
    public $customerRemorseReturnShippingFeesAmount;

    /**
     * A refund type, from an enumerated list.
     *
     * @var RefundTypeEnumeration
     */
    public $refundType;

    /**
     * Amount of shipping costs for product returns (for any reason). Applicable
     * when property [[returnFees]] equals [[ReturnShippingFees]].
     *
     * @var MonetaryAmount
     */
    public $returnShippingFeesAmount;

    /**
     * Specifies either a fixed return date or the number of days (from the
     * delivery date) that a product can be returned. Used when the
     * [[returnPolicyCategory]] property is specified as
     * [[MerchantReturnFiniteReturnWindow]].
     *
     * @var int|DateTime|Integer|Date
     */
    public $merchantReturnDays;

    /**
     * The type of return method offered, specified from an enumeration.
     *
     * @var ReturnMethodEnumeration
     */
    public $returnMethod;

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
     * The method (from an enumeration) by which the customer obtains a return
     * shipping label for a product returned due to customer remorse.
     *
     * @var ReturnLabelSourceEnumeration
     */
    public $customerRemorseReturnLabelSource;

    /**
     * The type of return fees if the product is returned due to customer remorse.
     *
     * @var ReturnFeesEnumeration
     */
    public $customerRemorseReturnFees;

    /**
     * Seasonal override of a return policy.
     *
     * @var MerchantReturnPolicySeasonalOverride
     */
    public $returnPolicySeasonalOverride;

    /**
     * A country where a particular merchant return policy applies to, for example
     * the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|Text|Country
     */
    public $applicableCountry;

    /**
     * The type of return fees for purchased products (for any return reason)
     *
     * @var ReturnFeesEnumeration
     */
    public $returnFees;

}
