<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Vein.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Vein
 */
trait VeinTrait
{
    /**
     * The anatomical or organ system that the vein flows into; a larger structure
     * that the vein connects to.
     *
     * @var AnatomicalStructure
     */
    public $tributary;

    /**
     * The anatomical or organ system drained by this vessel; generally refers to
     * a specific part of an organ.
     *
     * @var AnatomicalSystem|AnatomicalStructure
     */
    public $regionDrained;

    /**
     * The vasculature that the vein drains into.
     *
     * @var Vessel
     */
    public $drainsTo;
}
