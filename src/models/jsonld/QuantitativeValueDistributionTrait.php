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
 * Trait for QuantitativeValueDistribution.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/QuantitativeValueDistribution
 */
trait QuantitativeValueDistributionTrait
{
    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * duration format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $duration;

    /**
     * The median value.
     *
     * @var float|array|Number|Number[]
     */
    public $median;

    /**
     * The 10th percentile value.
     *
     * @var float|array|Number|Number[]
     */
    public $percentile10;

    /**
     * The 25th percentile value.
     *
     * @var float|array|Number|Number[]
     */
    public $percentile25;

    /**
     * The 75th percentile value.
     *
     * @var float|array|Number|Number[]
     */
    public $percentile75;

    /**
     * The 90th percentile value.
     *
     * @var float|array|Number|Number[]
     */
    public $percentile90;
}
