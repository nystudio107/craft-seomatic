<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for APIReference.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/APIReference
 */

trait APIReferenceTrait
{
    
    /**
     * Library file name e.g., mscorlib.dll, system.web.dll.
     *
     * @var string|Text
     */
    public $assembly;

    /**
     * Type of app development: phone, Metro style, desktop, XBox, etc.
     *
     * @var string|Text
     */
    public $targetPlatform;

    /**
     * Library file name e.g., mscorlib.dll, system.web.dll.
     *
     * @var string|Text
     */
    public $executableLibraryName;

    /**
     * Indicates whether API is managed or unmanaged.
     *
     * @var string|Text
     */
    public $programmingModel;

    /**
     * Associated product/technology version. e.g., .NET Framework 4.5.
     *
     * @var string|Text
     */
    public $assemblyVersion;

}
