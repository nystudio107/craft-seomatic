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
 * Trait for ParcelDelivery.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ParcelDelivery
 */

trait ParcelDeliveryTrait
{
    
    /**
     * Shipper's address.
     *
     * @var PostalAddress
     */
    public $originAddress;

    /**
     * Shipper tracking number.
     *
     * @var string|Text
     */
    public $trackingNumber;

    /**
     * Item(s) being shipped.
     *
     * @var Product
     */
    public $itemShipped;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var Organization|Person
     */
    public $provider;

    /**
     * Tracking url for the parcel delivery.
     *
     * @var URL
     */
    public $trackingUrl;

    /**
     * Destination address.
     *
     * @var PostalAddress
     */
    public $deliveryAddress;

    /**
     * The latest date the package may arrive.
     *
     * @var Date|DateTime
     */
    public $expectedArrivalUntil;

    /**
     * New entry added as the package passes through each leg of its journey (from
     * shipment to final delivery).
     *
     * @var DeliveryEvent
     */
    public $deliveryStatus;

    /**
     * The earliest date the package may arrive.
     *
     * @var Date|DateTime
     */
    public $expectedArrivalFrom;

    /**
     * 'carrier' is an out-dated term indicating the 'provider' for parcel
     * delivery and flights.
     *
     * @var Organization
     */
    public $carrier;

    /**
     * Method used for delivery or shipping.
     *
     * @var DeliveryMethod
     */
    public $hasDeliveryMethod;

    /**
     * The overall order the items in this delivery were included in.
     *
     * @var Order
     */
    public $partOfOrder;

}
