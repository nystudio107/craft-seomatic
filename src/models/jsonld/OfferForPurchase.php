<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Offer;

/**
 * OfferForPurchase - An OfferForPurchase in Schema.org represents an Offer to
 * sell something, i.e. an Offer whose businessFunction is sell. See Good
 * Relations for background on the underlying concepts.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/OfferForPurchase
 */
class OfferForPurchase extends Offer
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OfferForPurchase';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OfferForPurchase';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An OfferForPurchase in Schema.org represents an Offer to sell something, i.e. an Offer whose businessFunction is sell. See Good Relations for background on the underlying concepts.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Offer';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'acceptedPaymentMethod',
        'addOn',
        'advanceBookingRequirement',
        'aggregateRating',
        'areaServed',
        'availability',
        'availabilityEnds',
        'availabilityStarts',
        'availableAtOrFrom',
        'availableDeliveryMethod',
        'businessFunction',
        'category',
        'deliveryLeadTime',
        'eligibleCustomerType',
        'eligibleDuration',
        'eligibleQuantity',
        'eligibleRegion',
        'eligibleTransactionVolume',
        'gtin',
        'gtin12',
        'gtin13',
        'gtin14',
        'gtin8',
        'includesObject',
        'ineligibleRegion',
        'inventoryLevel',
        'itemCondition',
        'itemOffered',
        'leaseLength',
        'mpn',
        'offeredBy',
        'price',
        'priceCurrency',
        'priceSpecification',
        'priceValidUntil',
        'review',
        'seller',
        'serialNumber',
        'sku',
        'validFrom',
        'validThrough',
        'warranty'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'acceptedPaymentMethod' => ['LoanOrCredit', 'PaymentMethod'],
        'addOn' => ['Offer'],
        'advanceBookingRequirement' => ['QuantitativeValue'],
        'aggregateRating' => ['AggregateRating'],
        'areaServed' => ['AdministrativeArea', 'GeoShape', 'Place', 'Text'],
        'availability' => ['ItemAvailability'],
        'availabilityEnds' => ['Date', 'DateTime', 'Time'],
        'availabilityStarts' => ['Date', 'DateTime', 'Time'],
        'availableAtOrFrom' => ['Place'],
        'availableDeliveryMethod' => ['DeliveryMethod'],
        'businessFunction' => ['BusinessFunction'],
        'category' => ['PhysicalActivityCategory', 'Text', 'Thing'],
        'deliveryLeadTime' => ['QuantitativeValue'],
        'eligibleCustomerType' => ['BusinessEntityType'],
        'eligibleDuration' => ['QuantitativeValue'],
        'eligibleQuantity' => ['QuantitativeValue'],
        'eligibleRegion' => ['GeoShape', 'Place', 'Text'],
        'eligibleTransactionVolume' => ['PriceSpecification'],
        'gtin' => ['Text'],
        'gtin12' => ['Text'],
        'gtin13' => ['Text'],
        'gtin14' => ['Text'],
        'gtin8' => ['Text'],
        'includesObject' => ['TypeAndQuantityNode'],
        'ineligibleRegion' => ['GeoShape', 'Place', 'Text'],
        'inventoryLevel' => ['QuantitativeValue'],
        'itemCondition' => ['OfferItemCondition'],
        'itemOffered' => ['AggregateOffer', 'CreativeWork', 'Event', 'MenuItem', 'Product', 'Service', 'Trip'],
        'leaseLength' => ['Duration', 'QuantitativeValue'],
        'mpn' => ['Text'],
        'offeredBy' => ['Organization', 'Person'],
        'price' => ['Number', 'Text'],
        'priceCurrency' => ['Text'],
        'priceSpecification' => ['PriceSpecification'],
        'priceValidUntil' => ['Date'],
        'review' => ['Review'],
        'seller' => ['Organization', 'Person'],
        'serialNumber' => ['Text'],
        'sku' => ['Text'],
        'validFrom' => ['Date', 'DateTime'],
        'validThrough' => ['Date', 'DateTime'],
        'warranty' => ['WarrantyPromise']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'acceptedPaymentMethod' => 'The payment method(s) accepted by seller for this offer.',
        'addOn' => 'An additional offer that can only be obtained in combination with the first base offer (e.g. supplements and extensions that are available for a surcharge).',
        'advanceBookingRequirement' => 'The amount of time that is required between accepting the offer and the actual usage of the resource or service.',
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'areaServed' => 'The geographic area where a service or offered item is provided. Supersedes serviceArea.',
        'availability' => 'The availability of this item—for example In stock, Out of stock, Pre-order, etc.',
        'availabilityEnds' => 'The end of the availability of the product or service included in the offer.',
        'availabilityStarts' => 'The beginning of the availability of the product or service included in the offer.',
        'availableAtOrFrom' => 'The place(s) from which the offer can be obtained (e.g. store locations).',
        'availableDeliveryMethod' => 'The delivery method(s) available for this offer.',
        'businessFunction' => 'The business function (e.g. sell, lease, repair, dispose) of the offer or component of a bundle (TypeAndQuantityNode). The default is http://purl.org/goodrelations/v1#Sell.',
        'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
        'deliveryLeadTime' => 'The typical delay between the receipt of the order and the goods either leaving the warehouse or being prepared for pickup, in case the delivery method is on site pickup.',
        'eligibleCustomerType' => 'The type(s) of customers for which the given offer is valid.',
        'eligibleDuration' => 'The duration for which the given offer is valid.',
        'eligibleQuantity' => 'The interval and unit of measurement of ordering quantities for which the offer or price specification is valid. This allows e.g. specifying that a certain freight charge is valid only for a certain quantity.',
        'eligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is valid. See also ineligibleRegion.',
        'eligibleTransactionVolume' => 'The transaction volume, in a monetary unit, for which the offer or price specification is valid, e.g. for indicating a minimal purchasing volume, to express free shipping above a certain order volume, or to limit the acceptance of credit cards to purchases to a certain minimal amount.',
        'gtin' => 'A Global Trade Item Number (GTIN). GTINs identify trade items, including products and services, using numeric identification codes. The gtin property generalizes the earlier gtin8, gtin12, gtin13, and gtin14 properties. The GS1 digital link specifications express GTINs as URLs. A correct gtin value should be a valid GTIN, which means that it should be an all-numeric string of either 8, 12, 13 or 14 digits, or a "GS1 Digital Link" URL based on such a string. The numeric component should also have a valid GS1 check digit and meet the other rules for valid GTINs. See also GS1\'s GTIN Summary and Wikipedia for more details. Left-padding of the gtin values is not required or encouraged.',
        'gtin12' => 'The GTIN-12 code of the product, or the product to which the offer refers. The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C. Company Prefix, Item Reference, and Check Digit used to identify trade items. See GS1 GTIN Summary for more details.',
        'gtin13' => 'The GTIN-13 code of the product, or the product to which the offer refers. This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit UPC codes can be converted into a GTIN-13 code by simply adding a preceeding zero. See GS1 GTIN Summary for more details.',
        'gtin14' => 'The GTIN-14 code of the product, or the product to which the offer refers. See GS1 GTIN Summary for more details.',
        'gtin8' => 'The GTIN-8 code of the product, or the product to which the offer refers. This code is also known as EAN/UCC-8 or 8-digit EAN. See GS1 GTIN Summary for more details.',
        'includesObject' => 'This links to a node or nodes indicating the exact quantity of the products included in the offer.',
        'ineligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is not valid, e.g. a region where the transaction is not allowed. See also eligibleRegion.',
        'inventoryLevel' => 'The current approximate inventory level for the item or items.',
        'itemCondition' => 'A predefined value from OfferItemCondition or a textual description of the condition of the product or service, or the products or services included in the offer.',
        'itemOffered' => 'An item being offered (or demanded). The transactional nature of the offer or demand is documented using businessFunction, e.g. sell, lease etc. While several common expected types are listed explicitly in this definition, others can be used. Using a second type, such as Product or a subtype of Product, can clarify the nature of the offer. Inverse property: offers.',
        'leaseLength' => 'Length of the lease for some Accommodation, either particular to some Offer or in some cases intrinsic to the property.',
        'mpn' => 'The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers.',
        'offeredBy' => 'A pointer to the organization or person making the offer. Inverse property: makesOffer.',
        'price' => 'The offer price of a product, or of a price component when attached to PriceSpecification and its subtypes. Usage guidelines: Use the priceCurrency property (with standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR") instead of including ambiguous symbols such as \'$\' in the value. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator. Note that both RDFa and Microdata syntax allow the use of a "content=" attribute for publishing simple machine-readable values alongside more human-friendly formatting. Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols.',
        'priceCurrency' => 'The currency of the price, or a price component when attached to PriceSpecification and its subtypes. Use standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR".',
        'priceSpecification' => 'One or more detailed price specifications, indicating the unit price and delivery or payment charges.',
        'priceValidUntil' => 'The date after which the price is no longer available.',
        'review' => 'A review of the item. Supersedes reviews.',
        'seller' => 'An entity which offers (sells / leases / lends / loans) the services / goods. A seller may also be a provider. Supersedes merchant, vendor.',
        'serialNumber' => 'The serial number or any alphanumeric identifier of a particular product. When attached to an offer, it is a shortcut for the serial number of the product included in the offer.',
        'sku' => 'The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.',
        'validFrom' => 'The date when the item becomes valid.',
        'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
        'warranty' => 'The warranty promise(s) included in the offer. Supersedes warrantyPromise.'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];
    /**
     * The payment method(s) accepted by seller for this offer.
     *
     * @var mixed|LoanOrCredit|PaymentMethod [schema.org types: LoanOrCredit, PaymentMethod]
     */
    public $acceptedPaymentMethod;
    /**
     * An additional offer that can only be obtained in combination with the first
     * base offer (e.g. supplements and extensions that are available for a
     * surcharge).
     *
     * @var Offer [schema.org types: Offer]
     */
    public $addOn;
    /**
     * The amount of time that is required between accepting the offer and the
     * actual usage of the resource or service.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $advanceBookingRequirement;
    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;
    /**
     * The geographic area where a service or offered item is provided. Supersedes
     * serviceArea.
     *
     * @var mixed|AdministrativeArea|GeoShape|Place|string [schema.org types: AdministrativeArea, GeoShape, Place, Text]
     */
    public $areaServed;
    /**
     * The availability of this item—for example In stock, Out of stock,
     * Pre-order, etc.
     *
     * @var ItemAvailability [schema.org types: ItemAvailability]
     */
    public $availability;
    /**
     * The end of the availability of the product or service included in the
     * offer.
     *
     * @var mixed|Date|DateTime|Time [schema.org types: Date, DateTime, Time]
     */
    public $availabilityEnds;
    /**
     * The beginning of the availability of the product or service included in the
     * offer.
     *
     * @var mixed|Date|DateTime|Time [schema.org types: Date, DateTime, Time]
     */
    public $availabilityStarts;
    /**
     * The place(s) from which the offer can be obtained (e.g. store locations).
     *
     * @var Place [schema.org types: Place]
     */
    public $availableAtOrFrom;
    /**
     * The delivery method(s) available for this offer.
     *
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $availableDeliveryMethod;
    /**
     * The business function (e.g. sell, lease, repair, dispose) of the offer or
     * component of a bundle (TypeAndQuantityNode). The default is
     * http://purl.org/goodrelations/v1#Sell.
     *
     * @var BusinessFunction [schema.org types: BusinessFunction]
     */
    public $businessFunction;
    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var mixed|PhysicalActivityCategory|string|Thing [schema.org types: PhysicalActivityCategory, Text, Thing]
     */
    public $category;
    /**
     * The typical delay between the receipt of the order and the goods either
     * leaving the warehouse or being prepared for pickup, in case the delivery
     * method is on site pickup.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $deliveryLeadTime;
    /**
     * The type(s) of customers for which the given offer is valid.
     *
     * @var BusinessEntityType [schema.org types: BusinessEntityType]
     */
    public $eligibleCustomerType;
    /**
     * The duration for which the given offer is valid.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $eligibleDuration;
    /**
     * The interval and unit of measurement of ordering quantities for which the
     * offer or price specification is valid. This allows e.g. specifying that a
     * certain freight charge is valid only for a certain quantity.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $eligibleQuantity;
    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid. See also ineligibleRegion.
     *
     * @var mixed|GeoShape|Place|string [schema.org types: GeoShape, Place, Text]
     */
    public $eligibleRegion;
    /**
     * The transaction volume, in a monetary unit, for which the offer or price
     * specification is valid, e.g. for indicating a minimal purchasing volume, to
     * express free shipping above a certain order volume, or to limit the
     * acceptance of credit cards to purchases to a certain minimal amount.
     *
     * @var PriceSpecification [schema.org types: PriceSpecification]
     */
    public $eligibleTransactionVolume;
    /**
     * A Global Trade Item Number (GTIN). GTINs identify trade items, including
     * products and services, using numeric identification codes. The gtin
     * property generalizes the earlier gtin8, gtin12, gtin13, and gtin14
     * properties. The GS1 digital link specifications express GTINs as URLs. A
     * correct gtin value should be a valid GTIN, which means that it should be an
     * all-numeric string of either 8, 12, 13 or 14 digits, or a "GS1 Digital
     * Link" URL based on such a string. The numeric component should also have a
     * valid GS1 check digit and meet the other rules for valid GTINs. See also
     * GS1's GTIN Summary and Wikipedia for more details. Left-padding of the gtin
     * values is not required or encouraged.
     *
     * @var string [schema.org types: Text]
     */
    public $gtin;
    /**
     * The GTIN-12 code of the product, or the product to which the offer refers.
     * The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C.
     * Company Prefix, Item Reference, and Check Digit used to identify trade
     * items. See GS1 GTIN Summary for more details.
     *
     * @var string [schema.org types: Text]
     */
    public $gtin12;
    /**
     * The GTIN-13 code of the product, or the product to which the offer refers.
     * This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit
     * UPC codes can be converted into a GTIN-13 code by simply adding a
     * preceeding zero. See GS1 GTIN Summary for more details.
     *
     * @var string [schema.org types: Text]
     */
    public $gtin13;
    /**
     * The GTIN-14 code of the product, or the product to which the offer refers.
     * See GS1 GTIN Summary for more details.
     *
     * @var string [schema.org types: Text]
     */
    public $gtin14;
    /**
     * The GTIN-8 code of the product, or the product to which the offer refers.
     * This code is also known as EAN/UCC-8 or 8-digit EAN. See GS1 GTIN Summary
     * for more details.
     *
     * @var string [schema.org types: Text]
     */
    public $gtin8;
    /**
     * This links to a node or nodes indicating the exact quantity of the products
     * included in the offer.
     *
     * @var TypeAndQuantityNode [schema.org types: TypeAndQuantityNode]
     */
    public $includesObject;
    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed. See also eligibleRegion.
     *
     * @var mixed|GeoShape|Place|string [schema.org types: GeoShape, Place, Text]
     */
    public $ineligibleRegion;
    /**
     * The current approximate inventory level for the item or items.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $inventoryLevel;
    /**
     * A predefined value from OfferItemCondition or a textual description of the
     * condition of the product or service, or the products or services included
     * in the offer.
     *
     * @var OfferItemCondition [schema.org types: OfferItemCondition]
     */
    public $itemCondition;
    /**
     * An item being offered (or demanded). The transactional nature of the offer
     * or demand is documented using businessFunction, e.g. sell, lease etc. While
     * several common expected types are listed explicitly in this definition,
     * others can be used. Using a second type, such as Product or a subtype of
     * Product, can clarify the nature of the offer. Inverse property: offers.
     *
     * @var mixed|AggregateOffer|CreativeWork|Event|MenuItem|Product|Service|Trip [schema.org types: AggregateOffer, CreativeWork, Event, MenuItem, Product, Service, Trip]
     */
    public $itemOffered;
    /**
     * Length of the lease for some Accommodation, either particular to some Offer
     * or in some cases intrinsic to the property.
     *
     * @var mixed|Duration|QuantitativeValue [schema.org types: Duration, QuantitativeValue]
     */
    public $leaseLength;
    /**
     * The Manufacturer Part Number (MPN) of the product, or the product to which
     * the offer refers.
     *
     * @var string [schema.org types: Text]
     */
    public $mpn;
    /**
     * A pointer to the organization or person making the offer. Inverse property:
     * makesOffer.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $offeredBy;
    /**
     * The offer price of a product, or of a price component when attached to
     * PriceSpecification and its subtypes. Usage guidelines: Use the
     * priceCurrency property (with standard formats: ISO 4217 currency format
     * e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names
     * for Local Exchange Tradings Systems (LETS) and other currency types e.g.
     * "Ithaca HOUR") instead of including ambiguous symbols such as '$' in the
     * value. Use '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to indicate a
     * decimal point. Avoid using these symbols as a readability separator. Note
     * that both RDFa and Microdata syntax allow the use of a "content=" attribute
     * for publishing simple machine-readable values alongside more human-friendly
     * formatting. Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to
     * 'DIGIT NINE' (U+0039)) rather than superficially similiar Unicode symbols.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $price;
    /**
     * The currency of the price, or a price component when attached to
     * PriceSpecification and its subtypes. Use standard formats: ISO 4217
     * currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC";
     * well known names for Local Exchange Tradings Systems (LETS) and other
     * currency types e.g. "Ithaca HOUR".
     *
     * @var string [schema.org types: Text]
     */
    public $priceCurrency;
    /**
     * One or more detailed price specifications, indicating the unit price and
     * delivery or payment charges.
     *
     * @var PriceSpecification [schema.org types: PriceSpecification]
     */
    public $priceSpecification;
    /**
     * The date after which the price is no longer available.
     *
     * @var Date [schema.org types: Date]
     */
    public $priceValidUntil;
    /**
     * A review of the item. Supersedes reviews.
     *
     * @var Review [schema.org types: Review]
     */
    public $review;
    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods. A seller may also be a provider. Supersedes merchant, vendor.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $seller;

    // Static Protected Properties
    // =========================================================================
    /**
     * The serial number or any alphanumeric identifier of a particular product.
     * When attached to an offer, it is a shortcut for the serial number of the
     * product included in the offer.
     *
     * @var string [schema.org types: Text]
     */
    public $serialNumber;
    /**
     * The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a
     * product or service, or the product to which the offer refers.
     *
     * @var string [schema.org types: Text]
     */
    public $sku;
    /**
     * The date when the item becomes valid.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $validFrom;
    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $validThrough;
    /**
     * The warranty promise(s) included in the offer. Supersedes warrantyPromise.
     *
     * @var WarrantyPromise [schema.org types: WarrantyPromise]
     */
    public $warranty;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['acceptedPaymentMethod', 'addOn', 'advanceBookingRequirement', 'aggregateRating', 'areaServed', 'availability', 'availabilityEnds', 'availabilityStarts', 'availableAtOrFrom', 'availableDeliveryMethod', 'businessFunction', 'category', 'deliveryLeadTime', 'eligibleCustomerType', 'eligibleDuration', 'eligibleQuantity', 'eligibleRegion', 'eligibleTransactionVolume', 'gtin', 'gtin12', 'gtin13', 'gtin14', 'gtin8', 'includesObject', 'ineligibleRegion', 'inventoryLevel', 'itemCondition', 'itemOffered', 'leaseLength', 'mpn', 'offeredBy', 'price', 'priceCurrency', 'priceSpecification', 'priceValidUntil', 'review', 'seller', 'serialNumber', 'sku', 'validFrom', 'validThrough', 'warranty'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
