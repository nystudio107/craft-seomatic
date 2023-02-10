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
 * Trait for Recommendation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Recommendation
 */
trait RecommendationTrait
{
    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|CategoryCode|Text|Thing|PhysicalActivityCategory
     */
    public $category;
}
