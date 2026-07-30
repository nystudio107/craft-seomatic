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
 * Trait for BorrowAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BorrowAction
 */
trait BorrowActionTrait
{
    /**
     * A sub property of participant. The person that lends the object being
     * borrowed.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $lender;
}
