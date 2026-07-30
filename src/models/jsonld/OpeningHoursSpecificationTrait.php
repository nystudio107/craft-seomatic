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
     * @var array|Time|Time[]
     */
    public $closes;

    /**
     * The day of the week for which these opening hours are valid.
     *
     * @var array|DayOfWeek|DayOfWeek[]
     */
    public $dayOfWeek;

    /**
     * The opening hour of the place or service on the given day(s) of the week.
     *
     * @var array|Time|Time[]
     */
    public $opens;

    /**
     * The date when the item becomes valid.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validFrom;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validThrough;
}
