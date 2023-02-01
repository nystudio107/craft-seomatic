<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
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
     * @var string|Text
     */
    public $programmingModel;

    /**
     * Type of app development: phone, Metro style, desktop, XBox, etc.
     *
     * @var string|Text
     */
    public $targetPlatform;

    /**
     * Library file name, e.g., mscorlib.dll, system.web.dll.
     *
     * @var string|Text
     */
    public $assembly;

    /**
     * Associated product/technology version. E.g., .NET Framework 4.5.
     *
     * @var string|Text
     */
    public $assemblyVersion;

    /**
     * Library file name, e.g., mscorlib.dll, system.web.dll.
     *
     * @var string|Text
     */
    public $executableLibraryName;
}
