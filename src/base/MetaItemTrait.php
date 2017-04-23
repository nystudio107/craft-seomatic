<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
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
 * @since     3.0.0
 */
trait MetaItemTrait
{
    // Properties
    // =========================================================================

    /**
     * @var bool
     */
    public $include = true;

    /**
     * @var bool
     */
    public $uniqueKeys = false;

    /**
     * The key for this MetaItem
     *
     * @var string
     */
    public $key;
}
