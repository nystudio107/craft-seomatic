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
 * Trait for SeekToAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SeekToAction
 */
trait SeekToActionTrait
{
    /**
     * The start time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var float|array|Number|Number[]|array|HyperTocEntry|HyperTocEntry[]
     */
    public $startOffset;
}
