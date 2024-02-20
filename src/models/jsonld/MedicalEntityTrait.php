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
 * Trait for MedicalEntity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalEntity
 */
trait MedicalEntityTrait
{
    /**
     * If applicable, the organization that officially recognizes this entity as
     * part of its endorsed system of medicine.
     *
     * @var array|Organization|Organization[]
     */
    public $recognizingAuthority;

    /**
     * If applicable, a medical specialty in which this entity is relevant.
     *
     * @var array|MedicalSpecialty|MedicalSpecialty[]
     */
    public $relevantSpecialty;

    /**
     * A medical code for the entity, taken from a controlled vocabulary or
     * ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.
     *
     * @var array|MedicalCode|MedicalCode[]
     */
    public $code;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|array|Text|Text[]|array|DrugLegalStatus|DrugLegalStatus[]|array|MedicalEnumeration|MedicalEnumeration[]
     */
    public $legalStatus;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var array|Grant|Grant[]
     */
    public $funding;

    /**
     * A medical study or trial related to this entity.
     *
     * @var array|MedicalStudy|MedicalStudy[]
     */
    public $study;

    /**
     * A medical guideline related to this entity.
     *
     * @var array|MedicalGuideline|MedicalGuideline[]
     */
    public $guideline;

    /**
     * The system of medicine that includes this MedicalEntity, for example
     * 'evidence-based', 'homeopathic', 'chiropractic', etc.
     *
     * @var array|MedicineSystem|MedicineSystem[]
     */
    public $medicineSystem;
}
