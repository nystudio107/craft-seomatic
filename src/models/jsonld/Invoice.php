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
 * Invoice - A statement of the money due for goods or services; a bill.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Invoice
 */
class Invoice extends MetaJsonLd implements InvoiceInterface, IntangibleInterface, ThingInterface
{
    use InvoiceTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'Invoice';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/Invoice';

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
    public static string $schemaTypeDescription = 'A statement of the money due for goods or services; a bill.';


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
            'accountId' => ['array', 'Text', 'Text[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'billingPeriod' => ['array', 'Duration', 'Duration[]'],
            'broker' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'category' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'CategoryCode', 'CategoryCode[]', 'array', 'PhysicalActivityCategory', 'PhysicalActivityCategory[]', 'array', 'Thing', 'Thing[]'],
            'confirmationNumber' => ['array', 'Text', 'Text[]'],
            'customer' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'minimumPaymentDue' => ['array', 'PriceSpecification', 'PriceSpecification[]', 'array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'paymentDue' => ['array', 'DateTime', 'DateTime[]'],
            'paymentDueDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'paymentMethod' => ['array', 'PaymentMethod', 'PaymentMethod[]'],
            'paymentMethodId' => ['array', 'Text', 'Text[]'],
            'paymentStatus' => ['array', 'Text', 'Text[]', 'array', 'PaymentStatusType', 'PaymentStatusType[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'provider' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'referencesOrder' => ['array', 'Order', 'Order[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'scheduledPaymentDate' => ['array', 'Date', 'Date[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'totalPaymentDue' => ['array', 'PriceSpecification', 'PriceSpecification[]', 'array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'accountId' => 'The identifier for the account the payment will be applied to.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'billingPeriod' => 'The time interval used to compute the invoice.',
            'broker' => 'An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'confirmationNumber' => 'A number that confirms the given order or payment has been received.',
            'customer' => 'Party placing the order or paying the invoice.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'minimumPaymentDue' => 'The minimum payment required at this time.',
            'name' => 'The name of the item.',
            'paymentDue' => 'The date that payment is due.',
            'paymentDueDate' => 'The date that payment is due.',
            'paymentMethod' => 'The name of the credit card or other method of payment for the order.',
            'paymentMethodId' => 'An identifier for the method of payment used (e.g. the last 4 digits of the credit card).',
            'paymentStatus' => 'The status of payment; whether the invoice has been paid or not.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'referencesOrder' => 'The Order(s) related to this Invoice. One or more Orders may be combined into a single Invoice.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'scheduledPaymentDate' => 'The date the invoice is scheduled to be paid.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'totalPaymentDue' => 'The total amount due.',
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
