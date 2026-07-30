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
 * schema.org version: v30.0
 * Trait for DefinedRegion.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DefinedRegion
 */
trait DefinedRegionTrait
{
    /**
     * The country. Recommended to be in 2-letter [ISO 3166-1
     * alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1) format, for example "US".
     * For backward compatibility, a 3-letter [ISO 3166-1
     * alpha-3](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-3) country code
     * such as "SGP" or a full country name such as "Singapore" can also be used.
     *
     * @var string|array|Country|Country[]|array|Text|Text[]
     */
    public $addressCountry;

    /**
     * The region in which the locality is, and which is in the country. For
     * example, California or another appropriate first-level [Administrative
     * division](https://en.wikipedia.org/wiki/List_of_administrative_divisions_by_country)
     * such as the Province in Italy or Region in Germany.
     *
     * @var string|array|AdministrativeArea|AdministrativeArea[]|array|Text|Text[]
     */
    public $addressRegion;

    /**
     * The postal code. For example, 94043.
     *
     * @var string|array|Text|Text[]
     */
    public $postalCode;

    /**
     * A defined range of postal codes indicated by a common textual prefix. Used
     * for non-numeric systems such as UK.
     *
     * @var string|array|Text|Text[]
     */
    public $postalCodePrefix;

    /**
     * A defined range of postal codes.
     *
     * @var array|PostalCodeRangeSpecification|PostalCodeRangeSpecification[]
     */
    public $postalCodeRange;
}
