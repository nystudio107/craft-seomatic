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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v26.0-release
 * Demand - A demand entity represents the public, not necessarily binding, not
 * necessarily exclusive, announcement by an organization or person to seek a
 * certain type of goods or services. For describing demand using this type,
 * the very same properties used for Offer apply.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Demand
 */
class Demand extends MetaJsonLd implements DemandInterface, IntangibleInterface, ThingInterface
{
    use DemandTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'Demand';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/Demand';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'A demand entity represents the public, not necessarily binding, not necessarily exclusive, announcement by an organization or person to seek a certain type of goods or services. For describing demand using this type, the very same properties used for Offer apply.';


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [
            'acceptedPaymentMethod' => ['array', 'LoanOrCredit', 'LoanOrCredit[]', 'array', 'PaymentMethod', 'PaymentMethod[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'advanceBookingRequirement' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'areaServed' => ['array', 'Text', 'Text[]', 'array', 'Place', 'Place[]', 'array', 'AdministrativeArea', 'AdministrativeArea[]', 'array', 'GeoShape', 'GeoShape[]'],
            'asin' => ['array', 'URL', 'URL[]', 'array', 'Text', 'Text[]'],
            'availability' => ['array', 'ItemAvailability', 'ItemAvailability[]'],
            'availabilityEnds' => ['array', 'Time', 'Time[]', 'array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'availabilityStarts' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]', 'array', 'Time', 'Time[]'],
            'availableAtOrFrom' => ['array', 'Place', 'Place[]'],
            'availableDeliveryMethod' => ['array', 'DeliveryMethod', 'DeliveryMethod[]'],
            'businessFunction' => ['array', 'BusinessFunction', 'BusinessFunction[]'],
            'deliveryLeadTime' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'eligibleCustomerType' => ['array', 'BusinessEntityType', 'BusinessEntityType[]'],
            'eligibleDuration' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'eligibleQuantity' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'eligibleRegion' => ['array', 'GeoShape', 'GeoShape[]', 'array', 'Text', 'Text[]', 'array', 'Place', 'Place[]'],
            'eligibleTransactionVolume' => ['array', 'PriceSpecification', 'PriceSpecification[]'],
            'gtin' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'gtin12' => ['array', 'Text', 'Text[]'],
            'gtin13' => ['array', 'Text', 'Text[]'],
            'gtin14' => ['array', 'Text', 'Text[]'],
            'gtin8' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'includesObject' => ['array', 'TypeAndQuantityNode', 'TypeAndQuantityNode[]'],
            'ineligibleRegion' => ['array', 'Text', 'Text[]', 'array', 'Place', 'Place[]', 'array', 'GeoShape', 'GeoShape[]'],
            'inventoryLevel' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'itemCondition' => ['array', 'OfferItemCondition', 'OfferItemCondition[]'],
            'itemOffered' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Trip', 'Trip[]', 'array', 'MenuItem', 'MenuItem[]', 'array', 'Event', 'Event[]', 'array', 'Product', 'Product[]', 'array', 'AggregateOffer', 'AggregateOffer[]', 'array', 'Service', 'Service[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'mpn' => ['array', 'Text', 'Text[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'priceSpecification' => ['array', 'PriceSpecification', 'PriceSpecification[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'seller' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'serialNumber' => ['array', 'Text', 'Text[]'],
            'sku' => ['array', 'Text', 'Text[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'validFrom' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'validThrough' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'warranty' => ['array', 'WarrantyPromise', 'WarrantyPromise[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'acceptedPaymentMethod' => 'The payment method(s) accepted by seller for this offer.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'advanceBookingRequirement' => 'The amount of time that is required between accepting the offer and the actual usage of the resource or service.',
            'alternateName' => 'An alias for the item.',
            'areaServed' => 'The geographic area where a service or offered item is provided.',
            'asin' => 'An Amazon Standard Identification Number (ASIN) is a 10-character alphanumeric unique identifier assigned by Amazon.com and its partners for product identification within the Amazon organization (summary from [Wikipedia](https://en.wikipedia.org/wiki/Amazon_Standard_Identification_Number)\'s article).  Note also that this is a definition for how to include ASINs in Schema.org data, and not a definition of ASINs in general - see documentation from Amazon for authoritative details. ASINs are most commonly encoded as text strings, but the [asin] property supports URL/URI as potential values too.',
            'availability' => 'The availability of this item—for example In stock, Out of stock, Pre-order, etc.',
            'availabilityEnds' => 'The end of the availability of the product or service included in the offer.',
            'availabilityStarts' => 'The beginning of the availability of the product or service included in the offer.',
            'availableAtOrFrom' => 'The place(s) from which the offer can be obtained (e.g. store locations).',
            'availableDeliveryMethod' => 'The delivery method(s) available for this offer.',
            'businessFunction' => 'The business function (e.g. sell, lease, repair, dispose) of the offer or component of a bundle (TypeAndQuantityNode). The default is http://purl.org/goodrelations/v1#Sell.',
            'deliveryLeadTime' => 'The typical delay between the receipt of the order and the goods either leaving the warehouse or being prepared for pickup, in case the delivery method is on site pickup.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'eligibleCustomerType' => 'The type(s) of customers for which the given offer is valid.',
            'eligibleDuration' => 'The duration for which the given offer is valid.',
            'eligibleQuantity' => 'The interval and unit of measurement of ordering quantities for which the offer or price specification is valid. This allows e.g. specifying that a certain freight charge is valid only for a certain quantity.',
            'eligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is valid.  See also [[ineligibleRegion]].     ',
            'eligibleTransactionVolume' => 'The transaction volume, in a monetary unit, for which the offer or price specification is valid, e.g. for indicating a minimal purchasing volume, to express free shipping above a certain order volume, or to limit the acceptance of credit cards to purchases to a certain minimal amount.',
            'gtin' => 'A Global Trade Item Number ([GTIN](https://www.gs1.org/standards/id-keys/gtin)). GTINs identify trade items, including products and services, using numeric identification codes.  The GS1 [digital link specifications](https://www.gs1.org/standards/Digital-Link/) express GTINs as URLs (URIs, IRIs, etc.). Details including regular expression examples can be found in, Section 6 of the GS1 URI Syntax specification; see also [schema.org tracking issue](https://github.com/schemaorg/schemaorg/issues/3156#issuecomment-1209522809) for schema.org-specific discussion. A correct [[gtin]] value should be a valid GTIN, which means that it should be an all-numeric string of either 8, 12, 13 or 14 digits, or a "GS1 Digital Link" URL based on such a string. The numeric component should also have a [valid GS1 check digit](https://www.gs1.org/services/check-digit-calculator) and meet the other rules for valid GTINs. See also [GS1\'s GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) and [Wikipedia](https://en.wikipedia.org/wiki/Global_Trade_Item_Number) for more details. Left-padding of the gtin values is not required or encouraged. The [[gtin]] property generalizes the earlier [[gtin8]], [[gtin12]], [[gtin13]], and [[gtin14]] properties.  Note also that this is a definition for how to include GTINs in Schema.org data, and not a definition of GTINs in general - see the GS1 documentation for authoritative details.',
            'gtin12' => 'The GTIN-12 code of the product, or the product to which the offer refers. The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C. Company Prefix, Item Reference, and Check Digit used to identify trade items. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin13' => 'The GTIN-13 code of the product, or the product to which the offer refers. This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit UPC codes can be converted into a GTIN-13 code by simply adding a preceding zero. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin14' => 'The GTIN-14 code of the product, or the product to which the offer refers. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin8' => 'The GTIN-8 code of the product, or the product to which the offer refers. This code is also known as EAN/UCC-8 or 8-digit EAN. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'includesObject' => 'This links to a node or nodes indicating the exact quantity of the products included in  an [[Offer]] or [[ProductCollection]].',
            'ineligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is not valid, e.g. a region where the transaction is not allowed.  See also [[eligibleRegion]].       ',
            'inventoryLevel' => 'The current approximate inventory level for the item or items.',
            'itemCondition' => 'A predefined value from OfferItemCondition specifying the condition of the product or service, or the products or services included in the offer. Also used for product return policies to specify the condition of products accepted for returns.',
            'itemOffered' => 'An item being offered (or demanded). The transactional nature of the offer or demand is documented using [[businessFunction]], e.g. sell, lease etc. While several common expected types are listed explicitly in this definition, others can be used. Using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'mpn' => 'The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'priceSpecification' => 'One or more detailed price specifications, indicating the unit price and delivery or payment charges.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seller' => 'An entity which offers (sells / leases / lends / loans) the services / goods.  A seller may also be a provider.',
            'serialNumber' => 'The serial number or any alphanumeric identifier of a particular product. When attached to an offer, it is a shortcut for the serial number of the product included in the offer.',
            'sku' => 'The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
            'validFrom' => 'The date when the item becomes valid.',
            'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
            'warranty' => 'The warranty promise(s) included in the offer.',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRequiredSchema(): array
    {
        return ['description', 'name'];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRecommendedSchema(): array
    {
        return ['image', 'url'];
    }


    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules = array_merge($rules, [
                [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
                [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);

        return $rules;
    }
}
