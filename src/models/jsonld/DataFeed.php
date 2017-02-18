<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Dataset;

/**
 * DataFeed - A single feed providing structured information about one or more
 * entities or topics.
 * Extends: Dataset
 * @see    http://schema.org/DataFeed
 */
class DataFeed extends Dataset
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'DataFeed';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/DataFeed';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A single feed providing structured information about one or more entities or topics.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Dataset';

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
     * An item within in a data feed. Data feeds may have many elements.
     * @var mixed DataFeedItem, string, Thing [schema.org types: DataFeedItem, Text, Thing]
     */
    public $dataFeedElement;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'dataFeedElement',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'dataFeedElement' => ['DataFeedItem','Text','Thing'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'dataFeedElement' => 'An item within in a data feed. Data feeds may have many elements.',
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
                [['dataFeedElement',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class DataFeed*/
