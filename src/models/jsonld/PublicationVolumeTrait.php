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
 * Trait for PublicationVolume.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PublicationVolume
 */
trait PublicationVolumeTrait
{
    /**
     * Identifies the volume of publication or multi-part work; for example, "iii"
     * or "2".
     *
     * @var string|int|array|Text|Text[]|array|Integer|Integer[]
     */
    public $volumeNumber;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     *
     * @var string|array|Text|Text[]
     */
    public $pagination;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $pageStart;

    /**
     * The page on which the work ends; for example "138" or "xvi".
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $pageEnd;
}
