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
 * Trait for SolveMathAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SolveMathAction
 */
trait SolveMathActionTrait
{
    /**
     * For questions that are part of learning resources (e.g. Quiz),
     * eduQuestionType indicates the format of question being given. Example:
     * "Multiple choice", "Open ended", "Flashcard".
     *
     * @var string|array|Text|Text[]
     */
    public $eduQuestionType;
}
