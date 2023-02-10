<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for EducationalOccupationalProgram.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EducationalOccupationalProgram
 */
trait EducationalOccupationalProgramTrait
{
    /**
     * The date at which the program stops collecting applications for the next
     * enrollment cycle.
     *
     * @var Date
     */
    public $applicationDeadline;

    /**
     * The expected length of time to complete the program if attending full-time.
     *
     * @var Duration
     */
    public $timeToComplete;

    /**
     * The time of day the program normally runs. For example, "evenings".
     *
     * @var string|Text
     */
    public $timeOfDay;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var Organization|Person
     */
    public $provider;

    /**
     * The number of times terms of study are offered per year. Semesters and
     * quarters are common units for term. For example, if the student can only
     * take 2 semesters for the program in one year, then termsPerYear should be
     * 2.
     *
     * @var float|Number
     */
    public $termsPerYear;

    /**
     * The amount of time in a term as defined by the institution. A term is a
     * length of time where students take one or more classes. Semesters and
     * quarters are common units for term.
     *
     * @var Duration
     */
    public $termDuration;

    /**
     * A description of the qualification, award, certificate, diploma or other
     * occupational credential awarded as a consequence of successful completion
     * of this course or program.
     *
     * @var string|EducationalOccupationalCredential|Text|URL
     */
    public $occupationalCredentialAwarded;

    /**
     * A financial aid type or program which students may use to pay for tuition
     * or fees associated with the program.
     *
     * @var string|DefinedTerm|Text
     */
    public $financialAidEligible;

    /**
     * The expected salary upon completing the training.
     *
     * @var MonetaryAmountDistribution
     */
    public $salaryUponCompletion;

    /**
     * A course or class that is one of the learning opportunities that constitute
     * an educational / occupational program. No information is implied about
     * whether the course is mandatory or optional; no guarantee is implied about
     * whether the course will be available to everyone on the program.
     *
     * @var Course
     */
    public $hasCourse;

    /**
     * A description of the qualification, award, certificate, diploma or other
     * educational credential awarded as a consequence of successful completion of
     * this course or program.
     *
     * @var string|URL|EducationalOccupationalCredential|Text
     */
    public $educationalCredentialAwarded;

    /**
     * The number of credits or units a full-time student would be expected to
     * take in 1 term however 'term' is defined by the institution.
     *
     * @var int|Integer|StructuredValue
     */
    public $typicalCreditsPerTerm;

    /**
     * The maximum number of students who may be enrolled in the program.
     *
     * @var int|Integer
     */
    public $maximumEnrollment;

    /**
     * The type of educational or occupational program. For example, classroom,
     * internship, alternance, etc.
     *
     * @var string|DefinedTerm|Text
     */
    public $programType;

    /**
     * Prerequisites for enrolling in the program.
     *
     * @var string|Text|EducationalOccupationalCredential|Course|AlignmentObject
     */
    public $programPrerequisites;

    /**
     * Similar to courseMode, the medium or means of delivery of the program as a
     * whole. The value may either be a text label (e.g. "online", "onsite" or
     * "blended"; "synchronous" or "asynchronous"; "full-time" or "part-time") or
     * a URL reference to a term from a controlled vocabulary (e.g.
     * https://ceds.ed.gov/element/001311#Asynchronous ).
     *
     * @var string|Text|URL
     */
    public $educationalProgramMode;

    /**
     * The day of the week for which these opening hours are valid.
     *
     * @var DayOfWeek
     */
    public $dayOfWeek;

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
     * @var string|Text|CategoryCode
     */
    public $occupationalCategory;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $startDate;

    /**
     * The number of credits or units awarded by a Course or required to complete
     * an EducationalOccupationalProgram.
     *
     * @var int|StructuredValue|Integer
     */
    public $numberOfCredits;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.
     *
     * @var Demand|Offer
     */
    public $offers;

    /**
     * The estimated salary earned while in the program.
     *
     * @var MonetaryAmountDistribution
     */
    public $trainingSalary;

    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $endDate;

    /**
     * The date at which the program begins collecting applications for the next
     * enrollment cycle.
     *
     * @var Date
     */
    public $applicationStartDate;
}
