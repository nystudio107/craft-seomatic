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
 * schema.org version: v30.0
 * Trait for Error.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Error
 */
trait ErrorTrait
{
    /**
     * Application or platform dependant error code.
     *
     * @var int|string|array|DefinedTerm|DefinedTerm[]|array|Integer|Integer[]|array|StatusEnumeration|StatusEnumeration[]|array|Text|Text[]
     */
    public $errorCode;
}
