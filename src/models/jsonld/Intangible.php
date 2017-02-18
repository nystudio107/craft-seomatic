<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Thing;

/**
 * Intangible - A utility class that serves as the umbrella for a number of
 * 'intangible' things such as quantities, structured values, etc.
 * Extends: Thing
 * @see    http://schema.org/Intangible
 */
class Intangible extends Thing
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Intangible';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Intangible';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A utility class that serves as the umbrella for a number of \'intangible\' things such as quantities, structured values, etc.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Thing';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * An additional type for the item, typically used for adding more specific
     * types from external vocabularies in microdata syntax. This is a
     * relationship between something and a class that the thing is in. In RDFa
     * syntax, it is better to use the native RDFa syntax - the 'typeof' attribute
     * - for multiple types. Schema.org tools may have only weaker understanding
     * of extra types, in particular those defined externally.
     * @var string [schema.org types: URL]
     */
    public $additionalType;

    /**
     * An alias for the item.
     * @var string [schema.org types: Text]
     */
    public $alternateName;

    /**
     * A description of the item.
     * @var string [schema.org types: Text]
     */
    public $description;

    /**
     * A sub property of description. A short description of the item used to
     * disambiguate from other, similar items. Information from other properties
     * (in particular, name) may be necessary for the description to be useful for
     * disambiguation.
     * @var string [schema.org types: Text]
     */
    public $disambiguatingDescription;

    /**
     * An image of the item. This can be a URL or a fully described ImageObject.
     * @var mixed ImageObject, string [schema.org types: ImageObject, URL]
     */
    public $image;

    /**
     * Indicates a page (or other CreativeWork) for which this thing is the main
     * entity being described. See background notes for details. Inverse property:
     * mainEntity.
     * @var mixed CreativeWork, string [schema.org types: CreativeWork, URL]
     */
    public $mainEntityOfPage;

    /**
     * The name of the item.
     * @var mixed string [schema.org types: Text]
     */
    public $name;

    /**
     * Indicates a potential Action, which describes an idealized action in which
     * this thing would play an 'object' role.
     * @var mixed Action [schema.org types: Action]
     */
    public $potentialAction;

    /**
     * URL of a reference Web page that unambiguously indicates the item's
     * identity. E.g. the URL of the item's Wikipedia page, Freebase page, or
     * official website.
     * @var mixed string [schema.org types: URL]
     */
    public $sameAs;

    /**
     * URL of the item.
     * @var mixed string [schema.org types: URL]
     */
    public $url;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'additionalType',
                'alternateName',
                'description',
                'disambiguatingDescription',
                'image',
                'mainEntityOfPage',
                'name',
                'potentialAction',
                'sameAs',
                'url',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'additionalType' => ['URL'],
                'alternateName' => ['Text'],
                'description' => ['Text'],
                'disambiguatingDescription' => ['Text'],
                'image' => ['ImageObject','URL'],
                'mainEntityOfPage' => ['CreativeWork','URL'],
                'name' => ['Text'],
                'potentialAction' => ['Action'],
                'sameAs' => ['URL'],
                'url' => ['URL'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
                'alternateName' => 'An alias for the item.',
                'description' => 'A description of the item.',
                'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
                'image' => 'An image of the item. This can be a URL or a fully described ImageObject.',
                'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See background notes for details. Inverse property: mainEntity.',
                'name' => 'The name of the item.',
                'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
                'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Freebase page, or official website.',
                'url' => 'URL of the item.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['additionalType','alternateName','description','disambiguatingDescription','image','mainEntityOfPage','name','potentialAction','sameAs','url',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Intangible*/
