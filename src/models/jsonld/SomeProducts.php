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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v14.0-release
 * SomeProducts - A placeholder for multiple similar products of the same kind.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SomeProducts
 */
class SomeProducts extends MetaJsonLd implements SomeProductsInterface, ProductInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'SomeProducts';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/SomeProducts';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
A placeholder for multiple similar products of the same kind.
SCHEMADESC;

    use SomeProductsTrait;
    use ProductTrait;
    use ThingTrait;

    // Public methods
    // =========================================================================

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
            'additionalProperty' => ['PropertyValue'],
            'additionalType' => ['URL'],
            'aggregateRating' => ['AggregateRating'],
            'alternateName' => ['Text'],
            'audience' => ['Audience'],
            'award' => ['Text'],
            'awards' => ['Text'],
            'brand' => ['Organization', 'Brand'],
            'category' => ['URL', 'Text', 'PhysicalActivityCategory', 'Thing', 'CategoryCode'],
            'color' => ['Text'],
            'countryOfAssembly' => ['Text'],
            'countryOfLastProcessing' => ['Text'],
            'countryOfOrigin' => ['Country'],
            'depth' => ['Distance', 'QuantitativeValue'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'funding' => ['Grant'],
            'gtin' => ['Text'],
            'gtin12' => ['Text'],
            'gtin13' => ['Text'],
            'gtin14' => ['Text'],
            'gtin8' => ['Text'],
            'hasAdultConsideration' => ['AdultOrientedEnumeration'],
            'hasEnergyConsumptionDetails' => ['EnergyConsumptionDetails'],
            'hasMeasurement' => ['QuantitativeValue'],
            'hasMerchantReturnPolicy' => ['MerchantReturnPolicy'],
            'height' => ['Distance', 'QuantitativeValue'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'inProductGroupWithID' => ['Text'],
            'inventoryLevel' => ['QuantitativeValue'],
            'isAccessoryOrSparePartFor' => ['Product'],
            'isConsumableFor' => ['Product'],
            'isFamilyFriendly' => ['Boolean'],
            'isRelatedTo' => ['Service', 'Product'],
            'isSimilarTo' => ['Service', 'Product'],
            'isVariantOf' => ['ProductModel', 'ProductGroup'],
            'itemCondition' => ['OfferItemCondition'],
            'keywords' => ['DefinedTerm', 'Text', 'URL'],
            'logo' => ['URL', 'ImageObject'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'manufacturer' => ['Organization'],
            'material' => ['Text', 'URL', 'Product'],
            'model' => ['ProductModel', 'Text'],
            'mpn' => ['Text'],
            'name' => ['Text'],
            'nsn' => ['Text'],
            'offers' => ['Offer', 'Demand'],
            'pattern' => ['DefinedTerm', 'Text'],
            'potentialAction' => ['Action'],
            'productID' => ['Text'],
            'productionDate' => ['Date'],
            'purchaseDate' => ['Date'],
            'releaseDate' => ['Date'],
            'review' => ['Review'],
            'reviews' => ['Review'],
            'sameAs' => ['URL'],
            'size' => ['QuantitativeValue', 'DefinedTerm', 'Text', 'SizeSpecification'],
            'sku' => ['Text'],
            'slogan' => ['Text'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'url' => ['URL'],
            'weight' => ['QuantitativeValue'],
            'width' => ['QuantitativeValue', 'Distance']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'award' => 'An award won by or for this item.',
            'awards' => 'Awards won by or for this item.',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'color' => 'The color of the product.',
            'countryOfAssembly' => 'The place where the product was assembled.',
            'countryOfLastProcessing' => 'The place where the item (typically [[Product]]) was last processed and tested before importation.',
            'countryOfOrigin' => 'The country of origin of something, including products as well as creative  works such as movie and TV content.  In the case of TV and movie, this would be the country of the principle offices of the production company or individual responsible for the movie. For other kinds of [[CreativeWork]] it is difficult to provide fully general guidance, and properties such as [[contentLocation]] and [[locationCreated]] may be more applicable.  In the case of products, the country of origin of the product. The exact interpretation of this may vary by context and product type, and cannot be fully enumerated here.',
            'depth' => 'The depth of the item.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'gtin' => 'A Global Trade Item Number ([GTIN](https://www.gs1.org/standards/id-keys/gtin)). GTINs identify trade items, including products and services, using numeric identification codes. The [[gtin]] property generalizes the earlier [[gtin8]], [[gtin12]], [[gtin13]], and [[gtin14]] properties. The GS1 [digital link specifications](https://www.gs1.org/standards/Digital-Link/) express GTINs as URLs. A correct [[gtin]] value should be a valid GTIN, which means that it should be an all-numeric string of either 8, 12, 13 or 14 digits, or a "GS1 Digital Link" URL based on such a string. The numeric component should also have a [valid GS1 check digit](https://www.gs1.org/services/check-digit-calculator) and meet the other rules for valid GTINs. See also [GS1\'s GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) and [Wikipedia](https://en.wikipedia.org/wiki/Global_Trade_Item_Number) for more details. Left-padding of the gtin values is not required or encouraged.    ',
            'gtin12' => 'The GTIN-12 code of the product, or the product to which the offer refers. The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C. Company Prefix, Item Reference, and Check Digit used to identify trade items. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin13' => 'The GTIN-13 code of the product, or the product to which the offer refers. This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit UPC codes can be converted into a GTIN-13 code by simply adding a preceding zero. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin14' => 'The GTIN-14 code of the product, or the product to which the offer refers. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin8' => 'The GTIN-8 code of the product, or the product to which the offer refers. This code is also known as EAN/UCC-8 or 8-digit EAN. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'hasAdultConsideration' => 'Used to tag an item to be intended or suitable for consumption or use by adults only.',
            'hasEnergyConsumptionDetails' => 'Defines the energy efficiency Category (also known as "class" or "rating") for a product according to an international energy efficiency standard.',
            'hasMeasurement' => 'A product measurement, for example the inseam of pants, the wheel size of a bicycle, or the gauge of a screw. Usually an exact measurement, but can also be a range of measurements for adjustable products, for example belts and ski bindings.',
            'hasMerchantReturnPolicy' => 'Specifies a MerchantReturnPolicy that may be applicable.',
            'height' => 'The height of the item.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inProductGroupWithID' => 'Indicates the [[productGroupID]] for a [[ProductGroup]] that this product [[isVariantOf]]. ',
            'inventoryLevel' => 'The current approximate inventory level for the item or items.',
            'isAccessoryOrSparePartFor' => 'A pointer to another product (or multiple products) for which this product is an accessory or spare part.',
            'isConsumableFor' => 'A pointer to another product (or multiple products) for which this product is a consumable.',
            'isFamilyFriendly' => 'Indicates whether this content is family friendly.',
            'isRelatedTo' => 'A pointer to another, somehow related product (or multiple products).',
            'isSimilarTo' => 'A pointer to another, functionally similar product (or multiple products).',
            'isVariantOf' => 'Indicates the kind of product that this is a variant of. In the case of [[ProductModel]], this is a pointer (from a ProductModel) to a base product from which this product is a variant. It is safe to infer that the variant inherits all product features from the base model, unless defined locally. This is not transitive. In the case of a [[ProductGroup]], the group description also serves as a template, representing a set of Products that vary on explicitly defined, specific dimensions only (so it defines both a set of variants, as well as which values distinguish amongst those variants). When used with [[ProductGroup]], this property can apply to any [[Product]] included in the group.',
            'itemCondition' => 'A predefined value from OfferItemCondition specifying the condition of the product or service, or the products or services included in the offer. Also used for product return policies to specify the condition of products accepted for returns.',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'logo' => 'An associated logo.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'manufacturer' => 'The manufacturer of the product.',
            'material' => 'A material that something is made from, e.g. leather, wool, cotton, paper.',
            'model' => 'The model of the product. Use with the URL of a ProductModel or a textual representation of the model identifier. The URL of the ProductModel can be from an external source. It is recommended to additionally provide strong product identifiers via the gtin8/gtin13/gtin14 and mpn properties.',
            'mpn' => 'The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers.',
            'name' => 'The name of the item.',
            'nsn' => 'Indicates the [NATO stock number](https://en.wikipedia.org/wiki/NATO_Stock_Number) (nsn) of a [[Product]]. ',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'pattern' => 'A pattern that something has, for example \'polka dot\', \'striped\', \'Canadian flag\'. Values are typically expressed as text, although links to controlled value schemes are also supported.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'productID' => 'The product identifier, such as ISBN. For example: ``` meta itemprop="productID" content="isbn:123-456-789" ```.',
            'productionDate' => 'The date of production of the item, e.g. vehicle.',
            'purchaseDate' => 'The date the item e.g. vehicle was purchased by the current owner.',
            'releaseDate' => 'The release date of a product or product model. This can be used to distinguish the exact variant of a product.',
            'review' => 'A review of the item.',
            'reviews' => 'Review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'size' => 'A standardized size of a product or creative work, specified either through a simple textual string (for example \'XL\', \'32Wx34L\'), a  QuantitativeValue with a unitCode, or a comprehensive and structured [[SizeSpecification]]; in other cases, the [[width]], [[height]], [[depth]] and [[weight]] properties may be more applicable. ',
            'sku' => 'The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.',
            'slogan' => 'A slogan or motto associated with the item.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
            'weight' => 'The weight of the product or person.',
            'width' => 'The width of the item.'
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
            [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
