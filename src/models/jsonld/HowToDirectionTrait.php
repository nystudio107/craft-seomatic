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
 * Trait for HowToDirection.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HowToDirection
 */
trait HowToDirectionTrait
{
    /**
     * A media object representing the circumstances after performing this
     * direction.
     *
     * @var array|MediaObject|MediaObject[]|array|URL|URL[]
     */
    public $afterMedia;

    /**
     * The length of time it takes to perform instructions or a direction (not
     * including time to prepare the supplies), in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $performTime;

    /**
     * A media object representing the circumstances while performing this
     * direction.
     *
     * @var array|MediaObject|MediaObject[]|array|URL|URL[]
     */
    public $duringMedia;

    /**
     * A media object representing the circumstances before performing this
     * direction.
     *
     * @var array|MediaObject|MediaObject[]|array|URL|URL[]
     */
    public $beforeMedia;

    /**
     * The length of time it takes to prepare the items to be used in instructions
     * or a direction, in [ISO 8601 duration
     * format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $prepTime;

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
