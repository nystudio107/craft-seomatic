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
 * Trait for StatisticalPopulation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/StatisticalPopulation
 */
trait StatisticalPopulationTrait
{
    /**
     * Indicates the populationType common to all members of a
     * [[StatisticalPopulation]] or all cases within the scope of a
     * [[StatisticalVariable]].
     *
     * @var array|SchemaClass|SchemaClass[]
     */
    public $populationType;
}
