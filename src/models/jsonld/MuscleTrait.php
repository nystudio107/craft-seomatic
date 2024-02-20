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
 * Trait for Muscle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Muscle
 */
trait MuscleTrait
{
    /**
     * The blood vessel that carries blood from the heart to the muscle.
     *
     * @var array|Vessel|Vessel[]
     */
    public $bloodSupply;

    /**
     * The underlying innervation associated with the muscle.
     *
     * @var array|Nerve|Nerve[]
     */
    public $nerve;

    /**
     * The movement the muscle generates.
     *
     * @var string|array|Text|Text[]
     */
    public $muscleAction;

    /**
     * The muscle whose action counteracts the specified muscle.
     *
     * @var array|Muscle|Muscle[]
     */
    public $antagonist;

    /**
     * The place of attachment of a muscle, or what the muscle moves.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $insertion;
}
