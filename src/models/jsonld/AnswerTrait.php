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
 * Trait for Answer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Answer
 */
trait AnswerTrait
{
    /**
     * The parent of a question, answer or item in general. Typically used for Q/A
     * discussion threads e.g. a chain of comments with the first comment being an
     * [[Article]] or other [[CreativeWork]]. See also [[comment]] which points
     * from something to a comment about it.
     *
     * @var array|CreativeWork|CreativeWork[]|array|Comment|Comment[]
     */
    public $parentItem;

    /**
     * A step-by-step or full explanation about Answer. Can outline how this
     * Answer was achieved or contain more broad clarification or statement about
     * it.
     *
     * @var array|WebContent|WebContent[]|array|Comment|Comment[]
     */
    public $answerExplanation;
}
