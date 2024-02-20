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
 * OfferShippingDetails - OfferShippingDetails represents information about shipping destinations.
 * Multiple of these entities can be used to represent different shipping
 * rates for different destinations:  One entity for Alaska/Hawaii. A
 * different one for continental US. A different one for all France.  Multiple
 * of these entities can be used to represent different shipping costs and
 * delivery times.  Two entities that are identical but differ in rate and
 * time:  E.g. Cheaper and slower: $5 in 5-7 days or Fast and expensive: $15
 * in 1-2 days.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OfferShippingDetails
 */
class OfferShippingDetails extends MetaJsonLd implements OfferShippingDetailsInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
    use OfferShippingDetailsTrait;
    use StructuredValueTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'OfferShippingDetails';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/OfferShippingDetails';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'StructuredValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = "OfferShippingDetails represents information about shipping destinations.\n\nMultiple of these entities can be used to represent different shipping rates for different destinations:\n\nOne entity for Alaska/Hawaii. A different one for continental US. A different one for all France.\n\nMultiple of these entities can be used to represent different shipping costs and delivery times.\n\nTwo entities that are identical but differ in rate and time:\n\nE.g. Cheaper and slower: \$5 in 5-7 days\nor Fast and expensive: \$15 in 1-2 days.";


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
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'deliveryTime' => ['array', 'ShippingDeliveryTime', 'ShippingDeliveryTime[]'],
            'depth' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'doesNotShip' => ['array', 'Boolean', 'Boolean[]'],
            'height' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'shippingDestination' => ['array', 'DefinedRegion', 'DefinedRegion[]'],
            'shippingLabel' => ['array', 'Text', 'Text[]'],
            'shippingOrigin' => ['array', 'DefinedRegion', 'DefinedRegion[]'],
            'shippingRate' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'shippingSettingsLink' => ['array', 'URL', 'URL[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'transitTimeLabel' => ['array', 'Text', 'Text[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'weight' => ['array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'width' => ['array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'Distance', 'Distance[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'deliveryTime' => 'The total delay between the receipt of the order and the goods reaching the final customer.',
            'depth' => 'The depth of the item.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'doesNotShip' => 'Indicates when shipping to a particular [[shippingDestination]] is not available.',
            'height' => 'The height of the item.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'shippingDestination' => 'indicates (possibly multiple) shipping destinations. These can be defined in several ways, e.g. postalCode ranges.',
            'shippingLabel' => 'Label to match an [[OfferShippingDetails]] with a [[ShippingRateSettings]] (within the context of a [[shippingSettingsLink]] cross-reference).',
            'shippingOrigin' => 'Indicates the origin of a shipment, i.e. where it should be coming from.',
            'shippingRate' => 'The shipping rate is the cost of shipping to the specified destination. Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are most appropriate.',
            'shippingSettingsLink' => 'Link to a page containing [[ShippingRateSettings]] and [[DeliveryTimeSettings]] details.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'transitTimeLabel' => 'Label to match an [[OfferShippingDetails]] with a [[DeliveryTimeSettings]] (within the context of a [[shippingSettingsLink]] cross-reference).',
            'url' => 'URL of the item.',
            'weight' => 'The weight of the product or person.',
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
