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
 * Trait for TVClip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TVClip
 */
trait TVClipTrait
{
    /**
     * The TV series to which this episode or season belongs.
     *
     * @var TVSeries
     */
    public $partOfTVSeries;
}
