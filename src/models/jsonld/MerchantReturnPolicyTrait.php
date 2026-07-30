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
 * Trait for MerchantReturnPolicy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MerchantReturnPolicy
 */
trait MerchantReturnPolicyTrait
{
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
     * A country where a particular merchant return policy applies to, for example
     * the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|array|Country|Country[]|array|Text|Text[]
     */
    public $applicableCountry;

    /**
     * The type of return fees if the product is returned due to customer remorse.
     *
     * @var array|ReturnFeesEnumeration|ReturnFeesEnumeration[]
     */
    public $customerRemorseReturnFees;

    /**
     * The method (from an enumeration) by which the customer obtains a return
     * shipping label for a product returned due to customer remorse.
     *
     * @var array|ReturnLabelSourceEnumeration|ReturnLabelSourceEnumeration[]
     */
    public $customerRemorseReturnLabelSource;

    /**
     * The amount of shipping costs if a product is returned due to customer
     * remorse. Applicable when property [[customerRemorseReturnFees]] equals
     * [[ReturnShippingFees]].
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $customerRemorseReturnShippingFeesAmount;

    /**
     * Are in-store returns offered? (For more advanced return methods use the
     * [[returnMethod]] property.)
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $inStoreReturnsOffered;

    /**
     * A predefined value from OfferItemCondition specifying the condition of the
     * product or service, or the products or services included in the offer. Also
     * used for product return policies to specify the condition of products
     * accepted for returns.
     *
     * @var array|OfferItemCondition|OfferItemCondition[]
     */
    public $itemCondition;

    /**
     * The type of return fees for returns of defect products.
     *
     * @var array|ReturnFeesEnumeration|ReturnFeesEnumeration[]
     */
    public $itemDefectReturnFees;

    /**
     * The method (from an enumeration) by which the customer obtains a return
     * shipping label for a defect product.
     *
     * @var array|ReturnLabelSourceEnumeration|ReturnLabelSourceEnumeration[]
     */
    public $itemDefectReturnLabelSource;

    /**
     * Amount of shipping costs for defect product returns. Applicable when
     * property [[itemDefectReturnFees]] equals [[ReturnShippingFees]].
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $itemDefectReturnShippingFeesAmount;

    /**
     * Specifies either a fixed return date or the number of days (from the
     * delivery date) that a product can be returned. Used when the
     * [[returnPolicyCategory]] property is specified as
     * [[MerchantReturnFiniteReturnWindow]].
     *
     * @var int|array|Date|Date[]|array|DateTime|DateTime[]|array|Integer|Integer[]
     */
    public $merchantReturnDays;

    /**
     * Specifies a Web page or service by URL, for product returns.
     *
     * @var array|URL|URL[]
     */
    public $merchantReturnLink;

    /**
     * A refund type, from an enumerated list.
     *
     * @var array|RefundTypeEnumeration|RefundTypeEnumeration[]
     */
    public $refundType;

    /**
     * Use [[MonetaryAmount]] to specify a fixed restocking fee for product
     * returns, or use [[Number]] to specify a percentage of the product price
     * paid by the customer.
     *
     * @var float|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $restockingFee;

    /**
     * The type of return fees for purchased products (for any return reason).
     *
     * @var array|ReturnFeesEnumeration|ReturnFeesEnumeration[]
     */
    public $returnFees;

    /**
     * The method (from an enumeration) by which the customer obtains a return
     * shipping label for a product returned for any reason.
     *
     * @var array|ReturnLabelSourceEnumeration|ReturnLabelSourceEnumeration[]
     */
    public $returnLabelSource;

    /**
     * The type of return method offered, specified from an enumeration.
     *
     * @var array|ReturnMethodEnumeration|ReturnMethodEnumeration[]
     */
    public $returnMethod;

    /**
     * Specifies an applicable return policy (from an enumeration).
     *
     * @var array|MerchantReturnEnumeration|MerchantReturnEnumeration[]
     */
    public $returnPolicyCategory;

    /**
     * The country where the product has to be sent to for returns, for example
     * "Ireland" using the [[name]] property of [[Country]]. You can also provide
     * the two-letter [ISO 3166-1 alpha-2 country
     * code](http://en.wikipedia.org/wiki/ISO_3166-1). Note that this can be
     * different from the country where the product was originally shipped from or
     * sent to.
     *
     * @var string|array|Country|Country[]|array|Text|Text[]
     */
    public $returnPolicyCountry;

    /**
     * Seasonal override of a return policy.
     *
     * @var array|MerchantReturnPolicySeasonalOverride|MerchantReturnPolicySeasonalOverride[]
     */
    public $returnPolicySeasonalOverride;

    /**
     * Amount of shipping costs for product returns (for any reason). Applicable
     * when property [[returnFees]] equals [[ReturnShippingFees]].
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $returnShippingFeesAmount;

    /**
     * The membership program tier(s) an Offer (or a PriceSpecification,
     * OfferShippingDetails, or MerchantReturnPolicy under an Offer) is valid for.
     *
     * @var array|MemberProgramTier|MemberProgramTier[]
     */
    public $validForMemberTier;
}
