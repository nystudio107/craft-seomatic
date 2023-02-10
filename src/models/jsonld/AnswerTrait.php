<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Answer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Answer
 */
trait AnswerTrait
{
    /**
     * A step-by-step or full explanation about Answer. Can outline how this
     * Answer was achieved or contain more broad clarification or statement about
     * it.
     *
     * @var Comment|WebContent
     */
    public $answerExplanation;
}
