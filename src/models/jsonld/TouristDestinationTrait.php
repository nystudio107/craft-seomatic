<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for TouristDestination.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TouristDestination
 */

trait TouristDestinationTrait
{
    
    /**
     * Attraction suitable for type(s) of tourist. eg. Children, visitors from a
     * particular country, etc. 
     *
     * @var string|Audience|Text
     */
    public $touristType;

    /**
     * Attraction located at destination.
     *
     * @var TouristAttraction
     */
    public $includesAttraction;

}
