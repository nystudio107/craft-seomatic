<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * DataFeedItem - A single item within a larger data feed.
 *
 * Extends: Intangible
 * @see    http://schema.org/DataFeedItem
 */
class DataFeedItem extends Intangible
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'DataFeedItem';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/DataFeedItem';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A single item within a larger data feed.';

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
     * The date on which the CreativeWork was created or the item was added to a
     * DataFeed.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $dateCreated;

    /**
     * The datetime the item was removed from the DataFeed.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $dateDeleted;

    /**
     * The date on which the CreativeWork was most recently modified or when the
     * item's entry was modified within a DataFeed.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $dateModified;

    /**
     * An entity represented by an entry in a list or data feed (e.g. an 'artist'
     * in a list of 'artists')’.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $item;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'dateCreated',
            'dateDeleted',
            'dateModified',
            'item',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'dateCreated' => ['Date','DateTime'],
            'dateDeleted' => ['DateTime'],
            'dateModified' => ['Date','DateTime'],
            'item' => ['Thing'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'dateCreated' => 'The date on which the CreativeWork was created or the item was added to a DataFeed.',
            'dateDeleted' => 'The datetime the item was removed from the DataFeed.',
            'dateModified' => 'The date on which the CreativeWork was most recently modified or when the item\'s entry was modified within a DataFeed.',
            'item' => 'An entity represented by an entry in a list or data feed (e.g. an \'artist\' in a list of \'artists\')’.',
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
            [['dateCreated','dateDeleted','dateModified','item',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
