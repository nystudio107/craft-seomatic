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
 * Trait for OrderItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OrderItem
 */

trait OrderItemTrait
{
    
    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var ParcelDelivery
     */
    public $orderDelivery;

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
     * The identifier of the order item.
     *
     * @var string|Text
     */
    public $orderItemNumber;

    /**
     * The item ordered.
     *
     * @var Service|OrderItem|Product
     */
    public $orderedItem;

}
