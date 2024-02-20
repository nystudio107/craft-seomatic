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
 * Trait for GeoCircle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GeoCircle
 */
trait GeoCircleTrait
{
    /**
     * Indicates the approximate radius of a GeoCircle (metres unless indicated
     * otherwise via Distance notation).
     *
     * @var string|float|array|Distance|Distance[]|array|Text|Text[]|array|Number|Number[]
     */
    public $geoRadius;

    /**
     * Indicates the GeoCoordinates at the centre of a GeoShape, e.g. GeoCircle.
     *
     * @var array|GeoCoordinates|GeoCoordinates[]
     */
    public $geoMidpoint;
}
