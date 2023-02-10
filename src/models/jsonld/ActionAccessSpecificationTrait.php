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
 * Trait for ActionAccessSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ActionAccessSpecification
 */
trait ActionAccessSpecificationTrait
{
    /**
     * The end of the availability of the product or service included in the
     * offer.
     *
     * @var DateTime|Time|Date
     */
    public $availabilityEnds;

    /**
     * An Offer which must be accepted before the user can perform the Action. For
     * example, the user may need to buy a movie before being able to watch it.
     *
     * @var Offer
     */
    public $expectsAcceptanceOf;

    /**
     * The beginning of the availability of the product or service included in the
     * offer.
     *
     * @var Date|Time|DateTime
     */
    public $availabilityStarts;

    /**
     * Indicates if use of the media require a subscription  (either paid or
     * free). Allowed values are ```true``` or ```false``` (note that an earlier
     * version had 'yes', 'no').
     *
     * @var bool|MediaSubscription|Boolean
     */
    public $requiresSubscription;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid.  See also [[ineligibleRegion]].
     *
     * @var string|Place|Text|GeoShape
     */
    public $eligibleRegion;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed.  See also [[eligibleRegion]].
     *
     * @var string|Place|GeoShape|Text
     */
    public $ineligibleRegion;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|CategoryCode|Text|Thing|PhysicalActivityCategory
     */
    public $category;
}
