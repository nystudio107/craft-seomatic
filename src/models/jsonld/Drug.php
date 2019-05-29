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
 * Drug - A chemical or biologic substance, used as a medical therapy, that
 * has a physiological effect on an organism. Here the term drug is used
 * interchangeably with the term medicine although clinical knowledge make a
 * clear difference between them.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Drug
 */
class Drug extends Substance
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Drug';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Drug';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A chemical or biologic substance, used as a medical therapy, that has a physiological effect on an organism. Here the term drug is used interchangeably with the term medicine although clinical knowledge make a clear difference between them.';

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
     * A route by which this drug may be administered, e.g. 'oral'.
     *
     * @var string [schema.org types: Text]
     */
    public $administrationRoute;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * alcohol while taking this drug.
     *
     * @var string [schema.org types: Text]
     */
    public $alcoholWarning;

    /**
     * An available dosage strength for the drug.
     *
     * @var DrugStrength [schema.org types: DrugStrength]
     */
    public $availableStrength;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * by breastfeeding mothers.
     *
     * @var string [schema.org types: Text]
     */
    public $breastfeedingWarning;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD). Supersedes clincalPharmacology.
     *
     * @var string [schema.org types: Text]
     */
    public $clinicalPharmacology;

    /**
     * Cost per unit of the drug, as reported by the source being tagged.
     *
     * @var DrugCost [schema.org types: DrugCost]
     */
    public $cost;

    /**
     * A dosage form in which this drug/supplement is available, e.g. 'tablet',
     * 'suspension', 'injection'.
     *
     * @var string [schema.org types: Text]
     */
    public $dosageForm;

    /**
     * A dosing schedule for the drug for a given population, either observed,
     * recommended, or maximum dose based on the type used.
     *
     * @var DoseSchedule [schema.org types: DoseSchedule]
     */
    public $doseSchedule;

    /**
     * The class of drug this belongs to (e.g., statins).
     *
     * @var DrugClass [schema.org types: DrugClass]
     */
    public $drugClass;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string [schema.org types: Text]
     */
    public $drugUnit;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * specific foods while taking this drug.
     *
     * @var string [schema.org types: Text]
     */
    public $foodWarning;

    /**
     * The insurance plans that cover this drug.
     *
     * @var HealthInsurancePlan [schema.org types: HealthInsurancePlan]
     */
    public $includedInHealthInsurancePlan;

    /**
     * Another drug that is known to interact with this drug in a way that impacts
     * the effect of this drug or causes a risk to the patient. Note: disease
     * interactions are typically captured as contraindications.
     *
     * @var Drug [schema.org types: Drug]
     */
    public $interactingDrug;

    /**
     * True if the drug is available in a generic form (regardless of name).
     *
     * @var bool [schema.org types: Boolean]
     */
    public $isAvailableGenerically;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool [schema.org types: Boolean]
     */
    public $isProprietary;

    /**
     * Link to the drug's label details.
     *
     * @var string [schema.org types: URL]
     */
    public $labelDetails;

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
     * Any information related to overdose on a drug, including signs or symptoms,
     * treatments, contact information for emergency response.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $overdosage;

    /**
     * Pregnancy category of this drug.
     *
     * @var mixed|DrugPregnancyCategory [schema.org types: DrugPregnancyCategory]
     */
    public $pregnancyCategory;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * during pregnancy.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $pregnancyWarning;

    /**
     * Link to prescribing information for the drug.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $prescribingInfo;

    /**
     * Indicates the status of drug prescription eg. local catalogs
     * classifications or whether the drug is available by prescription or
     * over-the-counter, etc.
     *
     * @var mixed|DrugPrescriptionStatus|string [schema.org types: DrugPrescriptionStatus, Text]
     */
    public $prescriptionStatus;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $proprietaryName;

    /**
     * Any other drug related to this one, for example commonly-prescribed
     * alternatives.
     *
     * @var mixed|Drug [schema.org types: Drug]
     */
    public $relatedDrug;

    /**
     * The RxCUI drug identifier from RXNORM.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $rxcui;

    /**
     * Any FDA or other warnings about the drug (text or URL).
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $warning;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'activeIngredient',
        'administrationRoute',
        'alcoholWarning',
        'availableStrength',
        'breastfeedingWarning',
        'clinicalPharmacology',
        'cost',
        'dosageForm',
        'doseSchedule',
        'drugClass',
        'drugUnit',
        'foodWarning',
        'includedInHealthInsurancePlan',
        'interactingDrug',
        'isAvailableGenerically',
        'isProprietary',
        'labelDetails',
        'legalStatus',
        'manufacturer',
        'maximumIntake',
        'mechanismOfAction',
        'nonProprietaryName',
        'overdosage',
        'pregnancyCategory',
        'pregnancyWarning',
        'prescribingInfo',
        'prescriptionStatus',
        'proprietaryName',
        'relatedDrug',
        'rxcui',
        'warning'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'activeIngredient' => ['Text'],
        'administrationRoute' => ['Text'],
        'alcoholWarning' => ['Text'],
        'availableStrength' => ['DrugStrength'],
        'breastfeedingWarning' => ['Text'],
        'clinicalPharmacology' => ['Text'],
        'cost' => ['DrugCost'],
        'dosageForm' => ['Text'],
        'doseSchedule' => ['DoseSchedule'],
        'drugClass' => ['DrugClass'],
        'drugUnit' => ['Text'],
        'foodWarning' => ['Text'],
        'includedInHealthInsurancePlan' => ['HealthInsurancePlan'],
        'interactingDrug' => ['Drug'],
        'isAvailableGenerically' => ['Boolean'],
        'isProprietary' => ['Boolean'],
        'labelDetails' => ['URL'],
        'legalStatus' => ['DrugLegalStatus','MedicalEnumeration','Text'],
        'manufacturer' => ['Organization'],
        'maximumIntake' => ['MaximumDoseSchedule'],
        'mechanismOfAction' => ['Text'],
        'nonProprietaryName' => ['Text'],
        'overdosage' => ['Text'],
        'pregnancyCategory' => ['DrugPregnancyCategory'],
        'pregnancyWarning' => ['Text'],
        'prescribingInfo' => ['URL'],
        'prescriptionStatus' => ['DrugPrescriptionStatus','Text'],
        'proprietaryName' => ['Text'],
        'relatedDrug' => ['Drug'],
        'rxcui' => ['Text'],
        'warning' => ['Text','URL']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'activeIngredient' => 'An active ingredient, typically chemical compounds and/or biologic substances.',
        'administrationRoute' => 'A route by which this drug may be administered, e.g. \'oral\'.',
        'alcoholWarning' => 'Any precaution, guidance, contraindication, etc. related to consumption of alcohol while taking this drug.',
        'availableStrength' => 'An available dosage strength for the drug.',
        'breastfeedingWarning' => 'Any precaution, guidance, contraindication, etc. related to this drug\'s use by breastfeeding mothers.',
        'clinicalPharmacology' => 'Description of the absorption and elimination of drugs, including their concentration (pharmacokinetics, pK) and biological effects (pharmacodynamics, pD). Supersedes clincalPharmacology.',
        'cost' => 'Cost per unit of the drug, as reported by the source being tagged.',
        'dosageForm' => 'A dosage form in which this drug/supplement is available, e.g. \'tablet\', \'suspension\', \'injection\'.',
        'doseSchedule' => 'A dosing schedule for the drug for a given population, either observed, recommended, or maximum dose based on the type used.',
        'drugClass' => 'The class of drug this belongs to (e.g., statins).',
        'drugUnit' => 'The unit in which the drug is measured, e.g. \'5 mg tablet\'.',
        'foodWarning' => 'Any precaution, guidance, contraindication, etc. related to consumption of specific foods while taking this drug.',
        'includedInHealthInsurancePlan' => 'The insurance plans that cover this drug.',
        'interactingDrug' => 'Another drug that is known to interact with this drug in a way that impacts the effect of this drug or causes a risk to the patient. Note: disease interactions are typically captured as contraindications.',
        'isAvailableGenerically' => 'True if the drug is available in a generic form (regardless of name).',
        'isProprietary' => 'True if this item\'s name is a proprietary/brand name (vs. generic name).',
        'labelDetails' => 'Link to the drug\'s label details.',
        'legalStatus' => 'The drug or supplement\'s legal status, including any controlled substance schedules that apply.',
        'manufacturer' => 'The manufacturer of the product.',
        'maximumIntake' => 'Recommended intake of this supplement for a given population as defined by a specific recommending authority.',
        'mechanismOfAction' => 'The specific biochemical interaction through which this drug or supplement produces its pharmacological effect.',
        'nonProprietaryName' => 'The generic name of this drug or supplement.',
        'overdosage' => 'Any information related to overdose on a drug, including signs or symptoms, treatments, contact information for emergency response.',
        'pregnancyCategory' => 'Pregnancy category of this drug.',
        'pregnancyWarning' => 'Any precaution, guidance, contraindication, etc. related to this drug\'s use during pregnancy.',
        'prescribingInfo' => 'Link to prescribing information for the drug.',
        'prescriptionStatus' => 'Indicates the status of drug prescription eg. local catalogs classifications or whether the drug is available by prescription or over-the-counter, etc.',
        'proprietaryName' => 'Proprietary name given to the diet plan, typically by its originator or creator.',
        'relatedDrug' => 'Any other drug related to this one, for example commonly-prescribed alternatives.',
        'rxcui' => 'The RxCUI drug identifier from RXNORM.',
        'warning' => 'Any FDA or other warnings about the drug (text or URL).'
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
            [['activeIngredient','administrationRoute','alcoholWarning','availableStrength','breastfeedingWarning','clinicalPharmacology','cost','dosageForm','doseSchedule','drugClass','drugUnit','foodWarning','includedInHealthInsurancePlan','interactingDrug','isAvailableGenerically','isProprietary','labelDetails','legalStatus','manufacturer','maximumIntake','mechanismOfAction','nonProprietaryName','overdosage','pregnancyCategory','pregnancyWarning','prescribingInfo','prescriptionStatus','proprietaryName','relatedDrug','rxcui','warning'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
