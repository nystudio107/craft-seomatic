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
 * Trait for Course.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Course
 */
trait CourseTrait
{
    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]].
     *
     * @var string|array|Language|Language[]|array|Text|Text[]
     */
    public $availableLanguage;

    /**
     * The identifier for the [[Course]] used by the course [[provider]] (e.g.
     * CS101 or 6.001).
     *
     * @var string|array|Text|Text[]
     */
    public $courseCode;

    /**
     * Requirements for taking the Course. May be completion of another [[Course]]
     * or a textual description like "permission of instructor". Requirements may
     * be a pre-requisite competency, referenced using [[AlignmentObject]].
     *
     * @var string|array|AlignmentObject|AlignmentObject[]|array|Course|Course[]|array|Text|Text[]
     */
    public $coursePrerequisites;

    /**
     * A description of the qualification, award, certificate, diploma or other
     * educational credential awarded as a consequence of successful completion of
     * this course or program.
     *
     * @var string|array|EducationalOccupationalCredential|EducationalOccupationalCredential[]|array|Text|Text[]|array|URL|URL[]
     */
    public $educationalCredentialAwarded;

    /**
     * A financial aid type or program which students may use to pay for tuition
     * or fees associated with the program.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $financialAidEligible;

    /**
     * An offering of the course at a specific time and place or through specific
     * media or mode of study or to a specific section of students.
     *
     * @var array|CourseInstance|CourseInstance[]
     */
    public $hasCourseInstance;

    /**
     * The number of credits or units awarded by a Course or required to complete
     * an EducationalOccupationalProgram.
     *
     * @var int|array|Integer|Integer[]|array|StructuredValue|StructuredValue[]
     */
    public $numberOfCredits;

    /**
     * A description of the qualification, award, certificate, diploma or other
     * occupational credential awarded as a consequence of successful completion
     * of this course or program.
     *
     * @var string|array|EducationalOccupationalCredential|EducationalOccupationalCredential[]|array|Text|Text[]|array|URL|URL[]
     */
    public $occupationalCredentialAwarded;

    /**
     * Indicates (typically several) Syllabus entities that lay out what each
     * section of the overall course will cover.
     *
     * @var array|Syllabus|Syllabus[]
     */
    public $syllabusSections;

    /**
     * The total number of students that have enrolled in the history of the
     * course.
     *
     * @var int|array|Integer|Integer[]
     */
    public $totalHistoricalEnrollment;
}
