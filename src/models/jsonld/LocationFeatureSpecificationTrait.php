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
 * Trait for LocationFeatureSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LocationFeatureSpecification
 */
trait LocationFeatureSpecificationTrait
{
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

    /**
     * The hours during which this service or contact is available.
     *
     * @var array|OpeningHoursSpecification|OpeningHoursSpecification[]
     */
    public $hoursAvailable;
}
