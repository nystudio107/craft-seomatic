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
 * MedicalStudy - A medical study is an umbrella type covering all kinds of
 * research studies relating to human medicine or health, including
 * observational studies and interventional trials and registries, randomized,
 * controlled or not. When the specific type of study is known, use one of the
 * extensions of this type, such as MedicalTrial or MedicalObservationalStudy.
 * Also, note that this type should be used to mark up data that describes the
 * study itself; to tag an article that publishes the results of a study, use
 * MedicalScholarlyArticle. Note: use the code property of MedicalEntity to
 * store study IDs, e.g. clinicaltrials.gov ID.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MedicalStudy
 */
class MedicalStudy extends MedicalEntity
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MedicalStudy';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MedicalStudy';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A medical study is an umbrella type covering all kinds of research studies relating to human medicine or health, including observational studies and interventional trials and registries, randomized, controlled or not. When the specific type of study is known, use one of the extensions of this type, such as MedicalTrial or MedicalObservationalStudy. Also, note that this type should be used to mark up data that describes the study itself; to tag an article that publishes the results of a study, use MedicalScholarlyArticle. Note: use the code property of MedicalEntity to store study IDs, e.g. clinicaltrials.gov ID.';

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
     * Specifying the health condition(s) of a patient, medical study, or other
     * target audience.
     *
     * @var MedicalCondition [schema.org types: MedicalCondition]
     */
    public $healthCondition;

    /**
     * Expected or actual outcomes of the study.
     *
     * @var mixed|MedicalEntity|string [schema.org types: MedicalEntity, Text]
     */
    public $outcome;

    /**
     * Any characteristics of the population used in the study, e.g. 'males under
     * 65'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $population;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $sponsor;

    /**
     * The status of the study (enumerated).
     *
     * @var mixed|EventStatusType|MedicalStudyStatus|string [schema.org types: EventStatusType, MedicalStudyStatus, Text]
     */
    public $status;

    /**
     * The location in which the study is taking/took place.
     *
     * @var mixed|AdministrativeArea [schema.org types: AdministrativeArea]
     */
    public $studyLocation;

    /**
     * A subject of the study, i.e. one of the medical conditions, therapies,
     * devices, drugs, etc. investigated by the study.
     *
     * @var mixed|MedicalEntity [schema.org types: MedicalEntity]
     */
    public $studySubject;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'healthCondition',
        'outcome',
        'population',
        'sponsor',
        'status',
        'studyLocation',
        'studySubject'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'healthCondition' => ['MedicalCondition'],
        'outcome' => ['MedicalEntity','Text'],
        'population' => ['Text'],
        'sponsor' => ['Organization','Person'],
        'status' => ['EventStatusType','MedicalStudyStatus','Text'],
        'studyLocation' => ['AdministrativeArea'],
        'studySubject' => ['MedicalEntity']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'healthCondition' => 'Specifying the health condition(s) of a patient, medical study, or other target audience.',
        'outcome' => 'Expected or actual outcomes of the study.',
        'population' => 'Any characteristics of the population used in the study, e.g. \'males under 65\'.',
        'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
        'status' => 'The status of the study (enumerated).',
        'studyLocation' => 'The location in which the study is taking/took place.',
        'studySubject' => 'A subject of the study, i.e. one of the medical conditions, therapies, devices, drugs, etc. investigated by the study.'
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
            [['healthCondition','outcome','population','sponsor','status','studyLocation','studySubject'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
