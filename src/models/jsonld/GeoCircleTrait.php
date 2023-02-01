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
 * Trait for GeoCircle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GeoCircle
 */
trait GeoCircleTrait
{
    /**
     * Indicates the GeoCoordinates at the centre of a GeoShape, e.g. GeoCircle.
     *
     * @var GeoCoordinates
     */
    public $geoMidpoint;

    /**
     * Indicates the approximate radius of a GeoCircle (metres unless indicated
     * otherwise via Distance notation).
     *
     * @var float|string|Number|Text|Distance
     */
    public $geoRadius;
}
