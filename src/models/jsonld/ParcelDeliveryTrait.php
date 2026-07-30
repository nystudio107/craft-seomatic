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
 * Trait for ParcelDelivery.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ParcelDelivery
 */
trait ParcelDeliveryTrait
{
    /**
     * 'carrier' is an out-dated term indicating the 'provider' for parcel
     * delivery and flights.
     *
     * @var array|Organization|Organization[]
     */
    public $carrier;

    /**
     * Destination address.
     *
     * @var array|PostalAddress|PostalAddress[]
     */
    public $deliveryAddress;

    /**
     * New entry added as the package passes through each leg of its journey (from
     * shipment to final delivery).
     *
     * @var array|DeliveryEvent|DeliveryEvent[]
     */
    public $deliveryStatus;

    /**
     * The earliest date the package may arrive.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $expectedArrivalFrom;

    /**
     * The latest date the package may arrive.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $expectedArrivalUntil;

    /**
     * Method used for delivery or shipping.
     *
     * @var array|DeliveryMethod|DeliveryMethod[]
     */
    public $hasDeliveryMethod;

    /**
     * Item(s) being shipped.
     *
     * @var array|Product|Product[]
     */
    public $itemShipped;

    /**
     * Shipper's address.
     *
     * @var array|PostalAddress|PostalAddress[]
     */
    public $originAddress;

    /**
     * The overall order the items in this delivery were included in.
     *
     * @var array|Order|Order[]
     */
    public $partOfOrder;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $provider;

    /**
     * Shipper tracking number.
     *
     * @var string|array|Text|Text[]
     */
    public $trackingNumber;

    /**
     * Tracking url for the parcel delivery.
     *
     * @var array|URL|URL[]
     */
    public $trackingUrl;
}
