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
 * Trait for LearningResource.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LearningResource
 */
trait LearningResourceTrait
{
    /**
     * Knowledge, skill, ability or personal attribute that must be demonstrated
     * by a person or other entity in order to do something such as earn an
     * Educational Occupational Credential or understand a LearningResource.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $competencyRequired;

    /**
     * The item being described is intended to assess the competency or learning
     * outcome defined by the referenced term.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $assesses;

    /**
     * The purpose of a work in the context of education; for example,
     * 'assignment', 'group work'.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $educationalUse;

    /**
     * The predominant type or kind characterizing the learning resource. For
     * example, 'presentation', 'handout'.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $learningResourceType;

    /**
     * An alignment to an established educational framework.  This property should
     * not be used where the nature of the alignment can be described using a
     * simple property, for example to express that a resource [[teaches]] or
     * [[assesses]] a competency.
     *
     * @var array|AlignmentObject|AlignmentObject[]
     */
    public $educationalAlignment;

    /**
     * The item being described is intended to help a person learn the competency
     * or learning outcome defined by the referenced term.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $teaches;

    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $educationalLevel;
}
