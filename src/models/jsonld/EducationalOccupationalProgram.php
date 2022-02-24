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
 * EducationalOccupationalProgram - A program offered by an institution which
 * determines the learning progress to achieve an outcome, usually a
 * credential like a degree or certificate. This would define a discrete set
 * of opportunities (e.g., job, courses) that together constitute a program
 * with a clear start, end, set of requirements, and transition to a new
 * occupational opportunity (e.g., a job), or sometimes a higher educational
 * opportunity (e.g., an advanced degree).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/EducationalOccupationalProgram
 */
class EducationalOccupationalProgram extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'EducationalOccupationalProgram';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/EducationalOccupationalProgram';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A program offered by an institution which determines the learning progress to achieve an outcome, usually a credential like a degree or certificate. This would define a discrete set of opportunities (e.g., job, courses) that together constitute a program with a clear start, end, set of requirements, and transition to a new occupational opportunity (e.g., a job), or sometimes a higher educational opportunity (e.g., an advanced degree).';

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
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'applicationDeadline',
        'applicationStartDate',
        'dayOfWeek',
        'educationalCredentialAwarded',
        'educationalProgramMode',
        'endDate',
        'financialAidEligible',
        'maximumEnrollment',
        'numberOfCredits',
        'occupationalCategory',
        'occupationalCredentialAwarded',
        'offers',
        'programPrerequisites',
        'programType',
        'provider',
        'salaryUponCompletion',
        'startDate',
        'termDuration',
        'termsPerYear',
        'timeOfDay',
        'timeToComplete',
        'trainingSalary',
        'typicalCreditsPerTerm'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'applicationDeadline' => ['Date'],
        'applicationStartDate' => ['Date'],
        'dayOfWeek' => ['DayOfWeek'],
        'educationalCredentialAwarded' => ['EducationalOccupationalCredential', 'Text', 'URL'],
        'educationalProgramMode' => ['Text', 'URL'],
        'endDate' => ['Date', 'DateTime'],
        'financialAidEligible' => ['DefinedTerm', 'Text'],
        'maximumEnrollment' => ['Integer'],
        'numberOfCredits' => ['Integer', 'StructuredValue'],
        'occupationalCategory' => ['CategoryCode', 'Text'],
        'occupationalCredentialAwarded' => ['EducationalOccupationalCredential', 'Text', 'URL'],
        'offers' => ['Demand', 'Offer'],
        'programPrerequisites' => ['AlignmentObject', 'Course', 'EducationalOccupationalCredential', 'Text'],
        'programType' => ['DefinedTerm', 'Text'],
        'provider' => ['Organization', 'Person'],
        'salaryUponCompletion' => ['MonetaryAmountDistribution'],
        'startDate' => ['Date', 'DateTime'],
        'termDuration' => ['Duration'],
        'termsPerYear' => ['Number'],
        'timeOfDay' => ['Text'],
        'timeToComplete' => ['Duration'],
        'trainingSalary' => ['MonetaryAmountDistribution'],
        'typicalCreditsPerTerm' => ['Integer', 'StructuredValue']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'applicationDeadline' => 'The date at which the program stops collecting applications for the next enrollment cycle.',
        'applicationStartDate' => 'The date at which the program begins collecting applications for the next enrollment cycle.',
        'dayOfWeek' => 'The day of the week for which these opening hours are valid.',
        'educationalCredentialAwarded' => 'A description of the qualification, award, certificate, diploma or other educational credential awarded as a consequence of successful completion of this course or program.',
        'educationalProgramMode' => 'Similar to courseMode, The medium or means of delivery of the program as a whole. The value may either be a text label (e.g. "online", "onsite" or "blended"; "synchronous" or "asynchronous"; "full-time" or "part-time") or a URL reference to a term from a controlled vocabulary (e.g. https://ceds.ed.gov/element/001311#Asynchronous ).',
        'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
        'financialAidEligible' => 'A financial aid type or program which students may use to pay for tuition or fees associated with the program.',
        'maximumEnrollment' => 'The maximum number of students who may be enrolled in the program.',
        'numberOfCredits' => 'The number of credits or units awarded by a Course or required to complete an EducationalOccupationalProgram.',
        'occupationalCategory' => 'A category describing the job, preferably using a term from a taxonomy such as BLS O*NET-SOC, ISCO-08 or similar, with the property repeated for each applicable value. Ideally the taxonomy should be identified, and both the textual label and formal code for the category should be provided. Note: for historical reasons, any textual label and formal code provided as a literal may be assumed to be from O*NET-SOC.',
        'occupationalCredentialAwarded' => 'A description of the qualification, award, certificate, diploma or other occupational credential awarded as a consequence of successful completion of this course or program.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use businessFunction to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a Demand. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer. Inverse property: itemOffered.',
        'programPrerequisites' => 'Prerequisites for enrolling in the program.',
        'programType' => 'The type of educational or occupational program. For example, classroom, internship, alternance, etc..',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
        'salaryUponCompletion' => 'The expected salary upon completing the training.',
        'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
        'termDuration' => 'The amount of time in a term as defined by the institution. A term is a length of time where students take one or more classes. Semesters and quarters are common units for term.',
        'termsPerYear' => 'The number of times terms of study are offered per year. Semesters and quarters are common units for term. For example, if the student can only take 2 semesters for the program in one year, then termsPerYear should be 2.',
        'timeOfDay' => 'The time of day the program normally runs. For example, "evenings".',
        'timeToComplete' => 'The expected length of time to complete the program if attending full-time.',
        'trainingSalary' => 'The estimated salary earned while in the program.',
        'typicalCreditsPerTerm' => 'The number of credits or units a full-time student would be expected to take in 1 term however \'term\' is defined by the institution.'
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
    /**
     * The date at which the program stops collecting applications for the next
     * enrollment cycle.
     *
     * @var Date [schema.org types: Date]
     */
    public $applicationDeadline;
    /**
     * The date at which the program begins collecting applications for the next
     * enrollment cycle.
     *
     * @var Date [schema.org types: Date]
     */
    public $applicationStartDate;
    /**
     * The day of the week for which these opening hours are valid.
     *
     * @var DayOfWeek [schema.org types: DayOfWeek]
     */
    public $dayOfWeek;
    /**
     * A description of the qualification, award, certificate, diploma or other
     * educational credential awarded as a consequence of successful completion of
     * this course or program.
     *
     * @var mixed|EducationalOccupationalCredential|string|string [schema.org types: EducationalOccupationalCredential, Text, URL]
     */
    public $educationalCredentialAwarded;
    /**
     * Similar to courseMode, The medium or means of delivery of the program as a
     * whole. The value may either be a text label (e.g. "online", "onsite" or
     * "blended"; "synchronous" or "asynchronous"; "full-time" or "part-time") or
     * a URL reference to a term from a controlled vocabulary (e.g.
     * https://ceds.ed.gov/element/001311#Asynchronous ).
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $educationalProgramMode;
    /**
     * The end date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;
    /**
     * A financial aid type or program which students may use to pay for tuition
     * or fees associated with the program.
     *
     * @var mixed|DefinedTerm|string [schema.org types: DefinedTerm, Text]
     */
    public $financialAidEligible;
    /**
     * The maximum number of students who may be enrolled in the program.
     *
     * @var int [schema.org types: Integer]
     */
    public $maximumEnrollment;
    /**
     * The number of credits or units awarded by a Course or required to complete
     * an EducationalOccupationalProgram.
     *
     * @var mixed|int|StructuredValue [schema.org types: Integer, StructuredValue]
     */
    public $numberOfCredits;
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
     * A description of the qualification, award, certificate, diploma or other
     * occupational credential awarded as a consequence of successful completion
     * of this course or program.
     *
     * @var mixed|EducationalOccupationalCredential|string|string [schema.org types: EducationalOccupationalCredential, Text, URL]
     */
    public $occupationalCredentialAwarded;
    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use businessFunction to indicate the kind of transaction offered,
     * i.e. sell, lease, etc. This property can also be used to describe a Demand.
     * While this property is listed as expected on a number of common types, it
     * can be used in others. In that case, using a second type, such as Product
     * or a subtype of Product, can clarify the nature of the offer. Inverse
     * property: itemOffered.
     *
     * @var mixed|Demand|Offer [schema.org types: Demand, Offer]
     */
    public $offers;
    /**
     * Prerequisites for enrolling in the program.
     *
     * @var mixed|AlignmentObject|Course|EducationalOccupationalCredential|string [schema.org types: AlignmentObject, Course, EducationalOccupationalCredential, Text]
     */
    public $programPrerequisites;
    /**
     * The type of educational or occupational program. For example, classroom,
     * internship, alternance, etc..
     *
     * @var mixed|DefinedTerm|string [schema.org types: DefinedTerm, Text]
     */
    public $programType;
    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;
    /**
     * The expected salary upon completing the training.
     *
     * @var MonetaryAmountDistribution [schema.org types: MonetaryAmountDistribution]
     */
    public $salaryUponCompletion;
    /**
     * The start date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;
    /**
     * The amount of time in a term as defined by the institution. A term is a
     * length of time where students take one or more classes. Semesters and
     * quarters are common units for term.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $termDuration;

    // Static Protected Properties
    // =========================================================================
    /**
     * The number of times terms of study are offered per year. Semesters and
     * quarters are common units for term. For example, if the student can only
     * take 2 semesters for the program in one year, then termsPerYear should be
     * 2.
     *
     * @var float [schema.org types: Number]
     */
    public $termsPerYear;
    /**
     * The time of day the program normally runs. For example, "evenings".
     *
     * @var string [schema.org types: Text]
     */
    public $timeOfDay;
    /**
     * The expected length of time to complete the program if attending full-time.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $timeToComplete;
    /**
     * The estimated salary earned while in the program.
     *
     * @var MonetaryAmountDistribution [schema.org types: MonetaryAmountDistribution]
     */
    public $trainingSalary;
    /**
     * The number of credits or units a full-time student would be expected to
     * take in 1 term however 'term' is defined by the institution.
     *
     * @var mixed|int|StructuredValue [schema.org types: Integer, StructuredValue]
     */
    public $typicalCreditsPerTerm;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
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
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['applicationDeadline', 'applicationStartDate', 'dayOfWeek', 'educationalCredentialAwarded', 'educationalProgramMode', 'endDate', 'financialAidEligible', 'maximumEnrollment', 'numberOfCredits', 'occupationalCategory', 'occupationalCredentialAwarded', 'offers', 'programPrerequisites', 'programType', 'provider', 'salaryUponCompletion', 'startDate', 'termDuration', 'termsPerYear', 'timeOfDay', 'timeToComplete', 'trainingSalary', 'typicalCreditsPerTerm'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
