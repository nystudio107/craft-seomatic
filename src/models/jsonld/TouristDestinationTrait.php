<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for TouristDestination.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TouristDestination
 */
trait TouristDestinationTrait
{
    /**
     * Attraction located at destination.
     *
     * @var TouristAttraction
     */
    public $includesAttraction;

    /**
     * Attraction suitable for type(s) of tourist. E.g. children, visitors from a
     * particular country, etc.
     *
     * @var string|Text|Audience
     */
    public $touristType;
}
