<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * JobPosting - A listing that describes a job opening in a certain
 * organization.
 * Extends: Intangible
 * @see    http://schema.org/JobPosting
 */
class JobPosting extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'JobPosting';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/JobPosting';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A listing that describes a job opening in a certain organization.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * The base salary of the job or of an employee in an EmployeeRole.
     * @var mixed MonetaryAmount, float, PriceSpecification [schema.org types: MonetaryAmount, Number, PriceSpecification]
     */
    public $baseSalary;

    /**
     * Publication date for the job posting.
     * @var mixed Date [schema.org types: Date]
     */
    public $datePosted;

    /**
     * Educational background needed for the position.
     * @var mixed string [schema.org types: Text]
     */
    public $educationRequirements;

    /**
     * Type of employment (e.g. full-time, part-time, contract, temporary,
     * seasonal, internship).
     * @var mixed string [schema.org types: Text]
     */
    public $employmentType;

    /**
     * Description of skills and experience needed for the position.
     * @var mixed string [schema.org types: Text]
     */
    public $experienceRequirements;

    /**
     * Organization offering the job position.
     * @var mixed Organization [schema.org types: Organization]
     */
    public $hiringOrganization;

    /**
     * Description of bonus and commission compensation aspects of the job.
     * Supersedes incentives.
     * @var mixed string [schema.org types: Text]
     */
    public $incentiveCompensation;

    /**
     * The industry associated with the job position.
     * @var mixed string [schema.org types: Text]
     */
    public $industry;

    /**
     * Description of benefits associated with the job. Supersedes benefits.
     * @var mixed string [schema.org types: Text]
     */
    public $jobBenefits;

    /**
     * A (typically single) geographic location associated with the job position.
     * @var mixed Place [schema.org types: Place]
     */
    public $jobLocation;

    /**
     * Category or categories describing the job. Use BLS O*NET-SOC taxonomy:
     * http://www.onetcenter.org/taxonomy.html. Ideally includes textual label and
     * formal code, with the property repeated for each applicable value.
     * @var mixed string [schema.org types: Text]
     */
    public $occupationalCategory;

    /**
     * Specific qualifications required for this role.
     * @var mixed string [schema.org types: Text]
     */
    public $qualifications;

    /**
     * Responsibilities associated with this role.
     * @var mixed string [schema.org types: Text]
     */
    public $responsibilities;

    /**
     * The currency (coded using ISO 4217 ) used for the main salary information
     * in this job posting or for this employee.
     * @var mixed string [schema.org types: Text]
     */
    public $salaryCurrency;

    /**
     * Skills required to fulfill this role.
     * @var mixed string [schema.org types: Text]
     */
    public $skills;

    /**
     * Any special commitments associated with this job posting. Valid entries
     * include VeteranCommit, MilitarySpouseCommit, etc.
     * @var mixed string [schema.org types: Text]
     */
    public $specialCommitments;

    /**
     * The title of the job.
     * @var mixed string [schema.org types: Text]
     */
    public $title;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $validThrough;

    /**
     * The typical working hours for this job (e.g. 1st shift, night shift,
     * 8am-5pm).
     * @var mixed string [schema.org types: Text]
     */
    public $workHours;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'baseSalary',
                'datePosted',
                'educationRequirements',
                'employmentType',
                'experienceRequirements',
                'hiringOrganization',
                'incentiveCompensation',
                'industry',
                'jobBenefits',
                'jobLocation',
                'occupationalCategory',
                'qualifications',
                'responsibilities',
                'salaryCurrency',
                'skills',
                'specialCommitments',
                'title',
                'validThrough',
                'workHours',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'baseSalary' => ['MonetaryAmount','Number','PriceSpecification'],
                'datePosted' => ['Date'],
                'educationRequirements' => ['Text'],
                'employmentType' => ['Text'],
                'experienceRequirements' => ['Text'],
                'hiringOrganization' => ['Organization'],
                'incentiveCompensation' => ['Text'],
                'industry' => ['Text'],
                'jobBenefits' => ['Text'],
                'jobLocation' => ['Place'],
                'occupationalCategory' => ['Text'],
                'qualifications' => ['Text'],
                'responsibilities' => ['Text'],
                'salaryCurrency' => ['Text'],
                'skills' => ['Text'],
                'specialCommitments' => ['Text'],
                'title' => ['Text'],
                'validThrough' => ['DateTime'],
                'workHours' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'baseSalary' => 'The base salary of the job or of an employee in an EmployeeRole.',
                'datePosted' => 'Publication date for the job posting.',
                'educationRequirements' => 'Educational background needed for the position.',
                'employmentType' => 'Type of employment (e.g. full-time, part-time, contract, temporary, seasonal, internship).',
                'experienceRequirements' => 'Description of skills and experience needed for the position.',
                'hiringOrganization' => 'Organization offering the job position.',
                'incentiveCompensation' => 'Description of bonus and commission compensation aspects of the job. Supersedes incentives.',
                'industry' => 'The industry associated with the job position.',
                'jobBenefits' => 'Description of benefits associated with the job. Supersedes benefits.',
                'jobLocation' => 'A (typically single) geographic location associated with the job position.',
                'occupationalCategory' => 'Category or categories describing the job. Use BLS O*NET-SOC taxonomy: http://www.onetcenter.org/taxonomy.html. Ideally includes textual label and formal code, with the property repeated for each applicable value.',
                'qualifications' => 'Specific qualifications required for this role.',
                'responsibilities' => 'Responsibilities associated with this role.',
                'salaryCurrency' => 'The currency (coded using ISO 4217 ) used for the main salary information in this job posting or for this employee.',
                'skills' => 'Skills required to fulfill this role.',
                'specialCommitments' => 'Any special commitments associated with this job posting. Valid entries include VeteranCommit, MilitarySpouseCommit, etc.',
                'title' => 'The title of the job.',
                'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
                'workHours' => 'The typical working hours for this job (e.g. 1st shift, night shift, 8am-5pm).',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['baseSalary','datePosted','educationRequirements','employmentType','experienceRequirements','hiringOrganization','incentiveCompensation','industry','jobBenefits','jobLocation','occupationalCategory','qualifications','responsibilities','salaryCurrency','skills','specialCommitments','title','validThrough','workHours',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class JobPosting*/
