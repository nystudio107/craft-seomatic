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
 * schema.org version: v30.0
 * Trait for Occupation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Occupation
 */
trait OccupationTrait
{
    /**
     * Educational background needed for the position or Occupation.
     *
     * @var string|array|EducationalOccupationalCredential|EducationalOccupationalCredential[]|array|Text|Text[]
     */
    public $educationRequirements;

    /**
     * An estimated salary for a job posting or occupation, based on a variety of
     * variables including, but not limited to industry, job title, and location.
     * Estimated salaries  are often computed by outside organizations rather than
     * the hiring organization, who may not have committed to the estimated value.
     *
     * @var float|array|MonetaryAmount|MonetaryAmount[]|array|MonetaryAmountDistribution|MonetaryAmountDistribution[]|array|Number|Number[]
     */
    public $estimatedSalary;

    /**
     * Description of skills and experience needed for the position or Occupation.
     *
     * @var string|array|OccupationalExperienceRequirements|OccupationalExperienceRequirements[]|array|Text|Text[]
     */
    public $experienceRequirements;

    /**
     * The region/country for which this occupational description is appropriate.
     * Note that educational requirements and qualifications can vary between
     * jurisdictions.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $occupationLocation;

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
     * @var string|array|CategoryCode|CategoryCode[]|array|Text|Text[]
     */
    public $occupationalCategory;

    /**
     * Specific qualifications required for this role or Occupation.
     *
     * @var string|array|Credential|Credential[]|array|Text|Text[]
     */
    public $qualifications;

    /**
     * Responsibilities associated with this role or Occupation.
     *
     * @var string|array|Text|Text[]
     */
    public $responsibilities;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is either claimed by a person, an organization
     * or desired or required to fulfill a role or to work in an occupation.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $skills;
}
