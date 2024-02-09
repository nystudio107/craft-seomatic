<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\base;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.11
 */
trait NonceItemTrait
{
    // Properties
    // =========================================================================

    /**
     * @var string|null Random "nonce" for this meta item
     */
    public $nonce;
}
