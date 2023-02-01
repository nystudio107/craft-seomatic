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
 * Trait for PublicationVolume.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PublicationVolume
 */
trait PublicationVolumeTrait
{
    /**
     * The page on which the work ends; for example "138" or "xvi".
     *
     * @var int|string|Integer|Text
     */
    public $pageEnd;

    /**
     * Identifies the volume of publication or multi-part work; for example, "iii"
     * or "2".
     *
     * @var string|int|Text|Integer
     */
    public $volumeNumber;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     *
     * @var string|Text
     */
    public $pagination;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     *
     * @var int|string|Integer|Text
     */
    public $pageStart;
}
