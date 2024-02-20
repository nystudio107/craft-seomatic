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
 * Trait for TouristTrip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TouristTrip
 */
trait TouristTripTrait
{
    /**
     * Attraction suitable for type(s) of tourist. E.g. children, visitors from a
     * particular country, etc.
     *
     * @var string|array|Audience|Audience[]|array|Text|Text[]
     */
    public $touristType;
}
