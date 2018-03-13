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
     * The base salary of the job or of an employee in an EmployeeRole.
     *
     * @var mixed|MonetaryAmount|float|PriceSpecification [schema.org types: MonetaryAmount, Number, PriceSpecification]
     */
    public $baseSalary;

    /**
     * Publication date for the job posting.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $datePosted;

    /**
     * Educational background needed for the position.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $educationRequirements;

    /**
     * Type of employment (e.g. full-time, part-time, contract, temporary,
     * seasonal, internship).
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $employmentType;

    /**
     * A property describing the estimated salary for a job posting based on a
     * variety of variables including, but not limited to industry, job title, and
     * location. The estimated salary is usually computed by outside organizations
     * and therefore the hiring organization is not bound to this estimated
     * salary.
     *
     * @var mixed|MonetaryAmount|float|PriceSpecification [schema.org types: MonetaryAmount, Number, PriceSpecification]
     */
    public $estimatedSalary;

    /**
     * Description of skills and experience needed for the position.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $experienceRequirements;

    /**
     * Organization offering the job position.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $hiringOrganization;

    /**
     * Description of bonus and commission compensation aspects of the job.
     * Supersedes incentives.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $incentiveCompensation;

    /**
     * The industry associated with the job position.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $industry;

    /**
     * Description of benefits associated with the job. Supersedes benefits.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $jobBenefits;

    /**
     * A (typically single) geographic location associated with the job position.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $jobLocation;

    /**
     * Category or categories describing the job. Use BLS O*NET-SOC taxonomy:
     * http://www.onetcenter.org/taxonomy.html. Ideally includes textual label and
     * formal code, with the property repeated for each applicable value.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $occupationalCategory;

    /**
     * Specific qualifications required for this role.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $qualifications;

    /**
     * Responsibilities associated with this role.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $responsibilities;

    /**
     * The currency (coded using ISO 4217 ) used for the main salary information
     * in this job posting or for this employee.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $salaryCurrency;

    /**
     * Skills required to fulfill this role.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $skills;

    /**
     * Any special commitments associated with this job posting. Valid entries
     * include VeteranCommit, MilitarySpouseCommit, etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $specialCommitments;

    /**
     * The title of the job.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $title;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $validThrough;

    /**
     * The typical working hours for this job (e.g. 1st shift, night shift,
     * 8am-5pm).
     *
     * @var mixed|string [schema.org types: Text]
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
        'baseSalary',
        'datePosted',
        'educationRequirements',
        'employmentType',
        'estimatedSalary',
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
        'workHours'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'baseSalary' => ['MonetaryAmount','Number','PriceSpecification'],
        'datePosted' => ['Date'],
        'educationRequirements' => ['Text'],
        'employmentType' => ['Text'],
        'estimatedSalary' => ['MonetaryAmount','Number','PriceSpecification'],
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
        'workHours' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'baseSalary' => 'The base salary of the job or of an employee in an EmployeeRole.',
        'datePosted' => 'Publication date for the job posting.',
        'educationRequirements' => 'Educational background needed for the position.',
        'employmentType' => 'Type of employment (e.g. full-time, part-time, contract, temporary, seasonal, internship).',
        'estimatedSalary' => 'A property describing the estimated salary for a job posting based on a variety of variables including, but not limited to industry, job title, and location. The estimated salary is usually computed by outside organizations and therefore the hiring organization is not bound to this estimated salary.',
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
            [['baseSalary','datePosted','educationRequirements','employmentType','estimatedSalary','experienceRequirements','hiringOrganization','incentiveCompensation','industry','jobBenefits','jobLocation','occupationalCategory','qualifications','responsibilities','salaryCurrency','skills','specialCommitments','title','validThrough','workHours'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
