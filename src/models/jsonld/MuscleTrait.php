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
 * Trait for Muscle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Muscle
 */
trait MuscleTrait
{
    /**
     * The underlying innervation associated with the muscle.
     *
     * @var Nerve
     */
    public $nerve;

    /**
     * The movement the muscle generates.
     *
     * @var string|Text
     */
    public $muscleAction;

    /**
     * The blood vessel that carries blood from the heart to the muscle.
     *
     * @var Vessel
     */
    public $bloodSupply;

    /**
     * The muscle whose action counteracts the specified muscle.
     *
     * @var Muscle
     */
    public $antagonist;

    /**
     * The place of attachment of a muscle, or what the muscle moves.
     *
     * @var AnatomicalStructure
     */
    public $insertion;
}
