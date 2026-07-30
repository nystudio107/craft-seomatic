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
     * @var array|Date|Date[]|array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $availabilityEnds;

    /**
     * The beginning of the availability of the product or service included in the
     * offer.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $availabilityStarts;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Text|Text[]|array|Thing|Thing[]|array|URL|URL[]
     */
    public $category;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid.  See also [[ineligibleRegion]].
     *
     * @var string|array|GeoShape|GeoShape[]|array|Place|Place[]|array|Text|Text[]
     */
    public $eligibleRegion;

    /**
     * An Offer which must be accepted before the user can perform the Action. For
     * example, the user may need to buy a movie before being able to watch it.
     *
     * @var array|Offer|Offer[]
     */
    public $expectsAcceptanceOf;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed.  See also [[eligibleRegion]].
     *
     * @var string|array|GeoShape|GeoShape[]|array|Place|Place[]|array|Text|Text[]
     */
    public $ineligibleRegion;

    /**
     * Indicates if use of the media require a subscription  (either paid or
     * free). Allowed values are ```true``` or ```false``` (note that an earlier
     * version had 'yes', 'no').
     *
     * @var bool|array|Boolean|Boolean[]|array|MediaSubscription|MediaSubscription[]
     */
    public $requiresSubscription;
}
