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
 * Trait for ActionAccessSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ActionAccessSpecification
 */

trait ActionAccessSpecificationTrait
{
    
    /**
     * An Offer which must be accepted before the user can perform the Action. For
     * example, the user may need to buy a movie before being able to watch it.
     *
     * @var Offer
     */
    public $expectsAcceptanceOf;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|Text|PhysicalActivityCategory|Thing|CategoryCode
     */
    public $category;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed.  See also [[eligibleRegion]].       
     *
     * @var string|Place|Text|GeoShape
     */
    public $ineligibleRegion;

    /**
     * Indicates if use of the media require a subscription  (either paid or
     * free). Allowed values are ```true``` or ```false``` (note that an earlier
     * version had 'yes', 'no').
     *
     * @var bool|MediaSubscription|Boolean
     */
    public $requiresSubscription;

    /**
     * The end of the availability of the product or service included in the
     * offer.
     *
     * @var Date|DateTime|Time
     */
    public $availabilityEnds;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid.  See also [[ineligibleRegion]].     
     *
     * @var string|GeoShape|Text|Place
     */
    public $eligibleRegion;

    /**
     * The beginning of the availability of the product or service included in the
     * offer.
     *
     * @var Time|DateTime|Date
     */
    public $availabilityStarts;

}
