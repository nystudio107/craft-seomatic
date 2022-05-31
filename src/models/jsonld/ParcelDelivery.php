<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * ParcelDelivery - The delivery of a parcel either via the postal service or a commercial
 * service.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ParcelDelivery
 */
class ParcelDelivery extends MetaJsonLd implements ParcelDeliveryInterface, IntangibleInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'ParcelDelivery';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/ParcelDelivery';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public string $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
The delivery of a parcel either via the postal service or a commercial service.
SCHEMADESC;

    use ParcelDeliveryTrait;
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
            'carrier' => ['Organization'],
            'deliveryAddress' => ['PostalAddress'],
            'deliveryStatus' => ['DeliveryEvent'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'expectedArrivalFrom' => ['Date', 'DateTime'],
            'expectedArrivalUntil' => ['Date', 'DateTime'],
            'hasDeliveryMethod' => ['DeliveryMethod'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'itemShipped' => ['Product'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'originAddress' => ['PostalAddress'],
            'partOfOrder' => ['Order'],
            'potentialAction' => ['Action'],
            'provider' => ['Organization', 'Person'],
            'sameAs' => ['URL'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'trackingNumber' => ['Text'],
            'trackingUrl' => ['URL'],
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
            'carrier' => '\'carrier\' is an out-dated term indicating the \'provider\' for parcel delivery and flights.',
            'deliveryAddress' => 'Destination address.',
            'deliveryStatus' => 'New entry added as the package passes through each leg of its journey (from shipment to final delivery).',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'expectedArrivalFrom' => 'The earliest date the package may arrive.',
            'expectedArrivalUntil' => 'The latest date the package may arrive.',
            'hasDeliveryMethod' => 'Method used for delivery or shipping.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'itemShipped' => 'Item(s) being shipped.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'originAddress' => 'Shipper\'s address.',
            'partOfOrder' => 'The overall order the items in this delivery were included in.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'trackingNumber' => 'Shipper tracking number.',
            'trackingUrl' => 'Tracking url for the parcel delivery.',
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
