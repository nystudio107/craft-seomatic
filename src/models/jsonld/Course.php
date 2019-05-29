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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Course - A description of an educational course which may be offered as
 * distinct instances at which take place at different times or take place at
 * different locations, or be offered through different media or modes of
 * study. An educational course is a sequence of one or more educational
 * events and/or creative works which aims to build knowledge, competence or
 * ability of learners.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Course
 */
class Course extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Course';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Course';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A description of an educational course which may be offered as distinct instances at which take place at different times or take place at different locations, or be offered through different media or modes of study. An educational course is a sequence of one or more educational events and/or creative works which aims to build knowledge, competence or ability of learners.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * The identifier for the Course used by the course provider (e.g. CS101 or
     * 6.001).
     *
     * @var string [schema.org types: Text]
     */
    public $courseCode;

    /**
     * Requirements for taking the Course. May be completion of another Course or
     * a textual description like "permission of instructor". Requirements may be
     * a pre-requisite competency, referenced using AlignmentObject.
     *
     * @var mixed|AlignmentObject|Course|string [schema.org types: AlignmentObject, Course, Text]
     */
    public $coursePrerequisites;

    /**
     * A description of the qualification, award, certificate, diploma or other
     * educational credential awarded as a consequence of successful completion of
     * this course.
     *
     * @var mixed|EducationalOccupationalCredential|string|string [schema.org types: EducationalOccupationalCredential, Text, URL]
     */
    public $educationalCredentialAwarded;

    /**
     * An offering of the course at a specific time and place or through specific
     * media or mode of study or to a specific section of students.
     *
     * @var mixed|CourseInstance [schema.org types: CourseInstance]
     */
    public $hasCourseInstance;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'courseCode',
        'coursePrerequisites',
        'educationalCredentialAwarded',
        'hasCourseInstance'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'courseCode' => ['Text'],
        'coursePrerequisites' => ['AlignmentObject','Course','Text'],
        'educationalCredentialAwarded' => ['EducationalOccupationalCredential','Text','URL'],
        'hasCourseInstance' => ['CourseInstance']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'courseCode' => 'The identifier for the Course used by the course provider (e.g. CS101 or 6.001).',
        'coursePrerequisites' => 'Requirements for taking the Course. May be completion of another Course or a textual description like "permission of instructor". Requirements may be a pre-requisite competency, referenced using AlignmentObject.',
        'educationalCredentialAwarded' => 'A description of the qualification, award, certificate, diploma or other educational credential awarded as a consequence of successful completion of this course.',
        'hasCourseInstance' => 'An offering of the course at a specific time and place or through specific media or mode of study or to a specific section of students.'
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
            [['courseCode','coursePrerequisites','educationalCredentialAwarded','hasCourseInstance'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
