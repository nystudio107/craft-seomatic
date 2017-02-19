<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWorkSeries;

/**
 * BookSeries - A series of books. Included books can be indicated with the
 * hasPart property.
 *
 * Extends: CreativeWorkSeries
 * @see    http://schema.org/BookSeries
 */
class BookSeries extends CreativeWorkSeries
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'BookSeries';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/BookSeries';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A series of books. Included books can be indicated with the hasPart property.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWorkSeries';

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
     * The end date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    /**
     * The start date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'endDate',
            'startDate',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'endDate' => ['Date','DateTime'],
            'startDate' => ['Date','DateTime'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
            'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
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
            [['endDate','startDate',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
