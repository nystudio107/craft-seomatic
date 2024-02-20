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
     * @var array|Review|Review[]
     */
    public $resultReview;
}
