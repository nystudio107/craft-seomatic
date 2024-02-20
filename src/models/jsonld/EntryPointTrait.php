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
 * Trait for EntryPoint.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EntryPoint
 */
trait EntryPointTrait
{
    /**
     * An HTTP method that specifies the appropriate HTTP method for a request to
     * an HTTP EntryPoint. Values are capitalized strings as used in HTTP.
     *
     * @var string|array|Text|Text[]
     */
    public $httpMethod;

    /**
     * The supported encoding type(s) for an EntryPoint request.
     *
     * @var string|array|Text|Text[]
     */
    public $encodingType;

    /**
     * An application that can complete the request.
     *
     * @var array|SoftwareApplication|SoftwareApplication[]
     */
    public $actionApplication;

    /**
     * The high level platform(s) where the Action can be performed for the given
     * URL. To specify a specific application or operating system instance, use
     * actionApplication.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DigitalPlatformEnumeration|DigitalPlatformEnumeration[]
     */
    public $actionPlatform;

    /**
     * An application that can complete the request.
     *
     * @var array|SoftwareApplication|SoftwareApplication[]
     */
    public $application;

    /**
     * The supported content type(s) for an EntryPoint response.
     *
     * @var string|array|Text|Text[]
     */
    public $contentType;

    /**
     * An url template (RFC6570) that will be used to construct the target of the
     * execution of the action.
     *
     * @var string|array|Text|Text[]
     */
    public $urlTemplate;
}
