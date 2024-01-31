<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v15.0-release
 * ActionAccessSpecification - A set of requirements that must be fulfilled in order to perform an Action.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ActionAccessSpecification
 */
class ActionAccessSpecification extends MetaJsonLd implements ActionAccessSpecificationInterface, IntangibleInterface, ThingInterface
{
    use ActionAccessSpecificationTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'ActionAccessSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/ActionAccessSpecification';

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
    public static string $schemaTypeDescription = 'A set of requirements that must be fulfilled in order to perform an Action.';


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
            'availabilityEnds' => ['DateTime', 'Time', 'Date'],
            'availabilityStarts' => ['Date', 'Time', 'DateTime'],
            'category' => ['URL', 'CategoryCode', 'Text', 'Thing', 'PhysicalActivityCategory'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'eligibleRegion' => ['Place', 'Text', 'GeoShape'],
            'expectsAcceptanceOf' => ['Offer'],
            'identifier' => ['PropertyValue', 'URL', 'Text'],
            'image' => ['URL', 'ImageObject'],
            'ineligibleRegion' => ['Place', 'GeoShape', 'Text'],
            'mainEntityOfPage' => ['URL', 'CreativeWork'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'requiresSubscription' => ['MediaSubscription', 'Boolean'],
            'sameAs' => ['URL'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'url' => ['URL'],
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
            'availabilityEnds' => 'The end of the availability of the product or service included in the offer.',
            'availabilityStarts' => 'The beginning of the availability of the product or service included in the offer.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'eligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is valid.  See also [[ineligibleRegion]].     ',
            'expectsAcceptanceOf' => 'An Offer which must be accepted before the user can perform the Action. For example, the user may need to buy a movie before being able to watch it.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'ineligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is not valid, e.g. a region where the transaction is not allowed.  See also [[eligibleRegion]].       ',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'requiresSubscription' => 'Indicates if use of the media require a subscription  (either paid or free). Allowed values are ```true``` or ```false``` (note that an earlier version had \'yes\', \'no\').',
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
