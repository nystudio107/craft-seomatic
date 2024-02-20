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
 * Trait for APIReference.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/APIReference
 */
trait APIReferenceTrait
{
    /**
     * Indicates whether API is managed or unmanaged.
     *
     * @var string|array|Text|Text[]
     */
    public $programmingModel;

    /**
     * Library file name, e.g., mscorlib.dll, system.web.dll.
     *
     * @var string|array|Text|Text[]
     */
    public $executableLibraryName;

    /**
     * Library file name, e.g., mscorlib.dll, system.web.dll.
     *
     * @var string|array|Text|Text[]
     */
    public $assembly;

    /**
     * Type of app development: phone, Metro style, desktop, XBox, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $targetPlatform;

    /**
     * Associated product/technology version. E.g., .NET Framework 4.5.
     *
     * @var string|array|Text|Text[]
     */
    public $assemblyVersion;
}
