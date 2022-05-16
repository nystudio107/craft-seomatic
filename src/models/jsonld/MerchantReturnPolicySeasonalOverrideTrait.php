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
 * Trait for MerchantReturnPolicySeasonalOverride.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MerchantReturnPolicySeasonalOverride
 */

trait MerchantReturnPolicySeasonalOverrideTrait
{
    
    /**
     * Specifies an applicable return policy (from an enumeration).
     *
     * @var MerchantReturnEnumeration
     */
    public $returnPolicyCategory;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $startDate;

    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var Date|DateTime
     */
    public $endDate;

    /**
     * Specifies either a fixed return date or the number of days (from the
     * delivery date) that a product can be returned. Used when the
     * [[returnPolicyCategory]] property is specified as
     * [[MerchantReturnFiniteReturnWindow]].
     *
     * @var int|DateTime|Integer|Date
     */
    public $merchantReturnDays;

}
