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
 * Trait for MerchantReturnPolicySeasonalOverride.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MerchantReturnPolicySeasonalOverride
 */
trait MerchantReturnPolicySeasonalOverrideTrait
{
    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $endDate;

    /**
     * Specifies an applicable return policy (from an enumeration).
     *
     * @var array|MerchantReturnEnumeration|MerchantReturnEnumeration[]
     */
    public $returnPolicyCategory;

    /**
     * Specifies either a fixed return date or the number of days (from the
     * delivery date) that a product can be returned. Used when the
     * [[returnPolicyCategory]] property is specified as
     * [[MerchantReturnFiniteReturnWindow]].
     *
     * @var int|array|Integer|Integer[]|array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $merchantReturnDays;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $startDate;
}
