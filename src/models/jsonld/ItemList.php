<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * ItemList - A list of items of any sort—for example, Top 10 Movies About
 * Weathermen, or Top 100 Party Songs. Not to be confused with HTML lists,
 * which are often used only for formatting.
 * Extends: Intangible
 * @see    http://schema.org/ItemList
 */
class ItemList extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ItemList';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ItemList';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A list of items of any sort—for example, Top 10 Movies About Weathermen, or Top 100 Party Songs. Not to be confused with HTML lists, which are often used only for formatting.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

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
     * For itemListElement values, you can use simple strings (e.g. "Peter",
     * "Paul", "Mary"), existing entities, or use ListItem. Text values are best
     * if the elements in the list are plain strings. Existing entities are best
     * for a simple, unordered list of existing things in your data. ListItem is
     * used with ordered lists when you want to provide additional context about
     * the element in that list or when the same item might be in different places
     * in different lists. Note: The order of elements in your mark-up is not
     * sufficient for indicating the order or elements. Use ListItem with a
     * 'position' property in such cases.
     * @var mixed ListItem, string, Thing [schema.org types: ListItem, Text, Thing]
     */
    public $itemListElement;

    /**
     * Type of ordering (e.g. Ascending, Descending, Unordered).
     * @var mixed ItemListOrderType, string [schema.org types: ItemListOrderType, Text]
     */
    public $itemListOrder;

    /**
     * The number of items in an ItemList. Note that some descriptions might not
     * fully describe all items in a list (e.g., multi-page pagination); in such
     * cases, the numberOfItems would be for the entire list.
     * @var mixed int [schema.org types: Integer]
     */
    public $numberOfItems;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'itemListElement',
                'itemListOrder',
                'numberOfItems',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'itemListElement' => ['ListItem','Text','Thing'],
                'itemListOrder' => ['ItemListOrderType','Text'],
                'numberOfItems' => ['Integer'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'itemListElement' => 'For itemListElement values, you can use simple strings (e.g. "Peter", "Paul", "Mary"), existing entities, or use ListItem. Text values are best if the elements in the list are plain strings. Existing entities are best for a simple, unordered list of existing things in your data. ListItem is used with ordered lists when you want to provide additional context about the element in that list or when the same item might be in different places in different lists. Note: The order of elements in your mark-up is not sufficient for indicating the order or elements. Use ListItem with a \'position\' property in such cases.',
                'itemListOrder' => 'Type of ordering (e.g. Ascending, Descending, Unordered).',
                'numberOfItems' => 'The number of items in an ItemList. Note that some descriptions might not fully describe all items in a list (e.g., multi-page pagination); in such cases, the numberOfItems would be for the entire list.',
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
                [['itemListElement','itemListOrder','numberOfItems',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ItemList*/
