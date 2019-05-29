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
 * MedicalProcedure - A process of care used in either a diagnostic,
 * therapeutic, preventive or palliative capacity that relies on invasive
 * (surgical), non-invasive, or other techniques.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MedicalProcedure
 */
class MedicalProcedure extends MedicalEntity
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MedicalProcedure';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MedicalProcedure';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A process of care used in either a diagnostic, therapeutic, preventive or palliative capacity that relies on invasive (surgical), non-invasive, or other techniques.';

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
     * Location in the body of the anatomical structure.
     *
     * @var string [schema.org types: Text]
     */
    public $bodyLocation;

    /**
     * Typical or recommended followup care after the procedure is performed.
     *
     * @var string [schema.org types: Text]
     */
    public $followup;

    /**
     * How the procedure is performed.
     *
     * @var string [schema.org types: Text]
     */
    public $howPerformed;

    /**
     * A factor that indicates use of this therapy for treatment and/or prevention
     * of a condition, symptom, etc. For therapies such as drugs, indications can
     * include both officially-approved indications as well as off-label uses.
     * These can be distinguished by using the ApprovedIndication subtype of
     * MedicalIndication.
     *
     * @var MedicalIndication [schema.org types: MedicalIndication]
     */
    public $indication;

    /**
     * Expected or actual outcomes of the study.
     *
     * @var mixed|MedicalEntity|string [schema.org types: MedicalEntity, Text]
     */
    public $outcome;

    /**
     * Typical preparation that a patient must undergo before having the procedure
     * performed.
     *
     * @var mixed|MedicalEntity|string [schema.org types: MedicalEntity, Text]
     */
    public $preparation;

    /**
     * The type of procedure, for example Surgical, Noninvasive, or Percutaneous.
     *
     * @var mixed|MedicalProcedureType [schema.org types: MedicalProcedureType]
     */
    public $procedureType;

    /**
     * The status of the study (enumerated).
     *
     * @var mixed|EventStatusType|MedicalStudyStatus|string [schema.org types: EventStatusType, MedicalStudyStatus, Text]
     */
    public $status;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'bodyLocation',
        'followup',
        'howPerformed',
        'indication',
        'outcome',
        'preparation',
        'procedureType',
        'status'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'bodyLocation' => ['Text'],
        'followup' => ['Text'],
        'howPerformed' => ['Text'],
        'indication' => ['MedicalIndication'],
        'outcome' => ['MedicalEntity','Text'],
        'preparation' => ['MedicalEntity','Text'],
        'procedureType' => ['MedicalProcedureType'],
        'status' => ['EventStatusType','MedicalStudyStatus','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'bodyLocation' => 'Location in the body of the anatomical structure.',
        'followup' => 'Typical or recommended followup care after the procedure is performed.',
        'howPerformed' => 'How the procedure is performed.',
        'indication' => 'A factor that indicates use of this therapy for treatment and/or prevention of a condition, symptom, etc. For therapies such as drugs, indications can include both officially-approved indications as well as off-label uses. These can be distinguished by using the ApprovedIndication subtype of MedicalIndication.',
        'outcome' => 'Expected or actual outcomes of the study.',
        'preparation' => 'Typical preparation that a patient must undergo before having the procedure performed.',
        'procedureType' => 'The type of procedure, for example Surgical, Noninvasive, or Percutaneous.',
        'status' => 'The status of the study (enumerated).'
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
            [['bodyLocation','followup','howPerformed','indication','outcome','preparation','procedureType','status'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
