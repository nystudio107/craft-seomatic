<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * ListItem - An list item, e.g. a step in a checklist or how-to description.
 *
 * Extends: Intangible
 * @see    http://schema.org/ListItem
 */
class ListItem extends Intangible
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ListItem';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ListItem';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An list item, e.g. a step in a checklist or how-to description.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * An entity represented by an entry in a list or data feed (e.g. an 'artist'
     * in a list of 'artists')’.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $item;

    /**
     * A link to the ListItem that follows the current one.
     *
     * @var ListItem [schema.org types: ListItem]
     */
    public $nextItem;

    /**
     * The position of an item in a series or sequence of items.
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $position;

    /**
     * A link to the ListItem that preceeds the current one.
     *
     * @var mixed|ListItem [schema.org types: ListItem]
     */
    public $previousItem;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'item',
            'nextItem',
            'position',
            'previousItem',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'item' => ['Thing'],
            'nextItem' => ['ListItem'],
            'position' => ['Integer','Text'],
            'previousItem' => ['ListItem'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'item' => 'An entity represented by an entry in a list or data feed (e.g. an \'artist\' in a list of \'artists\')’.',
            'nextItem' => 'A link to the ListItem that follows the current one.',
            'position' => 'The position of an item in a series or sequence of items.',
            'previousItem' => 'A link to the ListItem that preceeds the current one.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['item','nextItem','position','previousItem',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
