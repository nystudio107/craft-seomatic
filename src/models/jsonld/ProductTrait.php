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
 * Trait for Product.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Product
 */
trait ProductTrait
{
    /**
     * A pattern that something has, for example 'polka dot', 'striped', 'Canadian
     * flag'. Values are typically expressed as text, although links to controlled
     * value schemes are also supported.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $pattern;

    /**
     * The width of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $width;

    /**
     * Indicates the [NATO stock
     * number](https://en.wikipedia.org/wiki/NATO_Stock_Number) (nsn) of a
     * [[Product]].
     *
     * @var string|array|Text|Text[]
     */
    public $nsn;

    /**
     * The model of the product. Use with the URL of a ProductModel or a textual
     * representation of the model identifier. The URL of the ProductModel can be
     * from an external source. It is recommended to additionally provide strong
     * product identifiers via the gtin8/gtin13/gtin14 and mpn properties.
     *
     * @var string|array|ProductModel|ProductModel[]|array|Text|Text[]
     */
    public $model;

    /**
     * The GTIN-14 code of the product, or the product to which the offer refers.
     * See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin)
     * for more details.
     *
     * @var string|array|Text|Text[]
     */
    public $gtin14;

    /**
     * The date of production of the item, e.g. vehicle.
     *
     * @var array|Date|Date[]
     */
    public $productionDate;

    /**
     * Awards won by or for this item.
     *
     * @var string|array|Text|Text[]
     */
    public $awards;

    /**
     * A pointer to another, somehow related product (or multiple products).
     *
     * @var array|Product|Product[]|array|Service|Service[]
     */
    public $isRelatedTo;

    /**
     * A pointer to another, functionally similar product (or multiple products).
     *
     * @var array|Product|Product[]|array|Service|Service[]
     */
    public $isSimilarTo;

    /**
     * A slogan or motto associated with the item.
     *
     * @var string|array|Text|Text[]
     */
    public $slogan;

    /**
     * An award won by or for this item.
     *
     * @var string|array|Text|Text[]
     */
    public $award;

    /**
     * A review of the item.
     *
     * @var array|Review|Review[]
     */
    public $review;

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
     * @var array|Country|Country[]
     */
    public $countryOfOrigin;

    /**
     * The place where the product was assembled.
     *
     * @var string|array|Text|Text[]
     */
    public $countryOfAssembly;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var array|Organization|Organization[]|array|Brand|Brand[]
     */
    public $brand;

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
     * The height of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $height;

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
     * An associated logo.
     *
     * @var array|URL|URL[]|array|ImageObject|ImageObject[]
     */
    public $logo;

    /**
     * Review of the item.
     *
     * @var array|Review|Review[]
     */
    public $reviews;

    /**
     * A pointer to another product (or multiple products) for which this product
     * is an accessory or spare part.
     *
     * @var array|Product|Product[]
     */
    public $isAccessoryOrSparePartFor;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var array|Grant|Grant[]
     */
    public $funding;

    /**
     * A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|Product|Product[]
     */
    public $material;

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
     * The weight of the product or person.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $weight;

    /**
     * The place where the item (typically [[Product]]) was last processed and
     * tested before importation.
     *
     * @var string|array|Text|Text[]
     */
    public $countryOfLastProcessing;

    /**
     * A standardized size of a product or creative work, specified either through
     * a simple textual string (for example 'XL', '32Wx34L'), a  QuantitativeValue
     * with a unitCode, or a comprehensive and structured [[SizeSpecification]];
     * in other cases, the [[width]], [[height]], [[depth]] and [[weight]]
     * properties may be more applicable.
     *
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]|array|DefinedTerm|DefinedTerm[]|array|SizeSpecification|SizeSpecification[]
     */
    public $size;

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
     * @var array|Demand|Demand[]|array|Offer|Offer[]
     */
    public $offers;

    /**
     * An intended audience, i.e. a group for whom something was created.
     *
     * @var array|Audience|Audience[]
     */
    public $audience;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $keywords;

    /**
     * Used to tag an item to be intended or suitable for consumption or use by
     * adults only.
     *
     * @var array|AdultOrientedEnumeration|AdultOrientedEnumeration[]
     */
    public $hasAdultConsideration;

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
     * @var array|ProductGroup|ProductGroup[]|array|ProductModel|ProductModel[]
     */
    public $isVariantOf;

    /**
     * A color swatch image, visualizing the color of a [[Product]]. Should match
     * the textual description specified in the [[color]] property. This can be a
     * URL or a fully described ImageObject.
     *
     * @var array|URL|URL[]|array|ImageObject|ImageObject[]
     */
    public $colorSwatch;

    /**
     * A pointer to another product (or multiple products) for which this product
     * is a consumable.
     *
     * @var array|Product|Product[]
     */
    public $isConsumableFor;

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
     * The manufacturer of the product.
     *
     * @var array|Organization|Organization[]
     */
    public $manufacturer;

    /**
     * Defines the energy efficiency Category (also known as "class" or "rating")
     * for a product according to an international energy efficiency standard.
     *
     * @var array|EnergyConsumptionDetails|EnergyConsumptionDetails[]
     */
    public $hasEnergyConsumptionDetails;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Thing|Thing[]
     */
    public $category;

    /**
     * The color of the product.
     *
     * @var string|array|Text|Text[]
     */
    public $color;

    /**
     * Provides positive considerations regarding something, for example product
     * highlights or (alongside [[negativeNotes]]) pro/con lists for reviews.  In
     * the case of a [[Review]], the property describes the [[itemReviewed]] from
     * the perspective of the review; in the case of a [[Product]], the product
     * itself is being described.  The property values can be expressed either as
     * unstructured text (repeated as necessary), or if ordered, as a list (in
     * which case the most positive is at the beginning of the list).
     *
     * @var string|array|ItemList|ItemList[]|array|WebContent|WebContent[]|array|Text|Text[]|array|ListItem|ListItem[]
     */
    public $positiveNotes;

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
     * Indicates the [[productGroupID]] for a [[ProductGroup]] that this product
     * [[isVariantOf]].
     *
     * @var string|array|Text|Text[]
     */
    public $inProductGroupWithID;

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
     * The release date of a product or product model. This can be used to
     * distinguish the exact variant of a product.
     *
     * @var array|Date|Date[]
     */
    public $releaseDate;

    /**
     * Provides negative considerations regarding something, most typically in
     * pro/con lists for reviews (alongside [[positiveNotes]]). For symmetry   In
     * the case of a [[Review]], the property describes the [[itemReviewed]] from
     * the perspective of the review; in the case of a [[Product]], the product
     * itself is being described. Since product descriptions  tend to emphasise
     * positive claims, it may be relatively unusual to find [[negativeNotes]]
     * used in this way. Nevertheless for the sake of symmetry, [[negativeNotes]]
     * can be used on [[Product]].  The property values can be expressed either as
     * unstructured text (repeated as necessary), or if ordered, as a list (in
     * which case the most negative is at the beginning of the list).
     *
     * @var string|array|ItemList|ItemList[]|array|Text|Text[]|array|WebContent|WebContent[]|array|ListItem|ListItem[]
     */
    public $negativeNotes;

    /**
     * The depth of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $depth;

    /**
     * The product identifier, such as ISBN. For example: ``` meta
     * itemprop="productID" content="isbn:123-456-789" ```.
     *
     * @var string|array|Text|Text[]
     */
    public $productID;

    /**
     * The date the item, e.g. vehicle, was purchased by the current owner.
     *
     * @var array|Date|Date[]
     */
    public $purchaseDate;

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
     * Certification information about a product, organization, service, place, or
     * person.
     *
     * @var array|Certification|Certification[]
     */
    public $hasCertification;
}
