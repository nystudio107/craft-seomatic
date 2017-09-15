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

use nystudio107\seomatic\models\jsonld\Thing;

/**
 * Product - Any offered product or service. For example: a pair of shoes; a
 * concert ticket; the rental of a car; a haircut; or an episode of a TV show
 * streamed online.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Product
 */
class Product extends Thing
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Product';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Product';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Any offered product or service. For example: a pair of shoes; a concert ticket; the rental of a car; a haircut; or an episode of a TV show streamed online.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Thing';

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
     * A property-value pair representing an additional characteristics of the
     * entitity, e.g. a product feature or another characteristic for which there
     * is no matching property in schema.org. Note: Publishers should be aware
     * that applications designed to use specific schema.org properties (e.g.
     * http://schema.org/width, http://schema.org/color, http://schema.org/gtin13,
     * ...) will typically expect such data to be provided using those properties,
     * rather than using the generic property/value mechanism.
     *
     * @var PropertyValue [schema.org types: PropertyValue]
     */
    public $additionalProperty;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;

    /**
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     *
     * @var Audience [schema.org types: Audience]
     */
    public $audience;

    /**
     * An award won by or for this item. Supersedes awards.
     *
     * @var string [schema.org types: Text]
     */
    public $award;

    /**
     * The brand(s) associated with a product or service, or the brand(s)
     * maintained by an organization or business person.
     *
     * @var mixed|Brand|Organization [schema.org types: Brand, Organization]
     */
    public $brand;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var mixed|PhysicalActivityCategory|string|Thing [schema.org types: PhysicalActivityCategory, Text, Thing]
     */
    public $category;

    /**
     * The color of the product.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $color;

    /**
     * The depth of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $depth;

    /**
     * The GTIN-12 code of the product, or the product to which the offer refers.
     * The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C.
     * Company Prefix, Item Reference, and Check Digit used to identify trade
     * items. See GS1 GTIN Summary for more details.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $gtin12;

    /**
     * The GTIN-13 code of the product, or the product to which the offer refers.
     * This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit
     * UPC codes can be converted into a GTIN-13 code by simply adding a
     * preceeding zero. See GS1 GTIN Summary for more details.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $gtin13;

    /**
     * The GTIN-14 code of the product, or the product to which the offer refers.
     * See GS1 GTIN Summary for more details.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $gtin14;

    /**
     * The GTIN-8 code of the product, or the product to which the offer refers.
     * This code is also known as EAN/UCC-8 or 8-digit EAN. See GS1 GTIN Summary
     * for more details.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $gtin8;

    /**
     * The height of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $height;

    /**
     * A pointer to another product (or multiple products) for which this product
     * is an accessory or spare part.
     *
     * @var mixed|Product [schema.org types: Product]
     */
    public $isAccessoryOrSparePartFor;

    /**
     * A pointer to another product (or multiple products) for which this product
     * is a consumable.
     *
     * @var mixed|Product [schema.org types: Product]
     */
    public $isConsumableFor;

    /**
     * A pointer to another, somehow related product (or multiple products).
     *
     * @var mixed|Product|Service [schema.org types: Product, Service]
     */
    public $isRelatedTo;

    /**
     * A pointer to another, functionally similar product (or multiple products).
     *
     * @var mixed|Product|Service [schema.org types: Product, Service]
     */
    public $isSimilarTo;

    /**
     * A predefined value from OfferItemCondition or a textual description of the
     * condition of the product or service, or the products or services included
     * in the offer.
     *
     * @var mixed|OfferItemCondition [schema.org types: OfferItemCondition]
     */
    public $itemCondition;

    /**
     * An associated logo.
     *
     * @var mixed|ImageObject|string [schema.org types: ImageObject, URL]
     */
    public $logo;

    /**
     * The manufacturer of the product.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $manufacturer;

    /**
     * A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @var mixed|Product|string|string [schema.org types: Product, Text, URL]
     */
    public $material;

    /**
     * The model of the product. Use with the URL of a ProductModel or a textual
     * representation of the model identifier. The URL of the ProductModel can be
     * from an external source. It is recommended to additionally provide strong
     * product identifiers via the gtin8/gtin13/gtin14 and mpn properties.
     *
     * @var mixed|ProductModel|string [schema.org types: ProductModel, Text]
     */
    public $model;

    /**
     * The Manufacturer Part Number (MPN) of the product, or the product to which
     * the offer refers.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $mpn;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     *
     * @var mixed|Offer [schema.org types: Offer]
     */
    public $offers;

    /**
     * The product identifier, such as ISBN. For example: meta
     * itemprop="productID" content="isbn:123-456-789".
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $productID;

    /**
     * The date of production of the item, e.g. vehicle.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $productionDate;

    /**
     * The date the item e.g. vehicle was purchased by the current owner.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $purchaseDate;

    /**
     * The release date of a product or product model. This can be used to
     * distinguish the exact variant of a product.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $releaseDate;

    /**
     * A review of the item. Supersedes reviews.
     *
     * @var mixed|Review [schema.org types: Review]
     */
    public $review;

    /**
     * The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a
     * product or service, or the product to which the offer refers.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $sku;

    /**
     * The weight of the product or person.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $weight;

    /**
     * The width of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $width;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'additionalProperty',
        'aggregateRating',
        'audience',
        'award',
        'brand',
        'category',
        'color',
        'depth',
        'gtin12',
        'gtin13',
        'gtin14',
        'gtin8',
        'height',
        'isAccessoryOrSparePartFor',
        'isConsumableFor',
        'isRelatedTo',
        'isSimilarTo',
        'itemCondition',
        'logo',
        'manufacturer',
        'material',
        'model',
        'mpn',
        'offers',
        'productID',
        'productionDate',
        'purchaseDate',
        'releaseDate',
        'review',
        'sku',
        'weight',
        'width'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'additionalProperty' => ['PropertyValue'],
        'aggregateRating' => ['AggregateRating'],
        'audience' => ['Audience'],
        'award' => ['Text'],
        'brand' => ['Brand','Organization'],
        'category' => ['PhysicalActivityCategory','Text','Thing'],
        'color' => ['Text'],
        'depth' => ['Distance','QuantitativeValue'],
        'gtin12' => ['Text'],
        'gtin13' => ['Text'],
        'gtin14' => ['Text'],
        'gtin8' => ['Text'],
        'height' => ['Distance','QuantitativeValue'],
        'isAccessoryOrSparePartFor' => ['Product'],
        'isConsumableFor' => ['Product'],
        'isRelatedTo' => ['Product','Service'],
        'isSimilarTo' => ['Product','Service'],
        'itemCondition' => ['OfferItemCondition'],
        'logo' => ['ImageObject','URL'],
        'manufacturer' => ['Organization'],
        'material' => ['Product','Text','URL'],
        'model' => ['ProductModel','Text'],
        'mpn' => ['Text'],
        'offers' => ['Offer'],
        'productID' => ['Text'],
        'productionDate' => ['Date'],
        'purchaseDate' => ['Date'],
        'releaseDate' => ['Date'],
        'review' => ['Review'],
        'sku' => ['Text'],
        'weight' => ['QuantitativeValue'],
        'width' => ['Distance','QuantitativeValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.',
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
        'award' => 'An award won by or for this item. Supersedes awards.',
        'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
        'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
        'color' => 'The color of the product.',
        'depth' => 'The depth of the item.',
        'gtin12' => 'The GTIN-12 code of the product, or the product to which the offer refers. The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C. Company Prefix, Item Reference, and Check Digit used to identify trade items. See GS1 GTIN Summary for more details.',
        'gtin13' => 'The GTIN-13 code of the product, or the product to which the offer refers. This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit UPC codes can be converted into a GTIN-13 code by simply adding a preceeding zero. See GS1 GTIN Summary for more details.',
        'gtin14' => 'The GTIN-14 code of the product, or the product to which the offer refers. See GS1 GTIN Summary for more details.',
        'gtin8' => 'The GTIN-8 code of the product, or the product to which the offer refers. This code is also known as EAN/UCC-8 or 8-digit EAN. See GS1 GTIN Summary for more details.',
        'height' => 'The height of the item.',
        'isAccessoryOrSparePartFor' => 'A pointer to another product (or multiple products) for which this product is an accessory or spare part.',
        'isConsumableFor' => 'A pointer to another product (or multiple products) for which this product is a consumable.',
        'isRelatedTo' => 'A pointer to another, somehow related product (or multiple products).',
        'isSimilarTo' => 'A pointer to another, functionally similar product (or multiple products).',
        'itemCondition' => 'A predefined value from OfferItemCondition or a textual description of the condition of the product or service, or the products or services included in the offer.',
        'logo' => 'An associated logo.',
        'manufacturer' => 'The manufacturer of the product.',
        'material' => 'A material that something is made from, e.g. leather, wool, cotton, paper.',
        'model' => 'The model of the product. Use with the URL of a ProductModel or a textual representation of the model identifier. The URL of the ProductModel can be from an external source. It is recommended to additionally provide strong product identifiers via the gtin8/gtin13/gtin14 and mpn properties.',
        'mpn' => 'The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
        'productID' => 'The product identifier, such as ISBN. For example: meta itemprop="productID" content="isbn:123-456-789".',
        'productionDate' => 'The date of production of the item, e.g. vehicle.',
        'purchaseDate' => 'The date the item e.g. vehicle was purchased by the current owner.',
        'releaseDate' => 'The release date of a product or product model. This can be used to distinguish the exact variant of a product.',
        'review' => 'A review of the item. Supersedes reviews.',
        'sku' => 'The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.',
        'weight' => 'The weight of the product or person.',
        'width' => 'The width of the item.'
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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
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
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['additionalProperty','aggregateRating','audience','award','brand','category','color','depth','gtin12','gtin13','gtin14','gtin8','height','isAccessoryOrSparePartFor','isConsumableFor','isRelatedTo','isSimilarTo','itemCondition','logo','manufacturer','material','model','mpn','offers','productID','productionDate','purchaseDate','releaseDate','review','sku','weight','width'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
