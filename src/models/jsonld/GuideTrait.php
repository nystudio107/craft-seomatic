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
 * Trait for Guide.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Guide
 */
trait GuideTrait
{
    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Text|Text[]|array|Thing|Thing[]|array|URL|URL[]
     */
    public $category;

    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var string|array|StructuredValue|StructuredValue[]|array|Text|Text[]
     */
    public $reviewAspect;
}
