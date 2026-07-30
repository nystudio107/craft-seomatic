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
 * Trait for ConstraintNode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ConstraintNode
 */
trait ConstraintNodeTrait
{
    /**
     * Indicates a property used as a constraint. For example, in the definition
     * of a [[StatisticalVariable]]. The value is a property, either from within
     * Schema.org or from other compatible (e.g. RDF) systems such as
     * DataCommons.org or Wikidata.org.
     *
     * @var array|Property|Property[]|array|URL|URL[]
     */
    public $constraintProperty;

    /**
     * Indicates the number of constraints property values defined for a
     * particular [[ConstraintNode]] such as [[StatisticalVariable]]. This helps
     * applications understand if they have access to a sufficiently complete
     * description of a [[StatisticalVariable]] or other construct that is defined
     * using properties on template-style nodes.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numConstraints;
}
