<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * OrderItem - An order item is a line of an order. It includes the quantity
 * and shipping details of a bought offer.
 *
 * Extends: Intangible
 * @see    http://schema.org/OrderItem
 */
class OrderItem extends Intangible
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OrderItem';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OrderItem';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An order item is a line of an order. It includes the quantity and shipping details of a bought offer.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @var ParcelDelivery [schema.org types: ParcelDelivery]
     */
    public $orderDelivery;

    /**
     * The identifier of the order item.
     *
     * @var string [schema.org types: Text]
     */
    public $orderItemNumber;

    /**
     * The current status of the order item.
     *
     * @var OrderStatus [schema.org types: OrderStatus]
     */
    public $orderItemStatus;

    /**
     * The number of the item ordered. If the property is not set, assume the
     * quantity is one.
     *
     * @var float [schema.org types: Number]
     */
    public $orderQuantity;

    /**
     * The item ordered.
     *
     * @var mixed|OrderItem|Product [schema.org types: OrderItem, Product]
     */
    public $orderedItem;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'orderDelivery',
            'orderItemNumber',
            'orderItemStatus',
            'orderQuantity',
            'orderedItem',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'orderDelivery' => ['ParcelDelivery'],
            'orderItemNumber' => ['Text'],
            'orderItemStatus' => ['OrderStatus'],
            'orderQuantity' => ['Number'],
            'orderedItem' => ['OrderItem','Product'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'orderDelivery' => 'The delivery of the parcel related to this order or order item.',
            'orderItemNumber' => 'The identifier of the order item.',
            'orderItemStatus' => 'The current status of the order item.',
            'orderQuantity' => 'The number of the item ordered. If the property is not set, assume the quantity is one.',
            'orderedItem' => 'The item ordered.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['orderDelivery','orderItemNumber','orderItemStatus','orderQuantity','orderedItem',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
