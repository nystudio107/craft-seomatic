<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for Trip.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Trip
 */

trait TripTrait
{
    
    /**
     * The expected arrival time.
     *
     * @var Time|DateTime
     */
    public $arrivalTime;

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
     * @var Offer|Demand
     */
    public $offers;

    /**
     * The expected departure time.
     *
     * @var Time|DateTime
     */
    public $departureTime;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var Organization|Person
     */
    public $provider;

    /**
     * Identifies a [[Trip]] that is a subTrip of this Trip.  For example Day 1,
     * Day 2, etc. of a multi-day trip.
     *
     * @var Trip
     */
    public $subTrip;

    /**
     * Destination(s) ( [[Place]] ) that make up a trip. For a trip where
     * destination order is important use [[ItemList]] to specify that order (see
     * examples).
     *
     * @var ItemList|Place
     */
    public $itinerary;

    /**
     * Identifies that this [[Trip]] is a subTrip of another Trip.  For example
     * Day 1, Day 2, etc. of a multi-day trip.
     *
     * @var Trip
     */
    public $partOfTrip;

}
