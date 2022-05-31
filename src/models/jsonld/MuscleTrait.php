<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for Muscle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Muscle
 */

trait MuscleTrait
{
    
    /**
     * The place of attachment of a muscle, or what the muscle moves.
     *
     * @var AnatomicalStructure
     */
    public $insertion;

    /**
     * The muscle whose action counteracts the specified muscle.
     *
     * @var Muscle
     */
    public $antagonist;

    /**
     * The underlying innervation associated with the muscle.
     *
     * @var Nerve
     */
    public $nerve;

    /**
     * The blood vessel that carries blood from the heart to the muscle.
     *
     * @var Vessel
     */
    public $bloodSupply;

    /**
     * The movement the muscle generates.
     *
     * @var string|Text
     */
    public $muscleAction;

}
