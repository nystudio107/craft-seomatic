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
 * Trait for PhysicalActivity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PhysicalActivity
 */
trait PhysicalActivityTrait
{
    /**
     * Changes in the normal mechanical, physical, and biochemical functions that
     * are associated with this activity or condition.
     *
     * @var string|Text
     */
    public $pathophysiology;

    /**
     * The characteristics of associated patients, such as age, gender, race etc.
     *
     * @var string|Text
     */
    public $epidemiology;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|CategoryCode|Text|Thing|PhysicalActivityCategory
     */
    public $category;

    /**
     * The anatomy of the underlying organ system or structures associated with
     * this entity.
     *
     * @var SuperficialAnatomy|AnatomicalSystem|AnatomicalStructure
     */
    public $associatedAnatomy;
}
