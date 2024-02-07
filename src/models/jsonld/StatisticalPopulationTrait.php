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
 * Trait for StatisticalPopulation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/StatisticalPopulation
 */
trait StatisticalPopulationTrait
{
    /**
     * Indicates a property used as a constraint to define a
     * [[StatisticalPopulation]] with respect to the set of entities
     * corresponding to an indicated type (via [[populationType]]).
     *
     * @var int|Integer
     */
    public $constrainingProperty;

    /**
     * Indicates the populationType common to all members of a
     * [[StatisticalPopulation]].
     *
     * @var SchemaClass
     */
    public $populationType;

    /**
     * Indicates the number of constraints (not counting [[populationType]])
     * defined for a particular [[StatisticalPopulation]]. This helps applications
     * understand if they have access to a sufficiently complete description of a
     * [[StatisticalPopulation]].
     *
     * @var int|Integer
     */
    public $numConstraints;
}
