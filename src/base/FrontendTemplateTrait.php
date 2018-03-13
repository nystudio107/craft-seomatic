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
trait FrontendTemplateTrait
{
    // Properties
    // =========================================================================

    /**
     * @var bool Should the template be included for frontend requests?
     */
    public $include = true;

    /**
     * @var string The FrontEndTemplate handle
     */
    public $handle;

    /**
     * @var string The the frontend URI to listen for
     */
    public $path;

    /**
     * @var string The path for the source template for this FrontendTemplate
     */
    public $template;

    /**
     * @var string The controller for this FrontendTemplate
     */
    public $controller;

    /**
     * @var string The action for this FrontendTemplate
     */
    public $action;
}
