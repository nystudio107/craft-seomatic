<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for Drug.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Drug
 */

trait DrugTrait
{
    
    /**
     * Pregnancy category of this drug.
     *
     * @var DrugPregnancyCategory
     */
    public $pregnancyCategory;

    /**
     * Any information related to overdose on a drug, including signs or symptoms,
     * treatments, contact information for emergency response.
     *
     * @var string|Text
     */
    public $overdosage;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|DrugLegalStatus|Text|MedicalEnumeration
     */
    public $legalStatus;

    /**
     * The specific biochemical interaction through which this drug or supplement
     * produces its pharmacological effect.
     *
     * @var string|Text
     */
    public $mechanismOfAction;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD).
     *
     * @var string|Text
     */
    public $clinicalPharmacology;

    /**
     * The RxCUI drug identifier from RXNORM.
     *
     * @var string|Text
     */
    public $rxcui;

    /**
     * Another drug that is known to interact with this drug in a way that impacts
     * the effect of this drug or causes a risk to the patient. Note: disease
     * interactions are typically captured as contraindications.
     *
     * @var Drug
     */
    public $interactingDrug;

    /**
     * A dosage form in which this drug/supplement is available, e.g. 'tablet',
     * 'suspension', 'injection'.
     *
     * @var string|Text
     */
    public $dosageForm;

    /**
     * Link to the drug's label details.
     *
     * @var URL
     */
    public $labelDetails;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var MaximumDoseSchedule
     */
    public $maximumIntake;

    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|Text
     */
    public $activeIngredient;

    /**
     * Any other drug related to this one, for example commonly-prescribed
     * alternatives.
     *
     * @var Drug
     */
    public $relatedDrug;

    /**
     * A route by which this drug may be administered, e.g. 'oral'.
     *
     * @var string|Text
     */
    public $administrationRoute;

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @var string|Text
     */
    public $drugUnit;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * specific foods while taking this drug.
     *
     * @var string|Text
     */
    public $foodWarning;

    /**
     * Any FDA or other warnings about the drug (text or URL).
     *
     * @var string|URL|Text
     */
    public $warning;

    /**
     * Indicates the status of drug prescription eg. local catalogs
     * classifications or whether the drug is available by prescription or
     * over-the-counter, etc.
     *
     * @var string|DrugPrescriptionStatus|Text
     */
    public $prescriptionStatus;

    /**
     * Proprietary name given to the diet plan, typically by its originator or
     * creator.
     *
     * @var string|Text
     */
    public $proprietaryName;

    /**
     * The class of drug this belongs to (e.g., statins).
     *
     * @var DrugClass
     */
    public $drugClass;

    /**
     * Link to prescribing information for the drug.
     *
     * @var URL
     */
    public $prescribingInfo;

    /**
     * The insurance plans that cover this drug.
     *
     * @var HealthInsurancePlan
     */
    public $includedInHealthInsurancePlan;

    /**
     * The generic name of this drug or supplement.
     *
     * @var string|Text
     */
    public $nonProprietaryName;

    /**
     * The manufacturer of the product.
     *
     * @var Organization
     */
    public $manufacturer;

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @var bool|Boolean
     */
    public $isProprietary;

    /**
     * Description of the absorption and elimination of drugs, including their
     * concentration (pharmacokinetics, pK) and biological effects
     * (pharmacodynamics, pD).
     *
     * @var string|Text
     */
    public $clincalPharmacology;

    /**
     * True if the drug is available in a generic form (regardless of name).
     *
     * @var bool|Boolean
     */
    public $isAvailableGenerically;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * by breastfeeding mothers.
     *
     * @var string|Text
     */
    public $breastfeedingWarning;

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use
     * during pregnancy.
     *
     * @var string|Text
     */
    public $pregnancyWarning;

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of
     * alcohol while taking this drug.
     *
     * @var string|Text
     */
    public $alcoholWarning;

    /**
     * A dosing schedule for the drug for a given population, either observed,
     * recommended, or maximum dose based on the type used.
     *
     * @var DoseSchedule
     */
    public $doseSchedule;

    /**
     * An available dosage strength for the drug.
     *
     * @var DrugStrength
     */
    public $availableStrength;

}
