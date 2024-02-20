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
     * @var array|OrderStatus|OrderStatus[]
     */
    public $orderItemStatus;

    /**
     * The item ordered.
     *
     * @var array|Product|Product[]|array|OrderItem|OrderItem[]|array|Service|Service[]
     */
    public $orderedItem;

    /**
     * The identifier of the order item.
     *
     * @var string|array|Text|Text[]
     */
    public $orderItemNumber;

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var array|ParcelDelivery|ParcelDelivery[]
     */
    public $orderDelivery;

    /**
     * The number of the item ordered. If the property is not set, assume the
     * quantity is one.
     *
     * @var float|array|Number|Number[]
     */
    public $orderQuantity;
}
