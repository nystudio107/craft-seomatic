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
 * Observation - Instances of the class Observation are used to specify
 * observations about an entity (which may or may not be an instance of a
 * StatisticalPopulation), at a particular time. The principal properties of
 * an Observation are observedNode, measuredProperty, measuredValue (or
 * median, etc.) and observationDate (measuredProperty properties can, but
 * need not always, be W3C RDF Data Cube "measure properties", as in the
 * lifeExpectancy example). See also StatisticalPopulation, and the data and
 * datasets overview for more details.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Observation
 */
class Observation extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Observation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Observation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Instances of the class Observation are used to specify observations about an entity (which may or may not be an instance of a StatisticalPopulation), at a particular time. The principal properties of an Observation are observedNode, measuredProperty, measuredValue (or median, etc.) and observationDate (measuredProperty properties can, but need not always, be W3C RDF Data Cube "measure properties", as in the lifeExpectancy example). See also StatisticalPopulation, and the data and datasets overview for more details.';

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
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'marginOfError',
        'measuredProperty',
        'measuredValue',
        'observationDate',
        'observedNode'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'marginOfError' => ['DateTime'],
        'measuredProperty' => ['Property'],
        'measuredValue' => ['DataType'],
        'observationDate' => ['DateTime'],
        'observedNode' => ['StatisticalPopulation']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'marginOfError' => 'A marginOfError for an Observation.',
        'measuredProperty' => 'The measuredProperty of an Observation, either a schema.org property, a property from other RDF-compatible systems e.g. W3C RDF Data Cube, or schema.org extensions such as GS1\'s.',
        'measuredValue' => 'The measuredValue of an Observation.',
        'observationDate' => 'The observationDate of an Observation.',
        'observedNode' => 'The observedNode of an Observation, often a StatisticalPopulation.'
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

    // Static Protected Properties
    // =========================================================================
    /**
     * A marginOfError for an Observation.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $marginOfError;
    /**
     * The measuredProperty of an Observation, either a schema.org property, a
     * property from other RDF-compatible systems e.g. W3C RDF Data Cube, or
     * schema.org extensions such as GS1's.
     *
     * @var Property [schema.org types: Property]
     */
    public $measuredProperty;
    /**
     * The measuredValue of an Observation.
     *
     * @var DataType [schema.org types: DataType]
     */
    public $measuredValue;
    /**
     * The observationDate of an Observation.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $observationDate;
    /**
     * The observedNode of an Observation, often a StatisticalPopulation.
     *
     * @var StatisticalPopulation [schema.org types: StatisticalPopulation]
     */
    public $observedNode;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
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
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['marginOfError', 'measuredProperty', 'measuredValue', 'observationDate', 'observedNode'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
