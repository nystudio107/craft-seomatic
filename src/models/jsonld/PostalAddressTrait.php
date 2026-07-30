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
 * Trait for PostalAddress.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PostalAddress
 */
trait PostalAddressTrait
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
     * The locality in which the street address is, and which is in the region.
     * For example, Mountain View.
     *
     * @var string|array|Text|Text[]
     */
    public $addressLocality;

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
     * An address extension such as an apartment number, C/O or alternative name.
     *
     * @var string|array|Text|Text[]
     */
    public $extendedAddress;

    /**
     * The post office box number for PO box addresses.
     *
     * @var string|array|Text|Text[]
     */
    public $postOfficeBoxNumber;

    /**
     * The postal code. For example, 94043.
     *
     * @var string|array|Text|Text[]
     */
    public $postalCode;

    /**
     * The street address. For example, 1600 Amphitheatre Pkwy.
     *
     * @var string|array|Text|Text[]
     */
    public $streetAddress;
}
