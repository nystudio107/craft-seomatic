<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
     * @var float|MonetaryAmountDistribution|MonetaryAmount|Number
     */
    public $estimatedSalary;

    /**
     * Responsibilities associated with this role or Occupation.
     *
     * @var string|Text
     */
    public $responsibilities;

    /**
     *  The region/country for which this occupational description is appropriate.
     * Note that educational requirements and qualifications can vary between
     * jurisdictions.
     *
     * @var AdministrativeArea
     */
    public $occupationLocation;

    /**
     * Description of skills and experience needed for the position or Occupation.
     *
     * @var string|Text|OccupationalExperienceRequirements
     */
    public $experienceRequirements;

    /**
     * Educational background needed for the position or Occupation.
     *
     * @var string|EducationalOccupationalCredential|Text
     */
    public $educationRequirements;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is desired or required to fulfill this role or
     * to work in this occupation.
     *
     * @var string|Text|DefinedTerm
     */
    public $skills;

    /**
     * Specific qualifications required for this role or Occupation.
     *
     * @var string|Text|EducationalOccupationalCredential
     */
    public $qualifications;

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
     * @var string|CategoryCode|Text
     */
    public $occupationalCategory;

}
