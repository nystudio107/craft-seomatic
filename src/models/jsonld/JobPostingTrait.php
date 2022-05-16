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
 * Trait for JobPosting.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/JobPosting
 */

trait JobPostingTrait
{
    
    /**
     * A description of the employer, career opportunities and work environment
     * for this position.
     *
     * @var string|Text
     */
    public $employerOverview;

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
     * A description of the job location (e.g TELECOMMUTE for telecommute jobs).
     *
     * @var string|Text
     */
    public $jobLocationType;

    /**
     * Responsibilities associated with this role or Occupation.
     *
     * @var string|Text
     */
    public $responsibilities;

    /**
     * A (typically single) geographic location associated with the job position.
     *
     * @var Place
     */
    public $jobLocation;

    /**
     * A description of the types of physical activity associated with the job.
     * Defined terms such as those in O*net may be used, but note that there is no
     * way to specify the level of ability as well as its nature when using a
     * defined term.
     *
     * @var string|URL|Text|DefinedTerm
     */
    public $physicalRequirement;

    /**
     * Description of bonus and commission compensation aspects of the job.
     *
     * @var string|Text
     */
    public $incentives;

    /**
     * Indicates whether an [[url]] that is associated with a [[JobPosting]]
     * enables direct application for the job, via the posting website. A job
     * posting is considered to have directApply of [[True]] if an application
     * process for the specified job can be directly initiated via the url(s)
     * given (noting that e.g. multiple internet domains might nevertheless be
     * involved at an implementation level). A value of [[False]] is appropriate
     * if there is no clear path to applying directly online for the specified
     * job, navigating directly from the JobPosting url(s) supplied.
     *
     * @var bool|Boolean
     */
    public $directApply;

    /**
     * A description of any sensory requirements and levels necessary to function
     * on the job, including hearing and vision. Defined terms such as those in
     * O*net may be used, but note that there is no way to specify the level of
     * ability as well as its nature when using a defined term.
     *
     * @var string|DefinedTerm|URL|Text
     */
    public $sensoryRequirement;

    /**
     * The location(s) applicants can apply from. This is usually used for
     * telecommuting jobs where the applicant does not need to be in a physical
     * office. Note: This should not be used for citizenship or work visa
     * requirements.
     *
     * @var AdministrativeArea
     */
    public $applicantLocationRequirements;

    /**
     * The typical working hours for this job (e.g. 1st shift, night shift,
     * 8am-5pm).
     *
     * @var string|Text
     */
    public $workHours;

    /**
     * The date on which a successful applicant for this job would be expected to
     * start work. Choose a specific date in the future or use the
     * jobImmediateStart property to indicate the position is to be filled as soon
     * as possible.
     *
     * @var string|Date|Text
     */
    public $jobStartDate;

    /**
     * Type of employment (e.g. full-time, part-time, contract, temporary,
     * seasonal, internship).
     *
     * @var string|Text
     */
    public $employmentType;

    /**
     * Any special commitments associated with this job posting. Valid entries
     * include VeteranCommit, MilitarySpouseCommit, etc.
     *
     * @var string|Text
     */
    public $specialCommitments;

    /**
     * Contact details for further information relevant to this job posting.
     *
     * @var ContactPoint
     */
    public $applicationContact;

    /**
     * Description of bonus and commission compensation aspects of the job.
     *
     * @var string|Text
     */
    public $incentiveCompensation;

    /**
     * The Occupation for the JobPosting.
     *
     * @var Occupation
     */
    public $relevantOccupation;

    /**
     * The number of positions open for this job posting. Use a positive integer.
     * Do not use if the number of positions is unclear or not known.
     *
     * @var int|Integer
     */
    public $totalJobOpenings;

    /**
     * Description of skills and experience needed for the position or Occupation.
     *
     * @var string|Text|OccupationalExperienceRequirements
     */
    public $experienceRequirements;

    /**
     * Description of benefits associated with the job.
     *
     * @var string|Text
     */
    public $jobBenefits;

    /**
     * The currency (coded using [ISO 4217](http://en.wikipedia.org/wiki/ISO_4217)
     * ) used for the main salary information in this job posting or for this
     * employee.
     *
     * @var string|Text
     */
    public $salaryCurrency;

    /**
     * Indicates whether a [[JobPosting]] will accept experience (as indicated by
     * [[OccupationalExperienceRequirements]]) in place of its formal educational
     * qualifications (as indicated by [[educationRequirements]]). If true,
     * indicates that satisfying one of these requirements is sufficient.
     *
     * @var bool|Boolean
     */
    public $experienceInPlaceOfEducation;

    /**
     * A description of any security clearance requirements of the job.
     *
     * @var string|URL|Text
     */
    public $securityClearanceRequirement;

    /**
     * The legal requirements such as citizenship, visa and other documentation
     * required for an applicant to this job.
     *
     * @var string|Text
     */
    public $eligibilityToWorkRequirement;

    /**
     * Educational background needed for the position or Occupation.
     *
     * @var string|EducationalOccupationalCredential|Text
     */
    public $educationRequirements;

    /**
     * Description of benefits associated with the job.
     *
     * @var string|Text
     */
    public $benefits;

    /**
     * The industry associated with the job position.
     *
     * @var string|DefinedTerm|Text
     */
    public $industry;

    /**
     * The base salary of the job or of an employee in an EmployeeRole.
     *
     * @var float|Number|PriceSpecification|MonetaryAmount
     */
    public $baseSalary;

    /**
     * Publication date of an online listing.
     *
     * @var Date|DateTime
     */
    public $datePosted;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is desired or required to fulfill this role or
     * to work in this occupation.
     *
     * @var string|Text|DefinedTerm
     */
    public $skills;

    /**
     * The title of the job.
     *
     * @var string|Text
     */
    public $title;

    /**
     * Organization offering the job position.
     *
     * @var Organization
     */
    public $hiringOrganization;

    /**
     * An indicator as to whether a position is available for an immediate start.
     *
     * @var bool|Boolean
     */
    public $jobImmediateStart;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var DateTime|Date
     */
    public $validThrough;

    /**
     * Indicates the department, unit and/or facility where the employee reports
     * and/or in which the job is to be performed.
     *
     * @var Organization
     */
    public $employmentUnit;

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
