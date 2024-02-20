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
 * MerchantReturnPolicy - A MerchantReturnPolicy provides information about product return policies
 * associated with an [[Organization]], [[Product]], or [[Offer]].
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MerchantReturnPolicy
 */
class MerchantReturnPolicy extends MetaJsonLd implements MerchantReturnPolicyInterface, IntangibleInterface, ThingInterface
{
    use MerchantReturnPolicyTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'MerchantReturnPolicy';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/MerchantReturnPolicy';

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
    public static string $schemaTypeDescription = 'A MerchantReturnPolicy provides information about product return policies associated with an [[Organization]], [[Product]], or [[Offer]].';


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
            'additionalProperty' => ['array', 'PropertyValue', 'PropertyValue[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'applicableCountry' => ['array', 'Text', 'Text[]', 'array', 'Country', 'Country[]'],
            'customerRemorseReturnFees' => ['array', 'ReturnFeesEnumeration', 'ReturnFeesEnumeration[]'],
            'customerRemorseReturnLabelSource' => ['array', 'ReturnLabelSourceEnumeration', 'ReturnLabelSourceEnumeration[]'],
            'customerRemorseReturnShippingFeesAmount' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'inStoreReturnsOffered' => ['array', 'Boolean', 'Boolean[]'],
            'itemCondition' => ['array', 'OfferItemCondition', 'OfferItemCondition[]'],
            'itemDefectReturnFees' => ['array', 'ReturnFeesEnumeration', 'ReturnFeesEnumeration[]'],
            'itemDefectReturnLabelSource' => ['array', 'ReturnLabelSourceEnumeration', 'ReturnLabelSourceEnumeration[]'],
            'itemDefectReturnShippingFeesAmount' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'merchantReturnDays' => ['array', 'Integer', 'Integer[]', 'array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'merchantReturnLink' => ['array', 'URL', 'URL[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'refundType' => ['array', 'RefundTypeEnumeration', 'RefundTypeEnumeration[]'],
            'restockingFee' => ['array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'Number', 'Number[]'],
            'returnFees' => ['array', 'ReturnFeesEnumeration', 'ReturnFeesEnumeration[]'],
            'returnLabelSource' => ['array', 'ReturnLabelSourceEnumeration', 'ReturnLabelSourceEnumeration[]'],
            'returnMethod' => ['array', 'ReturnMethodEnumeration', 'ReturnMethodEnumeration[]'],
            'returnPolicyCategory' => ['array', 'MerchantReturnEnumeration', 'MerchantReturnEnumeration[]'],
            'returnPolicyCountry' => ['array', 'Text', 'Text[]', 'array', 'Country', 'Country[]'],
            'returnPolicySeasonalOverride' => ['array', 'MerchantReturnPolicySeasonalOverride', 'MerchantReturnPolicySeasonalOverride[]'],
            'returnShippingFeesAmount' => ['array', 'MonetaryAmount', 'MonetaryAmount[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
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
            'additionalProperty' => 'A property-value pair representing an additional characteristic of the entity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.  Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. https://schema.org/width, https://schema.org/color, https://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism. ',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'applicableCountry' => 'A country where a particular merchant return policy applies to, for example the two-letter ISO 3166-1 alpha-2 country code.',
            'customerRemorseReturnFees' => 'The type of return fees if the product is returned due to customer remorse.',
            'customerRemorseReturnLabelSource' => 'The method (from an enumeration) by which the customer obtains a return shipping label for a product returned due to customer remorse.',
            'customerRemorseReturnShippingFeesAmount' => 'The amount of shipping costs if a product is returned due to customer remorse. Applicable when property [[customerRemorseReturnFees]] equals [[ReturnShippingFees]].',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inStoreReturnsOffered' => 'Are in-store returns offered? (For more advanced return methods use the [[returnMethod]] property.)',
            'itemCondition' => 'A predefined value from OfferItemCondition specifying the condition of the product or service, or the products or services included in the offer. Also used for product return policies to specify the condition of products accepted for returns.',
            'itemDefectReturnFees' => 'The type of return fees for returns of defect products.',
            'itemDefectReturnLabelSource' => 'The method (from an enumeration) by which the customer obtains a return shipping label for a defect product.',
            'itemDefectReturnShippingFeesAmount' => 'Amount of shipping costs for defect product returns. Applicable when property [[itemDefectReturnFees]] equals [[ReturnShippingFees]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'merchantReturnDays' => 'Specifies either a fixed return date or the number of days (from the delivery date) that a product can be returned. Used when the [[returnPolicyCategory]] property is specified as [[MerchantReturnFiniteReturnWindow]].',
            'merchantReturnLink' => 'Specifies a Web page or service by URL, for product returns.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'refundType' => 'A refund type, from an enumerated list.',
            'restockingFee' => 'Use [[MonetaryAmount]] to specify a fixed restocking fee for product returns, or use [[Number]] to specify a percentage of the product price paid by the customer.',
            'returnFees' => 'The type of return fees for purchased products (for any return reason).',
            'returnLabelSource' => 'The method (from an enumeration) by which the customer obtains a return shipping label for a product returned for any reason.',
            'returnMethod' => 'The type of return method offered, specified from an enumeration.',
            'returnPolicyCategory' => 'Specifies an applicable return policy (from an enumeration).',
            'returnPolicyCountry' => 'The country where the product has to be sent to for returns, for example "Ireland" using the [[name]] property of [[Country]]. You can also provide the two-letter [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1). Note that this can be different from the country where the product was originally shipped from or sent to.',
            'returnPolicySeasonalOverride' => 'Seasonal override of a return policy.',
            'returnShippingFeesAmount' => 'Amount of shipping costs for product returns (for any reason). Applicable when property [[returnFees]] equals [[ReturnShippingFees]].',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
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
