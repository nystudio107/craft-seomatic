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
 * Trait for Observation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Observation
 */
trait ObservationTrait
{
    /**
     * The observedNode of an [[Observation]], often a [[StatisticalPopulation]].
     *
     * @var StatisticalPopulation
     */
    public $observedNode;

    /**
     * A marginOfError for an [[Observation]].
     *
     * @var QuantitativeValue
     */
    public $marginOfError;

    /**
     * The measuredValue of an [[Observation]].
     *
     * @var DataType
     */
    public $measuredValue;

    /**
     * The observationDate of an [[Observation]].
     *
     * @var DateTime
     */
    public $observationDate;

    /**
     * The measuredProperty of an [[Observation]], either a schema.org property, a
     * property from other RDF-compatible systems, e.g. W3C RDF Data Cube, or
     * schema.org extensions such as
     * [GS1's](https://www.gs1.org/voc/?show=properties).
     *
     * @var Property
     */
    public $measuredProperty;
}
