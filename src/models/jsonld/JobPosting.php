<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * JobPosting - A listing that describes a job opening in a certain
 * organization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/JobPosting
 */
class JobPosting extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'JobPosting';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/JobPosting';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A listing that describes a job opening in a certain organization.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The location(s) applicants can apply from. This is usually used for
     * telecommuting jobs where the applicant does not need to be in a physical
     * office. Note: This should not be used for citizenship or work visa
     * requirements.
     *
     * @var AdministrativeArea [schema.org types: AdministrativeArea]
     */
    public $applicantLocationRequirements;

    /**
     * Contact details for further information relevant to this job posting.
     *
     * @var ContactPoint [schema.org types: ContactPoint]
     */
    public $applicationContact;

    /**
     * The base salary of the job or of an employee in an EmployeeRole.
     *
     * @var mixed|MonetaryAmount|float|PriceSpecification [schema.org types: MonetaryAmount, Number, PriceSpecification]
     */
    public $baseSalary;

    /**
     * Publication date of an online listing.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $datePosted;

    /**
     * Indicates whether an url that is associated with a JobPosting enables
     * direct application for the job, via the posting website. A job posting
     * is considered to have directApply of True if an application process for
     * the specified job can be directly initiated via the url(s) given
     * (noting that e.g. multiple internet domains might nevertheless be
     * involved at an implementation level). A value of False is appropriate if
     * there is no clear path to applying directly online for the specified job,
     * navigating directly from the JobPosting url(s) supplied..
     *
     * @var bool [schema.org types: Boolean]
     */
    public $directApply;

    /**
     * Educational background needed for the position or Occupation.
     *
     * @var mixed|EducationalOccupationalCredential|string [schema.org types: EducationalOccupationalCredential, Text]
     */
    public $educationRequirements;
    
    /**
     * The legal requirements such as citizenship, visa and other documentation
     * required for an applicant to this job.
     *
     * @var string [schema.org types: Text]
     */
    public $eligibilityToWorkRequirement;

    /**
     * A description of the employer, career opportunities and work environment
     * for this position.
     *
     * @var string [schema.org types: Text]
     */
    public $employerOverview;

    /**
     * Type of employment (e.g. full-time, part-time, contract, temporary,
     * seasonal, internship).
     *
     * @var string [schema.org types: Text]
     */
    public $employmentType;

    /**
     * Indicates the department, unit and/or facility where the employee reports
     * and/or in which the job is to be performed.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $employmentUnit;

    /**
     * An estimated salary for a job posting or occupation, based on a variety of
     * variables including, but not limited to industry, job title, and location.
     * Estimated salaries are often computed by outside organizations rather than
     * the hiring organization, who may not have committed to the estimated value.
     *
     * @var mixed|MonetaryAmount|MonetaryAmountDistribution|float [schema.org types: MonetaryAmount, MonetaryAmountDistribution, Number]
     */
    public $estimatedSalary;
    
    /**
     * Indicates whether a JobPosting will accept experience (as indicated by
     * OccupationalExperienceRequirements) in place of its formal educational
     * qualifications (as indicated by educationRequirements). If true, indicates
     * that satisfying one of these requirements is sufficient.
     *
     * @var bool [schema.org types: Boolean]
     */
    public $experienceInPlaceOfEducation;

    /**
     * Description of skills and experience needed for the position or Occupation.
     *
     * @var string [schema.org types: Text]
     */
    public $experienceRequirements;

    /**
     * Organization offering the job position.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $hiringOrganization;

    /**
     * Description of bonus and commission compensation aspects of the job.
     * Supersedes incentives.
     *
     * @var string [schema.org types: Text]
     */
    public $incentiveCompensation;

    /**
     * The industry associated with the job position.
     *
     * @var mixed|DefinedTerm|string [schema.org types: DefinedTerm, Text]
     */
    public $industry;

    /**
     * Description of benefits associated with the job. Supersedes benefits.
     *
     * @var string [schema.org types: Text]
     */
    public $jobBenefits;

    /**
     * An indicator as to whether a position is available for an immediate start.
     *
     * @var bool [schema.org types: Boolean]
     */
    public $jobImmediateStart;

    /**
     * A (typically single) geographic location associated with the job position.
     *
     * @var Place [schema.org types: Place]
     */
    public $jobLocation;

    /**
     * A description of the job location (e.g TELECOMMUTE for telecommute jobs).
     *
     * @var string [schema.org types: Text]
     */
    public $jobLocationType;

    /**
     * The date on which a successful applicant for this job would be expected to
     * start work. Choose a specific date in the future or use the
     * jobImmediateStart property to indicate the position is to be filled as soon
     * as possible.
     *
     * @var mixed|Date|string [schema.org types: Date, Text]
     */
    public $jobStartDate;

    /**
     * A category describing the job, preferably using a term from a taxonomy such
     * as BLS O*NET-SOC, ISCO-08 or similar, with the property repeated for each
     * applicable value. Ideally the taxonomy should be identified, and both the
     * textual label and formal code for the category should be provided. Note:
     * for historical reasons, any textual label and formal code provided as a
     * literal may be assumed to be from O*NET-SOC.
     *
     * @var mixed|CategoryCode|string [schema.org types: CategoryCode, Text]
     */
    public $occupationalCategory;

    /**
     * A description of the types of physical activity associated with the job.
     * Defined terms such as those in O*net may be used, but note that there is no
     * way to specify the level of ability as well as its nature when using a
     * defined term.
     *
     * @var mixed|DefinedTerm|string|string [schema.org types: DefinedTerm, Text, URL]
     */
    public $physicalRequirement;

    /**
     * Specific qualifications required for this role or Occupation.
     *
     * @var mixed|EducationalOccupationalCredential|string [schema.org types: EducationalOccupationalCredential, Text]
     */
    public $qualifications;

    /**
     * The Occupation for the JobPosting.
     *
     * @var Occupation [schema.org types: Occupation]
     */
    public $relevantOccupation;

    /**
     * Responsibilities associated with this role or Occupation.
     *
     * @var string [schema.org types: Text]
     */
    public $responsibilities;

    /**
     * The currency (coded using ISO 4217 ) used for the main salary information
     * in this job posting or for this employee.
     *
     * @var string [schema.org types: Text]
     */
    public $salaryCurrency;

    /**
     * A description of any security clearance requirements of the job.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $securityClearanceRequirement;

    /**
     * A description of any sensory requirements and levels necessary to function
     * on the job, including hearing and vision. Defined terms such as those in
     * O*net may be used, but note that there is no way to specify the level of
     * ability as well as its nature when using a defined term.
     *
     * @var mixed|DefinedTerm|string|string [schema.org types: DefinedTerm, Text, URL]
     */
    public $sensoryRequirement;

    /**
     * A statement of knowledge, skill, ability, task or any other assertion
     * expressing a competency that is desired or required to fulfill this role or
     * to work in this occupation.
     *
     * @var mixed|DefinedTerm|string [schema.org types: DefinedTerm, Text]
     */
    public $skills;

    /**
     * Any special commitments associated with this job posting. Valid entries
     * include VeteranCommit, MilitarySpouseCommit, etc.
     *
     * @var string [schema.org types: Text]
     */
    public $specialCommitments;

    /**
     * The title of the job.
     *
     * @var string [schema.org types: Text]
     */
    public $title;

    /**
     * The number of positions open for this job posting. Use a positive integer.
     * Do not use if the number of positions is unclear or not known.
     *
     * @var int [schema.org types: Integer]
     */
    public $totalJobOpenings;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $validThrough;

    /**
     * The typical working hours for this job (e.g. 1st shift, night shift,
     * 8am-5pm).
     *
     * @var string [schema.org types: Text]
     */
    public $workHours;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'applicantLocationRequirements',
        'applicationContact',
        'baseSalary',
        'datePosted',
        'directApply',
        'educationRequirements',
        'eligibilityToWorkRequirement',
        'employerOverview',
        'employmentType',
        'employmentUnit',
        'estimatedSalary',
        'experienceInPlaceOfEducation',
        'experienceRequirements',
        'hiringOrganization',
        'incentiveCompensation',
        'industry',
        'jobBenefits',
        'jobImmediateStart',
        'jobLocation',
        'jobLocationType',
        'jobStartDate',
        'occupationalCategory',
        'physicalRequirement',
        'qualifications',
        'relevantOccupation',
        'responsibilities',
        'salaryCurrency',
        'securityClearanceRequirement',
        'sensoryRequirement',
        'skills',
        'specialCommitments',
        'title',
        'totalJobOpenings',
        'validThrough',
        'workHours'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'applicantLocationRequirements' => ['AdministrativeArea'],
        'applicationContact' => ['ContactPoint'],
        'baseSalary' => ['MonetaryAmount','Number','PriceSpecification'],
        'datePosted' => ['Date','DateTime'],
        'directApply' => ['Boolean'],
        'educationRequirements' => ['EducationalOccupationalCredential','Text'],
        'eligibilityToWorkRequirement' => ['Text'],
        'employerOverview' => ['Text'],
        'employmentType' => ['Text'],
        'employmentUnit' => ['Organization'],
        'estimatedSalary' => ['MonetaryAmount','MonetaryAmountDistribution','Number'],
        'experienceInPlaceOfEducation' => ['Boolean'],
        'experienceRequirements' => ['Text'],
        'hiringOrganization' => ['Organization'],
        'incentiveCompensation' => ['Text'],
        'industry' => ['DefinedTerm','Text'],
        'jobBenefits' => ['Text'],
        'jobImmediateStart' => ['Boolean'],
        'jobLocation' => ['Place'],
        'jobLocationType' => ['Text'],
        'jobStartDate' => ['Date','Text'],
        'occupationalCategory' => ['CategoryCode','Text'],
        'physicalRequirement' => ['DefinedTerm','Text','URL'],
        'qualifications' => ['EducationalOccupationalCredential','Text'],
        'relevantOccupation' => ['Occupation'],
        'responsibilities' => ['Text'],
        'salaryCurrency' => ['Text'],
        'securityClearanceRequirement' => ['Text','URL'],
        'sensoryRequirement' => ['DefinedTerm','Text','URL'],
        'skills' => ['DefinedTerm','Text'],
        'specialCommitments' => ['Text'],
        'title' => ['Text'],
        'totalJobOpenings' => ['Integer'],
        'validThrough' => ['Date','DateTime'],
        'workHours' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'applicantLocationRequirements' => 'The location(s) applicants can apply from. This is usually used for telecommuting jobs where the applicant does not need to be in a physical office. Note: This should not be used for citizenship or work visa requirements.',
        'applicationContact' => 'Contact details for further information relevant to this job posting.',
        'baseSalary' => 'The base salary of the job or of an employee in an EmployeeRole.',
        'datePosted' => 'Publication date of an online listing.',
        'directApply' => 'Indicates whether an url that is associated with a JobPosting enables direct application for the job, via the posting website. A job posting is considered to have directApply of True if an application process for the specified job can be directly initiated via the url(s) given (noting that e.g. multiple internet domains might nevertheless be involved at an implementation level). A value of False is appropriate if there is no clear path to applying directly online for the specified job, navigating directly from the JobPosting url(s) supplied.',
        'educationRequirements' => 'Educational background needed for the position or Occupation.',
        'eligibilityToWorkRequirement' => 'The legal requirements such as citizenship, visa and other documentation required for an applicant to this job.',
        'employerOverview' => 'A description of the employer, career opportunities and work environment for this position.',
        'employmentType' => 'Type of employment (e.g. full-time, part-time, contract, temporary, seasonal, internship).',
        'employmentUnit' => 'Indicates the department, unit and/or facility where the employee reports and/or in which the job is to be performed.',
        'estimatedSalary' => 'An estimated salary for a job posting or occupation, based on a variety of variables including, but not limited to industry, job title, and location. Estimated salaries are often computed by outside organizations rather than the hiring organization, who may not have committed to the estimated value.',
        'experienceInPlaceOfEducation' => 'Indicates whether a JobPosting will accept experience (as indicated by OccupationalExperienceRequirements) in place of its formal educational qualifications (as indicated by educationRequirements). If true, indicates that satisfying one of these requirements is sufficient.',
        'experienceRequirements' => 'Description of skills and experience needed for the position or Occupation.',
        'hiringOrganization' => 'Organization offering the job position.',
        'incentiveCompensation' => 'Description of bonus and commission compensation aspects of the job. Supersedes incentives.',
        'industry' => 'The industry associated with the job position.',
        'jobBenefits' => 'Description of benefits associated with the job. Supersedes benefits.',
        'jobImmediateStart' => 'An indicator as to whether a position is available for an immediate start.',
        'jobLocation' => 'A (typically single) geographic location associated with the job position.',
        'jobLocationType' => 'A description of the job location (e.g TELECOMMUTE for telecommute jobs).',
        'jobStartDate' => 'The date on which a successful applicant for this job would be expected to start work. Choose a specific date in the future or use the jobImmediateStart property to indicate the position is to be filled as soon as possible.',
        'occupationalCategory' => 'A category describing the job, preferably using a term from a taxonomy such as BLS O*NET-SOC, ISCO-08 or similar, with the property repeated for each applicable value. Ideally the taxonomy should be identified, and both the textual label and formal code for the category should be provided. Note: for historical reasons, any textual label and formal code provided as a literal may be assumed to be from O*NET-SOC.',
        'physicalRequirement' => 'A description of the types of physical activity associated with the job. Defined terms such as those in O*net may be used, but note that there is no way to specify the level of ability as well as its nature when using a defined term.',
        'qualifications' => 'Specific qualifications required for this role or Occupation.',
        'relevantOccupation' => 'The Occupation for the JobPosting.',
        'responsibilities' => 'Responsibilities associated with this role or Occupation.',
        'salaryCurrency' => 'The currency (coded using ISO 4217 ) used for the main salary information in this job posting or for this employee.',
        'securityClearanceRequirement' => 'A description of any security clearance requirements of the job.',
        'sensoryRequirement' => 'A description of any sensory requirements and levels necessary to function on the job, including hearing and vision. Defined terms such as those in O*net may be used, but note that there is no way to specify the level of ability as well as its nature when using a defined term.',
        'skills' => 'A statement of knowledge, skill, ability, task or any other assertion expressing a competency that is desired or required to fulfill this role or to work in this occupation.',
        'specialCommitments' => 'Any special commitments associated with this job posting. Valid entries include VeteranCommit, MilitarySpouseCommit, etc.',
        'title' => 'The title of the job.',
        'totalJobOpenings' => 'The number of positions open for this job posting. Use a positive integer. Do not use if the number of positions is unclear or not known.',
        'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
        'workHours' => 'The typical working hours for this job (e.g. 1st shift, night shift, 8am-5pm).'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['applicantLocationRequirements','applicationContact','baseSalary','datePosted','educationRequirements','employerOverview','employmentType','employmentUnit','estimatedSalary','experienceRequirements','hiringOrganization','incentiveCompensation','industry','jobBenefits','jobImmediateStart','jobLocation','jobLocationType','jobStartDate','occupationalCategory','physicalRequirement','qualifications','relevantOccupation','responsibilities','salaryCurrency','securityClearanceRequirement','sensoryRequirement','skills','specialCommitments','title','totalJobOpenings','validThrough','workHours'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
