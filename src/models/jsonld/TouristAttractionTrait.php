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
 * Trait for TouristAttraction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TouristAttraction
 */

trait TouristAttractionTrait
{
    
    /**
     * Attraction suitable for type(s) of tourist. eg. Children, visitors from a
     * particular country, etc. 
     *
     * @var string|Audience|Text
     */
    public $touristType;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]]
     *
     * @var string|Text|Language
     */
    public $availableLanguage;

}
