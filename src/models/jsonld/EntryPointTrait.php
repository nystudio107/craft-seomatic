<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for EntryPoint.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EntryPoint
 */
trait EntryPointTrait
{
    /**
     * The supported encoding type(s) for an EntryPoint request.
     *
     * @var string|Text
     */
    public $encodingType;

    /**
     * An application that can complete the request.
     *
     * @var SoftwareApplication
     */
    public $actionApplication;

    /**
     * The high level platform(s) where the Action can be performed for the given
     * URL. To specify a specific application or operating system instance, use
     * actionApplication.
     *
     * @var string|URL|DigitalPlatformEnumeration|Text
     */
    public $actionPlatform;

    /**
     * The supported content type(s) for an EntryPoint response.
     *
     * @var string|Text
     */
    public $contentType;

    /**
     * An application that can complete the request.
     *
     * @var SoftwareApplication
     */
    public $application;

    /**
     * An HTTP method that specifies the appropriate HTTP method for a request to
     * an HTTP EntryPoint. Values are capitalized strings as used in HTTP.
     *
     * @var string|Text
     */
    public $httpMethod;

    /**
     * An url template (RFC6570) that will be used to construct the target of the
     * execution of the action.
     *
     * @var string|Text
     */
    public $urlTemplate;
}
