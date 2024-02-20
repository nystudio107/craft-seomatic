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
 * Trait for Demand.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Demand
 */
trait DemandTrait
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
     * The current approximate inventory level for the item or items.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $inventoryLevel;
}
