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
 * Trait for DefinedRegion.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DefinedRegion
 */

trait DefinedRegionTrait
{
    
    /**
     * The country. For example, USA. You can also provide the two-letter [ISO
     * 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1).
     *
     * @var string|Country|Text
     */
    public $addressCountry;

    /**
     * The region in which the locality is, and which is in the country. For
     * example, California or another appropriate first-level [Administrative
     * division](https://en.wikipedia.org/wiki/List_of_administrative_divisions_by_country)
     * 
     *
     * @var string|Text
     */
    public $addressRegion;

    /**
     * A defined range of postal codes.
     *
     * @var PostalCodeRangeSpecification
     */
    public $postalCodeRange;

    /**
     * A defined range of postal codes indicated by a common textual prefix. Used
     * for non-numeric systems such as UK.
     *
     * @var string|Text
     */
    public $postalCodePrefix;

    /**
     * The postal code. For example, 94043.
     *
     * @var string|Text
     */
    public $postalCode;

}
