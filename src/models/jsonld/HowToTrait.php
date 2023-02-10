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
 * Trait for HowTo.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HowTo
 */
trait HowToTrait
{
    /**
     * The length of time it takes to prepare the items to be used in instructions
     * or a direction, in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $prepTime;

    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection (originally misnamed 'steps'; 'step' is preferred).
     *
     * @var string|Text|ItemList|CreativeWork
     */
    public $steps;

    /**
     * The estimated cost of the supply or supplies consumed when performing
     * instructions.
     *
     * @var string|Text|MonetaryAmount
     */
    public $estimatedCost;

    /**
     * The quantity that results by performing instructions. For example, a paper
     * airplane, 10 personalized candles.
     *
     * @var string|QuantitativeValue|Text
     */
    public $yield;

    /**
     * A sub property of instrument. An object used (but not consumed) when
     * performing instructions or a direction.
     *
     * @var string|HowToTool|Text
     */
    public $tool;

    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection.
     *
     * @var string|HowToSection|HowToStep|Text|CreativeWork
     */
    public $step;

    /**
     * The length of time it takes to perform instructions or a direction (not
     * including time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $performTime;

    /**
     * A sub-property of instrument. A supply consumed when performing
     * instructions or a direction.
     *
     * @var string|Text|HowToSupply
     */
    public $supply;

    /**
     * The total time required to perform instructions or a direction (including
     * time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $totalTime;
}
