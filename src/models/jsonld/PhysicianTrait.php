<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Physician.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Physician
 */
trait PhysicianTrait
{
    /**
     * A hospital with which the physician or office is affiliated.
     *
     * @var Hospital
     */
    public $hospitalAffiliation;

    /**
     * A medical specialty of the provider.
     *
     * @var MedicalSpecialty
     */
    public $medicalSpecialty;

    /**
     * A medical service available from this provider.
     *
     * @var MedicalTherapy|MedicalTest|MedicalProcedure
     */
    public $availableService;
}
