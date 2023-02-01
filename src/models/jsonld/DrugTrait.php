<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Drug.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Drug
 */
trait DrugTrait
{
    /**
     * The insurance plans that cover this drug.
     *
     * @var HealthInsurancePlan
     */
    public $includedInHealthInsurancePlan;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD).
     *
     * @var string|Text
     */
    public $clincalPharmacology;

    /**
     * Any FDA or other warnings about the drug (text or URL).
     *
     * @var string|Text|URL
     */
    public $warning;

    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|Text
     */
    public $activeIngredient;

    /**
     * The generic name of this drug or supplement.
     *
     * @var string|Text
     */
    public $nonProprietaryName;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * specific foods while taking this drug.
     *
     * @var string|Text
     */
    public $foodWarning;

    /**
     * An available dosage strength for the drug.
     *
     * @var DrugStrength
     */
    public $availableStrength;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * by breastfeeding mothers.
     *
     * @var string|Text
     */
    public $breastfeedingWarning;

    /**
     * A dosage form in which this drug/supplement is available, e.g. 'tablet',
     * 'suspension', 'injection'.
     *
     * @var string|Text
     */
    public $dosageForm;

    /**
     * True if the drug is available in a generic form (regardless of name).
     *
     * @var bool|Boolean
     */
    public $isAvailableGenerically;

    /**
     * Any other drug related to this one, for example commonly-prescribed
     * alternatives.
     *
     * @var Drug
     */
    public $relatedDrug;

    /**
     * Link to the drug's label details.
     *
     * @var URL
     */
    public $labelDetails;

    /**
     * A dosing schedule for the drug for a given population, either observed,
     * recommended, or maximum dose based on the type used.
     *
     * @var DoseSchedule
     */
    public $doseSchedule;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string|Text
     */
    public $drugUnit;

    /**
     * A route by which this drug may be administered, e.g. 'oral'.
     *
     * @var string|Text
     */
    public $administrationRoute;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var string|Text
     */
    public $proprietaryName;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD).
     *
     * @var string|Text
     */
    public $clinicalPharmacology;

    /**
     * Indicates the status of drug prescription, e.g. local catalogs
     * classifications or whether the drug is available by prescription or
     * over-the-counter, etc.
     *
     * @var string|Text|DrugPrescriptionStatus
     */
    public $prescriptionStatus;

    /**
     * Link to prescribing information for the drug.
     *
     * @var URL
     */
    public $prescribingInfo;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * during pregnancy.
     *
     * @var string|Text
     */
    public $pregnancyWarning;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|Text|DrugLegalStatus|MedicalEnumeration
     */
    public $legalStatus;

    /**
     * Any information related to overdose on a drug, including signs or symptoms,
     * treatments, contact information for emergency response.
     *
     * @var string|Text
     */
    public $overdosage;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool|Boolean
     */
    public $isProprietary;

    /**
     * The RxCUI drug identifier from RXNORM.
     *
     * @var string|Text
     */
    public $rxcui;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * alcohol while taking this drug.
     *
     * @var string|Text
     */
    public $alcoholWarning;

    /**
     * The class of drug this belongs to (e.g., statins).
     *
     * @var DrugClass
     */
    public $drugClass;

    /**
     * Another drug that is known to interact with this drug in a way that impacts
     * the effect of this drug or causes a risk to the patient. Note: disease
     * interactions are typically captured as contraindications.
     *
     * @var Drug
     */
    public $interactingDrug;

    /**
     * Pregnancy category of this drug.
     *
     * @var DrugPregnancyCategory
     */
    public $pregnancyCategory;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var MaximumDoseSchedule
     */
    public $maximumIntake;

    /**
     * The specific biochemical interaction through which this drug or supplement
     * produces its pharmacological effect.
     *
     * @var string|Text
     */
    public $mechanismOfAction;
}
