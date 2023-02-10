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
 * Trait for Course.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Course
 */
trait CourseTrait
{
    /**
     * A description of the qualification, award, certificate, diploma or other
     * occupational credential awarded as a consequence of successful completion
     * of this course or program.
     *
     * @var string|EducationalOccupationalCredential|Text|URL
     */
    public $occupationalCredentialAwarded;

    /**
     * Requirements for taking the Course. May be completion of another [[Course]]
     * or a textual description like "permission of instructor". Requirements may
     * be a pre-requisite competency, referenced using [[AlignmentObject]].
     *
     * @var string|Course|AlignmentObject|Text
     */
    public $coursePrerequisites;

    /**
     * A description of the qualification, award, certificate, diploma or other
     * educational credential awarded as a consequence of successful completion of
     * this course or program.
     *
     * @var string|URL|EducationalOccupationalCredential|Text
     */
    public $educationalCredentialAwarded;

    /**
     * The identifier for the [[Course]] used by the course [[provider]] (e.g.
     * CS101 or 6.001).
     *
     * @var string|Text
     */
    public $courseCode;

    /**
     * The number of credits or units awarded by a Course or required to complete
     * an EducationalOccupationalProgram.
     *
     * @var int|StructuredValue|Integer
     */
    public $numberOfCredits;

    /**
     * An offering of the course at a specific time and place or through specific
     * media or mode of study or to a specific section of students.
     *
     * @var CourseInstance
     */
    public $hasCourseInstance;
}
