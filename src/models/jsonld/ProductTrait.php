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
 * Trait for Product.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Product
 */

trait ProductTrait
{
    
    /**
     * A pointer to another product (or multiple products) for which this product
     * is an accessory or spare part.
     *
     * @var Product
     */
    public $isAccessoryOrSparePartFor;

    /**
     * Used to tag an item to be intended or suitable for consumption or use by
     * adults only.
     *
     * @var AdultOrientedEnumeration
     */
    public $hasAdultConsideration;

    /**
     * The GTIN-12 code of the product, or the product to which the offer refers.
     * The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C.
     * Company Prefix, Item Reference, and Check Digit used to identify trade
     * items. See [GS1 GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more
     * details.
     *
     * @var string|Text
     */
    public $gtin12;

    /**
     * Indicates the [NATO stock
     * number](https://en.wikipedia.org/wiki/NATO_Stock_Number) (nsn) of a
     * [[Product]]. 
     *
     * @var string|Text
     */
    public $nsn;

    /**
     * A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @var string|Text|URL|Product
     */
    public $material;

    /**
     * A review of the item.
     *
     * @var Review
     */
    public $review;

    /**
     * An award won by or for this item.
     *
     * @var string|Text
     */
    public $award;

    /**
     * The width of the item.
     *
     * @var QuantitativeValue|Distance
     */
    public $width;

    /**
     * The country of origin of something, including products as well as creative 
     * works such as movie and TV content.  In the case of TV and movie, this
     * would be the country of the principle offices of the production company or
     * individual responsible for the movie. For other kinds of [[CreativeWork]]
     * it is difficult to provide fully general guidance, and properties such as
     * [[contentLocation]] and [[locationCreated]] may be more applicable.  In the
     * case of products, the country of origin of the product. The exact
     * interpretation of this may vary by context and product type, and cannot be
     * fully enumerated here.
     *
     * @var Country
     */
    public $countryOfOrigin;

    /**
     * A pattern that something has, for example 'polka dot', 'striped', 'Canadian
     * flag'. Values are typically expressed as text, although links to controlled
     * value schemes are also supported.
     *
     * @var string|DefinedTerm|Text
     */
    public $pattern;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|Text|PhysicalActivityCategory|Thing|CategoryCode
     */
    public $category;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var Grant
     */
    public $funding;

    /**
     * The Manufacturer Part Number (MPN) of the product, or the product to which
     * the offer refers.
     *
     * @var string|Text
     */
    public $mpn;

    /**
     * The height of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $height;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|DefinedTerm|Text|URL
     */
    public $keywords;

    /**
     * The date the item e.g. vehicle was purchased by the current owner.
     *
     * @var Date
     */
    public $purchaseDate;

    /**
     * Defines the energy efficiency Category (also known as "class" or "rating")
     * for a product according to an international energy efficiency standard.
     *
     * @var EnergyConsumptionDetails
     */
    public $hasEnergyConsumptionDetails;

    /**
     * An intended audience, i.e. a group for whom something was created.
     *
     * @var Audience
     */
    public $audience;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.       
     *
     * @var Offer|Demand
     */
    public $offers;

    /**
     * The date of production of the item, e.g. vehicle.
     *
     * @var Date
     */
    public $productionDate;

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
     * Awards won by or for this item.
     *
     * @var string|Text
     */
    public $awards;

    /**
     * A Global Trade Item Number
     * ([GTIN](https://www.gs1.org/standards/id-keys/gtin)). GTINs identify trade
     * items, including products and services, using numeric identification codes.
     * The [[gtin]] property generalizes the earlier [[gtin8]], [[gtin12]],
     * [[gtin13]], and [[gtin14]] properties. The GS1 [digital link
     * specifications](https://www.gs1.org/standards/Digital-Link/) express GTINs
     * as URLs. A correct [[gtin]] value should be a valid GTIN, which means that
     * it should be an all-numeric string of either 8, 12, 13 or 14 digits, or a
     * "GS1 Digital Link" URL based on such a string. The numeric component should
     * also have a [valid GS1 check
     * digit](https://www.gs1.org/services/check-digit-calculator) and meet the
     * other rules for valid GTINs. See also [GS1's GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) and
     * [Wikipedia](https://en.wikipedia.org/wiki/Global_Trade_Item_Number) for
     * more details. Left-padding of the gtin values is not required or
     * encouraged.    
     *
     * @var string|Text
     */
    public $gtin;

    /**
     * The product identifier, such as ISBN. For example: ``` meta
     * itemprop="productID" content="isbn:123-456-789" ```.
     *
     * @var string|Text
     */
    public $productID;

    /**
     * The place where the product was assembled.
     *
     * @var string|Text
     */
    public $countryOfAssembly;

    /**
     * The color of the product.
     *
     * @var string|Text
     */
    public $color;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating
     */
    public $aggregateRating;

    /**
     * A pointer to another, functionally similar product (or multiple products).
     *
     * @var Service|Product
     */
    public $isSimilarTo;

    /**
     * The depth of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $depth;

    /**
     * The place where the item (typically [[Product]]) was last processed and
     * tested before importation.
     *
     * @var string|Text
     */
    public $countryOfLastProcessing;

    /**
     * Indicates the kind of product that this is a variant of. In the case of
     * [[ProductModel]], this is a pointer (from a ProductModel) to a base product
     * from which this product is a variant. It is safe to infer that the variant
     * inherits all product features from the base model, unless defined locally.
     * This is not transitive. In the case of a [[ProductGroup]], the group
     * description also serves as a template, representing a set of Products that
     * vary on explicitly defined, specific dimensions only (so it defines both a
     * set of variants, as well as which values distinguish amongst those
     * variants). When used with [[ProductGroup]], this property can apply to any
     * [[Product]] included in the group.
     *
     * @var ProductModel|ProductGroup
     */
    public $isVariantOf;

    /**
     * A slogan or motto associated with the item.
     *
     * @var string|Text
     */
    public $slogan;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var Organization|Brand
     */
    public $brand;

    /**
     * The manufacturer of the product.
     *
     * @var Organization
     */
    public $manufacturer;

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
     * A pointer to another product (or multiple products) for which this product
     * is a consumable.
     *
     * @var Product
     */
    public $isConsumableFor;

    /**
     * An associated logo.
     *
     * @var URL|ImageObject
     */
    public $logo;

    /**
     * The GTIN-8 code of the product, or the product to which the offer refers.
     * This code is also known as EAN/UCC-8 or 8-digit EAN. See [GS1 GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more
     * details.
     *
     * @var string|Text
     */
    public $gtin8;

    /**
     * The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a
     * product or service, or the product to which the offer refers.
     *
     * @var string|Text
     */
    public $sku;

    /**
     * Indicates the [[productGroupID]] for a [[ProductGroup]] that this product
     * [[isVariantOf]]. 
     *
     * @var string|Text
     */
    public $inProductGroupWithID;

    /**
     * The model of the product. Use with the URL of a ProductModel or a textual
     * representation of the model identifier. The URL of the ProductModel can be
     * from an external source. It is recommended to additionally provide strong
     * product identifiers via the gtin8/gtin13/gtin14 and mpn properties.
     *
     * @var string|ProductModel|Text
     */
    public $model;

    /**
     * Specifies a MerchantReturnPolicy that may be applicable.
     *
     * @var MerchantReturnPolicy
     */
    public $hasMerchantReturnPolicy;

    /**
     * The release date of a product or product model. This can be used to
     * distinguish the exact variant of a product.
     *
     * @var Date
     */
    public $releaseDate;

    /**
     * The GTIN-14 code of the product, or the product to which the offer refers.
     * See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin)
     * for more details.
     *
     * @var string|Text
     */
    public $gtin14;

    /**
     * The weight of the product or person.
     *
     * @var QuantitativeValue
     */
    public $weight;

    /**
     * A standardized size of a product or creative work, specified either through
     * a simple textual string (for example 'XL', '32Wx34L'), a  QuantitativeValue
     * with a unitCode, or a comprehensive and structured [[SizeSpecification]];
     * in other cases, the [[width]], [[height]], [[depth]] and [[weight]]
     * properties may be more applicable. 
     *
     * @var string|QuantitativeValue|DefinedTerm|Text|SizeSpecification
     */
    public $size;

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
     * The GTIN-13 code of the product, or the product to which the offer refers.
     * This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit
     * UPC codes can be converted into a GTIN-13 code by simply adding a preceding
     * zero. See [GS1 GTIN
     * Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more
     * details.
     *
     * @var string|Text
     */
    public $gtin13;

    /**
     * Review of the item.
     *
     * @var Review
     */
    public $reviews;

    /**
     * Indicates whether this content is family friendly.
     *
     * @var bool|Boolean
     */
    public $isFamilyFriendly;

    /**
     * A pointer to another, somehow related product (or multiple products).
     *
     * @var Service|Product
     */
    public $isRelatedTo;

}
