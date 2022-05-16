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
 * Trait for MedicalClinic.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalClinic
 */

trait MedicalClinicTrait
{
    
    /**
     * A medical service available from this provider.
     *
     * @var MedicalTest|MedicalProcedure|MedicalTherapy
     */
    public $availableService;

    /**
     * A medical specialty of the provider.
     *
     * @var MedicalSpecialty
     */
    public $medicalSpecialty;

}
