<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * CreativeWorkSeries - A CreativeWorkSeries in schema.org is a group of
 * related items, typically but not necessarily of the same kind.
 * CreativeWorkSeries are usually organized into some order, often
 * chronological. Unlike ItemList which is a general purpose data structure
 * for lists of things, the emphasis with CreativeWorkSeries is on published
 * materials (written e.g. books and periodicals, or media such as tv, radio
 * and games). Specific subtypes are available for describing TVSeries,
 * RadioSeries, MovieSeries, BookSeries, Periodical and VideoGameSeries. In
 * each case, the hasPart / isPartOf properties can be used to relate the
 * CreativeWorkSeries to its parts. The general CreativeWorkSeries type serves
 * largely just to organize these more specific and practical subtypes. It is
 * common for properties applicable to an item from the series to be usefully
 * applied to the containing group. Schema.org attempts to anticipate some of
 * these cases, but publishers should be free to apply properties of the
 * series parts to the series as a whole wherever they seem appropriate.
 * Extends: CreativeWork
 * @see    http://schema.org/CreativeWorkSeries
 */
class CreativeWorkSeries extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'CreativeWorkSeries';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/CreativeWorkSeries';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A CreativeWorkSeries in schema.org is a group of related items, typically but not necessarily of the same kind. CreativeWorkSeries are usually organized into some order, often chronological. Unlike ItemList which is a general purpose data structure for lists of things, the emphasis with CreativeWorkSeries is on published materials (written e.g. books and periodicals, or media such as tv, radio and games). Specific subtypes are available for describing TVSeries, RadioSeries, MovieSeries, BookSeries, Periodical and VideoGameSeries. In each case, the hasPart / isPartOf properties can be used to relate the CreativeWorkSeries to its parts. The general CreativeWorkSeries type serves largely just to organize these more specific and practical subtypes. It is common for properties applicable to an item from the series to be usefully applied to the containing group. Schema.org attempts to anticipate some of these cases, but publishers should be free to apply properties of the series parts to the series as a whole wherever they seem appropriate.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

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
     * The end date and time of the item (in ISO 8601 date format).
     * @var mixed Date, DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    /**
     * The start date and time of the item (in ISO 8601 date format).
     * @var mixed Date, DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'endDate',
                'startDate',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'endDate' => ['Date','DateTime'],
                'startDate' => ['Date','DateTime'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
                'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
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
                [['endDate','startDate',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class CreativeWorkSeries*/
