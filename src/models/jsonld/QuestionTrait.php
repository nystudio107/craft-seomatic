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
 * Trait for Question.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Question
 */
trait QuestionTrait
{
    /**
     * The answer(s) that has been accepted as best, typically on a
     * Question/Answer site. Sites vary in their selection mechanisms, e.g.
     * drawing on community opinion and/or the view of the Question author.
     *
     * @var array|Answer|Answer[]|array|ItemList|ItemList[]
     */
    public $acceptedAnswer;

    /**
     * The number of answers this question has received.
     *
     * @var int|array|Integer|Integer[]
     */
    public $answerCount;

    /**
     * For questions that are part of learning resources (e.g. Quiz),
     * eduQuestionType indicates the format of question being given. Example:
     * "Multiple choice", "Open ended", "Flashcard".
     *
     * @var string|array|Text|Text[]
     */
    public $eduQuestionType;

    /**
     * The parent of a question, answer or item in general. Typically used for Q/A
     * discussion threads e.g. a chain of comments with the first comment being an
     * [[Article]] or other [[CreativeWork]]. See also [[comment]] which points
     * from something to a comment about it.
     *
     * @var array|Comment|Comment[]|array|CreativeWork|CreativeWork[]
     */
    public $parentItem;

    /**
     * An answer (possibly one of several, possibly incorrect) to a Question, e.g.
     * on a Question/Answer site.
     *
     * @var array|Answer|Answer[]|array|ItemList|ItemList[]
     */
    public $suggestedAnswer;
}
