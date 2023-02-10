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
 * Trait for Nerve.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Nerve
 */
trait NerveTrait
{
    /**
     * The neurological pathway extension that involves muscle control.
     *
     * @var Muscle
     */
    public $nerveMotor;

    /**
     * The branches that delineate from the nerve bundle. Not to be confused with
     * [[branchOf]].
     *
     * @var AnatomicalStructure
     */
    public $branch;

    /**
     * The neurological pathway that originates the neurons.
     *
     * @var BrainStructure
     */
    public $sourcedFrom;

    /**
     * The neurological pathway extension that inputs and sends information to the
     * brain or spinal cord.
     *
     * @var AnatomicalStructure|SuperficialAnatomy
     */
    public $sensoryUnit;
}
