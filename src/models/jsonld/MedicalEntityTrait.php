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
     * @var Organization
     */
    public $recognizingAuthority;

    /**
     * If applicable, a medical specialty in which this entity is relevant.
     *
     * @var MedicalSpecialty
     */
    public $relevantSpecialty;

    /**
     * The system of medicine that includes this MedicalEntity, for example
     * 'evidence-based', 'homeopathic', 'chiropractic', etc.
     *
     * @var MedicineSystem
     */
    public $medicineSystem;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var Grant
     */
    public $funding;

    /**
     * The drug or supplement's legal status, including any controlled substance
     * schedules that apply.
     *
     * @var string|Text|DrugLegalStatus|MedicalEnumeration
     */
    public $legalStatus;

    /**
     * A medical study or trial related to this entity.
     *
     * @var MedicalStudy
     */
    public $study;

    /**
     * A medical guideline related to this entity.
     *
     * @var MedicalGuideline
     */
    public $guideline;

    /**
     * A medical code for the entity, taken from a controlled vocabulary or
     * ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.
     *
     * @var MedicalCode
     */
    public $code;
}
