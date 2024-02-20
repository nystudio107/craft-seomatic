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
 * Trait for Occupation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Occupation
 */
trait OccupationTrait
{
    /**
     * An estimated salary for a job posting or occupation, based on a variety of
     * variables including, but not limited to industry, job title, and location.
     * Estimated salaries  are often computed by outside organizations rather than
     * the hiring organization, who may not have committed to the estimated value.
     *
     * @var float|array|MonetaryAmountDistribution|MonetaryAmountDistribution[]|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $estimatedSalary;

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
     * The region/country for which this occupational description is appropriate.
     * Note that educational requirements and qualifications can vary between
     * jurisdictions.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $occupationLocation;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is desired or required to fulfill this role or
     * to work in this occupation.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $skills;

    /**
     * Description of skills and experience needed for the position or Occupation.
     *
     * @var string|array|Text|Text[]|array|OccupationalExperienceRequirements|OccupationalExperienceRequirements[]
     */
    public $experienceRequirements;

    /**
     * Educational background needed for the position or Occupation.
     *
     * @var string|array|Text|Text[]|array|EducationalOccupationalCredential|EducationalOccupationalCredential[]
     */
    public $educationRequirements;

    /**
     * Specific qualifications required for this role or Occupation.
     *
     * @var string|array|EducationalOccupationalCredential|EducationalOccupationalCredential[]|array|Text|Text[]
     */
    public $qualifications;

    /**
     * Responsibilities associated with this role or Occupation.
     *
     * @var string|array|Text|Text[]
     */
    public $responsibilities;
}
