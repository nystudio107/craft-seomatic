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
     * @var bool Should the meta item be included on the page?
     */
    public $include = true;

    /**
     * @var string The key for this MetaItem
     */
    public $key;

    /**
     * @var array
     */
    public $environment;

    /**
     * @var array
     */
    public $dependencies;
}
