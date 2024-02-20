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
 * Trait for WebApplication.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WebApplication
 */
trait WebApplicationTrait
{
    /**
     * Specifies browser requirements in human-readable text. For example,
     * 'requires HTML5 support'.
     *
     * @var string|array|Text|Text[]
     */
    public $browserRequirements;
}
