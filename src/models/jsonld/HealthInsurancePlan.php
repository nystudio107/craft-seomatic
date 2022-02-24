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
 * HealthInsurancePlan - A US-style health insurance plan, including PPOs,
 * EPOs, and HMOs.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/HealthInsurancePlan
 */
class HealthInsurancePlan extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'HealthInsurancePlan';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/HealthInsurancePlan';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A US-style health insurance plan, including PPOs, EPOs, and HMOs.';

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
        'benefitsSummaryUrl',
        'contactPoint',
        'healthPlanDrugOption',
        'healthPlanDrugTier',
        'healthPlanId',
        'healthPlanMarketingUrl',
        'includesHealthPlanFormulary',
        'includesHealthPlanNetwork',
        'usesHealthPlanIdStandard'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'benefitsSummaryUrl' => ['URL'],
        'contactPoint' => ['ContactPoint'],
        'healthPlanDrugOption' => ['Text'],
        'healthPlanDrugTier' => ['Text'],
        'healthPlanId' => ['Text'],
        'healthPlanMarketingUrl' => ['URL'],
        'includesHealthPlanFormulary' => ['HealthPlanFormulary'],
        'includesHealthPlanNetwork' => ['HealthPlanNetwork'],
        'usesHealthPlanIdStandard' => ['Text', 'URL']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'benefitsSummaryUrl' => 'The URL that goes directly to the summary of benefits and coverage for the specific standard plan or plan variation.',
        'contactPoint' => 'A contact point for a person or organization. Supersedes contactPoints.',
        'healthPlanDrugOption' => 'TODO.',
        'healthPlanDrugTier' => 'The tier(s) of drugs offered by this formulary or insurance plan.',
        'healthPlanId' => 'The 14-character, HIOS-generated Plan ID number. (Plan IDs must be unique, even across different markets.)',
        'healthPlanMarketingUrl' => 'The URL that goes directly to the plan brochure for the specific standard plan or plan variation.',
        'includesHealthPlanFormulary' => 'Formularies covered by this plan.',
        'includesHealthPlanNetwork' => 'Networks covered by this plan.',
        'usesHealthPlanIdStandard' => 'The standard for interpreting thePlan ID. The preferred is "HIOS". See the Centers for Medicare & Medicaid Services for more details.'
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
    /**
     * The URL that goes directly to the summary of benefits and coverage for the
     * specific standard plan or plan variation.
     *
     * @var string [schema.org types: URL]
     */
    public $benefitsSummaryUrl;
    /**
     * A contact point for a person or organization. Supersedes contactPoints.
     *
     * @var ContactPoint [schema.org types: ContactPoint]
     */
    public $contactPoint;
    /**
     * TODO.
     *
     * @var string [schema.org types: Text]
     */
    public $healthPlanDrugOption;
    /**
     * The tier(s) of drugs offered by this formulary or insurance plan.
     *
     * @var string [schema.org types: Text]
     */
    public $healthPlanDrugTier;

    // Static Protected Properties
    // =========================================================================
    /**
     * The 14-character, HIOS-generated Plan ID number. (Plan IDs must be unique,
     * even across different markets.)
     *
     * @var string [schema.org types: Text]
     */
    public $healthPlanId;
    /**
     * The URL that goes directly to the plan brochure for the specific standard
     * plan or plan variation.
     *
     * @var string [schema.org types: URL]
     */
    public $healthPlanMarketingUrl;
    /**
     * Formularies covered by this plan.
     *
     * @var HealthPlanFormulary [schema.org types: HealthPlanFormulary]
     */
    public $includesHealthPlanFormulary;
    /**
     * Networks covered by this plan.
     *
     * @var HealthPlanNetwork [schema.org types: HealthPlanNetwork]
     */
    public $includesHealthPlanNetwork;
    /**
     * The standard for interpreting thePlan ID. The preferred is "HIOS". See the
     * Centers for Medicare & Medicaid Services for more details.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $usesHealthPlanIdStandard;

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
            [['benefitsSummaryUrl', 'contactPoint', 'healthPlanDrugOption', 'healthPlanDrugTier', 'healthPlanId', 'healthPlanMarketingUrl', 'includesHealthPlanFormulary', 'includesHealthPlanNetwork', 'usesHealthPlanIdStandard'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
