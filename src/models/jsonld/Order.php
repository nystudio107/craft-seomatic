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
 * Order - An order is a confirmation of a transaction (a receipt), which can contain
 * multiple line items, each represented by an Offer that has been accepted by
 * the customer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Order
 */
class Order extends MetaJsonLd implements OrderInterface, IntangibleInterface, ThingInterface
{
    use OrderTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'Order';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/Order';

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
    public static string $schemaTypeDescription = 'An order is a confirmation of a transaction (a receipt), which can contain multiple line items, each represented by an Offer that has been accepted by the customer.';


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
            'acceptedOffer' => ['array', 'Offer', 'Offer[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'billingAddress' => ['array', 'PostalAddress', 'PostalAddress[]'],
            'broker' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'confirmationNumber' => ['array', 'Text', 'Text[]'],
            'customer' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'discount' => ['array', 'Number', 'Number[]', 'array', 'Text', 'Text[]'],
            'discountCode' => ['array', 'Text', 'Text[]'],
            'discountCurrency' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'isGift' => ['array', 'Boolean', 'Boolean[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'merchant' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'orderDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'orderDelivery' => ['array', 'ParcelDelivery', 'ParcelDelivery[]'],
            'orderNumber' => ['array', 'Text', 'Text[]'],
            'orderStatus' => ['array', 'OrderStatus', 'OrderStatus[]'],
            'orderedItem' => ['array', 'Product', 'Product[]', 'array', 'OrderItem', 'OrderItem[]', 'array', 'Service', 'Service[]'],
            'partOfInvoice' => ['array', 'Invoice', 'Invoice[]'],
            'paymentDue' => ['array', 'DateTime', 'DateTime[]'],
            'paymentDueDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'paymentMethod' => ['array', 'PaymentMethod', 'PaymentMethod[]'],
            'paymentMethodId' => ['array', 'Text', 'Text[]'],
            'paymentUrl' => ['array', 'URL', 'URL[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'seller' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'acceptedOffer' => 'The offer(s) -- e.g., product, quantity and price combinations -- included in the order.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'billingAddress' => 'The billing address for the order.',
            'broker' => 'An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.',
            'confirmationNumber' => 'A number that confirms the given order or payment has been received.',
            'customer' => 'Party placing the order or paying the invoice.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'discount' => 'Any discount applied (to an Order).',
            'discountCode' => 'Code used to redeem a discount.',
            'discountCurrency' => 'The currency of the discount.  Use standard formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system) (LETS) and other currency types, e.g. "Ithaca HOUR".',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'isGift' => 'Indicates whether the offer was accepted as a gift for someone other than the buyer.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'merchant' => '\'merchant\' is an out-dated term for \'seller\'.',
            'name' => 'The name of the item.',
            'orderDate' => 'Date order was placed.',
            'orderDelivery' => 'The delivery of the parcel related to this order or order item.',
            'orderNumber' => 'The identifier of the transaction.',
            'orderStatus' => 'The current status of the order.',
            'orderedItem' => 'The item ordered.',
            'partOfInvoice' => 'The order is being paid as part of the referenced Invoice.',
            'paymentDue' => 'The date that payment is due.',
            'paymentDueDate' => 'The date that payment is due.',
            'paymentMethod' => 'The name of the credit card or other method of payment for the order.',
            'paymentMethodId' => 'An identifier for the method of payment used (e.g. the last 4 digits of the credit card).',
            'paymentUrl' => 'The URL for sending a payment.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seller' => 'An entity which offers (sells / leases / lends / loans) the services / goods.  A seller may also be a provider.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
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
