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
 * OfferShippingDetails - OfferShippingDetails represents information about shipping destinations. 
 * Multiple of these entities can be used to represent different shipping
 * rates for different destinations:  One entity for Alaska/Hawaii. A
 * different one for continental US.A different one for all France.  Multiple
 * of these entities can be used to represent different shipping costs and
 * delivery times.  Two entities that are identical but differ in rate and
 * time:  e.g. Cheaper and slower: $5 in 5-7days or Fast and expensive: $15 in
 * 1-2 days.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OfferShippingDetails
 */
class OfferShippingDetails extends MetaJsonLd implements OfferShippingDetailsInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OfferShippingDetails';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OfferShippingDetails';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
OfferShippingDetails represents information about shipping destinations.

Multiple of these entities can be used to represent different shipping rates for different destinations:

One entity for Alaska/Hawaii. A different one for continental US.A different one for all France.

Multiple of these entities can be used to represent different shipping costs and delivery times.

Two entities that are identical but differ in rate and time:

e.g. Cheaper and slower: $5 in 5-7days
or Fast and expensive: $15 in 1-2 days.
SCHEMADESC;

    use OfferShippingDetailsTrait;
    use StructuredValueTrait;
    use IntangibleTrait;
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
            'additionalType' => ['URL'],
            'alternateName' => ['Text'],
            'deliveryTime' => ['ShippingDeliveryTime'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'doesNotShip' => ['Boolean'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'sameAs' => ['URL'],
            'shippingDestination' => ['DefinedRegion'],
            'shippingLabel' => ['Text'],
            'shippingRate' => ['MonetaryAmount'],
            'shippingSettingsLink' => ['URL'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'transitTimeLabel' => ['Text'],
            'url' => ['URL']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'alternateName' => 'An alias for the item.',
            'deliveryTime' => 'The total delay between the receipt of the order and the goods reaching the final customer.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'doesNotShip' => 'Indicates when shipping to a particular [[shippingDestination]] is not available.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'shippingDestination' => 'indicates (possibly multiple) shipping destinations. These can be defined in several ways e.g. postalCode ranges.',
            'shippingLabel' => 'Label to match an [[OfferShippingDetails]] with a [[ShippingRateSettings]] (within the context of a [[shippingSettingsLink]] cross-reference).',
            'shippingRate' => 'The shipping rate is the cost of shipping to the specified destination. Typically, the maxValue and currency values (of the [[MonetaryAmount]]) are most appropriate.',
            'shippingSettingsLink' => 'Link to a page containing [[ShippingRateSettings]] and [[DeliveryTimeSettings]] details.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'transitTimeLabel' => 'Label to match an [[OfferShippingDetails]] with a [[DeliveryTimeSettings]] (within the context of a [[shippingSettingsLink]] cross-reference).',
            'url' => 'URL of the item.'
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
