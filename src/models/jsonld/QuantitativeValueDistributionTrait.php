<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for QuantitativeValueDistribution.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/QuantitativeValueDistribution
 */
trait QuantitativeValueDistributionTrait
{
    /**
     * The 75th percentile value.
     *
     * @var float|Number
     */
    public $percentile75;

    /**
     * The 25th percentile value.
     *
     * @var float|Number
     */
    public $percentile25;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * The median value.
     *
     * @var float|Number
     */
    public $median;

    /**
     * The 90th percentile value.
     *
     * @var float|Number
     */
    public $percentile90;

    /**
     * The 10th percentile value.
     *
     * @var float|Number
     */
    public $percentile10;
}
