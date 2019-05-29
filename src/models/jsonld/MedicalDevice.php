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

use nystudio107\seomatic\models\jsonld\MedicalEntity;

/**
 * MedicalDevice - Any object used in a medical capacity, such as to diagnose
 * or treat a patient.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MedicalDevice
 */
class MedicalDevice extends MedicalEntity
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MedicalDevice';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MedicalDevice';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Any object used in a medical capacity, such as to diagnose or treat a patient.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MedicalEntity';

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
     * A possible complication and/or side effect of this therapy. If it is known
     * that an adverse outcome is serious (resulting in death, disability, or
     * permanent damage; requiring hospitalization; or is otherwise
     * life-threatening or requires immediate medical attention), tag it as a
     * seriouseAdverseOutcome instead.
     *
     * @var MedicalEntity [schema.org types: MedicalEntity]
     */
    public $adverseOutcome;

    /**
     * A contraindication for this therapy.
     *
     * @var mixed|MedicalContraindication|string [schema.org types: MedicalContraindication, Text]
     */
    public $contraindication;

    /**
     * A factor that indicates use of this therapy for treatment and/or prevention
     * of a condition, symptom, etc. For therapies such as drugs, indications can
     * include both officially-approved indications as well as off-label uses.
     * These can be distinguished by using the ApprovedIndication subtype of
     * MedicalIndication.
     *
     * @var mixed|MedicalIndication [schema.org types: MedicalIndication]
     */
    public $indication;

    /**
     * A description of the postoperative procedures, care, and/or followups for
     * this device.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $postOp;

    /**
     * A description of the workup, testing, and other preparations required
     * before implanting this device.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $preOp;

    /**
     * A description of the procedure involved in setting up, using, and/or
     * installing the device.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $procedure;

    /**
     * A goal towards an action is taken. Can be concrete or abstract.
     *
     * @var mixed|MedicalDevicePurpose|Thing [schema.org types: MedicalDevicePurpose, Thing]
     */
    public $purpose;

    /**
     * A possible serious complication and/or serious side effect of this therapy.
     * Serious adverse outcomes include those that are life-threatening; result in
     * death, disability, or permanent damage; require hospitalization or prolong
     * existing hospitalization; cause congenital anomalies or birth defects; or
     * jeopardize the patient and may require medical or surgical intervention to
     * prevent one of the outcomes in this definition.
     *
     * @var mixed|MedicalEntity [schema.org types: MedicalEntity]
     */
    public $seriousAdverseOutcome;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'adverseOutcome',
        'contraindication',
        'indication',
        'postOp',
        'preOp',
        'procedure',
        'purpose',
        'seriousAdverseOutcome'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'adverseOutcome' => ['MedicalEntity'],
        'contraindication' => ['MedicalContraindication','Text'],
        'indication' => ['MedicalIndication'],
        'postOp' => ['Text'],
        'preOp' => ['Text'],
        'procedure' => ['Text'],
        'purpose' => ['MedicalDevicePurpose','Thing'],
        'seriousAdverseOutcome' => ['MedicalEntity']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'adverseOutcome' => 'A possible complication and/or side effect of this therapy. If it is known that an adverse outcome is serious (resulting in death, disability, or permanent damage; requiring hospitalization; or is otherwise life-threatening or requires immediate medical attention), tag it as a seriouseAdverseOutcome instead.',
        'contraindication' => 'A contraindication for this therapy.',
        'indication' => 'A factor that indicates use of this therapy for treatment and/or prevention of a condition, symptom, etc. For therapies such as drugs, indications can include both officially-approved indications as well as off-label uses. These can be distinguished by using the ApprovedIndication subtype of MedicalIndication.',
        'postOp' => 'A description of the postoperative procedures, care, and/or followups for this device.',
        'preOp' => 'A description of the workup, testing, and other preparations required before implanting this device.',
        'procedure' => 'A description of the procedure involved in setting up, using, and/or installing the device.',
        'purpose' => 'A goal towards an action is taken. Can be concrete or abstract.',
        'seriousAdverseOutcome' => 'A possible serious complication and/or serious side effect of this therapy. Serious adverse outcomes include those that are life-threatening; result in death, disability, or permanent damage; require hospitalization or prolong existing hospitalization; cause congenital anomalies or birth defects; or jeopardize the patient and may require medical or surgical intervention to prevent one of the outcomes in this definition.'
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
            [['adverseOutcome','contraindication','indication','postOp','preOp','procedure','purpose','seriousAdverseOutcome'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
