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
 * Trait for GeoCoordinates.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GeoCoordinates
 */
trait GeoCoordinatesTrait
{
    /**
     * The postal code. For example, 94043.
     *
     * @var string|array|Text|Text[]
     */
    public $postalCode;

    /**
     * The longitude of a location. For example ```-122.08585``` ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $longitude;

    /**
     * The country. For example, USA. You can also provide the two-letter [ISO
     * 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1).
     *
     * @var string|array|Country|Country[]|array|Text|Text[]
     */
    public $addressCountry;

    /**
     * The elevation of a location ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)). Values may be of
     * the form 'NUMBER UNIT\_OF\_MEASUREMENT' (e.g., '1,000 m', '3,200 ft') while
     * numbers alone should be assumed to be a value in meters.
     *
     * @var string|float|array|Text|Text[]|array|Number|Number[]
     */
    public $elevation;

    /**
     * The latitude of a location. For example ```37.42242``` ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)).
     *
     * @var string|float|array|Text|Text[]|array|Number|Number[]
     */
    public $latitude;

    /**
     * Physical address of the item.
     *
     * @var string|array|Text|Text[]|array|PostalAddress|PostalAddress[]
     */
    public $address;
}
