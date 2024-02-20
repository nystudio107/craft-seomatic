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
 * Trait for Offer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Offer
 */
trait OfferTrait
{
    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid.  See also [[ineligibleRegion]].
     *
     * @var string|array|GeoShape|GeoShape[]|array|Text|Text[]|array|Place|Place[]
     */
    public $eligibleRegion;

    /**
     * The GTIN-14 code of the product, or the product to which the offer refers.
     * See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin)
     * for more details.
     *
     * @var string|array|Text|Text[]
     */
    public $gtin14;

    /**
     * The beginning of the availability of the product or service included in the
     * offer.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $availabilityStarts;

    /**
     * The currency of the price, or a price component when attached to
     * [[PriceSpecification]] and its subtypes.  Use standard formats: [ISO 4217
     * currency format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD";
     * [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR".
     *
     * @var string|array|Text|Text[]
     */
    public $priceCurrency;

    /**
     * A review of the item.
     *
     * @var array|Review|Review[]
     */
    public $review;

    /**
     * The warranty promise(s) included in the offer.
     *
     * @var array|WarrantyPromise|WarrantyPromise[]
     */
    public $warranty;

    /**
     * The interval and unit of measurement of ordering quantities for which the
     * offer or price specification is valid. This allows e.g. specifying that a
     * certain freight charge is valid only for a certain quantity.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $eligibleQuantity;

    /**
     * A pointer to the organization or person making the offer.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $offeredBy;

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
     * The typical delay between the receipt of the order and the goods either
     * leaving the warehouse or being prepared for pickup, in case the delivery
     * method is on site pickup.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $deliveryLeadTime;

    /**
     * The amount of time that is required between accepting the offer and the
     * actual usage of the resource or service.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $advanceBookingRequirement;

    /**
     * The place(s) from which the offer can be obtained (e.g. store locations).
     *
     * @var array|Place|Place[]
     */
    public $availableAtOrFrom;

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
     * The offer price of a product, or of a price component when attached to
     * PriceSpecification and its subtypes.  Usage guidelines:  * Use the
     * [[priceCurrency]] property (with standard formats: [ISO 4217 currency
     * format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker
     * symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for
     * cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading
     * Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system)
     * (LETS) and other currency types, e.g. "Ithaca HOUR") instead of including
     * [ambiguous
     * symbols](http://en.wikipedia.org/wiki/Dollar_sign#Currencies_that_use_the_dollar_or_peso_sign)
     * such as '$' in the value. * Use '.' (Unicode 'FULL STOP' (U+002E)) rather
     * than ',' to indicate a decimal point. Avoid using these symbols as a
     * readability separator. * Note that both
     * [RDFa](http://www.w3.org/TR/xhtml-rdfa-primer/#using-the-content-attribute)
     * and Microdata syntax allow the use of a "content=" attribute for publishing
     * simple machine-readable values alongside more human-friendly formatting. *
     * Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE'
     * (U+0039)) rather than superficially similar Unicode symbols.
     *
     * @var string|float|array|Text|Text[]|array|Number|Number[]
     */
    public $price;

    /**
     * The date after which the price is no longer available.
     *
     * @var array|Date|Date[]
     */
    public $priceValidUntil;

    /**
     * The GTIN-12 code of the product, or the product to which the offer refers.
     * The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C.
     * Company Prefix, Item Reference, and Check Digit used to identify trade
     * items. See [GS1 GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more
     * details.
     *
     * @var string|array|Text|Text[]
     */
    public $gtin12;

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
     * Review of the item.
     *
     * @var array|Review|Review[]
     */
    public $reviews;

    /**
     * The transaction volume, in a monetary unit, for which the offer or price
     * specification is valid, e.g. for indicating a minimal purchasing volume, to
     * express free shipping above a certain order volume, or to limit the
     * acceptance of credit cards to purchases to a certain minimal amount.
     *
     * @var array|PriceSpecification|PriceSpecification[]
     */
    public $eligibleTransactionVolume;

    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|array|Text|Text[]|array|Place|Place[]|array|AdministrativeArea|AdministrativeArea[]|array|GeoShape|GeoShape[]
     */
    public $areaServed;

    /**
     * The serial number or any alphanumeric identifier of a particular product.
     * When attached to an offer, it is a shortcut for the serial number of the
     * product included in the offer.
     *
     * @var string|array|Text|Text[]
     */
    public $serialNumber;

    /**
     * Specifies a MerchantReturnPolicy that may be applicable.
     *
     * @var array|MerchantReturnPolicy|MerchantReturnPolicy[]
     */
    public $hasMerchantReturnPolicy;

    /**
     * Indicates whether this content is family friendly.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isFamilyFriendly;

    /**
     * This links to a node or nodes indicating the exact quantity of the products
     * included in  an [[Offer]] or [[ProductCollection]].
     *
     * @var array|TypeAndQuantityNode|TypeAndQuantityNode[]
     */
    public $includesObject;

    /**
     * The end of the availability of the product or service included in the
     * offer.
     *
     * @var array|Time|Time[]|array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $availabilityEnds;

    /**
     * Indicates information about the shipping policies and options associated
     * with an [[Offer]].
     *
     * @var array|OfferShippingDetails|OfferShippingDetails[]
     */
    public $shippingDetails;

    /**
     * The date when the item becomes valid.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validFrom;

    /**
     * An item being offered (or demanded). The transactional nature of the offer
     * or demand is documented using [[businessFunction]], e.g. sell, lease etc.
     * While several common expected types are listed explicitly in this
     * definition, others can be used. Using a second type, such as Product or a
     * subtype of Product, can clarify the nature of the offer.
     *
     * @var array|CreativeWork|CreativeWork[]|array|Trip|Trip[]|array|MenuItem|MenuItem[]|array|Event|Event[]|array|Product|Product[]|array|AggregateOffer|AggregateOffer[]|array|Service|Service[]
     */
    public $itemOffered;

    /**
     * Used to tag an item to be intended or suitable for consumption or use by
     * adults only.
     *
     * @var array|AdultOrientedEnumeration|AdultOrientedEnumeration[]
     */
    public $hasAdultConsideration;

    /**
     * The [[mobileUrl]] property is provided for specific situations in which
     * data consumers need to determine whether one of several provided URLs is a
     * dedicated 'mobile site'.  To discourage over-use, and reflecting intial
     * usecases, the property is expected only on [[Product]] and [[Offer]],
     * rather than [[Thing]]. The general trend in web technology is towards
     * [responsive design](https://en.wikipedia.org/wiki/Responsive_web_design) in
     * which content can be flexibly adapted to a wide range of browsing
     * environments. Pages and sites referenced with the long-established [[url]]
     * property should ideally also be usable on a wide variety of devices,
     * including mobile phones. In most cases, it would be pointless and counter
     * productive to attempt to update all [[url]] markup to use [[mobileUrl]] for
     * more mobile-oriented pages. The property is intended for the case when
     * items (primarily [[Product]] and [[Offer]]) have extra URLs hosted on an
     * additional "mobile site" alongside the main one. It should not be taken as
     * an endorsement of this publication style.
     *
     * @var string|array|Text|Text[]
     */
    public $mobileUrl;

    /**
     * The Manufacturer Part Number (MPN) of the product, or the product to which
     * the offer refers.
     *
     * @var string|array|Text|Text[]
     */
    public $mpn;

    /**
     * The payment method(s) accepted by seller for this offer.
     *
     * @var array|LoanOrCredit|LoanOrCredit[]|array|PaymentMethod|PaymentMethod[]
     */
    public $acceptedPaymentMethod;

    /**
     * One or more detailed price specifications, indicating the unit price and
     * delivery or payment charges.
     *
     * @var array|PriceSpecification|PriceSpecification[]
     */
    public $priceSpecification;

    /**
     * A URL template (RFC 6570) for a checkout page for an offer. This approach
     * allows merchants to specify a URL for online checkout of the offered
     * product, by interpolating parameters such as the logged in user ID, product
     * ID, quantity, discount code etc. Parameter naming and standardization are
     * not specified here.
     *
     * @var string|array|Text|Text[]
     */
    public $checkoutPageURLTemplate;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Thing|Thing[]
     */
    public $category;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validThrough;

    /**
     * A Global Trade Item Number
     * ([GTIN](https://www.gs1.org/standards/id-keys/gtin)). GTINs identify trade
     * items, including products and services, using numeric identification codes.
     *  The GS1 [digital link
     * specifications](https://www.gs1.org/standards/Digital-Link/) express GTINs
     * as URLs (URIs, IRIs, etc.). Details including regular expression examples
     * can be found in, Section 6 of the GS1 URI Syntax specification; see also
     * [schema.org tracking
     * issue](https://github.com/schemaorg/schemaorg/issues/3156#issuecomment-1209522809)
     * for schema.org-specific discussion. A correct [[gtin]] value should be a
     * valid GTIN, which means that it should be an all-numeric string of either
     * 8, 12, 13 or 14 digits, or a "GS1 Digital Link" URL based on such a string.
     * The numeric component should also have a [valid GS1 check
     * digit](https://www.gs1.org/services/check-digit-calculator) and meet the
     * other rules for valid GTINs. See also [GS1's GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) and
     * [Wikipedia](https://en.wikipedia.org/wiki/Global_Trade_Item_Number) for
     * more details. Left-padding of the gtin values is not required or
     * encouraged. The [[gtin]] property generalizes the earlier [[gtin8]],
     * [[gtin12]], [[gtin13]], and [[gtin14]] properties.  Note also that this is
     * a definition for how to include GTINs in Schema.org data, and not a
     * definition of GTINs in general - see the GS1 documentation for
     * authoritative details.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $gtin;

    /**
     * The GTIN-13 code of the product, or the product to which the offer refers.
     * This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit
     * UPC codes can be converted into a GTIN-13 code by simply adding a preceding
     * zero. See [GS1 GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more
     * details.
     *
     * @var string|array|Text|Text[]
     */
    public $gtin13;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods.  A seller may also be a provider.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $seller;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed.  See also [[eligibleRegion]].
     *
     * @var string|array|Text|Text[]|array|Place|Place[]|array|GeoShape|GeoShape[]
     */
    public $ineligibleRegion;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var array|AggregateRating|AggregateRating[]
     */
    public $aggregateRating;

    /**
     * The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a
     * product or service, or the product to which the offer refers.
     *
     * @var string|array|Text|Text[]
     */
    public $sku;

    /**
     * The business function (e.g. sell, lease, repair, dispose) of the offer or
     * component of a bundle (TypeAndQuantityNode). The default is
     * http://purl.org/goodrelations/v1#Sell.
     *
     * @var array|BusinessFunction|BusinessFunction[]
     */
    public $businessFunction;

    /**
     * The delivery method(s) available for this offer.
     *
     * @var array|DeliveryMethod|DeliveryMethod[]
     */
    public $availableDeliveryMethod;

    /**
     * The duration for which the given offer is valid.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $eligibleDuration;

    /**
     * The GTIN-8 code of the product, or the product to which the offer refers.
     * This code is also known as EAN/UCC-8 or 8-digit EAN. See [GS1 GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more
     * details.
     *
     * @var string|array|Text|Text[]
     */
    public $gtin8;

    /**
     * The availability of this item—for example In stock, Out of stock,
     * Pre-order, etc.
     *
     * @var array|ItemAvailability|ItemAvailability[]
     */
    public $availability;

    /**
     * The type(s) of customers for which the given offer is valid.
     *
     * @var array|BusinessEntityType|BusinessEntityType[]
     */
    public $eligibleCustomerType;

    /**
     * An Amazon Standard Identification Number (ASIN) is a 10-character
     * alphanumeric unique identifier assigned by Amazon.com and its partners for
     * product identification within the Amazon organization (summary from
     * [Wikipedia](https://en.wikipedia.org/wiki/Amazon_Standard_Identification_Number)'s
     * article).  Note also that this is a definition for how to include ASINs in
     * Schema.org data, and not a definition of ASINs in general - see
     * documentation from Amazon for authoritative details. ASINs are most
     * commonly encoded as text strings, but the [asin] property supports URL/URI
     * as potential values too.
     *
     * @var string|array|URL|URL[]|array|Text|Text[]
     */
    public $asin;

    /**
     * Length of the lease for some [[Accommodation]], either particular to some
     * [[Offer]] or in some cases intrinsic to the property.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Duration|Duration[]
     */
    public $leaseLength;

    /**
     * An additional offer that can only be obtained in combination with the first
     * base offer (e.g. supplements and extensions that are available for a
     * surcharge).
     *
     * @var array|Offer|Offer[]
     */
    public $addOn;

    /**
     * The current approximate inventory level for the item or items.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $inventoryLevel;
}
