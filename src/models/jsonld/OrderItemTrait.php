<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for OrderItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OrderItem
 */
trait OrderItemTrait
{
    /**
     * The current status of the order item.
     *
     * @var OrderStatus
     */
    public $orderItemStatus;

    /**
     * The number of the item ordered. If the property is not set, assume the
     * quantity is one.
     *
     * @var float|Number
     */
    public $orderQuantity;

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var ParcelDelivery
     */
    public $orderDelivery;

    /**
     * The item ordered.
     *
     * @var Product|Service|OrderItem
     */
    public $orderedItem;

    /**
     * The identifier of the order item.
     *
     * @var string|Text
     */
    public $orderItemNumber;
}
