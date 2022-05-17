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
 * Property - A property, used to indicate attributes and relationships of some Thing;
 * equivalent to rdf:Property.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Property
 */
class Property extends MetaJsonLd implements PropertyInterface, IntangibleInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Property';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Property';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
A property, used to indicate attributes and relationships of some Thing; equivalent to rdf:Property.
SCHEMADESC;

    use PropertyTrait;
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
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'domainIncludes' => ['Class'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'inverseOf' => ['Property'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'rangeIncludes' => ['Class'],
            'sameAs' => ['URL'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'supersededBy' => ['Enumeration', 'Class', 'Property'],
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
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'domainIncludes' => 'Relates a property to a class that is (one of) the type(s) the property is expected to be used on.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inverseOf' => 'Relates a property to a property that is its inverse. Inverse properties relate the same pairs of items to each other, but in reversed direction. For example, the \'alumni\' and \'alumniOf\' properties are inverseOf each other. Some properties don\'t have explicit inverses; in these situations RDFa and JSON-LD syntax for reverse properties can be used.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'rangeIncludes' => 'Relates a property to a class that constitutes (one of) the expected type(s) for values of the property.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'supersededBy' => 'Relates a term (i.e. a property, class or enumeration) to one that supersedes it.',
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
