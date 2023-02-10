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
     * @var ItemList|Answer
     */
    public $acceptedAnswer;

    /**
     * An answer (possibly one of several, possibly incorrect) to a Question, e.g.
     * on a Question/Answer site.
     *
     * @var Answer|ItemList
     */
    public $suggestedAnswer;

    /**
     * The number of answers this question has received.
     *
     * @var int|Integer
     */
    public $answerCount;

    /**
     * For questions that are part of learning resources (e.g. Quiz),
     * eduQuestionType indicates the format of question being given. Example:
     * "Multiple choice", "Open ended", "Flashcard".
     *
     * @var string|Text
     */
    public $eduQuestionType;
}
