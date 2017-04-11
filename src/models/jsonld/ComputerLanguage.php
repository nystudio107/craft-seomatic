<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * ComputerLanguage - This type covers computer programming languages such as
 * Scheme and Lisp, as well as other language-like computer representations.
 * Natural languages are best represented with the Language type.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ComputerLanguage
 */
class ComputerLanguage extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ComputerLanguage';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ComputerLanguage';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'This type covers computer programming languages such as Scheme and Lisp, as well as other language-like computer representations. Natural languages are best represented with the Language type.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * An additional type for the item, typically used for adding more specific
     * types from external vocabularies in microdata syntax. This is a
     * relationship between something and a class that the thing is in. In RDFa
     * syntax, it is better to use the native RDFa syntax - the 'typeof' attribute
     * - for multiple types. Schema.org tools may have only weaker understanding
     * of extra types, in particular those defined externally.
     *
     * @var string [schema.org types: URL]
     */
    public $additionalType;

    /**
     * An alias for the item.
     *
     * @var string [schema.org types: Text]
     */
    public $alternateName;

    /**
     * A description of the item.
     *
     * @var string [schema.org types: Text]
     */
    public $description;

    /**
     * A sub property of description. A short description of the item used to
     * disambiguate from other, similar items. Information from other properties
     * (in particular, name) may be necessary for the description to be useful for
     * disambiguation.
     *
     * @var string [schema.org types: Text]
     */
    public $disambiguatingDescription;

    /**
     * The identifier property represents any kind of identifier for any kind of
     * Thing, such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated
     * properties for representing many of these, either as textual strings or as
     * URL (URI) links. See background notes for more details.
     *
     * @var mixed|PropertyValue|string|string [schema.org types: PropertyValue, Text, URL]
     */
    public $identifier;

    /**
     * An image of the item. This can be a URL or a fully described ImageObject.
     *
     * @var mixed|ImageObject|string [schema.org types: ImageObject, URL]
     */
    public $image;

    /**
     * Indicates a page (or other CreativeWork) for which this thing is the main
     * entity being described. See background notes for details. Inverse property:
     * mainEntity.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $mainEntityOfPage;

    /**
     * The name of the item.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $name;

    /**
     * Indicates a potential Action, which describes an idealized action in which
     * this thing would play an 'object' role.
     *
     * @var mixed|Action [schema.org types: Action]
     */
    public $potentialAction;

    /**
     * URL of a reference Web page that unambiguously indicates the item's
     * identity. E.g. the URL of the item's Wikipedia page, Wikidata entry, or
     * official website.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $sameAs;

    /**
     * URL of the item.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $url;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'additionalType',
        'alternateName',
        'description',
        'disambiguatingDescription',
        'identifier',
        'image',
        'mainEntityOfPage',
        'name',
        'potentialAction',
        'sameAs',
        'url'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'additionalType' => ['URL'],
        'alternateName' => ['Text'],
        'description' => ['Text'],
        'disambiguatingDescription' => ['Text'],
        'identifier' => ['PropertyValue','Text','URL'],
        'image' => ['ImageObject','URL'],
        'mainEntityOfPage' => ['CreativeWork','URL'],
        'name' => ['Text'],
        'potentialAction' => ['Action'],
        'sameAs' => ['URL'],
        'url' => ['URL']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
        'alternateName' => 'An alias for the item.',
        'description' => 'A description of the item.',
        'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
        'identifier' => 'The identifier property represents any kind of identifier for any kind of Thing, such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See background notes for more details.',
        'image' => 'An image of the item. This can be a URL or a fully described ImageObject.',
        'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See background notes for details. Inverse property: mainEntity.',
        'name' => 'The name of the item.',
        'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
        'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
        'url' => 'URL of the item.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['additionalType','alternateName','description','disambiguatingDescription','identifier','image','mainEntityOfPage','name','potentialAction','sameAs','url'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
