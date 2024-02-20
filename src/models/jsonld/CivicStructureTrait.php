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
 * Trait for CivicStructure.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CivicStructure
 */
trait CivicStructureTrait
{
    /**
     * The general opening hours for a business. Opening hours can be specified as
     * a weekly time range, starting with days, then times per day. Multiple days
     * can be listed with commas ',' separating each day. Day or time ranges are
     * specified using a hyphen '-'.  * Days are specified using the following
     * two-letter combinations: ```Mo```, ```Tu```, ```We```, ```Th```, ```Fr```,
     * ```Sa```, ```Su```. * Times are specified using 24:00 format. For example,
     * 3pm is specified as ```15:00```, 10am as ```10:00```.  * Here is an
     * example: <code><time itemprop="openingHours" datetime="Tu,Th
     * 16:00-20:00">Tuesdays and Thursdays 4-8pm</time></code>. * If a business is
     * open 7 days a week, then it can be specified as <code><time
     * itemprop="openingHours" datetime="Mo-Su">Monday through Sunday, all
     * day</time></code>.
     *
     * @var string|array|Text|Text[]
     */
    public $openingHours;
}
