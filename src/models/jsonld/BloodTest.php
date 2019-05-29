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

use nystudio107\seomatic\models\jsonld\MedicalTest;

/**
 * BloodTest - A medical test performed on a sample of a patient's blood.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/BloodTest
 */
class BloodTest extends MedicalTest
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'BloodTest';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/BloodTest';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A medical test performed on a sample of a patient\'s blood.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MedicalTest';

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
     * Drugs that affect the test's results.
     *
     * @var Drug [schema.org types: Drug]
     */
    public $affectedBy;

    /**
     * Range of acceptable values for a typical patient, when applicable.
     *
     * @var mixed|MedicalEnumeration|string [schema.org types: MedicalEnumeration, Text]
     */
    public $normalRange;

    /**
     * A sign detected by the test.
     *
     * @var mixed|MedicalSign [schema.org types: MedicalSign]
     */
    public $signDetected;

    /**
     * A condition the test is used to diagnose.
     *
     * @var mixed|MedicalCondition [schema.org types: MedicalCondition]
     */
    public $usedToDiagnose;

    /**
     * Device used to perform the test.
     *
     * @var mixed|MedicalDevice [schema.org types: MedicalDevice]
     */
    public $usesDevice;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'affectedBy',
        'normalRange',
        'signDetected',
        'usedToDiagnose',
        'usesDevice'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'affectedBy' => ['Drug'],
        'normalRange' => ['MedicalEnumeration','Text'],
        'signDetected' => ['MedicalSign'],
        'usedToDiagnose' => ['MedicalCondition'],
        'usesDevice' => ['MedicalDevice']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'affectedBy' => 'Drugs that affect the test\'s results.',
        'normalRange' => 'Range of acceptable values for a typical patient, when applicable.',
        'signDetected' => 'A sign detected by the test.',
        'usedToDiagnose' => 'A condition the test is used to diagnose.',
        'usesDevice' => 'Device used to perform the test.'
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
            [['affectedBy','normalRange','signDetected','usedToDiagnose','usesDevice'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
