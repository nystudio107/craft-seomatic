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
 * Trait for Vein.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Vein
 */
trait VeinTrait
{
    /**
     * The vasculature that the vein drains into.
     *
     * @var array|Vessel|Vessel[]
     */
    public $drainsTo;

    /**
     * The anatomical or organ system drained by this vessel; generally refers to
     * a specific part of an organ.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]|array|AnatomicalSystem|AnatomicalSystem[]
     */
    public $regionDrained;

    /**
     * The anatomical or organ system that the vein flows into; a larger structure
     * that the vein connects to.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $tributary;
}
