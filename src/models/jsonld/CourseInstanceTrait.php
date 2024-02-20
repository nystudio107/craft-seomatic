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
 * Trait for CourseInstance.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CourseInstance
 */
trait CourseInstanceTrait
{
    /**
     * Represents the length and pace of a course, expressed as a [[Schedule]].
     *
     * @var array|Schedule|Schedule[]
     */
    public $courseSchedule;

    /**
     * A person assigned to instruct or provide instructional assistance for the
     * [[CourseInstance]].
     *
     * @var array|Person|Person[]
     */
    public $instructor;

    /**
     * The medium or means of delivery of the course instance or the mode of
     * study, either as a text label (e.g. "online", "onsite" or "blended";
     * "synchronous" or "asynchronous"; "full-time" or "part-time") or as a URL
     * reference to a term from a controlled vocabulary (e.g.
     * https://ceds.ed.gov/element/001311#Asynchronous).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $courseMode;

    /**
     * The amount of work expected of students taking the course, often provided
     * as a figure per week or per month, and may be broken down by type. For
     * example, "2 hours of lectures, 1 hour of lab work and 3 hours of
     * independent study per week".
     *
     * @var string|array|Text|Text[]
     */
    public $courseWorkload;
}
