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
 * Trait for HowTo.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HowTo
 */

trait HowToTrait
{
    
    /**
     * The quantity that results by performing instructions. For example, a paper
     * airplane, 10 personalized candles.
     *
     * @var string|Text|QuantitativeValue
     */
    public $yield;

    /**
     * The estimated cost of the supply or supplies consumed when performing
     * instructions.
     *
     * @var string|Text|MonetaryAmount
     */
    public $estimatedCost;

    /**
     * A sub-property of instrument. A supply consumed when performing
     * instructions or a direction.
     *
     * @var string|HowToSupply|Text
     */
    public $supply;

    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection.
     *
     * @var string|HowToStep|HowToSection|Text|CreativeWork
     */
    public $step;

    /**
     * The total time required to perform instructions or a direction (including
     * time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $totalTime;

    /**
     * A sub property of instrument. An object used (but not consumed) when
     * performing instructions or a direction.
     *
     * @var string|HowToTool|Text
     */
    public $tool;

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
     * @var string|ItemList|CreativeWork|Text
     */
    public $steps;

    /**
     * The length of time it takes to perform instructions or a direction (not
     * including time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $performTime;

}
