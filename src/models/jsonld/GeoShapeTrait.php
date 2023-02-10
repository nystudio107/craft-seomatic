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
 * Trait for GeoShape.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GeoShape
 */
trait GeoShapeTrait
{
    /**
     * A polygon is the area enclosed by a point-to-point path for which the
     * starting and ending points are the same. A polygon is expressed as a series
     * of four or more space delimited points where the first and final points are
     * identical.
     *
     * @var string|Text
     */
    public $polygon;

    /**
     * A circle is the circular region of a specified radius centered at a
     * specified latitude and longitude. A circle is expressed as a pair followed
     * by a radius in meters.
     *
     * @var string|Text
     */
    public $circle;

    /**
     * The elevation of a location ([WGS
     * 84](https://en.wikipedia.org/wiki/World_Geodetic_System)). Values may be of
     * the form 'NUMBER UNIT\_OF\_MEASUREMENT' (e.g., '1,000 m', '3,200 ft') while
     * numbers alone should be assumed to be a value in meters.
     *
     * @var float|string|Number|Text
     */
    public $elevation;

    /**
     * The country. For example, USA. You can also provide the two-letter [ISO
     * 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1).
     *
     * @var string|Country|Text
     */
    public $addressCountry;

    /**
     * The postal code. For example, 94043.
     *
     * @var string|Text
     */
    public $postalCode;

    /**
     * Physical address of the item.
     *
     * @var string|Text|PostalAddress
     */
    public $address;

    /**
     * A line is a point-to-point path consisting of two or more points. A line is
     * expressed as a series of two or more point objects separated by space.
     *
     * @var string|Text
     */
    public $line;

    /**
     * A box is the area enclosed by the rectangle formed by two points. The first
     * point is the lower corner, the second point is the upper corner. A box is
     * expressed as two points separated by a space character.
     *
     * @var string|Text
     */
    public $box;
}
