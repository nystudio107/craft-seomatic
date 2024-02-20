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
 * Trait for Guide.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Guide
 */
trait GuideTrait
{
    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var string|array|Text|Text[]
     */
    public $reviewAspect;
}
