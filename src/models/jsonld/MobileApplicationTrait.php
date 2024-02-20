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
 * Trait for MobileApplication.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MobileApplication
 */
trait MobileApplicationTrait
{
    /**
     * Specifies specific carrier(s) requirements for the application (e.g. an
     * application may only work on a specific carrier network).
     *
     * @var string|array|Text|Text[]
     */
    public $carrierRequirements;
}
