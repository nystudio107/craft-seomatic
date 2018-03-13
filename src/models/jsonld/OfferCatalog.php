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

use nystudio107\seomatic\models\jsonld\ItemList;

/**
 * OfferCatalog - An OfferCatalog is an ItemList that contains related Offers
 * and/or further OfferCatalogs that are offeredBy the same provider.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/OfferCatalog
 */
class OfferCatalog extends ItemList
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OfferCatalog';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OfferCatalog';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An OfferCatalog is an ItemList that contains related Offers and/or further OfferCatalogs that are offeredBy the same provider.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'ItemList';

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
     * For itemListElement values, you can use simple strings (e.g. "Peter",
     * "Paul", "Mary"), existing entities, or use ListItem. Text values are best
     * if the elements in the list are plain strings. Existing entities are best
     * for a simple, unordered list of existing things in your data. ListItem is
     * used with ordered lists when you want to provide additional context about
     * the element in that list or when the same item might be in different places
     * in different lists. Note: The order of elements in your mark-up is not
     * sufficient for indicating the order or elements. Use ListItem with a
     * 'position' property in such cases.
     *
     * @var mixed|ListItem|string|Thing [schema.org types: ListItem, Text, Thing]
     */
    public $itemListElement;

    /**
     * Type of ordering (e.g. Ascending, Descending, Unordered).
     *
     * @var mixed|ItemListOrderType|string [schema.org types: ItemListOrderType, Text]
     */
    public $itemListOrder;

    /**
     * The number of items in an ItemList. Note that some descriptions might not
     * fully describe all items in a list (e.g., multi-page pagination); in such
     * cases, the numberOfItems would be for the entire list.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $numberOfItems;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'itemListElement',
        'itemListOrder',
        'numberOfItems'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'itemListElement' => ['ListItem','Text','Thing'],
        'itemListOrder' => ['ItemListOrderType','Text'],
        'numberOfItems' => ['Integer']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'itemListElement' => 'For itemListElement values, you can use simple strings (e.g. "Peter", "Paul", "Mary"), existing entities, or use ListItem. Text values are best if the elements in the list are plain strings. Existing entities are best for a simple, unordered list of existing things in your data. ListItem is used with ordered lists when you want to provide additional context about the element in that list or when the same item might be in different places in different lists. Note: The order of elements in your mark-up is not sufficient for indicating the order or elements. Use ListItem with a \'position\' property in such cases.',
        'itemListOrder' => 'Type of ordering (e.g. Ascending, Descending, Unordered).',
        'numberOfItems' => 'The number of items in an ItemList. Note that some descriptions might not fully describe all items in a list (e.g., multi-page pagination); in such cases, the numberOfItems would be for the entire list.'
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
            [['itemListElement','itemListOrder','numberOfItems'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
