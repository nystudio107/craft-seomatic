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
 * Trait for Physician.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Physician
 */
trait PhysicianTrait
{
    /**
     * A medical service available from this provider.
     *
     * @var array|MedicalTest|MedicalTest[]|array|MedicalProcedure|MedicalProcedure[]|array|MedicalTherapy|MedicalTherapy[]
     */
    public $availableService;

    /**
     * A category describing the job, preferably using a term from a taxonomy such
     * as [BLS O*NET-SOC](http://www.onetcenter.org/taxonomy.html),
     * [ISCO-08](https://www.ilo.org/public/english/bureau/stat/isco/isco08/) or
     * similar, with the property repeated for each applicable value. Ideally the
     * taxonomy should be identified, and both the textual label and formal code
     * for the category should be provided.  Note: for historical reasons, any
     * textual label and formal code provided as a literal may be assumed to be
     * from O*NET-SOC.
     *
     * @var string|array|Text|Text[]|array|CategoryCode|CategoryCode[]
     */
    public $occupationalCategory;

    /**
     * A hospital with which the physician or office is affiliated.
     *
     * @var array|Hospital|Hospital[]
     */
    public $hospitalAffiliation;

    /**
     * A medical specialty of the provider.
     *
     * @var array|MedicalSpecialty|MedicalSpecialty[]
     */
    public $medicalSpecialty;

    /**
     * A <a
     * href="https://en.wikipedia.org/wiki/National_Provider_Identifier">National
     * Provider Identifier</a> (NPI)      is a unique 10-digit identification
     * number issued to health care providers in the United States by the Centers
     * for Medicare and Medicaid Services.
     *
     * @var string|array|Text|Text[]
     */
    public $usNPI;
}
