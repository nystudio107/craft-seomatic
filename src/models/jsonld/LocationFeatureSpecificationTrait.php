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
 * Trait for LocationFeatureSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LocationFeatureSpecification
 */
trait LocationFeatureSpecificationTrait
{
    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var Date|DateTime
     */
    public $validThrough;

    /**
     * The hours during which this service or contact is available.
     *
     * @var OpeningHoursSpecification
     */
    public $hoursAvailable;

    /**
     * The date when the item becomes valid.
     *
     * @var Date|DateTime
     */
    public $validFrom;
}
