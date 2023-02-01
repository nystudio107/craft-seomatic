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
 * Trait for ReviewAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ReviewAction
 */
trait ReviewActionTrait
{
    /**
     * A sub property of result. The review that resulted in the performing of the
     * action.
     *
     * @var Review
     */
    public $resultReview;
}
