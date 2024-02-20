<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for Drug.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Drug
 */
trait DrugTrait
{
    /**
     * A dosage form in which this drug/supplement is available, e.g. 'tablet',
     * 'suspension', 'injection'.
     *
     * @var string|array|Text|Text[]
     */
    public $dosageForm;

    /**
     * Any information related to overdose on a drug, including signs or symptoms,
     * treatments, contact information for emergency response.
     *
     * @var string|array|Text|Text[]
     */
    public $overdosage;

    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|array|Text|Text[]
     */
    public $activeIngredient;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var array|MaximumDoseSchedule|MaximumDoseSchedule[]
     */
    public $maximumIntake;

    /**
     * Pregnancy category of this drug.
     *
     * @var array|DrugPregnancyCategory|DrugPregnancyCategory[]
     */
    public $pregnancyCategory;

    /**
     * True if the drug is available in a generic form (regardless of name).
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isAvailableGenerically;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * during pregnancy.
     *
     * @var string|array|Text|Text[]
     */
    public $pregnancyWarning;

    /**
     * The insurance plans that cover this drug.
     *
     * @var array|HealthInsurancePlan|HealthInsurancePlan[]
     */
    public $includedInHealthInsurancePlan;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|array|Text|Text[]|array|DrugLegalStatus|DrugLegalStatus[]|array|MedicalEnumeration|MedicalEnumeration[]
     */
    public $legalStatus;

    /**
     * Any FDA or other warnings about the drug (text or URL).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $warning;

    /**
     * A dosing schedule for the drug for a given population, either observed,
     * recommended, or maximum dose based on the type used.
     *
     * @var array|DoseSchedule|DoseSchedule[]
     */
    public $doseSchedule;

    /**
     * The class of drug this belongs to (e.g., statins).
     *
     * @var array|DrugClass|DrugClass[]
     */
    public $drugClass;

    /**
     * Link to prescribing information for the drug.
     *
     * @var array|URL|URL[]
     */
    public $prescribingInfo;

    /**
     * An available dosage strength for the drug.
     *
     * @var array|DrugStrength|DrugStrength[]
     */
    public $availableStrength;

    /**
     * A route by which this drug may be administered, e.g. 'oral'.
     *
     * @var string|array|Text|Text[]
     */
    public $administrationRoute;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * by breastfeeding mothers.
     *
     * @var string|array|Text|Text[]
     */
    public $breastfeedingWarning;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * specific foods while taking this drug.
     *
     * @var string|array|Text|Text[]
     */
    public $foodWarning;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD).
     *
     * @var string|array|Text|Text[]
     */
    public $clincalPharmacology;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string|array|Text|Text[]
     */
    public $drugUnit;

    /**
     * Another drug that is known to interact with this drug in a way that impacts
     * the effect of this drug or causes a risk to the patient. Note: disease
     * interactions are typically captured as contraindications.
     *
     * @var array|Drug|Drug[]
     */
    public $interactingDrug;

    /**
     * Link to the drug's label details.
     *
     * @var array|URL|URL[]
     */
    public $labelDetails;

    /**
     * Indicates the status of drug prescription, e.g. local catalogs
     * classifications or whether the drug is available by prescription or
     * over-the-counter, etc.
     *
     * @var string|array|Text|Text[]|array|DrugPrescriptionStatus|DrugPrescriptionStatus[]
     */
    public $prescriptionStatus;

    /**
     * The generic name of this drug or supplement.
     *
     * @var string|array|Text|Text[]
     */
    public $nonProprietaryName;

    /**
     * The specific biochemical interaction through which this drug or supplement
     * produces its pharmacological effect.
     *
     * @var string|array|Text|Text[]
     */
    public $mechanismOfAction;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isProprietary;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * alcohol while taking this drug.
     *
     * @var string|array|Text|Text[]
     */
    public $alcoholWarning;

    /**
     * The RxCUI drug identifier from RXNORM.
     *
     * @var string|array|Text|Text[]
     */
    public $rxcui;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD).
     *
     * @var string|array|Text|Text[]
     */
    public $clinicalPharmacology;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var string|array|Text|Text[]
     */
    public $proprietaryName;

    /**
     * Any other drug related to this one, for example commonly-prescribed
     * alternatives.
     *
     * @var array|Drug|Drug[]
     */
    public $relatedDrug;
}
