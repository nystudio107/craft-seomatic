<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for LearningResource.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LearningResource
 */

trait LearningResourceTrait
{
    
    /**
     * The item being described is intended to help a person learn the competency
     * or learning outcome defined by the referenced term.
     *
     * @var string|DefinedTerm|Text
     */
    public $teaches;

    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var string|URL|DefinedTerm|Text
     */
    public $educationalLevel;

    /**
     * The item being described is intended to assess the competency or learning
     * outcome defined by the referenced term.
     *
     * @var string|Text|DefinedTerm
     */
    public $assesses;

    /**
     * The purpose of a work in the context of education; for example,
     * 'assignment', 'group work'.
     *
     * @var string|DefinedTerm|Text
     */
    public $educationalUse;

    /**
     * An alignment to an established educational framework.  This property should
     * not be used where the nature of the alignment can be described using a
     * simple property, for example to express that a resource [[teaches]] or
     * [[assesses]] a competency.
     *
     * @var AlignmentObject
     */
    public $educationalAlignment;

    /**
     * Knowledge, skill, ability or personal attribute that must be demonstrated
     * by a person or other entity in order to do something such as earn an
     * Educational Occupational Credential or understand a LearningResource.
     *
     * @var string|Text|DefinedTerm|URL
     */
    public $competencyRequired;

    /**
     * The predominant type or kind characterizing the learning resource. For
     * example, 'presentation', 'handout'.
     *
     * @var string|DefinedTerm|Text
     */
    public $learningResourceType;

}
