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
 * Trait for Trip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Trip
 */
trait TripTrait
{
    /**
     * The location of origin of the trip, prior to any destination(s).
     *
     * @var array|Place|Place[]
     */
    public $tripOrigin;

    /**
     * The expected arrival time.
     *
     * @var array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $arrivalTime;

    /**
     * Destination(s) ( [[Place]] ) that make up a trip. For a trip where
     * destination order is important use [[ItemList]] to specify that order (see
     * examples).
     *
     * @var array|Place|Place[]|array|ItemList|ItemList[]
     */
    public $itinerary;

    /**
     * Identifies that this [[Trip]] is a subTrip of another Trip.  For example
     * Day 1, Day 2, etc. of a multi-day trip.
     *
     * @var array|Trip|Trip[]
     */
    public $partOfTrip;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.
     *
     * @var array|Demand|Demand[]|array|Offer|Offer[]
     */
    public $offers;

    /**
     * The expected departure time.
     *
     * @var array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $departureTime;

    /**
     * Identifies a [[Trip]] that is a subTrip of this Trip.  For example Day 1,
     * Day 2, etc. of a multi-day trip.
     *
     * @var array|Trip|Trip[]
     */
    public $subTrip;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $provider;
}
