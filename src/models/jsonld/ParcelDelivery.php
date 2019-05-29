<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * ParcelDelivery - The delivery of a parcel either via the postal service or
 * a commercial service.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ParcelDelivery
 */
class ParcelDelivery extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ParcelDelivery';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ParcelDelivery';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The delivery of a parcel either via the postal service or a commercial service.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * Destination address.
     *
     * @var PostalAddress [schema.org types: PostalAddress]
     */
    public $deliveryAddress;

    /**
     * New entry added as the package passes through each leg of its journey (from
     * shipment to final delivery).
     *
     * @var DeliveryEvent [schema.org types: DeliveryEvent]
     */
    public $deliveryStatus;

    /**
     * The earliest date the package may arrive.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $expectedArrivalFrom;

    /**
     * The latest date the package may arrive.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $expectedArrivalUntil;

    /**
     * Method used for delivery or shipping.
     *
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $hasDeliveryMethod;

    /**
     * Item(s) being shipped.
     *
     * @var Product [schema.org types: Product]
     */
    public $itemShipped;

    /**
     * Shipper's address.
     *
     * @var PostalAddress [schema.org types: PostalAddress]
     */
    public $originAddress;

    /**
     * The overall order the items in this delivery were included in.
     *
     * @var Order [schema.org types: Order]
     */
    public $partOfOrder;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * Shipper tracking number.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $trackingNumber;

    /**
     * Tracking url for the parcel delivery.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $trackingUrl;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'deliveryAddress',
        'deliveryStatus',
        'expectedArrivalFrom',
        'expectedArrivalUntil',
        'hasDeliveryMethod',
        'itemShipped',
        'originAddress',
        'partOfOrder',
        'provider',
        'trackingNumber',
        'trackingUrl'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'deliveryAddress' => ['PostalAddress'],
        'deliveryStatus' => ['DeliveryEvent'],
        'expectedArrivalFrom' => ['DateTime'],
        'expectedArrivalUntil' => ['DateTime'],
        'hasDeliveryMethod' => ['DeliveryMethod'],
        'itemShipped' => ['Product'],
        'originAddress' => ['PostalAddress'],
        'partOfOrder' => ['Order'],
        'provider' => ['Organization','Person'],
        'trackingNumber' => ['Text'],
        'trackingUrl' => ['URL']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'deliveryAddress' => 'Destination address.',
        'deliveryStatus' => 'New entry added as the package passes through each leg of its journey (from shipment to final delivery).',
        'expectedArrivalFrom' => 'The earliest date the package may arrive.',
        'expectedArrivalUntil' => 'The latest date the package may arrive.',
        'hasDeliveryMethod' => 'Method used for delivery or shipping.',
        'itemShipped' => 'Item(s) being shipped.',
        'originAddress' => 'Shipper\'s address.',
        'partOfOrder' => 'The overall order the items in this delivery were included in.',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
        'trackingNumber' => 'Shipper tracking number.',
        'trackingUrl' => 'Tracking url for the parcel delivery.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['deliveryAddress','deliveryStatus','expectedArrivalFrom','expectedArrivalUntil','hasDeliveryMethod','itemShipped','originAddress','partOfOrder','provider','trackingNumber','trackingUrl'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
