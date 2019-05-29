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

use nystudio107\seomatic\models\jsonld\Substance;

/**
 * DietarySupplement - A product taken by mouth that contains a dietary
 * ingredient intended to supplement the diet. Dietary ingredients may include
 * vitamins, minerals, herbs or other botanicals, amino acids, and substances
 * such as enzymes, organ tissues, glandulars and metabolites.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/DietarySupplement
 */
class DietarySupplement extends Substance
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'DietarySupplement';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/DietarySupplement';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A product taken by mouth that contains a dietary ingredient intended to supplement the diet. Dietary ingredients may include vitamins, minerals, herbs or other botanicals, amino acids, and substances such as enzymes, organ tissues, glandulars and metabolites.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Substance';

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
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string [schema.org types: Text]
     */
    public $activeIngredient;

    /**
     * Descriptive information establishing a historical perspective on the
     * supplement. May include the rationale for the name, the population where
     * the supplement first came to prominence, etc.
     *
     * @var string [schema.org types: Text]
     */
    public $background;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool [schema.org types: Boolean]
     */
    public $isProprietary;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var mixed|DrugLegalStatus|MedicalEnumeration|string [schema.org types: DrugLegalStatus, MedicalEnumeration, Text]
     */
    public $legalStatus;

    /**
     * The manufacturer of the product.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $manufacturer;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var mixed|MaximumDoseSchedule [schema.org types: MaximumDoseSchedule]
     */
    public $maximumIntake;

    /**
     * The specific biochemical interaction through which this drug or supplement
     * produces its pharmacological effect.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $mechanismOfAction;

    /**
     * The generic name of this drug or supplement.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $nonProprietaryName;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $proprietaryName;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var mixed|RecommendedDoseSchedule [schema.org types: RecommendedDoseSchedule]
     */
    public $recommendedIntake;

    /**
     * Any potential safety concern associated with the supplement. May include
     * interactions with other drugs and foods, pregnancy, breastfeeding, known
     * adverse reactions, and documented efficacy of the supplement.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $safetyConsideration;

    /**
     * Characteristics of the population for which this is intended, or which
     * typically uses it, e.g. 'adults'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $targetPopulation;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'activeIngredient',
        'background',
        'isProprietary',
        'legalStatus',
        'manufacturer',
        'maximumIntake',
        'mechanismOfAction',
        'nonProprietaryName',
        'proprietaryName',
        'recommendedIntake',
        'safetyConsideration',
        'targetPopulation'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'activeIngredient' => ['Text'],
        'background' => ['Text'],
        'isProprietary' => ['Boolean'],
        'legalStatus' => ['DrugLegalStatus','MedicalEnumeration','Text'],
        'manufacturer' => ['Organization'],
        'maximumIntake' => ['MaximumDoseSchedule'],
        'mechanismOfAction' => ['Text'],
        'nonProprietaryName' => ['Text'],
        'proprietaryName' => ['Text'],
        'recommendedIntake' => ['RecommendedDoseSchedule'],
        'safetyConsideration' => ['Text'],
        'targetPopulation' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'activeIngredient' => 'An active ingredient, typically chemical compounds and/or biologic substances.',
        'background' => 'Descriptive information establishing a historical perspective on the supplement. May include the rationale for the name, the population where the supplement first came to prominence, etc.',
        'isProprietary' => 'True if this item\'s name is a proprietary/brand name (vs. generic name).',
        'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
        'manufacturer' => 'The manufacturer of the product.',
        'maximumIntake' => 'Recommended intake of this supplement for a given population as defined by a specific recommending authority.',
        'mechanismOfAction' => 'The specific biochemical interaction through which this drug or supplement produces its pharmacological effect.',
        'nonProprietaryName' => 'The generic name of this drug or supplement.',
        'proprietaryName' => 'Proprietary name given to the diet plan, typically by its originator or creator.',
        'recommendedIntake' => 'Recommended intake of this supplement for a given population as defined by a specific recommending authority.',
        'safetyConsideration' => 'Any potential safety concern associated with the supplement. May include interactions with other drugs and foods, pregnancy, breastfeeding, known adverse reactions, and documented efficacy of the supplement.',
        'targetPopulation' => 'Characteristics of the population for which this is intended, or which typically uses it, e.g. \'adults\'.'
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
            [['activeIngredient','background','isProprietary','legalStatus','manufacturer','maximumIntake','mechanismOfAction','nonProprietaryName','proprietaryName','recommendedIntake','safetyConsideration','targetPopulation'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
