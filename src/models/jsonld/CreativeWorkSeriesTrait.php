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
 * Trait for CreativeWorkSeries.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CreativeWorkSeries
 */
trait CreativeWorkSeriesTrait
{
    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $endDate;

    /**
     * The International Standard Serial Number (ISSN) that identifies this serial
     * publication. You can repeat this property to identify different formats of,
     * or the linking ISSN (ISSN-L) for, this serial publication.
     *
     * @var string|array|Text|Text[]
     */
    public $issn;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $startDate;
}
