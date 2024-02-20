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
 * Trait for Nerve.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Nerve
 */
trait NerveTrait
{
    /**
     * The neurological pathway extension that inputs and sends information to the
     * brain or spinal cord.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]|array|SuperficialAnatomy|SuperficialAnatomy[]
     */
    public $sensoryUnit;

    /**
     * The branches that delineate from the nerve bundle. Not to be confused with
     * [[branchOf]].
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $branch;

    /**
     * The neurological pathway that originates the neurons.
     *
     * @var array|BrainStructure|BrainStructure[]
     */
    public $sourcedFrom;

    /**
     * The neurological pathway extension that involves muscle control.
     *
     * @var array|Muscle|Muscle[]
     */
    public $nerveMotor;
}
