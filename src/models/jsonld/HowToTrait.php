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
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $yield;

    /**
     * The length of time it takes to perform instructions or a direction (not
     * including time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $performTime;

    /**
     * The estimated cost of the supply or supplies consumed when performing
     * instructions.
     *
     * @var string|array|MonetaryAmount|MonetaryAmount[]|array|Text|Text[]
     */
    public $estimatedCost;

    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection.
     *
     * @var string|array|Text|Text[]|array|HowToSection|HowToSection[]|array|HowToStep|HowToStep[]|array|CreativeWork|CreativeWork[]
     */
    public $step;

    /**
     * The length of time it takes to prepare the items to be used in instructions
     * or a direction, in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $prepTime;

    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection (originally misnamed 'steps'; 'step' is preferred).
     *
     * @var string|array|Text|Text[]|array|CreativeWork|CreativeWork[]|array|ItemList|ItemList[]
     */
    public $steps;

    /**
     * The total time required to perform instructions or a direction (including
     * time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $totalTime;

    /**
     * A sub property of instrument. An object used (but not consumed) when
     * performing instructions or a direction.
     *
     * @var string|array|HowToTool|HowToTool[]|array|Text|Text[]
     */
    public $tool;

    /**
     * A sub-property of instrument. A supply consumed when performing
     * instructions or a direction.
     *
     * @var string|array|Text|Text[]|array|HowToSupply|HowToSupply[]
     */
    public $supply;
}
