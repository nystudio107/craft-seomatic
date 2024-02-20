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
 * Trait for LymphaticVessel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LymphaticVessel
 */
trait LymphaticVesselTrait
{
    /**
     * The anatomical or organ system drained by this vessel; generally refers to
     * a specific part of an organ.
     *
     * @var array|AnatomicalSystem|AnatomicalSystem[]|array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $regionDrained;

    /**
     * The vasculature the lymphatic structure originates, or afferents, from.
     *
     * @var array|Vessel|Vessel[]
     */
    public $originatesFrom;

    /**
     * The vasculature the lymphatic structure runs, or efferents, to.
     *
     * @var array|Vessel|Vessel[]
     */
    public $runsTo;
}
