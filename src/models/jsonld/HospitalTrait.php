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
 * Trait for Hospital.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Hospital
 */
trait HospitalTrait
{
    /**
     * A medical service available from this provider.
     *
     * @var array|MedicalTest|MedicalTest[]|array|MedicalProcedure|MedicalProcedure[]|array|MedicalTherapy|MedicalTherapy[]
     */
    public $availableService;

    /**
     * A medical specialty of the provider.
     *
     * @var array|MedicalSpecialty|MedicalSpecialty[]
     */
    public $medicalSpecialty;

    /**
     * Indicates data describing a hospital, e.g. a CDC [[CDCPMDRecord]] or as
     * some kind of [[Dataset]].
     *
     * @var array|CDCPMDRecord|CDCPMDRecord[]|array|Dataset|Dataset[]
     */
    public $healthcareReportingData;
}
