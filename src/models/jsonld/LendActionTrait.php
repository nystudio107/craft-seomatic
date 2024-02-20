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
 * Trait for LendAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LendAction
 */
trait LendActionTrait
{
    /**
     * A sub property of participant. The person that borrows the object being
     * lent.
     *
     * @var array|Person|Person[]
     */
    public $borrower;
}
