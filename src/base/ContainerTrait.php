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
trait ContainerTrait
{
    // Properties
    // =========================================================================

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $handle;

    /**
     * @var bool
     */
    public $include = true;

    /**
     * @var array
     */
    public $dependencies;

    /**
     * @var bool
     */
    public $clearCache = false;

    /**
     * The data in this container
     *
     * @var array
     */
    public $data = [];
}
