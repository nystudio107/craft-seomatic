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
 * Trait for Residence.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Residence
 */
trait ResidenceTrait
{
    /**
     * A floorplan of some [[Accommodation]].
     *
     * @var array|FloorPlan|FloorPlan[]
     */
    public $accommodationFloorPlan;

    /**
     * The floor level for an [[Accommodation]] in a multi-storey building. Since
     * counting   systems [vary
     * internationally](https://en.wikipedia.org/wiki/Storey#Consecutive_number_floor_designations),
     * the local system should be used where possible.
     *
     * @var string|array|Text|Text[]
     */
    public $floorLevel;
}
