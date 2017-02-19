<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Dataset - A body of structured information describing some topic(s) of
 * interest.
 *
 * Extends: CreativeWork
 * @see    http://schema.org/Dataset
 */
class Dataset extends CreativeWork
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Dataset';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Dataset';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A body of structured information describing some topic(s) of interest.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * A downloadable form of this dataset, at a specific location, in a specific
     * format.
     *
     * @var DataDownload [schema.org types: DataDownload]
     */
    public $distribution;

    /**
     * A data catalog which contains this dataset. Supersedes catalog,
     * includedDataCatalog. Inverse property: dataset.
     *
     * @var DataCatalog [schema.org types: DataCatalog]
     */
    public $includedInDataCatalog;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'distribution',
            'includedInDataCatalog',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'distribution' => ['DataDownload'],
            'includedInDataCatalog' => ['DataCatalog'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'distribution' => 'A downloadable form of this dataset, at a specific location, in a specific format.',
            'includedInDataCatalog' => 'A data catalog which contains this dataset. Supersedes catalog, includedDataCatalog. Inverse property: dataset.',
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
            [['distribution','includedInDataCatalog',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
