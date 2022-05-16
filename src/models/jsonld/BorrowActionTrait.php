<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
     * @var Person|Organization
     */
    public $lender;

}
