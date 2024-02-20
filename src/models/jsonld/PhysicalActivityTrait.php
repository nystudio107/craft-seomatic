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
 * Trait for PhysicalActivity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PhysicalActivity
 */
trait PhysicalActivityTrait
{
    /**
     * The characteristics of associated patients, such as age, gender, race etc.
     *
     * @var string|array|Text|Text[]
     */
    public $epidemiology;

    /**
     * The anatomy of the underlying organ system or structures associated with
     * this entity.
     *
     * @var array|AnatomicalSystem|AnatomicalSystem[]|array|SuperficialAnatomy|SuperficialAnatomy[]|array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $associatedAnatomy;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Thing|Thing[]
     */
    public $category;

    /**
     * Changes in the normal mechanical, physical, and biochemical functions that
     * are associated with this activity or condition.
     *
     * @var string|array|Text|Text[]
     */
    public $pathophysiology;
}
