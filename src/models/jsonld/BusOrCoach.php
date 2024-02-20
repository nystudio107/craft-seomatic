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
 * BusOrCoach - A bus (also omnibus or autobus) is a road vehicle designed to carry
 * passengers. Coaches are luxury busses, usually in service for long distance
 * travel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BusOrCoach
 */
class BusOrCoach extends MetaJsonLd implements BusOrCoachInterface, VehicleInterface, ProductInterface, ThingInterface
{
    use BusOrCoachTrait;
    use VehicleTrait;
    use ProductTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'BusOrCoach';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/BusOrCoach';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Vehicle';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'A bus (also omnibus or autobus) is a road vehicle designed to carry passengers. Coaches are luxury busses, usually in service for long distance travel.';


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
            'accelerationTime' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'acrissCode' => ['array', 'Text', 'Text[]'],
            'additionalProperty' => ['array', 'PropertyValue', 'PropertyValue[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'aggregateRating' => ['array', 'AggregateRating', 'AggregateRating[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'asin' => ['array', 'URL', 'URL[]', 'array', 'Text', 'Text[]'],
            'audience' => ['array', 'Audience', 'Audience[]'],
            'award' => ['array', 'Text', 'Text[]'],
            'awards' => ['array', 'Text', 'Text[]'],
            'bodyType' => ['array', 'QualitativeValue', 'QualitativeValue[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'brand' => ['array', 'Organization', 'Organization[]', 'array', 'Brand', 'Brand[]'],
            'callSign' => ['array', 'Text', 'Text[]'],
            'cargoVolume' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'category' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'CategoryCode', 'CategoryCode[]', 'array', 'PhysicalActivityCategory', 'PhysicalActivityCategory[]', 'array', 'Thing', 'Thing[]'],
            'color' => ['array', 'Text', 'Text[]'],
            'colorSwatch' => ['array', 'URL', 'URL[]', 'array', 'ImageObject', 'ImageObject[]'],
            'countryOfAssembly' => ['array', 'Text', 'Text[]'],
            'countryOfLastProcessing' => ['array', 'Text', 'Text[]'],
            'countryOfOrigin' => ['array', 'Country', 'Country[]'],
            'dateVehicleFirstRegistered' => ['array', 'Date', 'Date[]'],
            'depth' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'driveWheelConfiguration' => ['array', 'DriveWheelConfigurationValue', 'DriveWheelConfigurationValue[]', 'array', 'Text', 'Text[]'],
            'emissionsCO2' => ['array', 'Number', 'Number[]'],
            'fuelCapacity' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'fuelConsumption' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'fuelEfficiency' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'fuelType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'QualitativeValue', 'QualitativeValue[]'],
            'funding' => ['array', 'Grant', 'Grant[]'],
            'gtin' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'gtin12' => ['array', 'Text', 'Text[]'],
            'gtin13' => ['array', 'Text', 'Text[]'],
            'gtin14' => ['array', 'Text', 'Text[]'],
            'gtin8' => ['array', 'Text', 'Text[]'],
            'hasAdultConsideration' => ['array', 'AdultOrientedEnumeration', 'AdultOrientedEnumeration[]'],
            'hasCertification' => ['array', 'Certification', 'Certification[]'],
            'hasEnergyConsumptionDetails' => ['array', 'EnergyConsumptionDetails', 'EnergyConsumptionDetails[]'],
            'hasMeasurement' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'hasMerchantReturnPolicy' => ['array', 'MerchantReturnPolicy', 'MerchantReturnPolicy[]'],
            'height' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'inProductGroupWithID' => ['array', 'Text', 'Text[]'],
            'isAccessoryOrSparePartFor' => ['array', 'Product', 'Product[]'],
            'isConsumableFor' => ['array', 'Product', 'Product[]'],
            'isFamilyFriendly' => ['array', 'Boolean', 'Boolean[]'],
            'isRelatedTo' => ['array', 'Product', 'Product[]', 'array', 'Service', 'Service[]'],
            'isSimilarTo' => ['array', 'Product', 'Product[]', 'array', 'Service', 'Service[]'],
            'isVariantOf' => ['array', 'ProductGroup', 'ProductGroup[]', 'array', 'ProductModel', 'ProductModel[]'],
            'itemCondition' => ['array', 'OfferItemCondition', 'OfferItemCondition[]'],
            'keywords' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'knownVehicleDamages' => ['array', 'Text', 'Text[]'],
            'logo' => ['array', 'URL', 'URL[]', 'array', 'ImageObject', 'ImageObject[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'manufacturer' => ['array', 'Organization', 'Organization[]'],
            'material' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'Product', 'Product[]'],
            'meetsEmissionStandard' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'QualitativeValue', 'QualitativeValue[]'],
            'mileageFromOdometer' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'mobileUrl' => ['array', 'Text', 'Text[]'],
            'model' => ['array', 'ProductModel', 'ProductModel[]', 'array', 'Text', 'Text[]'],
            'modelDate' => ['array', 'Date', 'Date[]'],
            'mpn' => ['array', 'Text', 'Text[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'negativeNotes' => ['array', 'ItemList', 'ItemList[]', 'array', 'Text', 'Text[]', 'array', 'WebContent', 'WebContent[]', 'array', 'ListItem', 'ListItem[]'],
            'nsn' => ['array', 'Text', 'Text[]'],
            'numberOfAirbags' => ['array', 'Text', 'Text[]', 'array', 'Number', 'Number[]'],
            'numberOfAxles' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Number', 'Number[]'],
            'numberOfDoors' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'numberOfForwardGears' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'numberOfPreviousOwners' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'offers' => ['array', 'Demand', 'Demand[]', 'array', 'Offer', 'Offer[]'],
            'pattern' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Text', 'Text[]'],
            'payload' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'positiveNotes' => ['array', 'ItemList', 'ItemList[]', 'array', 'WebContent', 'WebContent[]', 'array', 'Text', 'Text[]', 'array', 'ListItem', 'ListItem[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'productID' => ['array', 'Text', 'Text[]'],
            'productionDate' => ['array', 'Date', 'Date[]'],
            'purchaseDate' => ['array', 'Date', 'Date[]'],
            'releaseDate' => ['array', 'Date', 'Date[]'],
            'review' => ['array', 'Review', 'Review[]'],
            'reviews' => ['array', 'Review', 'Review[]'],
            'roofLoad' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'seatingCapacity' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Number', 'Number[]'],
            'size' => ['array', 'Text', 'Text[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'SizeSpecification', 'SizeSpecification[]'],
            'sku' => ['array', 'Text', 'Text[]'],
            'slogan' => ['array', 'Text', 'Text[]'],
            'speed' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'steeringPosition' => ['array', 'SteeringPositionValue', 'SteeringPositionValue[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'tongueWeight' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'trailerWeight' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'vehicleConfiguration' => ['array', 'Text', 'Text[]'],
            'vehicleEngine' => ['array', 'EngineSpecification', 'EngineSpecification[]'],
            'vehicleIdentificationNumber' => ['array', 'Text', 'Text[]'],
            'vehicleInteriorColor' => ['array', 'Text', 'Text[]'],
            'vehicleInteriorType' => ['array', 'Text', 'Text[]'],
            'vehicleModelDate' => ['array', 'Date', 'Date[]'],
            'vehicleSeatingCapacity' => ['array', 'Number', 'Number[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'vehicleSpecialUsage' => ['array', 'CarUsageType', 'CarUsageType[]', 'array', 'Text', 'Text[]'],
            'vehicleTransmission' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'QualitativeValue', 'QualitativeValue[]'],
            'weight' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'weightTotal' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'wheelbase' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'width' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'accelerationTime' => 'The time needed to accelerate the vehicle from a given start velocity to a given target velocity.  Typical unit code(s): SEC for seconds  * Note: There are unfortunately no standard unit codes for seconds/0..100 km/h or seconds/0..60 mph. Simply use "SEC" for seconds and indicate the velocities in the [[name]] of the [[QuantitativeValue]], or use [[valueReference]] with a [[QuantitativeValue]] of 0..60 mph or 0..100 km/h to specify the reference speeds.',
            'acrissCode' => 'The ACRISS Car Classification Code is a code used by many car rental companies, for classifying vehicles. ACRISS stands for Association of Car Rental Industry Systems and Standards.',
            'additionalProperty' => 'A property-value pair representing an additional characteristic of the entity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'asin' => 'An Amazon Standard Identification Number (ASIN) is a 10-character alphanumeric unique identifier assigned by Amazon.com and its partners for product identification within the Amazon organization (summary from [Wikipedia](https://en.wikipedia.org/wiki/Amazon_Standard_Identification_Number)\'s article).  Note also that this is a definition for how to include ASINs in Schema.org data, and not a definition of ASINs in general - see documentation from Amazon for authoritative details. ASINs are most commonly encoded as text strings, but the [asin] property supports URL/URI as potential values too.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'award' => 'An award won by or for this item.',
            'awards' => 'Awards won by or for this item.',
            'bodyType' => 'Indicates the design and body style of the vehicle (e.g. station wagon, hatchback, etc.).',
            'brand' => 'The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.',
            'callSign' => 'A [callsign](https://en.wikipedia.org/wiki/Call_sign), as used in broadcasting and radio communications to identify people, radio and TV stations, or vehicles.',
            'cargoVolume' => 'The available volume for cargo or luggage. For automobiles, this is usually the trunk volume.  Typical unit code(s): LTR for liters, FTQ for cubic foot/feet  Note: You can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'color' => 'The color of the product.',
            'colorSwatch' => 'A color swatch image, visualizing the color of a [[Product]]. Should match the textual description specified in the [[color]] property. This can be a URL or a fully described ImageObject.',
            'countryOfAssembly' => 'The place where the product was assembled.',
            'countryOfLastProcessing' => 'The place where the item (typically [[Product]]) was last processed and tested before importation.',
            'countryOfOrigin' => 'The country of origin of something, including products as well as creative  works such as movie and TV content.  In the case of TV and movie, this would be the country of the principle offices of the production company or individual responsible for the movie. For other kinds of [[CreativeWork]] it is difficult to provide fully general guidance, and properties such as [[contentLocation]] and [[locationCreated]] may be more applicable.  In the case of products, the country of origin of the product. The exact interpretation of this may vary by context and product type, and cannot be fully enumerated here.',
            'dateVehicleFirstRegistered' => 'The date of the first registration of the vehicle with the respective public authorities.',
            'depth' => 'The depth of the item.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'driveWheelConfiguration' => 'The drive wheel configuration, i.e. which roadwheels will receive torque from the vehicle\'s engine via the drivetrain.',
            'emissionsCO2' => 'The CO2 emissions in g/km. When used in combination with a QuantitativeValue, put "g/km" into the unitText property of that value, since there is no UN/CEFACT Common Code for "g/km".',
            'fuelCapacity' => 'The capacity of the fuel tank or in the case of electric cars, the battery. If there are multiple components for storage, this should indicate the total of all storage of the same type.  Typical unit code(s): LTR for liters, GLL of US gallons, GLI for UK / imperial gallons, AMH for ampere-hours (for electrical vehicles).',
            'fuelConsumption' => 'The amount of fuel consumed for traveling a particular distance or temporal duration with the given vehicle (e.g. liters per 100 km).  * Note 1: There are unfortunately no standard unit codes for liters per 100 km.  Use [[unitText]] to indicate the unit of measurement, e.g. L/100 km. * Note 2: There are two ways of indicating the fuel consumption, [[fuelConsumption]] (e.g. 8 liters per 100 km) and [[fuelEfficiency]] (e.g. 30 miles per gallon). They are reciprocal. * Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use [[valueReference]] to link the value for the fuel consumption to another value.',
            'fuelEfficiency' => 'The distance traveled per unit of fuel used; most commonly miles per gallon (mpg) or kilometers per liter (km/L).  * Note 1: There are unfortunately no standard unit codes for miles per gallon or kilometers per liter. Use [[unitText]] to indicate the unit of measurement, e.g. mpg or km/L. * Note 2: There are two ways of indicating the fuel consumption, [[fuelConsumption]] (e.g. 8 liters per 100 km) and [[fuelEfficiency]] (e.g. 30 miles per gallon). They are reciprocal. * Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use [[valueReference]] to link the value for the fuel economy to another value.',
            'fuelType' => 'The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'gtin' => 'A Global Trade Item Number ([GTIN](https://www.gs1.org/standards/id-keys/gtin)). GTINs identify trade items, including products and services, using numeric identification codes.  The GS1 [digital link specifications](https://www.gs1.org/standards/Digital-Link/) express GTINs as URLs (URIs, IRIs, etc.). Details including regular expression examples can be found in, Section 6 of the GS1 URI Syntax specification; see also [schema.org tracking issue](https://github.com/schemaorg/schemaorg/issues/3156#issuecomment-1209522809) for schema.org-specific discussion. A correct [[gtin]] value should be a valid GTIN, which means that it should be an all-numeric string of either 8, 12, 13 or 14 digits, or a "GS1 Digital Link" URL based on such a string. The numeric component should also have a [valid GS1 check digit](https://www.gs1.org/services/check-digit-calculator) and meet the other rules for valid GTINs. See also [GS1\'s GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) and [Wikipedia](https://en.wikipedia.org/wiki/Global_Trade_Item_Number) for more details. Left-padding of the gtin values is not required or encouraged. The [[gtin]] property generalizes the earlier [[gtin8]], [[gtin12]], [[gtin13]], and [[gtin14]] properties.  Note also that this is a definition for how to include GTINs in Schema.org data, and not a definition of GTINs in general - see the GS1 documentation for authoritative details.',
            'gtin12' => 'The GTIN-12 code of the product, or the product to which the offer refers. The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C. Company Prefix, Item Reference, and Check Digit used to identify trade items. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin13' => 'The GTIN-13 code of the product, or the product to which the offer refers. This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit UPC codes can be converted into a GTIN-13 code by simply adding a preceding zero. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin14' => 'The GTIN-14 code of the product, or the product to which the offer refers. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'gtin8' => 'The GTIN-8 code of the product, or the product to which the offer refers. This code is also known as EAN/UCC-8 or 8-digit EAN. See [GS1 GTIN Summary](http://www.gs1.org/barcodes/technical/idkeys/gtin) for more details.',
            'hasAdultConsideration' => 'Used to tag an item to be intended or suitable for consumption or use by adults only.',
            'hasCertification' => 'Certification information about a product, organization, service, place, or person.',
            'hasEnergyConsumptionDetails' => 'Defines the energy efficiency Category (also known as "class" or "rating") for a product according to an international energy efficiency standard.',
            'hasMeasurement' => 'A measurement of an item, For example, the inseam of pants, the wheel size of a bicycle, the gauge of a screw, or the carbon footprint measured for certification by an authority. Usually an exact measurement, but can also be a range of measurements for adjustable products, for example belts and ski bindings.',
            'hasMerchantReturnPolicy' => 'Specifies a MerchantReturnPolicy that may be applicable.',
            'height' => 'The height of the item.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inProductGroupWithID' => 'Indicates the [[productGroupID]] for a [[ProductGroup]] that this product [[isVariantOf]]. ',
            'isAccessoryOrSparePartFor' => 'A pointer to another product (or multiple products) for which this product is an accessory or spare part.',
            'isConsumableFor' => 'A pointer to another product (or multiple products) for which this product is a consumable.',
            'isFamilyFriendly' => 'Indicates whether this content is family friendly.',
            'isRelatedTo' => 'A pointer to another, somehow related product (or multiple products).',
            'isSimilarTo' => 'A pointer to another, functionally similar product (or multiple products).',
            'isVariantOf' => 'Indicates the kind of product that this is a variant of. In the case of [[ProductModel]], this is a pointer (from a ProductModel) to a base product from which this product is a variant. It is safe to infer that the variant inherits all product features from the base model, unless defined locally. This is not transitive. In the case of a [[ProductGroup]], the group description also serves as a template, representing a set of Products that vary on explicitly defined, specific dimensions only (so it defines both a set of variants, as well as which values distinguish amongst those variants). When used with [[ProductGroup]], this property can apply to any [[Product]] included in the group.',
            'itemCondition' => 'A predefined value from OfferItemCondition specifying the condition of the product or service, or the products or services included in the offer. Also used for product return policies to specify the condition of products accepted for returns.',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'knownVehicleDamages' => 'A textual description of known damages, both repaired and unrepaired.',
            'logo' => 'An associated logo.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'manufacturer' => 'The manufacturer of the product.',
            'material' => 'A material that something is made from, e.g. leather, wool, cotton, paper.',
            'meetsEmissionStandard' => 'Indicates that the vehicle meets the respective emission standard.',
            'mileageFromOdometer' => 'The total distance travelled by the particular vehicle since its initial production, as read from its odometer.  Typical unit code(s): KMT for kilometers, SMI for statute miles.',
            'mobileUrl' => 'The [[mobileUrl]] property is provided for specific situations in which data consumers need to determine whether one of several provided URLs is a dedicated \'mobile site\'.  To discourage over-use, and reflecting intial usecases, the property is expected only on [[Product]] and [[Offer]], rather than [[Thing]]. The general trend in web technology is towards [responsive design](https://en.wikipedia.org/wiki/Responsive_web_design) in which content can be flexibly adapted to a wide range of browsing environments. Pages and sites referenced with the long-established [[url]] property should ideally also be usable on a wide variety of devices, including mobile phones. In most cases, it would be pointless and counter productive to attempt to update all [[url]] markup to use [[mobileUrl]] for more mobile-oriented pages. The property is intended for the case when items (primarily [[Product]] and [[Offer]]) have extra URLs hosted on an additional "mobile site" alongside the main one. It should not be taken as an endorsement of this publication style.     ',
            'model' => 'The model of the product. Use with the URL of a ProductModel or a textual representation of the model identifier. The URL of the ProductModel can be from an external source. It is recommended to additionally provide strong product identifiers via the gtin8/gtin13/gtin14 and mpn properties.',
            'modelDate' => 'The release date of a vehicle model (often used to differentiate versions of the same make and model).',
            'mpn' => 'The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers.',
            'name' => 'The name of the item.',
            'negativeNotes' => 'Provides negative considerations regarding something, most typically in pro/con lists for reviews (alongside [[positiveNotes]]). For symmetry   In the case of a [[Review]], the property describes the [[itemReviewed]] from the perspective of the review; in the case of a [[Product]], the product itself is being described. Since product descriptions  tend to emphasise positive claims, it may be relatively unusual to find [[negativeNotes]] used in this way. Nevertheless for the sake of symmetry, [[negativeNotes]] can be used on [[Product]].  The property values can be expressed either as unstructured text (repeated as necessary), or if ordered, as a list (in which case the most negative is at the beginning of the list).',
            'nsn' => 'Indicates the [NATO stock number](https://en.wikipedia.org/wiki/NATO_Stock_Number) (nsn) of a [[Product]]. ',
            'numberOfAirbags' => 'The number or type of airbags in the vehicle.',
            'numberOfAxles' => 'The number of axles.  Typical unit code(s): C62.',
            'numberOfDoors' => 'The number of doors.  Typical unit code(s): C62.',
            'numberOfForwardGears' => 'The total number of forward gears available for the transmission system of the vehicle.  Typical unit code(s): C62.',
            'numberOfPreviousOwners' => 'The number of owners of the vehicle, including the current one.  Typical unit code(s): C62.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'pattern' => 'A pattern that something has, for example \'polka dot\', \'striped\', \'Canadian flag\'. Values are typically expressed as text, although links to controlled value schemes are also supported.',
            'payload' => 'The permitted weight of passengers and cargo, EXCLUDING the weight of the empty vehicle.  Typical unit code(s): KGM for kilogram, LBR for pound  * Note 1: Many databases specify the permitted TOTAL weight instead, which is the sum of [[weight]] and [[payload]] * Note 2: You can indicate additional information in the [[name]] of the [[QuantitativeValue]] node. * Note 3: You may also link to a [[QualitativeValue]] node that provides additional information using [[valueReference]]. * Note 4: Note that you can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'positiveNotes' => 'Provides positive considerations regarding something, for example product highlights or (alongside [[negativeNotes]]) pro/con lists for reviews.  In the case of a [[Review]], the property describes the [[itemReviewed]] from the perspective of the review; in the case of a [[Product]], the product itself is being described.  The property values can be expressed either as unstructured text (repeated as necessary), or if ordered, as a list (in which case the most positive is at the beginning of the list).',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'productID' => 'The product identifier, such as ISBN. For example: ``` meta itemprop="productID" content="isbn:123-456-789" ```.',
            'productionDate' => 'The date of production of the item, e.g. vehicle.',
            'purchaseDate' => 'The date the item, e.g. vehicle, was purchased by the current owner.',
            'releaseDate' => 'The release date of a product or product model. This can be used to distinguish the exact variant of a product.',
            'review' => 'A review of the item.',
            'reviews' => 'Review of the item.',
            'roofLoad' => 'The permitted total weight of cargo and installations (e.g. a roof rack) on top of the vehicle.  Typical unit code(s): KGM for kilogram, LBR for pound  * Note 1: You can indicate additional information in the [[name]] of the [[QuantitativeValue]] node. * Note 2: You may also link to a [[QualitativeValue]] node that provides additional information using [[valueReference]] * Note 3: Note that you can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seatingCapacity' => 'The number of persons that can be seated (e.g. in a vehicle), both in terms of the physical space available, and in terms of limitations set by law.  Typical unit code(s): C62 for persons.',
            'size' => 'A standardized size of a product or creative work, specified either through a simple textual string (for example \'XL\', \'32Wx34L\'), a  QuantitativeValue with a unitCode, or a comprehensive and structured [[SizeSpecification]]; in other cases, the [[width]], [[height]], [[depth]] and [[weight]] properties may be more applicable. ',
            'sku' => 'The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.',
            'slogan' => 'A slogan or motto associated with the item.',
            'speed' => 'The speed range of the vehicle. If the vehicle is powered by an engine, the upper limit of the speed range (indicated by [[maxValue]]) should be the maximum speed achievable under regular conditions.  Typical unit code(s): KMH for km/h, HM for mile per hour (0.447 04 m/s), KNT for knot  *Note 1: Use [[minValue]] and [[maxValue]] to indicate the range. Typically, the minimal value is zero. * Note 2: There are many different ways of measuring the speed range. You can link to information about how the given value has been determined using the [[valueReference]] property.',
            'steeringPosition' => 'The position of the steering wheel or similar device (mostly for cars).',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'tongueWeight' => 'The permitted vertical load (TWR) of a trailer attached to the vehicle. Also referred to as Tongue Load Rating (TLR) or Vertical Load Rating (VLR).  Typical unit code(s): KGM for kilogram, LBR for pound  * Note 1: You can indicate additional information in the [[name]] of the [[QuantitativeValue]] node. * Note 2: You may also link to a [[QualitativeValue]] node that provides additional information using [[valueReference]]. * Note 3: Note that you can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'trailerWeight' => 'The permitted weight of a trailer attached to the vehicle.  Typical unit code(s): KGM for kilogram, LBR for pound * Note 1: You can indicate additional information in the [[name]] of the [[QuantitativeValue]] node. * Note 2: You may also link to a [[QualitativeValue]] node that provides additional information using [[valueReference]]. * Note 3: Note that you can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'url' => 'URL of the item.',
            'vehicleConfiguration' => 'A short text indicating the configuration of the vehicle, e.g. \'5dr hatchback ST 2.5 MT 225 hp\' or \'limited edition\'.',
            'vehicleEngine' => 'Information about the engine or engines of the vehicle.',
            'vehicleIdentificationNumber' => 'The Vehicle Identification Number (VIN) is a unique serial number used by the automotive industry to identify individual motor vehicles.',
            'vehicleInteriorColor' => 'The color or color combination of the interior of the vehicle.',
            'vehicleInteriorType' => 'The type or material of the interior of the vehicle (e.g. synthetic fabric, leather, wood, etc.). While most interior types are characterized by the material used, an interior type can also be based on vehicle usage or target audience.',
            'vehicleModelDate' => 'The release date of a vehicle model (often used to differentiate versions of the same make and model).',
            'vehicleSeatingCapacity' => 'The number of passengers that can be seated in the vehicle, both in terms of the physical space available, and in terms of limitations set by law.  Typical unit code(s): C62 for persons.',
            'vehicleSpecialUsage' => 'Indicates whether the vehicle has been used for special purposes, like commercial rental, driving school, or as a taxi. The legislation in many countries requires this information to be revealed when offering a car for sale.',
            'vehicleTransmission' => 'The type of component used for transmitting the power from a rotating power source to the wheels or other relevant component(s) ("gearbox" for cars).',
            'weight' => 'The weight of the product or person.',
            'weightTotal' => 'The permitted total weight of the loaded vehicle, including passengers and cargo and the weight of the empty vehicle.  Typical unit code(s): KGM for kilogram, LBR for pound  * Note 1: You can indicate additional information in the [[name]] of the [[QuantitativeValue]] node. * Note 2: You may also link to a [[QualitativeValue]] node that provides additional information using [[valueReference]]. * Note 3: Note that you can use [[minValue]] and [[maxValue]] to indicate ranges.',
            'wheelbase' => 'The distance between the centers of the front and rear wheels.  Typical unit code(s): CMT for centimeters, MTR for meters, INH for inches, FOT for foot/feet.',
            'width' => 'The width of the item.',
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
