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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Dataset - A body of structured information describing some topic(s) of
 * interest.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Dataset
 */
class Dataset extends CreativeWork
{
    // Static Public Properties
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

    /**
     * The International Standard Serial Number (ISSN) that identifies this serial
     * publication. You can repeat this property to identify different formats of,
     * or the linking ISSN (ISSN-L) for, this serial publication.
     *
     * @var string [schema.org types: Text]
     */
    public $issn;

    /**
     * A technique or technology used in a Dataset (or DataDownload, DataCatalog),
     * corresponding to the method used for measuring the corresponding
     * variable(s) (described using variableMeasured). This is oriented towards
     * scientific and scholarly dataset publication but may have broader
     * applicability; it is not intended as a full representation of measurement,
     * but rather as a high level summary for dataset discovery. For example, if
     * variableMeasured is: molecule concentration, measurementTechnique could be:
     * "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or
     * "immunofluorescence". If the variableMeasured is "depression rating", the
     * measurementTechnique could be "Zung Scale" or "HAM-D" or "Beck Depression
     * Inventory". If there are several variableMeasured properties recorded for
     * some given data object, use a PropertyValue for each variableMeasured and
     * attach the corresponding measurementTechnique.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $measurementTechnique;

    /**
     * The variableMeasured property can indicate (repeated as necessary) the
     * variables that are measured in some dataset, either described as text or as
     * pairs of identifier and description using PropertyValue.
     *
     * @var mixed|PropertyValue|string [schema.org types: PropertyValue, Text]
     */
    public $variableMeasured;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'distribution',
        'includedInDataCatalog',
        'issn',
        'measurementTechnique',
        'variableMeasured'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'distribution' => ['DataDownload'],
        'includedInDataCatalog' => ['DataCatalog'],
        'issn' => ['Text'],
        'measurementTechnique' => ['Text','URL'],
        'variableMeasured' => ['PropertyValue','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'distribution' => 'A downloadable form of this dataset, at a specific location, in a specific format.',
        'includedInDataCatalog' => 'A data catalog which contains this dataset. Supersedes catalog, includedDataCatalog. Inverse property: dataset.',
        'issn' => 'The International Standard Serial Number (ISSN) that identifies this serial publication. You can repeat this property to identify different formats of, or the linking ISSN (ISSN-L) for, this serial publication.',
        'measurementTechnique' => 'A technique or technology used in a Dataset (or DataDownload, DataCatalog), corresponding to the method used for measuring the corresponding variable(s) (described using variableMeasured). This is oriented towards scientific and scholarly dataset publication but may have broader applicability; it is not intended as a full representation of measurement, but rather as a high level summary for dataset discovery. For example, if variableMeasured is: molecule concentration, measurementTechnique could be: "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the variableMeasured is "depression rating", the measurementTechnique could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory". If there are several variableMeasured properties recorded for some given data object, use a PropertyValue for each variableMeasured and attach the corresponding measurementTechnique.',
        'variableMeasured' => 'The variableMeasured property can indicate (repeated as necessary) the variables that are measured in some dataset, either described as text or as pairs of identifier and description using PropertyValue.'
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
            [['distribution','includedInDataCatalog','issn','measurementTechnique','variableMeasured'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
