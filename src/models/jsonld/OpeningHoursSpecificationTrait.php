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
 * Trait for OpeningHoursSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OpeningHoursSpecification
 */
trait OpeningHoursSpecificationTrait
{
    /**
     * The closing hour of the place or service on the given day(s) of the week.
     *
     * @var Time
     */
    public $closes;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var Date|DateTime
     */
    public $validThrough;

    /**
     * The opening hour of the place or service on the given day(s) of the week.
     *
     * @var Time
     */
    public $opens;

    /**
     * The date when the item becomes valid.
     *
     * @var Date|DateTime
     */
    public $validFrom;

    /**
     * The day of the week for which these opening hours are valid.
     *
     * @var DayOfWeek
     */
    public $dayOfWeek;
}
